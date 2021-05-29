<?php

namespace app\controllers;

use Yii;
use app\models\Productos;
use app\models\Categorias;
use app\models\ProductosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductosController implements the CRUD actions for Productos model.
 */
class ProductosController extends Controller
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

    public function beforeAction($action)
{            
    if ($action->id == 'cotizar') {
        $this->enableCsrfValidation = false;
    }

    return parent::beforeAction($action);
}

    /**
     * Lists all Productos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productos model.
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
     * Creates a new Productos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Productos();

        if ($model->load(Yii::$app->request->post())) {
            $dir_subida = 'web/images/catalogo/';
            $file = UploadedFile::getInstance($model, 'pathImagen');
            $model->pathImagen = $dir_subida.$file->name;    
            if($model->save()){
                move_uploaded_file($file->tempName, $model->pathImagen);            
            }else{
                print_r($model->errors);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $categorias = \yii\helpers\ArrayHelper::map(Categorias::find()->where(['tipo' => 'p'])->all(), 'id', 'nombre');

        return $this->render('create', [
            'model' => $model,
            'categorias' => $categorias
        ]);
    }

    /**
     * Updates an existing Productos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $dir_subida = 'web/images/catalogo/';
            $post = Yii::$app->request->post();
            $file = UploadedFile::getInstance($model, 'pathImagen');
            if(!empty($file)){
                $model->pathImagen = $dir_subida.$file->name;
            }
            if(isset($post['Productos']['pathImagenActual'])){
                echo 'isset';
                $model->pathImagen = $post['Productos']['pathImagenActual'];
            }                
            if($model->save()){
                if(!empty($file)){
                    move_uploaded_file($file->tempName, $model->pathImagen);
                }                            
            }else{
                print_r($model->errors);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $categorias = \yii\helpers\ArrayHelper::map(Categorias::find()->where(['tipo' => 'p'])->all(), 'id', 'nombre');

        return $this->render('update', [
            'model' => $model,
            'categorias' => $categorias
        ]);
    }

    /**
     * Deletes an existing Productos model.
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
     * Finds the Productos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCotizar(){
        $this->enableCsrfValidation = false;
        $get = $this->request->post();
        $detallesPedido = $get['datosPedido'];
        $nombre = $get['nombre'];
        $numero = $get['numero'];
        $correo = $get['correo'];
        $detalleCotizacion = $this->setDetallePedido($detallesPedido);          
        $this->sendMail($detalleCotizacion, $nombre, $numero, $correo);          
    }

    function setDetallePedido($detallesPedido){
        $listado = [];
        foreach ($detallesPedido as $item => $detalle) {
            $listado[] = $this->crearDetallePedido($detalle);
        }
        return $listado;
    }

    function crearDetallePedido($detalle){
        $detalle = (array)json_decode($detalle);
        $model = [];
        $model['producto_id'] = $detalle['id'];
        $model['cantidad'] = $detalle['cantidad'];
        $model['concepto'] = $detalle['nombre'];
        return $model;
      } 
  
      function sendMail($detallesPedido, $nombre, $numero, $correo){
      $content = $this->renderAjax('cotizacion', [
        'detalles' => $detallesPedido
      ]);
      #print_r($content);
      #exit;
      try {
        Yii::$app->mailer->compose($content)
          ->setFrom('ventas@argamexico.com')
          ->setTo('jorgehm77@hotmail.com')
          ->setSubject('Se ha recibido una solicitud de cotización')
          ->send();
        echo "Solicitud recibida existosamente. En breve nos comunicaremos contigo.";
        exit;
      } catch (\Exception $e) {
        //print_r($e);
        echo "Error al recibir cotización :c";
        exit;
        }    
      }
}
