<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administración de productos';
$this->params['breadcrumbs'][] = $this->title;
?>

<link rel='stylesheet' href='<?= Yii::$app->homeUrl ?>js/datatables/datatables.min.css' type='text/css' media='all' />
<script type='text/javascript' src='<?= Yii::$app->homeUrl ?>js/datatables/datatables.min.js'></script>

<div class="productos-index container admin-panel">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Agregar nuevo producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //'id',
            'nombre',
            'descripcion:ntext',
            'precioUnitario',
            'pathImagen',
            [       
                'label' => 'Categoría',
                'value' => 'categoria.nombre',
            ],
            [
                'label' => 'Opciones',
                'format' => 'html',
                'value' => function ($model) {
                    $urlUpdate =  Url::toRoute(['productos/update?id='.$model->id]);
                    $urlView  =  Url::toRoute(['productos/view?id='.$model->id]);
                    $urlDelete =  Url::toRoute(['productos/delete?id='.$model->id]);
                    return "<a href=' $urlUpdate '><i class='fa fa-edit'></i></a>
                    <a href=' $urlView '><i class='fa fa-eye'></i></a>
                    <a href=' $urlDelete '><i class='fa fa-trash'></i></a>
                    ";
                }
              ],
        ],
    ]); ?>
    


</div>
<script>
  jQuery("table").DataTable({
    responsive: true
  });
</script>