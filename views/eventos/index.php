<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Eventos/Cursos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventos-index container admin-panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Registrar nuevo evento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'descripcion:ntext',
            'fecha',

            [
                'label' => 'Opciones',
                'format' => 'html',
                'value' => function ($model) {
                    $urlUpdate =  Url::toRoute(['eventos/update?id='.$model->id]);
                    $urlView  =  Url::toRoute(['eventos/view?id='.$model->id]);
                    $urlDelete =  Url::toRoute(['eventos/delete?id='.$model->id]);
                    return "<a href=' $urlUpdate '><i class='fa fa-edit'></i></a>
                    <a href=' $urlView '><i class='fa fa-eye'></i></a>
                    <a href=' $urlDelete '><i class='fa fa-trash'></i></a>
                    ";
                }
              ],
        ],
    ]); ?>


</div>
