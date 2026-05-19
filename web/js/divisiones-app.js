/* ============================================================
   ARGA · Divisiones – Two-Modal Flow
   Requiere: window.ARGA_DIVISIONS (JSON desde PHP)
   ============================================================ */
(function () {
  'use strict';

  const DIVISIONS    = window.ARGA_DIVISIONS || [];
  const SHIELD_PATH  = 'M6,0 L74,0 Q80,0 80,6 L80,62 L40,95 L0,62 L0,6 Q0,0 6,0 Z';
  const FILL_COLOR   = { teal: 'url(#tealGrad)', red: 'url(#greenGrad)' };

  /* ---- State ---- */
  const state = {
    cart:          JSON.parse(localStorage.getItem('arga_cart_v2') || '[]'),
    modal1Div:     null,
    modal2Service: null,
    slide:         0,
    autoInterval:  null,
    autoMs:        5000,
  };

  /* ---- DOM refs (populated in setup) ---- */
  let m1Backdrop, m1Grid, m1Header, m1Close;
  let m2Backdrop, m2Eyebrow, m2Title, m2Subtitle, m2Chips, m2Body;
  let bannerTrack, bannerDots, cartCountEl, toastWrap;

  /* ============================================================
     Setup: inject modal HTML once into DOM
     ============================================================ */
  function setup() {
    document.body.insertAdjacentHTML('beforeend', `
      <!-- Modal 1: Servicios de la División -->
      <div class="dv-m1-backdrop" id="dvM1Backdrop" role="dialog" aria-modal="true">
        <div class="dv-m1" id="dvM1">
          <button class="dv-close" id="dvM1Close" aria-label="Cerrar">
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
            <button class="dv-back-btn" id="dvM2Back">
              <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M19 12H5M11 18l-6-6 6-6"/></svg>
              Ver todos los servicios
            </button>
            <span class="dv-eyebrow"   id="dvM2Eyebrow"></span>
            <h2  class="dv-m2-title"   id="dvM2Title"></h2>
            <p   class="dv-m2-subtitle" id="dvM2Subtitle"></p>
            <div class="dv-divider"></div>
            <div class="dv-chips"      id="dvM2Chips"></div>
            <div class="dv-m2-body"    id="dvM2Body"></div>
            <div class="dv-m2-actions">
              <button class="dv-btn-primary"   id="dvBtnAddQuote">
                <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M12 5v14M5 12h14"/></svg>
                <span>Agregar a cotización</span>
              </button>
              <button class="dv-btn-secondary" id="dvBtnAllDivisions">
                Ver todas las divisiones
                <svg viewBox="0 0 24 24" width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </button>
            </div>
          </div>
          <div class="dv-m2-right" id="dvM2Right">
            <button class="dv-close dv-m2-close-abs" id="dvM2Close" aria-label="Cerrar">
              <svg viewBox="0 0 24 24" width="17" height="17" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M18 6 6 18M6 6l12 12"/></svg>
            </button>
            <div class="dv-banner-track"  id="dvBannerTrack"></div>
            <button class="dv-banner-nav dv-banner-prev" id="dvBannerPrev" aria-label="Anterior">
              <svg viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M15 18l-6-6 6-6"/></svg>
            </button>
            <button class="dv-banner-nav dv-banner-next" id="dvBannerNext" aria-label="Siguiente">
              <svg viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M9 6l6 6-6 6"/></svg>
            </button>
            <div class="dv-banner-dots" id="dvBannerDots"></div>
          </div>
        </div>
      </div>

      <!-- Cart FAB -->
      <button class="dv-cart-fab" id="dvCartFab" aria-label="Ver cotización">
        <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 002 1.6h9.7a2 2 0 002-1.6L23 6H6"/></svg>
        Mi cotización
        <span class="dv-cart-count" id="dvCartCount">0</span>
      </button>

      <!-- Toasts -->
      <div class="dv-toast-wrap" id="dvToastWrap"></div>
    `);

    m1Backdrop   = document.getElementById('dvM1Backdrop');
    m1Grid       = document.getElementById('dvM1Grid');
    m1Header     = document.getElementById('dvM1Header');
    m1Close      = document.getElementById('dvM1Close');
    m2Backdrop   = document.getElementById('dvM2Backdrop');
    m2Eyebrow    = document.getElementById('dvM2Eyebrow');
    m2Title      = document.getElementById('dvM2Title');
    m2Subtitle   = document.getElementById('dvM2Subtitle');
    m2Chips      = document.getElementById('dvM2Chips');
    m2Body       = document.getElementById('dvM2Body');
    bannerTrack  = document.getElementById('dvBannerTrack');
    bannerDots   = document.getElementById('dvBannerDots');
    cartCountEl  = document.getElementById('dvCartCount');
    toastWrap    = document.getElementById('dvToastWrap');
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
    d.textContent = str;
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
            <button class="dv-svc-btn-detail" data-idx="${idx}">
              Ver detalles
              <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </button>
            <button class="dv-svc-btn-cart ${inCart ? 'added' : ''}" data-idx="${idx}">
              ${cartBtnContent(inCart)}
            </button>
          </div>
        </div>
      `;
    }).join('');

    bindServiceCards(division);
    m1Backdrop.classList.add('open');
    document.body.classList.add('dv-no-scroll');
  }

  function closeModal1() {
    m1Backdrop.classList.remove('open');
    state.modal1Div = null;
    if (!state.modal2Service) document.body.classList.remove('dv-no-scroll');
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

    m2Eyebrow.textContent  = (division.tagline || 'División').toUpperCase();
    m2Title.textContent    = service.title;
    m2Subtitle.textContent = service.descripcion || '';

    m2Chips.innerHTML = (division.noms || [])
      .map(n => `<span class="dv-chip">${esc(n)}</span>`)
      .join('');

    m2Body.innerHTML = [
      service.descripcion ? `<h4>Reconocimiento</h4><p>${esc(service.descripcion)}</p>` : '',
      service.evaluacion  ? `<h4>Evaluación</h4><p>${esc(service.evaluacion)}</p>`  : '',
    ].join('');

    renderBanners(service);

    const addBtn = document.getElementById('dvBtnAddQuote');
    const inCart = state.cart.some(c => c.serviceId === service.id);
    addBtn.classList.toggle('added', inCart);
    addBtn.querySelector('span').textContent = inCart ? '✓ Agregado' : 'Agregar a cotización';

    m2Backdrop.classList.add('open');
    document.body.classList.add('dv-no-scroll');
    startAutoplay();
  }

  function closeModal2() {
    m2Backdrop.classList.remove('open');
    stopAutoplay();
    state.modal2Service = null;
    if (!state.modal1Div) document.body.classList.remove('dv-no-scroll');
  }

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
      `<button class="dv-banner-dot ${i === 0 ? 'active' : ''}" data-slide="${i}" aria-label="Slide ${i + 1}"></button>`
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
    localStorage.setItem('arga_cart_v2', JSON.stringify(state.cart));
    updateCartUI();
    showToast(`${service.title} agregado a cotización`);
    return true;
  }

  function updateCartUI() {
    cartCountEl.textContent = state.cart.length;
    cartCountEl.style.transform = 'scale(1.4)';
    setTimeout(() => { cartCountEl.style.transform = 'scale(1)'; }, 220);
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
    m1Close.addEventListener('click', closeModal1);
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
      closeModal2();
      closeModal1();
    });

    document.getElementById('dvCartFab').addEventListener('click', () => {
      showToast(
        state.cart.length === 0
          ? 'Tu cotización está vacía'
          : `${state.cart.length} servicio(s) en tu cotización`,
        'info'
      );
    });

    document.addEventListener('keydown', e => {
      if (e.key === 'Escape') {
        if (m2Backdrop.classList.contains('open')) closeModal2();
        else if (m1Backdrop.classList.contains('open')) closeModal1();
      }
      if (m2Backdrop.classList.contains('open')) {
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
     CATALOG PAGE — sidebar + grid + search
     ============================================================ */
  function initCatalog() {
    const catalogEl = document.getElementById('dvCatalog');
    if (!catalogEl || !DIVISIONS.length) return;

    const sidebar     = document.getElementById('dvCatSidebar');
    const mainTitle   = document.getElementById('dvCatMainTitle');
    const mainNote    = document.getElementById('dvCatMainNote');
    const grid        = document.getElementById('dvCatGrid');
    const searchInput = document.getElementById('dvCatSearch');
    const countEl     = document.getElementById('dvCatCount');

    let activeSlug  = 'all';
    let searchQuery = '';
    let searchTimer = null;

    /* ---- collect flat list ---- */
    function flatServices(slug) {
      if (slug === 'all') {
        return DIVISIONS.flatMap(d => d.items.map(item => ({ div: d, item })));
      }
      const div = DIVISIONS.find(d => d.slug === slug);
      return div ? div.items.map(item => ({ div, item })) : [];
    }

    /* ---- sidebar ---- */
    function buildSidebar() {
      const items = [
        { slug: 'all', name: 'Todos los servicios', icon: allIcon() },
        ...DIVISIONS.map(d => ({ slug: d.slug, name: d.name, icon: miniShield(d) })),
      ];

      sidebar.innerHTML = items.map(({ slug, name, icon }) => `
        <button class="dv-cat-sib-btn ${activeSlug === slug ? 'active' : ''}" data-slug="${slug}">
          <span class="dv-cat-sib-icon">${icon}</span>
          <span class="dv-cat-sib-name">${esc(name)}</span>
        </button>
      `).join('');

      sidebar.querySelectorAll('.dv-cat-sib-btn').forEach(btn => {
        btn.addEventListener('click', () => {
          activeSlug = btn.dataset.slug;
          history.replaceState(null, '', activeSlug === 'all' ? location.pathname : `#${activeSlug}`);
          buildSidebar();
          renderGrid();
        });
      });
    }

    /* ---- grid ---- */
    function renderGrid() {
      let services = flatServices(activeSlug);

      // Update header
      if (activeSlug === 'all') {
        mainTitle.textContent = 'Todos los servicios';
        mainNote.textContent  = '';
      } else {
        const div = DIVISIONS.find(d => d.slug === activeSlug);
        mainTitle.textContent = div?.name        || '';
        mainNote.textContent  = div?.descripcion || '';
      }

      // Apply search
      if (searchQuery) {
        const q = searchQuery.toLowerCase();
        services = services.filter(({ item }) =>
          item.title.toLowerCase().includes(q)         ||
          (item.code        || '').toLowerCase().includes(q) ||
          (item.descripcion || '').toLowerCase().includes(q)
        );
      }

      // Count
      if (countEl) {
        countEl.textContent = services.length
          ? `${services.length} servicio${services.length !== 1 ? 's' : ''}`
          : '';
      }

      if (!services.length) {
        grid.innerHTML = '<p class="dv-cat-empty">Sin resultados para esa búsqueda.</p>';
        return;
      }

      grid.innerHTML = services.map(({ div, item }) => {
        const inCart = state.cart.some(c => c.serviceId === item.id);
        return `
          <div class="dv-cat-card">
            <div class="dv-cat-card-icon">${shieldSVG(div, 56)}</div>
            <div class="dv-cat-card-body">
              ${activeSlug === 'all' ? `<span class="dv-cat-card-div">${esc(div.name)}</span>` : ''}
              <h3 class="dv-cat-card-title">${esc(item.title)}</h3>
              ${item.code ? `<span class="dv-cat-card-code">${esc(item.code)}</span>` : ''}
            </div>
            <div class="dv-cat-card-actions">
              <button class="dv-cat-btn-detail" data-div="${div.id}" data-svc="${item.id}">
                Más detalles
                <svg viewBox="0 0 24 24" width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </button>
              <button class="dv-cat-btn-cart ${inCart ? 'added' : ''}" data-div="${div.id}" data-svc="${item.id}">
                ${inCart ? cartDoneIcon() + ' Agregado' : cartAddIcon() + ' Agregar a cotización'}
              </button>
            </div>
          </div>
        `;
      }).join('');

      /* bind card events */
      grid.querySelectorAll('.dv-cat-btn-detail').forEach(btn => {
        btn.addEventListener('click', () => {
          const div  = DIVISIONS.find(d => d.id === parseInt(btn.dataset.div, 10));
          const item = div?.items.find(i => i.id === parseInt(btn.dataset.svc, 10));
          if (div && item) {
            state.modal1Div = div;
            openModal2(div, item);
          }
        });
      });

      grid.querySelectorAll('.dv-cat-btn-cart').forEach(btn => {
        btn.addEventListener('click', () => {
          const div  = DIVISIONS.find(d => d.id === parseInt(btn.dataset.div, 10));
          const item = div?.items.find(i => i.id === parseInt(btn.dataset.svc, 10));
          if (div && item && addToCart(div, item)) {
            btn.classList.add('added');
            btn.innerHTML = cartDoneIcon() + ' Agregado';
          }
        });
      });
    }

    /* ---- search ---- */
    if (searchInput) {
      searchInput.addEventListener('input', () => {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => {
          searchQuery = searchInput.value.trim();
          renderGrid();
        }, 120);
      });
    }

    /* ---- hash ---- */
    const hash = location.hash.replace('#', '');
    if (hash) {
      const div = DIVISIONS.find(d => d.slug === hash);
      if (div) activeSlug = div.slug;
    }

    buildSidebar();
    renderGrid();
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
     Init
     ============================================================ */
  function init() {
    if (!DIVISIONS.length) return;
    setup();
    bindShields();
    bindGlobal();
    updateCartUI();
    initCatalog();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }

})();
