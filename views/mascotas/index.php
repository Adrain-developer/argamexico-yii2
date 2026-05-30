<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
?>

<h3 class="admin-section-title">Mascota Tigre</h3>
<div class="d-flex justify-content-between align-items-center mb-3">
    <p class="text-muted mb-0">Mascotas con diálogo y CTA de WhatsApp que aparecen en el sitio.</p>
    <?= Html::a('<i class="fas fa-plus me-1"></i> Nueva mascota', ['create'], ['class' => 'btn btn-primary']) ?>
</div>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success"><?= Yii::$app->session->getFlash('success') ?></div>
<?php endif; ?>

<div class="table-responsive">
    <table class="table table-striped align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Mascota</th>
                <th>Posición</th>
                <th>Mensaje</th>
                <th>WhatsApp</th>
                <th>Activo</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($dataProvider->getModels() as $m): ?>
            <tr>
                <td><?= $m->orden ?></td>
                <td><img src="<?= $m->getImagenUrl() ?>" alt="" style="width:54px;height:54px;object-fit:contain;"></td>
                <td><span class="badge bg-light text-dark text-capitalize"><?= Html::encode($m->posicion) ?></span></td>
                <td><?= Html::encode($m->mensaje) ?></td>
                <td>+<?= Html::encode($m->getWaNumero()) ?></td>
                <td>
                    <?= Html::a(
                        $m->activo ? '<span class="badge bg-success">Sí</span>' : '<span class="badge bg-secondary">No</span>',
                        ['toggle', 'id' => $m->id],
                        ['data' => ['method' => 'post']]
                    ) ?>
                </td>
                <td class="text-end">
                    <?= Html::a('<i class="fas fa-edit"></i>', ['update', 'id' => $m->id], ['class' => 'btn btn-sm btn-outline-primary me-1']) ?>
                    <?= Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $m->id], [
                        'class' => 'btn btn-sm btn-outline-danger',
                        'data'  => [
                            'confirm' => '¿Eliminar esta mascota?',
                            'method'  => 'post',
                        ],
                    ]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
