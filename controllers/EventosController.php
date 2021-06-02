<?php

namespace app\controllers;

use Yii;
use app\models\Categorias;
use app\models\Eventos;
use app\models\EventosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * EventosController implements the CRUD actions for Eventos model.
 */
class EventosController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Eventos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EventosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Eventos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Eventos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Eventos();
        if ($model->load(Yii::$app->request->post())) {
            $dir_subida = 'web/images/eventos/';
            $file = UploadedFile::getInstance($model, 'pathImagen');
            $filePdf = UploadedFile::getInstance($model, 'pathInfo');
            if(!empty($file)){
                $model->pathImagen = $dir_subida.$file->name;
            }             
            if(!empty($filePdf)){
             $model->pathInfo = $dir_subida.$filePdf->name;
            }   
            if($model->save()){
                if(!empty($file)){
                    move_uploaded_file($file->tempName, $model->pathImagen);
                }                
                if(!empty($filePdf)){
                    move_uploaded_file($filePdf->tempName, $model->pathInfo);
                }            
            }else{
                print_r($model->errors);
                exit;
            }
            return $this->redirect(['index']);
        }
        
        return $this->render('create', [
            'model' => $model,
            'categorias' => $this->getCategorias(),
            'subcategorias' => $this->getSubCategorias()
        ]);
    }

    /**
     * Updates an existing Eventos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id); 
        if ($model->load(Yii::$app->request->post())) {
            $dir_subida = 'web/images/eventos/';
            $post = Yii::$app->request->post();
            $file = UploadedFile::getInstance($model, 'pathImagen');
            $filePdf = UploadedFile::getInstance($model, 'pathInfo');
            if(!empty($file)){
                $model->pathImagen = $dir_subida.$file->name;
            }
            if(!empty($filePdf)){
                $model->pathInfo = $dir_subida.$filePdf->name;
            }
            if(isset($post['Eventos']['pathImagenActual']) && empty($file)){                
                $model->pathImagen = $post['Eventos']['pathImagenActual'];
            }                
            if(isset($post['Eventos']['pathInfoActual']) && empty($filePdf)){                
                $model->pathInfo = $post['Eventos']['pathInfoActual'];
            }                
            if($model->save()){
                if(!empty($file)){
                    move_uploaded_file($file->tempName, $model->pathImagen);
                }                            
                if(!empty($filePdf)){
                    move_uploaded_file($filePdf->tempName, $model->pathInfo);
                }                            
            }else{
                print_r($model->errors);
            }
            return $this->redirect(['index']);
        }
        
        return $this->render('update', [
            'model' => $model,
            'categorias' => $this->getCategorias(),
            'subcategorias' => $this->getSubCategorias()
        ]);
    }

    /**
     * Deletes an existing Eventos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Eventos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Eventos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Eventos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    function getCategorias(){
        $subsecciones = [
            ['id' => 'Seguridadindustrial', 'value' => 'Seguridad Industrial' ],
            ['id' => 'ProteccionAmbiental', 'value' => 'Protección ambiental'],
            ['id' => 'ProteccionCivil', 'value' => 'Protección civil'],
            ['id' => 'DesarrolloOrganizacional', 'value' => 'Desarrollo Organizacional']
        ];
        return \yii\helpers\ArrayHelper::map($subsecciones, 'id', 'value');
    }

    function getSubCategorias(){
        $subsecciones = [
            ['id' => 'Presencial', 'value' => 'Presencial' ],
            ['id' => 'EnLinea', 'value' => 'En línea']
        ];
        return \yii\helpers\ArrayHelper::map($subsecciones, 'id', 'value');
    }
}
