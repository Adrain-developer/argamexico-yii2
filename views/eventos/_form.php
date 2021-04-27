<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Eventos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="eventos-form container">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <label for="fecha">Fecha de curso:</label>

    <input type="datetime-local" id="fecha" name="Eventos[fecha]" value = "<?= !is_null($model->fecha) ? $model->fecha : ''?>"min="2021-01-01T00:00:00" max="2030-01-01T23:59:59" class="form-control">

    <?= $form->field($model, 'id_categoria')->dropDownList($categorias, ['prompt' => 'Seleccione una categoría' ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>