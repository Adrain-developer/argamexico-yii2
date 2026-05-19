<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Servicios */
/* @var $divisiones array */
?>

<style>
.svc-tabs { display:flex; gap:4px; border-bottom:2px solid #dee2e6; margin-bottom:1.5rem; }
.svc-tab-btn {
  padding:8px 18px; border:none; background:none; cursor:pointer;
  font-weight:600; color:#495057; border-bottom:3px solid transparent;
  margin-bottom:-2px; border-radius:4px 4px 0 0; transition:all .15s;
}
.svc-tab-btn:hover { background:#f8f9fa; color:#1C2B5E; }
.svc-tab-btn.active { color:#1C2B5E; border-bottom-color:#1C2B5E; background:#fff; }
.svc-tab-panel { display:none; }
.svc-tab-panel.active { display:block; }
</style>

<?php $form = ActiveForm::begin(); ?>

<div class="svc-tabs" role="tablist">
  <button type="button" class="svc-tab-btn active" data-panel="panel-general">General</button>
  <button type="button" class="svc-tab-btn"        data-panel="panel-imagenes">Imágenes</button>
  <button type="button" class="svc-tab-btn"        data-panel="panel-curso">Curso</button>
</div>

<!-- PANEL: General -->
<div class="svc-tab-panel active" id="panel-general">
  <div class="row g-3">
    <div class="col-md-6">
      <?= $form->field($model, 'division_id')->dropDownList($divisiones, ['prompt' => '-- Selecciona división --']) ?>
    </div>
    <div class="col-md-6">
      <?= $form->field($model, 'code')->textInput(['maxlength' => 80, 'placeholder' => 'NOM-019-STPS-2011']) ?>
    </div>
    <div class="col-12">
      <?= $form->field($model, 'titulo')->textInput(['maxlength' => 200]) ?>
    </div>
    <div class="col-12">
      <?= $form->field($model, 'descripcion')->textarea(['rows' => 4, 'placeholder' => 'Reconocimiento / descripción del servicio']) ?>
    </div>
    <div class="col-12">
      <?= $form->field($model, 'evaluacion')->textarea(['rows' => 3, 'placeholder' => 'Método de evaluación']) ?>
    </div>
    <div class="col-12">
      <?= $form->field($model, 'icon_svg')
        ->textarea(['rows' => 3, 'class' => 'form-control font-monospace',
                    'placeholder' => 'Opcional: paths SVG del ícono (sin el tag <svg>)'])
        ->hint('Dejar vacío para usar el ícono de la división') ?>
    </div>
    <div class="col-12">
      <?= $form->field($model, 'activo')->checkbox(['label' => 'Servicio activo y visible']) ?>
    </div>
  </div>
</div>

<!-- PANEL: Imágenes -->
<div class="svc-tab-panel" id="panel-imagenes">
  <p class="text-muted">Hasta 5 URLs de imágenes para el carrusel del modal (recomendado: 900×600 px).</p>

  <?php if (!$model->isNewRecord && $model->imagenes): ?>
    <div class="mb-3">
      <p class="fw-semibold mb-2">Imágenes actuales</p>
      <div class="d-flex flex-wrap gap-2 mb-2">
        <?php foreach ($model->imagenes as $img): ?>
          <div class="text-center" style="width:130px">
            <img src="<?= Html::encode($img->url) ?>" class="img-thumbnail"
                 style="width:130px;height:85px;object-fit:cover" alt="">
            <?= Html::a('✕ Eliminar', ['/servicios/delete-image', 'id' => $img->id], [
              'class' => 'btn btn-danger btn-sm d-block mt-1 py-0',
              'data'  => ['confirm' => '¿Eliminar esta imagen?', 'method' => 'post'],
            ]) ?>
          </div>
        <?php endforeach; ?>
      </div>
      <p class="text-muted small">Las URLs de abajo <strong>reemplazarán</strong> las imágenes actuales al guardar.</p>
    </div>
  <?php endif; ?>

  <?php for ($i = 0; $i < 5; $i++): ?>
    <div class="input-group mb-2">
      <span class="input-group-text text-muted"><?= $i + 1 ?></span>
      <input type="url" name="imageUrls[]" class="form-control" placeholder="https://…">
    </div>
  <?php endfor; ?>
</div>

<!-- PANEL: Curso -->
<div class="svc-tab-panel" id="panel-curso">
  <div class="mb-3">
    <?= $form->field($model, 'es_curso')->checkbox([
      'label' => 'Este servicio es un curso de capacitación',
      'id'    => 'esCursoCheck',
    ]) ?>
  </div>
  <div id="cursoFields" style="<?= $model->es_curso ? '' : 'display:none' ?>">
    <div class="row g-3">
      <div class="col-md-8">
        <?= $form->field($model, 'nombre_curso')->textInput(['maxlength' => 200]) ?>
      </div>
      <div class="col-md-2">
        <?= $form->field($model, 'duracion')->textInput(['placeholder' => 'Ej: 8 horas']) ?>
      </div>
      <div class="col-md-2">
        <?= $form->field($model, 'horas_curso')->textInput(['type' => 'number', 'min' => 1]) ?>
      </div>
      <div class="col-12">
        <?= $form->field($model, 'descripcion_curso')->textarea(['rows' => 3]) ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'temario')
          ->textarea(['rows' => 6, 'placeholder' => "Tema 1\nTema 2\nTema 3"])
          ->hint('Un tema por línea') ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'incluye')
          ->textarea(['rows' => 4, 'placeholder' => "Material didáctico\nConstancia DC-3"])
          ->hint('Un elemento por línea') ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'contacto_emails')
          ->textarea(['rows' => 3, 'placeholder' => "contacto@arga.mx"])
          ->hint('Un correo por línea') ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'contacto_telefonos')
          ->textarea(['rows' => 3, 'placeholder' => "+52 55 1234 5678"])
          ->hint('Un número por línea') ?>
      </div>
      <div class="col-12">
        <?= $form->field($model, 'direccion')->textarea(['rows' => 2, 'placeholder' => 'Dirección del lugar del curso']) ?>
      </div>
    </div>
  </div>
</div>

<div class="mt-4 d-flex gap-2">
  <?= Html::submitButton(
    $model->isNewRecord ? 'Crear Servicio' : 'Guardar Cambios',
    ['class' => 'btn btn-primary']
  ) ?>
  <?= Html::a(
    'Cancelar',
    $model->isNewRecord ? ['/divisiones/index'] : ['/divisiones/view', 'id' => $model->division_id],
    ['class' => 'btn btn-secondary']
  ) ?>
</div>

<?php ActiveForm::end(); ?>

<script>
(function () {
  // Tab switching
  document.querySelectorAll('.svc-tab-btn').forEach(function (btn) {
    btn.addEventListener('click', function () {
      document.querySelectorAll('.svc-tab-btn').forEach(function (b) { b.classList.remove('active'); });
      document.querySelectorAll('.svc-tab-panel').forEach(function (p) { p.classList.remove('active'); });
      btn.classList.add('active');
      document.getElementById(btn.dataset.panel).classList.add('active');
    });
  });

  // Curso fields toggle
  var cursoCheck = document.getElementById('esCursoCheck');
  var cursoFields = document.getElementById('cursoFields');
  if (cursoCheck) {
    cursoCheck.addEventListener('change', function () {
      cursoFields.style.display = this.checked ? '' : 'none';
    });
  }
})();
</script>
