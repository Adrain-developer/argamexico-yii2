<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImagenesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Imagenes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagenes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Imagenes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pathImagenIdxFire',
            'tituloIdxFire',
            'subtIdxFire',
            'textoIdxFire',
            //'pathImagenIdxCons',
            //'tituloIdxCons',
            //'subtIdxCons',
            //'textoIdxCons',
            //'pathImagenIdxlabs',
            //'tituloIdxlabs',
            //'subtIdxlabs',
            //'textoIdxlabs',
            //'pathImagenIdxTr',
            //'tituloIdxTr',
            //'subtIdxTr',
            //'textoIdxTr',
            //'pathImagenIdxUno',
            //'pathImagenIdxDos',
            //'pathImagenIdxFireUno',
            //'pathImagenIdxFireDos',
            //'pathImagenIdxFireTres',
            //'pathImagenBnrIdxCons',
            //'tituloBnrIdxCons',
            //'pathImagenBnrIdxLabs',
            //'pathImagenFijasLabs',
            //'pathImagenHigieneLabs',
            //'pathImagenBnrIdxTraining',
            //'tituloBnrIdxTraining',
            //'pathImagenBnrContacto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
