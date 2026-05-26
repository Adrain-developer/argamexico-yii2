<?php

namespace app\controllers;

use app\models\Divisiones;
use app\models\ServicioImagenes;
use app\models\Servicios;
use app\models\ServiciosSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

class ServiciosController extends Controller
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    ['allow' => true, 'roles' => ['@']],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete'       => ['POST'],
                    'delete-image' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex(?int $divisionId = null): string
    {
        $searchModel  = new ServiciosSearch();
        if ($divisionId) {
            $searchModel->division_id = $divisionId;
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $divisiones   = ArrayHelper::map(Divisiones::find()->select(['id', 'nombre'])->asArray()->all(), 'id', 'nombre');

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'divisiones'   => $divisiones,
        ]);
    }

    public function actionView(int $id): string
    {
        $model = $this->findModel($id);
        return $this->render('view', ['model' => $model]);
    }

    public function actionCreate(?int $divisionId = null): string|Response
    {
        $model = new Servicios();
        if ($divisionId) {
            $model->division_id = $divisionId;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveUploadedImages($model->id, UploadedFile::getInstancesByName('imageFiles'));
            Yii::$app->session->setFlash('success', 'Servicio creado correctamente.');
            return $this->redirect(['divisiones/view', 'id' => $model->division_id]);
        }

        return $this->render('create', [
            'model'      => $model,
            'divisiones' => ArrayHelper::map(Divisiones::find()->select(['id', 'nombre'])->asArray()->all(), 'id', 'nombre'),
        ]);
    }

    public function actionUpdate(int $id): string|Response
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $this->saveUploadedImages($model->id, UploadedFile::getInstancesByName('imageFiles'));
            Yii::$app->session->setFlash('success', 'Servicio actualizado correctamente.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model'      => $model,
            'divisiones' => ArrayHelper::map(Divisiones::find()->select(['id', 'nombre'])->asArray()->all(), 'id', 'nombre'),
        ]);
    }

    public function actionDelete(int $id): Response
    {
        $model = $this->findModel($id);
        $divId = $model->division_id;
        $model->delete();
        Yii::$app->session->setFlash('success', 'Servicio eliminado.');
        return $this->redirect(['divisiones/view', 'id' => $divId]);
    }

    public function actionDeleteImage(int $id): Response
    {
        $img = ServicioImagenes::findOne($id);
        if ($img !== null) {
            $svcId = $img->servicio_id;
            if (!str_starts_with($img->url, 'http')) {
                $path = \Yii::getAlias('@webroot/images/servicios/') . $img->url;
                if (is_file($path)) {
                    @unlink($path);
                }
            }
            $img->delete();
            Yii::$app->session->setFlash('success', 'Imagen eliminada.');
            return $this->redirect(['update', 'id' => $svcId]);
        }
        throw new NotFoundHttpException('Imagen no encontrada.');
    }

    public function actionToggle(int $id): Response
    {
        $model = $this->findModel($id);
        $model->activo = !$model->activo;
        $model->save(false);
        return $this->redirect(Yii::$app->request->referrer ?: ['divisiones/view', 'id' => $model->division_id]);
    }

    private function saveUploadedImages(int $svcId, array $files): void
    {
        $dir = \Yii::getAlias('@webroot/images/servicios');
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
        $orden = (int) ServicioImagenes::find()
            ->where(['servicio_id' => $svcId])
            ->max('orden');

        foreach ($files as $file) {
            if ($file->error === UPLOAD_ERR_NO_FILE) {
                continue;
            }
            $name = uniqid('svc_', false) . '.' . $file->extension;
            if ($file->saveAs($dir . '/' . $name)) {
                $img = new ServicioImagenes([
                    'servicio_id' => $svcId,
                    'url'         => $name,
                    'orden'       => ++$orden,
                ]);
                $img->save(false);
            }
        }
    }

    private function findModel(int $id): Servicios
    {
        $model = Servicios::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException('Servicio no encontrado.');
        }
        return $model;
    }
}
