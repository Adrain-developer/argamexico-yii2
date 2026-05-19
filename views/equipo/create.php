<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Equipo */
/* @var $divisiones app\models\Divisiones[] */

$this->title = 'Nuevo miembro del equipo';
?>
<div class="container py-4">
  <h2 class="mb-4"><?= Html::encode($this->title) ?></h2>
  <?= $this->render('_form', ['model' => $model, 'divisiones' => $divisiones]) ?>
</div>
