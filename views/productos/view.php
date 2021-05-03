<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productos-view container">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
    <div class="col-sm-6">
        <p>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '¿Desea eliminar el producto?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>

    <div class="col-sm-6">
        <div class="img-view">
            <img src="<?= Yii::$app->homeUrl . $model->pathImagen ?>">
        </div>

    </div>
    </div>
    
    <div class="row">
    <div class="col-sm-12">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nombre',
                'descripcion:ntext',
                'precioUnitario'
            ],
        ]) ?>
    </div>
    </div>
    



</div>