<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Servicios */
/* @var $divisiones array */

$this->title = 'Nuevo Servicio';
?>
<div class="container py-4">
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><?= Html::a('Divisiones', ['/divisiones/index']) ?></li>
      <?php if ($model->division_id): ?>
        <li class="breadcrumb-item"><?= Html::a(Html::encode($divisiones[$model->division_id] ?? 'División'), ['/divisiones/view', 'id' => $model->division_id]) ?></li>
      <?php endif; ?>
      <li class="breadcrumb-item active">Nuevo Servicio</li>
    </ol>
  </nav>
  <h2 class="mb-4"><?= Html::encode($this->title) ?></h2>
  <?= $this->render('_form', ['model' => $model, 'divisiones' => $divisiones]) ?>
</div>
