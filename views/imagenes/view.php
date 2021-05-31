<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Imagenes */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Imagenes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="imagenes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pathImagenIdxFire',
            'tituloIdxFire',
            'subtIdxFire',
            'textoIdxFire',
            'pathImagenIdxCons',
            'tituloIdxCons',
            'subtIdxCons',
            'textoIdxCons',
            'pathImagenIdxlabs',
            'tituloIdxlabs',
            'subtIdxlabs',
            'textoIdxlabs',
            'pathImagenIdxTr',
            'tituloIdxTr',
            'subtIdxTr',
            'textoIdxTr',
            'pathImagenIdxUno',
            'pathImagenIdxDos',
            'pathImagenIdxFireUno',
            'pathImagenIdxFireDos',
            'pathImagenIdxFireTres',
            'pathImagenBnrIdxCons',
            'tituloBnrIdxCons',
            'pathImagenBnrIdxLabs',
            'pathImagenFijasLabs',
            'pathImagenHigieneLabs',
            'pathImagenBnrIdxTraining',
            'tituloBnrIdxTraining',
            'pathImagenBnrContacto',
        ],
    ]) ?>

</div>
