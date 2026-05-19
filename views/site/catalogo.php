<?php

/* @var $this yii\web\View */
/* @var $divisiones array */

use yii\helpers\Url;

$this->title = 'Catálogo de Servicios — ARGA Group México';

$this->registerJs('window.ARGA_DIVISIONS = ' . json_encode($divisiones ?? [], JSON_UNESCAPED_UNICODE) . ';', \yii\web\View::POS_BEGIN);
?>

<div class="dv-cat-page">

  <!-- ========= HERO ========= -->
  <div class="dv-cat-hero">
    <div class="container">
      <div class="dv-cat-hero-top">
        <a href="<?= Url::toRoute(['site/index']) ?>" class="dv-cat-back-btn" aria-label="Volver al inicio">
          <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
          Volver
        </a>
        <button class="dv-cat-settings" type="button" aria-label="Opciones de vista" id="dvCatSettings">
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="3"/>
            <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 01-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z"/>
          </svg>
        </button>
      </div>

      <h1 class="dv-cat-hero-title gradient-text">Catálogo completo de servicios</h1>
      <p class="dv-cat-hero-sub">Explora todas las normas, evaluaciones y servicios disponibles por división.</p>
    </div>
  </div>

  <!-- ========= STICKY FILTER BAR ========= -->
  <div class="dv-cat-filter-bar" id="dvCatFilterBar">
    <div class="container">
      <div class="dv-cat-filters" id="dvCatFilters" role="tablist" aria-label="Filtrar por división">
        <!-- inyectado por JS -->
      </div>

      <!-- Buscador colapsable -->
      <div class="dv-cat-search-wrap">
        <svg class="dv-cat-search-ico" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true">
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
      <main class="dv-cat-main">
        <div class="dv-cat-main-header">
          <div>
            <h2 class="dv-cat-main-title" id="dvCatMainTitle">Todos los servicios</h2>
            <p  class="dv-cat-main-note"  id="dvCatMainNote"></p>
          </div>
        </div>
        <div class="dv-cat-grid" id="dvCatGrid">
          <div class="dv-cat-loading">
            <span class="dv-spinner"></span> Cargando servicios…
          </div>
        </div>
      </main>
    </div>
  </div>

</div>
