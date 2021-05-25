<?php 
use yii\helpers\Url;
use yii\helpers\Html;
?>

<?php
/* @var $this yii\web\View */
?> 
<div class="container admin-panel">
<p>
        <?= Html::a('Registrar nueva empresa', ['empresas/create'], ['class' => 'btn btn-success']) ?>
    </p>
<table class="table table-striped">
    <thead>
      <tr>
        <th>Empresa</th>
        <th>Folio</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach($empresas as $empresa){ ?>
        <tr>
        <td><?= $empresa->empresa->nombre ?></td>
        <td><?= $empresa->folio->nombre ?></td>
        <td><a href="<?= Url::toRoute(['delete', 'id' => $empresa->id]) ?>">Eliminar</a></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
</div>