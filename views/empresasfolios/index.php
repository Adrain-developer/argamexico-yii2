<?php

use yii\helpers\Url;
use yii\helpers\Html;
?>

<?php
/* @var $this yii\web\View */

?>
<link rel='stylesheet' href='<?= Yii::$app->homeUrl ?>js/datatables/datatables.min.css' type='text/css' media='all' />
<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>js/datatables/datatables.min.js'></script>

<div class="container admin-panel">
<h3>Folios DS3</h3>
<?php if (!Yii::$app->user->isGuest) { ?>
  <p>
    <?= Html::a('Registrar nueva empresa', ['empresas/create'], ['class' => 'btn btn-success']) ?>
  </p>
  <?php } ?>
  
  <table class="table table-striped" id="table-ds3">
    <thead>
      <tr>
        <th>Empresa</th>
        <th>Folio</th>
        <?php if (!Yii::$app->user->isGuest) { ?>
          <th>Opciones</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($empresas as $empresa) { ?>
        <tr>
          <td><?= $empresa->empresa->nombre ?></td>
          <td><?= $empresa->folio->nombre ?></td>
          <?php if (!Yii::$app->user->isGuest) { ?>
            <td><a href="<?= Url::toRoute(['delete', 'id' => $empresa->id]) ?>">Eliminar</a></td>
          <?php } ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<script>
  jQuery("#table-ds3").DataTable();
</script>