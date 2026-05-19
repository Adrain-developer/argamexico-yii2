<?php

/* @var $this yii\web\View */
/* @var $divisiones array */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Catálogo de Servicios — ARGA Group México';

$this->registerCssFile(Yii::$app->request->baseUrl . '/css/divisiones.css?v=2',  ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile(Yii::$app->request->baseUrl  . '/js/divisiones-app.js?v=2', ['position' => \yii\web\View::POS_END]);
$this->registerJs('window.ARGA_DIVISIONS = ' . json_encode($divisiones ?? [], JSON_UNESCAPED_UNICODE) . ';', \yii\web\View::POS_BEGIN);
?>

<div class="dv-cat-page">

  <!-- ========= HEADER ========= -->
  <div class="dv-cat-hero">
    <div class="container">
      <nav class="dv-cat-breadcrumb">
        <a href="<?= Url::toRoute(['site/index']) ?>">Inicio</a>
        <span>›</span>
        <span>Catálogo de Servicios</span>
      </nav>
      <h1 class="dv-cat-hero-title gradient-text">Catálogo de Servicios</h1>
      <p class="dv-cat-hero-sub">Explora todas las normas, evaluaciones y servicios disponibles por división.</p>

      <!-- Buscador global -->
      <div class="dv-cat-search-wrap">
        <svg class="dv-cat-search-ico" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round">
          <circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/>
        </svg>
        <input type="search" id="dvCatSearch" class="dv-cat-search-input"
               placeholder="Buscar servicio, NOM, código…" autocomplete="off">
        <span class="dv-cat-search-count" id="dvCatCount"></span>
      </div>
    </div>
  </div>

  <!-- ========= BODY ========= -->
  <div class="container">
    <div class="dv-cat-layout" id="dvCatalog">

      <!-- Sidebar -->
      <aside class="dv-cat-sidebar" id="dvCatSidebar" aria-label="Divisiones de negocio">
        <p class="dv-cat-sidebar-label">Unidades de Negocio</p>
        <!-- Inyectado por JS -->
      </aside>

      <!-- Main -->
      <main class="dv-cat-main">
        <div class="dv-cat-main-header">
          <div>
            <h2 class="dv-cat-main-title" id="dvCatMainTitle">Todos los servicios</h2>
            <p  class="dv-cat-main-note"  id="dvCatMainNote"></p>
          </div>
        </div>
        <div class="dv-cat-grid" id="dvCatGrid">
          <div class="dv-cat-loading">
            <span class="spinner-border spinner-border-sm text-secondary"></span> Cargando servicios…
          </div>
        </div>
      </main>

    </div>
  </div>

</div>
