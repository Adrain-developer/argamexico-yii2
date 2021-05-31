<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ImagenesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="imagenes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pathImagenIdxFire') ?>

    <?= $form->field($model, 'tituloIdxFire') ?>

    <?= $form->field($model, 'subtIdxFire') ?>

    <?= $form->field($model, 'textoIdxFire') ?>

    <?php // echo $form->field($model, 'pathImagenIdxCons') ?>

    <?php // echo $form->field($model, 'tituloIdxCons') ?>

    <?php // echo $form->field($model, 'subtIdxCons') ?>

    <?php // echo $form->field($model, 'textoIdxCons') ?>

    <?php // echo $form->field($model, 'pathImagenIdxlabs') ?>

    <?php // echo $form->field($model, 'tituloIdxlabs') ?>

    <?php // echo $form->field($model, 'subtIdxlabs') ?>

    <?php // echo $form->field($model, 'textoIdxlabs') ?>

    <?php // echo $form->field($model, 'pathImagenIdxTr') ?>

    <?php // echo $form->field($model, 'tituloIdxTr') ?>

    <?php // echo $form->field($model, 'subtIdxTr') ?>

    <?php // echo $form->field($model, 'textoIdxTr') ?>

    <?php // echo $form->field($model, 'pathImagenIdxUno') ?>

    <?php // echo $form->field($model, 'pathImagenIdxDos') ?>

    <?php // echo $form->field($model, 'pathImagenIdxFireUno') ?>

    <?php // echo $form->field($model, 'pathImagenIdxFireDos') ?>

    <?php // echo $form->field($model, 'pathImagenIdxFireTres') ?>

    <?php // echo $form->field($model, 'pathImagenBnrIdxCons') ?>

    <?php // echo $form->field($model, 'tituloBnrIdxCons') ?>

    <?php // echo $form->field($model, 'pathImagenBnrIdxLabs') ?>

    <?php // echo $form->field($model, 'pathImagenFijasLabs') ?>

    <?php // echo $form->field($model, 'pathImagenHigieneLabs') ?>

    <?php // echo $form->field($model, 'pathImagenBnrIdxTraining') ?>

    <?php // echo $form->field($model, 'tituloBnrIdxTraining') ?>

    <?php // echo $form->field($model, 'pathImagenBnrContacto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
