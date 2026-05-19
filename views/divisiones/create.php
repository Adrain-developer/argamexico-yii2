<?php
/* @var $this yii\web\View */
/* @var $model app\models\Divisiones */
use yii\helpers\Html;

$this->title = 'Nueva División';
?>
<div class="container py-4">
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><?= Html::a('Divisiones', ['index']) ?></li>
      <li class="breadcrumb-item active">Nueva División</li>
    </ol>
  </nav>
  <h2 class="mb-4"><?= Html::encode($this->title) ?></h2>
  <?= $this->render('_form', ['model' => $model]) ?>
</div>
