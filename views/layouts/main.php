<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);

$isIndex = Yii::$app->controller->id === 'site' && Yii::$app->controller->action->id === 'index';
$isAdmin = !Yii::$app->user->isGuest;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- Bootstrap 5 CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Legacy CSS — inner pages -->
  <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/fontawesome-all4c7e.css">
  <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/animate4c7e.css">
  <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/owl.carousel.min4c7e.css">
  <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/owl.theme.default.min4c7e.css">
  <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/magnific-popup4c7e.css">
  <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/style-24c7e.css">
  <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/style4c7e.css">
  <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/responsive4c7e.css">
  <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/custom.css">
  <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/sidebar.css">

  <!-- New ARGA design system -->
  <link rel="stylesheet" href="<?= Yii::$app->homeUrl ?>css/arga-main.css?v=4">

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script>
    window.ARGA_URLS = {
      catalogo: <?= json_encode(Url::toRoute(['site/catalogo'])) ?>,
      contacto: <?= json_encode(Url::toRoute(['contactos/create'])) ?>
    };
  </script>
</head>

<body class="<?= $isIndex ? 'page-home' : 'page-inner' ?> <?= $isAdmin ? 'page-admin' : '' ?>">
<?php $this->beginBody() ?>

<!-- SVG gradient defs for shield icons -->
<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <defs>
    <linearGradient id="tealGrad" x1="0" y1="0" x2="0" y2="1">
      <stop offset="0%" stop-color="#4A82D8"/>
      <stop offset="100%" stop-color="#2E6AC9"/>
    </linearGradient>
    <linearGradient id="greenGrad" x1="0" y1="0" x2="0" y2="1">
      <stop offset="0%" stop-color="#E8304A"/>
      <stop offset="100%" stop-color="#C41230"/>
    </linearGradient>
  </defs>
</svg>

<!-- ===== HEADER ===== -->
<header class="site-header <?= $isIndex ? '' : 'scrolled' ?>" id="siteHeader">
  <div class="header-inner">

    <a href="<?= Url::toRoute(['site/index']) ?>" class="logo" aria-label="ARGA Group inicio">
      <div class="logo-wrap">
        <img src="<?= Yii::$app->homeUrl ?>images/argaBlanco.png" alt="ARGA Group México" class="logo-img logo-blanco">
        <img src="<?= Yii::$app->homeUrl ?>images/argaColor.png"  alt="ARGA Group México" class="logo-img logo-color">
      </div>
    </a>

    <nav class="main-nav" id="mainNav">
      <ul>
        <li><a href="<?= Url::toRoute(['site/index']) ?>" class="nav-link">Inicio</a></li>
        <li><a href="<?= Url::toRoute(['site/catalogo']) ?>" class="nav-link">Servicios</a></li>

        <!--<li class="has-dropdown">
          <a href="#" class="nav-link">Nosotros <span class="arrow">▾</span></a>
          <ul class="dropdown">
            <li><a href="<?= Url::toRoute(['site/avisoprivacidad']) ?>">Política de Privacidad</a></li>
            <li><a href="<?= Url::toRoute(['site/codigoetica']) ?>">Código de Ética</a></li>
            <li><a href="<?= Url::toRoute(['argafire/acreditacion']) ?>">Acreditación</a></li>
            <li><a href="<?= Url::toRoute(['site/quejas']) ?>">Procedimiento de Quejas</a></li>
          </ul>
        </li>

        <li class="has-dropdown">
          <a href="<?= Url::toRoute(['argafire/index']) ?>" class="nav-link">ARGA Fire <span class="arrow">▾</span></a>
          <ul class="dropdown">
            <li><a href="<?= Url::toRoute(['argafire/extintores']) ?>">Mantenimiento de Extintores</a></li>
            <li><a href="<?= Url::toRoute(['argafire/mtto']) ?>">Mantenimiento de Equipos Fijos</a></li>
            <li><a href="<?= Url::toRoute(['argafire/catalogo']) ?>">Venta de Productos</a></li>
          </ul>
        </li>

        <li class="has-dropdown">
          <a href="<?= Url::toRoute(['argaconsultores/index']) ?>" class="nav-link">ARGA Consultores <span class="arrow">▾</span></a>
          <ul class="dropdown">
            <li><a href="<?= Url::toRoute(['argaconsultores/seguridadlaboral']) ?>">Seguridad Laboral</a></li>
            <li><a href="<?= Url::toRoute(['argaconsultores/saludocupacional']) ?>">Salud Ocupacional</a></li>
            <li><a href="<?= Url::toRoute(['argaconsultores/proteccionambiente']) ?>">Protección al Medio Ambiente</a></li>
            <li><a href="<?= Url::toRoute(['argaconsultores/gestionservicios']) ?>">Gestión y Servicios</a></li>
          </ul>
        </li>

        <li class="has-dropdown">
          <a href="<?= Url::toRoute(['argalabs/index']) ?>" class="nav-link">ARGA Labs <span class="arrow">▾</span></a>
          <ul class="dropdown">
            <li><a href="<?= Url::toRoute(['argalabs/evaluaciones']) ?>">Fuentes Fijas</a></li>
            <li><a href="<?= Url::toRoute(['argalabs/higiene']) ?>">Ambiente Laboral</a></li>
            <li><a href="<?= Url::toRoute(['argalabs/analisisdeaguas']) ?>">Análisis de Aguas</a></li>
          </ul>
        </li>

        <li class="has-dropdown">
          <a href="<?= Url::toRoute(['argatraining/index']) ?>" class="nav-link">ARGA Training <span class="arrow">▾</span></a>
          <ul class="dropdown">
            <li><a href="<?= Url::toRoute(['argatraining/seguridadindustrial']) ?>">Seguridad Industrial</a></li>
            <li><a href="<?= Url::toRoute(['argatraining/proteccionambiental']) ?>">Protección Ambiental</a></li>
            <li><a href="<?= Url::toRoute(['argatraining/proteccioncivil']) ?>">Protección Civil</a></li>
            <li><a href="<?= Url::toRoute(['argatraining/organizacional']) ?>">Desarrollo Organizacional</a></li>
          </ul>
        </li>-->

        <li><a href="" class="nav-link">Contacto</a></li>
      </ul>
    </nav>

    <?php if (Yii::$app->user->isGuest): ?>
      <a href="<?= Url::toRoute(['/site/login']) ?>" class="btn-portal">Portal</a>
    <?php else: ?>
      <a href="<?= Url::toRoute(['/site/admin']) ?>" class="btn-portal">Panel Admin</a>
    <?php endif; ?>

    <button class="hamburger" id="hamburger" aria-label="Menú">
      <span></span><span></span><span></span>
    </button>

  </div>
</header>
<!-- ===== /HEADER ===== -->

<?= $content ?>

<!-- ===== FOOTER ===== -->
<footer class="site-footer">
  <div class="footer-accent"></div>
  <div class="container">
    <div class="footer-grid">

      <div class="footer-col footer-col--brand">
        <img src="<?= Yii::$app->homeUrl ?>images/argaBlanco.png" alt="ARGA Group México" class="footer-logo">
        <p class="footer-tagline">Más de 30 años protegiendo empresas.<br>Eficientes, Seguras y Rentables.</p>
        <div class="footer-social">
          <a href="https://www.linkedin.com/company/arga-group-mexico" target="_blank" aria-label="LinkedIn" class="footer-social-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
          </a>
          <a href="https://www.facebook.com/ARGA-Consultores-M%C3%A9xico-448930612267259" target="_blank" aria-label="Facebook" class="footer-social-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
          </a>
          <a href="https://www.instagram.com/argagroupmexico" target="_blank" aria-label="Instagram" class="footer-social-link">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
          </a>
        </div>
      </div>

      <div class="footer-col">
        <h4 class="footer-col-title">Navegación</h4>
        <nav class="footer-links">
          <a href="<?= Url::toRoute(['site/index']) ?>">Inicio</a>
          <a href="<?= Url::toRoute(['site/catalogo']) ?>">Servicios</a>
          <a href="">Contacto</a>
          <?php if (Yii::$app->user->isGuest): ?>
            <a href="<?= Url::toRoute(['/site/login']) ?>">Ingresar</a>
          <?php else: ?>
            <a href="<?= Url::toRoute(['/site/logout']) ?>">Salir</a>
            <a href="<?= Url::toRoute(['/site/admin']) ?>">Panel Admin</a>
          <?php endif; ?>
        </nav>
      </div>

    </div>

    <div class="footer-bottom">
      <hr class="footer-divider">
      <p class="footer-copy">© <?= date('Y') ?> Administración en Riesgos GA México S.A. de C.V. Todos los derechos reservados.</p>
    </div>
  </div>
</footer>
<!-- ===== /FOOTER ===== -->

<!-- Mascota Tigre -->
<div id="tigreOverlay" aria-hidden="true">
  <div id="tigreUnit">
    <div id="tigreBubble"><p id="tigreBubbleText"></p></div>
    <img id="tigreImg" src="<?= Yii::$app->homeUrl ?>images/tigresitobb.png" alt="Mascota ARGA Group">
  </div>
</div>

<!-- SVG filter defs para escudos de unidades -->
<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" style="position:absolute;overflow:hidden">
  <defs>
    <filter id="ringTeal" x="-25%" y="-25%" width="150%" height="150%">
      <feMorphology in="SourceAlpha" operator="dilate" radius="9" result="outer"/>
      <feFlood flood-color="#2E6AC9" flood-opacity="0.18" result="outerColor"/>
      <feComposite in="outerColor" in2="outer" operator="in" result="outerRing"/>
      <feMorphology in="SourceAlpha" operator="dilate" radius="4" result="inner"/>
      <feFlood flood-color="rgba(255,255,255,0.55)" result="innerColor"/>
      <feComposite in="innerColor" in2="inner" operator="in" result="innerRing"/>
      <feMerge>
        <feMergeNode in="outerRing"/>
        <feMergeNode in="innerRing"/>
        <feMergeNode in="SourceGraphic"/>
      </feMerge>
    </filter>
    <filter id="ringRed" x="-25%" y="-25%" width="150%" height="150%">
      <feMorphology in="SourceAlpha" operator="dilate" radius="9" result="outer"/>
      <feFlood flood-color="#C41230" flood-opacity="0.18" result="outerColor"/>
      <feComposite in="outerColor" in2="outer" operator="in" result="outerRing"/>
      <feMorphology in="SourceAlpha" operator="dilate" radius="4" result="inner"/>
      <feFlood flood-color="rgba(255,255,255,0.55)" result="innerColor"/>
      <feComposite in="innerColor" in2="inner" operator="in" result="innerRing"/>
      <feMerge>
        <feMergeNode in="outerRing"/>
        <feMergeNode in="innerRing"/>
        <feMergeNode in="SourceGraphic"/>
      </feMerge>
    </filter>
  </defs>
</svg>

<!-- Carrito de cotización (páginas de productos) --
<a href="#" onclick="openNav()" class="scroll-to-top-cart" style="display:inline;color:#fff;">
  <i class="fa fa-shopping-cart" style="margin-top:22px;" aria-hidden="true"></i>
</a>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn btn" onclick="closeNav()" style="color:black!important">&times;</a>
  <div class="row marginbottom50 paddingleft25">
    <div class="col-sm-9"><h5>Lista de productos a cotizar</h5></div>
    <div class="col-sm-3">
      <button onclick="vaciarCarrito()" class="float-end btn btn-danger"><i class="fa fa-trash"></i></button>
    </div>
  </div>
  <div class="paddingleft25">
    <div id="carrito-lista" class="marginbottom50"></div>
    <div class="row marginbottom50">
      <div class="col-sm-8">Número de productos:</div>
      <div class="col-sm-4"><div id="carrito-numero-elementos"></div></div>
    </div>
    <div id="result-pedido"></div>
    <div id="form-enviar-cotizacion">
      <div class="mb-3">
        <input class="form-control" placeholder="Ingrese nombre" id="cotizacion-nombre">
      </div>
      <div class="mb-3">
        <input class="form-control" placeholder="Ingrese email" id="cotizacion-email">
      </div>
      <div class="mb-3">
        <input class="form-control" placeholder="Ingrese número de teléfono" id="cotizacion-telefono">
      </div>
      <div class="mb-3">
        <button class="btn btn-success" onclick="enviarPedido()">Enviar</button>
      </div>
    </div>
  </div>
</div>-->

<!-- Legacy JS — jQuery + plugins requeridos por páginas internas y carrito -->
<script src="<?= Yii::$app->homeUrl ?>js/jquery.min9d52.js"></script>
<!-- Bootstrap 5 CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc4s9bIOgUxi8T/jzmqqLCEI0B3vXKC2HzGFIG8RVwj4" crossorigin="anonymous"></script>
<script src="<?= Yii::$app->homeUrl ?>js/owl.carousel.min431f.js"></script>
<script src="<?= Yii::$app->homeUrl ?>js/appear431f.js"></script>
<script src="<?= Yii::$app->homeUrl ?>js/waypoints.min431f.js"></script>
<script src="<?= Yii::$app->homeUrl ?>js/jquery.counterup.min431f.js"></script>
<script src="<?= Yii::$app->homeUrl ?>js/jquery.magnific-popup.min431f.js"></script>
<script src="<?= Yii::$app->homeUrl ?>js/script4c7e.js"></script>
<script>
  function openNav()  { document.getElementById('mySidenav').style.width = '400px'; }
  function closeNav() { document.getElementById('mySidenav').style.width = '0'; }
  var urlPedido = "<?= Url::toRoute('productos/cotizar') ?>";
</script>
<script src="<?= Yii::$app->homeUrl ?>js/cart.js"></script>

<!-- New ARGA main JS -->
<script src="<?= Yii::$app->homeUrl ?>js/arga-main.js?v=2"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
