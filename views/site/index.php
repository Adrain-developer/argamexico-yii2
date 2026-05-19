<?php

/* @var $this yii\web\View */
/* @var $divisiones array */

use yii\helpers\Url;

$this->title = 'ARGA Group México — Seguridad Industrial, Consultoría y Laboratorio';

$this->registerCssFile(Yii::$app->request->baseUrl . '/css/divisiones.css', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile(Yii::$app->request->baseUrl . '/js/divisiones-app.js', ['position' => \yii\web\View::POS_END]);
$this->registerJs('window.ARGA_DIVISIONS = ' . json_encode($divisiones ?? [], JSON_UNESCAPED_UNICODE) . ';', \yii\web\View::POS_BEGIN);
?>

<!-- ===== HERO SLIDER ===== -->
<section class="hero" id="inicio">
  <div class="slides-container" id="slidesContainer">

    <!-- Slide 1 — Higiene Industrial (imagen derecha) -->
    <div class="slide slide-1 active">
      <div class="slide-img-wrap slide-img-right">
        <img src="<?= Yii::$app->homeUrl ?>images/hero/slide-1.png" alt="Higiene Industrial" class="slide-img">
        <div class="slide-img-fade slide-img-fade-right"></div>
      </div>
      <div class="slide-content">
        <h1>Higiene Industrial</h1>
        <p>Reconocimiento y evaluación de agentes físicos: ruido, iluminación, vibraciones, temperaturas y electricidad estática. Acreditados por la EMA.</p>
        <a href="<?= Url::toRoute(['argalabs/higiene']) ?>" class="btn-cta">Ver Más</a>
      </div>
    </div>

    <!-- Slide 2 — Estudios de Seguridad / Consultoría (imagen izquierda) -->
    <div class="slide slide-2">
      <div class="slide-img-wrap slide-img-left">
        <img src="<?= Yii::$app->homeUrl ?>images/hero/slide-2.png" alt="Estudios de Seguridad" class="slide-img">
        <div class="slide-img-fade slide-img-fade-left"></div>
      </div>
      <div class="slide-content">
        <h1>Estudios de Seguridad<br>y Consultoría</h1>
        <p>Cumplimiento normativo STPS en instalaciones, maquinaria, sustancias químicas, ergonomía y factores de riesgo psicosocial.</p>
        <a href="<?= Url::toRoute(['argaconsultores/seguridadlaboral']) ?>" class="btn-cta">Ver Más</a>
      </div>
    </div>

    <!-- Slide 3 — Recipientes a Presión (imagen derecha) -->
    <div class="slide slide-3">
      <div class="slide-img-wrap slide-img-right">
        <img src="<?= Yii::$app->homeUrl ?>images/hero/slide-3.png" alt="Recipientes a Presión" class="slide-img">
        <div class="slide-img-fade slide-img-fade-right"></div>
      </div>
      <div class="slide-content">
        <h1>Recipientes a Presión<br>y Dictaminaciones</h1>
        <p>Dictaminación de calderas, recipientes criogénicos y tuberías. Ensayos no destructivos: ultrasonido, partículas magnéticas y líquidos penetrantes.</p>
        <a href="<?= Url::toRoute(['argaconsultores/index']) ?>" class="btn-cta">Ver Más</a>
      </div>
    </div>

    <!-- Slide 4 — Sistema Contra Incendios (imagen izquierda) -->
    <div class="slide slide-4">
      <div class="slide-img-wrap slide-img-left">
        <img src="<?= Yii::$app->homeUrl ?>images/hero/slide-4.png" alt="Sistemas Contra Incendios" class="slide-img">
        <div class="slide-img-fade slide-img-fade-left"></div>
      </div>
      <div class="slide-content">
        <h1>Sistemas Contra<br>Incendios</h1>
        <p>Diseño, instalación y mantenimiento de sistemas de extinción, alarma, detección, hidrantes y rociadores. +30 años de experiencia en México y LATAM.</p>
        <a href="<?= Url::toRoute(['argafire/index']) ?>" class="btn-cta">Ver Más</a>
      </div>
    </div>

    <!-- Slide 5 — Capacitación (imagen derecha) -->
    <div class="slide slide-5">
      <div class="slide-img-wrap slide-img-right">
        <img src="<?= Yii::$app->homeUrl ?>images/hero/slide-5.png" alt="Capacitación" class="slide-img">
        <div class="slide-img-fade slide-img-fade-right"></div>
      </div>
      <div class="slide-content">
        <h1>Capacitación</h1>
        <p>Cursos registrados ante STPS y PROFEPA: LOTO, espacios confinados, trabajo en altura, montacargas, brigadas contra incendio y más.</p>
        <a href="<?= Url::toRoute(['argatraining/index']) ?>" class="btn-cta">Ver Más</a>
      </div>
    </div>

  </div>

  <button class="slide-arrow prev" id="prevSlide" aria-label="Anterior">&#8249;</button>
  <button class="slide-arrow next" id="nextSlide" aria-label="Siguiente">&#8250;</button>

  <div class="slide-dots" id="slideDots">
    <button class="dot active" data-index="0"></button>
    <button class="dot" data-index="1"></button>
    <button class="dot" data-index="2"></button>
    <button class="dot" data-index="3"></button>
    <button class="dot" data-index="4"></button>
  </div>
</section>

<!-- ===== QUIÉNES SOMOS + UNIDADES DE NEGOCIO ===== -->
<section class="section unidades-section reveal" id="quienes">
  <div class="container">
    <div class="unidades-header">
      <h2 class="section-title gradient-text">QUIÉNES SOMOS</h2>
      <p class="section-subtitle">
        Más de 30 años colaborando en el desarrollo de empresas más<br>
        <strong>Eficientes, Seguras y Rentables</strong>
      </p>
    </div>
    <div class="unidades-inner">

      <div class="unidades-text">
        <h2 class="unidades-title">
          <span class="gradient-text">DIVISIONES</span><br>
          <span class="gradient-text-alt">DE NEGOCIO</span>
        </h2>
        <p>Respaldada por profesionales con más de 17 años de experiencia en el ámbito de la seguridad industrial, salud ocupacional, protección ambiental, seguridad patrimonial, emergencia y desarrollo humano. Dicha experiencia ha quedado demostrada en empresas del giro de la construcción, petroquímica, alimentaría, industrial, comercial y de servicios. Donde el principal objetivo ha sido brindar un servicio de calidad, garantizando la integridad física de los colaboradores, la productividad, la continuidad del negocio, las afectaciones ambientales y la reducción de pérdidas por sanciones administrativas.</p>
        <a href="<?= Url::toRoute(['site/catalogo']) ?>" class="dv-link-catalogo">
          Ver catálogo completo de servicios
          <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </a>
      </div>

      <div class="unidades-grid-wrap">
        <!-- Marcas de agua SVG -->
        <svg class="unidades-watermark-svg" aria-hidden="true" viewBox="0 0 600 480" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g transform="translate(20,20)" opacity=".13" stroke="#3a5a8c" stroke-width="1.5">
            <path d="M5 28 Q5 12 30 12 Q55 12 55 28 Z" fill="none"/>
            <line x1="0" y1="28" x2="60" y2="28"/>
            <path d="M15 28 v5 Q15 38 30 38 Q45 38 45 33 v-5"/>
          </g>
          <g transform="translate(95,10)" opacity=".12" stroke="#3a5a8c" stroke-width="1.5">
            <path d="M10 40 L35 15" stroke-linecap="round"/>
            <circle cx="10" cy="45" r="8" fill="none"/>
            <circle cx="37" cy="13" r="6" fill="none"/>
          </g>
          <g transform="translate(180,15)" opacity=".11" stroke="#3a5a8c" stroke-width="1.5">
            <line x1="25" y1="8" x2="25" y2="30"/>
            <ellipse cx="25" cy="6" rx="8" ry="4" fill="none"/>
            <path d="M16 30 Q10 40 10 46 Q10 52 25 52 Q40 52 40 46 Q40 40 34 30 Z" fill="none"/>
            <line x1="10" y1="46" x2="40" y2="46"/>
          </g>
          <g transform="translate(280,8)" opacity=".12" stroke="#3a5a8c" stroke-width="1.5">
            <rect x="10" y="18" width="20" height="34" rx="10" fill="none"/>
            <line x1="20" y1="8" x2="20" y2="18"/>
            <path d="M20 8 Q30 4 36 8"/>
            <path d="M30 16 Q40 14 42 22"/>
          </g>
          <g transform="translate(390,5)" opacity=".10" stroke="#3a5a8c" stroke-width="1.5">
            <circle cx="25" cy="25" r="10" fill="none"/>
            <circle cx="25" cy="25" r="5" fill="none"/>
            <line x1="25" y1="8" x2="25" y2="14"/><line x1="25" y1="36" x2="25" y2="42"/>
            <line x1="8" y1="25" x2="14" y2="25"/><line x1="36" y1="25" x2="42" y2="25"/>
            <line x1="13" y1="13" x2="17" y2="17"/><line x1="33" y1="33" x2="37" y2="37"/>
            <line x1="37" y1="13" x2="33" y2="17"/><line x1="17" y1="33" x2="13" y2="37"/>
          </g>
          <g transform="translate(420,100)" opacity=".11" stroke="#3a5a8c" stroke-width="1.5">
            <rect x="6" y="10" width="32" height="40" rx="2" fill="none"/>
            <rect x="14" y="4" width="16" height="10" rx="2" fill="none"/>
            <line x1="12" y1="22" x2="32" y2="22"/>
            <line x1="12" y1="30" x2="32" y2="30"/>
            <line x1="12" y1="38" x2="24" y2="38"/>
            <path d="M26 36 l3 3 6-6" stroke-linecap="round"/>
          </g>
          <g transform="translate(415,335)" opacity=".08" stroke="#3a5a8c" stroke-width="1.5">
            <path d="M20 4 L36 10 v18 Q36 36 20 46 Q4 36 4 28 v-18 Z" fill="none"/>
            <path d="M12 22 l6 6 12-12" stroke-linecap="round" stroke-linejoin="round"/>
          </g>
        </svg>

        <div class="unidades-grid">
          <?php foreach ($divisiones as $div):
            $cssClass = $div['color'] === 'red' ? 'green' : 'teal';
          ?>
          <div class="unidad-item" data-division-id="<?= (int)$div['id'] ?>" role="button" tabindex="0"
               aria-label="Ver servicios de <?= htmlspecialchars($div['name'], ENT_QUOTES) ?>">
            <svg class="unidad-shield <?= $cssClass ?>" viewBox="0 0 80 95" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path class="shield-bg" d="M6,0 L74,0 Q80,0 80,6 L80,62 L40,95 L0,62 L0,6 Q0,0 6,0 Z"/>
              <?= $div['icon'] ?>
            </svg>
            <p><?= htmlspecialchars($div['name'], ENT_QUOTES) ?></p>
            <small><?= count($div['items']) ?> servicios</small>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ===== SOCIOS ESTRATÉGICOS ===== -->
<section class="section socios-section reveal" id="mision">
  <div class="container">
    <div class="socios-grid">

      <div class="socios-text">
        <span class="socios-label">EN ARGA GROUP MÉXICO</span>
        <h2 class="socios-heading">
          Somos tus mejores socios estratégicos
          <strong>en el control total de pérdidas.</strong>
        </h2>
        <hr class="socios-divider">

        <div class="socios-features">
          <div class="socios-feat">
            <div class="socios-feat-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="18" cy="16" r="7" fill="var(--lime)" opacity=".15" stroke="var(--lime)" stroke-width="2"/>
                <circle cx="30" cy="16" r="7" fill="var(--lime)" opacity=".15" stroke="var(--lime)" stroke-width="2"/>
                <ellipse cx="18" cy="36" rx="12" ry="7" fill="var(--lime)" opacity=".15" stroke="var(--lime)" stroke-width="2"/>
                <ellipse cx="30" cy="36" rx="12" ry="7" fill="var(--lime)" opacity=".10" stroke="var(--lime)" stroke-width="2"/>
              </svg>
            </div>
            <div>
              <h4>Somos un grupo</h4>
              <p>Que brinda servicios integrales en seguridad, medio ambiente y administración de riesgos operacionales.</p>
            </div>
          </div>

          <div class="socios-feat">
            <div class="socios-feat-icon">
              <svg viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="18" y="4" width="12" height="8" rx="2" fill="var(--lime)" opacity=".2" stroke="var(--lime)" stroke-width="2"/>
                <rect x="4" y="34" width="12" height="8" rx="2" fill="var(--lime)" opacity=".2" stroke="var(--lime)" stroke-width="2"/>
                <rect x="18" y="34" width="12" height="8" rx="2" fill="var(--lime)" opacity=".2" stroke="var(--lime)" stroke-width="2"/>
                <rect x="32" y="34" width="12" height="8" rx="2" fill="var(--lime)" opacity=".2" stroke="var(--lime)" stroke-width="2"/>
                <line x1="24" y1="12" x2="24" y2="24" stroke="var(--lime)" stroke-width="2"/>
                <line x1="10" y1="24" x2="38" y2="24" stroke="var(--lime)" stroke-width="2"/>
                <line x1="10" y1="24" x2="10" y2="34" stroke="var(--lime)" stroke-width="2"/>
                <line x1="24" y1="24" x2="24" y2="34" stroke="var(--lime)" stroke-width="2"/>
                <line x1="38" y1="24" x2="38" y2="34" stroke="var(--lime)" stroke-width="2"/>
              </svg>
            </div>
            <div>
              <h4>Nuestras Divisiones</h4>
              <ul class="socios-divisions">
                <li><strong>ARGA</strong> Consultoría</li>
                <li><strong>ARGA</strong> Fire</li>
                <li><strong>ARGA</strong> Training</li>
                <li><strong>ARGA</strong> Labs</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="socios-img-wrap">
        <img src="<?= Yii::$app->homeUrl ?>images/casa.webp" alt="ARGA Group instalaciones" class="socios-img">
      </div>

    </div>
  </div>
</section>

<!-- ===== POLÍTICAS ===== -->
<section class="section policies-section reveal" id="politicas">
  <div class="mvv-gradient-bg">
    <div class="container">
      <div class="policies-grid">

        <div class="policy-card">
          <div class="policy-icon">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
              <rect x="10" y="16" width="28" height="24" rx="3" stroke="var(--teal)" stroke-width="2"/>
              <path d="M16 16V12a8 8 0 1116 0v4" stroke="var(--teal)" stroke-width="2"/>
              <circle cx="24" cy="28" r="4" fill="var(--lime)" opacity="0.3" stroke="var(--lime)" stroke-width="2"/>
            </svg>
          </div>
          <div class="policy-divider"></div>
          <p class="policy-title">Política de Privacidad</p>
          <p class="policy-desc">Protección de datos personales conforme a la Ley Federal, aplicada a toda la información recopilada, procesada y resguardada por ARGA Group.</p>
          <a href="<?= Url::toRoute(['site/avisoprivacidad']) ?>" class="policy-link">Ver documento →</a>
        </div>

        <div class="policy-card">
          <div class="policy-icon">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
              <rect x="8" y="4" width="28" height="36" rx="3" stroke="var(--teal)" stroke-width="2"/>
              <path d="M14 14h16M14 20h16M14 26h10" stroke="var(--teal)" stroke-width="2" stroke-linecap="round"/>
              <path d="M30 32l2 2 5-5" stroke="var(--lime)" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="policy-divider"></div>
          <p class="policy-title">Código de Ética</p>
          <p class="policy-desc">Compromiso de actuar con integridad, honestidad y objetividad. Rechazo a prácticas de corrupción, dentro del alcance de nuestra acreditación EMA.</p>
          <a href="<?= Url::toRoute(['site/codigoetica']) ?>" class="policy-link">Ver documento →</a>
        </div>

        <div class="policy-card">
          <div class="policy-icon">
            <svg width="48" height="48" viewBox="0 0 48 48" fill="none">
              <path d="M8 8h32v24H26l-8 8v-8H8z" stroke="var(--teal)" stroke-width="2" stroke-linejoin="round"/>
              <path d="M16 18h16M16 24h10" stroke="var(--teal)" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </div>
          <div class="policy-divider"></div>
          <p class="policy-title">Procedimiento de Quejas</p>
          <p class="policy-desc">Canal formal para atención de quejas bajo los valores de Honestidad, Calidad, Compromiso, Profesionalismo, Discreción y Lealtad.</p>
          <a href="<?= Url::toRoute(['site/quejas']) ?>" class="policy-link">Ver documento →</a>
        </div>

      </div>
    </div>
  </div>
</section>

<!-- ===== CLIENTES ===== -->
<section class="section clients-section reveal" id="clientes">
  <div class="container">
    <h2 class="section-title">
      <span class="gradient-text">AGRADECEMOS LA CONFIANZA</span><br>
      <span class="gradient-text-alt">DE NUESTROS CLIENTES</span>
    </h2>
    <div class="clients-grid">
      <div class="client-logo">ADAMS</div>
      <div class="client-logo">ADIENT</div>
      <div class="client-logo">AMERICAN<br>STANDARD</div>
      <div class="client-logo">ANTOLIN</div>
      <div class="client-logo">AUDI</div>
      <div class="client-logo">AUTOTEK</div>
      <div class="client-logo">BMW</div>
      <div class="client-logo">CAMPRA</div>
      <div class="client-logo">CAPSUGEL</div>
      <div class="client-logo">FAURECIA</div>
      <div class="client-logo">FEDERAL<br>MOGUL</div>
      <div class="client-logo">GESTAMP</div>
      <div class="client-logo">IBERO</div>
      <div class="client-logo">IDESA</div>
      <div class="client-logo">KAYSER</div>
      <div class="client-logo">KIMBERLY<br>CLARK</div>
      <div class="client-logo">LONZA</div>
      <div class="client-logo">MONDELEZ</div>
      <div class="client-logo">SKF</div>
      <div class="client-logo">STANLEY</div>
      <div class="client-logo">THYSSENKRUPP</div>
      <div class="client-logo">UNILEVER</div>
      <div class="client-logo">UPAEP</div>
      <div class="client-logo">WHIRLPOOL</div>
    </div>
  </div>
</section>

<!-- ===== EQUIPO ===== -->
<section class="section team-section reveal" id="equipo">
  <div class="team-inner">

    <div class="team-cards-wrap">
      <!-- Viewport -->
      <div class="team-carousel">
        <div class="team-carousel-track" id="teamCarouselTrack">

          <div class="team-card">
            <div class="team-avatar">
              <svg width="70" height="70" viewBox="0 0 70 70"><circle cx="35" cy="35" r="35" fill="#e8f4f8"/><circle cx="35" cy="26" r="12" fill="#6ebbd9"/><ellipse cx="35" cy="58" rx="20" ry="14" fill="#6ebbd9"/></svg>
            </div>
            <p class="team-name">ISH Alejandra M.</p>
            <p class="team-role-sub">Ing. en Seguridad e Higiene por el IPRL</p>
            <p class="team-role"><strong>Coordinadora de Seguridad</strong></p>
          </div>

          <div class="team-card">
            <div class="team-avatar">
              <img src="<?= Yii::$app->homeUrl ?>images/emma.png" alt="Director General" style="width:70px;height:70px;object-fit:cover;border-radius:50%;">
            </div>
            <p class="team-name">Director General</p>
            <p class="team-role-sub">ARGA Group México</p>
            <p class="team-role"><strong>Administración en Riesgos</strong></p>
          </div>

          <div class="team-card">
            <div class="team-avatar">
              <svg width="70" height="70" viewBox="0 0 70 70"><circle cx="35" cy="35" r="35" fill="#e8f4f8"/><circle cx="35" cy="26" r="12" fill="#6ebbd9"/><ellipse cx="35" cy="58" rx="20" ry="14" fill="#6ebbd9"/></svg>
            </div>
            <p class="team-name">ISH Eduardo M.</p>
            <p class="team-role-sub">Ing. en Seguridad e Higiene por el IPRL</p>
            <p class="team-role"><strong>Técnico de Laboratorio</strong></p>
          </div>

        </div>
      </div>
      <!-- Controls -->
      <div class="team-carousel-controls">
        <button class="team-arrow" id="teamPrev" aria-label="Anterior">&#8249;</button>
        <div class="team-dots">
          <button class="team-dot active" data-index="0"></button>
          <button class="team-dot" data-index="1"></button>
          <button class="team-dot" data-index="2"></button>
        </div>
        <button class="team-arrow" id="teamNext" aria-label="Siguiente">&#8250;</button>
      </div>
    </div>

    <div class="team-info">
      <h2 class="gradient-text-outline">EQUIPO<br>DE<br>TRABAJO</h2>
      <p>Dicha experiencia ha quedado demostrada en empresas del giro de la construcción, petroquímica, alimentaría, industrial, comercial y de servicios. Donde el principal objetivo ha sido brindar un servicio de calidad, garantizando la integridad física de los colaboradores, la productividad, la continuidad del negocio, las afectaciones ambientales y la reducción de pérdidas por sanciones administrativas.</p>
      <a href="<?= Url::toRoute(['contactos/create']) ?>" class="btn-secondary">Contáctanos</a>
    </div>
  </div>
</section>

<!-- ===== ACREDITACIONES ===== -->
<section class="acred-section reveal" id="acreditaciones">
  <div class="container">
    <p class="acred-label">Organismos que nos avalan</p>
    <h2 class="acred-title">Acreditaciones y Aprobaciones</h2>
    <div class="acred-grid">

      <div class="acred-card">
        <div class="acred-logo-wrap">
          <img src="<?= Yii::$app->homeUrl ?>images/emma.png" alt="EMA" class="acred-logo">
        </div>
        <div class="acred-body">
          <span class="acred-org">Entidad Mexicana de Acreditación</span>
          <span class="acred-code">AL-1556-140/22</span>
          <span class="acred-desc">Laboratorio de Higiene Industrial</span>
        </div>
      </div>

      <div class="acred-card">
        <div class="acred-logo-wrap">
          <img src="<?= Yii::$app->homeUrl ?>images/emma.png" alt="EMA" class="acred-logo">
        </div>
        <div class="acred-body">
          <span class="acred-org">Entidad Mexicana de Acreditación</span>
          <span class="acred-code">FF-1555-128/22</span>
          <span class="acred-desc">Laboratorio de Fuentes Fijas</span>
        </div>
      </div>

      <div class="acred-card">
        <div class="acred-logo-wrap">
          <img src="<?= Yii::$app->homeUrl ?>images/stps.png" alt="STPS" class="acred-logo">
        </div>
        <div class="acred-body">
          <span class="acred-org">Secretaría del Trabajo y Previsión Social</span>
          <span class="acred-code">LPSTPS-169/2025</span>
          <span class="acred-desc">Laboratorio de Pruebas aprobado</span>
        </div>
      </div>

      <div class="acred-card">
        <div class="acred-logo-wrap">
          <img src="<?= Yii::$app->homeUrl ?>images/profepa.png" alt="PROFEPA" class="acred-logo">
        </div>
        <div class="acred-body">
          <span class="acred-org">Procuraduría Federal de Protección al Ambiente</span>
          <span class="acred-code">PFPA-APR-LP-RUIDO-016/2023</span>
          <span class="acred-desc">Laboratorio de Ruido Ambiental</span>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ===== CONTACTO ===== -->
<section class="section contact-section reveal" id="contacto">
  <div class="container">
    <h2 class="section-title contact-slogan">
      <span class="gradient-text">CERO ACCIDENTES NO ES UNA META.</span><br>
      <span class="gradient-text-alt">ES NUESTRO ESTÁNDAR.</span>
    </h2>

    <div class="contact-grid">
      <div class="contact-info">
        <h3>Contáctanos</h3>
        <ul>
          <li>
            <span class="contact-icon">📍</span>
            <span>Calle 97, Bosques de Amalucan<br>Puebla, Pue. México CP 72310</span>
          </li>
          <li>
            <span class="contact-icon">✉️</span>
            <span>ventas@argamexico.com</span>
          </li>
          <li>
            <span class="contact-icon">✉️</span>
            <span>ventas@argafire.com</span>
          </li>
          <li>
            <span class="contact-icon">📞</span>
            <span>(221) 859 2152 / 222 540 9946</span>
          </li>
          <li>
            <span class="contact-icon">🌐</span>
            <a href="<?= Url::toRoute(['contactos/create']) ?>" style="color:inherit;">Formulario de contacto →</a>
          </li>
        </ul>
      </div>

      <div class="contact-map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3772.0!2d-98.132538!3d19.050812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnCsDAzJzAyLjkiTiA5OMKwMDcnNTcuMSJX!5e0!3m2!1ses!2smx!4v1"
          width="100%"
          height="100%"
          style="border:0;border-radius:16px;"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
          title="Ubicación ARGA Group México">
        </iframe>
      </div>
    </div>
  </div>
</section>
