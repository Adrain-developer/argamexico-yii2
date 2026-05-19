<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Servicios */
/* @var $divisiones array */
?>

<?php $form = ActiveForm::begin(); ?>

<ul class="nav nav-tabs mb-4" id="svcTabs" role="tablist">
  <li class="nav-item"><button type="button" class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-general">General</button></li>
  <li class="nav-item"><button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-imagenes">Imágenes</button></li>
  <li class="nav-item"><button type="button" class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-curso">Curso</button></li>
</ul>

<div class="tab-content">

  <!-- ---- TAB: General ---- -->
  <div class="tab-pane fade show active" id="tab-general">
    <div class="row g-3">
      <div class="col-md-6">
        <?= $form->field($model, 'division_id')->dropDownList($divisiones, ['prompt' => '-- División --']) ?>
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
        <?= $form->field($model, 'icon_svg')->textarea(['rows' => 3, 'class' => 'form-control font-monospace', 'placeholder' => 'Opcional: paths SVG específicos para este servicio'])->hint('Si se deja vacío se usa el ícono de la división') ?>
      </div>
      <div class="col-md-2">
        <?= $form->field($model, 'activo')->checkbox() ?>
      </div>
    </div>
  </div>

  <!-- ---- TAB: Imágenes ---- -->
  <div class="tab-pane fade" id="tab-imagenes">
    <p class="text-muted">Agrega hasta 5 URLs de imágenes para el carrusel del modal (recomendado: 900×600 px).</p>

    <?php if (!$model->isNewRecord && $model->imagenes): ?>
      <div class="mb-3">
        <label class="form-label fw-bold">Imágenes actuales</label>
        <div class="d-flex flex-wrap gap-2 mb-3">
          <?php foreach ($model->imagenes as $img): ?>
            <div class="position-relative" style="width:120px">
              <img src="<?= Html::encode($img->url) ?>" class="img-thumbnail" style="width:120px;height:80px;object-fit:cover" alt="">
              <?= Html::a('✕', ['/servicios/delete-image', 'id' => $img->id], [
                'class' => 'btn btn-danger btn-sm position-absolute top-0 end-0 p-0 px-1',
                'data'  => ['confirm' => '¿Eliminar esta imagen?', 'method' => 'post'],
              ]) ?>
              <small class="d-block text-truncate text-muted" style="font-size:10px"><?= Html::encode($img->caption) ?></small>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
      <p class="text-muted small">Al guardar, las URLs abajo <strong>reemplazarán</strong> las imágenes actuales.</p>
    <?php endif; ?>

    <div id="imgUrlsContainer">
      <?php for ($i = 0; $i < 5; $i++): ?>
        <div class="input-group mb-2">
          <span class="input-group-text"><?= $i + 1 ?></span>
          <input type="url" name="imageUrls[]" class="form-control" placeholder="https://..." value="">
        </div>
      <?php endfor; ?>
    </div>
  </div>

  <!-- ---- TAB: Curso ---- -->
  <div class="tab-pane fade" id="tab-curso">
    <div class="mb-3">
      <?= $form->field($model, 'es_curso')->checkbox(['label' => 'Este servicio es un curso capacitación', 'id' => 'esCursoCheck']) ?>
    </div>
    <div id="cursoFields" class="<?= $model->es_curso ? '' : 'd-none' ?>">
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
          <?= $form->field($model, 'temario')->textarea(['rows' => 6, 'placeholder' => "Tema 1\nTema 2\nTema 3"])->hint('Un tema por línea') ?>
        </div>
        <div class="col-md-6">
          <?= $form->field($model, 'incluye')->textarea(['rows' => 4, 'placeholder' => "Material didáctico\nConstancia DC-3\nRefrigerio"])->hint('Un elemento por línea') ?>
        </div>
        <div class="col-md-6">
          <?= $form->field($model, 'contacto_emails')->textarea(['rows' => 3, 'placeholder' => "contacto@arga.mx\nventas@arga.mx"])->hint('Un correo por línea') ?>
        </div>
        <div class="col-md-6">
          <?= $form->field($model, 'contacto_telefonos')->textarea(['rows' => 3, 'placeholder' => "+52 55 1234 5678"])->hint('Un número por línea') ?>
        </div>
        <div class="col-12">
          <?= $form->field($model, 'direccion')->textarea(['rows' => 2, 'placeholder' => 'Dirección del lugar del curso']) ?>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="mt-4 d-flex gap-2">
  <?= Html::submitButton($model->isNewRecord ? 'Crear Servicio' : 'Guardar Cambios', ['class' => 'btn btn-primary']) ?>
  <?php if (!$model->isNewRecord): ?>
    <?= Html::a('Volver a la División', ['/divisiones/view', 'id' => $model->division_id], ['class' => 'btn btn-secondary']) ?>
  <?php else: ?>
    <?= Html::a('Cancelar', ['/divisiones/index'], ['class' => 'btn btn-secondary']) ?>
  <?php endif; ?>
</div>

<?php ActiveForm::end(); ?>

<script>
document.getElementById('esCursoCheck').addEventListener('change', function() {
  document.getElementById('cursoFields').classList.toggle('d-none', !this.checked);
});
</script>
