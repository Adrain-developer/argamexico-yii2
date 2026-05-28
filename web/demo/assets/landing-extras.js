/* ============================================================
   ARGA · landing extras
   Renderiza news/ads/team/acreditaciones desde window.ARGA_*
   ============================================================ */
(function () {
  'use strict';

  const $ = (s, r = document) => r.querySelector(s);
  const $$ = (s, r = document) => Array.from(r.querySelectorAll(s));

  /* ===== NEWS ===== */
  function renderNews() {
    const wrap = $('#newsGrid');
    const data = window.ARGA_NEWS || [];
    if (!wrap || !data.length) return;
    wrap.innerHTML = data.map((n, i) => `
      <article class="news-card ${i === 0 ? 'featured' : ''}" data-id="${n.id}">
        <div class="media"><img src="${n.image}" alt="${n.title}" loading="lazy"></div>
        <div class="body">
          <span class="category ${n.color}">${n.category}</span>
          <h3>${n.title}</h3>
          <p class="excerpt">${n.excerpt}</p>
          <div class="meta">${n.date} · ${n.readMin} min lectura</div>
        </div>
      </article>
    `).join('');
  }

  /* ===== ADS CAROUSEL ===== */
  function renderAds() {
    const root = $('#adCarousel');
    const data = window.ARGA_ADS || [];
    if (!root || !data.length) return;
    const track = $('.carousel-track', root);
    track.innerHTML = data.map((ad) => `
      <div class="carousel-slide ad-slide accent-${ad.accent}">
        <div class="ad-slide-bg" style="background-image:url('${ad.bg}')"></div>
        <span class="eyebrow">${ad.eyebrow}</span>
        <h3>${ad.title}</h3>
        <p>${ad.description}</p>
        <a href="${ad.href}" class="btn btn-cta" style="align-self:flex-start">
          ${ad.cta}
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
      </div>
    `).join('');
  }

  /* ===== TEAM CAROUSEL ===== */
  function renderTeam() {
    const wrap = $('#teamStack');
    const data = window.ARGA_TEAM || [];
    if (!wrap || !data.length) return;
    wrap.innerHTML = `
      <div class="team-card" id="teamCard">
        <div class="team-avatar" id="teamAvatar">${data[0].initials}</div>
        <p class="name" id="teamName">${data[0].name}</p>
        <p class="cred" id="teamCred">${data[0].cred}</p>
        <p class="role" id="teamRole">${data[0].role}</p>
      </div>
      <div class="team-controls">
        <button class="btn-icon" id="teamPrev" aria-label="Anterior"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 18l-6-6 6-6"/></svg></button>
        <div class="dots" id="teamDots">${data.map((_, i) => `<button class="dot ${i===0?'active':''}" data-i="${i}" aria-label="Persona ${i+1}"></button>`).join('')}</div>
        <button class="btn-icon" id="teamNext" aria-label="Siguiente"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M9 6l6 6-6 6"/></svg></button>
      </div>
    `;
    let idx = 0;
    function paint(i) {
      idx = ((i % data.length) + data.length) % data.length;
      const m = data[idx];
      const card = $('#teamCard');
      card.style.opacity = 0;
      setTimeout(() => {
        $('#teamAvatar').textContent = m.initials;
        $('#teamName').textContent = m.name;
        $('#teamCred').textContent = m.cred;
        $('#teamRole').textContent = m.role;
        card.style.opacity = 1;
      }, 200);
      $$('#teamDots .dot').forEach((d, k) => d.classList.toggle('active', k === idx));
    }
    $('#teamPrev').addEventListener('click', () => paint(idx - 1));
    $('#teamNext').addEventListener('click', () => paint(idx + 1));
    $$('#teamDots .dot').forEach((d) => d.addEventListener('click', () => paint(parseInt(d.dataset.i, 10))));
    setInterval(() => paint(idx + 1), 7000);
  }

  /* ===== ACREDITACIONES ===== */
  function renderAcreds() {
    const wrap = $('#acredGrid');
    const data = window.ARGA_ACREDITACIONES || [];
    if (!wrap || !data.length) return;
    wrap.innerHTML = data.map((a) => `
      <div class="acred-card">
        <div class="acred-logo">${a.org}<span class="sub">${a.orgFull.split(' ').slice(0,3).join(' ')}</span></div>
        <h6>${a.orgFull}</h6>
        <p class="code">${a.code}</p>
        <p class="scope">${a.scope}</p>
      </div>
    `).join('');
  }

  /* ===== DIVISIONES COUNT (stats) ===== */
  function updateDivisionsCount() {
    const el = document.getElementById('divCount');
    if (el && window.ARGA_DIVISIONS) el.textContent = window.ARGA_DIVISIONS.length;
  }

  function init() {
    renderNews();
    renderAds();
    renderTeam();
    renderAcreds();
    updateDivisionsCount();

    // Re-bind generic carousels que se inyectaron tarde (ads)
    // — el bind original ya corrió antes; re-disparamos manualmente
    if (window.ARGA && document.querySelector('#adCarousel .carousel-slide')) {
      const ev = new Event('arga:rebindCarousels');
      document.dispatchEvent(ev);
    }
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
  else init();
})();
