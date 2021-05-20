<?php

namespace app\controllers;

use Yii;
use app\models\Publicaciones;
use app\models\PublicacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * PublicacionesController implements the CRUD actions for Publicaciones model.
 */
class PublicacionesController extends Controller
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
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Publicaciones models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PublicacionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $filtro = Yii::$app->getRequest()->getQueryParam('tipo');
        if(!empty($filtro) && !is_null($filtro)){
            $dataProvider->query->andFilterWhere(['seccion' => $filtro]);
        }
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tipo' => $filtro
        ]);
    }

    /**
     * Displays a single Publicaciones model.
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
     * Creates a new Publicaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Publicaciones();
        $model->seccion = Yii::$app->getRequest()->getQueryParam('tipo');

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'tipo' => $model->seccion]);
        }*/

        if ($model->load(Yii::$app->request->post())) {
            $dir_subida = 'web/images/publicaciones/';
            $file = UploadedFile::getInstance($model, 'pathImagen');
            $model->pathImagen = $dir_subida.$file->name;    
            if($model->save()){
                move_uploaded_file($file->tempName, $model->pathImagen);            
            }else{
                print_r($model->errors);
            }
            return $this->redirect(['index', 'tipo' => $model->seccion]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Publicaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }*/
        if ($model->load(Yii::$app->request->post())) {
            $dir_subida = 'web/images/publicaciones/';
            $post = Yii::$app->request->post();
            $file = UploadedFile::getInstance($model, 'pathImagen');
            if(!empty($file)){
                $model->pathImagen = $dir_subida.$file->name;
            }
            if(isset($post['Publicaciones']['pathImagenActual'])){
                echo 'isset';
                $model->pathImagen = $post['Publicaciones']['pathImagenActual'];
            }                
            if($model->save()){
                if(!empty($file)){
                    move_uploaded_file($file->tempName, $model->pathImagen);
                }                            
            }else{
                print_r($model->errors);
            }
            return $this->redirect(['index', 'tipo' => $model->seccion]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Publicaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = Publicaciones::find()->where(['id' => $id])->one();
        $tipo = $model->seccion;
        $this->findModel($id)->delete();

        return $this->redirect(['index', 'tipo' => $tipo]);
    }

    /**
     * Finds the Publicaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Publicaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Publicaciones::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
