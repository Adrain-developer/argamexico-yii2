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
                            <img width="300" height="300" src="<?= Yii::$app->homeUrl . $producto->pathImagen ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" sizes="(max-width: 300px) 100vw, 300px" />
                            <div class="overlay">
                                <div class="shop_metas">
                                    <a class="shop_link" href="#"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="lightbox-image shop_image" href="<?= Yii::$app->homeUrl . $producto->pathImagen ?>" data-group="1"><span class="fa fa-search"></span></a>
                                </div>

                            </div>
                        </div>
                        <div class="lower-content">
                            <h4><a href="#"><?= $producto->nombre ?></a></h4>
                            <div class="price">
                                <span class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span><?= $producto->precioUnitario ?></bdi></span></span>
                            </div>
                        </div>
                    </div>

                </a>
                <button href="#" data-quantity="1" class="button btn-danger product_type_simple add_to_cart_button ajax_add_to_cart" data-toggle="modal" data-target="#exampleModal">Cotizar</button>
            </div>
        </div>
    <?php } ?>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Aqui van los datos del producto a cotizar
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Solicitar cotización por e-mail</button>
      </div>
    </div>
  </div>
</div>