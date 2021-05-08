<?php

namespace app\controllers;

use app\models\Categorias;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Productos;

class ArgafireController extends Controller
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
        return $this->render('index');
    }

    public function actionAcreditacion()
    {        
        return $this->render('acreditacion');
    }

    public function actionCatalogo(){
        $categorias = Categorias::find()->where(['tipo' => 'p'])->all();
        return $this->render('catalogo', ['categorias' => $categorias]);
    }

    public function actionGetproductos(){
        $post = Yii::$app->request->get();
        $productos = Productos::find()->where(['id_categoria' => $post['idCategoria']])->all();
        return $this->renderAjax('productos', ['productos' => $productos]);
    }

    public function actionMtto(){
        return $this->render('mtto');
    }


}
