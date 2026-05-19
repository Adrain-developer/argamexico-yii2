<?php
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Divisiones */
/* @var $servicios app\models\Servicios[] */

$this->title = $model->nombre;
$shield = 'M6,0 L74,0 Q80,0 80,6 L80,62 L40,95 L0,62 L0,6 Q0,0 6,0 Z';
$gradId = $model->color === 'red' ? 'greenGrad' : 'tealGrad';
?>
<div class="container py-4">
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><?= Html::a('Divisiones', ['index']) ?></li>
      <li class="breadcrumb-item active"><?= Html::encode($model->nombre) ?></li>
    </ol>
  </nav>

  <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible">
      <?= Yii::$app->session->getFlash('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <!-- División info card -->
  <div class="card mb-4 shadow-sm">
    <div class="card-body">
      <div class="d-flex align-items-start gap-4">
        <svg viewBox="0 0 80 95" width="80" height="95" fill="none" aria-hidden="true">
          <path d="<?= $shield ?>" fill="url(#<?= $gradId ?>)"/>
          <?= $model->icon_svg ?>
        </svg>
        <div class="flex-grow-1">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <h2 class="mb-1"><?= Html::encode($model->nombre) ?></h2>
              <span class="badge bg-secondary me-1"><?= Html::encode($model->tagline) ?></span>
              <span class="badge <?= $model->activo ? 'bg-success' : 'bg-secondary' ?>"><?= $model->activo ? 'Activo' : 'Inactivo' ?></span>
            </div>
            <div class="d-flex gap-2">
              <?= Html::a('<i class="fas fa-edit"></i> Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-warning btn-sm']) ?>
              <?= Html::a('<i class="fas fa-trash"></i> Eliminar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-sm',
                'data'  => ['confirm' => '¿Eliminar esta división y todos sus servicios?', 'method' => 'post'],
              ]) ?>
            </div>
          </div>
          <?php if ($model->descripcion): ?>
            <p class="text-muted mt-2 mb-1"><?= Html::encode($model->descripcion) ?></p>
          <?php endif; ?>
          <?php if ($noms = $model->getNomsList()): ?>
            <div class="mt-2">
              <?php foreach ($noms as $nom): ?>
                <span class="badge bg-light text-dark border me-1"><?= Html::encode($nom) ?></span>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Servicios -->
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Servicios (<?= count($servicios) ?>)</h4>
    <?= Html::a('<i class="fas fa-plus me-1"></i> Agregar Servicio', ['/servicios/create', 'divisionId' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
  </div>

  <?php if (empty($servicios)): ?>
    <div class="alert alert-info">Esta división no tiene servicios aún.</div>
  <?php else: ?>
    <div class="row row-cols-1 row-cols-md-2 g-3">
      <?php foreach ($servicios as $svc): ?>
        <div class="col">
          <div class="card h-100 <?= $svc->activo ? '' : 'opacity-50' ?>">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <div>
                  <h6 class="card-title mb-1"><?= Html::encode($svc->titulo) ?></h6>
                  <?php if ($svc->code): ?>
                    <span class="badge bg-light text-primary border mb-2"><?= Html::encode($svc->code) ?></span>
                  <?php endif; ?>
                  <?php if ($svc->es_curso): ?>
                    <span class="badge bg-warning text-dark mb-2">Curso</span>
                  <?php endif; ?>
                  <p class="text-muted small mb-0"><?= Html::encode(mb_substr($svc->descripcion ?? '', 0, 100)) ?><?= mb_strlen($svc->descripcion ?? '') > 100 ? '…' : '' ?></p>
                </div>
              </div>
              <div class="mt-2 d-flex gap-1">
                <span class="badge bg-light text-muted"><?= count($svc->imagenes) ?> imagen(es)</span>
              </div>
            </div>
            <div class="card-footer d-flex gap-2">
              <?= Html::a('Editar', ['/servicios/update', 'id' => $svc->id], ['class' => 'btn btn-sm btn-outline-warning']) ?>
              <?= Html::a($svc->activo ? 'Desactivar' : 'Activar', ['/servicios/toggle', 'id' => $svc->id], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
              <?= Html::a('Eliminar', ['/servicios/delete', 'id' => $svc->id], [
                'class' => 'btn btn-sm btn-outline-danger',
                'data'  => ['confirm' => '¿Eliminar este servicio?', 'method' => 'post'],
              ]) ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
</div>
