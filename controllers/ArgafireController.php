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
use app\models\Imagenes;

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
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one(); 
        return $this->render('index',[
            'rutas' => $rutas, 
        ]);
    }

    public function actionAcreditacion()
    {    
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();     
        return $this->render('acreditacion',[
            'rutas' => $rutas, 
        ]);
    }

    public function actionCatalogo(){
        $categorias = Categorias::find()->where(['tipo' => 'p'])->all();
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one(); 
        return $this->render('catalogo', [
            'categorias' => $categorias, 
            'rutas' => $rutas,
        ]);
    }

    public function actionGetproductos(){
        $post = Yii::$app->request->get();
        $productos = Productos::find()->where(['id_categoria' => $post['idCategoria']])->all();
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();
        return $this->renderAjax('productos', [
            'productos' => $productos,
            'rutas' => $rutas,
            ]);
    }

    public function actionMtto(){
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one(); 
        return $this->render('mtto',[
            'rutas' => $rutas, 
        ]);
    }

    public function actionDetalle(){
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();
        $get = Yii::$app->request->get();
        $id = $get['id'];
        $producto = Productos::find()->where(['id' => $id])->one();
        $categorias = Categorias::find()->where(['tipo' => 'p'])->all();
        
        return $this->render('detalle',[
            'rutas' => $rutas,
            'producto' => $producto,
            'categorias' => $categorias,
        ]);
    }


}
