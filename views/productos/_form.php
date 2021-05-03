<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form container">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'method' => 'POST']]); ?>

    <?= $form->field($model, 'id_categoria')->dropDownList($categorias, ['prompt' => 'Seleccione una categoría' ])->label("Categoría"); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6])->label("Descripción") ?>

    <?= $form->field($model, 'precioUnitario')->textInput()->label("Precio unitario") ?>

    <?= $form->field($model, 'pathImagen')->fileInput(['accept' => 'image/*'])->label("Imagen") ?>

    <?= !empty($model->pathImagen) && !is_null($model->pathImagen) ? "imagen actual: ".$model->pathImagen : '' ?>

    <?php 
      if(!empty($model->pathImagen) && !is_null($model->pathImagen)){ ?>
       <input type="hidden" name="Productos[pathImagenActual]" value="<?= $model->pathImagen?>">
      <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
