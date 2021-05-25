<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Folios */

$this->title = 'Actualizar información de folio: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Folios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="folios-update admin-panel container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
