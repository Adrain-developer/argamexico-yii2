<?php

namespace app\controllers;

use app\models\Divisiones;
use app\models\DivisionesSearch;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class DivisionesController extends Controller
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex(): string
    {
        $searchModel  = new DivisionesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView(int $id): string
    {
        $model = $this->findModel($id);
        $servicios = $model->servicios;

        return $this->render('view', [
            'model'     => $model,
            'servicios' => $servicios,
        ]);
    }

    public function actionCreate(): string|Response
    {
        $model = new Divisiones();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'División creada correctamente.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate(int $id): string|Response
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'División actualizada correctamente.');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete(int $id): Response
    {
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', 'División eliminada.');
        return $this->redirect(['index']);
    }

    public function actionToggle(int $id): Response
    {
        $model = $this->findModel($id);
        $model->activo = !$model->activo;
        $model->save(false);
        return $this->redirect(Yii::$app->request->referrer ?: ['index']);
    }

    private function findModel(int $id): Divisiones
    {
        $model = Divisiones::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException('División no encontrada.');
        }
        return $model;
    }
}
