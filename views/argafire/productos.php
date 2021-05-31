<?php

use yii\helpers\Url;

?>

<div class="text">
    <p class="woocommerce-result-count">
        Mostrando <?= count($productos) ?> productos</p>
</div>
<br>
<div class="row">
    <?php foreach ($productos as $producto) { ?>
        <div class="col-4">
            <div class="product-block-two">
                <a href="../product/album/index.html" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                    <div class="inner-box">
                        <div class="image">
                            <img id="producto-img-<?= $producto->id ?>" width="300" height="300" src="<?= Yii::$app->homeUrl . $producto->pathImagen ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" sizes="(max-width: 300px) 100vw, 300px" />
                            <div class="overlay">
                                <div class="shop_metas">
                                    <a class="lightbox-image shop_image" href="<?= Url::toRoute('/argafire/detalle?id='.$producto->id) ?>" data-group="1" title="Ver detalle del producto"><span class="fa fa-eye"></span></a>
                                </div>

                            </div>
                        </div>
                        <div class="lower-content">
                            <h4><a href="#" id="producto-nombre-<?= $producto->id ?>"><?= $producto->nombre ?></a></h4>                            
                        </div>
                    </div>

                </a>
                <button href="#" data-quantity="1" class="button btn-primary product_type_simple add_to_cart_button ajax_add_to_cart"  title="Agregar a lista de cotización" onclick="addProducto(<?= $producto->id ?>)">+ Cotizar</button>
            </div>
        </div>
    <?php } ?>
</div>
