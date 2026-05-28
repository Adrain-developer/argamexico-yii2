/* ============================================================
   ARGA · App global (carruseles, modal, cart, sidebar, mascota)
   ============================================================ */
(function () {
  'use strict';

  const $ = (s, root = document) => root.querySelector(s);
  const $$ = (s, root = document) => Array.from(root.querySelectorAll(s));
  const DIVISIONS = window.ARGA_DIVISIONS || [];
  const SHIELD_PATH = 'M6,0 L74,0 Q80,0 80,6 L80,62 L40,95 L0,62 L0,6 Q0,0 6,0 Z';

  /* ===================================================
     SHIELD LAYOUT · adaptable a N items
     =================================================== */
  // Cada layout devuelve clases CSS Grid (grid-column).
  // Diseñado para grid de 6 columnas (shields = 2 cols c/u).
  const SHIELD_LAYOUTS = {
    1: ['3/5'],                                                                 // 1 centrado
    2: ['2/4', '4/6'],                                                          // 2 lado a lado
    3: ['1/3', '3/5', '5/7'],                                                   // 3 en línea (cabeza escudo)
    4: ['1/3', '5/7', '2/4', '4/6'],                                            // 2+2 con offset (rombo)
    5: ['1/3', '3/5', '5/7', '2/4', '4/6'],                                     // 3+2
    6: ['1/3', '3/5', '5/7', '2/4', '4/6', '3/5'],                              // 3+2+1
    7: ['1/3', '3/5', '5/7', '1/3', '5/7', '2/4', '4/6'],                       // 3+2+2 (hueco central)
    8: ['1/3', '3/5', '5/7', '1/3', '5/7', '2/4', '4/6', '3/5'],                // escudo clásico
    9: ['1/3', '3/5', '5/7', '1/3', '3/5', '5/7', '1/3', '3/5', '5/7']          // 3x3
  };

  function applyShieldLayout(grid, items) {
    const n = items.length;
    grid.style.gridTemplateColumns = 'repeat(6, 1fr)';
    if (n >= 10) {
      // Para 10+ usamos auto-fit de 4 columnas
      grid.style.gridTemplateColumns = 'repeat(auto-fit, minmax(140px, 1fr))';
      items.forEach((el) => (el.style.gridColumn = 'auto'));
      grid.dataset.shape = 'auto';
      return;
    }
    const layout = SHIELD_LAYOUTS[n] || SHIELD_LAYOUTS[8];
    items.forEach((el, i) => {
      el.style.gridColumn = layout[i] || 'auto';
    });
    grid.dataset.shape = n === 8 ? 'shield' : `n${n}`;
  }

  function renderShield(division) {
    const color = division.color === 'red' ? 'red' : 'teal';
    return `
      <button class="unidad-item" data-division="${division.id}" type="button" aria-label="Ver detalle de ${division.name}">
        <span class="unidad-badge">Ver detalle</span>
        <div class="unidad-shield-wrap">
          <svg class="unidad-shield" viewBox="0 0 80 95" fill="none" aria-hidden="true">
            <path class="shield-bg ${color}" d="${SHIELD_PATH}"/>
            <path class="shield-stroke" d="${SHIELD_PATH}"/>
            ${division.icon}
          </svg>
        </div>
        <p>${division.name}</p>
        <small>${division.items.length} servicios</small>
      </button>
    `;
  }

  function renderUnidadesGrid() {
    const grid = $('#unidadesGrid');
    if (!grid) return;
    grid.innerHTML = DIVISIONS.map(renderShield).join('');
    const items = $$('.unidad-item', grid);
    applyShieldLayout(grid, items);
    items.forEach((el) => {
      el.addEventListener('click', () => {
        const id = parseInt(el.dataset.division, 10);
        const division = DIVISIONS.find((d) => d.id === id);
        if (division) openDivisionModal(division);
      });
    });
  }

  /* ===================================================
     MODAL · división
     =================================================== */
  const state = {
    currentDivision: null,
    currentSlide: 0,
    autoplayId: null,
    autoplayMs: 5000,
    cart: JSON.parse(localStorage.getItem('arga_cart') || '[]'),
  };

  function renderModalBody(division) {
    return division.items.map((item) => `
      <h4>${item.title} <span style="font-size:11px;font-weight:600;color:var(--c-text-soft);margin-left:4px">${item.code}</span></h4>
      ${item.descripcion ? `<p><strong>Reconocimiento.</strong> ${item.descripcion}</p>` : ''}
      ${item.evaluacion ? `<p><strong>Evaluación.</strong> ${item.evaluacion}</p>` : ''}
    `).join('');
  }

  function renderBanners(division) {
    const track = $('#bannerTrack');
    const dots = $('#bannerDots');
    if (!track || !dots) return;
    const slides = division.items.flatMap((item) =>
      item.banners.map((src) => ({ src, caption: item.title }))
    );
    state.currentSlide = 0;
    track.innerHTML = slides.map((s) => `
      <div class="banner-slide" style="background-image:url('${s.src}')">
        <div class="banner-caption">${s.caption}</div>
      </div>
    `).join('');
    dots.innerHTML = slides.map((_, i) =>
      `<button class="banner-dot ${i === 0 ? 'active' : ''}" data-slide="${i}" aria-label="Slide ${i + 1}"></button>`
    ).join('');
    $$('.banner-dot', dots).forEach((d) => d.addEventListener('click', () => goToSlide(parseInt(d.dataset.slide, 10))));
    track.style.transform = 'translateX(0%)';
    track.dataset.slides = slides.length;
  }

  function goToSlide(idx) {
    const track = $('#bannerTrack');
    if (!track) return;
    const total = parseInt(track.dataset.slides || '0', 10);
    if (!total) return;
    state.currentSlide = ((idx % total) + total) % total;
    track.style.transform = `translateX(-${state.currentSlide * 100}%)`;
    $$('.banner-dot', $('#bannerDots')).forEach((d, i) => d.classList.toggle('active', i === state.currentSlide));
  }
  const nextSlide = () => goToSlide(state.currentSlide + 1);
  const prevSlide = () => goToSlide(state.currentSlide - 1);

  function startAutoplay() {
    stopAutoplay();
    if (!state.autoplayMs) return;
    state.autoplayId = setInterval(nextSlide, state.autoplayMs);
  }
  function stopAutoplay() {
    if (state.autoplayId) { clearInterval(state.autoplayId); state.autoplayId = null; }
  }

  function openDivisionModal(division) {
    state.currentDivision = division;
    $('#modalEyebrow').textContent = (division.tagline || 'División').toUpperCase();
    $('#modalTitle').textContent = division.name;
    $('#modalSubtitle').textContent = division.descripcion || '';
    $('#modalChips').innerHTML = (division.noms || []).map((n) => `<span class="chip subtle">${n}</span>`).join('');
    $('#modalBody').innerHTML = renderModalBody(division);
    renderBanners(division);
    $('#modalBackdrop').classList.add('open');
    document.body.classList.add('no-scroll');
    startAutoplay();
    const btn = $('#btnAddToQuote');
    if (btn) {
      btn.classList.remove('added');
      btn.querySelector('span').textContent = 'Agregar a cotización';
    }
  }

  function closeDivisionModal() {
    $('#modalBackdrop')?.classList.remove('open');
    document.body.classList.remove('no-scroll');
    stopAutoplay();
    state.currentDivision = null;
  }

  /* ===================================================
     CART
     =================================================== */
  function updateCartUI() {
    const el = $('#cartCount');
    if (!el) return;
    el.textContent = state.cart.length;
    el.style.transform = 'scale(1.3)';
    setTimeout(() => (el.style.transform = 'scale(1)'), 180);
  }

  function addToCart(division) {
    if (!division) return false;
    if (state.cart.find((c) => c.id === division.id)) {
      showToast(`${division.name} ya está en cotización`, 'info');
      return false;
    }
    state.cart.push({ id: division.id, name: division.name, items: division.items.length, ts: Date.now() });
    localStorage.setItem('arga_cart', JSON.stringify(state.cart));
    updateCartUI();
    showToast(`${division.name} agregada a cotización`);
    return true;
  }

  /* ===================================================
     TOAST
     =================================================== */
  function showToast(message, type = 'success') {
    let wrap = $('#toastWrap');
    if (!wrap) {
      wrap = document.createElement('div');
      wrap.id = 'toastWrap';
      wrap.className = 'toast-wrap';
      document.body.appendChild(wrap);
    }
    const t = document.createElement('div');
    t.className = 'arga-toast ' + (type === 'info' ? 'info' : '');
    const icon = type === 'info'
      ? '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>'
      : '<svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg>';
    t.innerHTML = `<span class="toast-icon">${icon}</span><span>${message}</span>`;
    wrap.appendChild(t);
    setTimeout(() => t.remove(), 3700);
  }
  window.argaToast = showToast;

  /* ===================================================
     SIDEBAR
     =================================================== */
  function bindSidebar() {
    const backdrop = $('#sidebarBackdrop');
    $$('[data-sidebar-open]').forEach((b) => {
      b.addEventListener('click', () => {
        const id = b.dataset.sidebarOpen;
        const sb = document.getElementById(id);
        sb?.classList.add('open');
        backdrop?.classList.add('open');
      });
    });
    $$('[data-sidebar-close]').forEach((b) => {
      b.addEventListener('click', closeAllSidebars);
    });
    backdrop?.addEventListener('click', closeAllSidebars);
  }
  function closeAllSidebars() {
    $$('.sidebar').forEach((s) => s.classList.remove('open'));
    $('#sidebarBackdrop')?.classList.remove('open');
  }

  /* ===================================================
     GENERIC CAROUSEL · data-carousel
     =================================================== */
  function bindGenericCarousels() {
    $$('[data-carousel]').forEach((root) => {
      const track = $('.carousel-track', root);
      if (!track) return;
      const slides = $$('.carousel-slide', track);
      const dotsWrap = $('.carousel-dots', root);
      let idx = 0;
      const autoMs = parseInt(root.dataset.autoplay || '0', 10);
      let autoId = null;

      if (dotsWrap) {
        dotsWrap.innerHTML = slides.map((_, i) =>
          `<button class="carousel-dot ${i === 0 ? 'active' : ''}" data-idx="${i}" aria-label="Slide ${i+1}"></button>`
        ).join('');
      }

      function go(i) {
        idx = ((i % slides.length) + slides.length) % slides.length;
        track.style.transform = `translateX(-${idx * 100}%)`;
        if (dotsWrap) $$('.carousel-dot', dotsWrap).forEach((d, k) => d.classList.toggle('active', k === idx));
      }
      function start() { if (autoMs) { stop(); autoId = setInterval(() => go(idx + 1), autoMs); } }
      function stop() { if (autoId) { clearInterval(autoId); autoId = null; } }

      $$('.carousel-arrow.prev', root).forEach((b) => b.addEventListener('click', () => { go(idx - 1); start(); }));
      $$('.carousel-arrow.next', root).forEach((b) => b.addEventListener('click', () => { go(idx + 1); start(); }));
      if (dotsWrap) $$('.carousel-dot', dotsWrap).forEach((d) => d.addEventListener('click', () => { go(parseInt(d.dataset.idx,10)); start(); }));
      root.addEventListener('mouseenter', stop);
      root.addEventListener('mouseleave', start);
      start();
    });
  }

  /* ===================================================
     "VER TODAS" (vista catálogo)
     =================================================== */
  function renderAllView() {
    const filters = $('#allFilters');
    const grid = $('#allGrid');
    if (!filters || !grid) return;

    filters.innerHTML = '<button class="all-filter active" data-filter="all">Todas</button>' +
      DIVISIONS.map((d) => `<button class="all-filter" data-filter="${d.slug}">${d.name}</button>`).join('');

    let active = 'all';
    function paint() {
      const flat = [];
      DIVISIONS.forEach((d) => d.items.forEach((item) => flat.push({ division: d, item })));
      const filtered = active === 'all' ? flat : flat.filter((f) => f.division.slug === active);
      grid.innerHTML = filtered.length === 0
        ? '<p style="grid-column:1/-1;text-align:center;color:var(--c-text-mid);padding:60px 0">Sin resultados.</p>'
        : filtered.map(({ division, item }) => `
          <div class="all-card" data-division="${division.id}">
            <svg class="all-card-icon" viewBox="0 0 80 95" fill="none">
              <path d="${SHIELD_PATH}" fill="${division.color === 'red' ? 'url(#gradRed)' : 'url(#gradBlue)'}"/>
              ${division.icon}
            </svg>
            <p class="cat">${division.name}</p>
            <h3>${item.title}</h3>
            <p class="desc">${(item.descripcion || '').slice(0, 140)}${(item.descripcion || '').length > 140 ? '…' : ''}</p>
            <div class="all-card-foot">
              <span>${item.code}</span>
              <strong>Ver detalle
                <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
              </strong>
            </div>
          </div>
        `).join('');

      $$('.all-card', grid).forEach((c) => c.addEventListener('click', () => {
        const id = parseInt(c.dataset.division, 10);
        const division = DIVISIONS.find((d) => d.id === id);
        if (division) { closeAllView(); setTimeout(() => openDivisionModal(division), 200); }
      }));
    }

    $$('.all-filter', filters).forEach((b) => b.addEventListener('click', () => {
      active = b.dataset.filter;
      $$('.all-filter', filters).forEach((x) => x.classList.toggle('active', x === b));
      paint();
    }));
    paint();
  }
  function openAllView() {
    $('#allView')?.classList.add('open');
    $('#publicMain')?.style.setProperty('display','none');
    closeDivisionModal();
    window.scrollTo({ top: 0, behavior: 'instant' });
  }
  function closeAllView() {
    $('#allView')?.classList.remove('open');
    if ($('#publicMain')) $('#publicMain').style.display = '';
    requestAnimationFrame(() => {
      const grid = $('#unidadesGrid');
      if (grid) {
        const y = grid.getBoundingClientRect().top + window.pageYOffset - 80;
        window.scrollTo({ top: y, behavior: 'smooth' });
      }
    });
  }

  /* ===================================================
     EVENTS · globales
     =================================================== */
  function bindEvents() {
    $('#modalClose')?.addEventListener('click', closeDivisionModal);
    $('#modalBackdrop')?.addEventListener('click', (e) => { if (e.target.id === 'modalBackdrop') closeDivisionModal(); });
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') { closeDivisionModal(); closeAllSidebars(); }
      if ($('#modalBackdrop')?.classList.contains('open')) {
        if (e.key === 'ArrowRight') nextSlide();
        if (e.key === 'ArrowLeft') prevSlide();
      }
    });
    $('#bannerNext')?.addEventListener('click', () => { nextSlide(); startAutoplay(); });
    $('#bannerPrev')?.addEventListener('click', () => { prevSlide(); startAutoplay(); });

    $('#btnAddToQuote')?.addEventListener('click', () => {
      if (addToCart(state.currentDivision)) {
        const b = $('#btnAddToQuote');
        b.classList.add('added');
        b.querySelector('span').textContent = '✓ Agregada';
      }
    });
    $('#btnVerAll')?.addEventListener('click', openAllView);
    $('#btnVerTodas')?.addEventListener('click', openAllView);
    $('#btnBack')?.addEventListener('click', closeAllView);

    $('#cartFab')?.addEventListener('click', () => {
      if (state.cart.length === 0) showToast('Tu cotización está vacía', 'info');
      else showToast(`${state.cart.length} divisiones en tu cotización`, 'info');
    });

    // Reveal on scroll (ligero)
    const io = new IntersectionObserver((entries) => {
      entries.forEach((e) => { if (e.isIntersecting) { e.target.classList.add('is-visible'); io.unobserve(e.target); } });
    }, { threshold: 0.12 });
    $$('.reveal').forEach((el) => io.observe(el));
  }

  /* ===================================================
     INIT
     =================================================== */
  function init() {
    renderUnidadesGrid();
    renderAllView();
    bindEvents();
    bindSidebar();
    bindGenericCarousels();
    updateCartUI();
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
  else init();

  // Exposición para extensión (admin, etc)
  window.ARGA = {
    openModal: openDivisionModal,
    closeModal: closeDivisionModal,
    addToCart,
    toast: showToast,
  };
})();
