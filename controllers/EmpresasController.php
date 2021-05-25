<?php

namespace app\controllers;

use Yii;
use app\models\Empresas;
use app\models\EmpresasFolios;
use app\models\EmpresasSearch;
use app\models\Folios;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EmpresasController implements the CRUD actions for Empresas model.
 */
class EmpresasController extends Controller
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
     * Lists all Empresas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EmpresasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empresas model.
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
     * Creates a new Empresas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Empresas();
        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $existeEmpresa = $this->existeEmpresaPorRfc($post['Empresas']['rfc']);
            if(!$existeEmpresa){
                $model->save();
            }else{
                $model->id = $existeEmpresa;
            }
            $this->asignaFolioEmpresa($model->id, $post['Empresas']['folio']);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Empresas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Empresas model.
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
     * Finds the Empresas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Empresas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Empresas::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    function asignaFolioEmpresa($idEmpresa, $folio){
      $folioId = $this->getFolioId($folio);  
      $existeRegistro = EmpresasFolios::find()->where(['id_empresa' => $idEmpresa, 'id_folio' => $folioId])->one();
      if(empty($existeRegistro)){
          $model = new EmpresasFolios();
          $model->id_empresa = $idEmpresa;
          $model->id_folio = $folioId;
          if(!$model->save()){
            var_dump($model->errors);
            exit;
        }  
      }
    }

    function getFolioId($nombreFolio){
        $folio = Folios::find()->where(['nombre' => $nombreFolio])->one();
        if(empty($existeFolio)){
          $model = new Folios();
          $model->nombre = $nombreFolio;
          $model->tipo = 'DS3';
          if(!$model->save()){
              var_dump($model->errors);
              exit;
          }          
          return $model->id;
        }
        return $folio->id;
    }

    function existeEmpresaPorRfc($rfc){
        $empresa = Empresas::find()->where(['rfc' => $rfc])->one();
        if(empty($empresa)){
            return false;
        }
        return $empresa->id;
    }
}
