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

class ArgaconsultoresController extends Controller
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
        $publicaciones = Publicaciones::find()->where(['seccion' => 'consultores'])->all();
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one(); 
        return $this->render('index', [
            'publicaciones' => $publicaciones,
            'rutas' => $rutas,
            ]);
    }

    public function actionSeguridadlaboral(){
        $publicaciones = Publicaciones::find()->where(['seccion' => 'consultores', 'subseccion' => 'Seguridadlaboral'])->all();
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();
        return $this->render('seguridad', [
            'publicaciones' => $publicaciones,
            'rutas' => $rutas,
            ]);
    }

    public function actionSaludocupacional(){
        $publicaciones = Publicaciones::find()->where(['seccion' => 'consultores', 'subseccion' => 'SaludOcupacional'])->all();
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();
        return $this->render('salud', [
            'publicaciones' => $publicaciones,
            'rutas' => $rutas,
            ]);
    }

    public function actionProteccionambiente(){
        $publicaciones = Publicaciones::find()->where(['seccion' => 'consultores', 'subseccion' => 'ProteccionMedioAmbiente'])->all();
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();
        return $this->render('proteccion', [
            'publicaciones' => $publicaciones,
            'rutas' => $rutas,
            ]);
    }

    public function actionGestionservicios(){
        $publicaciones = Publicaciones::find()->where(['seccion' => 'consultores', 'subseccion' => 'GestionServicios'])->all();
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();
        return $this->render('gestion', [
            'publicaciones' => $publicaciones,
            'rutas' => $rutas,
            ]);
    }


}
