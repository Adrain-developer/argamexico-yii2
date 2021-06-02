<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
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

	<style>
		.site-header__header-one .header-navigation ul.navigation-box>li.current>a,
		.site-header__header-one .header-navigation ul.navigation-box>li:hover>a {

			color: #751004 !important;
		}

		.site-header__home-one .header-navigation .logo-box:after {
			background-color: #ff000000 !important;
		}

		.logo-box img {
			width: 222px !important;
		}

		.site-header__header-one .header-navigation .logo-box::before {
			background-color: #ffffff !important;
			box-shadow: 2px 2px 5px #2d2d2d87;
		}


		.site-header__home-one .header-navigation .logo-box::before {
			left: -999px !important;

		}

		.footer-widget__social a.fa-whatsapp-f {
			background-color: #4a6fbe !important;
		}

		.footer-widget__social a.fa-whatsapp-f:hover {
			color: #4a6fbe !important;
			background-color: #fff !important;
		}

		.header-navigation ul.navigation-box {
			padding-left: 160px !important;
		}
	</style>


	<script type="text/javascript">
		window._wpemojiSettings = {
			"baseUrl": "https:\/\/s.w.org\/images\/core\/emoji\/13.0.1\/72x72\/",
			"ext": ".png",
			"svgUrl": "https:\/\/s.w.org\/images\/core\/emoji\/13.0.1\/svg\/",
			"svgExt": ".svg",
			"source": {
				"concatemoji": "http:\/\/old4.commonsupport.com\/update\/indext\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.6.2"
			}
		};
		! function(e, a, t) {
			var n, r, o, i = a.createElement("canvas"),
				p = i.getContext && i.getContext("2d");

			function s(e, t) {
				var a = String.fromCharCode;
				p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, e), 0, 0);
				e = i.toDataURL();
				return p.clearRect(0, 0, i.width, i.height), p.fillText(a.apply(this, t), 0, 0), e === i.toDataURL()
			}

			function c(e) {
				var t = a.createElement("script");
				t.src = e, t.defer = t.type = "text/javascript", a.getElementsByTagName("head")[0].appendChild(t)
			}
			for (o = Array("flag", "emoji"), t.supports = {
					everything: !0,
					everythingExceptFlag: !0
				}, r = 0; r < o.length; r++) t.supports[o[r]] = function(e) {
				if (!p || !p.fillText) return !1;
				switch (p.textBaseline = "top", p.font = "600 32px Arial", e) {
					case "flag":
						return s([127987, 65039, 8205, 9895, 65039], [127987, 65039, 8203, 9895, 65039]) ? !1 : !s([55356, 56826, 55356, 56819], [55356, 56826, 8203, 55356, 56819]) && !s([55356, 57332, 56128, 56423, 56128, 56418, 56128, 56421, 56128, 56430, 56128, 56423, 56128, 56447], [55356, 57332, 8203, 56128, 56423, 8203, 56128, 56418, 8203, 56128, 56421, 8203, 56128, 56430, 8203, 56128, 56423, 8203, 56128, 56447]);
					case "emoji":
						return !s([55357, 56424, 8205, 55356, 57212], [55357, 56424, 8203, 55356, 57212])
				}
				return !1
			}(o[r]), t.supports.everything = t.supports.everything && t.supports[o[r]], "flag" !== o[r] && (t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && t.supports[o[r]]);
			t.supports.everythingExceptFlag = t.supports.everythingExceptFlag && !t.supports.flag, t.DOMReady = !1, t.readyCallback = function() {
				t.DOMReady = !0
			}, t.supports.everything || (n = function() {
				t.readyCallback()
			}, a.addEventListener ? (a.addEventListener("DOMContentLoaded", n, !1), e.addEventListener("load", n, !1)) : (e.attachEvent("onload", n), a.attachEvent("onreadystatechange", function() {
				"complete" === a.readyState && t.readyCallback()
			})), (n = t.source || {}).concatemoji ? c(n.concatemoji) : n.wpemoji && n.twemoji && (c(n.twemoji), c(n.wpemoji)))
		}(window, document, window._wpemojiSettings);
	</script>
	<style type="text/css">
		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 .07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}
	</style>

	<link rel='stylesheet' id='wp-block-library-css' href='<?= Yii::$app->homeUrl ?>web/css/style.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='wc-block-vendors-style-css' href='<?= Yii::$app->homeUrl ?>web/css/vendors-stylecb20.css?ver=4.4.3' type='text/css' media='all' />
	<link rel='stylesheet' id='contact-form-7-css' href='<?= Yii::$app->homeUrl ?>web/css/styles91d5.css?ver=5.4' type='text/css' media='all' />
	<link rel='stylesheet' id='woocommerce-layout-css' href='<?= Yii::$app->homeUrl ?>web/css/woocommerce-layout0e7d.css?ver=5.1.0' type='text/css' media='all' />
	<link rel='stylesheet' id='woocommerce-smallscreen-css' href='<?= Yii::$app->homeUrl ?>web/css/woocommerce-smallscreen0e7d.css?ver=5.1.0' type='text/css' media='only screen and (max-width: 768px)' />
	<link rel='stylesheet' id='woocommerce-general-css' href='<?= Yii::$app->homeUrl ?>web/css/woocommerce0e7d.css?ver=5.1.0' type='text/css' media='all' />
	<style id='woocommerce-inline-inline-css' type='text/css'>
		.woocommerce form .form-row .required {
			visibility: visible;
		}
	</style>

	<link rel='stylesheet' href='<?= Yii::$app->homeUrl ?>web/css/custom.css' type='text/css' media='all' />
	<link rel='stylesheet' id='animate-css' href='<?= Yii::$app->homeUrl ?>web/css/animate4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='bootstrap-css' href='<?= Yii::$app->homeUrl ?>web/css/bootstrap.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='bootstrap-datepicker-css' href='<?= Yii::$app->homeUrl ?>web/css/bootstrap-datepicker.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='bootstrap-select-css' href='<?= Yii::$app->homeUrl ?>web/css/bootstrap-select.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='fontawesome-all-css' href='<?= Yii::$app->homeUrl ?>web/css/fontawesome-all4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='hover-min-css' href='<?= Yii::$app->homeUrl ?>web/css/hover-min4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='jquery-bootstrap-touchspin-css' href='<?= Yii::$app->homeUrl ?>web/css/jquery.bootstrap-touchspin.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='magnific-popup-css' href='<?= Yii::$app->homeUrl ?>web/css/magnific-popup4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='nouislider-css' href='<?= Yii::$app->homeUrl ?>web/css/nouislider4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='owl-carousel-css' href='<?= Yii::$app->homeUrl ?>web/css/owl.carousel.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='owl-theme-default-css' href='<?= Yii::$app->homeUrl ?>web/css/owl.theme.default.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='appointment-css' href='<?= Yii::$app->homeUrl ?>web/css/appointment4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='datetimepicker-css' href='<?= Yii::$app->homeUrl ?>web/css/datetimepicker4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='jquery-ui-css' href='<?= Yii::$app->homeUrl ?>web/css/jquery-ui4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext-style-2-css' href='<?= Yii::$app->homeUrl ?>web/css/style-24c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='icon-style-css' href='<?= Yii::$app->homeUrl ?>web/css/style4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext--css' href='<?= Yii::$app->homeUrl ?>web/css/style4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='responsive-css' href='<?= Yii::$app->homeUrl ?>web/css/responsive4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='color-panel-css' href='<?= Yii::$app->homeUrl ?>web/css/color-panel4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext-main-css' href='<?= Yii::$app->homeUrl ?>web/css/style4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext-error-css' href='<?= Yii::$app->homeUrl ?>web/css/error4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext-sidebar-css' href='<?= Yii::$app->homeUrl ?>web/css/sidebar4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext-tut-css' href='<?= Yii::$app->homeUrl ?>web/css/tut4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext-mfixing-css' href='<?= Yii::$app->homeUrl ?>web/css/fixing4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext-woocommerce-css' href='<?= Yii::$app->homeUrl ?>web/css/woocommerce4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext-rtl-css' href='<?= Yii::$app->homeUrl ?>web/css/rtl4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext-theme-fonts-css' href='https://fonts.googleapis.com/css?family=Noto+Serif%3A400%3B0%2C700%3B1%2C400%3B1%2C700&amp;subset=latin%2Clatin-ext' type='text/css' media='all' />
	<link rel='stylesheet' id='main-color-css' href='<?= Yii::$app->homeUrl ?>web/css/color0c43.css?main_color=ff5860&amp;ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext-google-fonts-css' href='https://fonts.googleapis.com/css?family=Rubik%3A300%2C300i%2C400%2C400i%2C500%2C500i%2C600%2C600i%2C700%7CKaushan+Script&amp;subset=latin%2Clatin-ext&amp;ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='indext_preloader-css' href='<?= Yii::$app->homeUrl ?>web/css/loader.min4c7e.css?ver=5.6.2' type='text/css' media='all' />
	<link rel='stylesheet' id='elementor-icons-css' href='<?= Yii::$app->homeUrl ?>web/css/elementor-icons.min21f9.css?ver=5.11.0' type='text/css' media='all' />
	<link rel='stylesheet' id='elementor-animations-css' href='<?= Yii::$app->homeUrl ?>web/css/animations.minaeb9.css?ver=3.1.4' type='text/css' media='all' />
	<link rel='stylesheet' id='elementor-frontend-legacy-css' href='<?= Yii::$app->homeUrl ?>web/css/frontend-legacy.minaeb9.css?ver=3.1.4' type='text/css' media='all' />
	<link rel='stylesheet' id='elementor-frontend-css' href='<?= Yii::$app->homeUrl ?>web/css/frontend.minaeb9.css?ver=3.1.4' type='text/css' media='all' />
	<link rel='stylesheet' id='elementor-post-68-css' href='<?= Yii::$app->homeUrl ?>web/css/post-683187.css?ver=1615693937' type='text/css' media='all' />
	<link rel='stylesheet' id='elementor-global-css' href='<?= Yii::$app->homeUrl ?>web/css/global3187.css?ver=1615693937' type='text/css' media='all' />
	<link rel='stylesheet' id='google-fonts-1-css' href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&amp;ver=5.6.2' type='text/css' media='all' />


	<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/jquery.min9d52.js?ver=3.5.1' id='jquery-core-js'></script>
	<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/jquery-migrate.mind617.js?ver=3.3.2' id='jquery-migrate-js'></script>

	<link rel='stylesheet' href='<?= Yii::$app->homeUrl ?>web/css/sidebar.css' type='text/css' media='all' />

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>


<body class="home page-template page-template-tpl-default-elementor page-template-tpl-default-elementor-php page page-id-16 theme-indext woocommerce-no-js menu-layer elementor-default elementor-kit-68 elementor-page elementor-page-16">

	<div class="preloader"><span></span></div>
	<main class="theme-layout boxed_wrapper ">
		<div class="topbar-one">
			<div class="container">
				<div class="topbar-one__left">

					<div class="topbar-one__social">



						<div class="social-links-style1">
							<a href="https://www.facebook.com/ARGA-Consultores-M%C3%A9xico-448930612267259"><span class="fab fa-facebook"></span></a>
							<a href="https://www.facebook.com/ARGA-Consultores-M%C3%A9xico-448930612267259"><span class="fab fa-whatsapp"></span></a>
							<!--<a href="#"><span class="fab fa-twitter"></span></a>
                    <a href="#"><span class="fab fa-yelp"></span></a>
                   <a href="#"><span class="fab fa-youtube"></span></a>-->
						</div>

					</div>


				</div><!-- /.topbar-one__left -->
				<div class="topbar-one__right">
					<div class="topbar-one__links">
						<a href="#" class="topbar-one__link"><i class="fa fa-clock-o"></i><!-- /.indext-icon-clock -->Lun - Vie: 9.00 - 18.00</a>

						<!-- /.topbar-one__link -->

						<a href="https://mail.google.com" class="topbar-one__link"><i class="fa fa-envelope"></i>
							<!-- /.indext-icon-envelope -->info@argamexico.com</a>




					</div><!-- /.topbar-one__links -->
				</div><!-- /.topbar-one__right -->
			</div><!-- /.container -->
		</div><!-- /.topbar-one -->

		<header class="site-header site-header__header-one site-header__home-one ">
			<nav class="navbar navbar-expand-lg navbar-light header-navigation stricky">
				<div class="container clearfix">
					<!-- Brand and toggle get grouped for better mobile display -->

					<div class="logo-box">
						<div class="navbar-brand">
							<a href="<?= Url::toRoute(['./index.php']); ?>" title="indext"><img src='<?= Yii::$app->homeUrl ?>web/images/logo2.png' alt="logo" style="" /></a>
						</div>
						<div class="mobile-nav-toggler"> <span class="fa fa-bars"></span> </div>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="main-navigation">
						<ul class=" navigation-box @@extra_class">
							<li id="menu-item-45" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16 active current"><a title="ARGA Group" href="<?= Url::toRoute(['./index.php']); ?>" class="hvr-underline-from-left1" data-scroll data-options="easing: easeOutQuart">Inicio</a></li>
							<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-46 dropdown"><a title="Fire" data-toggle="dropdown1" class="hvr-underline-from-left1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">Acreditaciones</a>
								<ul role="menu" class="submenu">
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a title="Mantenimiento" href="<?= Url::toRoute(['#']); ?>">Aviso de Privacidad</a></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a title="Mantenimiento" href="<?= Url::toRoute(['#']); ?>">Código de Ética</a></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a title="Mantenimiento" href="<?= Url::toRoute(['#']); ?>">Política de Confiabilidad</a></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a title="Mantenimiento" href="<?= Url::toRoute(['#']); ?>">Política de Privacidad</a></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a title="Mantenimiento" href="<?= Url::toRoute(['argafire/acreditacion']); ?>">Normativas</a></li>
								</ul>

							</li>
							<li id="menu-item-46" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-46 dropdown"><a title="Fire"  data-toggle="dropdown1" class="hvr-underline-from-left1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">ARGA Fire</a>
								<ul role="menu" class="submenu">
									<li id="menu-item-36" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a title="Mantenimiento" href="<?= Url::toRoute(['argafire/extintores']); ?>">Mantenimiento de extintores</a></li>
									<li id="menu-item-36" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-36"><a title="Mantenimiento" href="<?= Url::toRoute(['argafire/mtto']); ?>">Mantenimiento de equipos fijos contra incendios</a></li>
									<li id="menu-item-420" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-420"><a href="<?= Url::toRoute(['argafire/catalogo']); ?>">Venta de Productos</a></li>
								</ul>
							</li>
							<li id="menu-item-413" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-413"><a title="Consultoría" href="<?= Url::toRoute(['argaconsultores/index']); ?>" data-toggle="dropdown1" class="hvr-underline-from-left1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">ARGA Consultores</a>
								<!-- <ul role="menu" class="submenu">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-418"><a href="<?= Url::toRoute(['argaconsultores/index#cseguridad']); ?>">Condiciones de seguridad</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-909"><a href="<?= Url::toRoute(['argaconsultores/index#c111']); ?>">Seguridad, prevención y protección</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-910"><a href="<?= Url::toRoute(['argaconsultores/index#c222']); ?>">Protección y dispositivos</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-912"><a href="<?= Url::toRoute(['argaconsultores/index#c333']); ?>">Materiales de seguridad</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-912"><a href="<?= Url::toRoute(['argaconsultores/index#c444']); ?>">Equipo de protección personal</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-912"><a href="<?= Url::toRoute(['argaconsultores/index#c555']); ?>">Recipientes</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-912"><a href="<?= Url::toRoute(['argaconsultores/index#c666']); ?>">Actividades</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-912"><a href="<?= Url::toRoute(['argaconsultores/index#c777']); ?>">Administración de trabajo y seguridad</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-912"><a href="<?= Url::toRoute(['argaconsultores/index#c888']); ?>">Instalaciones eléctricas</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-912"><a href="<?= Url::toRoute(['argaconsultores/index#c000']); ?>">Servicios preventivos</a></li>
                            </ul>-->
							</li>
							<li id="menu-item-849" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-849 dropdown"><a title="Lab" data-toggle="dropdown1" class="hvr-underline-from-left1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">ARGA Labs</a>
								<ul role="menu" class="submenu">
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1641"><a href="<?= Url::toRoute(['argalabs/evaluaciones']); ?>">Fuentes fijas y emisiones a la Atmósfera</a></li>
									<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1640"><a href="<?= Url::toRoute(['./argalabs/higiene']); ?>">Higiene laboral</a></li>
								</ul>
							</li>
							<li id="menu-item-643" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-643"><a title="Traning" href="<?= Url::toRoute(['argatraining/index']); ?>" data-toggle="dropdown1" class="hvr-underline-from-left1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">ARGA Training</a>
								<!--<ul role="menu" class="submenu">
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-659"><a title="About" href="#">Seguridad Industrial</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-932"><a title="Miscellaneous 01" href="#">Protección Civil y Emergencias</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-964"><a title="Miscellaneous 02" href="company/index.html">Desarrollo Humano y Organizacional</a></li>
                                <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-706"><a title="Team" href="#">Curso combate contra incendios</a></li>
                            </ul>-->
							</li>
							<li id="menu-item-849" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-849"><a title="Lab" href="<?= Url::toRoute(['contactos/create']); ?>" data-toggle="dropdown1" class="hvr-underline-from-left1" aria-expanded="false" data-scroll data-options="easing: easeOutQuart">Contacto</a>

							</li>
						</ul>
					</div><!-- /.navbar-collapse -->
					<!--<div class="right-side-box">
						<a href="<?= Url::toRoute(['/contact.php']); ?>" class="thm-btn site-header__qoute-btn">Contacto<i class="fa fa-long-arrow-right"></i>
						</a> /.thm-btn 
					</div>-->
				</div>
				<!-- /.container -->
			</nav>
			<!-- Mobile Menu  -->
			<!-- Mobile Menu  -->
			<div class="mobile-menu">
				<div class="menu-backdrop"></div>
				<div class="close-btn"><span class="icon flaticon-remove"></span></div>

				<nav class="menu-box">
					<div class="nav-logo"><a href="<?= Url::toRoute(['./index.php']); ?>" title="indext"><img src="<?= Yii::$app->homeUrl ?>web/images/logo2.png" alt="logo" style="" /></a></div>
					<div class="menu-outer">
						<!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
					</div>
					<!--Social Links-->

					<div class="social-links">



						<ul class="clearfix">
							<li> <a href="https://www.facebook.com/ARGA-Consultores-M%C3%A9xico-448930612267259" style="background-color:; color: "><span class="fab fa-facebook"></span></a></li>
							<li> <a href="#" style="background-color:; color: "><span class="fa fa-whatsapp"></span></a></li>
						</ul>

					</div>

				</nav>
			</div><!-- End Mobile Menu -->

		</header>

		<?= $content ?>


		<div data-elementor-type="section" data-elementor-id="47" class="elementor elementor-47" data-elementor-settings="[]">
			<div class="elementor-inner">
				<div class="elementor-section-wrap">
					<section class="elementor-section elementor-top-section elementor-element elementor-element-6facfd8a elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="6facfd8a" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
						<div class="elementor-container elementor-column-gap-no">
							<div class="elementor-row">
								<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-14fd9e4c" data-id="14fd9e4c" data-element_type="column">
									<div class="elementor-column-wrap elementor-element-populated">
										<div class="elementor-widget-wrap">
											<div class="elementor-element elementor-element-19b2801 elementor-widget elementor-widget-indext_footer" data-id="19b2801" data-element_type="widget" data-widget_type="indext_footer.default">
												<div class="elementor-widget-container">
													<footer class=" site-footer">
														<div class="site-footer__brand">
															<div class="container">
																<div class="site-footer__brand-carousel owl-carousel owl-theme">

																	<div class="item">
																		<a href="<?= Url::toRoute('argaconsultores/index'); ?>">
																			<img src="<?= Yii::$app->homeUrl ?>web/images/s1.png" alt="brand image">
																		</a>
																	</div><!-- /.item -->


																	<div class="item">
																		<a href="<?= Url::toRoute('argafire/index'); ?>">
																			<img src="<?= Yii::$app->homeUrl ?>web/images/s2.png" alt="brand image">
																		</a>
																	</div><!-- /.item -->


																	<div class="item">
																		<a href="<?= Url::toRoute('./index.php') ?>">
																			<img src="<?= Yii::$app->homeUrl ?>web/images/s3.png" alt="brand image">
																		</a>
																	</div><!-- /.item -->


																	<div class="item">
																		<a href="<?= Url::toRoute('argalabs/index'); ?>">
																			<img src="<?= Yii::$app->homeUrl ?>web/images/s4.png" alt="brand image">
																		</a>
																	</div><!-- /.item -->


																	<div class="item">
																		<a href="<?= Url::toRoute('argatraining/index'); ?>">
																			<img src="<?= Yii::$app->homeUrl ?>web/images/s5.png" alt="brand image">
																		</a>
																	</div><!-- /.item -->


																	<div class="item">
																		<a href="<?= Url::toRoute('argaconsultores/index'); ?>">
																			<img src="<?= Yii::$app->homeUrl ?>web/images/s1.png" alt="brand image">
																		</a>
																	</div><!-- /.item -->


																	<div class="item">
																		<a href="<?= Url::toRoute('argafire/index'); ?>">
																			<img src="<?= Yii::$app->homeUrl ?>web/images/s2.png" alt="brand image">
																		</a>
																	</div><!-- /.item -->


																	<div class="item">
																		<a href="<?= Url::toRoute('./index.php') ?>">
																			<img src="<?= Yii::$app->homeUrl ?>web/images/s3.png" alt="brand image">
																		</a>
																	</div><!-- /.item -->


																	<div class="item">
																		<a href="<?= Url::toRoute(['argalabs/index']); ?>">
																			<img src="<?= Yii::$app->homeUrl ?>web/images/s4.png" alt="brand image">
																		</a>
																	</div><!-- /.item -->

																	<div class="item">
																		<a href="<?= Url::toRoute('argatraining/index'); ?>">
																			<img src="<?= Yii::$app->homeUrl ?>web/images/s5.png" alt="brand image">
																		</a>
																	</div><!-- /.item -->

																</div><!-- /.site-footer__brand-carousel -->
																<hr class="site-footer__brand-hr">
															</div><!-- /.container -->
														</div><!-- /.site-footer__brand -->
														<div class="site-footer__upper">
															<div class="container">
																<div class="row">
																	<div class="col-xl-6 col-lg-5">
																		<div class="footer-widget footer-widget__about-widget">
																			<a href="<?= Url::toRoute('./index.php') ?>"><img src="<?= Yii::$app->homeUrl ?>web/images/arga_footer.png" width="185" class="footer-widget__logo" alt=""></a>
																			<p class="footer-widget__text">Comprendemos y estamos comprometidos con nuestros grandes valores que nos llevaran a la visión de negocio que hemos establecido:
																				​
																				<br>• Honestidad
																				<br>• Calidad
																				<br>• Compromiso
																				<br>• Profesionalismo
																				<br>• Discreción
																				<br>• Lealtad
																			</p>
																			<!-- /.footer-widget__text -->

																			<div class="footer-widget__social">
																				<a href="https://www.facebook.com/ARGA-Consultores-M%C3%A9xico-448930612267259" class="fab fa-facebook"></a>
																				<a href="#" class="fab fa-whatsapp"></a>
																				<a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a>
																			</div><!-- /.footer-widget__social -->

																		</div><!-- /.footer-widget -->
																	</div><!-- /.col-lg-6 -->
																	<div class="col-xl-3 col-lg-3">
																		<div class="footer-widget footer-widget__links-widget">
																			<h2 class="footer-widget__title">Menú
																			</h2><!-- /.footer-widget__title -->
																			<ul class="footer-widget__links list-unstyled">


																				<li><a href="<?= Url::toRoute('./index.php') ?>"> Inicio
																					</a></li>


																				<li><a href="<?= Url::toRoute('argafire/index') ?>"> ARGA Fire
																					</a></li>


																				<li><a href="<?= Url::toRoute('argaconsultores/index') ?>"> ARGA Consultores
																					</a></li>


																				<li><a href="<?= Url::toRoute('argalabs/index') ?>"> ARGA Labs
																					</a></li>

																				<li><a href="<?= Url::toRoute('argatraining/index') ?>"> ARGA Training
																					</a></li>


																				<li><a href="#"> Privacy Policy</a></li>

																				<li><a href="<?= Url::toRoute(['empresasfolios/']) ?>"> Consultar folios DS3</a></li>


																				<li><?php if (Yii::$app->user->isGuest) { ?>
																						<a href="<?= Url::toRoute(['/site/login']); ?>" class="topbar-one__link">
																							Ingresar</a>
																					<?php } else { ?>
																						<a href="<?= Url::toRoute(['/site/logout']); ?>" class="topbar-one__link">
																							Salir</a>
																					<?php } ?>
																				</li>
																				<?php if (!Yii::$app->user->isGuest) { ?>
																					<li>
																						<a href="<?= Url::toRoute(['/site/admin']); ?>" class="topbar-one__link">
																							Ir a panel admin</a>
																					</li>
																				<?php } ?>

																			</ul><!-- /.footer-widget__links -->
																		</div><!-- /.footer-widget -->
																	</div><!-- /.col-lg-3 -->
																	<div class="col-xl-3 col-lg-4">
																		<div class="footer-widget footer-widget__contact-widget">
																			<h2 class="footer-widget__title">Información de contacto</h2><!-- /.footer-widget__title -->


																			<p class="footer-widget__text">ADMINISTRACION EN RIESGOS<br>GA MEXICO

																			</p>


																			<p class="footer-widget__text">Calle 97<br>
																				Bosques de Amalucan, Puebla, Pue. México CP 72310

																			</p>


																			<p class="footer-widget__text">222 540 9946

																			</p>


																			<p class="footer-widget__text">
																				info@argamexico.com </p>

																		</div><!-- /.footer-widget -->
																	</div><!-- /.col-lg-3 -->
																</div><!-- /.row -->
															</div><!-- /.container -->
														</div><!-- /.site-footer__upper -->
														<div class="site-footer__bottom">
															<div class="container">
																<div class="site-footer__copy"><a href="#">ADN Tecnologías</a> <i class="fa fa-copyright"></i> 2021 Todos los derechos reservados</div>
																<!-- /.site-footer__copy -->
																<!--<ul class="list-unstyled site-footer__links">
																	<li><a href="#">Términos</a></li>
																	<li><a href="#">Políticas de Privacidad</a></li>
																</ul>--><!-- /.list-unstyled -->
															</div><!-- /.container -->
														</div><!-- /.site-footer__bottom -->
													</footer><!-- /.site-footer -->

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
				</section>
			</div>
		</div>
		</div>



		<a href="#" data-target="html" class="scroll-to-target scroll-to-top" style="display: inline;"><i class="fa fa-arrow-up" aria-hidden="true"></i></a>

		<a href="#" onclick="openNav()" class="scroll-to-top-cart" style="display: inline; color:#fff;"><i class="fa fa-shopping-cart" style="margin-top:22px;" aria-hidden="true"></i></a>

		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn btn" onclick="closeNav()" style="color:black!important">&times;</a>
			<div class="row marginbottom50 paddingleft25">
				<div class="col-sm-9">
					<h5>Lista de productos a cotizar</h5>
				</div>
				<div class="col-sm-3">
					<button onclick="vaciarCarrito()" class="pull-right btn btn-danger"><i class="fa fa-trash"></i></button>
				</div>
			</div>
			<div class="paddingleft25">
				<div id="carrito-lista" class="marginbottom50"></div>
				<div class="row marginbottom50">
					<div class="col-sm-8">
						Número de productos:
					</div>
					<div class="col-sm-4">
						<div id="carrito-numero-elementos"></div>
					</div>
				</div>

				<div id="result-pedido"></div>
				<div id="form-enviar-cotizacion">
					<div class="form-group">
						<input class="form-control" placeholder="Ingrese nombre" id="cotizacion-nombre">
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="Ingrese email" id="cotizacion-email">
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="Ingrese número de teléfono" id="cotizacion-telefono">
					</div>
					<div class="form-group">
						<button class="btn btn-success" onclick="enviarPedido()">Enviar</button>
					</div>
				</div>
			</div>






		</div>

		<script>
			function openNav() {
				document.getElementById("mySidenav").style.width = "400px";
			}

			function closeNav() {
				document.getElementById("mySidenav").style.width = "0";
			}
		</script>

		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/wp-polyfill.min89b1.js?ver=7.4.4' id='wp-polyfill-js'></script>
		<script type='text/javascript' id='wp-polyfill-js-after'>
			('fetch' in window) || document.write('<script src="wp-includes/js/dist/vendor/wp-polyfill-fetch.min6e0e.js?ver=3.0.0"></scr' + 'ipt>');
			(document.contains) || document.write('<script src="wp-includes/js/dist/vendor/wp-polyfill-node-contains.min2e00.js?ver=3.42.0"></scr' + 'ipt>');
			(window.DOMRect) || document.write('<script src="wp-includes/js/dist/vendor/wp-polyfill-dom-rect.min2e00.js?ver=3.42.0"></scr' + 'ipt>');
			(window.URL && window.URL.prototype && window.URLSearchParams) || document.write('<script src="wp-includes/js/dist/vendor/wp-polyfill-url.min5aed.js?ver=3.6.4"></scr' + 'ipt>');
			(window.FormData && window.FormData.prototype.keys) || document.write('<script src="wp-includes/js/dist/vendor/wp-polyfill-formdata.mine9bd.js?ver=3.0.12"></scr' + 'ipt>');
			(Element.prototype.matches && Element.prototype.closest) || document.write('<script src="wp-includes/js/dist/vendor/wp-polyfill-element-closest.min4c56.js?ver=2.0.2"></scr' + 'ipt>');
		</script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/i18n.mina706.js?ver=ac389435e7fd4ded01cf603f3aaba6a6' id='wp-i18n-js'></script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/lodash.minf492.js?ver=4.17.19' id='lodash-js'></script>
		<script type='text/javascript' id='lodash-js-after'>
			window.lodash = _.noConflict();
		</script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/url.min534b.js?ver=98645f0502e5ed8dadffd161e39072d2' id='wp-url-js'></script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/hooks.min110c.js?ver=84b89ab09cbfb4469f02183611cc0939' id='wp-hooks-js'></script>
		<script type='text/javascript' id='wp-api-fetch-js-translations'>
			(function(domain, translations) {
				var localeData = translations.locale_data[domain] || translations.locale_data.messages;
				localeData[""].domain = domain;
				wp.i18n.setLocaleData(localeData, domain);
			})("default", {
				"locale_data": {
					"messages": {
						"": {}
					}
				}
			});
		</script>
		<script type='text/javascript' src='/web/js/api-fetch.min44e0.js?ver=4dec825c071b87c57f687eb90f7c23c3' id='wp-api-fetch-js'></script>
		<script type='text/javascript' id='wp-api-fetch-js-after'>
			wp.apiFetch.use(wp.apiFetch.createRootURLMiddleware("wp-json/index.html"));
			wp.apiFetch.nonceMiddleware = wp.apiFetch.createNonceMiddleware("2e991fa2ec");
			wp.apiFetch.use(wp.apiFetch.nonceMiddleware);
			wp.apiFetch.use(wp.apiFetch.mediaUploadMiddleware);
			wp.apiFetch.nonceEndpoint = "wp-admin/admin-ajaxf809.html?action=rest-nonce";
		</script>
		<script type='text/javascript' id='contact-form-7-js-extra'>
			/* <![CDATA[ */
			var wpcf7 = {
				"cached": "1"
			};
			/* ]]> */
		</script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/api-fetch.min44e0.js?ver=4dec825c071b87c57f687eb90f7c23c3' id='wp-api-fetch-js'></script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/index91d5.js?ver=5.4' id='contact-form-7-js'></script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/jquery.blockUI.min44fd.js?ver=2.70' id='jquery-blockui-js'></script>
		<script type='text/javascript' id='wc-add-to-cart-js-extra'>
			/* <![CDATA[ */
			var wc_add_to_cart_params = {
				"ajax_url": "\/update\/indext\/wp-admin\/admin-ajax.php",
				"wc_ajax_url": "\/update\/indext\/?wc-ajax=%%endpoint%%",
				"i18n_view_cart": "View cart",
				"cart_url": "http:\/\/old4.commonsupport.com\/update\/indext\/cart\/",
				"is_cart": "",
				"cart_redirect_after_add": "no"
			};
			/* ]]> */
		</script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/add-to-cart.min0e7d.js?ver=5.1.0' id='wc-add-to-cart-js'></script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/js.cookie.min6b25.js?ver=2.1.4' id='js-cookie-js'></script>
		<script type='text/javascript' id='woocommerce-js-extra'>
			/* <![CDATA[ */
			var woocommerce_params = {
				"ajax_url": "\/update\/indext\/wp-admin\/admin-ajax.php",
				"wc_ajax_url": "\/update\/indext\/?wc-ajax=%%endpoint%%"
			};
			/* ]]> */
		</script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/woocommerce.min0e7d.js?ver=5.1.0' id='woocommerce-js'></script>
		<script type='text/javascript' id='wc-cart-fragments-js-extra'>
			/* <![CDATA[ */
			var wc_cart_fragments_params = {
				"ajax_url": "\/update\/indext\/wp-admin\/admin-ajax.php",
				"wc_ajax_url": "\/update\/indext\/?wc-ajax=%%endpoint%%",
				"cart_hash_key": "wc_cart_hash_f0aa832c586a3fec15b055c2ad6456dc",
				"fragment_name": "wc_fragments_f0aa832c586a3fec15b055c2ad6456dc",
				"request_timeout": "5000"
			};
			/* ]]> */
		</script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/cart-fragments.min0e7d.js?ver=5.1.0' id='wc-cart-fragments-js'></script>
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
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/jquery.cookie.min330a.js?ver=1.4.1' id='jquery-cookie-js'></script>
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
		<script type='text/javascript' id='elementor-frontend-js-before'>
			var elementorFrontendConfig = {
				"environmentMode": {
					"edit": false,
					"wpPreview": false,
					"isScriptDebug": false,
					"isImprovedAssetsLoading": false
				},
				"i18n": {
					"shareOnFacebook": "Share on Facebook",
					"shareOnTwitter": "Share on Twitter",
					"pinIt": "Pin it",
					"download": "Download",
					"downloadImage": "Download image",
					"fullscreen": "Fullscreen",
					"zoom": "Zoom",
					"share": "Share",
					"playVideo": "Play Video",
					"previous": "Previous",
					"next": "Next",
					"close": "Close"
				},
				"is_rtl": false,
				"breakpoints": {
					"xs": 0,
					"sm": 480,
					"md": 768,
					"lg": 1025,
					"xl": 1440,
					"xxl": 1600
				},
				"version": "3.1.4",
				"is_static": false,
				"experimentalFeatures": [],
				"urls": {
					"assets": "http:\/\/old4.commonsupport.com\/update\/indext\/wp-content\/plugins\/elementor\/assets\/"
				},
				"settings": {
					"page": [],
					"editorPreferences": []
				},
				"kit": {
					"global_image_lightbox": "yes",
					"lightbox_enable_counter": "yes",
					"lightbox_enable_fullscreen": "yes",
					"lightbox_enable_zoom": "yes",
					"lightbox_enable_share": "yes",
					"lightbox_title_src": "title",
					"lightbox_description_src": "description"
				},
				"post": {
					"id": 16,
					"title": "indext%20%E2%80%93%20My%20WordPress%20Blog",
					"excerpt": "",
					"featuredImage": false
				}
			};
		</script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/frontend.minaeb9.js?ver=3.1.4' id='elementor-frontend-js'></script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/preloaded-elements-handlers.minaeb9.js?ver=3.1.4' id='preloaded-elements-handlers-js'></script>
		<script type="text/javascript">
			var urlPedido = "<?= Url::toRoute('productos/cotizar'); ?>";
		</script>
		<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>web/js/cart.js'></script>

	</main>


</body>

</html>
<?php $this->endPage() ?>