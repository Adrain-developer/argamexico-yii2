<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mascotas */
/* @var $imagenes array */

$this->title = 'Editar mascota';
?>

<div class="admin-form-wrap">
  <h3 class="admin-section-title"><?= Html::encode($this->title) ?></h3>
  <?= $this->render('_form', ['model' => $model, 'imagenes' => $imagenes]) ?>
</div>
