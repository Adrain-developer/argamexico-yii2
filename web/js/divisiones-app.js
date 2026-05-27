/* ============================================================
   ARGA · Divisiones – Two-Modal Flow + Cart Sidebar + Team Coverflow
   Requiere: window.ARGA_DIVISIONS, window.ARGA_TEAM (opcional)
   ============================================================ */
(function () {
  'use strict';

  const DIVISIONS    = window.ARGA_DIVISIONS || [];
  const TEAM         = window.ARGA_TEAM || [];
  const SHIELD_PATH  = 'M6,0 L74,0 Q80,0 80,6 L80,62 L40,95 L0,62 L0,6 Q0,0 6,0 Z';
  const FILL_COLOR   = { teal: 'url(#tealGrad)', red: 'url(#greenGrad)' };

  /* ---- State ---- */
  const state = {
    cart:           JSON.parse(localStorage.getItem('arga_cart_v2') || '[]'),
    modal1Div:      null,
    modal2Service:  null,
    slide:          0,
    autoInterval:   null,
    autoMs:         5000,
    pushedM1:       false,
    pushedM2:       false,
    sidebarOpen:    false,
    // Catalog context: cuando se abre modal 2 desde catálogo, contiene la lista renderizada
    catalogList:    null,   // [{div, item}, ...]
    catalogIndex:   0,
  };

  /* ---- DOM refs (populated in setup) ---- */
  let m1Backdrop, m1Grid, m1Header, m1Close;
  let m2Backdrop, m2DivisionHdr, m2Eyebrow, m2Title, m2Subtitle, m2Chips, m2Body;
  let bannerTrack, bannerDots, cartFab, cartCountEl, toastWrap;
  let cartSidebar, cartSidebarBackdrop, cartSidebarList, cartSidebarCount, cartSidebarEmpty;

  /* ============================================================
     Setup: inject modal + cart sidebar HTML once into DOM
     ============================================================ */
  function setup() {
    document.body.insertAdjacentHTML('beforeend', `
      <!-- Modal 1: Servicios de la División -->
      <div class="dv-m1-backdrop" id="dvM1Backdrop" role="dialog" aria-modal="true">
        <div class="dv-m1" id="dvM1">
          <button class="dv-close" id="dvM1Close" aria-label="Cerrar" type="button">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
          </button>
          <div class="dv-m1-header" id="dvM1Header"></div>
          <div class="dv-m1-grid"   id="dvM1Grid"></div>
        </div>
      </div>

      <!-- Modal 2: Detalle del Servicio -->
      <div class="dv-m2-backdrop" id="dvM2Backdrop" role="dialog" aria-modal="true">
        <div class="dv-m2" id="dvM2">
          <div class="dv-m2-left">
            <button class="dv-back-btn" id="dvM2Back" type="button">
              <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
              Ver todos los servicios
            </button>

            <!-- División context header -->
            <div class="dv-m2-division" id="dvM2DivisionHdr"></div>

            <!-- Service info -->
            <span class="dv-eyebrow"   id="dvM2Eyebrow">Servicio</span>
            <h2  class="dv-m2-title"   id="dvM2Title"></h2>
            <p   class="dv-m2-subtitle" id="dvM2Subtitle"></p>
            <div class="dv-divider"></div>
            <div class="dv-chips"      id="dvM2Chips"></div>
            <div class="dv-m2-body"    id="dvM2Body"></div>
            <div class="dv-m2-actions" id="dvM2Actions" data-mode="index">
              <button class="dv-btn-primary"   id="dvBtnAddQuote" type="button">
                <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
                <span>Agregar a cotización</span>
              </button>
              <!-- Modo index: link al catálogo -->
              <button class="dv-btn-secondary" id="dvBtnAllDivisions" type="button">
                Ver todas las divisiones
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </button>
              <!-- Modo catalog: navegación prev/next -->
              <div class="dv-m2-nav" id="dvM2Nav">
                <button class="dv-btn-nav" id="dvBtnPrevSvc" type="button" aria-label="Servicio anterior">
                  <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M15 18l-6-6 6-6"/></svg>
                  <span>Anterior</span>
                </button>
                <span class="dv-m2-nav-counter" id="dvM2NavCounter">1 / 1</span>
                <button class="dv-btn-nav" id="dvBtnNextSvc" type="button" aria-label="Servicio siguiente">
                  <span>Siguiente</span>
                  <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M9 6l6 6-6 6"/></svg>
                </button>
              </div>
            </div>
          </div>
          <div class="dv-m2-right" id="dvM2Right">
            <button class="dv-close dv-m2-close-abs" id="dvM2Close" aria-label="Cerrar" type="button">
              <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
            <div class="dv-banner-track"  id="dvBannerTrack"></div>
            <button class="dv-banner-nav dv-banner-prev" id="dvBannerPrev" aria-label="Anterior" type="button">
              <svg viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <button class="dv-banner-nav dv-banner-next" id="dvBannerNext" aria-label="Siguiente" type="button">
              <svg viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M9 6l6 6-6 6"/></svg>
            </button>
            <div class="dv-banner-dots" id="dvBannerDots"></div>
          </div>
        </div>
      </div>

      <!-- Cart FAB -->
      <button class="dv-cart-fab" id="dvCartFab" aria-label="Ver cotización" type="button" hidden>
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 002 1.6h9.7a2 2 0 002-1.6L23 6H6"/></svg>
        Cotización
        <span class="dv-cart-count" id="dvCartCount">0</span>
      </button>

      <!-- Cart Sidebar -->
      <div class="dv-cart-backdrop" id="dvCartBackdrop"></div>
      <aside class="dv-cart-sidebar" id="dvCartSidebar" aria-label="Cotización" role="dialog" aria-modal="true">
        <header class="dv-cart-head">
          <div>
            <h3 class="dv-cart-title">Cotización</h3>
          </div>
          <button class="dv-cart-close" id="dvCartClose" aria-label="Cerrar" type="button">
            <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
          </button>
        </header>

        <div class="dv-cart-body">
          <p class="dv-cart-counter">
            <span id="dvCartSidebarCount">0</span> servicio(s) agregado(s)
          </p>
          <ul class="dv-cart-list" id="dvCartSidebarList"></ul>
          <div class="dv-cart-empty" id="dvCartSidebarEmpty">
            <svg viewBox="0 0 24 24" width="44" height="44" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/>
              <path d="M1 1h4l2.7 13.4a2 2 0 002 1.6h9.7a2 2 0 002-1.6L23 6H6"/>
            </svg>
            <p>Tu cotización está vacía.</p>
            <small>Agrega servicios desde el catálogo para crear tu solicitud.</small>
          </div>
        </div>

        <footer class="dv-cart-foot">
          <button class="dv-cart-clear" id="dvCartClear" type="button">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
            </svg>
            Vaciar
          </button>
          <button class="dv-cart-cta" id="dvCartRequest" type="button">
            Solicitar cotización
            <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
          </button>
        </footer>
      </aside>

      <!-- Confirm: Vaciar cotización -->
      <div class="dv-confirm-overlay" id="dvClearConfirm" role="dialog" aria-modal="true" aria-labelledby="dvClearConfirmTitle">
        <div class="dv-confirm-dialog">
          <div class="dv-confirm-icon">
            <svg viewBox="0 0 24 24" width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg>
          </div>
          <h4 class="dv-confirm-title" id="dvClearConfirmTitle">¿Vaciar la cotización?</h4>
          <p class="dv-confirm-msg">Se eliminarán todos los servicios agregados.</p>
          <div class="dv-confirm-actions">
            <button class="dv-confirm-cancel" id="dvClearCancel" type="button">Cancelar</button>
            <button class="dv-confirm-ok" id="dvClearOk" type="button">
              <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18M8 6V4a2 2 0 012-2h4a2 2 0 012 2v2M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/></svg>
              Vaciar cotización
            </button>
          </div>
        </div>
      </div>

      <!-- Toasts -->
      <div class="dv-toast-wrap" id="dvToastWrap"></div>
    `);

    m1Backdrop     = document.getElementById('dvM1Backdrop');
    m1Grid         = document.getElementById('dvM1Grid');
    m1Header       = document.getElementById('dvM1Header');
    m1Close        = document.getElementById('dvM1Close');
    m2Backdrop     = document.getElementById('dvM2Backdrop');
    m2DivisionHdr  = document.getElementById('dvM2DivisionHdr');
    m2Eyebrow      = document.getElementById('dvM2Eyebrow');
    m2Title        = document.getElementById('dvM2Title');
    m2Subtitle     = document.getElementById('dvM2Subtitle');
    m2Chips        = document.getElementById('dvM2Chips');
    m2Body         = document.getElementById('dvM2Body');
    bannerTrack    = document.getElementById('dvBannerTrack');
    bannerDots     = document.getElementById('dvBannerDots');
    cartFab        = document.getElementById('dvCartFab');
    cartCountEl    = document.getElementById('dvCartCount');
    toastWrap      = document.getElementById('dvToastWrap');
    cartSidebar         = document.getElementById('dvCartSidebar');
    cartSidebarBackdrop = document.getElementById('dvCartBackdrop');
    cartSidebarList     = document.getElementById('dvCartSidebarList');
    cartSidebarCount    = document.getElementById('dvCartSidebarCount');
    cartSidebarEmpty    = document.getElementById('dvCartSidebarEmpty');
  }

  /* ============================================================
     Helpers
     ============================================================ */
  function shieldSVG(division, size = 80) {
    const h    = Math.round(size * 95 / 80);
    const fill = FILL_COLOR[division.color] || FILL_COLOR.teal;
    return `<svg viewBox="0 0 80 95" width="${size}" height="${h}" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="${SHIELD_PATH}" fill="${fill}"/>
      ${division.icon || ''}
    </svg>`;
  }

  function esc(str) {
    const d = document.createElement('div');
    d.textContent = str ?? '';
    return d.innerHTML;
  }

  /* ============================================================
     Modal 1 — Servicios de la División
     ============================================================ */
  function openModal1(division) {
    state.modal1Div = division;

    m1Header.innerHTML = `
      <div class="dv-m1-hdr-shield">${shieldSVG(division, 62)}</div>
      <div class="dv-m1-hdr-info">
        <span class="dv-m1-hdr-tag">${esc(division.tagline || 'División de Negocio')}</span>
        <h2  class="dv-m1-hdr-title">${esc(division.name)}</h2>
        <p   class="dv-m1-hdr-desc">${esc(division.descripcion || '')}</p>
      </div>
    `;

    m1Grid.innerHTML = (division.items || []).map((item, idx) => {
      const inCart = state.cart.some(c => c.serviceId === item.id);
      return `
        <div class="dv-svc-card">
          <div class="dv-svc-icon">${shieldSVG(division, 44)}</div>
          <div class="dv-svc-info">
            <h3 class="dv-svc-title">${esc(item.title)}</h3>
            ${item.code ? `<span class="dv-svc-code">${esc(item.code)}</span>` : ''}
            <p class="dv-svc-desc">${esc((item.descripcion || '').slice(0, 110))}${(item.descripcion || '').length > 110 ? '…' : ''}</p>
          </div>
          <div class="dv-svc-actions">
            <button class="dv-svc-btn-detail" data-idx="${idx}" type="button">
              Ver detalles
              <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </button>
            <button class="dv-svc-btn-cart ${inCart ? 'added' : ''}" data-idx="${idx}" type="button">
              ${cartBtnContent(inCart)}
            </button>
          </div>
        </div>
      `;
    }).join('');

    bindServiceCards(division);
    m1Backdrop.classList.add('open');
    document.body.classList.add('dv-no-scroll');
    pushHistoryState('m1');
  }

  function closeModal1(skipHistory) {
    if (!m1Backdrop.classList.contains('open')) return;
    m1Backdrop.classList.remove('open');
    state.modal1Div = null;
    if (!state.modal2Service && !state.sidebarOpen) document.body.classList.remove('dv-no-scroll');
    if (!skipHistory && state.pushedM1) {
      state.pushedM1 = false;
      history.back();
    } else if (skipHistory) {
      state.pushedM1 = false;
    }
  }

  function bindServiceCards(division) {
    m1Grid.querySelectorAll('.dv-svc-btn-detail').forEach(btn => {
      btn.addEventListener('click', () => {
        const item = division.items[parseInt(btn.dataset.idx, 10)];
        if (item) openModal2(division, item);
      });
    });
    m1Grid.querySelectorAll('.dv-svc-btn-cart').forEach(btn => {
      btn.addEventListener('click', () => {
        const item = division.items[parseInt(btn.dataset.idx, 10)];
        if (item && addToCart(division, item)) {
          btn.classList.add('added');
          btn.innerHTML = cartBtnContent(true);
        }
      });
    });
  }

  function cartBtnContent(added) {
    return added
      ? `<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg> Agregado`
      : `<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg> Agregar`;
  }

  /* ============================================================
     Modal 2 — Detalle del Servicio
     ============================================================ */
  function openModal2(division, service) {
    state.modal2Service = service;
    state.modal1Div     = division;

    // Render division context header
    const divNoms = (division.noms || []).map(n => `<span class="dv-chip subtle">${esc(n)}</span>`).join('');
    m2DivisionHdr.innerHTML = `
      <div class="dv-m2-divshield">${shieldSVG(division, 48)}</div>
      <div class="dv-m2-divinfo">
        <span class="dv-m2-divlabel">División</span>
        <p class="dv-m2-divname">${esc(division.name)}</p>
        ${divNoms ? `<div class="dv-m2-divnoms">${divNoms}</div>` : ''}
      </div>
    `;

    m2Eyebrow.textContent  = 'Servicio';
    m2Title.textContent    = service.title;
    m2Subtitle.textContent = service.descripcion || '';

    // Service-level chips: usar el campo `code` (NOM del servicio)
    m2Chips.innerHTML = service.code
      ? `<span class="dv-chip">${esc(service.code)}</span>`
      : '';

    m2Body.innerHTML = [
      service.descripcion ? `<h4>Reconocimiento</h4><p>${esc(service.descripcion)}</p>` : '',
      service.evaluacion  ? `<h4>Evaluación</h4><p>${esc(service.evaluacion)}</p>`  : '',
    ].join('');

    renderBanners(service);

    const addBtn = document.getElementById('dvBtnAddQuote');
    const inCart = state.cart.some(c => c.serviceId === service.id);
    addBtn.classList.toggle('added', inCart);
    addBtn.querySelector('span').textContent = inCart ? '✓ Agregado' : 'Agregar a cotización';

    // Modo de las actions (catalog vs index)
    const actionsEl = document.getElementById('dvM2Actions');
    if (actionsEl) {
      const isCatalog = !!state.catalogList && state.catalogList.length > 0;
      actionsEl.dataset.mode = isCatalog ? 'catalog' : 'index';
      if (isCatalog) {
        const idx = state.catalogList.findIndex(s => s.item.id === service.id && s.div.id === division.id);
        state.catalogIndex = idx >= 0 ? idx : 0;
        const counter = document.getElementById('dvM2NavCounter');
        if (counter) counter.textContent = `${state.catalogIndex + 1} / ${state.catalogList.length}`;
      }
    }

    // Si la modal ya estaba abierta (al navegar prev/next), no re-push history ni re-animar
    const wasOpen = m2Backdrop.classList.contains('open');
    m2Backdrop.classList.add('open');
    document.body.classList.add('dv-no-scroll');
    startAutoplay();
    if (!wasOpen) pushHistoryState('m2');
  }

  function navigateCatalog(delta) {
    if (!state.catalogList || !state.catalogList.length) return;
    const total = state.catalogList.length;
    const next = ((state.catalogIndex + delta) % total + total) % total;
    const { div, item } = state.catalogList[next];
    state.modal1Div = div;
    openModal2(div, item);
  }

  function closeModal2(skipHistory) {
    if (!m2Backdrop.classList.contains('open')) return;
    m2Backdrop.classList.remove('open');
    stopAutoplay();
    state.modal2Service = null;
    // Reset contexto de catálogo al cerrar
    state.catalogList = null;
    state.catalogIndex = 0;
    if (!state.modal1Div && !state.sidebarOpen) document.body.classList.remove('dv-no-scroll');
    if (!skipHistory && state.pushedM2) {
      state.pushedM2 = false;
      history.back();
    } else if (skipHistory) {
      state.pushedM2 = false;
    }
  }

  /* ---- History (botón atrás móvil) ---- */
  function pushHistoryState(layer) {
    try {
      history.pushState({ argaLayer: layer }, '');
      if (layer === 'm1') state.pushedM1 = true;
      if (layer === 'm2') state.pushedM2 = true;
      if (layer === 'sidebar') state.sidebarPushed = true;
    } catch (e) { /* no-op */ }
  }

  window.addEventListener('popstate', () => {
    // Cerrar la capa superior abierta cuando el usuario presiona atrás
    if (m2Backdrop && m2Backdrop.classList.contains('open')) {
      closeModal2(true);
      return;
    }
    if (m1Backdrop && m1Backdrop.classList.contains('open')) {
      closeModal1(true);
      return;
    }
    if (state.sidebarOpen) {
      closeCartSidebar(true);
    }
  });

  /* ============================================================
     Banner carousel
     ============================================================ */
  function renderBanners(service) {
    const slides = Array.isArray(service.banners) && service.banners.length
      ? service.banners
      : [{ src: '', caption: service.title }];

    state.slide = 0;

    bannerTrack.innerHTML = slides.map(s => {
      const src     = typeof s === 'string' ? s : (s.src || '');
      const caption = typeof s === 'string' ? service.title : (s.caption || service.title);
      return `
        <div class="dv-banner-slide" style="background-image:url('${src}')">
          <div class="dv-banner-caption">${esc(caption)}</div>
        </div>
      `;
    }).join('');

    bannerDots.innerHTML = slides.map((_, i) =>
      `<button class="dv-banner-dot ${i === 0 ? 'active' : ''}" data-slide="${i}" aria-label="Slide ${i + 1}" type="button"></button>`
    ).join('');

    bannerDots.querySelectorAll('.dv-banner-dot').forEach(dot =>
      dot.addEventListener('click', () => goToSlide(parseInt(dot.dataset.slide, 10)))
    );

    bannerTrack.style.transform  = 'translateX(0%)';
    bannerTrack.dataset.total    = String(slides.length);
  }

  function goToSlide(idx) {
    const total = parseInt(bannerTrack.dataset.total || '0', 10);
    if (!total) return;
    state.slide = ((idx % total) + total) % total;
    bannerTrack.style.transform = `translateX(-${state.slide * 100}%)`;
    bannerDots.querySelectorAll('.dv-banner-dot')
      .forEach((d, i) => d.classList.toggle('active', i === state.slide));
  }

  function startAutoplay() {
    stopAutoplay();
    if (!state.autoMs) return;
    state.autoInterval = setInterval(() => goToSlide(state.slide + 1), state.autoMs);
  }
  function stopAutoplay() {
    if (state.autoInterval) { clearInterval(state.autoInterval); state.autoInterval = null; }
  }

  /* ============================================================
     Cart
     ============================================================ */
  function addToCart(division, service) {
    if (state.cart.some(c => c.serviceId === service.id)) {
      showToast(`${service.title} ya está en tu cotización`, 'info');
      return false;
    }
    state.cart.push({
      serviceId:    service.id,
      divisionId:   division.id,
      divisionName: division.name,
      title:        service.title,
      code:         service.code || '',
      ts:           Date.now(),
    });
    persistCart();
    updateCartUI();
    showToast(`${service.title} agregado a cotización`);
    return true;
  }

  function removeFromCart(serviceId) {
    state.cart = state.cart.filter(c => c.serviceId !== serviceId);
    persistCart();
    updateCartUI();
    renderCartSidebar();
  }

  function clearCart() {
    state.cart = [];
    persistCart();
    updateCartUI();
    renderCartSidebar();
  }

  function persistCart() {
    localStorage.setItem('arga_cart_v2', JSON.stringify(state.cart));
  }

  function updateCartUI() {
    if (!cartFab) return;
    const n = state.cart.length;
    cartCountEl.textContent = n;
    cartCountEl.style.transform = 'scale(1.4)';
    setTimeout(() => { cartCountEl.style.transform = 'scale(1)'; }, 220);
    cartFab.hidden = (n === 0);
  }

  /* ============================================================
     Cart Sidebar
     ============================================================ */
  function openCartSidebar() {
    if (state.sidebarOpen) return;
    state.sidebarOpen = true;
    renderCartSidebar();
    cartSidebar.classList.add('open');
    cartSidebarBackdrop.classList.add('open');
    document.body.classList.add('dv-no-scroll');
    pushHistoryState('sidebar');
  }

  function closeCartSidebar(skipHistory) {
    if (!state.sidebarOpen) return;
    state.sidebarOpen = false;
    cartSidebar.classList.remove('open');
    cartSidebarBackdrop.classList.remove('open');
    if (!state.modal1Div && !state.modal2Service) document.body.classList.remove('dv-no-scroll');
    if (!skipHistory && state.sidebarPushed) {
      state.sidebarPushed = false;
      history.back();
    } else if (skipHistory) {
      state.sidebarPushed = false;
    }
  }

  function renderCartSidebar() {
    if (!cartSidebarList) return;
    cartSidebarCount.textContent = state.cart.length;

    if (state.cart.length === 0) {
      cartSidebarList.innerHTML = '';
      cartSidebarEmpty.style.display = 'flex';
      cartSidebar.classList.add('is-empty');
      return;
    }
    cartSidebarEmpty.style.display = 'none';
    cartSidebar.classList.remove('is-empty');

    cartSidebarList.innerHTML = state.cart.map(it => `
      <li class="dv-cart-item" data-id="${it.serviceId}">
        <div class="dv-cart-item-body" role="link" tabindex="0" aria-label="Ver ${esc(it.title)} en catálogo">
          <span class="dv-cart-item-div">${esc(it.divisionName || '')}</span>
          <p class="dv-cart-item-title">${esc(it.title)}</p>
          ${it.code ? `<span class="dv-cart-item-code">${esc(it.code)}</span>` : ''}
        </div>
        <button class="dv-cart-item-remove" data-id="${it.serviceId}" aria-label="Eliminar" type="button">
          <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
        </button>
      </li>
    `).join('');

    cartSidebarList.querySelectorAll('.dv-cart-item-remove').forEach(btn => {
      btn.addEventListener('click', () => removeFromCart(parseInt(btn.dataset.id, 10)));
    });

    cartSidebarList.querySelectorAll('.dv-cart-item-body').forEach(body => {
      const li    = body.closest('.dv-cart-item');
      const entry = state.cart.find(c => c.serviceId === parseInt(li.dataset.id, 10));
      if (!entry) return;
      const goToCatalog = () => {
        const div        = DIVISIONS.find(d => d.id === entry.divisionId);
        const slug       = div?.slug;
        const catalogUrl = (window.ARGA_URLS && window.ARGA_URLS.catalogo) || 'index.php?r=site%2Fcatalogo';
        const sep        = catalogUrl.includes('?') ? '&' : '?';
        window.location.href = catalogUrl + (slug ? `${sep}division=${encodeURIComponent(slug)}` : '');
      };
      body.addEventListener('click', goToCatalog);
      body.addEventListener('keydown', e => { if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); goToCatalog(); } });
    });
  }

  /* ============================================================
     Toast
     ============================================================ */
  function showToast(msg, type = 'success') {
    const el   = document.createElement('div');
    el.className = 'dv-toast';
    const icon = type === 'info'
      ? `<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>`
      : `<svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>`;
    el.innerHTML = `<span class="dv-toast-icon">${icon}</span><span>${esc(msg)}</span>`;
    if (type === 'info') el.style.borderLeftColor = 'var(--navy)';
    toastWrap.appendChild(el);
    setTimeout(() => el.remove(), 3900);
  }

  /* ============================================================
     Global event bindings
     ============================================================ */
  function bindGlobal() {
    m1Close.addEventListener('click', () => closeModal1());
    m1Backdrop.addEventListener('click', e => { if (e.target === m1Backdrop) closeModal1(); });

    document.getElementById('dvM2Close').addEventListener('click', () => closeModal2());
    document.getElementById('dvM2Back').addEventListener('click', () => closeModal2());
    m2Backdrop.addEventListener('click', e => {
      if (e.target === m2Backdrop) { closeModal2(); closeModal1(); }
    });

    document.getElementById('dvBannerPrev').addEventListener('click', () => { goToSlide(state.slide - 1); startAutoplay(); });
    document.getElementById('dvBannerNext').addEventListener('click', () => { goToSlide(state.slide + 1); startAutoplay(); });

    document.getElementById('dvBtnAddQuote').addEventListener('click', () => {
      if (!state.modal2Service || !state.modal1Div) return;
      if (addToCart(state.modal1Div, state.modal2Service)) {
        const btn = document.getElementById('dvBtnAddQuote');
        btn.classList.add('added');
        btn.querySelector('span').textContent = '✓ Agregado';
      }
    });

    document.getElementById('dvBtnAllDivisions').addEventListener('click', () => {
      const slug = state.modal1Div?.slug;
      closeModal2(true);
      closeModal1(true);
      const catalogUrl = (window.ARGA_URLS && window.ARGA_URLS.catalogo) || 'index.php?r=site%2Fcatalogo';
      const sep = catalogUrl.includes('?') ? '&' : '?';
      window.location.href = catalogUrl + (slug ? `${sep}division=${encodeURIComponent(slug)}` : '');
    });

    document.getElementById('dvBtnPrevSvc').addEventListener('click', () => navigateCatalog(-1));
    document.getElementById('dvBtnNextSvc').addEventListener('click', () => navigateCatalog(1));

    cartFab.addEventListener('click', openCartSidebar);
    document.getElementById('dvCartClose').addEventListener('click', () => closeCartSidebar());
    cartSidebarBackdrop.addEventListener('click', () => closeCartSidebar());

    const clearConfirmEl = document.getElementById('dvClearConfirm');
    document.getElementById('dvCartClear').addEventListener('click', () => {
      if (!state.cart.length) return;
      clearConfirmEl.classList.add('open');
    });
    document.getElementById('dvClearCancel').addEventListener('click', () => clearConfirmEl.classList.remove('open'));
    document.getElementById('dvClearOk').addEventListener('click', () => {
      clearConfirmEl.classList.remove('open');
      clearCart();
      showToast('Cotización vaciada', 'info');
    });
    clearConfirmEl.addEventListener('click', e => { if (e.target === clearConfirmEl) clearConfirmEl.classList.remove('open'); });

    document.getElementById('dvCartRequest').addEventListener('click', () => {
      if (!state.cart.length) {
        showToast('Agrega al menos un servicio antes de solicitar', 'info');
        return;
      }
      sessionStorage.setItem('arga_quote_pending', JSON.stringify(state.cart));
      const contactUrl = 'index.php';
      //const contactUrl = (window.ARGA_URLS && window.ARGA_URLS.contacto) || 'index.php?r=contactos%2Fcreate';
      //const sep = contactUrl.includes('?') ? '&' : '?';
      //window.location.href = contactUrl + sep + 'quote=1';
    });

    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') {
        if (clearConfirmEl.classList.contains('open')) { clearConfirmEl.classList.remove('open'); return; }
        if (m2Backdrop.classList.contains('open')) closeModal2();
        else if (m1Backdrop.classList.contains('open')) closeModal1();
        else if (state.sidebarOpen) closeCartSidebar();
      }
      if (m2Backdrop.classList.contains('open')) {
        // En modo catálogo, ← → navegan entre servicios; banner se mueve con shift+←/→
        const isCatalogMode = document.getElementById('dvM2Actions')?.dataset.mode === 'catalog';
        if (isCatalogMode && !e.shiftKey) {
          if (e.key === 'ArrowRight') { navigateCatalog(1); return; }
          if (e.key === 'ArrowLeft')  { navigateCatalog(-1); return; }
        }
        if (e.key === 'ArrowRight') { goToSlide(state.slide + 1); startAutoplay(); }
        if (e.key === 'ArrowLeft')  { goToSlide(state.slide - 1); startAutoplay(); }
      }
    });
  }

  /* ============================================================
     Shield grid binding
     ============================================================ */
  function bindShields() {
    document.querySelectorAll('.unidad-item[data-division-id]').forEach(item => {
      const open = () => {
        const id  = parseInt(item.dataset.divisionId, 10);
        const div = DIVISIONS.find(d => d.id === id);
        if (div) openModal1(div);
      };
      item.addEventListener('click', open);
      item.addEventListener('keydown', e => {
        if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); open(); }
      });
    });
  }

  /* ============================================================
     CATALOG PAGE — sticky pill filters + animated grid
     ============================================================ */
  function initCatalog() {
    const catalogEl = document.getElementById('dvCatalog');
    if (!catalogEl || !DIVISIONS.length) return;

    const filters    = document.getElementById('dvCatFilters');
    const mainTitle  = document.getElementById('dvCatMainTitle');
    const mainNote   = document.getElementById('dvCatMainNote');
    const grid       = document.getElementById('dvCatGrid');
    const searchInp  = document.getElementById('dvCatSearch');
    const countEl    = document.getElementById('dvCatCount');

    let activeSlug  = 'all';
    let searchQuery = '';
    let searchTimer = null;
    let highlightDivisionId = null;
    let currentServices = [];   // últimos servicios renderizados (orden visible)

    function flatServices(slug) {
      if (slug === 'all') {
        return DIVISIONS.flatMap(d => d.items.map(item => ({ div: d, item })));
      }
      const div = DIVISIONS.find(d => d.slug === slug);
      return div ? div.items.map(item => ({ div, item })) : [];
    }

    /* ---- Pills ---- */
    function buildFilters() {
      const items = [
        { slug: 'all', name: 'Todas' },
        ...DIVISIONS.map(d => ({ slug: d.slug, name: d.name })),
      ];
      filters.innerHTML = items.map(({ slug, name }) => `
        <button class="dv-cat-pill ${activeSlug === slug ? 'active' : ''}" data-slug="${slug}" type="button" role="tab" aria-selected="${activeSlug === slug}">
          <span>${esc(name)}</span>
        </button>
      `).join('');

      filters.querySelectorAll('.dv-cat-pill').forEach(btn => {
        btn.addEventListener('click', (e) => {
          if (filters.dataset.justDragged === '1') { e.preventDefault(); return; }
          if (btn.dataset.slug === activeSlug) return;
          activeSlug = btn.dataset.slug;
          highlightDivisionId = null;
          history.replaceState(null, '', activeSlug === 'all' ? location.pathname : `#${activeSlug}`);
          filters.querySelectorAll('.dv-cat-pill').forEach(p => {
            const isActive = p.dataset.slug === activeSlug;
            p.classList.toggle('active', isActive);
            p.setAttribute('aria-selected', isActive ? 'true' : 'false');
          });
          btn.scrollIntoView({ behavior: 'smooth', inline: 'center', block: 'nearest' });
          animateGridChange();
        });
      });

      enableDragScroll(filters);
    }

    /* ---- Drag-to-scroll + wheel-to-horizontal on desktop ---- */
    function enableDragScroll(el) {
      if (el.dataset.dragBound === '1') return;
      el.dataset.dragBound = '1';

      let down = false, startX = 0, startScroll = 0, dragged = false;

      el.addEventListener('pointerdown', (e) => {
        if (e.pointerType === 'touch') return;
        down = true;
        dragged = false;
        startX = e.clientX;
        startScroll = el.scrollLeft;
      });
      el.addEventListener('pointermove', (e) => {
        if (!down) return;
        const dx = e.clientX - startX;
        if (Math.abs(dx) > 5) {
          if (!dragged) {
            dragged = true;
            el.classList.add('is-grabbing');
            try { el.setPointerCapture(e.pointerId); } catch (err) {}
          }
          el.scrollLeft = startScroll - dx;
        }
      });
      const finishDrag = () => {
        if (!down) return;
        down = false;
        if (dragged) {
          el.classList.remove('is-grabbing');
          el.dataset.justDragged = '1';
          setTimeout(() => { el.dataset.justDragged = '0'; }, 80);
        }
        dragged = false;
      };
      el.addEventListener('pointerup',     finishDrag);
      el.addEventListener('pointercancel', finishDrag);

      // Wheel → horizontal (solo si el scroll dominante es vertical)
      el.addEventListener('wheel', (e) => {
        const dy = e.deltaY;
        const dx = e.deltaX;
        if (Math.abs(dy) > Math.abs(dx)) {
          el.scrollLeft += dy;
          e.preventDefault();
        }
      }, { passive: false });
    }

    /* ---- Grid render with fade transition ---- */
    function animateGridChange() {
      grid.classList.add('is-leaving');
      setTimeout(() => {
        renderGrid();
        grid.classList.remove('is-leaving');
      }, 200);
    }

    function cardHTML(div, item, idx) {
      const inCart = state.cart.some(c => c.serviceId === item.id);
      const descShort = (item.descripcion || '').slice(0, 130) + ((item.descripcion || '').length > 130 ? '…' : '');
      return `
        <article class="dv-cat-card" id="dvCatCard-${div.id}-${item.id}"
                 data-division-id="${div.id}" data-service-id="${item.id}"
                 style="--enter-delay:${Math.min(idx * 35, 420)}ms">
          <header class="dv-cat-card-top">
            <div class="dv-cat-card-icon">${shieldSVG(div, 56)}</div>
            <button class="dv-cat-card-quote ${inCart ? 'added' : ''}"
                    data-div="${div.id}" data-svc="${item.id}"
                    type="button"
                    aria-label="${inCart ? 'Agregado a cotización' : 'Agregar a cotización'}"
                    title="${inCart ? 'Agregado a cotización' : 'Agregar a cotización'}">
              ${inCart ? cartDoneIcon() : cartAddIcon()}
            </button>
          </header>
          <div class="dv-cat-card-body">
            <span class="dv-cat-card-div">${esc(div.name)}</span>
            <h3 class="dv-cat-card-title">${esc(item.title)}</h3>
            ${descShort ? `<p class="dv-cat-card-desc">${esc(descShort)}</p>` : ''}
          </div>
          <footer class="dv-cat-card-foot">
            <span class="dv-cat-card-code">${esc(item.code || '')}</span>
            <button class="dv-cat-card-link" data-div="${div.id}" data-svc="${item.id}" type="button">
              Ver detalle
              <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </button>
          </footer>
        </article>
      `;
    }

    function renderGrid() {
      let services = flatServices(activeSlug);
      const isSearch = !!searchQuery;

      // Hide main header when in "Todas" (cada sección tendrá su propio header)
      const mainHdr = document.querySelector('.dv-cat-main-header');
      if (activeSlug === 'all') {
        if (mainHdr) mainHdr.style.display = 'none';
      } else {
        if (mainHdr) mainHdr.style.display = '';
        const div = DIVISIONS.find(d => d.slug === activeSlug);
        mainTitle.textContent = div?.name        || '';
        mainNote.textContent  = div?.descripcion || '';
      }

      if (isSearch) {
        const q = searchQuery.toLowerCase();
        services = services.filter(({ item }) =>
          item.title.toLowerCase().includes(q)         ||
          (item.code        || '').toLowerCase().includes(q) ||
          (item.descripcion || '').toLowerCase().includes(q)
        );
        if (mainHdr) mainHdr.style.display = '';
        mainTitle.textContent = 'Resultados de búsqueda';
        mainNote.textContent  = `"${searchQuery}"`;
      }

      if (countEl) {
        countEl.textContent = services.length
          ? `${services.length} servicio${services.length !== 1 ? 's' : ''}`
          : '';
      }

      // Captura orden visible para prev/next de modal 2
      currentServices = services.slice();

      if (!services.length) {
        grid.innerHTML = '<p class="dv-cat-empty">Sin resultados para esa búsqueda.</p>';
        return;
      }

      // Render: grouped by division when "Todas" (sin búsqueda) | flat otherwise
      if (activeSlug === 'all' && !isSearch) {
        // Group services by division order
        const grouped = new Map();
        services.forEach(({ div, item }) => {
          if (!grouped.has(div.id)) grouped.set(div.id, { div, items: [] });
          grouped.get(div.id).items.push(item);
        });

        let globalIdx = 0;
        grid.innerHTML = Array.from(grouped.values()).map(({ div, items }) => {
          const cards = items.map((item) => cardHTML(div, item, globalIdx++)).join('');
          return `
            <section class="dv-cat-section" data-division-id="${div.id}">
              <header class="dv-cat-section-head">
                <div class="dv-cat-section-shield">${shieldSVG(div, 42)}</div>
                <div>
                  <h3 class="dv-cat-section-title">${esc(div.name)}</h3>
                  ${div.descripcion ? `<p class="dv-cat-section-desc">${esc(div.descripcion)}</p>` : ''}
                </div>
                <span class="dv-cat-section-count">${items.length} servicio${items.length !== 1 ? 's' : ''}</span>
              </header>
              <div class="dv-cat-section-grid">${cards}</div>
            </section>
          `;
        }).join('');
        grid.classList.add('is-grouped');
      } else {
        grid.classList.remove('is-grouped');
        grid.innerHTML = services.map(({ div, item }, i) => cardHTML(div, item, i)).join('');
      }

      // Trigger entry animation in next frame (so layout is computed)
      const cards = grid.querySelectorAll('.dv-cat-card');
      requestAnimationFrame(() => {
        cards.forEach(c => c.classList.add('is-fresh'));
        // Cleanup is-fresh after max animation completes — leaves cards in stable visible state
        setTimeout(() => cards.forEach(c => c.classList.remove('is-fresh')), 1000);
      });

      // Bind events
      grid.querySelectorAll('.dv-cat-card-link').forEach(btn => {
        btn.addEventListener('click', e => { e.stopPropagation(); openServiceFromBtn(btn); });
      });
      grid.querySelectorAll('.dv-cat-card').forEach(card => {
        card.addEventListener('click', e => {
          if (e.target.closest('.dv-cat-card-quote')) return;
          openServiceFromCard(card);
        });
      });
      grid.querySelectorAll('.dv-cat-card-quote').forEach(btn => {
        btn.addEventListener('click', e => {
          e.stopPropagation();
          const div  = DIVISIONS.find(d => d.id === parseInt(btn.dataset.div, 10));
          const item = div?.items.find(i => i.id === parseInt(btn.dataset.svc, 10));
          if (div && item && addToCart(div, item)) {
            btn.classList.add('added');
            btn.innerHTML = cartDoneIcon();
            btn.setAttribute('aria-label', 'Agregado a cotización');
            btn.setAttribute('title', 'Agregado a cotización');
          }
        });
      });

      // Highlight de la división de origen
      if (highlightDivisionId !== null) {
        const targetCards = grid.querySelectorAll(`.dv-cat-card[data-division-id="${highlightDivisionId}"]`);
        targetCards.forEach((card, i) => {
          setTimeout(() => {
            card.classList.add('is-highlight');
            if (i === 0) card.scrollIntoView({ behavior: 'smooth', block: 'center' });
            setTimeout(() => card.classList.remove('is-highlight'), 2200);
          }, 650 + i * 90);
        });
        highlightDivisionId = null;
      }
    }

    function openServiceFromBtn(btn) {
      const div  = DIVISIONS.find(d => d.id === parseInt(btn.dataset.div, 10));
      const item = div?.items.find(i => i.id === parseInt(btn.dataset.svc, 10));
      if (div && item) {
        state.modal1Div    = div;
        state.catalogList  = currentServices.slice();
        openModal2(div, item);
      }
    }
    function openServiceFromCard(card) {
      const div  = DIVISIONS.find(d => d.id === parseInt(card.dataset.divisionId, 10));
      const item = div?.items.find(i => i.id === parseInt(card.dataset.serviceId, 10));
      if (div && item) {
        state.modal1Div    = div;
        state.catalogList  = currentServices.slice();
        openModal2(div, item);
      }
    }

    if (searchInp) {
      searchInp.addEventListener('input', () => {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => {
          searchQuery = searchInp.value.trim();
          animateGridChange();
        }, 140);
      });
    }

    // Hash (#slug) o ?division=slug — activa filtro + highlight
    const params    = new URLSearchParams(location.search);
    const fromQuery = params.get('division');
    const hash      = location.hash.replace('#', '');
    const slug      = fromQuery || hash;
    if (slug) {
      const div = DIVISIONS.find(d => d.slug === slug);
      if (div) {
        activeSlug = div.slug;
        highlightDivisionId = div.id;
      }
    }

    buildFilters();
    renderGrid();

    // Sticky bar shadow on scroll
    const filterBar = document.getElementById('dvCatFilterBar');
    if (filterBar && 'IntersectionObserver' in window) {
      const sentinel = document.createElement('div');
      sentinel.style.cssText = 'position:absolute;top:0;left:0;width:1px;height:1px;';
      filterBar.parentNode.insertBefore(sentinel, filterBar);
      new IntersectionObserver(([entry]) => {
        filterBar.classList.toggle('is-stuck', !entry.isIntersecting);
      }, { threshold: 0 }).observe(sentinel);
    }
  }

  /* ---- Icon helpers ---- */
  function miniShield(division) {
    const fill = FILL_COLOR[division.color] || FILL_COLOR.teal;
    return `<svg viewBox="0 0 80 95" width="22" height="26" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="${SHIELD_PATH}" fill="${fill}"/>
      ${division.icon || ''}
    </svg>`;
  }

  function allIcon() {
    return `<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>`;
  }

  function cartAddIcon() {
    return `<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>`;
  }

  function cartDoneIcon() {
    return `<svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round"><polyline points="20 6 9 17 4 12"/></svg>`;
  }

  /* ============================================================
     TEAM COVERFLOW (index page)
     ============================================================ */
  function initTeamCoverflow() {
    const root = document.getElementById('teamCoverflow');
    if (!root) return;

    const list = (TEAM && TEAM.length)
      ? TEAM
      : [
          { nombre: 'ISH Alejandra M.', puesto: 'Coordinadora de Seguridad', departamento: 'Ing. en Seguridad e Higiene', division: null, foto: null },
          { nombre: 'Director General', puesto: 'Administración en Riesgos',  departamento: 'ARGA Group México',           division: null, foto: null },
          { nombre: 'ISH Eduardo M.',   puesto: 'Técnico de Laboratorio',     departamento: 'Ing. en Seguridad e Higiene', division: null, foto: null },
        ];

    if (!list.length) { root.innerHTML = ''; return; }

    let current   = 0;
    let autoTimer = null;
    let dragX     = null;
    let dragMoved = false;

    const AUTO_MS       = 8000;
    const SWIPE_MIN     = 40;
    const DRAG_THRESH   = 8;

    const placeholderSvg = `<svg viewBox="0 0 70 70" aria-hidden="true"><circle cx="35" cy="35" r="35" fill="#e8f4f8"/><circle cx="35" cy="26" r="12" fill="#6ebbd9"/><ellipse cx="35" cy="58" rx="20" ry="14" fill="#6ebbd9"/></svg>`;

    root.innerHTML = list.map((m, i) => `
      <article class="tcf-card" data-index="${i}">
        <div class="tcf-avatar">
          ${m.foto ? `<img src="${m.foto}" alt="${esc(m.nombre)}" loading="lazy">` : placeholderSvg}
        </div>
        <div class="tcf-info">
          <h3 class="tcf-name">${esc(m.nombre)}</h3>
          ${m.puesto       ? `<p class="tcf-puesto">${esc(m.puesto)}</p>`       : ''}
          ${m.departamento ? `<p class="tcf-meta">${esc(m.departamento)}</p>`   : ''}
          ${m.division     ? `<span class="tcf-divtag">${esc(m.division)}</span>` : ''}
        </div>
      </article>
    `).join('');

    const dots = document.getElementById('teamDots');
    if (dots) {
      dots.innerHTML = list.map((_, i) =>
        `<button class="team-dot ${i === 0 ? 'active' : ''}" data-index="${i}" aria-label="Ir a ${i + 1}" type="button"></button>`
      ).join('');
      dots.querySelectorAll('.team-dot').forEach(d => {
        d.addEventListener('click', () => { goTo(parseInt(d.dataset.index, 10)); startAuto(); });
      });
    }

    function goTo(idx) {
      const n = list.length;
      current = ((idx % n) + n) % n;
      root.querySelectorAll('.tcf-card').forEach((c, i) => {
        c.classList.remove('is-center', 'is-left', 'is-right', 'is-far-left', 'is-far-right');
        const diff = (i - current + n) % n;
        if      (diff === 0)     c.classList.add('is-center');
        else if (diff === 1)     c.classList.add('is-right');
        else if (diff === n - 1) c.classList.add('is-left');
        else if (diff === 2)     c.classList.add('is-far-right');
        else                     c.classList.add('is-far-left');
      });
      if (dots) {
        dots.querySelectorAll('.team-dot').forEach((d, i) => d.classList.toggle('active', i === current));
      }
    }

    function startAuto() {
      stopAuto();
      autoTimer = setInterval(() => goTo(current + 1), AUTO_MS);
    }
    function stopAuto() {
      if (autoTimer) { clearInterval(autoTimer); autoTimer = null; }
    }

    /* ---- Navigation buttons ---- */
    document.getElementById('teamPrev')?.addEventListener('click', () => { goTo(current - 1); startAuto(); });
    document.getElementById('teamNext')?.addEventListener('click', () => { goTo(current + 1); startAuto(); });

    /* ---- Click on side card → center it (skipped after drag) ---- */
    root.addEventListener('click', e => {
      if (dragMoved) return;
      const card = e.target.closest('.tcf-card');
      if (!card) return;
      const idx = parseInt(card.dataset.index, 10);
      if (idx !== current) { goTo(idx); startAuto(); }
    });

    /* ---- Mouse drag (desktop) ---- */
    root.addEventListener('pointerdown', e => {
      if (e.pointerType === 'touch') return;
      dragX     = e.clientX;
      dragMoved = false;
      stopAuto();
      try { root.setPointerCapture(e.pointerId); } catch (_) {}
    });
    root.addEventListener('pointermove', e => {
      if (dragX === null || e.pointerType === 'touch') return;
      if (Math.abs(e.clientX - dragX) > DRAG_THRESH) dragMoved = true;
    });
    const finishDrag = (e) => {
      if (dragX === null || e.pointerType === 'touch') return;
      const dx = e.clientX - dragX;
      if (dragMoved && Math.abs(dx) > SWIPE_MIN) goTo(current + (dx < 0 ? 1 : -1));
      dragX = null;
      startAuto();
    };
    root.addEventListener('pointerup',     finishDrag);
    root.addEventListener('pointercancel', e => { if (e.pointerType !== 'touch') { dragX = null; dragMoved = false; startAuto(); } });

    /* ---- Touch swipe (mobile) ---- */
    let touchX = null;
    root.addEventListener('touchstart', e => {
      touchX = e.touches[0].clientX;
      stopAuto();
    }, { passive: true });
    root.addEventListener('touchend', e => {
      if (touchX === null) return;
      const dx = e.changedTouches[0].clientX - touchX;
      if (Math.abs(dx) > SWIPE_MIN) goTo(current + (dx < 0 ? 1 : -1));
      touchX = null;
      startAuto();
    });

    goTo(0);
    startAuto();
  }

  /* ============================================================
     Unidades grid — pulse secuencial (un item a la vez)
     ============================================================ */
  function startSequentialPulse(items) {
    if (!items.length) return function() {};
    const PULSE_MS = 950;   // coincide con duración CSS shieldPulseSeq
    const PAUSE_MS = 380;   // pausa entre items
    let idx    = 0;
    let timer  = null;
    let active = true;

    function next() {
      if (!active) return;
      // Saltar item si está bajo hover (no interrumpir la interacción del usuario)
      let tries = 0;
      while (items[idx].matches(':hover') && tries < items.length) {
        idx = (idx + 1) % items.length;
        tries++;
      }
      const item = items[idx];
      item.classList.add('ui-pulsing');
      timer = setTimeout(() => {
        item.classList.remove('ui-pulsing');
        idx   = (idx + 1) % items.length;
        timer = setTimeout(next, PAUSE_MS);
      }, PULSE_MS);
    }

    // Arrancar tras completar la animación de entrada escalonada
    timer = setTimeout(next, items.length * 80 + 600);

    return function stop() {
      active = false;
      clearTimeout(timer);
      items.forEach(i => i.classList.remove('ui-pulsing'));
    };
  }

  /* ============================================================
     Unidades grid — IntersectionObserver (entrada/salida + pulse)
     ============================================================ */
  function initUnidadesObserver() {
    const wrap = document.querySelector('.unidades-grid-wrap');
    if (!wrap) return;
    const items = Array.from(wrap.querySelectorAll('.unidad-item[data-division-id]'));
    if (!items.length) return;

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
      items.forEach(item => item.classList.add('ui-visible'));
      return;
    }

    let stopPulse = null;

    const io = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          items.forEach((item, i) => {
            setTimeout(() => item.classList.add('ui-visible'), i * 80);
          });
          stopPulse = startSequentialPulse(items);
        } else {
          items.forEach(item => item.classList.remove('ui-visible'));
          if (stopPulse) { stopPulse(); stopPulse = null; }
        }
      });
    }, { threshold: 0.15 });

    io.observe(wrap);
  }

  /* ============================================================
     Init
     ============================================================ */
  function init() {
    setup();
    if (DIVISIONS.length) {
      bindShields();
      initCatalog();
    }
    bindGlobal();
    updateCartUI();
    initTeamCoverflow();
    initUnidadesObserver();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
