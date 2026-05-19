<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ServiciosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $divisiones array */

$this->title = 'Servicios';
?>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="mb-1"><?= Html::encode($this->title) ?></h2>
      <p class="text-muted mb-0">Gestiona todos los servicios de las divisiones</p>
    </div>
    <div class="d-flex gap-2">
      <?= Html::a('<i class="fas fa-building me-1"></i> Ver divisiones', ['/divisiones/index'], ['class' => 'btn btn-outline-secondary']) ?>
      <?= Html::a('<i class="fas fa-plus me-1"></i> Nuevo Servicio', ['create'], ['class' => 'btn btn-primary']) ?>
    </div>
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
        'attribute' => 'division_id',
        'label'     => 'División',
        'value'     => fn($m) => $m->division->nombre ?? '—',
        'filter'    => $divisiones,
        'options'   => ['style' => 'width:150px'],
      ],
      [
        'attribute' => 'code',
        'label'     => 'Código / NOM',
        'options'   => ['style' => 'width:120px'],
      ],
      [
        'attribute' => 'titulo',
        'content'   => fn($m) => Html::a(Html::encode($m->titulo), ['view', 'id' => $m->id], ['class' => 'fw-semibold text-decoration-none']),
      ],
      [
        'attribute' => 'es_curso',
        'label'     => 'Curso',
        'format'    => 'raw',
        'value'     => fn($m) => $m->es_curso
          ? '<span class="badge bg-info text-dark">Curso</span>'
          : '<span class="badge bg-light text-muted">Servicio</span>',
        'filter'    => [1 => 'Curso', 0 => 'Servicio'],
        'options'   => ['style' => 'width:90px'],
      ],
      [
        'attribute' => 'activo',
        'format'    => 'raw',
        'value'     => fn($m) => $m->activo
          ? '<span class="badge bg-success">Activo</span>'
          : '<span class="badge bg-secondary">Inactivo</span>',
        'filter'    => [1 => 'Activo', 0 => 'Inactivo'],
        'options'   => ['style' => 'width:90px'],
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
            'data'  => ['confirm' => '¿Eliminar este servicio?', 'method' => 'post'],
          ]),
        ],
      ],
    ],
  ]) ?>
</div>
