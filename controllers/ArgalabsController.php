<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Publicaciones;
use app\models\Imagenes;

class ArgalabsController extends Controller
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
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();
        return $this->render('index',[
            'rutas' => $rutas,            
        ]);
    }

    public function actionHigiene()
    {
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();
        return $this->render('higiene',[
            'rutas' => $rutas,            
        ]);
        
    }

    public function actionEvaluaciones()
    {
        $publicaciones = Publicaciones::find()->where(['seccion' => 'labs'])->all();
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();
        return $this->render('evaluaciones', [
            'publicaciones' => $publicaciones,
            'rutas' => $rutas,
            ]);
    }

}
