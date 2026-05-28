<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>ARGA Admin · Editar Ergonomía</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/demo/assets/arga.css?v=1">
<link rel="stylesheet" href="/demo/assets/admin.css?v=1">
</head>
<body>

<svg width="0" height="0" style="position:absolute" aria-hidden="true">
  <defs>
    <linearGradient id="gradBlue" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#3a6dd5"/><stop offset="100%" stop-color="#1f3b8a"/></linearGradient>
    <linearGradient id="gradRed" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#e23a4e"/><stop offset="100%" stop-color="#8e0d20"/></linearGradient>
  </defs>
</svg>

<div class="admin-shell">

  <!-- SIDEBAR (igual al panel) -->
  <aside class="sidebar" id="adminSidebar">
    <div class="sidebar-head">
      <a href="/demo" class="brand">
        <span class="brand-mark">AG</span>
        <span>ARGA Admin<small>Panel de control</small></span>
      </a>
    </div>
    <nav class="sidebar-body">
      <div class="sidebar-section">Gestión</div>
      <a class="sidebar-link" href="/demo/dashboard"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>Tablero</a>
      <a class="sidebar-link active" href="/demo/dashboard/edit-division"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-12V5l-8-3-8 3v5c0 8 8 12 8 12z"/></svg>Divisiones<span class="count">8</span></a>
      <a class="sidebar-link" href="#"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>Servicios<span class="count">42</span></a>
      <a class="sidebar-link" href="#"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>Cursos</a>
      <a class="sidebar-link" href="#"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>DS3 / Folios</a>

      <div class="sidebar-section">Contenido</div>
      <a class="sidebar-link" href="#"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>Noticias / Blog</a>
      <a class="sidebar-link" href="#"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="5" width="18" height="14" rx="2"/></svg>Ads / Banners</a>
      <a class="sidebar-link" href="#"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="7" r="4"/><path d="M17 11l2 2 4-4"/><path d="M1 21v-2a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v2"/></svg>Equipo</a>
    </nav>
  </aside>

  <!-- MAIN -->
  <main class="admin-main">

    <!-- TOPBAR -->
    <div class="admin-topbar">
      <button class="btn-icon" data-sidebar-open="adminSidebar" style="display:none" aria-label="Abrir menú"><svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg></button>
      <div class="breadcrumbs">
        <a href="/demo/dashboard" style="color:inherit">Admin</a>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
        <a href="#" style="color:inherit">Divisiones</a>
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg>
        <strong>Editar: Ergonomía</strong>
      </div>
      <div class="spacer"></div>
      <span class="chip success"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Cambios guardados · hace 2 min</span>
      <div class="admin-user">
        <span class="avatar">JM</span>
        <span style="font-family:var(--ff-display);font-weight:700;font-size:13px">Juan Manuel</span>
      </div>
    </div>

    <!-- PAGE HEAD -->
    <div class="admin-page-head">
      <div>
        <h1>Editar: <span class="gradient-text">Ergonomía</span></h1>
        <p>Modifica los datos de la división, sus NOMs asociadas y el ícono SVG del escudo.</p>
      </div>
      <div class="flex gap-2">
        <a href="/demo#divisiones" class="btn btn-outline btn-sm" target="_blank">
          <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
          Ver en el sitio
        </a>
        <button class="btn btn-danger btn-sm">
          <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-2 14a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2L5 6"/></svg>
          Eliminar
        </button>
      </div>
    </div>

    <div class="admin-form-grid">

      <!-- COLUMNA FORM -->
      <form class="admin-form-panel">

        <!-- ===== Información básica ===== -->
        <div class="form-section">
          <h4>Información básica</h4>
          <p class="help">Datos públicos que verán los usuarios en el sitio.</p>

          <div class="field-row">
            <div class="field">
              <label class="label" for="name">Nombre <span class="required">*</span></label>
              <input class="input" id="name" type="text" value="Ergonomía">
            </div>
            <div class="field">
              <label class="label" for="slug">Slug (URL) <span class="required">*</span></label>
              <input class="input" id="slug" type="text" value="ergonomia">
              <span class="help">Generado automáticamente. Cambiar <strong>rompe URLs existentes</strong>.</span>
            </div>
          </div>

          <div class="field">
            <label class="label" for="tagline">Tagline</label>
            <input class="input" id="tagline" type="text" value="Diseño centrado en el humano">
            <span class="help">Frase corta debajo del título en la modal (3-5 palabras).</span>
          </div>

          <div class="field">
            <label class="label" for="desc">Descripción <span class="required">*</span></label>
            <textarea class="textarea" id="desc" rows="3" style="font-family: var(--ff-body); font-size: var(--fs-15)">Evaluación y rediseño de puestos de trabajo para reducir trastornos musculoesqueléticos.</textarea>
            <span class="help">Texto que aparece en la modal y en la tarjeta de "Ver todas".</span>
          </div>
        </div>

        <!-- ===== NOMs ===== -->
        <div class="form-section">
          <h4>NOMs / Certificaciones asociadas</h4>
          <p class="help">Códigos normativos que se muestran como chips en la modal.</p>

          <div class="chip-input" id="chipInput">
            <span class="chip">NOM-036-1 <button type="button" aria-label="Eliminar">×</button></span>
            <span class="chip">RULA <button type="button" aria-label="Eliminar">×</button></span>
            <span class="chip">REBA <button type="button" aria-label="Eliminar">×</button></span>
            <span class="chip">NIOSH <button type="button" aria-label="Eliminar">×</button></span>
          </div>

          <div class="flex gap-3 mt-3">
            <input class="input" id="newChip" type="text" placeholder="Ej: NOM-019-STPS-2011" style="flex:1">
            <button type="button" class="btn btn-primary" id="addChip">
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
              Agregar
            </button>
          </div>
          <span class="help">Escribe el código de la norma y presiona <kbd>Enter</kbd> o el botón.</span>
        </div>

        <!-- ===== Ícono SVG ===== -->
        <div class="form-section">
          <h4>Ícono SVG</h4>
          <p class="help">Solo los <code>&lt;path&gt;</code> / <code>&lt;g&gt;</code> que van dentro del viewBox <strong>80×95</strong> del escudo. El fondo del escudo se aplica automáticamente.</p>

          <div class="field">
            <label class="label" for="svg">Markup interno del SVG</label>
            <textarea class="textarea" id="svg" rows="7"><rect x="28" y="38" width="24" height="14" rx="3" stroke="white" stroke-width="1.8" fill="none"/>
<circle cx="40" cy="31" r="5" stroke="white" stroke-width="1.8" fill="none"/>
<line x1="40" y1="52" x2="40" y2="62" stroke="white" stroke-width="2" stroke-linecap="round"/>
<path d="M28 62 h24" stroke="white" stroke-width="2" stroke-linecap="round"/>
<line x1="28" y1="38" x2="22" y2="50" stroke="white" stroke-width="1.8" stroke-linecap="round"/></textarea>
          </div>

          <div class="field-row">
            <div class="field">
              <label class="label">Color del escudo</label>
              <div style="display:flex; gap: 10px">
                <label class="radio"><input type="radio" name="color" value="teal"> Azul</label>
                <label class="radio"><input type="radio" name="color" value="red" checked> Rojo</label>
              </div>
            </div>
            <div class="field">
              <label class="label">&nbsp;</label>
              <label class="switch">
                <input type="checkbox" checked>
                <span class="track"></span>
                <span style="font-family:var(--ff-display);font-weight:700;font-size:var(--fs-14)">División activa y visible en el sitio</span>
              </label>
            </div>
          </div>
        </div>

        <!-- ===== Servicios ===== -->
        <div class="form-section">
          <h4>Servicios asociados</h4>
          <p class="help">2 servicios en esta división. <a href="#" style="color:var(--c-navy); font-weight: 700">+ Agregar servicio</a></p>

          <div style="display:grid; gap: 12px">
            <div class="card" style="padding: 16px; display: flex; align-items: center; gap: 14px">
              <div style="width: 44px; height: 44px; border-radius: 10px; background: var(--c-red-100); color: var(--c-red); display: grid; place-items: center; font-family: var(--ff-display); font-weight: 800; font-size: 13px">036</div>
              <div style="flex:1; min-width: 0">
                <div style="font-family:var(--ff-display); font-weight: 700; font-size: var(--fs-15)">Factores de Riesgo Ergonómico</div>
                <div style="font-size: var(--fs-13); color: var(--c-text-mid)">NOM-036-1-STPS-2018 · 2 banners</div>
              </div>
              <button type="button" class="btn-icon" style="width: 36px; height: 36px" title="Editar"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
            </div>

            <div class="card" style="padding: 16px; display: flex; align-items: center; gap: 14px">
              <div style="width: 44px; height: 44px; border-radius: 10px; background: var(--c-navy-100); color: var(--c-navy); display: grid; place-items: center; font-family: var(--ff-display); font-weight: 800; font-size: 13px">OFF</div>
              <div style="flex:1; min-width: 0">
                <div style="font-family:var(--ff-display); font-weight: 700; font-size: var(--fs-15)">Ergonomía de Oficina</div>
                <div style="font-size: var(--fs-13); color: var(--c-text-mid)">ERG-OFICINA · 2 banners</div>
              </div>
              <button type="button" class="btn-icon" style="width: 36px; height: 36px" title="Editar"><svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
            </div>
          </div>
        </div>

        <!-- ===== Acciones ===== -->
        <div class="form-actions">
          <button type="button" class="btn btn-cta" onclick="window.ARGA && window.ARGA.toast('Cambios guardados correctamente')">
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>
            Guardar Cambios
          </button>
          <button type="button" class="btn btn-outline">
            Cancelar
          </button>
          <div style="flex:1"></div>
          <span class="help" style="margin: 0; align-self: center">Última edición · hace 2 min</span>
        </div>
      </form>

      <!-- COLUMNA SIDE: preview en vivo -->
      <aside class="admin-form-side">
        <div class="card">
          <h4 style="margin:0 0 12px; font-size: var(--fs-13); text-transform: uppercase; letter-spacing: 0.08em; color: var(--c-text-mid)">Vista previa</h4>
          <div class="icon-preview">
            <svg viewBox="0 0 80 95" fill="none" id="previewSvg">
              <path d="M6,0 L74,0 Q80,0 80,6 L80,62 L40,95 L0,62 L0,6 Q0,0 6,0 Z" fill="url(#gradRed)"/>
              <rect x="28" y="38" width="24" height="14" rx="3" stroke="white" stroke-width="1.8" fill="none"/>
              <circle cx="40" cy="31" r="5" stroke="white" stroke-width="1.8" fill="none"/>
              <line x1="40" y1="52" x2="40" y2="62" stroke="white" stroke-width="2" stroke-linecap="round"/>
              <path d="M28 62 h24" stroke="white" stroke-width="2" stroke-linecap="round"/>
              <line x1="28" y1="38" x2="22" y2="50" stroke="white" stroke-width="1.8" stroke-linecap="round"/>
            </svg>
          </div>
          <p style="text-align:center; margin: 16px 0 0; font-family: var(--ff-display); font-weight: 800; color: var(--c-text)">Ergonomía</p>
          <p style="text-align:center; margin: 0; font-size: var(--fs-12); color: var(--c-text-soft); font-weight: 600">2 servicios</p>
        </div>

        <div class="card" style="background: var(--c-bg-soft); border-color: transparent">
          <h4 style="margin:0 0 12px; font-size: var(--fs-13); text-transform: uppercase; letter-spacing: 0.08em; color: var(--c-text-mid)">Datos del sistema</h4>
          <dl style="margin:0; display: grid; gap: 8px; font-size: var(--fs-13)">
            <div style="display: flex; justify-content: space-between"><dt style="color: var(--c-text-mid)">ID</dt><dd style="margin:0; font-family: var(--ff-mono)">8</dd></div>
            <div style="display: flex; justify-content: space-between"><dt style="color: var(--c-text-mid)">Slug</dt><dd style="margin:0; font-family: var(--ff-mono)">ergonomia</dd></div>
            <div style="display: flex; justify-content: space-between"><dt style="color: var(--c-text-mid)">Creada</dt><dd style="margin:0">12 Mar 2024</dd></div>
            <div style="display: flex; justify-content: space-between"><dt style="color: var(--c-text-mid)">Modificada</dt><dd style="margin:0">hoy · 14:32</dd></div>
            <div style="display: flex; justify-content: space-between"><dt style="color: var(--c-text-mid)">Estado</dt><dd style="margin:0"><span class="chip success" style="padding: 2px 8px; font-size: 11px">Activa</span></dd></div>
          </dl>
        </div>
      </aside>

    </div>

  </main>
</div>

<div class="sidebar-backdrop" id="sidebarBackdrop"></div>
<div class="toast-wrap" id="toastWrap"></div>

<script src="/demo/assets/arga.js"></script>
<script>
// Pequeño binder de chips
(function () {
  const input = document.getElementById('newChip');
  const addBtn = document.getElementById('addChip');
  const wrap = document.getElementById('chipInput');
  function addChip(val) {
    const v = (val || '').trim();
    if (!v) return;
    const span = document.createElement('span');
    span.className = 'chip';
    span.innerHTML = `${v} <button type="button" aria-label="Eliminar">×</button>`;
    span.querySelector('button').addEventListener('click', () => span.remove());
    wrap.appendChild(span);
    input.value = '';
  }
  addBtn?.addEventListener('click', () => addChip(input.value));
  input?.addEventListener('keydown', (e) => { if (e.key === 'Enter') { e.preventDefault(); addChip(input.value); } });
  wrap.querySelectorAll('.chip button').forEach((b) => b.addEventListener('click', (e) => e.target.closest('.chip').remove()));

  // Color radio actualiza fill del preview
  document.querySelectorAll('input[name="color"]').forEach((r) => r.addEventListener('change', () => {
    const fill = r.value === 'red' ? 'url(#gradRed)' : 'url(#gradBlue)';
    document.querySelector('#previewSvg path').setAttribute('fill', fill);
  }));

  // SVG textarea actualiza preview (debounced)
  let to;
  document.getElementById('svg').addEventListener('input', (e) => {
    clearTimeout(to);
    to = setTimeout(() => {
      const preview = document.getElementById('previewSvg');
      const color = document.querySelector('input[name="color"]:checked').value;
      const fill = color === 'red' ? 'url(#gradRed)' : 'url(#gradBlue)';
      preview.innerHTML = `<path d="M6,0 L74,0 Q80,0 80,6 L80,62 L40,95 L0,62 L0,6 Q0,0 6,0 Z" fill="${fill}"/>${e.target.value}`;
    }, 220);
  });
})();
</script>
</body>
</html>
