<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    </style>
    <link rel='stylesheet' id='wp-block-library-css'  href='<?= Yii::$app->homeUrl ?>web/css/style.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='contact-form-7-css'  href='<?= Yii::$app->homeUrl ?>web/css/styles91d5.css?ver=5.4' type='text/css' media='all' />

    <link rel='stylesheet' id='animate-css'  href='<?= Yii::$app->homeUrl ?>web/css/animate4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-css'  href='<?= Yii::$app->homeUrl ?>web/css/bootstrap.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-datepicker-css'  href='<?= Yii::$app->homeUrl ?>web/css/bootstrap-datepicker.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='bootstrap-select-css'  href='<?= Yii::$app->homeUrl ?>web/css/bootstrap-select.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='fontawesome-all-css'  href='<?= Yii::$app->homeUrl ?>web/css/fontawesome-all4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='hover-min-css'  href='<?= Yii::$app->homeUrl ?>web/css/hover-min4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='jquery-bootstrap-touchspin-css'  href='<?= Yii::$app->homeUrl ?>web/css/jquery.bootstrap-touchspin.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='magnific-popup-css'  href='<?= Yii::$app->homeUrl ?>web/css/magnific-popup4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='nouislider-css'  href='<?= Yii::$app->homeUrl ?>web/css/nouislider4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='owl-carousel-css'  href='<?= Yii::$app->homeUrl ?>web/css/owl.carousel.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='owl-theme-default-css'  href='<?= Yii::$app->homeUrl ?>web/css/owl.theme.default.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='appointment-css'  href='<?= Yii::$app->homeUrl ?>web/css/appointment4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='datetimepicker-css'  href='<?= Yii::$app->homeUrl ?>web/css/datetimepicker4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='jquery-ui-css'  href='<?= Yii::$app->homeUrl ?>web/css/jquery-ui4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='indext-style-2-css'  href='<?= Yii::$app->homeUrl ?>web/css/style-24c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='icon-style-css'  href='<?= Yii::$app->homeUrl ?>web/css/style4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='indext--css'  href='<?= Yii::$app->homeUrl ?>web/css/style4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='responsive-css'  href='<?= Yii::$app->homeUrl ?>web/css/responsive4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='color-panel-css'  href='<?= Yii::$app->homeUrl ?>web/css/color-panel4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='indext-main-css'  href='<?= Yii::$app->homeUrl ?>web/css/style4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='indext-error-css'  href='<?= Yii::$app->homeUrl ?>web/css/error4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='indext-sidebar-css'  href='<?= Yii::$app->homeUrl ?>web/css/sidebar4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='indext-tut-css'  href='<?= Yii::$app->homeUrl ?>web/css/tut4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='indext-mfixing-css'  href='<?= Yii::$app->homeUrl ?>web/css/fixing4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='indext-rtl-css'  href='<?= Yii::$app->homeUrl ?>web/css/rtl4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='indext-theme-fonts-css'  href='https://fonts.googleapis.com/css?family=Noto+Serif%3A400%3B0%2C700%3B1%2C400%3B1%2C700&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />
    <link rel='stylesheet' id='main-color-css'  href='<?= Yii::$app->homeUrl ?>web/css/color0c43.css?main_color=ff5860&amp;ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='indext-google-fonts-css'  href='https://fonts.googleapis.com/css?family=Rubik%3A300%2C300i%2C400%2C400i%2C500%2C500i%2C600%2C600i%2C700%7CKaushan+Script&amp;subset=latin%2Clatin-ext&amp;ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='indext_preloader-css'  href='<?= Yii::$app->homeUrl ?>web/css/loader.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-icons-css'  href='<?= Yii::$app->homeUrl ?>web/css/elementor-icons.min21f9.css?ver=5.11.0' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-animations-css'  href='<?= Yii::$app->homeUrl ?>web/css/animations.minaeb9.css?ver=3.1.4' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-frontend-legacy-css'  href='<?= Yii::$app->homeUrl ?>web/css/frontend-legacy.minaeb9.css?ver=3.1.4' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-frontend-css'  href='<?= Yii::$app->homeUrl ?>web/css/frontend.minaeb9.css?ver=3.1.4' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-post-68-css'  href='<?= Yii::$app->homeUrl ?>web/css/post-683187.css?ver=1615693937' type='text/css' media='all' />
    <link rel='stylesheet' id='elementor-global-css'  href='<?= Yii::$app->homeUrl ?>web/css/global3187.css?ver=1615693937' type='text/css' media='all' />
    <link rel='stylesheet' id='google-fonts-1-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;ver=5.6.2' type='text/css' media='all' />


    <script type='text/javascript' src='web/js/jquery.min9d52.js?ver=3.5.1' id='jquery-core-js'></script>
    <script type='text/javascript' src='web/js/jquery-migrate.mind617.js?ver=3.3.2' id='jquery-migrate-js'></script>
</head>
<body class="home page-template page-template-tpl-default-elementor page-template-tpl-default-elementor-php page page-id-16 theme-indext woocommerce-no-js menu-layer elementor-default elementor-kit-68 elementor-page elementor-page-16">
<?php $this->beginBody() ?>
<div class="preloader"><span></span></div>
<main class="theme-layout boxed_wrapper ">
<div class="topbar-one">
    <div class="container">
        <div class="topbar-one__left">

            <div class="topbar-one__social">



                <div class="social-links-style1">
                    <a href="#" style="background-color:; color: "><span class="fab fa-facebook"></span></a>
                    <a href="#" style="background-color:; color: "><span class="fab fa-stack-overflow"></span></a>
                    <a href="https://www.facebook.com/" style="background-color:; color: "><span class="fab fa-twitter"></span></a>
                    <a href="#" style="background-color:; color: "><span class="fab fa-yelp"></span></a>
                    <a href="#" style="background-color:; color: "><span class="fab fa-youtube"></span></a>
                </div>

            </div>


        </div><!-- /.topbar-one__left -->
        <div class="topbar-one__right">
            <div class="topbar-one__links">


                <a href="#" class="topbar-one__search search-popup__toggler"><i class="indext-icon-Search"></i>
                </a>


                <a href="shop/index.html" class="topbar-one__cart"><i class="indext-icon-Bag"></i>
                    <!-- /.indext-icon-Bag --></a><!-- /.topbar-one__cart -->



                <a href="#" class="topbar-one__link"><i class="indext-icon-clock"></i><!-- /.indext-icon-clock -->Mon - Fri: 9.00 - 18.00</a>

                <!-- /.topbar-one__link -->

                <a href="https://mail.google.com" class="topbar-one__link"><i class="indext-icon-envelope"></i>
                    <!-- /.indext-icon-envelope -->argaconsultores.mexico@gmail.com</a>


            </div><!-- /.topbar-one__links -->
        </div><!-- /.topbar-one__right -->
    </div><!-- /.container -->
</div><!-- /.topbar-one -->

<div class="wrap">
    <header class="site-header site-header__header-one site-header__home-one ">
        <nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
            <div class="container clearfix">
                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="logo-box"> <div class="navbar-brand">
                        <a href="index.php" title="indext"><img src="./web/images/logo2.jpg" alt="logo" style="" /></a></div>
                    <div class="mobile-nav-toggler"> <span class="fa fa-bars"></span> </div> </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="main-navigation">
                    <ul class=" navigation-box @@extra_class">
                        <li id="menu-item-45" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16 active current"><a title="ARGA Group" href="index.php" class="hvr-underline-from-left1" data-scroll data-options="easing: easeOutQuart">ARGA Group</a></li>
                        <li id="menu-item-46" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-46 dropdown"><a title="Fire" href="./arga-fire.php" data-toggle="dropdown1" class="hvr-underline-from-left1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">ARGA Fire</a>
                            <ul role="menu" class="submenu">
                                <li id="menu-item-36" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a title="Mantenimiento" href="about-one/index.html">Mantenimiento y Recarga de equipos de emergencia</a></li>
                                <li id="menu-item-420" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-420"><a  href="projects-one/index.html">Extintores de polvos universales (Fuegos ABC)</a></li>
                                <li id="menu-item-412" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-412"><a  href="projects-one/index.html">Extintores de polvo químico seco (Fuego de clase BC)</a></li>
                                <li id="menu-item-411" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-411"><a  href="projects-two/index.html">Extintor de CO2</a></li>
                                <li id="menu-item-410" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-410"><a  href="projects-three/index.html">Extintores hídricos cargados con agua o con espuma AR-AFFF</a></li>
                                <li id="menu-item-410" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-410"><a  href="projects-three/index.html">Extintor de HFC-236-FA Hexafl</a></li>
                                <li id="menu-item-410" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-410"><a  href="projects-three/index.html">Pruebas de recipientes de baja y alta presión</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-413" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-413 dropdown"><a title="Consultoría" href="330-2/index.html" data-toggle="dropdown1" class="hvr-underline-from-left1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">ARGA Consultoría</a>
                            <ul role="menu" class="submenu">
                                <li id="menu-item-418" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-418"><a href="services-one/index.html">Estudios  Regulatorios  de  la Secretaria <br>del Trabajo y Prevencion Social</a></li>
                                <li id="menu-item-909" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-909"><a href="home-building-repair-3/index.html">Estudios  de Salud e Higiene Laboral</a></li>
                                <li id="menu-item-910" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-910"><a href="home-building-repair-2/index.html">Protección Civil</a></li>
                                <li id="menu-item-912" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-912"><a href="building-construction/index.html">Medio Ambiente</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-643" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-643 dropdown"><a title="Traning" href="about-01/index.html" data-toggle="dropdown1" class="hvr-underline-from-left1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">ARGA Traning</a>
                            <ul role="menu" class="submenu">
                                <li id="menu-item-659" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-659"><a title="About" href="about-01/index.html">Seguridad Industrial</a></li>
                                <li id="menu-item-932" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-932"><a title="Miscellaneous 01" href="section-title/index.html">Protección Civil y Emergencias</a></li>
                                <li id="menu-item-964" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-964"><a title="Miscellaneous 02" href="company/index.html">Desarrollo Humano y Organizacional</a></li>
                                <li id="menu-item-706" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-706"><a title="Team" href="team-01/index.html">Curso combate contra incendios</a></li>
                            </ul>
                        </li>
                        <li id="menu-item-849" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-849 dropdown"><a title="Lab" href="shop/index.html" data-toggle="dropdown1" class="hvr-underline-from-left1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">ARGA Labs</a>
                            <ul role="menu" class="submenu">
                                <li id="menu-item-1641" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1641"><a href="shop/index.html">LAB</a></li>
                                <li id="menu-item-1640" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1640"><a href="cart/index.html">LAB</a></li>
                            </ul>
                        </li>
                       
                    </ul>
                </div><!-- /.navbar-collapse -->
                <div class="right-side-box">
                    <a href="appointment/index.html" class="thm-btn site-header__qoute-btn">Contácto<i class="fa fa-long-arrow-right"></i>
                    </a><!-- /.thm-btn -->
                </div>
            </div>
            <!-- /.container -->
        </nav>
        <!-- Mobile Menu  -->
        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-remove"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="index.html" title="indext"><img src="wp-content/uploads/2020/05/full-light-logo.png" alt="logo" style="" /></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <!--Social Links-->

                <div class="social-links">



                    <ul class="clearfix">
                        <li> <a href="#" style="background-color:; color: "><span class="fab fa-facebook"></span></a></li>
                        <li> <a href="#" style="background-color:; color: "><span class="fab fa-stack-overflow"></span></a></li>
                        <li> <a href="https://www.facebook.com/" style="background-color:; color: "><span class="fab fa-twitter"></span></a></li>
                        <li> <a href="#" style="background-color:; color: "><span class="fab fa-yelp"></span></a></li>
                        <li> <a href="#" style="background-color:; color: "><span class="fab fa-youtube"></span></a></li>
                    </ul>

                </div>

            </nav>
        </div><!-- End Mobile Menu -->

    </header>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/wp-polyfill.min89b1.js?ver=7.4.4' id='wp-polyfill-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/i18n.mina706.js?ver=ac389435e7fd4ded01cf603f3aaba6a6' id='wp-i18n-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/lodash.minf492.js?ver=4.17.19' id='lodash-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/url.min534b.js?ver=98645f0502e5ed8dadffd161e39072d2' id='wp-url-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/hooks.min110c.js?ver=84b89ab09cbfb4469f02183611cc0939' id='wp-hooks-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/api-fetch.min44e0.js?ver=4dec825c071b87c57f687eb90f7c23c3' id='wp-api-fetch-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/index91d5.js?ver=5.4' id='contact-form-7-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/core.min35d0.js?ver=1.12.1' id='jquery-ui-core-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/appear431f.js?ver=2.1.2' id='appear-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/bootstrap-datepicker.min431f.js?ver=2.1.2' id='bootstrap-datepicker-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/bootstrap.bundle.min431f.js?ver=2.1.2' id='bootstrap-bundle-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/bootstrap-select.min431f.js?ver=2.1.2' id='bootstrap-select-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/isotope431f.js?ver=2.1.2' id='isotope-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/jquery.bootstrap-touchspin.min431f.js?ver=2.1.2' id='jquery-bootstrap-touchspin-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/jquery.counterup.min431f.js?ver=2.1.2' id='jquery-counterup-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/jquery.magnific-popup.min431f.js?ver=2.1.2' id='magnific-popup-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/nouislider431f.js?ver=2.1.2' id='nouislider-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/owl.carousel.min431f.js?ver=2.1.2' id='owl-carousel-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/TweenMax.min431f.js?ver=2.1.2' id='TweenMax-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/waypoints.min431f.js?ver=2.1.2' id='waypoints-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/html5lightbox/html5lightbox431f.js?ver=2.1.2' id='html5lightbox-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/wow.min431f.js?ver=2.1.2' id='wow-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/jquery-ui431f.js?ver=2.1.2' id='jquery-ui-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/knob431f.js?ver=2.1.2' id='knob-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/jquery.fancybox431f.js?ver=2.1.2' id='jquery-fancybox-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/themepanel431f.js?ver=2.1.2' id='themepanel-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/script4c7e.js?ver=5.6.2' id='indext-main-script-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/comment-reply.min4c7e.js?ver=5.6.2' id='comment-reply-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/wp-embed.min4c7e.js?ver=5.6.2' id='wp-embed-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/webpack.runtime.minaeb9.js?ver=3.1.4' id='elementor-webpack-runtime-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/frontend-modules.minaeb9.js?ver=3.1.4' id='elementor-frontend-modules-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/dialog.mina288.js?ver=4.8.1' id='elementor-dialog-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/waypoints.min05da.js?ver=4.0.2' id='elementor-waypoints-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/share-link.minaeb9.js?ver=3.1.4' id='share-link-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/swiper.min48f5.js?ver=5.3.6' id='swiper-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/frontend.minaeb9.js?ver=3.1.4' id='elementor-frontend-js'></script>
    <script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/preloaded-elements-handlers.minaeb9.js?ver=3.1.4' id='preloaded-elements-handlers-js'></script>



</main>


<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
