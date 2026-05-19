<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */
/* @var $divisiones app\models\Divisiones[] */
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<div class="row g-3">
  <div class="col-md-8">
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 160, 'placeholder' => 'Ej: Alejandra Martínez']) ?>
  </div>
  <div class="col-md-4">
    <?= $form->field($model, 'orden')->textInput(['type' => 'number']) ?>
  </div>

  <div class="col-md-6">
    <?= $form->field($model, 'puesto')->textInput(['maxlength' => 160, 'placeholder' => 'Ej: Coordinadora de Seguridad']) ?>
  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'departamento')->textInput(['maxlength' => 160, 'placeholder' => 'Ej: Operaciones']) ?>
  </div>

  <div class="col-md-6">
    <?= $form->field($model, 'division_id')->dropDownList(
      ArrayHelper::map($divisiones, 'id', 'nombre'),
      ['prompt' => '— Sin división asignada —']
    ) ?>
  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'activo')->checkbox() ?>
  </div>

  <div class="col-12">
    <?php if ($model->getFotoUrl()): ?>
      <div class="mb-2">
        <img src="<?= $model->getFotoUrl() ?>" alt="Foto actual" style="width:96px;height:96px;border-radius:50%;object-fit:cover;border:2px solid #e1e6f0;">
      </div>
    <?php endif; ?>
    <?= $form->field($model, 'fotoFile')->fileInput(['accept' => 'image/png,image/jpeg,image/webp'])
        ->hint('PNG, JPG o WEBP. Recomendado: cuadrada, mínimo 400×400.') ?>
  </div>

  <div class="col-12 d-flex gap-2">
    <?= Html::submitButton('<i class="fas fa-save me-1"></i> Guardar', ['class' => 'btn btn-primary']) ?>
    <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
  </div>
</div>

<?php ActiveForm::end(); ?>
