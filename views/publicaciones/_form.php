<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Publicaciones */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="publicaciones-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'method' => 'POST']]); ?>

    <?= $form->field($model, 'nombre')->textarea(['rows' => 6])->label("Título de publicación") ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6])->label("Descripción(opcional)") ?>

    <?= $form->field($model, 'seccion')->textInput(['maxlength' => true, 'disabled' => true])->label("Sección") ?>

    <?= !empty($model->pathImagen) && !is_null($model->pathImagen) ? "imagen actual: ".$model->pathImagen : '' ?>

    <?= $form->field($model, 'pathImagen')->fileInput(['accept' => 'image/*'])->label("Imagen") ?>

    <?php 
      if(!empty($model->pathImagen) && !is_null($model->pathImagen)){ ?>
       <input type="hidden" name="Publicaciones[pathImagenActual]" value="<?= $model->pathImagen?>">
      <?php } ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
