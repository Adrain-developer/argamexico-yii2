/* ============================================
   GRUPOEHS DEMO — JavaScript Modular
   ============================================ */

// ---- Sticky Header ----
const header = document.getElementById('siteHeader');
const onScroll = () => {
  header.classList.toggle('scrolled', window.scrollY > 60);
};
window.addEventListener('scroll', onScroll, { passive: true });
onScroll();

// ---- Hero rounded corners on scroll ----
// El hero empieza sin esquinas redondeadas; crecen de 0 → 80px al bajar scroll
const heroEl = document.querySelector('.hero');
if (heroEl) {
  const SCROLL_FULL = 120; // px de scroll para llegar al radio máximo
  const updateHeroRadius = () => {
    const maxR = window.innerWidth <= 480 ? 40 : 80;
    const r = Math.min(maxR, (window.scrollY / SCROLL_FULL) * maxR);
    heroEl.style.borderBottomLeftRadius  = r + 'px';
    heroEl.style.borderBottomRightRadius = r + 'px';
  };
  window.addEventListener('scroll', updateHeroRadius, { passive: true });
  updateHeroRadius(); // estado inicial (sin scroll = 0px)
}

// ---- Hero Slider ----
const slides     = document.querySelectorAll('.slide');
const dots       = document.querySelectorAll('.dot');
const prevBtn    = document.getElementById('prevSlide');
const nextBtn    = document.getElementById('nextSlide');
let current      = 0;
let autoTimer    = null;

function goToSlide(index) {
  slides[current].classList.remove('active');
  dots[current].classList.remove('active');
  current = (index + slides.length) % slides.length;
  slides[current].classList.add('active');
  dots[current].classList.add('active');
  // Re-trigger animation
  const content = slides[current].querySelector('.slide-content');
  if (content) {
    content.style.animation = 'none';
    content.offsetHeight; // reflow
    content.style.animation = '';
  }
}

function startAuto() {
  autoTimer = setInterval(() => goToSlide(current + 1), 5000);
}
function stopAuto() {
  clearInterval(autoTimer);
}

prevBtn.addEventListener('click', () => { stopAuto(); goToSlide(current - 1); startAuto(); });
nextBtn.addEventListener('click', () => { stopAuto(); goToSlide(current + 1); startAuto(); });

dots.forEach(dot => {
  dot.addEventListener('click', () => {
    stopAuto();
    goToSlide(parseInt(dot.dataset.index));
    startAuto();
  });
});

// Swipe support (touch)
let touchStartX = 0;
const hero = document.querySelector('.hero');
hero.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
hero.addEventListener('touchend', e => {
  const dx = e.changedTouches[0].clientX - touchStartX;
  if (Math.abs(dx) > 50) {
    stopAuto();
    goToSlide(dx < 0 ? current + 1 : current - 1);
    startAuto();
  }
});

startAuto();

// ---- Scroll Reveal ----
// Mark elements for animation after paint so initial render is visible
requestAnimationFrame(() => {
  document.querySelectorAll('.reveal').forEach(el => el.classList.add('will-animate'));
});

const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      entry.target.classList.remove('will-animate');
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.10 });

document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

// ---- Hamburger / Mobile Menu ----
const hamburger = document.getElementById('hamburger');
const mainNav   = document.getElementById('mainNav');

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('open');
  mainNav.classList.toggle('open');
});

// Close mobile menu on link click
mainNav.querySelectorAll('a').forEach(link => {
  link.addEventListener('click', () => {
    hamburger.classList.remove('open');
    mainNav.classList.remove('open');
  });
});

// ---- Mascota Tigre: desliza desde borde izquierdo o derecho ----
(function () {
  const unit   = document.getElementById('tigreUnit');
  const img    = document.getElementById('tigreImg');
  const bubble = document.getElementById('tigreBubble');
  const bText  = document.getElementById('tigreBubbleText');

  const MESSAGES = [
    '¿EN TU EMPRESA HAY TRABAJO EN BIPEDESTACIÓN?',
    '¿Ya tienes tu Análisis de Riesgo de Incendio?',
    '¿Cumples con la NOM-002-STPS?',
    '¿Tus trabajadores tienen capacitación en SST?',
    '¿Conoces nuestro laboratorio acreditado?',
    '¿Necesitas auditorías de seguridad e higiene?',
    '¿Tienes programa de protección civil?',
  ];

  const SHOW_MS = 9800;   // ms que permanece visible
  const MIN_INT = 9000;   // espera mínima entre apariciones
  const MAX_INT = 18000;  // espera máxima

  let active   = false;
  let hiddenTX = 'translateX(110%)';

  function rnd(a, b) { return Math.random() * (b - a) + a; }

  function buildEdge() {
    // Solo eje X: derecha o izquierda, siempre anclado al fondo
    if (Math.random() < 0.5) {
      return { side: 'right', hidden: 'translateX(110%)', visible: 'translateX(0)', flip: false };
    }
    return { side: 'left', hidden: 'translateX(-110%)', visible: 'translateX(0)', flip: true };
  }

  function show() {
    if (active) return;
    active = true;

    const cfg = buildEdge();
    hiddenTX  = cfg.hidden;

    // Posicionar: siempre bottom:0, alternar left/right
    unit.style.bottom = '0px';
    unit.style.top    = '';
    if (cfg.side === 'right') {
      unit.style.right = '0px';
      unit.style.left  = '';
    } else {
      unit.style.left  = '0px';
      unit.style.right = '';
    }

    // Voltear imagen para que siempre mire hacia dentro de la pantalla
    img.style.transform = cfg.flip ? 'scaleX(-1)' : 'none';

    // Elegir mensaje aleatorio
    bText.textContent = MESSAGES[Math.floor(Math.random() * MESSAGES.length)];
    bubble.classList.remove('visible');

    // Mostrar unit en posición oculta (off-screen) antes de animar
    unit.style.transition = 'none';
    unit.style.transform  = cfg.hidden;
    unit.style.display    = 'flex';
    void unit.offsetHeight; // forzar reflow

    // Animar entrada
    unit.style.transition = 'transform 0.7s cubic-bezier(0, 0, 0.2, 1)';
    unit.style.transform  = cfg.visible;

    // Mostrar burbuja al terminar la animación de entrada
    setTimeout(() => bubble.classList.add('visible'), 750);

    // Auto-ocultar después de SHOW_MS
    setTimeout(doHide, SHOW_MS);
  }

  function doHide() {
    if (!active) return;
    bubble.classList.remove('visible');
    unit.style.transform = hiddenTX;
    setTimeout(() => {
      unit.style.display = 'none';
      active = false;
      scheduleNext();
    }, 750);
  }

  // Click en tigre o burbuja: ocultar antes de tiempo
  img.addEventListener('click', doHide);
  bubble.addEventListener('click', doHide);

  function scheduleNext() {
    setTimeout(show, rnd(MIN_INT, MAX_INT));
  }

  // Primera aparición tras 2.8 segundos
  setTimeout(show, 2800);
}());

// ---- Active Nav on Scroll ----
const navLinks = document.querySelectorAll('.nav-link');
const sections = document.querySelectorAll('section[id]');

const navObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const id = entry.target.id;
      navLinks.forEach(link => {
        link.classList.toggle('active', link.getAttribute('href') === `#${id}`);
      });
    }
  });
}, { rootMargin: '-40% 0px -55% 0px' });

sections.forEach(s => navObserver.observe(s));

// ---- Smooth hover lift for client logos (staggered) ----
const clientLogos = document.querySelectorAll('.client-logo');
clientLogos.forEach((logo, i) => {
  logo.style.transitionDelay = `${(i % 6) * 40}ms`;
});

// ---- Service cards staggered reveal ----
const serviceCards = document.querySelectorAll('.service-card');
serviceCards.forEach((card, i) => {
  card.style.transitionDelay = `${i * 60}ms`;
  card.style.opacity = '0';
  card.style.transform = 'translateY(30px)';
  card.style.transition = `opacity 0.5s ease ${i * 60}ms, transform 0.5s ease ${i * 60}ms, box-shadow 0.3s ease, transform 0.3s ease`;
});

const serviceObserver = new IntersectionObserver((entries) => {
  if (entries[0].isIntersecting) {
    serviceCards.forEach(card => {
      card.style.opacity = '1';
      card.style.transform = 'translateY(0)';
    });
    serviceObserver.disconnect();
  }
}, { threshold: 0.1 });

const servicesSection = document.getElementById('servicios');
if (servicesSection) serviceObserver.observe(servicesSection);

// ---- Team cards staggered ----
const teamCards = document.querySelectorAll('.team-card');
teamCards.forEach((card, i) => {
  card.style.opacity = '0';
  card.style.transform = 'translateY(24px)';
  card.style.transition = `opacity 0.5s ease ${i * 120}ms, transform 0.5s ease ${i * 120}ms, box-shadow 0.3s ease`;
});

const teamObserver = new IntersectionObserver((entries) => {
  if (entries[0].isIntersecting) {
    teamCards.forEach(card => {
      card.style.opacity = '1';
      card.style.transform = 'translateY(0)';
    });
    teamObserver.disconnect();
  }
}, { threshold: 0.1 });

const teamSection = document.getElementById('equipo');
if (teamSection) teamObserver.observe(teamSection);

// ---- MVV cards staggered ----
const mvvCards = document.querySelectorAll('.mvv-card');
mvvCards.forEach((card, i) => {
  card.style.opacity = '0';
  card.style.transform = 'translateY(24px)';
  card.style.transition = `opacity 0.6s ease ${i * 150}ms, transform 0.6s ease ${i * 150}ms, box-shadow 0.3s ease`;
});

const mvvObserver = new IntersectionObserver((entries) => {
  if (entries[0].isIntersecting) {
    mvvCards.forEach(card => {
      card.style.opacity = '1';
      card.style.transform = 'translateY(0)';
    });
    mvvObserver.disconnect();
  }
}, { threshold: 0.1 });

const mvvSection = document.getElementById('mision');
if (mvvSection) mvvObserver.observe(mvvSection);

// ---- Policy cards staggered ----
const policyCards = document.querySelectorAll('.policy-card');
policyCards.forEach((card, i) => {
  card.style.opacity = '0';
  card.style.transform = 'translateX(-20px)';
  card.style.transition = `opacity 0.5s ease ${i * 120}ms, transform 0.5s ease ${i * 120}ms`;
});

const policyObserver = new IntersectionObserver((entries) => {
  if (entries[0].isIntersecting) {
    policyCards.forEach(card => {
      card.style.opacity = '1';
      card.style.transform = 'translateX(0)';
    });
    policyObserver.disconnect();
  }
}, { threshold: 0.1 });

const politicasSection = document.getElementById('politicas');
if (politicasSection) policyObserver.observe(politicasSection);

// ---- Team Carousel ----
(function () {
  const track = document.getElementById('teamCarouselTrack');
  if (!track) return;

  const cards     = track.querySelectorAll('.team-card');
  const dots      = document.querySelectorAll('.team-dot');
  const prevBtn   = document.getElementById('teamPrev');
  const nextBtn   = document.getElementById('teamNext');
  let current     = 0;
  let autoTimer   = null;

  function goTo(index) {
    current = (index + cards.length) % cards.length;
    track.style.transform = `translateX(-${current * 100}%)`;
    dots.forEach((d, i) => d.classList.toggle('active', i === current));
  }

  function startAuto() { autoTimer = setInterval(() => goTo(current + 1), 4000); }
  function stopAuto()  { clearInterval(autoTimer); }

  if (prevBtn) prevBtn.addEventListener('click', () => { stopAuto(); goTo(current - 1); startAuto(); });
  if (nextBtn) nextBtn.addEventListener('click', () => { stopAuto(); goTo(current + 1); startAuto(); });

  dots.forEach(dot => {
    dot.addEventListener('click', () => {
      stopAuto();
      goTo(parseInt(dot.dataset.index));
      startAuto();
    });
  });

  // Touch swipe
  let touchStartX = 0;
  track.addEventListener('touchstart', e => { touchStartX = e.touches[0].clientX; }, { passive: true });
  track.addEventListener('touchend', e => {
    const dx = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(dx) > 40) { stopAuto(); goTo(dx < 0 ? current + 1 : current - 1); startAuto(); }
  });

  startAuto();
}());
