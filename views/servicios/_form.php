<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Servicios */
/* @var $divisiones array */
?>

<style>
.svc-tabs { display:flex; gap:4px; border-bottom:2px solid #dee2e6; margin-bottom:1.5rem; flex-wrap:wrap; }
.svc-tab-btn {
  padding:8px 18px; border:none; background:none; cursor:pointer;
  font-weight:600; color:#495057; border-bottom:3px solid transparent;
  margin-bottom:-2px; border-radius:4px 4px 0 0; transition:all .15s;
}
.svc-tab-btn:hover { background:#f8f9fa; color:#1C2B5E; }
.svc-tab-btn.active { color:#1C2B5E; border-bottom-color:#1C2B5E; background:#fff; }
.svc-tab-panel { display:none; }
.svc-tab-panel.active { display:block; }
.svc-img-thumb { width:130px; height:85px; object-fit:cover; border-radius:6px; border:1px solid #dee2e6; }
</style>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

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
  <p class="text-muted mb-3">Sube hasta 5 imágenes para el carrusel del modal (PNG, JPG o WEBP · máx. 4 MB c/u · recomendado: 900×600 px).</p>

  <?php if (!$model->isNewRecord && $model->imagenes): ?>
    <div class="mb-4">
      <p class="fw-semibold mb-2">Imágenes actuales</p>
      <div class="d-flex flex-wrap gap-3">
        <?php foreach ($model->imagenes as $img): ?>
          <div class="text-center">
            <img src="<?= Html::encode($img->webUrl) ?>" class="svc-img-thumb d-block mb-1" alt="">
            <?= Html::a(
              '<i class="fas fa-trash-alt me-1"></i>Eliminar',
              ['/servicios/delete-image', 'id' => $img->id],
              [
                'class' => 'btn btn-danger btn-sm py-0 px-2',
                'data'  => ['confirm' => '¿Eliminar esta imagen? Se borrará del servidor.', 'method' => 'post'],
              ]
            ) ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>

  <p class="fw-semibold mb-2">Agregar imágenes</p>
  <?php for ($i = 0; $i < 5; $i++): ?>
    <div class="input-group mb-2">
      <span class="input-group-text text-muted"><?= $i + 1 ?></span>
      <input type="file" name="imageFiles[]" class="form-control"
             accept="image/png,image/jpeg,image/webp">
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
      <div class="col-md-4">
        <?= $form->field($model, 'duracion')->textInput(['placeholder' => 'Ej: 8 horas', 'maxlength' => 100]) ?>
      </div>

      <div class="col-md-4">
        <?= $form->field($model, 'fecha_curso')->input('date') ?>
      </div>
      <div class="col-md-4">
        <?= $form->field($model, 'hora_curso')->input('time')
          ->hint('Se mostrará en formato 12 h en la vista pública.') ?>
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
      <div class="col-md-6">
        <?= $form->field($model, 'direccion')->textarea(['rows' => 3, 'placeholder' => 'Calle, Ciudad, CP…']) ?>
      </div>
      <div class="col-md-6">
        <?= $form->field($model, 'mapa_iframe')
          ->textarea(['rows' => 3, 'placeholder' => '<iframe src="https://www.google.com/maps/embed?pb=…" …></iframe>'])
          ->hint('Pega el código iframe de "Compartir → Insertar mapa" de Google Maps.') ?>
      </div>

    </div>
  </div>
</div>

<div class="mt-4 d-flex gap-2">
  <?= Html::submitButton(
    $model->isNewRecord ? '<i class="fas fa-plus me-1"></i>Crear Servicio' : '<i class="fas fa-save me-1"></i>Guardar Cambios',
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
  var cursoCheck  = document.getElementById('esCursoCheck');
  var cursoFields = document.getElementById('cursoFields');
  if (cursoCheck) {
    cursoCheck.addEventListener('change', function () {
      cursoFields.style.display = this.checked ? '' : 'none';
    });
  }
})();
</script>
