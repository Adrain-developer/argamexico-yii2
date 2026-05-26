<?php

namespace app\controllers;

use app\models\Equipo;
use app\models\Divisiones;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

class EquipoController extends Controller
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [['allow' => true, 'roles' => ['@']]],
            ],
            'verbs' => [
                'class'   => VerbFilter::class,
                'actions' => [
                    'delete'      => ['POST'],
                    'remove-foto' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query'      => Equipo::find(),
            'pagination' => ['pageSize' => 30],
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate(): string|Response
    {
        $model = new Equipo();
        return $this->saveModel($model, 'create');
    }

    public function actionUpdate(int $id): string|Response
    {
        $model = $this->findModel($id);
        return $this->saveModel($model, 'update');
    }

    private function saveModel(Equipo $model, string $view): string|Response
    {
        if ($model->load(Yii::$app->request->post())) {
            $model->fotoFile = UploadedFile::getInstance($model, 'fotoFile');
            if ($model->validate() && $model->uploadFoto() && $model->save(false)) {
                Yii::$app->session->setFlash('success', 'Registro guardado correctamente.');
                return $this->redirect(['index']);
            }
        }

        return $this->render($view, [
            'model'      => $model,
            'divisiones' => Divisiones::find()->orderBy('nombre')->all(),
        ]);
    }

    public function actionRemoveFoto(int $id): Response
    {
        $model = $this->findModel($id);
        if ($model->foto) {
            $path = \Yii::getAlias('@webroot/images/equipo/') . $model->foto;
            if (is_file($path)) {
                @unlink($path);
            }
            $model->foto = null;
            $model->save(false);
            Yii::$app->session->setFlash('success', 'Foto eliminada correctamente.');
        }
        return $this->redirect(['update', 'id' => $id]);
    }

    public function actionDelete(int $id): Response
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Miembro del equipo eliminado.');
        return $this->redirect(['index']);
    }

    public function actionToggle(int $id): Response
    {
        $model = $this->findModel($id);
        $model->activo = !$model->activo;
        $model->save(false);
        return $this->redirect(Yii::$app->request->referrer ?: ['index']);
    }

    private function findModel(int $id): Equipo
    {
        $model = Equipo::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException('Miembro del equipo no encontrado.');
        }
        return $model;
    }
}
