<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FoliosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Folios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="folios-index container admin-panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar nuevo folio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nombre',
            'descripcion:ntext',
            'tipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
