<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="empresas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6])->label('Descripción') ?>

    <?= $form->field($model, 'rfc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
    <label>Folio DS3</label>
    </div>

    <div class="form-group">
    <input type='text' id='autocomplete' class="form-control" name="Empresas[folio]">
    </div>
    
     
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
