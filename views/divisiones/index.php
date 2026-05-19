<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DivisionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Divisiones de Negocio';
?>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="mb-1"><?= Html::encode($this->title) ?></h2>
      <p class="text-muted mb-0">Gestiona las divisiones y sus servicios</p>
    </div>
    <?= Html::a('<i class="fas fa-plus me-1"></i> Nueva División', ['create'], ['class' => 'btn btn-primary']) ?>
  </div>

  <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible">
      <?= Yii::$app->session->getFlash('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel'  => $searchModel,
    'tableOptions' => ['class' => 'table table-hover align-middle'],
    'columns' => [
      ['class' => 'yii\grid\SerialColumn'],
      [
        'attribute' => 'nombre',
        'content'   => fn($m) => Html::a(Html::encode($m->nombre), ['view', 'id' => $m->id], ['class' => 'fw-bold text-decoration-none']),
      ],
      'tagline',
      [
        'attribute' => 'color',
        'value'     => fn($m) => $m->color === 'red' ? '🔴 Rojo' : '🔵 Azul',
        'filter'    => ['teal' => '🔵 Azul', 'red' => '🔴 Rojo'],
        'options'   => ['style' => 'width:100px'],
      ],
      [
        'attribute' => 'orden',
        'options'   => ['style' => 'width:80px'],
      ],
      [
        'label'   => 'Servicios',
        'value'   => fn($m) => count($m->servicios),
        'options' => ['style' => 'width:90px'],
      ],
      [
        'attribute' => 'activo',
        'format'    => 'raw',
        'value'     => fn($m) => $m->activo
          ? '<span class="badge bg-success">Activo</span>'
          : '<span class="badge bg-secondary">Inactivo</span>',
        'filter' => [1 => 'Activo', 0 => 'Inactivo'],
        'options' => ['style' => 'width:100px'],
      ],
      [
        'class'    => 'yii\grid\ActionColumn',
        'template' => '{view} {update} {toggle} {delete}',
        'buttons'  => [
          'toggle' => fn($url, $model) => Html::a(
            $model->activo ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>',
            Url::to(['toggle', 'id' => $model->id]),
            ['class' => 'btn btn-sm btn-outline-secondary', 'title' => $model->activo ? 'Desactivar' : 'Activar']
          ),
          'view'   => fn($url, $model) => Html::a('<i class="fas fa-eye"></i>',   ['view',   'id' => $model->id], ['class' => 'btn btn-sm btn-outline-info']),
          'update' => fn($url, $model) => Html::a('<i class="fas fa-edit"></i>',  ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-outline-warning']),
          'delete' => fn($url, $model) => Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-sm btn-outline-danger',
            'data'  => ['confirm' => '¿Eliminar esta división y todos sus servicios?', 'method' => 'post'],
          ]),
        ],
      ],
    ],
  ]) ?>
</div>
