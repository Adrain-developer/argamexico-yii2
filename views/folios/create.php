<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Folios */

$this->title = 'Registro de nuevo folio';
$this->params['breadcrumbs'][] = ['label' => 'Folios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="folios-create container admin-panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
