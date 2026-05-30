<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$reorderUrl = Url::to(['reorder']);
$csrfParam  = Yii::$app->request->csrfParam;
$csrfToken  = Yii::$app->request->csrfToken;
?>

<h3 class="admin-section-title">Mascota Tigre</h3>
<div class="d-flex justify-content-between align-items-center mb-3">
    <p class="text-muted mb-0">Arrastra las filas <i class="fas fa-grip-vertical"></i> para reordenar cómo aparecen en el sitio.</p>
    <?= Html::a('<i class="fas fa-plus me-1"></i> Nueva mascota', ['create'], ['class' => 'btn btn-primary']) ?>
</div>

<?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success"><?= Yii::$app->session->getFlash('success') ?></div>
<?php endif; ?>

<div id="mascota-reorder-status" class="alert alert-info d-none py-2"></div>

<div class="table-responsive">
    <table class="table table-striped align-middle" id="mascota-table">
        <thead>
            <tr>
                <th style="width:36px"></th>
                <th>#</th>
                <th>Mascota</th>
                <th>Posición</th>
                <th>Mensaje</th>
                <th>WhatsApp</th>
                <th>Activo</th>
                <th class="text-end">Acciones</th>
            </tr>
        </thead>
        <tbody id="mascota-sortable">
        <?php foreach ($dataProvider->getModels() as $i => $m): ?>
            <tr draggable="true" data-id="<?= $m->id ?>">
                <td class="drag-handle text-muted" title="Arrastrar"><i class="fas fa-grip-vertical"></i></td>
                <td class="orden-cell"><?= $i + 1 ?></td>
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

<?php
$js = <<<JS
(function () {
  var tbody = document.getElementById('mascota-sortable');
  if (!tbody) return;
  var statusEl = document.getElementById('mascota-reorder-status');
  var dragRow = null;

  function renumber() {
    tbody.querySelectorAll('tr').forEach(function (tr, i) {
      var cell = tr.querySelector('.orden-cell');
      if (cell) cell.textContent = i + 1;
    });
  }

  function notify(msg, ok) {
    statusEl.textContent = msg;
    statusEl.className = 'alert py-2 ' + (ok ? 'alert-success' : 'alert-danger');
    setTimeout(function () { statusEl.classList.add('d-none'); }, 2500);
  }

  function persist() {
    var ids = Array.prototype.map.call(tbody.querySelectorAll('tr'), function (tr) {
      return tr.getAttribute('data-id');
    });
    var body = new FormData();
    ids.forEach(function (id) { body.append('ids[]', id); });
    body.append('$csrfParam', '$csrfToken');
    fetch('$reorderUrl', { method: 'POST', body: body, headers: { 'X-Requested-With': 'XMLHttpRequest' } })
      .then(function (r) { return r.json(); })
      .then(function (d) { notify(d && d.ok ? 'Orden actualizado.' : 'No se pudo guardar el orden.', !!(d && d.ok)); })
      .catch(function () { notify('Error de red al guardar el orden.', false); });
  }

  tbody.addEventListener('dragstart', function (e) {
    var tr = e.target.closest('tr');
    if (!tr) return;
    dragRow = tr;
    tr.classList.add('dragging');
    e.dataTransfer.effectAllowed = 'move';
  });

  tbody.addEventListener('dragend', function () {
    if (dragRow) dragRow.classList.remove('dragging');
    dragRow = null;
    renumber();
    persist();
  });

  tbody.addEventListener('dragover', function (e) {
    e.preventDefault();
    if (!dragRow) return;
    var target = e.target.closest('tr');
    if (!target || target === dragRow) return;
    var rect = target.getBoundingClientRect();
    var after = (e.clientY - rect.top) > rect.height / 2;
    tbody.insertBefore(dragRow, after ? target.nextSibling : target);
  });
})();
JS;
$this->registerJs($js, \yii\web\View::POS_END);
?>
