<?php
/**
 * Widget reutilizable: selector visual de iconos SVG.
 *
 * Variables esperadas (pasadas via $this->render() o include):
 *   $fieldId      string  ID del <input hidden> que almacena el SVG (ej. 'divisiones-icon_svg')
 *   $fieldName    string  name del input (ej. 'Divisiones[icon_svg]')
 *   $currentValue string  Valor actual de icon_svg (puede estar vacío)
 *   $optional     bool    Si es true, muestra opción "Sin ícono / usar el de la división"
 *   $shieldColor  string  'teal' o 'red' — color de preview (default 'teal')
 */

$icons      = require Yii::getAlias('@app/config/svg-icons.php');
$optional   = $optional ?? false;
$shieldColor = $shieldColor ?? 'teal';
$widgetId   = 'ip_' . preg_replace('/[^a-z0-9]/i', '_', $fieldId);

/* Categorías disponibles */
$categories = [
    'all'          => 'Todos',
    'seguridad'    => 'Seguridad',
    'salud'        => 'Salud',
    'ambiente'     => 'Ambiente',
    'capacitacion' => 'Capacitación',
    'higiene'      => 'Higiene',
    'auditoria'    => 'Auditoría',
    'ergonomia'    => 'Ergonomía',
    'patrimonio'   => 'Patrimonio',
];

/* Gradiente del escudo en el picker (igual que en el sitio) */
$gradId   = $widgetId . '_grad';
$gradStop = $shieldColor === 'red'
    ? ['#C0392B', '#922B21']
    : ['#0E5E8A', '#1C2B5E'];

$shieldPath = 'M6,0 L74,0 Q80,0 80,6 L80,62 L40,95 L0,62 L0,6 Q0,0 6,0 Z';
?>

<style>
.ip-wrap       { border:1px solid #dee2e6; border-radius:10px; padding:16px; background:#fafafa; }
.ip-preview    { display:flex; align-items:center; gap:14px; margin-bottom:14px; padding:12px 14px;
                 background:#fff; border:1px solid #dee2e6; border-radius:8px; }
.ip-prev-lbl   { font-size:.82rem; color:#6c757d; line-height:1.3; }
.ip-prev-name  { font-weight:600; color:#1C2B5E; font-size:.9rem; }
.ip-filter-bar { display:flex; flex-wrap:wrap; gap:4px; margin-bottom:12px; }
.ip-filter-btn { padding:4px 12px; border:1px solid #dee2e6; background:#fff; border-radius:20px;
                 font-size:.78rem; font-weight:500; cursor:pointer; color:#495057;
                 transition:all .15s; white-space:nowrap; }
.ip-filter-btn:hover  { border-color:#0E5E8A; color:#0E5E8A; }
.ip-filter-btn.active { background:#0E5E8A; color:#fff; border-color:#0E5E8A; }
.ip-grid       { display:grid; grid-template-columns:repeat(auto-fill, minmax(76px, 1fr)); gap:8px;
                 max-height:340px; overflow-y:auto; padding:4px 2px; }
.ip-item       { display:flex; flex-direction:column; align-items:center; gap:4px;
                 padding:6px 4px; border-radius:8px; cursor:pointer; border:2px solid transparent;
                 transition:all .15s; background:#fff; }
.ip-item:hover { border-color:#0E5E8A22; background:#f0f7ff; }
.ip-item.selected { border-color:#0E5E8A; background:#e8f2ff; }
.ip-item-lbl   { font-size:.65rem; color:#495057; text-align:center; line-height:1.2;
                 max-width:72px; word-break:break-word; }
.ip-item.selected .ip-item-lbl { color:#0E5E8A; font-weight:600; }
.ip-none-item  { border-color:#dee2e6 !important; }
.ip-none-item:hover { border-color:#6c757d !important; background:#f8f9fa !important; }
.ip-none-item.selected { border-color:#6c757d !important; background:#f8f9fa !important; }
.ip-custom-toggle { font-size:.8rem; color:#0E5E8A; cursor:pointer; background:none; border:none;
                    padding:0; margin-top:10px; display:inline-flex; align-items:center; gap:4px; }
.ip-custom-toggle:hover { text-decoration:underline; }
.ip-custom-area { margin-top:10px; display:none; }
.ip-custom-area textarea { font-family:monospace; font-size:.8rem; }
</style>

<div class="ip-wrap" id="<?= $widgetId ?>">

  <!-- Hidden input real del formulario -->
  <input type="hidden"
         id="<?= htmlspecialchars($fieldId) ?>"
         name="<?= htmlspecialchars($fieldName) ?>"
         value="<?= htmlspecialchars($currentValue) ?>">

  <!-- Preview del icono seleccionado -->
  <div class="ip-preview">
    <svg id="<?= $widgetId ?>_prev"
         viewBox="0 0 80 95" width="54" height="64" fill="none" aria-hidden="true">
      <defs>
        <linearGradient id="<?= $gradId ?>" x1="0" y1="0" x2="0" y2="1">
          <stop offset="0%" stop-color="<?= $gradStop[0] ?>"/>
          <stop offset="100%" stop-color="<?= $gradStop[1] ?>"/>
        </linearGradient>
      </defs>
      <path d="<?= $shieldPath ?>" fill="url(#<?= $gradId ?>)"/>
      <g id="<?= $widgetId ?>_prev_icon"><?= $currentValue ?></g>
    </svg>
    <div>
      <div class="ip-prev-lbl">Ícono seleccionado</div>
      <div class="ip-prev-name" id="<?= $widgetId ?>_prev_name">
        <?php
          if (!$currentValue) {
              echo $optional ? '<em class="text-muted">Sin ícono (hereda de la división)</em>' : '<em class="text-muted">Selecciona un ícono</em>';
          } else {
              $found = false;
              foreach ($icons as $ic) {
                  if (trim($ic['svg']) === trim($currentValue)) {
                      echo htmlspecialchars($ic['label']);
                      $found = true;
                      break;
                  }
              }
              if (!$found) echo '<em class="text-muted">SVG personalizado</em>';
          }
        ?>
      </div>
    </div>
  </div>

  <!-- Filtros de categoría -->
  <div class="ip-filter-bar" role="group" aria-label="Filtrar iconos">
    <?php foreach ($categories as $catKey => $catLabel): ?>
      <button type="button"
              class="ip-filter-btn<?= $catKey === 'all' ? ' active' : '' ?>"
              data-cat="<?= $catKey ?>">
        <?= htmlspecialchars($catLabel) ?>
      </button>
    <?php endforeach; ?>
  </div>

  <!-- Grid de iconos -->
  <div class="ip-grid" role="listbox" aria-label="Selecciona un ícono">

    <?php if ($optional): ?>
    <div class="ip-item ip-none-item<?= !$currentValue ? ' selected' : '' ?>"
         role="option"
         aria-selected="<?= !$currentValue ? 'true' : 'false' ?>"
         data-cat="all"
         data-svg=""
         data-label="Sin ícono">
      <svg viewBox="0 0 80 95" width="52" height="62" fill="none" aria-hidden="true">
        <path d="<?= $shieldPath ?>" fill="#dee2e6"/>
        <line x1="28" y1="35" x2="52" y2="60" stroke="#adb5bd" stroke-width="4" stroke-linecap="round"/>
        <line x1="52" y1="35" x2="28" y2="60" stroke="#adb5bd" stroke-width="4" stroke-linecap="round"/>
      </svg>
      <span class="ip-item-lbl">Sin ícono</span>
    </div>
    <?php endif; ?>

    <?php foreach ($icons as $ic): ?>
    <?php
      $isSelected = trim($currentValue) === trim($ic['svg']);
    ?>
    <div class="ip-item<?= $isSelected ? ' selected' : '' ?>"
         role="option"
         aria-selected="<?= $isSelected ? 'true' : 'false' ?>"
         data-cat="all <?= htmlspecialchars($ic['category']) ?>"
         data-svg="<?= htmlspecialchars($ic['svg'], ENT_QUOTES) ?>"
         data-label="<?= htmlspecialchars($ic['label'], ENT_QUOTES) ?>">
      <svg viewBox="0 0 80 95" width="52" height="62" fill="none" aria-hidden="true">
        <defs>
          <linearGradient id="<?= $gradId ?>_<?= $ic['id'] ?>" x1="0" y1="0" x2="0" y2="1">
            <stop offset="0%" stop-color="<?= $gradStop[0] ?>"/>
            <stop offset="100%" stop-color="<?= $gradStop[1] ?>"/>
          </linearGradient>
        </defs>
        <path d="<?= $shieldPath ?>" fill="url(#<?= $gradId ?>_<?= $ic['id'] ?>)"/>
        <?= $ic['svg'] ?>
      </svg>
      <span class="ip-item-lbl"><?= htmlspecialchars($ic['label']) ?></span>
    </div>
    <?php endforeach; ?>

  </div>

  <!-- Toggle SVG personalizado (modo avanzado) -->
  <button type="button" class="ip-custom-toggle" id="<?= $widgetId ?>_customBtn">
    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" aria-hidden="true">
      <path d="M2 2 l8 0 M2 6 l6 0 M2 10 l4 0" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
    </svg>
    SVG personalizado (avanzado)
  </button>
  <div class="ip-custom-area" id="<?= $widgetId ?>_customArea">
    <label class="form-label mb-1" style="font-size:.8rem;color:#6c757d;">
      Pega el contenido SVG interno del escudo (sin el tag &lt;svg&gt;). Usa <code>stroke="white"</code>.
    </label>
    <textarea id="<?= $widgetId ?>_customTxt"
              class="form-control font-monospace"
              rows="4"
              placeholder='Elementos SVG internos del escudo (sin el tag &lt;svg&gt;). Usa stroke="white".'><?= htmlspecialchars($currentValue) ?></textarea>
    <button type="button" class="btn btn-sm btn-outline-secondary mt-2" id="<?= $widgetId ?>_customApply">
      Aplicar SVG personalizado
    </button>
  </div>

</div>

<script>
(function () {
  var W       = document.getElementById('<?= $widgetId ?>');
  var hidden  = document.getElementById('<?= htmlspecialchars($fieldId) ?>');
  var prevSvg = document.getElementById('<?= $widgetId ?>_prev_icon');
  var prevNm  = document.getElementById('<?= $widgetId ?>_prev_name');
  var items   = W.querySelectorAll('.ip-item');
  var filters = W.querySelectorAll('.ip-filter-btn');

  /* ── Selección de ícono ─────────────────────────── */
  function selectItem(el) {
    items.forEach(function (i) {
      i.classList.remove('selected');
      i.setAttribute('aria-selected', 'false');
    });
    el.classList.add('selected');
    el.setAttribute('aria-selected', 'true');

    var svg   = el.dataset.svg;
    var label = el.dataset.label;

    hidden.value     = svg;
    prevSvg.innerHTML = svg;
    prevNm.innerHTML  = svg
      ? '<span>' + label.replace(/</g,'&lt;') + '</span>'
      : '<em style="color:#6c757d"><?= $optional ? 'Sin ícono (hereda de la división)' : 'Selecciona un ícono' ?></em>';

    /* Sincronizar textarea de SVG personalizado */
    var txtArea = document.getElementById('<?= $widgetId ?>_customTxt');
    if (txtArea) txtArea.value = svg;
  }

  items.forEach(function (el) {
    el.addEventListener('click', function () { selectItem(el); });
  });

  /* ── Filtrado por categoría ─────────────────────── */
  filters.forEach(function (btn) {
    btn.addEventListener('click', function () {
      filters.forEach(function (b) { b.classList.remove('active'); });
      btn.classList.add('active');

      var cat = btn.dataset.cat;
      items.forEach(function (el) {
        var cats = (el.dataset.cat || '').split(' ');
        el.style.display = (cat === 'all' || cats.indexOf(cat) !== -1) ? '' : 'none';
      });
    });
  });

  /* ── SVG personalizado ──────────────────────────── */
  var customBtn   = document.getElementById('<?= $widgetId ?>_customBtn');
  var customArea  = document.getElementById('<?= $widgetId ?>_customArea');
  var customTxt   = document.getElementById('<?= $widgetId ?>_customTxt');
  var customApply = document.getElementById('<?= $widgetId ?>_customApply');

  customBtn.addEventListener('click', function () {
    var open = customArea.style.display === 'block';
    customArea.style.display = open ? 'none' : 'block';
  });

  customApply.addEventListener('click', function () {
    var val = customTxt.value.trim();
    /* Desmarcar todos los items de la librería */
    items.forEach(function (i) {
      i.classList.remove('selected');
      i.setAttribute('aria-selected', 'false');
    });
    hidden.value      = val;
    prevSvg.innerHTML  = val;
    prevNm.innerHTML   = val
      ? '<em style="color:#6c757d;font-size:.85rem;">SVG personalizado</em>'
      : '<em style="color:#6c757d"><?= $optional ? 'Sin ícono (hereda de la división)' : 'Selecciona un ícono' ?></em>';
  });

})();
</script>
