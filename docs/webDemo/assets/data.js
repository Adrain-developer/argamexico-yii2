/* ============================================================
   ARGA · Data de divisiones
   ============================================================
   Estructura compatible con backend Yii2:
   - id, slug, color (teal|red), shieldSvg (icon path)
   - NOMs/servicios anidados con título, código, descripción, banners
   ============================================================ */
window.ARGA_DIVISIONS = [
  {
    id: 1,
    slug: 'capacitacion',
    name: 'Capacitación',
    color: 'teal',
    tagline: 'Formación especializada',
    descripcion: 'Programas de capacitación certificados para colaboradores en seguridad, salud ocupacional y normativas oficiales.',
    icon: `<path d="M24 35 Q40 30 40 30 Q40 30 56 35 L56 58 Q40 53 40 53 Q40 53 24 58 Z" stroke="white" stroke-width="2" fill="none" stroke-linejoin="round"/>
           <line x1="40" y1="30" x2="40" y2="53" stroke="white" stroke-width="2"/>
           <path d="M28 40 Q34 38 38 39M28 45 Q34 43 38 44M28 50 Q34 48 38 49" stroke="white" stroke-width="1.2" stroke-linecap="round" opacity=".8"/>
           <path d="M42 39 Q46 38 52 40M42 44 Q46 43 52 45M42 49 Q46 48 52 50" stroke="white" stroke-width="1.2" stroke-linecap="round" opacity=".8"/>`,
    noms: ['DC-3', 'NOM-019', 'NOM-030'],
    items: [
      {
        code: 'DC-3-STPS',
        title: 'Constancias DC-3',
        descripcion: 'Emisión de constancias oficiales reconocidas por la STPS para cursos impartidos por agentes capacitadores externos.',
        evaluacion: 'Validación de competencias adquiridas mediante examen teórico-práctico y entrega de constancia oficial.',
        banners: [
          'https://images.unsplash.com/photo-1552664730-d307ca884978?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'NOM-019-STPS-2011',
        title: 'Comisiones de Seguridad e Higiene',
        descripcion: 'Capacitación para integración, funcionamiento y operación de las CSH conforme a la normativa vigente.',
        evaluacion: 'Mediante taller práctico y simulacro de recorridos de verificación con generación de actas.',
        banners: [
          'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'NOM-030-STPS-2009',
        title: 'Servicios Preventivos de Seguridad',
        descripcion: 'Diplomado para responsables de SSP en la implementación del programa de seguridad y salud en el trabajo.',
        evaluacion: 'Acreditación con caso real implementado en sitio del cliente.',
        banners: [
          'https://images.unsplash.com/photo-1573164574572-cb89e39749b4?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=900&h=600&fit=crop'
        ]
      }
    ]
  },

  {
    id: 2,
    slug: 'salud-ocupacional',
    name: 'Salud Ocupacional',
    color: 'red',
    tagline: 'Bienestar del colaborador',
    descripcion: 'Evaluaciones clínicas, exámenes médicos y vigilancia epidemiológica enfocada a riesgos laborales específicos.',
    icon: `<circle cx="40" cy="34" r="10" stroke="white" stroke-width="2" fill="none"/>
           <path d="M36 30 h8 M40 26 v8" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
           <path d="M22 58 Q22 46 40 46 Q58 46 58 58" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/>`,
    noms: ['NOM-030', 'NOM-035', 'EMO'],
    items: [
      {
        code: 'NOM-035-STPS-2018',
        title: 'Factores de Riesgo Psicosocial',
        descripcion: 'Identificación, análisis y prevención de factores psicosociales y promoción del entorno organizacional favorable.',
        evaluacion: 'Aplicación de los cuestionarios guía de referencia I, II y III según número de trabajadores.',
        banners: [
          'https://images.unsplash.com/photo-1573497019418-b400bb3ab074?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1542884748-2b87b36c6b90?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'EMO-INT',
        title: 'Exámenes Médicos Ocupacionales',
        descripcion: 'Aplicación de EMOs de ingreso, periódicos y de egreso bajo criterios de riesgo del puesto.',
        evaluacion: 'Valoración por médico especialista en medicina del trabajo + estudios de gabinete.',
        banners: [
          'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=900&h=600&fit=crop'
        ]
      }
    ]
  },

  {
    id: 3,
    slug: 'auditoria-inspeccion',
    name: 'Unidad de Auditoría e Inspección',
    color: 'teal',
    tagline: 'Verificación normativa',
    descripcion: 'Unidad de Verificación acreditada por la EMA para emitir dictámenes de cumplimiento ante la STPS.',
    icon: `<rect x="26" y="42" width="28" height="20" rx="3" stroke="white" stroke-width="2" fill="none"/>
           <path d="M30 42 V35 Q30 26 40 26 Q50 26 50 35 V42" stroke="white" stroke-width="2" fill="none"/>
           <circle cx="40" cy="51" r="3" fill="white"/>
           <line x1="40" y1="54" x2="40" y2="58" stroke="white" stroke-width="2" stroke-linecap="round"/>`,
    noms: ['UV-EMA', 'STPS', 'PROFEPA'],
    items: [
      {
        code: 'UV-001',
        title: 'Verificación NOM-001',
        descripcion: 'Verificación de edificios, locales, instalaciones y áreas en los centros de trabajo.',
        evaluacion: 'Recorrido in situ + acta circunstanciada + dictamen de cumplimiento.',
        banners: [
          'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'UV-022',
        title: 'Verificación NOM-022 Eléctricas',
        descripcion: 'Verificación de electricidad estática en los centros de trabajo: condiciones de seguridad.',
        evaluacion: 'Medición de resistencia a tierra y emisión de dictamen oficial.',
        banners: [
          'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=900&h=600&fit=crop'
        ]
      }
    ]
  },

  {
    id: 4,
    slug: 'seguridad',
    name: 'Seguridad',
    color: 'red',
    tagline: 'Prevención de riesgos',
    descripcion: 'Diagnósticos, programas y servicios para garantizar entornos laborales libres de accidentes.',
    icon: `<path d="M18 50 Q18 34 40 34 Q62 34 62 50 Z" stroke="white" stroke-width="2" fill="white" fill-opacity=".15"/>
           <path d="M14 50 h52" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
           <path d="M26 50 v4 Q26 58 40 58 Q54 58 54 54 v-4" stroke="white" stroke-width="1.5" fill="none"/>
           <path d="M30 34 Q40 24 50 34" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/>`,
    noms: ['NOM-002', 'NOM-005', 'NOM-009', 'NOM-029'],
    items: [
      {
        code: 'NOM-002-STPS-2010',
        title: 'Prevención y Protección contra Incendios',
        descripcion: 'Diseño e implementación de planes de emergencia, brigadas y sistemas de protección contra incendios.',
        evaluacion: 'Estudio de riesgo de incendio + simulacros + verificación de equipos de protección.',
        banners: [
          'https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'NOM-005-STPS-1998',
        title: 'Manejo de Sustancias Químicas',
        descripcion: 'Condiciones de seguridad e higiene para el manejo, transporte y almacenamiento de sustancias químicas peligrosas.',
        evaluacion: 'Análisis de riesgo, hojas de datos de seguridad y plan de respuesta a emergencias.',
        banners: [
          'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'NOM-009-STPS-2011',
        title: 'Trabajos en Altura',
        descripcion: 'Condiciones de seguridad para realizar trabajos en altura con equipos de protección personal certificados.',
        evaluacion: 'Inspección de sistemas anticaídas + certificación de personal.',
        banners: [
          'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=900&h=600&fit=crop'
        ]
      }
    ]
  },

  {
    id: 5,
    slug: 'higiene-industrial',
    name: 'Higiene Industrial',
    color: 'teal',
    tagline: 'Mediciones ambientales',
    descripcion: 'Reconocimiento, evaluación y control de los agentes físicos, químicos y biológicos del centro de trabajo.',
    icon: `<rect x="20" y="28" width="40" height="28" rx="2" stroke="white" stroke-width="1.8" fill="none"/>
           <polyline points="26,50 33,38 40,44 49,32 54,40" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
           <line x1="20" y1="56" x2="60" y2="56" stroke="white" stroke-width="1" opacity=".5"/>`,
    noms: ['NOM-011', 'NOM-024', 'NOM-025', 'NOM-010', 'NOM-013'],
    items: [
      {
        code: 'NOM-024-STPS-2001',
        title: 'Vibraciones',
        descripcion: 'Reconocimiento: identificación de fuentes generadoras de vibraciones como prensas, montacargas, pulidoras, etc. junto con el tipo de vibración que estas generen, siendo dos: cuerpo completo y extremidades superiores.',
        evaluacion: 'Se realizará la medición con un acelerómetro de lectura directa durante un ciclo de trabajo.',
        banners: [
          'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'NOM-011-STPS-2001',
        title: 'Ruido',
        descripcion: 'Reconocimiento de fuentes emisoras de ruido en el centro de trabajo y su impacto en los trabajadores expuestos.',
        evaluacion: 'Medición con sonómetro y dosimetría personal por jornada laboral completa.',
        banners: [
          'https://images.unsplash.com/photo-1487058792275-0ad4aaf24ca7?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'NOM-025-STPS-2008',
        title: 'Iluminación',
        descripcion: 'Reconocimiento de las áreas y puestos de trabajo donde se requiere evaluar niveles de iluminación.',
        evaluacion: 'Medición con luxómetro calibrado en plano de trabajo y comparación con la tabla normativa.',
        banners: [
          'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'NOM-010-STPS-2014',
        title: 'Agentes Químicos Contaminantes',
        descripcion: 'Reconocimiento de sustancias químicas presentes en el ambiente laboral y rutas de exposición.',
        evaluacion: 'Muestreo personal con bomba de bajo flujo y análisis en laboratorio acreditado.',
        banners: [
          'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=900&h=600&fit=crop'
        ]
      }
    ]
  },

  {
    id: 6,
    slug: 'laboratorio',
    name: 'Laboratorio de Pruebas',
    color: 'red',
    tagline: 'Análisis acreditado',
    descripcion: 'Laboratorio con acreditación EMA para análisis ambientales, químicos y de higiene industrial.',
    icon: `<line x1="40" y1="26" x2="40" y2="44" stroke="white" stroke-width="2.5" stroke-linecap="round"/>
           <ellipse cx="40" cy="24" rx="7" ry="5" stroke="white" stroke-width="1.8" fill="none"/>
           <path d="M34 44 Q28 52 28 58 Q28 62 40 62 Q52 62 52 58 Q52 52 46 44 Z" stroke="white" stroke-width="1.8" fill="white" fill-opacity=".12"/>
           <line x1="28" y1="58" x2="52" y2="58" stroke="white" stroke-width="1.5" stroke-linecap="round"/>`,
    noms: ['EMA', 'NMX-AA', 'ISO/IEC 17025'],
    items: [
      {
        code: 'LAB-AGUA',
        title: 'Análisis de Calidad de Agua',
        descripcion: 'Análisis fisicoquímicos y microbiológicos de agua potable, residual y de proceso.',
        evaluacion: 'Métodos referenciados en NMX-AA con resultados validados por EMA.',
        banners: [
          'https://images.unsplash.com/photo-1532634922-8fe0b757fb13?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'LAB-AIRE',
        title: 'Calidad del Aire',
        descripcion: 'Monitoreo perimetral y de fuentes fijas para parámetros normados ambientalmente.',
        evaluacion: 'Equipos calibrados con trazabilidad CENAM y análisis acreditado.',
        banners: [
          'https://images.unsplash.com/photo-1611273426858-450d8e3c9fce?w=900&h=600&fit=crop'
        ]
      }
    ]
  },

  {
    id: 7,
    slug: 'medio-ambiente',
    name: 'Medio Ambiente',
    color: 'teal',
    tagline: 'Cumplimiento ambiental',
    descripcion: 'Servicios para cumplimiento normativo ambiental: PROFEPA, SEMARNAT y autoridades estatales.',
    icon: `<path d="M40 60 Q40 40 55 30 Q55 48 40 60 Z" fill="white" fill-opacity=".9"/>
           <path d="M40 60 Q40 40 25 30 Q25 48 40 60 Z" fill="white" fill-opacity=".5"/>
           <circle cx="40" cy="28" r="5" fill="white" fill-opacity=".7"/>
           <line x1="40" y1="60" x2="40" y2="68" stroke="white" stroke-width="2" stroke-linecap="round"/>
           <path d="M30 68 Q40 64 50 68" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/>`,
    noms: ['LGEEPA', 'NOM-052', 'NOM-161', 'COA'],
    items: [
      {
        code: 'COA-FEDERAL',
        title: 'Cédula de Operación Anual',
        descripcion: 'Elaboración y trámite de la COA federal/estatal para establecimientos sujetos a reporte ambiental.',
        evaluacion: 'Inventario de emisiones, descargas y residuos + carga en plataforma SEMARNAT.',
        banners: [
          'https://images.unsplash.com/photo-1466611653911-95081537e5b7?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'NOM-052-SEMARNAT',
        title: 'Plan de Manejo de Residuos',
        descripcion: 'Identificación, clasificación y plan de manejo de residuos peligrosos generados en el sitio.',
        evaluacion: 'Diagnóstico de generación + plan registrado ante SEMARNAT.',
        banners: [
          'https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?w=900&h=600&fit=crop'
        ]
      }
    ]
  },

  {
    id: 8,
    slug: 'ergonomia',
    name: 'Ergonomía',
    color: 'red',
    tagline: 'Diseño centrado en el humano',
    descripcion: 'Evaluación y rediseño de puestos de trabajo para reducir trastornos musculoesqueléticos.',
    icon: `<rect x="28" y="38" width="24" height="14" rx="3" stroke="white" stroke-width="1.8" fill="none"/>
           <circle cx="40" cy="31" r="5" stroke="white" stroke-width="1.8" fill="none"/>
           <line x1="40" y1="52" x2="40" y2="62" stroke="white" stroke-width="2" stroke-linecap="round"/>
           <path d="M28 62 h24" stroke="white" stroke-width="2" stroke-linecap="round"/>
           <line x1="28" y1="38" x2="22" y2="50" stroke="white" stroke-width="1.8" stroke-linecap="round"/>`,
    noms: ['NOM-036-1', 'RULA', 'REBA', 'NIOSH'],
    items: [
      {
        code: 'NOM-036-1-STPS-2018',
        title: 'Factores de Riesgo Ergonómico',
        descripcion: 'Identificación y análisis del manejo manual de cargas conforme a la normativa STPS.',
        evaluacion: 'Aplicación de las guías de referencia I, II y III según tipo de tarea.',
        banners: [
          'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=900&h=600&fit=crop'
        ]
      },
      {
        code: 'ERG-OFICINA',
        title: 'Ergonomía de Oficina',
        descripcion: 'Evaluación postural y rediseño de estaciones de trabajo administrativas y home office.',
        evaluacion: 'Métodos RULA/REBA + recomendaciones por puesto.',
        banners: [
          'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&h=600&fit=crop',
          'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=900&h=600&fit=crop'
        ]
      }
    ]
  }
];

/* ============================================================
   NEWS / BLOG
   ============================================================ */
window.ARGA_NEWS = [
  {
    id: 1,
    category: 'Higiene Industrial',
    color: 'teal',
    title: 'Nueva acreditación EMA para Laboratorio de Ruido Ambiental',
    excerpt: 'Reforzamos nuestro portafolio acreditando el laboratorio bajo la norma ISO/IEC 17025:2017 para mediciones de ruido perimetral.',
    image: 'https://images.unsplash.com/photo-1487058792275-0ad4aaf24ca7?w=900&h=600&fit=crop',
    date: '15 Mayo 2026',
    readMin: 4,
  },
  {
    id: 2,
    category: 'Capacitación',
    color: 'red',
    title: 'Diplomado en SST con valor curricular STPS · cohorte verano',
    excerpt: 'Abrimos inscripciones para el diplomado de Servicios Preventivos de Seguridad y Salud bajo NOM-030-STPS-2009.',
    image: 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=900&h=600&fit=crop',
    date: '02 Mayo 2026',
    readMin: 6,
  },
  {
    id: 3,
    category: 'Medio Ambiente',
    color: 'teal',
    title: 'COA 2025 · puntos clave y fechas límite por entidad',
    excerpt: 'Guía rápida para preparar la Cédula de Operación Anual federal y estatal evitando observaciones por SEMARNAT.',
    image: 'https://images.unsplash.com/photo-1466611653911-95081537e5b7?w=900&h=600&fit=crop',
    date: '28 Abril 2026',
    readMin: 5,
  },
  {
    id: 4,
    category: 'Ergonomía',
    color: 'red',
    title: 'NOM-036 · qué deben hacer las empresas en 2026',
    excerpt: 'Calendario de obligaciones para identificación y prevención de factores de riesgo ergonómico en manejo manual de cargas.',
    image: 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=900&h=600&fit=crop',
    date: '20 Abril 2026',
    readMin: 7,
  }
];

/* ============================================================
   ADS · banners promocionales
   ============================================================ */
window.ARGA_ADS = [
  {
    id: 1,
    eyebrow: 'Curso destacado',
    title: 'Diplomado integral SST · 120 hrs',
    description: 'Valor curricular STPS. Modalidad híbrida. Inicia en julio 2026.',
    cta: 'Reservar lugar',
    href: '#',
    bg: 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1600&h=600&fit=crop',
    accent: 'teal'
  },
  {
    id: 2,
    eyebrow: 'Promoción',
    title: 'Auditoría integral 2026 con 15% de descuento',
    description: 'Verificación NOM-001, NOM-022 y NOM-027. Cotiza antes de junio.',
    cta: 'Ver paquete',
    href: '#',
    bg: 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=1600&h=600&fit=crop',
    accent: 'red'
  },
  {
    id: 3,
    eyebrow: 'Acreditación EMA',
    title: 'Nuevo Laboratorio de Ruido Ambiental',
    description: 'Acreditación PFPA-APR-LP-RUIDO-016/2023 vigente.',
    cta: 'Ver acreditaciones',
    href: '#',
    bg: 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=1600&h=600&fit=crop',
    accent: 'navy'
  }
];

/* ============================================================
   TEAM
   ============================================================ */
window.ARGA_TEAM = [
  { id: 1, name: 'ISH Alejandra M.', role: 'Coordinadora de Seguridad', cred: 'Ing. en Seguridad e Higiene por el IPRL', initials: 'AM' },
  { id: 2, name: 'MC Roberto L.',    role: 'Director de Laboratorio',    cred: 'Maestro en Ciencias Ambientales',          initials: 'RL' },
  { id: 3, name: 'Ing. Carla V.',    role: 'Coordinadora de Higiene',    cred: 'Especialista en NOM-011 y NOM-025',         initials: 'CV' },
  { id: 4, name: 'Lic. Juan P.',     role: 'Líder de Capacitación',      cred: 'Agente Capacitador STPS · DC-5',            initials: 'JP' }
];

/* ============================================================
   ACREDITACIONES
   ============================================================ */
window.ARGA_ACREDITACIONES = [
  { org: 'EMA', orgFull: 'Entidad Mexicana de Acreditación', code: 'AL-1556-140/22', scope: 'Laboratorio de Higiene Industrial' },
  { org: 'EMA', orgFull: 'Entidad Mexicana de Acreditación', code: 'FF-1555-128/22', scope: 'Laboratorio de Fuentes Fijas' },
  { org: 'STPS', orgFull: 'Secretaría del Trabajo y Previsión Social', code: 'LPSTPS-169/2025', scope: 'Laboratorio de Pruebas aprobado' },
  { org: 'PROFEPA', orgFull: 'Procuraduría Federal de Protección al Ambiente', code: 'PFPA-APR-LP-RUIDO-016/2023', scope: 'Laboratorio de Ruido Ambiental' }
];
