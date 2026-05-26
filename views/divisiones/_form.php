<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Divisiones */
?>

<?php $form = ActiveForm::begin(['options' => ['class' => 'needs-validation']]); ?>

<div class="row g-3">

  <div class="col-12">
    <?= $form->field($model, 'nombre')->textInput([
      'maxlength'   => 120,
      'id'          => 'divNombre',
      'placeholder' => 'Ej: Capacitación y Desarrollo',
    ]) ?>
  </div>

  <?= $form->field($model, 'slug')->hiddenInput(['id' => 'divSlug'])->label(false) ?>

  <div class="col-12">
    <?= $form->field($model, 'tagline')->textInput([
      'maxlength'   => 200,
      'placeholder' => 'Ej: Formación especializada en normatividad laboral',
    ]) ?>
  </div>

  <div class="col-12">
    <?= $form->field($model, 'descripcion')->textarea([
      'rows'        => 3,
      'placeholder' => 'Descripción breve de la división y sus servicios',
    ]) ?>
  </div>

  <!-- NOMs / Certificaciones pill builder -->
  <div class="col-12">
    <label class="form-label fw-semibold">NOMs / Certificaciones asociadas</label>
    <?= $form->field($model, 'noms')->hiddenInput(['id' => 'nomsHidden'])->label(false) ?>
    <div id="nomsPills" class="d-flex flex-wrap gap-2 mb-2 p-2 rounded border bg-light" style="min-height:42px"></div>
    <div class="input-group" style="max-width:440px">
      <input type="text" id="nomInput" class="form-control"
             placeholder="Ej: NOM-019-STPS-2011" maxlength="60"
             autocomplete="off" spellcheck="false">
      <button type="button" class="btn btn-outline-primary" id="nomAddBtn">
        <i class="fas fa-plus me-1"></i>Agregar NOM
      </button>
    </div>
    <div class="form-text">Escribe el código de la norma y presiona <kbd>Enter</kbd> o el botón para agregarla.</div>
  </div>

  <!-- Selector visual de iconos SVG -->
  <div class="col-12">
    <label class="form-label fw-semibold">Ícono SVG <span class="text-danger">*</span></label>
    <?php echo $this->render('//partials/_icon-picker', [
      'fieldId'      => \yii\helpers\Html::getInputId($model, 'icon_svg'),
      'fieldName'    => \yii\helpers\Html::getInputName($model, 'icon_svg'),
      'currentValue' => $model->icon_svg ?? '',
      'optional'     => false,
      'shieldColor'  => $model->color ?? 'teal',
    ]); ?>
  </div>

  <div class="col-12">
    <?= $form->field($model, 'activo')->checkbox(['label' => 'División activa y visible en el sitio']) ?>
  </div>

</div>

<div class="mt-4 d-flex gap-2">
  <?= Html::submitButton(
    ($model->isNewRecord ? '<i class="fas fa-plus me-1"></i>Crear División' : '<i class="fas fa-save me-1"></i>Guardar Cambios'),
    ['class' => 'btn btn-primary']
  ) ?>
  <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-secondary']) ?>
</div>

<?php ActiveForm::end(); ?>

<script>
(function () {
  /* ---- Auto-slug desde nombre ---- */
  const elNombre = document.getElementById('divNombre');
  const elSlug   = document.getElementById('divSlug');
  let slugManual = <?= $model->isNewRecord ? 'false' : 'true' ?>;

  function slugify(s) {
    return s.toLowerCase()
      .normalize('NFD').replace(/[̀-ͯ]/g, '')
      .replace(/[^a-z0-9]+/g, '-')
      .replace(/^-+|-+$/g, '');
  }

  elNombre.addEventListener('input', function () {
    if (!slugManual) elSlug.value = slugify(this.value);
  });
  elSlug.addEventListener('input', function () { slugManual = true; });

  /* ---- Pills builder para NOMs ---- */
  const hiddenInput = document.getElementById('nomsHidden');
  const pillsWrap   = document.getElementById('nomsPills');
  const nomText     = document.getElementById('nomInput');
  const nomBtn      = document.getElementById('nomAddBtn');

  let noms = [];
  try { noms = JSON.parse(hiddenInput.value || '[]'); } catch (e) { noms = []; }
  if (!Array.isArray(noms)) noms = [];

  function renderPills() {
    hiddenInput.value = JSON.stringify(noms);
    if (!noms.length) {
      pillsWrap.innerHTML = '<span class="text-muted small fst-italic">Sin NOMs agregadas aún</span>';
      return;
    }
    pillsWrap.innerHTML = noms.map((n, i) =>
      `<span class="badge rounded-pill bg-primary d-inline-flex align-items-center gap-1" style="font-size:.82rem;padding:.4em .8em">
        ${n.replace(/</g,'&lt;')}
        <button type="button" class="btn-close btn-close-white ms-1" data-i="${i}" aria-label="Eliminar" style="font-size:.6rem"></button>
      </span>`
    ).join('');
    pillsWrap.querySelectorAll('[data-i]').forEach(btn =>
      btn.addEventListener('click', function () {
        noms.splice(+this.dataset.i, 1);
        renderPills();
      })
    );
  }

  function addNom() {
    const val = nomText.value.trim().toUpperCase().replace(/\s+/g, '-');
    if (!val) return;
    if (noms.includes(val)) { nomText.select(); return; }
    noms.push(val);
    nomText.value = '';
    renderPills();
  }

  nomBtn.addEventListener('click', addNom);
  nomText.addEventListener('keydown', e => { if (e.key === 'Enter') { e.preventDefault(); addNom(); } });

  renderPills();
})();
</script>
