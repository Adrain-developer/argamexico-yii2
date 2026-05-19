<?php

use yii\helpers\Html;
use yii\helpers\Url;

?>


<section class="inner-banner" style="background-image: url(<?= (Yii::$app->homeUrl . $rutas->pathImagenIdxFire) ?>);">

    <div class="container">
        <h2 class="inner-banner__title"><?= $producto->nombre ?></h2><!-- /.inner-banner__title -->
        <ul class="list-unstyled thm-breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Url::toRoute(['/site/index']); ?>">Inicio &nbsp;</a></li>
            <li class="breadcrumb-item">Detalle de producto</li>
        </ul><!-- /.thm-breadcrumb -->
    </div><!-- /.container -->
</section>



<section class="mr_shop_single">
    <div class="container">
        <div class="row">



            <div class="content-side col-xs-12 col-sm-12 col-md-12 ">

                <div class="shop-content mr_single_content">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <nav class="woocommerce-breadcrumb"><a href="<?= Url::toRoute(['/site/index']); ?>">Inicio</a>&nbsp;&#47;&nbsp;<a href="<?= Url::toRoute(['/argafire/catalogo']); ?>">Productos</a>&nbsp;&#47;&nbsp;<a href="<?= Url::toRoute(['/argafire/catalogo']); ?>">Categoría</a></nav>
                            <div class="woocommerce-notices-wrapper"></div>
                            <div id="product-813" class="post-813 product type-product status-publish has-post-thumbnail product_cat-music first instock downloadable virtual purchasable product-type-simple">
                                <div class="single-shop-content">
                                    <div class="row clearfix">
                                        <div class="col-lg-4 pe-lg-5">
                                            <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="transition: opacity .25s ease-in-out;">
                                                <figure class="woocommerce-product-gallery__wrapper">
                                                    <div data-thumb="#" data-thumb-alt="" class="woocommerce-product-gallery__image"><a href="<?= (Yii::$app->homeUrl . $producto->pathImagen) ?>">
                                                    <img id="producto-img-<?= $producto->id ?>" width="300" height="300" src="<?= Yii::$app->homeUrl . $producto->pathImagen ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" sizes="(max-width: 300px) 100vw, 300px" /></a>
                                                    </div>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">

                                            <div class="content-box">
                                                <h2 itemprop="name"><?= $producto->nombre ?></h2>
                                                <div class="review-box">
                                                </div>
                                                <p class="price"><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span> <?= number_format($producto->precioUnitario, 2, '.', ',') ?></bdi></span></p>
                                                <div class="text">
                                                    <div class="woocommerce-product-details__short-description">
                                                        <p></p>
                                                    </div>
                                                </div>
                                                <div class="cart-wrapper">


                                                    <form class="cart" action="#" method="post" enctype='multipart/form-data'>

                                                        <div class="quantity">
                                                            <label class="screen-reader-text" for="quantity_606688f055688">Album quantity</label>
                                                            <input type="number" id="quantity_606688f055688" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" placeholder="" inputmode="numeric" />
                                                        </div>
                                                        <div class="cart-btn">
                                                            <button type="submit" name="add-to-cart" value="813" class="theme-btn-one">Agregar a carrito</button>
                                                        </div>
                                                    </form>


                                                </div>

                                               <!-- <div class="category">
                                                    <div class="product_meta">



                                                        <span class="sku_wrapper">SKU: <span class="sku">woo-album</span></span>


                                                        <span class="posted_in">Category: <a href="../../product-category/music/index.html" rel="tag">Music</a></span>


                                                    </div>
                                                </div> -->
                                            </div>

                                        </div><!-- .summary -->
                                    </div>
                                </div>

                                <div class="woocommerce-tabs wc-tabs-wrapper">
                                    <!--<ul class="tabs wc-tabs">
                                        <li class="description_tab">
                                            <a href="#tab-description">Description</a>
                                        </li>
                                    </ul>-->
                                    <div class="panel entry-content wc-tab" id="tab-description">

                                        <h2>Description</h2>

                                        <p><?= $producto->descripcion ?></p>
                                    </div>
                                </div>


                               <!-- <div class="related-product">

                                    <div class="shop-page-title">
                                        <div class="title">Related Products</div>
                                    </div>

                                    <div class="row clearfix">


                                        <div class="col-lg-4 col-md-12">
                                            <div class="product-block-two">
                                                <a href="../single/index.html" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                                    <div class="inner-box">
                                                        <div class="image">
                                                            <img width="300" height="300" src="../../wp-content/uploads/2021/01/single-1-300x300.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" srcset="https://old4.commonsupport.com/update/indext/wp-content/uploads/2021/01/single-1-300x300.jpg 300w, https://old4.commonsupport.com/update/indext/wp-content/uploads/2021/01/single-1-100x100.jpg 100w, https://old4.commonsupport.com/update/indext/wp-content/uploads/2021/01/single-1-600x600.jpg 600w, https://old4.commonsupport.com/update/indext/wp-content/uploads/2021/01/single-1-150x150.jpg 150w, https://old4.commonsupport.com/update/indext/wp-content/uploads/2021/01/single-1-768x768.jpg 768w, https://old4.commonsupport.com/update/indext/wp-content/uploads/2021/01/single-1-80x80.jpg 80w, https://old4.commonsupport.com/update/indext/wp-content/uploads/2021/01/single-1.jpg 800w" sizes="(max-width: 300px) 100vw, 300px" />
                                                            <div class="overlay">
                                                                <div class="shop_metas">
                                                                    <a class="shop_link" href="../single/index.html"><i class="fa fa-shopping-cart"></i></a>
                                                                    <a class="lightbox-image shop_image" href="../../wp-content/uploads/2021/01/single-1.jpg" data-group="1"><span class="fa fa-search"></span></a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="lower-content">
                                                            <h4><a href="../single/index.html">Single</a></h4>
                                                            <div class="price">
                                                                <span class="price"><del><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>3</bdi></span></del> <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">&#36;</span>2</bdi></span></ins></span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </a><a href="indexe903.html?add-to-cart=1627" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="1627" data-product_sku="woo-single" aria-label="Add &ldquo;Single&rdquo; to your cart" rel="nofollow">Add to cart</a>
                                            </div>
                                        </div>

                                    </div>

                                </div> -->

                            </div><!-- #product-813 -->
                        </main>
                    </div>
                </div>

            </div>


        </div>
    </div>
</section>
<div class="clearfix"></div>