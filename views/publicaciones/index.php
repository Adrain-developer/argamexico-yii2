<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PublicacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Publicaciones de '. $tipo;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="publicaciones-index admin-panel container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar publicación', ['create', 'tipo' => $tipo], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre:ntext',
            'descripcion:ntext',
            'seccion',
            'pathImagen',
            //'estatus',
            [
                'label' => 'Opciones',
                'format' => 'html',
            'value' => function ($model) {
                $urlUpdate =  Url::toRoute(['publicaciones/update?id='.$model->id]);
                $urlView  =  Url::toRoute(['publicaciones/view?id='.$model->id]);
                $urlDelete =  Url::toRoute(['publicaciones/delete?id='.$model->id]);
                return "<a href=' $urlUpdate '><i class='fa fa-edit'></i></a>
                <a href=' $urlDelete '><i class='fa fa-trash'></i></a>
                ";
            }
            ]
        ],
    ]); ?>


</div>
