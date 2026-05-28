<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>ARGA Admin · Panel</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/demo/assets/arga.css?v=1">
<link rel="stylesheet" href="/demo/assets/admin.css">
</head>
<body>

<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <defs>
    <linearGradient id="gradBlue" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#3a6dd5"/><stop offset="100%" stop-color="#1f3b8a"/></linearGradient>
    <linearGradient id="gradRed" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#e23a4e"/><stop offset="100%" stop-color="#8e0d20"/></linearGradient>
  </defs>
</svg>

<div class="admin-shell">

  <!-- SIDEBAR -->
  <aside class="sidebar" id="adminSidebar">
    <div class="sidebar-head">
      <a href="/demo" class="brand">
        <span class="brand-mark">AG</span>
        <span>ARGA Admin<small>Panel de control</small></span>
      </a>
    </div>
    <nav class="sidebar-body">
      <div class="sidebar-section">Gestión</div>
      <a class="sidebar-link active" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
        Tablero
      </a>
      <a class="sidebar-link" href="/demo/dashboard/edit-division">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-12V5l-8-3-8 3v5c0 8 8 12 8 12z"/></svg>
        Divisiones <span class="count">8</span>
      </a>
      <a class="sidebar-link" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
        Servicios <span class="count">42</span>
      </a>
      <a class="sidebar-link" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
        Cursos
      </a>
      <a class="sidebar-link" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
        DS3 / Folios
      </a>
      <a class="sidebar-link" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>
        Consultores
      </a>

      <div class="sidebar-section">Contenido</div>
      <a class="sidebar-link" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
        Noticias / Blog <span class="count">12</span>
      </a>
      <a class="sidebar-link" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
        Ads / Banners
      </a>
      <a class="sidebar-link" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="7" r="4"/><path d="M17 11l2 2 4-4"/><path d="M1 21v-2a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v2"/></svg>
        Equipo
      </a>

      <div class="sidebar-section">Sistema</div>
      <a class="sidebar-link" href="#">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 11-2.83 2.83l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 11-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 11-2.83-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 110-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 112.83-2.83l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 114 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 112.83 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 110 4h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
        Configuración
      </a>
    </nav>
    <div class="sidebar-foot">
      <div style="display:flex; align-items:center; gap:10px">
        <div style="width:36px;height:36px;border-radius:50%;background:var(--g-title);color:#fff;display:grid;place-items:center;font-family:var(--ff-display);font-weight:800;font-size:13px">AM</div>
        <div style="flex:1; min-width: 0">
          <div style="font-family:var(--ff-display);font-weight:700;font-size:13px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis">Ing Abraham Mendoza</div>
          <div style="font-size:11px;color:var(--c-text-mid)">Administrador</div>
        </div>
        <button class="btn-icon" aria-label="Salir" title="Salir" style="width:32px;height:32px"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg></button>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <main class="admin-main">

    <!-- TOPBAR -->
    <div class="admin-topbar">
      <button class="btn-icon" data-sidebar-open="adminSidebar" style="display:none" aria-label="Abrir menú"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg></button>
      <div class="breadcrumbs">
        <span>Admin</span>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
        <strong>Tablero</strong>
      </div>
      <div class="spacer"></div>
      <button class="btn btn-outline btn-sm"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg> Buscar</button>
      <span style="position:relative;display:inline-flex;">
        <button class="btn-icon" aria-label="Notificaciones"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg></button>
        <span aria-hidden="true" style="position:absolute;top:-4px;right:-4px;width:18px;height:18px;border-radius:50%;background:var(--c-red,#c41230);color:#fff;font-size:10px;font-weight:800;font-family:var(--ff-display);display:flex;align-items:center;justify-content:center;border:2px solid #fff;pointer-events:none;line-height:1;">4</span>
      </span>
      <div class="admin-user">
        <span class="avatar">AM</span>
        <span style="font-family:var(--ff-display);font-weight:700;font-size:13px">Ing Abraham Mendoza</span>
      </div>
    </div>

    <!-- PAGE HEAD -->
    <div class="admin-page-head">
      <div>
        <h1>Panel de administración</h1>
        <p>Resumen general · gestiona contenido, servicios y operaciones desde un solo lugar.</p>
      </div>
      <div class="flex gap-2">
        <button class="btn btn-outline btn-sm"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg> Exportar</button>
        <button class="btn btn-primary btn-sm"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg> Nuevo</button>
      </div>
    </div>

    <!-- STATS ROW -->
    <div class="admin-stats-row">
      <div class="admin-stat" style="--stat-icon:url('data:image/svg+xml,%3Csvg viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%231f3b8a%22 stroke-width=%222%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M12 22s8-4 8-12V5l-8-3-8 3v5c0 8 8 12 8 12z%22/%3E%3C/svg%3E')">
        <p class="label">Divisiones activas</p>
        <p class="value">8</p>
        <span class="trend up"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg> +1 este mes</span>
      </div>
      <div class="admin-stat" style="--stat-icon:url('data:image/svg+xml,%3Csvg viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%231f3b8a%22 stroke-width=%222%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z%22/%3E%3Cpolyline points=%2212 2 12 12%22/%3E%3Cpolyline points=%223.27 6.96 12 12.01 20.73 6.96%22/%3E%3C/svg%3E')">
        <p class="label">Servicios totales</p>
        <p class="value">42</p>
        <span class="trend up"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/></svg> +3 nuevos</span>
      </div>
      <div class="admin-stat" style="--stat-icon:url('data:image/svg+xml,%3Csvg viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%231f3b8a%22 stroke-width=%222%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z%22/%3E%3Cpolyline points=%2214 2 14 8 20 8%22/%3E%3Cline x1=%2216%22 y1=%2213%22 x2=%228%22 y2=%2213%22/%3E%3Cline x1=%2216%22 y1=%2217%22 x2=%228%22 y2=%2217%22/%3E%3C/svg%3E')">
        <p class="label">Cotizaciones</p>
        <p class="value">128</p>
        <span class="trend up">+12% vs. mes anterior</span>
      </div>
      <div class="admin-stat" style="--stat-icon:url('data:image/svg+xml,%3Csvg viewBox=%220 0 24 24%22 fill=%22none%22 stroke=%22%231f3b8a%22 stroke-width=%222%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cpath d=%22M9 11l3 3L22 4%22/%3E%3Cpath d=%22M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11%22/%3E%3C/svg%3E')">
        <p class="label">Folios DS3</p>
        <p class="value">1,247</p>
        <span class="trend down">-2% vs. mes anterior</span>
      </div>
    </div>

    <!-- MODULOS -->
    <h3 style="margin-top: 32px; margin-bottom: 20px">Módulos disponibles</h3>
    <div class="modules-grid">

      <a href="/demo/dashboard/edit-division" class="admin-card">
        <span class="admin-card-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-12V5l-8-3-8 3v5c0 8 8 12 8 12z"/></svg></span>
        <h3>Divisiones de Negocio</h3>
        <p>Gestiona las divisiones y sus servicios: descripción, NOMs, íconos SVG y banners.</p>
        <div class="admin-card-foot">
          <span class="admin-card-stat">8 divisiones</span>
          <span style="font-family:var(--ff-display);color:var(--c-navy);font-weight:700;display:inline-flex;align-items:center;gap:4px;font-size:var(--fs-13)">Abrir <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
        </div>
      </a>

      <a href="/demo/dashboard/edit-division" class="admin-card">
        <span class="admin-card-icon red"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg></span>
        <h3>Servicios</h3>
        <p>Administra individualmente cada servicio, sus imágenes y detalles del curso asociado.</p>
        <div class="admin-card-foot">
          <span class="admin-card-stat">42 servicios</span>
          <span style="font-family:var(--ff-display);color:var(--c-navy);font-weight:700;display:inline-flex;align-items:center;gap:4px;font-size:var(--fs-13)">Abrir <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
        </div>
      </a>

      <a href="/demo/dashboard/edit-division" class="admin-card">
        <span class="admin-card-icon teal"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></span>
        <h3>Cursos</h3>
        <p>Publica o edita los detalles de los cursos disponibles. Constancias DC-3 y diplomados.</p>
        <div class="admin-card-foot">
          <span class="admin-card-stat">18 activos</span>
          <span style="font-family:var(--ff-display);color:var(--c-navy);font-weight:700;display:inline-flex;align-items:center;gap:4px;font-size:var(--fs-13)">Abrir <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
        </div>
      </a>

      <a href="/demo/dashboard/edit-division" class="admin-card">
        <span class="admin-card-icon amber"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg></span>
        <h3>DS3 / Folios</h3>
        <p>Administra los folios DS3 y sus respectivas empresas. Renueva constancias y registra incidencias.</p>
        <div class="admin-card-foot">
          <span class="admin-card-stat">1,247 emitidos</span>
          <span style="font-family:var(--ff-display);color:var(--c-navy);font-weight:700;display:inline-flex;align-items:center;gap:4px;font-size:var(--fs-13)">Abrir <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
        </div>
      </a>

      <a href="/demo/dashboard/edit-division" class="admin-card">
        <span class="admin-card-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg></span>
        <h3>Consultores</h3>
        <p>Publica, edita o elimina los detalles de la sección de Consultores.</p>
        <div class="admin-card-foot">
          <span class="admin-card-stat">15 perfiles</span>
          <span style="font-family:var(--ff-display);color:var(--c-navy);font-weight:700;display:inline-flex;align-items:center;gap:4px;font-size:var(--fs-13)">Abrir <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
        </div>
      </a>

      <a href="/demo/dashboard/edit-division" class="admin-card">
        <span class="admin-card-icon red"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></span>
        <h3>Noticias / Blog</h3>
        <p>Crea y publica artículos del blog. Categorías, imágenes destacadas y SEO.</p>
        <div class="admin-card-foot">
          <span class="admin-card-stat">12 publicadas</span>
          <span style="font-family:var(--ff-display);color:var(--c-navy);font-weight:700;display:inline-flex;align-items:center;gap:4px;font-size:var(--fs-13)">Abrir <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
        </div>
      </a>

      <a href="/demo/dashboard/edit-division" class="admin-card">
        <span class="admin-card-icon teal"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><line x1="3" y1="10" x2="21" y2="10"/></svg></span>
        <h3>Ads / Banners</h3>
        <p>Administra los banners promocionales y el carrusel destacado de la home.</p>
        <div class="admin-card-foot">
          <span class="admin-card-stat">3 activos</span>
          <span style="font-family:var(--ff-display);color:var(--c-navy);font-weight:700;display:inline-flex;align-items:center;gap:4px;font-size:var(--fs-13)">Abrir <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
        </div>
      </a>

      <a href="/demo/dashboard/edit-division" class="admin-card">
        <span class="admin-card-icon amber"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="7" r="4"/><path d="M17 11l2 2 4-4"/><path d="M1 21v-2a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v2"/></svg></span>
        <h3>Equipo</h3>
        <p>Edita los miembros del equipo de trabajo y sus credenciales.</p>
        <div class="admin-card-foot">
          <span class="admin-card-stat">4 miembros</span>
          <span style="font-family:var(--ff-display);color:var(--c-navy);font-weight:700;display:inline-flex;align-items:center;gap:4px;font-size:var(--fs-13)">Abrir <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
        </div>
      </a>

      <a href="/demo/dashboard/edit-division" class="admin-card">
        <span class="admin-card-icon"><svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"/><line x1="3" y1="22" x2="21" y2="22"/></svg></span>
        <h3>Contenido general</h3>
        <p>Edita el contenido editable del sitio: textos del hero, secciones, footer.</p>
        <div class="admin-card-foot">
          <span class="admin-card-stat">Última edición · 3d</span>
          <span style="font-family:var(--ff-display);color:var(--c-navy);font-weight:700;display:inline-flex;align-items:center;gap:4px;font-size:var(--fs-13)">Abrir <svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14M13 6l6 6-6 6"/></svg></span>
        </div>
      </a>

    </div>

  </main>
</div>

<div class="sidebar-backdrop" id="sidebarBackdrop"></div>
<div class="toast-wrap" id="toastWrap"></div>

<script src="/demo/assets/arga.js"></script>
</body>
</html>
