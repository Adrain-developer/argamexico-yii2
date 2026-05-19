<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Servicios */

$this->title = $model->titulo;
?>
<div class="container py-4">
  <nav aria-label="breadcrumb" class="mb-3">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><?= Html::a('Admin', ['/site/admin']) ?></li>
      <li class="breadcrumb-item"><?= Html::a('Divisiones', ['/divisiones/index']) ?></li>
      <?php if ($model->division): ?>
        <li class="breadcrumb-item"><?= Html::a(Html::encode($model->division->nombre), ['/divisiones/view', 'id' => $model->division_id]) ?></li>
      <?php endif; ?>
      <li class="breadcrumb-item active"><?= Html::encode($model->titulo) ?></li>
    </ol>
  </nav>

  <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible">
      <?= Yii::$app->session->getFlash('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="mb-0"><?= Html::encode($model->titulo) ?></h5>
      <div class="d-flex gap-2">
        <?= Html::a('<i class="fas fa-edit me-1"></i> Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-warning']) ?>
        <?= Html::a('<i class="fas fa-arrow-left me-1"></i> Volver', $model->division ? ['/divisiones/view', 'id' => $model->division_id] : ['index'], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
      </div>
    </div>
    <div class="card-body">
      <div class="row g-3">
        <div class="col-md-6">
          <small class="text-muted">División</small>
          <p class="mb-1 fw-semibold"><?= Html::encode($model->division->nombre ?? '—') ?></p>
        </div>
        <div class="col-md-3">
          <small class="text-muted">Código / NOM</small>
          <p class="mb-1"><?= Html::encode($model->code ?: '—') ?></p>
        </div>
        <div class="col-md-3">
          <small class="text-muted">Orden</small>
          <p class="mb-1"><?= $model->orden ?></p>
        </div>
        <div class="col-md-6">
          <small class="text-muted">Tipo</small>
          <p class="mb-1">
            <?= $model->es_curso
              ? '<span class="badge bg-info text-dark">Curso</span>'
              : '<span class="badge bg-light text-dark border">Servicio</span>' ?>
          </p>
        </div>
        <div class="col-md-6">
          <small class="text-muted">Estado</small>
          <p class="mb-1">
            <?= $model->activo
              ? '<span class="badge bg-success">Activo</span>'
              : '<span class="badge bg-secondary">Inactivo</span>' ?>
          </p>
        </div>
        <?php if ($model->descripcion): ?>
          <div class="col-12">
            <small class="text-muted">Descripción</small>
            <p class="mb-1"><?= nl2br(Html::encode($model->descripcion)) ?></p>
          </div>
        <?php endif; ?>
        <?php if ($model->evaluacion): ?>
          <div class="col-12">
            <small class="text-muted">Evaluación / Reconocimiento</small>
            <p class="mb-1"><?= nl2br(Html::encode($model->evaluacion)) ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <?php if ($model->imagenes): ?>
    <div class="card mb-4">
      <div class="card-header"><h6 class="mb-0">Imágenes</h6></div>
      <div class="card-body d-flex flex-wrap gap-3">
        <?php foreach ($model->imagenes as $img): ?>
          <div class="text-center">
            <img src="<?= Html::encode($img->url) ?>" alt="<?= Html::encode($img->caption) ?>"
                 style="width:140px;height:90px;object-fit:cover;border-radius:6px;" class="border">
            <?php if ($img->caption): ?>
              <p class="small text-muted mt-1 mb-0"><?= Html::encode($img->caption) ?></p>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($model->es_curso): ?>
    <div class="card">
      <div class="card-header"><h6 class="mb-0">Datos del Curso</h6></div>
      <div class="card-body">
        <div class="row g-3">
          <?php if ($model->nombre_curso): ?>
            <div class="col-12">
              <small class="text-muted">Nombre del Curso</small>
              <p class="mb-1 fw-semibold"><?= Html::encode($model->nombre_curso) ?></p>
            </div>
          <?php endif; ?>
          <?php if ($model->duracion): ?>
            <div class="col-md-4">
              <small class="text-muted">Duración</small>
              <p class="mb-1"><?= Html::encode($model->duracion) ?></p>
            </div>
          <?php endif; ?>
          <?php if ($model->horas_curso): ?>
            <div class="col-md-4">
              <small class="text-muted">Horas</small>
              <p class="mb-1"><?= $model->horas_curso ?> hrs</p>
            </div>
          <?php endif; ?>
          <?php if ($model->descripcion_curso): ?>
            <div class="col-12">
              <small class="text-muted">Descripción del Curso</small>
              <p class="mb-1"><?= nl2br(Html::encode($model->descripcion_curso)) ?></p>
            </div>
          <?php endif; ?>
          <?php if ($model->temario): ?>
            <div class="col-12">
              <small class="text-muted">Temario</small>
              <ul class="mb-1 ps-3">
                <?php foreach ($model->getTemarioList() as $t): ?>
                  <li><?= Html::encode($t) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          <?php if ($model->incluye): ?>
            <div class="col-12">
              <small class="text-muted">Incluye</small>
              <ul class="mb-1 ps-3">
                <?php foreach ($model->getIncluyeList() as $i): ?>
                  <li><?= Html::encode($i) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          <?php if ($model->contacto_emails): ?>
            <div class="col-md-6">
              <small class="text-muted">Emails de Contacto</small>
              <p class="mb-1"><?= implode(', ', array_map(fn($e) => Html::encode($e), $model->getEmailsList())) ?></p>
            </div>
          <?php endif; ?>
          <?php if ($model->contacto_telefonos): ?>
            <div class="col-md-6">
              <small class="text-muted">Teléfonos</small>
              <p class="mb-1"><?= implode(', ', array_map(fn($t) => Html::encode($t), $model->getTelefonosList())) ?></p>
            </div>
          <?php endif; ?>
          <?php if ($model->direccion): ?>
            <div class="col-12">
              <small class="text-muted">Dirección</small>
              <p class="mb-1"><?= nl2br(Html::encode($model->direccion)) ?></p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>
