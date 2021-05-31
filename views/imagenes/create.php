<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Imagenes */

$this->title = 'Editar Página';
$this->params['breadcrumbs'][] = ['label' => 'Imagenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container imagenes-create">
    <br>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
