<?php

namespace app\controllers;

use app\models\Mascotas;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class MascotasController extends Controller
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
                    'delete'  => ['POST'],
                    'toggle'  => ['POST'],
                    'reorder' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex(): string
    {
        $dataProvider = new ActiveDataProvider([
            'query'      => Mascotas::find(),
            'pagination' => ['pageSize' => 30],
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate(): string|Response
    {
        return $this->saveModel(new Mascotas(), 'create');
    }

    public function actionUpdate(int $id): string|Response
    {
        return $this->saveModel($this->findModel($id), 'update');
    }

    private function saveModel(Mascotas $model, string $view): string|Response
    {
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save(false)) {
            Yii::$app->session->setFlash('success', 'Mascota guardada correctamente.');
            return $this->redirect(['index']);
        }

        return $this->render($view, [
            'model'    => $model,
            'imagenes' => Mascotas::availableImages(),
        ]);
    }

    /**
     * Reordena las mascotas según el array de IDs recibido (drag & drop).
     * Normaliza el campo `orden` a 1..n para evitar empalmes.
     */
    public function actionReorder(): Response
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $ids = (array) Yii::$app->request->post('ids', []);
        $orden = 1;
        foreach ($ids as $id) {
            Mascotas::updateAll(['orden' => $orden++], ['id' => (int) $id]);
        }
        return $this->asJson(['ok' => true]);
    }

    public function actionToggle(int $id): Response
    {
        $model = $this->findModel($id);
        $model->activo = !$model->activo;
        $model->save(false);
        return $this->redirect(Yii::$app->request->referrer ?: ['index']);
    }

    public function actionDelete(int $id): Response
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'Mascota eliminada.');
        return $this->redirect(['index']);
    }

    private function findModel(int $id): Mascotas
    {
        $model = Mascotas::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException('Mascota no encontrada.');
        }
        return $model;
    }
}
