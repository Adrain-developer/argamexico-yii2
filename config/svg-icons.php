<?php
/**
 * Librería estática de iconos SVG para el picker de divisiones y servicios.
 *
 * Cada icono se renderiza dentro del escudo ARGA (viewBox="0 0 80 95").
 * El contenido SVG NO incluye el tag <svg> — solo paths, circles, lines, etc.
 * Convenciones: stroke="white", fill="white" (o fill-opacity para rellenos suaves).
 * Área recomendada: x[14-66] y[22-68], centro aprox. en (40, 45).
 *
 * Para agregar un icono nuevo: añadir un elemento al array con las mismas claves.
 */

return [

    /* ═══════════════════════════════════════════════
       SEGURIDAD INDUSTRIAL
    ═══════════════════════════════════════════════ */
    [
        'id'       => 'hardhat',
        'label'    => 'Casco de Seguridad',
        'category' => 'seguridad',
        'svg'      => '<path d="M18 50 Q18 34 40 30 Q62 34 62 50 Z" stroke="white" stroke-width="2" fill="white" fill-opacity=".15"/><path d="M14 50 h52" stroke="white" stroke-width="2.5" stroke-linecap="round"/><rect x="28" y="50" width="24" height="7" rx="2" stroke="white" stroke-width="1.5" fill="none"/><line x1="40" y1="30" x2="40" y2="36" stroke="white" stroke-width="2.2" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'fire-extinguisher',
        'label'    => 'Extintor',
        'category' => 'seguridad',
        'svg'      => '<rect x="33" y="38" width="16" height="22" rx="4" stroke="white" stroke-width="2" fill="none"/><line x1="33" y1="45" x2="24" y2="41" stroke="white" stroke-width="1.8" stroke-linecap="round"/><circle cx="22" cy="40" r="3" stroke="white" stroke-width="1.5" fill="none"/><line x1="41" y1="38" x2="41" y2="32" stroke="white" stroke-width="2" stroke-linecap="round"/><line x1="37" y1="32" x2="47" y2="32" stroke="white" stroke-width="2" stroke-linecap="round"/><line x1="33" y1="59" x2="49" y2="59" stroke="white" stroke-width="2" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'safety-vest',
        'label'    => 'Chaleco de Seguridad',
        'category' => 'seguridad',
        'svg'      => '<path d="M22 30 L30 26 L40 34 L50 26 L58 30 L56 58 L46 58 L46 42 L34 42 L34 58 L24 58 Z" stroke="white" stroke-width="2" fill="white" fill-opacity=".12" stroke-linejoin="round"/><line x1="34" y1="42" x2="46" y2="42" stroke="white" stroke-width="1.5"/><path d="M26 36 Q26 30 28 28" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/><path d="M54 36 Q54 30 52 28" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'eye-protection',
        'label'    => 'Protección Visual',
        'category' => 'seguridad',
        'svg'      => '<path d="M16 44 Q28 32 40 44 Q52 32 64 44 Q52 56 40 44 Q28 56 16 44 Z" stroke="white" stroke-width="2" fill="none"/><circle cx="29" cy="44" r="5" stroke="white" stroke-width="1.8" fill="white" fill-opacity=".2"/><circle cx="51" cy="44" r="5" stroke="white" stroke-width="1.8" fill="white" fill-opacity=".2"/><line x1="14" y1="44" x2="18" y2="44" stroke="white" stroke-width="2" stroke-linecap="round"/><line x1="62" y1="44" x2="66" y2="44" stroke="white" stroke-width="2" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'ear-protection',
        'label'    => 'Protección Auditiva',
        'category' => 'seguridad',
        'svg'      => '<path d="M30 36 Q30 24 40 24 Q50 24 50 36 L50 54 Q50 60 44 60 Q38 60 36 54" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/><path d="M30 54 Q24 54 24 46 Q24 38 30 36" stroke="white" stroke-width="2" fill="none"/><path d="M50 54 Q56 54 56 46 Q56 38 50 36" stroke="white" stroke-width="2" fill="none"/><circle cx="40" cy="34" r="5" stroke="white" stroke-width="1.5" fill="white" fill-opacity=".15"/>',
    ],
    [
        'id'       => 'fall-protection',
        'label'    => 'Protección Anti-Caídas',
        'category' => 'seguridad',
        'svg'      => '<circle cx="40" cy="28" r="5" stroke="white" stroke-width="1.8" fill="none"/><path d="M34 33 L32 48 L26 55" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/><path d="M46 33 L48 48 L54 55" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/><path d="M34 40 h12" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M22 24 L26 28 L22 32" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/><line x1="22" y1="28" x2="40" y2="28" stroke="white" stroke-width="1.5" stroke-dasharray="2,2"/>',
    ],
    [
        'id'       => 'gloves',
        'label'    => 'Guantes de Seguridad',
        'category' => 'seguridad',
        'svg'      => '<path d="M26 58 L26 36 Q26 32 30 32 Q32 32 32 36 L32 38 L32 34 Q32 30 36 30 Q40 30 40 34 L40 36 L40 34 Q40 30 44 30 Q46 30 46 34 L46 36 Q46 32 48 32 Q52 32 52 36 L52 48 Q52 56 46 58 Z" stroke="white" stroke-width="1.8" fill="white" fill-opacity=".12" stroke-linejoin="round"/><line x1="32" y1="38" x2="32" y2="45" stroke="white" stroke-width="1" opacity=".5"/><line x1="40" y1="36" x2="40" y2="45" stroke="white" stroke-width="1" opacity=".5"/><line x1="46" y1="36" x2="46" y2="45" stroke="white" stroke-width="1" opacity=".5"/>',
    ],
    [
        'id'       => 'warning',
        'label'    => 'Señal de Advertencia',
        'category' => 'seguridad',
        'svg'      => '<path d="M40 24 L62 62 L18 62 Z" stroke="white" stroke-width="2.2" fill="white" fill-opacity=".12" stroke-linejoin="round"/><line x1="40" y1="34" x2="40" y2="50" stroke="white" stroke-width="2.5" stroke-linecap="round"/><circle cx="40" cy="56" r="2.5" fill="white"/>',
    ],
    [
        'id'       => 'emergency-exit',
        'label'    => 'Salida de Emergencia',
        'category' => 'seguridad',
        'svg'      => '<rect x="20" y="28" width="40" height="30" rx="2" stroke="white" stroke-width="1.8" fill="none"/><path d="M34 44 L28 44 L28 36 L38 36 L38 40" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/><path d="M44 44 L50 44 L50 40 L46 38 L42 40 L42 44 Z" stroke="white" stroke-width="1.5" fill="white" fill-opacity=".2" stroke-linejoin="round"/><path d="M50 36 L56 36" stroke="white" stroke-width="1.5" stroke-linecap="round"/><path d="M53 33 L56 36 L53 39" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><line x1="20" y1="58" x2="60" y2="58" stroke="white" stroke-width="2"/>',
    ],
    [
        'id'       => 'fire-alarm',
        'label'    => 'Alarma de Incendio',
        'category' => 'seguridad',
        'svg'      => '<circle cx="40" cy="44" r="16" stroke="white" stroke-width="2" fill="none"/><circle cx="40" cy="44" r="9" stroke="white" stroke-width="1.5" fill="white" fill-opacity=".15"/><path d="M40 35 v-6 M40 59 v6 M31 44 h-6 M55 44 h6" stroke="white" stroke-width="1.5" stroke-linecap="round"/><path d="M34 38 l-4-4 M50 50 l4 4 M46 38 l4-4 M34 50 l-4 4" stroke="white" stroke-width="1.5" stroke-linecap="round"/>',
    ],

    /* ═══════════════════════════════════════════════
       SALUD OCUPACIONAL
    ═══════════════════════════════════════════════ */
    [
        'id'       => 'heartbeat',
        'label'    => 'Latido / ECG',
        'category' => 'salud',
        'svg'      => '<path d="M18 46 h10 l4-10 6 18 4-14 4 10 h16" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round" stroke-linejoin="round"/><path d="M30 36 Q30 28 40 28 Q50 28 50 36 Q50 46 40 56 Q30 46 30 36 Z" stroke="white" stroke-width="1.5" fill="white" fill-opacity=".1"/>',
    ],
    [
        'id'       => 'first-aid',
        'label'    => 'Primeros Auxilios',
        'category' => 'salud',
        'svg'      => '<rect x="22" y="28" width="36" height="36" rx="4" stroke="white" stroke-width="2" fill="white" fill-opacity=".12"/><rect x="36" y="32" width="8" height="28" rx="2" fill="white" fill-opacity=".8"/><rect x="26" y="40" width="28" height="8" rx="2" fill="white" fill-opacity=".8"/>',
    ],
    [
        'id'       => 'stethoscope',
        'label'    => 'Estetoscopio',
        'category' => 'salud',
        'svg'      => '<circle cx="40" cy="55" r="6" stroke="white" stroke-width="2" fill="none"/><path d="M28 26 Q24 26 24 32 L24 44 Q24 55 34 55" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/><path d="M52 26 Q56 26 56 32 L56 44 Q56 55 46 55" stroke="white" stroke-width="2.2" fill="none" stroke-linecap="round"/><line x1="28" y1="24" x2="28" y2="28" stroke="white" stroke-width="2" stroke-linecap="round"/><line x1="52" y1="24" x2="52" y2="28" stroke="white" stroke-width="2" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'syringe',
        'label'    => 'Jeringa / Vacuna',
        'category' => 'salud',
        'svg'      => '<line x1="25" y1="25" x2="55" y2="55" stroke="white" stroke-width="2.2" stroke-linecap="round"/><rect x="34" y="28" width="22" height="10" rx="2" transform="rotate(45 34 28)" stroke="white" stroke-width="1.8" fill="none"/><path d="M46 46 L56 56 L52 60 L42 50" stroke="white" stroke-width="1.5" fill="none" stroke-linejoin="round"/><line x1="29" y1="29" x2="24" y2="24" stroke="white" stroke-width="1.5" stroke-linecap="round"/><line x1="34" y1="34" x2="30" y2="26" stroke="white" stroke-width="1.2" stroke-linecap="round" opacity=".6"/>',
    ],
    [
        'id'       => 'microscope',
        'label'    => 'Microscopio',
        'category' => 'salud',
        'svg'      => '<rect x="36" y="24" width="8" height="14" rx="2" stroke="white" stroke-width="1.8" fill="none"/><rect x="32" y="36" width="16" height="8" rx="2" stroke="white" stroke-width="1.8" fill="none"/><line x1="40" y1="44" x2="40" y2="54" stroke="white" stroke-width="2" stroke-linecap="round"/><ellipse cx="40" cy="56" rx="12" ry="4" stroke="white" stroke-width="1.8" fill="none"/><line x1="28" y1="56" x2="26" y2="60" stroke="white" stroke-width="1.8" stroke-linecap="round"/><line x1="52" y1="56" x2="54" y2="60" stroke="white" stroke-width="1.8" stroke-linecap="round"/><line x1="28" y1="36" x2="22" y2="30" stroke="white" stroke-width="1.5" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'lungs',
        'label'    => 'Pulmones',
        'category' => 'salud',
        'svg'      => '<path d="M40 24 L40 44" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M40 32 Q32 32 26 36 Q18 42 20 52 Q22 60 30 60 Q38 60 40 52" stroke="white" stroke-width="2" fill="white" fill-opacity=".1" stroke-linecap="round"/><path d="M40 32 Q48 32 54 36 Q62 42 60 52 Q58 60 50 60 Q42 60 40 52" stroke="white" stroke-width="2" fill="white" fill-opacity=".1" stroke-linecap="round"/>',
    ],

    /* ═══════════════════════════════════════════════
       PROTECCIÓN AMBIENTAL
    ═══════════════════════════════════════════════ */
    [
        'id'       => 'leaf',
        'label'    => 'Hoja / Naturaleza',
        'category' => 'ambiente',
        'svg'      => '<path d="M40 60 Q40 40 55 30 Q55 48 40 60 Z" fill="white" fill-opacity=".9"/><path d="M40 60 Q40 40 25 30 Q25 48 40 60 Z" fill="white" fill-opacity=".5"/><circle cx="40" cy="28" r="5" fill="white" fill-opacity=".7"/><line x1="40" y1="60" x2="40" y2="68" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M30 68 Q40 64 50 68" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'water-drop',
        'label'    => 'Gota de Agua',
        'category' => 'ambiente',
        'svg'      => '<path d="M40 24 Q50 36 54 46 Q54 58 40 58 Q26 58 26 46 Q26 36 40 24 Z" stroke="white" stroke-width="2" fill="white" fill-opacity=".15" stroke-linecap="round" stroke-linejoin="round"/><path d="M34 50 Q32 46 34 42" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round" opacity=".7"/>',
    ],
    [
        'id'       => 'recycling',
        'label'    => 'Reciclaje',
        'category' => 'ambiente',
        'svg'      => '<path d="M40 24 L47 36 L33 36 Z" stroke="white" stroke-width="1.5" fill="white" fill-opacity=".6" stroke-linejoin="round"/><path d="M40 24 Q55 24 62 38 L55 42" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/><path d="M62 38 L56 30" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/><path d="M20 58 L14 46 L24 42 Z" stroke="white" stroke-width="1.5" fill="white" fill-opacity=".6" stroke-linejoin="round" transform="rotate(120 34 50)"/><path d="M60 58 L52 62 L48 52 Z" stroke="white" stroke-width="1.5" fill="white" fill-opacity=".6" stroke-linejoin="round" transform="rotate(240 46 57)"/><path d="M18 42 Q16 56 28 62" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/><path d="M52 62 Q64 58 62 44" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'factory',
        'label'    => 'Fábrica / Industria',
        'category' => 'ambiente',
        'svg'      => '<rect x="18" y="44" width="44" height="18" rx="1" stroke="white" stroke-width="1.8" fill="none"/><path d="M18 44 L18 32 L30 44" stroke="white" stroke-width="1.5" fill="none" stroke-linejoin="round"/><path d="M30 44 L30 32 L42 44" stroke="white" stroke-width="1.5" fill="none" stroke-linejoin="round"/><rect x="34" y="26" width="8" height="18" rx="1" stroke="white" stroke-width="1.5" fill="none"/><rect x="44" y="26" width="8" height="18" rx="1" stroke="white" stroke-width="1.5" fill="none"/><path d="M34 24 Q34 20 38 20" stroke="white" stroke-width="1.2" fill="none" stroke-linecap="round" opacity=".5"/><path d="M44 22 Q44 18 48 18" stroke="white" stroke-width="1.2" fill="none" stroke-linecap="round" opacity=".5"/><rect x="26" y="52" width="8" height="10" rx="1" stroke="white" stroke-width="1.5" fill="none"/><rect x="46" y="52" width="8" height="10" rx="1" stroke="white" stroke-width="1.5" fill="none"/>',
    ],
    [
        'id'       => 'globe',
        'label'    => 'Planeta / Tierra',
        'category' => 'ambiente',
        'svg'      => '<circle cx="40" cy="44" r="20" stroke="white" stroke-width="2" fill="none"/><ellipse cx="40" cy="44" rx="10" ry="20" stroke="white" stroke-width="1.5" fill="none"/><line x1="20" y1="44" x2="60" y2="44" stroke="white" stroke-width="1.5"/><path d="M22 34 Q40 30 58 34" stroke="white" stroke-width="1.2" fill="none"/><path d="M22 54 Q40 58 58 54" stroke="white" stroke-width="1.2" fill="none"/>',
    ],

    /* ═══════════════════════════════════════════════
       CAPACITACIÓN Y FORMACIÓN
    ═══════════════════════════════════════════════ */
    [
        'id'       => 'book',
        'label'    => 'Libro Abierto',
        'category' => 'capacitacion',
        'svg'      => '<path d="M24 35 Q40 30 40 30 Q40 30 56 35 L56 58 Q40 53 40 53 Q40 53 24 58 Z" stroke="white" stroke-width="2" fill="none" stroke-linejoin="round"/><line x1="40" y1="30" x2="40" y2="53" stroke="white" stroke-width="2"/><path d="M28 40 Q34 38 38 39M28 45 Q34 43 38 44M28 50 Q34 48 38 49" stroke="white" stroke-width="1.2" stroke-linecap="round" opacity=".8"/><path d="M42 39 Q46 38 52 40M42 44 Q46 43 52 45M42 49 Q46 48 52 50" stroke="white" stroke-width="1.2" stroke-linecap="round" opacity=".8"/>',
    ],
    [
        'id'       => 'certificate',
        'label'    => 'Certificado / Diploma',
        'category' => 'capacitacion',
        'svg'      => '<rect x="18" y="28" width="44" height="32" rx="3" stroke="white" stroke-width="2" fill="none"/><line x1="26" y1="38" x2="54" y2="38" stroke="white" stroke-width="1.5" stroke-linecap="round"/><line x1="26" y1="44" x2="54" y2="44" stroke="white" stroke-width="1.5" stroke-linecap="round"/><line x1="26" y1="50" x2="40" y2="50" stroke="white" stroke-width="1.5" stroke-linecap="round"/><circle cx="52" cy="52" r="6" stroke="white" stroke-width="1.5" fill="none"/><path d="M49 52 L51 54 L55 50" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/><line x1="49" y1="58" x2="47" y2="63" stroke="white" stroke-width="1.5" stroke-linecap="round"/><line x1="55" y1="58" x2="57" y2="63" stroke="white" stroke-width="1.5" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'graduation',
        'label'    => 'Birrete / Graduación',
        'category' => 'capacitacion',
        'svg'      => '<path d="M18 40 L40 30 L62 40 L40 50 Z" stroke="white" stroke-width="2" fill="white" fill-opacity=".15" stroke-linejoin="round"/><path d="M52 45 L52 57 Q46 62 40 62 Q34 62 28 57 L28 45" stroke="white" stroke-width="2" fill="none" stroke-linecap="round"/><line x1="62" y1="40" x2="62" y2="52" stroke="white" stroke-width="2" stroke-linecap="round"/><circle cx="62" cy="55" r="3" fill="white"/>',
    ],
    [
        'id'       => 'presentation',
        'label'    => 'Presentación / Pizarrón',
        'category' => 'capacitacion',
        'svg'      => '<rect x="18" y="26" width="44" height="30" rx="3" stroke="white" stroke-width="2" fill="none"/><line x1="40" y1="56" x2="40" y2="64" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M30 64 h20" stroke="white" stroke-width="2" stroke-linecap="round"/><polyline points="26,46 33,36 40,42 47,32 54,40" stroke="white" stroke-width="1.8" fill="none" stroke-linecap="round" stroke-linejoin="round"/>',
    ],

    /* ═══════════════════════════════════════════════
       HIGIENE INDUSTRIAL
    ═══════════════════════════════════════════════ */
    [
        'id'       => 'gauge',
        'label'    => 'Medidor / Indicador',
        'category' => 'higiene',
        'svg'      => '<circle cx="40" cy="48" r="18" stroke="white" stroke-width="2" fill="none"/><path d="M26 54 A16 16 0 0 1 54 54" stroke="white" stroke-width="1.5" fill="none"/><line x1="26" y1="54" x2="24" y2="56" stroke="white" stroke-width="1.5" stroke-linecap="round"/><line x1="32" y1="40" x2="31" y2="38" stroke="white" stroke-width="1.5" stroke-linecap="round"/><line x1="40" y1="36" x2="40" y2="34" stroke="white" stroke-width="1.5" stroke-linecap="round"/><line x1="48" y1="40" x2="49" y2="38" stroke="white" stroke-width="1.5" stroke-linecap="round"/><line x1="54" y1="54" x2="56" y2="56" stroke="white" stroke-width="1.5" stroke-linecap="round"/><line x1="40" y1="48" x2="30" y2="40" stroke="white" stroke-width="2" stroke-linecap="round"/><circle cx="40" cy="48" r="2.5" fill="white"/>',
    ],
    [
        'id'       => 'chemistry',
        'label'    => 'Química / Flask',
        'category' => 'higiene',
        'svg'      => '<path d="M34 24 L34 40 L22 58 Q20 62 26 62 L54 62 Q60 62 58 58 L46 40 L46 24 Z" stroke="white" stroke-width="2" fill="white" fill-opacity=".12" stroke-linejoin="round"/><line x1="34" y1="24" x2="46" y2="24" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M26 54 Q30 50 34 54 Q38 58 42 54 Q46 50 50 54" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round" opacity=".8"/><circle cx="32" cy="52" r="2" fill="white" fill-opacity=".5"/><circle cx="44" cy="58" r="1.5" fill="white" fill-opacity=".4"/>',
    ],
    [
        'id'       => 'vibration',
        'label'    => 'Vibración / Ondas',
        'category' => 'higiene',
        'svg'      => '<path d="M14 44 Q18 32 22 44 Q26 56 30 44 Q34 32 40 44 Q46 56 50 44 Q54 32 58 44 Q62 56 66 44" stroke="white" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"/><line x1="14" y1="56" x2="66" y2="56" stroke="white" stroke-width="1" opacity=".3"/>',
    ],
    [
        'id'       => 'thermometer',
        'label'    => 'Temperatura',
        'category' => 'higiene',
        'svg'      => '<rect x="36" y="26" width="8" height="28" rx="4" stroke="white" stroke-width="2" fill="none"/><circle cx="40" cy="58" r="6" stroke="white" stroke-width="2" fill="white" fill-opacity=".3"/><line x1="40" y1="54" x2="40" y2="36" stroke="white" stroke-width="3" stroke-linecap="round" fill="white"/><line x1="44" y1="34" x2="48" y2="34" stroke="white" stroke-width="1.5" stroke-linecap="round"/><line x1="44" y1="38" x2="46" y2="38" stroke="white" stroke-width="1.5" stroke-linecap="round"/><line x1="44" y1="42" x2="48" y2="42" stroke="white" stroke-width="1.5" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'dust-mask',
        'label'    => 'Mascarilla / EPR',
        'category' => 'higiene',
        'svg'      => '<path d="M20 38 Q20 30 40 28 Q60 30 60 38 L58 52 Q50 60 40 60 Q30 60 22 52 Z" stroke="white" stroke-width="2" fill="white" fill-opacity=".12" stroke-linecap="round"/><path d="M26 36 L14 34" stroke="white" stroke-width="1.5" stroke-linecap="round"/><path d="M54 36 L66 34" stroke="white" stroke-width="1.5" stroke-linecap="round"/><path d="M30 48 Q40 52 50 48" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/><line x1="36" y1="44" x2="44" y2="44" stroke="white" stroke-width="1.5" stroke-linecap="round" opacity=".6"/>',
    ],

    /* ═══════════════════════════════════════════════
       AUDITORÍA E INSPECCIÓN
    ═══════════════════════════════════════════════ */
    [
        'id'       => 'clipboard-check',
        'label'    => 'Lista de Verificación',
        'category' => 'auditoria',
        'svg'      => '<rect x="22" y="30" width="36" height="34" rx="3" stroke="white" stroke-width="2" fill="none"/><rect x="32" y="26" width="16" height="8" rx="3" stroke="white" stroke-width="1.8" fill="none"/><path d="M30 42 l3 3 6-6" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><line x1="42" y1="44" x2="50" y2="44" stroke="white" stroke-width="1.5" stroke-linecap="round"/><path d="M30 50 l3 3 6-6" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><line x1="42" y1="52" x2="50" y2="52" stroke="white" stroke-width="1.5" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'magnifier',
        'label'    => 'Lupa / Inspección',
        'category' => 'auditoria',
        'svg'      => '<circle cx="36" cy="38" r="14" stroke="white" stroke-width="2.2" fill="none"/><line x1="46" y1="48" x2="58" y2="60" stroke="white" stroke-width="3" stroke-linecap="round"/><circle cx="36" cy="38" r="8" stroke="white" stroke-width="1" fill="white" fill-opacity=".1"/><path d="M30 34 Q34 30 38 32" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round" opacity=".6"/>',
    ],
    [
        'id'       => 'balance',
        'label'    => 'Balanza / Equidad',
        'category' => 'auditoria',
        'svg'      => '<line x1="40" y1="26" x2="40" y2="62" stroke="white" stroke-width="2" stroke-linecap="round"/><line x1="24" y1="34" x2="56" y2="34" stroke="white" stroke-width="2" stroke-linecap="round"/><circle cx="24" cy="34" r="2" fill="white"/><circle cx="56" cy="34" r="2" fill="white"/><path d="M18 34 L14 44 Q18 48 24 46 Q30 44 26 34" stroke="white" stroke-width="1.5" fill="white" fill-opacity=".15" stroke-linecap="round"/><path d="M62 34 L58 44 Q62 48 68 46 Q74 44 70 34" stroke="white" stroke-width="1.5" fill="white" fill-opacity=".15" stroke-linecap="round"/><line x1="30" y1="62" x2="50" y2="62" stroke="white" stroke-width="2" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'lock',
        'label'    => 'Candado / Seguridad',
        'category' => 'auditoria',
        'svg'      => '<rect x="26" y="42" width="28" height="20" rx="3" stroke="white" stroke-width="2" fill="none"/><path d="M30 42 V35 Q30 26 40 26 Q50 26 50 35 V42" stroke="white" stroke-width="2" fill="none"/><circle cx="40" cy="51" r="3" fill="white"/><line x1="40" y1="54" x2="40" y2="58" stroke="white" stroke-width="2" stroke-linecap="round"/>',
    ],

    /* ═══════════════════════════════════════════════
       ERGONOMÍA
    ═══════════════════════════════════════════════ */
    [
        'id'       => 'workstation',
        'label'    => 'Estación de Trabajo',
        'category' => 'ergonomia',
        'svg'      => '<rect x="28" y="38" width="24" height="14" rx="3" stroke="white" stroke-width="1.8" fill="none"/><circle cx="40" cy="31" r="5" stroke="white" stroke-width="1.8" fill="none"/><line x1="40" y1="52" x2="40" y2="62" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M28 62 h24" stroke="white" stroke-width="2" stroke-linecap="round"/><line x1="28" y1="38" x2="22" y2="50" stroke="white" stroke-width="1.8" stroke-linecap="round"/>',
    ],
    [
        'id'       => 'lifting',
        'label'    => 'Levantamiento de Cargas',
        'category' => 'ergonomia',
        'svg'      => '<circle cx="40" cy="28" r="5" stroke="white" stroke-width="1.8" fill="none"/><path d="M40 33 L40 48" stroke="white" stroke-width="2" stroke-linecap="round"/><path d="M40 40 L30 36 L24 40" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M40 40 L50 36 L56 40" stroke="white" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><path d="M34 48 L32 60" stroke="white" stroke-width="1.8" stroke-linecap="round"/><path d="M46 48 L48 60" stroke="white" stroke-width="1.8" stroke-linecap="round"/><rect x="28" y="28" width="24" height="8" rx="2" stroke="white" stroke-width="1.5" fill="white" fill-opacity=".2"/>',
    ],
    [
        'id'       => 'spine',
        'label'    => 'Columna / Postura',
        'category' => 'ergonomia',
        'svg'      => '<path d="M40 24 Q36 30 40 36 Q44 42 40 48 Q36 54 40 60" stroke="white" stroke-width="2.5" fill="none" stroke-linecap="round"/><ellipse cx="40" cy="28" rx="6" ry="4" stroke="white" stroke-width="1.5" fill="none"/><ellipse cx="40" cy="36" rx="6" ry="4" stroke="white" stroke-width="1.5" fill="none"/><ellipse cx="40" cy="44" rx="6" ry="4" stroke="white" stroke-width="1.5" fill="none"/><ellipse cx="40" cy="52" rx="6" ry="4" stroke="white" stroke-width="1.5" fill="none"/>',
    ],

    /* ═══════════════════════════════════════════════
       PATRIMONIO / EMERGENCIAS
    ═══════════════════════════════════════════════ */
    [
        'id'       => 'shield-check',
        'label'    => 'Seguridad Patrimonial',
        'category' => 'patrimonio',
        'svg'      => '<path d="M20 36 Q20 26 40 24 Q60 26 60 36 L60 52 Q54 64 40 68 Q26 64 20 52 Z" stroke="white" stroke-width="2" fill="white" fill-opacity=".1"/><path d="M30 46 l6 6 14-14" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>',
    ],
    [
        'id'       => 'ambulance',
        'label'    => 'Emergencias / Ambulancia',
        'category' => 'patrimonio',
        'svg'      => '<rect x="16" y="40" width="48" height="24" rx="3" stroke="white" stroke-width="2" fill="none"/><path d="M42 40 L42 34 Q42 28 50 28 L60 28 Q64 28 64 34 L64 40" stroke="white" stroke-width="1.8" fill="none" stroke-linejoin="round"/><circle cx="26" cy="64" r="5" stroke="white" stroke-width="2" fill="none"/><circle cx="54" cy="64" r="5" stroke="white" stroke-width="2" fill="none"/><line x1="28" y1="50" x2="36" y2="50" stroke="white" stroke-width="2" stroke-linecap="round"/><line x1="32" y1="46" x2="32" y2="54" stroke="white" stroke-width="2" stroke-linecap="round"/><line x1="44" y1="46" x2="56" y2="46" stroke="white" stroke-width="1.5" stroke-linecap="round" opacity=".6"/><line x1="44" y1="51" x2="56" y2="51" stroke="white" stroke-width="1.5" stroke-linecap="round" opacity=".6"/>',
    ],
    [
        'id'       => 'radio-comm',
        'label'    => 'Comunicación / Radio',
        'category' => 'patrimonio',
        'svg'      => '<rect x="32" y="36" width="16" height="26" rx="4" stroke="white" stroke-width="2" fill="none"/><line x1="40" y1="36" x2="40" y2="28" stroke="white" stroke-width="2.5" stroke-linecap="round"/><line x1="36" y1="44" x2="44" y2="44" stroke="white" stroke-width="1.5" stroke-linecap="round"/><circle cx="40" cy="52" r="4" stroke="white" stroke-width="1.5" fill="none"/><path d="M28 32 Q24 38 26 44" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/><path d="M52 32 Q56 38 54 44" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round"/>',
    ],

];
