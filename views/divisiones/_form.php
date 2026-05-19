<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Divisiones */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(['options' => ['class' => 'needs-validation']]); ?>

<div class="row g-3">
  <div class="col-md-8">
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => 120, 'placeholder' => 'Ej: Capacitación']) ?>
  </div>
  <div class="col-md-4">
    <?= $form->field($model, 'slug')->textInput(['maxlength' => 100, 'placeholder' => 'ej: capacitacion'])->hint('Solo letras minúsculas, números y guiones') ?>
  </div>
  <div class="col-md-8">
    <?= $form->field($model, 'tagline')->textInput(['maxlength' => 200, 'placeholder' => 'Ej: Formación especializada']) ?>
  </div>
  <div class="col-md-2">
    <?= $form->field($model, 'color')->dropDownList(['teal' => '🔵 Azul', 'red' => '🔴 Rojo']) ?>
  </div>
  <div class="col-md-2">
    <?= $form->field($model, 'orden')->textInput(['type' => 'number', 'min' => 0]) ?>
  </div>
  <div class="col-12">
    <?= $form->field($model, 'descripcion')->textarea(['rows' => 3, 'placeholder' => 'Descripción breve de la división']) ?>
  </div>
  <div class="col-12">
    <?= $form->field($model, 'noms')->textarea(['rows' => 2, 'placeholder' => '["NOM-019","NOM-030","DC-3"]'])->hint('JSON array de certificaciones/NOMs asociadas a esta división') ?>
  </div>
  <div class="col-12">
    <?= $form->field($model, 'icon_svg')->textarea(['rows' => 4, 'class' => 'form-control font-monospace', 'placeholder' => 'Paths SVG del ícono del escudo (sin el tag <svg>)'])->hint('Solo los elementos internos del viewBox 80×95 con stroke="white"') ?>
  </div>
  <div class="col-md-2">
    <?= $form->field($model, 'activo')->checkbox() ?>
  </div>
</div>

<div class="mt-4 d-flex gap-2">
  <?= Html::submitButton($model->isNewRecord ? 'Crear División' : 'Guardar Cambios', ['class' => 'btn btn-primary']) ?>
  <?= Html::a('Cancelar', ['index'], ['class' => 'btn btn-secondary']) ?>
</div>

<?php ActiveForm::end(); ?>
