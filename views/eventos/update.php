<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Eventos */

$this->title = 'Actualizar información del evento: ';
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="eventos-update container admin-panel">

    <h1><?= Html::encode($this->title) ?></h1>
    <h2><?= $model->nombre ?></h2>

    <?= $this->render('_form', [
        'model' => $model,
        'categorias' => $categorias
    ]) ?>

</div>
