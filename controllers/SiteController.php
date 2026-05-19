<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Imagenes;
use app\models\Divisiones;

class SiteController extends Controller
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
                    'logout' => ['get'],
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
    public function actionIndex(): string
    {
        $rutas = Imagenes::find()->where(['seccion' => 'index'])->one();

        $divisionesData = [];
        try {
            $divisiones = Divisiones::find()
                ->with(['serviciosActivos.imagenes'])
                ->where(['activo' => 1])
                ->all();
            $divisionesData = array_map(fn(Divisiones $d) => $d->toApiArray(), $divisiones);
        } catch (\Throwable) {
            // Tablas aún no migradas — la sección queda estática
        }

        return $this->render('index', [
            'rutas'     => $rutas,
            'divisiones' => $divisionesData,
        ]);
    }


    public function actionFire()
    {
        return $this->render('fire');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->render('admin');
            //return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render('admin');
            //return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContacto()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            print_r (Yii::$app->request->post());exit;
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contacto', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionConsultores()
    {
        return $this->render('consultores');
    }

    public function actionAdmin(){
        if(Yii::$app->user->isGuest){
            return $this->redirect(Yii::$app->urlManager->createUrl("site/login"));
        }else{
            return $this->render('admin');
        }
      
    }

    public function actionCatalogo(): string
    {
        $divisionesData = [];
        try {
            $divisiones = Divisiones::find()
                ->with(['serviciosActivos.imagenes'])
                ->where(['activo' => 1])
                ->all();
            $divisionesData = array_map(fn(Divisiones $d) => $d->toApiArray(), $divisiones);
        } catch (\Throwable) {
            // Tablas aún no migradas
        }

        return $this->render('catalogo', [
            'divisiones' => $divisionesData,
        ]);
    }

    public function actionAvisoprivacidad(){
        return $this->render('avisoprivacidad');
    }

    public function actionCodigoetica(){
        return $this->render('codigoetica');
    }

    public function actionQuejas(){
        return $this->render("quejas");
    }

}
