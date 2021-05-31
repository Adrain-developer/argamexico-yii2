<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Eventos;
use app\models\Imagenes;

class ArgatrainingController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $cursos = Eventos::find()->where(['id_categoria' => '3'])->all();
        $cursosOnline = Eventos::find()->where(['id_categoria' => '1'])->all();
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();
        return $this->render('index', [
            'cursos' => $cursos, 
            'cursosOnline' => $cursosOnline,
            'rutas' => $rutas,
            ]);
    }

    public function actionSendfile($id){
     $curso = Eventos::find()->where(['id' => $id])->one();
     if (file_exists($curso->pathInfo)) {
        return Yii::$app->response->sendFile($curso->pathInfo, 'Curso_arga.pdf');
    }
    }


}
