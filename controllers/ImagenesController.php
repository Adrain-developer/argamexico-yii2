<?php

namespace app\controllers;

use Yii;
use app\models\Imagenes;
use app\models\ImagenesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ImagenesController implements the CRUD actions for Imagenes model.
 */
class ImagenesController extends Controller
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
     * Lists all Imagenes models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImagenesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Imagenes model.
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
     * Creates a new Imagenes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->request->post()) {
            $model = Imagenes::find()->where(['seccion' => 'index'])->one();
            if (empty($model)) {
                $model = new Imagenes();
                $model->seccion = 'index';
            }
            $post = Yii::$app->request->post();

            if ($model->load($post)) {
                $dir_subida = 'web/images/inicio/';

                $fileImagenIdxFire = UploadedFile::getInstance($model, 'pathImagenIdxFire');
                $fileImagenIdxCon = UploadedFile::getInstance($model, 'pathImagenIdxCons');
                $fileImagenIdxlabs = UploadedFile::getInstance($model, 'pathImagenIdxlabs');
                $fileImagenIdxTr = UploadedFile::getInstance($model, 'pathImagenIdxTr');
                $fileImagenIdxUno = UploadedFile::getInstance($model, 'pathImagenIdxUno');
                $fileImagenIdxDos = UploadedFile::getInstance($model, 'pathImagenIdxDos');
                $fileImagenIdxFireUno = UploadedFile::getInstance($model, 'pathImagenIdxFireUno');
                $fileImagenIdxFireDos = UploadedFile::getInstance($model, 'pathImagenIdxFireDos');
                $fileImagenIdxFireTres = UploadedFile::getInstance($model, 'pathImagenIdxFireTres');
                $fileImagenBnrIdxCons = UploadedFile::getInstance($model, 'pathImagenBnrIdxCons');
                $fileImagenBnrIdxLabs = UploadedFile::getInstance($model, 'pathImagenBnrIdxLabs');
                $fileImagenFijasLabs = UploadedFile::getInstance($model, 'pathImagenFijasLabs');
                $fileImagenHigieneLabs = UploadedFile::getInstance($model, 'pathImagenHigieneLabs');
                $fileImagenBnrIdxTraining = UploadedFile::getInstance($model, 'pathImagenBnrIdxTraining');
                $fileImagenBnrContacto = UploadedFile::getInstance($model, 'pathImagenBnrContacto');
                $fileImagenBnrLabs = UploadedFile::getInstance($model, 'pathImagenBnrLabs');

                #rutas a model
                $ImagenIdxFireActual = isset($post['Imagenes']['pathImagenIdxFireActual']) ? $post['Imagenes']['pathImagenIdxFireActual'] : null;

                $ImagenIdxConsActual = isset($post['Imagenes']['pathImagenIdxConsActual']) ? $post['Imagenes']['pathImagenIdxConsActual'] : null;

                $ImagenIdxlabsActual = isset($post['Imagenes']['pathImagenIdxlabsActual']) ? $post['Imagenes']['pathImagenIdxlabsActual'] : null;

                $ImagenIdxTrActual = isset($post['Imagenes']['pathImagenIdxTrActual']) ? $post['Imagenes']['pathImagenIdxTrActual'] : null;

                $ImagenIdxUnoActual = isset($post['Imagenes']['pathImagenIdxUnoActual']) ? $post['Imagenes']['pathImagenIdxUnoActual'] : null;

                $ImagenIdxDosActual = isset($post['Imagenes']['pathImagenIdxDosActual']) ? $post['Imagenes']['pathImagenIdxDosActual'] : null;

                $ImagenIdxFireUnoActual = isset($post['Imagenes']['pathImagenIdxFireUnoActual']) ? $post['Imagenes']['pathImagenIdxFireUnoActual'] : null;

                $ImagenIdxFireDosActual = isset($post['Imagenes']['pathImagenIdxFireDosActual']) ? $post['Imagenes']['pathImagenIdxFireDosActual'] : null;

                $ImagenIdxFireTresActual = isset($post['Imagenes']['pathImagenIdxFireTresActual']) ? $post['Imagenes']['pathImagenIdxFireTresActual'] : null;

                $ImagenBnrIdxConsActual = isset($post['Imagenes']['pathImagenBnrIdxConsActual']) ? $post['Imagenes']['pathImagenBnrIdxConsActual'] : null;

                $ImagenBnrIdxLabsActual = isset($post['Imagenes']['pathImagenBnrIdxLabsActual']) ? $post['Imagenes']['pathImagenBnrIdxLabsActual'] : null;

                $ImagenFijasLabsActual = isset($post['Imagenes']['pathImagenFijasLabsActual']) ? $post['Imagenes']['pathImagenFijasLabsActual'] : null;

                $ImagenHigieneLabsActual = isset($post['Imagenes']['pathImagenHigieneLabsActual']) ? $post['Imagenes']['pathImagenHigieneLabsActual'] : null;

                $ImagenBnrIdxTrainingActual = isset($post['Imagenes']['pathImagenBnrIdxTrainingActual']) ? $post['Imagenes']['pathImagenBnrIdxTrainingActual'] : null;

                $ImagenBnrContactoActual = isset($post['Imagenes']['pathImagenBnrContactoActual']) ? $post['Imagenes']['pathImagenBnrContactoActual'] : null;

                $ImagenBnrLabsActual = isset($post['Imagenes']['pathImagenBnrLabsActual']) ? $post['Imagenes']['pathImagenBnrLabsActual'] : null;


                $model->pathImagenIdxFire = $this->setRutaImagenFromPost($fileImagenIdxFire, $ImagenIdxFireActual, $dir_subida, $fileImagenIdxFire);
                $model->pathImagenIdxCons = $this->setRutaImagenFromPost($fileImagenIdxCon, $ImagenIdxConsActual, $dir_subida, $fileImagenIdxCon);
                $model->pathImagenIdxlabs = $this->setRutaImagenFromPost($fileImagenIdxlabs, $ImagenIdxlabsActual, $dir_subida, $fileImagenIdxlabs);
                $model->pathImagenIdxTr = $this->setRutaImagenFromPost($fileImagenIdxTr, $ImagenIdxTrActual, $dir_subida, $fileImagenIdxTr);
                $model->pathImagenIdxUno = $this->setRutaImagenFromPost($fileImagenIdxUno, $ImagenIdxUnoActual, $dir_subida, $fileImagenIdxUno);
                $model->pathImagenIdxDos = $this->setRutaImagenFromPost($fileImagenIdxDos, $ImagenIdxDosActual, $dir_subida, $fileImagenIdxDos);
                $model->pathImagenIdxFireUno = $this->setRutaImagenFromPost($fileImagenIdxFireUno, $ImagenIdxFireUnoActual, $dir_subida, $fileImagenIdxFireUno);
                $model->pathImagenIdxFireDos = $this->setRutaImagenFromPost($fileImagenIdxFireDos, $ImagenIdxFireDosActual, $dir_subida, $fileImagenIdxFireDos);
                $model->pathImagenIdxFireTres = $this->setRutaImagenFromPost($fileImagenIdxFireTres, $ImagenIdxFireTresActual, $dir_subida, $fileImagenIdxFireTres);
                $model->pathImagenBnrIdxCons = $this->setRutaImagenFromPost($fileImagenBnrIdxCons, $ImagenBnrIdxConsActual, $dir_subida, $fileImagenBnrIdxCons);
                $model->pathImagenBnrIdxLabs = $this->setRutaImagenFromPost($fileImagenBnrIdxLabs, $ImagenBnrIdxLabsActual, $dir_subida, $fileImagenBnrIdxLabs);
                $model->pathImagenFijasLabs = $this->setRutaImagenFromPost($fileImagenFijasLabs, $ImagenFijasLabsActual, $dir_subida, $fileImagenFijasLabs);
                $model->pathImagenHigieneLabs = $this->setRutaImagenFromPost($fileImagenHigieneLabs, $ImagenHigieneLabsActual, $dir_subida, $fileImagenHigieneLabs);
                $model->pathImagenBnrIdxTraining = $this->setRutaImagenFromPost($fileImagenBnrIdxTraining, $ImagenBnrIdxTrainingActual, $dir_subida, $fileImagenBnrIdxTraining);
                $model->pathImagenBnrContacto = $this->setRutaImagenFromPost($fileImagenBnrContacto, $ImagenBnrContactoActual, $dir_subida, $fileImagenBnrContacto);
                $model->pathImagenBnrLabs = $this->setRutaImagenFromPost($fileImagenBnrLabs, $ImagenBnrLabsActual, $dir_subida, $fileImagenBnrLabs);


                if ($model->save()) {
                    if (!empty($fileImagenIdxFire)) {
                        move_uploaded_file($fileImagenIdxFire->tempName, $model->pathImagenIdxFire);
                    }
                    if (!empty($fileImagenIdxCon)) {
                        move_uploaded_file($fileImagenIdxCon->tempName, $model->pathImagenIdxCons);
                    }
                    if (!empty($fileImagenIdxlabs)) {
                        move_uploaded_file($fileImagenIdxlabs->tempName, $model->pathImagenIdxlabs);
                    }
                    if (!empty($fileImagenIdxTr)) {
                        move_uploaded_file($fileImagenIdxTr->tempName, $model->pathImagenIdxTr);
                    }
                    if (!empty($fileImagenIdxUno)) {
                        move_uploaded_file($fileImagenIdxUno->tempName, $model->pathImagenIdxUno);
                    }
                    if (!empty($fileImagenIdxDos)) {
                        move_uploaded_file($fileImagenIdxDos->tempName, $model->pathImagenIdxDos);
                    }
                    if (!empty($fileImagenIdxFireUno)) {
                        move_uploaded_file($fileImagenIdxFireUno->tempName, $model->pathImagenIdxFireUno);
                    }
                    if (!empty($fileImagenIdxFireDos)) {
                        move_uploaded_file($fileImagenIdxFireDos->tempName, $model->pathImagenIdxFireDos);
                    }
                    if (!empty($fileImagenIdxFireTres)) {
                        move_uploaded_file($fileImagenIdxFireTres->tempName, $model->pathImagenIdxFireTres);
                    }
                    if (!empty($fileImagenBnrIdxCons)) {
                        move_uploaded_file($fileImagenBnrIdxCons->tempName, $model->pathImagenBnrIdxCons);
                    }
                    if (!empty($fileImagenBnrIdxLabs)) {
                        move_uploaded_file($fileImagenBnrIdxLabs->tempName, $model->pathImagenBnrIdxLabs);
                    }
                    if (!empty($fileImagenFijasLabs)) {
                        move_uploaded_file($fileImagenFijasLabs->tempName, $model->pathImagenFijasLabs);
                    }
                    if (!empty($fileImagenHigieneLabs)) {
                        move_uploaded_file($fileImagenHigieneLabs->tempName, $model->pathImagenHigieneLabs);
                    }
                    if (!empty($fileImagenBnrIdxTraining)) {
                        move_uploaded_file($fileImagenBnrIdxTraining->tempName, $model->pathImagenBnrIdxTraining);
                    }
                    if (!empty($fileImagenBnrContacto)) {
                        move_uploaded_file($fileImagenBnrContacto->tempName, $model->pathImagenBnrContacto);
                    }
                    if (!empty($fileImagenBnrLabs)) {
                        move_uploaded_file($fileImagenBnrLabs->tempName, $model->pathImagenBnrLabs);
                    }
                } else {
                    echo '<pre>';
                    echo 'Ocurrió un error :c <br>';
                    print_r($model->errors);
                    echo '</pre>';
                    exit;
                }

                return $this->redirect(['site/admin']);
            }
        }

        $model = Imagenes::find()->where(['seccion' => 'index'])->one();
        if (empty($model)) $model = new Imagenes();
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Imagenes model.
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
     * Deletes an existing Imagenes model.
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
     * Finds the Imagenes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Imagenes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Imagenes::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    function setRutaImagenFromPost($imgPost, $imgActual, $dirSubida, $file){
        if(!empty($imgPost) && !is_null($imgPost)){
            return $dirSubida.$file->name;
        }
        if(empty($imgPost) || is_null($imgPost)){
            if(!empty($imgActual) && !is_null($imgActual)){
                return $imgActual;
            }
        }
        return null;
    }
}
