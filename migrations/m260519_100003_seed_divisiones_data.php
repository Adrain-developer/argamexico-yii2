<?php

use yii\db\Migration;

class m260519_100003_seed_divisiones_data extends Migration
{
    private const SHIELD = 'M6,0 L74,0 Q80,0 80,6 L80,62 L40,95 L0,62 L0,6 Q0,0 6,0 Z';

    public function safeUp(): void
    {
        $now = time();

        $divisions = [
            [
                'id' => 1, 'nombre' => 'Capacitación', 'slug' => 'capacitacion', 'color' => 'teal',
                'tagline' => 'Formación especializada', 'orden' => 1,
                'descripcion' => 'Programas de capacitación certificados para colaboradores en seguridad, salud ocupacional y normativas oficiales.',
                'noms' => '["DC-3","NOM-019","NOM-030"]',
                'icon_svg' => '<path d="M24 35 Q40 30 40 30 Q40 30 56 35 L56 58 Q40 53 40 53 Q40 53 24 58 Z" stroke="white" stroke-width="2" fill="none" stroke-linejoin="round"/><line x1="40" y1="30" x2="40" y2="53" stroke="white" stroke-width="2"/><path d="M28 40 Q34 38 38 39M28 45 Q34 43 38 44M28 50 Q34 48 38 49" stroke="white" stroke-width="1.2" stroke-linecap="round" opacity=".8"/><path d="M42 39 Q46 38 52 40M42 44 Q46 43 52 45M42 49 Q46 48 52 50" stroke="white" stroke-width="1.2" stroke-linecap="round" opacity=".8"/>',
            ],
            [
                'id' => 2, 'nombre' => 'Salud Ocupacional', 'slug' => 'salud-ocupacional', 'color' => 'red',
                'tagline' => 'Bienestar del colaborador', 'orden' => 2,
                'descripcion' => 'Evaluaciones clínicas, exámenes médicos y vigilancia epidemiológica enfocada a riesgos laborales específicos.',
                'noms' => '["NOM-030","NOM-035","EMO"]',
                'icon_svg' => '<circle cx="40" cy="34" r="10" stroke="white" stroke-width="2" fill="none"/><path d="M36 30 h8 M40 26 v8" stroke="white" stroke-width="2.5" stroke-linecap="round"/><path d="M22 58 Q22 46 40 46 Q58 46 58 58" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/>',
            ],
            [
                'id' => 3, 'nombre' => 'Unidad de Auditoría e Inspección', 'slug' => 'auditoria-inspeccion', 'color' => 'teal',
                'tagline' => 'Verificación normativa', 'orden' => 3,
                'descripcion' => 'Unidad de Verificación acreditada por la EMA para emitir dictámenes de cumplimiento ante la STPS.',
                'noms' => '["UV-EMA","STPS","PROFEPA"]',
                'icon_svg' => '<rect x="26" y="42" width="28" height="20" rx="3" stroke="white" stroke-width="2" fill="none"/><path d="M30 42 V35 Q30 26 40 26 Q50 26 50 35 V42" stroke="white" stroke-width="2" fill="none"/><circle cx="40" cy="51" r="3" fill="white"/><line x1="40" y1="54" x2="40" y2="58" stroke="white" stroke-width="2" stroke-linecap="round"/>',
            ],
            [
                'id' => 4, 'nombre' => 'Seguridad', 'slug' => 'seguridad', 'color' => 'red',
                'tagline' => 'Prevención de riesgos', 'orden' => 4,
                'descripcion' => 'Diagnósticos, programas y servicios para garantizar entornos laborales libres de accidentes.',
                'noms' => '["NOM-002","NOM-005","NOM-009","NOM-029"]',
                'icon_svg' => '<path d="M18 50 Q18 34 40 34 Q62 34 62 50 Z" stroke="white" stroke-width="2" fill="white" fill-opacity=".15"/><path d="M14 50 h52" stroke="white" stroke-width="2.5" stroke-linecap="round"/><path d="M26 50 v4 Q26 58 40 58 Q54 58 54 54 v-4" stroke="white" stroke-width="1.5" fill="none"/><path d="M30 34 Q40 24 50 34" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/>',
            ],
            [
                'id' => 5, 'nombre' => 'Higiene Industrial', 'slug' => 'higiene-industrial', 'color' => 'teal',
                'tagline' => 'Mediciones ambientales', 'orden' => 5,
                'descripcion' => 'Reconocimiento, evaluación y control de los agentes físicos, químicos y biológicos del centro de trabajo.',
                'noms' => '["NOM-011","NOM-024","NOM-025","NOM-010","NOM-013"]',
                'icon_svg' => '<rect x="20" y="28" width="40" height="28" rx="2" stroke="white" stroke-width="1.8" fill="none"/><polyline points="26,50 33,38 40,44 49,32 54,40" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/><line x1="20" y1="56" x2="60" y2="56" stroke="white" stroke-width="1" opacity=".5"/>',
            ],
            [
                'id' => 6, 'nombre' => 'Laboratorio de Pruebas', 'slug' => 'laboratorio', 'color' => 'red',
                'tagline' => 'Análisis acreditado', 'orden' => 6,
                'descripcion' => 'Laboratorio con acreditación EMA para análisis ambientales, químicos y de higiene industrial.',
                'noms' => '["EMA","NMX-AA","ISO/IEC 17025"]',
                'icon_svg' => '<line x1="40" y1="26" x2="40" y2="44" stroke="white" stroke-width="2.5" stroke-linecap="round"/><ellipse cx="40" cy="24" rx="7" ry="5" stroke="white" stroke-width="1.8" fill="none"/><path d="M34 44 Q28 52 28 58 Q28 62 40 62 Q52 62 52 58 Q52 52 46 44 Z" stroke="white" stroke-width="1.8" fill="white" fill-opacity=".12"/><line x1="28" y1="58" x2="52" y2="58" stroke="white" stroke-width="1.5" stroke-linecap="round"/>',
            ],
            [
                'id' => 7, 'nombre' => 'Medio Ambiente', 'slug' => 'medio-ambiente', 'color' => 'teal',
                'tagline' => 'Cumplimiento ambiental', 'orden' => 7,
                'descripcion' => 'Servicios para cumplimiento normativo ambiental: PROFEPA, SEMARNAT y autoridades estatales.',
                'noms' => '["LGEEPA","NOM-052","NOM-161","COA"]',
                'icon_svg' => '<path d="M40 60 Q40 40 55 30 Q55 48 40 60 Z" fill="white" fill-opacity=".9"/><path d="M40 60 Q40 40 25 30 Q25 48 40 60 Z" fill="white" fill-opacity=".5"/><circle cx="40" cy="28" r="5" fill="white" fill-opacity=".7"/><line x1="40" y1="60" x2="40" y2="68" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M30 68 Q40 64 50 68" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/>',
            ],
            [
                'id' => 8, 'nombre' => 'Ergonomía', 'slug' => 'ergonomia', 'color' => 'red',
                'tagline' => 'Diseño centrado en el humano', 'orden' => 8,
                'descripcion' => 'Evaluación y rediseño de puestos de trabajo para reducir trastornos musculoesqueléticos.',
                'noms' => '["NOM-036-1","RULA","REBA","NIOSH"]',
                'icon_svg' => '<rect x="28" y="38" width="24" height="14" rx="3" stroke="white" stroke-width="1.8" fill="none"/><circle cx="40" cy="31" r="5" stroke="white" stroke-width="1.8" fill="none"/><line x1="40" y1="52" x2="40" y2="62" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M28 62 h24" stroke="white" stroke-width="2" stroke-linecap="round"/><line x1="28" y1="38" x2="22" y2="50" stroke="white" stroke-width="1.8" stroke-linecap="round"/>',
            ],
        ];

        foreach ($divisions as $div) {
            $this->insert('divisiones', [
                'id'          => $div['id'],
                'nombre'      => $div['nombre'],
                'slug'        => $div['slug'],
                'color'       => $div['color'],
                'tagline'     => $div['tagline'],
                'descripcion' => $div['descripcion'],
                'icon_svg'    => $div['icon_svg'],
                'noms'        => $div['noms'],
                'orden'       => $div['orden'],
                'activo'      => 1,
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);
        }

        // Servicios por división
        $servicios = [
            // Capacitación
            ['div' => 1, 'code' => 'DC-3-STPS',        'titulo' => 'Constancias DC-3',                    'descripcion' => 'Emisión de constancias oficiales reconocidas por la STPS para cursos impartidos por agentes capacitadores externos.',                                                                                        'evaluacion' => 'Validación de competencias adquiridas mediante examen teórico-práctico y entrega de constancia oficial.'],
            ['div' => 1, 'code' => 'NOM-019-STPS-2011', 'titulo' => 'Comisiones de Seguridad e Higiene',   'descripcion' => 'Capacitación para integración, funcionamiento y operación de las CSH conforme a la normativa vigente.',                                                                                                        'evaluacion' => 'Mediante taller práctico y simulacro de recorridos de verificación con generación de actas.'],
            ['div' => 1, 'code' => 'NOM-030-STPS-2009', 'titulo' => 'Servicios Preventivos de Seguridad',  'descripcion' => 'Diplomado para responsables de SSP en la implementación del programa de seguridad y salud en el trabajo.',                                                                                                    'evaluacion' => 'Acreditación con caso real implementado en sitio del cliente.'],
            // Salud Ocupacional
            ['div' => 2, 'code' => 'NOM-035-STPS-2018', 'titulo' => 'Factores de Riesgo Psicosocial',      'descripcion' => 'Identificación, análisis y prevención de factores psicosociales y promoción del entorno organizacional favorable.',                                                                                          'evaluacion' => 'Aplicación de los cuestionarios guía de referencia I, II y III según número de trabajadores.'],
            ['div' => 2, 'code' => 'EMO-INT',            'titulo' => 'Exámenes Médicos Ocupacionales',      'descripcion' => 'Aplicación de EMOs de ingreso, periódicos y de egreso bajo criterios de riesgo del puesto.',                                                                                                                'evaluacion' => 'Valoración por médico especialista en medicina del trabajo + estudios de gabinete.'],
            // Auditoría
            ['div' => 3, 'code' => 'UV-001',             'titulo' => 'Verificación NOM-001',                'descripcion' => 'Verificación de edificios, locales, instalaciones y áreas en los centros de trabajo.',                                                                                                                     'evaluacion' => 'Recorrido in situ + acta circunstanciada + dictamen de cumplimiento.'],
            ['div' => 3, 'code' => 'UV-022',             'titulo' => 'Verificación NOM-022 Eléctricas',     'descripcion' => 'Verificación de electricidad estática en los centros de trabajo: condiciones de seguridad.',                                                                                                               'evaluacion' => 'Medición de resistencia a tierra y emisión de dictamen oficial.'],
            // Seguridad
            ['div' => 4, 'code' => 'NOM-002-STPS-2010', 'titulo' => 'Prevención y Protección contra Incendios', 'descripcion' => 'Diseño e implementación de planes de emergencia, brigadas y sistemas de protección contra incendios.',                                                                                               'evaluacion' => 'Estudio de riesgo de incendio + simulacros + verificación de equipos de protección.'],
            ['div' => 4, 'code' => 'NOM-005-STPS-1998', 'titulo' => 'Manejo de Sustancias Químicas',       'descripcion' => 'Condiciones de seguridad e higiene para el manejo, transporte y almacenamiento de sustancias químicas peligrosas.',                                                                                        'evaluacion' => 'Análisis de riesgo, hojas de datos de seguridad y plan de respuesta a emergencias.'],
            ['div' => 4, 'code' => 'NOM-009-STPS-2011', 'titulo' => 'Trabajos en Altura',                  'descripcion' => 'Condiciones de seguridad para realizar trabajos en altura con equipos de protección personal certificados.',                                                                                                 'evaluacion' => 'Inspección de sistemas anticaídas + certificación de personal.'],
            // Higiene Industrial
            ['div' => 5, 'code' => 'NOM-024-STPS-2001', 'titulo' => 'Vibraciones',                        'descripcion' => 'Reconocimiento de fuentes generadoras de vibraciones: prensas, montacargas, pulidoras, etc. Tipos: cuerpo completo y extremidades superiores.',                                                             'evaluacion' => 'Medición con acelerómetro de lectura directa durante un ciclo de trabajo.'],
            ['div' => 5, 'code' => 'NOM-011-STPS-2001', 'titulo' => 'Ruido',                              'descripcion' => 'Reconocimiento de fuentes emisoras de ruido en el centro de trabajo y su impacto en los trabajadores expuestos.',                                                                                             'evaluacion' => 'Medición con sonómetro y dosimetría personal por jornada laboral completa.'],
            ['div' => 5, 'code' => 'NOM-025-STPS-2008', 'titulo' => 'Iluminación',                        'descripcion' => 'Reconocimiento de áreas y puestos de trabajo donde se requiere evaluar niveles de iluminación.',                                                                                                             'evaluacion' => 'Medición con luxómetro calibrado en plano de trabajo y comparación con la tabla normativa.'],
            ['div' => 5, 'code' => 'NOM-010-STPS-2014', 'titulo' => 'Agentes Químicos Contaminantes',     'descripcion' => 'Reconocimiento de sustancias químicas presentes en el ambiente laboral y rutas de exposición.',                                                                                                               'evaluacion' => 'Muestreo personal con bomba de bajo flujo y análisis en laboratorio acreditado.'],
            // Laboratorio
            ['div' => 6, 'code' => 'LAB-AGUA',          'titulo' => 'Análisis de Calidad de Agua',        'descripcion' => 'Análisis fisicoquímicos y microbiológicos de agua potable, residual y de proceso.',                                                                                                                         'evaluacion' => 'Métodos referenciados en NMX-AA con resultados validados por EMA.'],
            ['div' => 6, 'code' => 'LAB-AIRE',          'titulo' => 'Calidad del Aire',                   'descripcion' => 'Monitoreo perimetral y de fuentes fijas para parámetros normados ambientalmente.',                                                                                                                           'evaluacion' => 'Equipos calibrados con trazabilidad CENAM y análisis acreditado.'],
            // Medio Ambiente
            ['div' => 7, 'code' => 'COA-FEDERAL',       'titulo' => 'Cédula de Operación Anual',          'descripcion' => 'Elaboración y trámite de la COA federal/estatal para establecimientos sujetos a reporte ambiental.',                                                                                                       'evaluacion' => 'Inventario de emisiones, descargas y residuos + carga en plataforma SEMARNAT.'],
            ['div' => 7, 'code' => 'NOM-052-SEMARNAT',  'titulo' => 'Plan de Manejo de Residuos',         'descripcion' => 'Identificación, clasificación y plan de manejo de residuos peligrosos generados en el sitio.',                                                                                                               'evaluacion' => 'Diagnóstico de generación + plan registrado ante SEMARNAT.'],
            // Ergonomía
            ['div' => 8, 'code' => 'NOM-036-1-STPS-2018', 'titulo' => 'Factores de Riesgo Ergonómico',   'descripcion' => 'Identificación y análisis del manejo manual de cargas conforme a la normativa STPS.',                                                                                                                        'evaluacion' => 'Aplicación de las guías de referencia I, II y III según tipo de tarea.'],
            ['div' => 8, 'code' => 'ERG-OFICINA',       'titulo' => 'Ergonomía de Oficina',               'descripcion' => 'Evaluación postural y rediseño de estaciones de trabajo administrativas y home office.',                                                                                                                     'evaluacion' => 'Métodos RULA/REBA + recomendaciones por puesto.'],
        ];

        $svcId = 1;
        $imagenes = [
            // DC-3
            1 => ['https://images.unsplash.com/photo-1552664730-d307ca884978?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1556761175-5973dc0f32e7?w=900&h=600&fit=crop'],
            // NOM-019
            2 => ['https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1556761175-b413da4baf72?w=900&h=600&fit=crop'],
            // NOM-030
            3 => ['https://images.unsplash.com/photo-1573164574572-cb89e39749b4?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=900&h=600&fit=crop'],
            // NOM-035
            4 => ['https://images.unsplash.com/photo-1573497019418-b400bb3ab074?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1542884748-2b87b36c6b90?w=900&h=600&fit=crop'],
            // EMO
            5 => ['https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=900&h=600&fit=crop'],
            // UV-001
            6 => ['https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1504917595217-d4dc5ebe6122?w=900&h=600&fit=crop'],
            // UV-022
            7 => ['https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=900&h=600&fit=crop'],
            // NOM-002
            8 => ['https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1521335629791-ce4aec67dd47?w=900&h=600&fit=crop'],
            // NOM-005
            9 => ['https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=900&h=600&fit=crop'],
            // NOM-009
            10 => ['https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=900&h=600&fit=crop'],
            // Vibraciones
            11 => ['https://images.unsplash.com/photo-1581094794329-c8112a89af12?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?w=900&h=600&fit=crop'],
            // Ruido
            12 => ['https://images.unsplash.com/photo-1487058792275-0ad4aaf24ca7?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1581094288338-2314dddb7ece?w=900&h=600&fit=crop'],
            // Iluminación
            13 => ['https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1497366811353-6870744d04b2?w=900&h=600&fit=crop'],
            // Químicos
            14 => ['https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=900&h=600&fit=crop'],
            // Agua
            15 => ['https://images.unsplash.com/photo-1532634922-8fe0b757fb13?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1581093588401-fbb62a02f120?w=900&h=600&fit=crop'],
            // Aire
            16 => ['https://images.unsplash.com/photo-1611273426858-450d8e3c9fce?w=900&h=600&fit=crop'],
            // COA
            17 => ['https://images.unsplash.com/photo-1466611653911-95081537e5b7?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=900&h=600&fit=crop'],
            // Residuos
            18 => ['https://images.unsplash.com/photo-1532996122724-e3c354a0b15b?w=900&h=600&fit=crop'],
            // NOM-036
            19 => ['https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=900&h=600&fit=crop'],
            // Oficina
            20 => ['https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&h=600&fit=crop', 'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=900&h=600&fit=crop'],
        ];

        foreach ($servicios as $idx => $svc) {
            $this->insert('servicios', [
                'id'          => $svcId,
                'division_id' => $svc['div'],
                'code'        => $svc['code'],
                'titulo'      => $svc['titulo'],
                'descripcion' => $svc['descripcion'],
                'evaluacion'  => $svc['evaluacion'],
                'es_curso'    => 0,
                'orden'       => $idx + 1,
                'activo'      => 1,
                'created_at'  => $now,
                'updated_at'  => $now,
            ]);

            if (isset($imagenes[$svcId])) {
                foreach ($imagenes[$svcId] as $orden => $url) {
                    $this->insert('servicio_imagenes', [
                        'servicio_id' => $svcId,
                        'url'         => $url,
                        'caption'     => $svc['titulo'],
                        'orden'       => $orden,
                    ]);
                }
            }

            $svcId++;
        }
    }

    public function safeDown(): void
    {
        $this->delete('servicio_imagenes');
        $this->delete('servicios');
        $this->delete('divisiones');
    }
}
