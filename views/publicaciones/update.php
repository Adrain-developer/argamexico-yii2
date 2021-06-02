<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Publicaciones */

$this->title = 'Actualizar publicación: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Publicaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="publicaciones-update container admin-panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'subsecciones' => $subsecciones
    ]) ?>

</div>
