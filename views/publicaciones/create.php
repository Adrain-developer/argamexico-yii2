<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Publicaciones */

$this->title = 'Registro de publicaciones';
$this->params['breadcrumbs'][] = ['label' => 'Publicaciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicaciones-create admin-panel container">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'subsecciones' => $subsecciones
    ]) ?>

</div>
