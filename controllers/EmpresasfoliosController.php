<?php

namespace app\controllers;

use app\models\EmpresasFolios;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class EmpresasfoliosController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $empresas = EmpresasFolios::find()->all();
        return $this->render('index', ['empresas' => $empresas]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = EmpresasFolios::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
