<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Equipo de Trabajo';
?>
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h2 class="mb-1"><?= Html::encode($this->title) ?></h2>
      <p class="text-muted mb-0">Administra los miembros del equipo que aparecen en la página de inicio.</p>
    </div>
    <?= Html::a('<i class="fas fa-plus me-1"></i> Nuevo miembro', ['create'], ['class' => 'btn btn-primary']) ?>
  </div>

  <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible">
      <?= Yii::$app->session->getFlash('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'tableOptions' => ['class' => 'table table-hover align-middle'],
    'columns' => [
      [
        'label'  => 'Foto',
        'format' => 'raw',
        'value'  => fn($m) => $m->getFotoUrl()
          ? Html::img($m->getFotoUrl(), ['style' => 'width:48px;height:48px;border-radius:50%;object-fit:cover;'])
          : '<span class="badge bg-secondary">—</span>',
        'options' => ['style' => 'width:70px'],
      ],
      [
        'attribute' => 'nombre',
        'content'   => fn($m) => Html::a(Html::encode($m->nombre), ['update', 'id' => $m->id], ['class' => 'fw-bold text-decoration-none']),
      ],
      'puesto',
      'departamento',
      [
        'label' => 'División',
        'value' => fn($m) => $m->division?->nombre ?? '—',
      ],
      [
        'attribute' => 'orden',
        'options'   => ['style' => 'width:80px'],
      ],
      [
        'attribute' => 'activo',
        'format'    => 'raw',
        'value'     => fn($m) => $m->activo
          ? '<span class="badge bg-success">Activo</span>'
          : '<span class="badge bg-secondary">Inactivo</span>',
        'options' => ['style' => 'width:100px'],
      ],
      [
        'class'    => 'yii\grid\ActionColumn',
        'template' => '{update} {toggle} {delete}',
        'buttons'  => [
          'toggle' => fn($url, $model) => Html::a(
            $model->activo ? '<i class="fas fa-eye-slash"></i>' : '<i class="fas fa-eye"></i>',
            Url::to(['toggle', 'id' => $model->id]),
            ['class' => 'btn btn-sm btn-outline-secondary', 'title' => $model->activo ? 'Desactivar' : 'Activar']
          ),
          'update' => fn($url, $model) => Html::a('<i class="fas fa-edit"></i>',  ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-outline-warning']),
          'delete' => fn($url, $model) => Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-sm btn-outline-danger',
            'data'  => ['confirm' => '¿Eliminar este miembro del equipo?', 'method' => 'post'],
          ]),
        ],
      ],
    ],
  ]) ?>
</div>
