<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contactos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contactos-form">

    <?php $form = ActiveForm::begin(['options' => ['class' => 'wpcf7-form init']]); ?>
    <div class="contact-form-one__form">
        <div class="row">
            <div class="col-lg-12">
                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' =>'Nombre' ])->label(false) ?>
            </div>
            <div class="col-lg-6">
            <?= $form->field($model, 'telefono')->textInput(['maxlength' => true, 'placeholder' =>'Télefono' ])->label(false) ?>
</div>
            <div class="col-lg-6">
                <?= $form->field($model, 'correo')->textInput(['maxlength' => true, 'placeholder' =>'Correo' ])->label(false) ?>
            </div>
            <div class="col-lg-12">
                <?= $form->field($model, 'descripcion')->textarea(['rows' => 6, 'placeholder' =>'Descripción' ])->label(false) ?>
            </div>
           
            <div class="col-lg-12">
                <?= Html::submitButton('Enviar', ['class' => 'contact-form-one__form-btn thm-btn pull-right']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>