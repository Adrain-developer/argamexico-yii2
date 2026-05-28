<?php

namespace app\controllers;

use yii\web\Controller;

class DemoController extends Controller
{
    public $layout = false;

    public function actionIndex(): string
    {
        return $this->render('index');
    }

    public function actionDashboard(): string
    {
        return $this->render('dashboard/index');
    }

    public function actionEditDivision(): string
    {
        return $this->render('dashboard/edit-division');
    }
}
