

<section class="inner-banner" style="background-image: url('/img/pagetitle.jpg');">

    <div class="container">
        <h2 class="inner-banner__title">Indext Shop Page</h2><!-- /.inner-banner__title -->
        <ul class="list-unstyled thm-breadcrumb">
            <li class="breadcrumb-item"><a href="../index.html">Home &nbsp;</a></li>
            <li class="breadcrumb-item">Shop</li>
        </ul><!-- /.thm-breadcrumb -->
    </div><!-- /.container -->
</section>

<section class="mr_shop blog-classic">
	<div class="container">		

			<div class="content-side col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
				<div class="our-shop">

					<!--Sort By-->
					<div class="items-sorting row  mr_shop_sorting">
						<div class="text">
							<p class="woocommerce-result-count">
								Mostrando <?= count($productos) ?> productos</p>
						</div>
						<div class="woocommerce-form">
							<div class="woocommerce-notices-wrapper"></div>
							<form class="woocommerce-ordering" method="get">
								<select name="orderby" class="orderby" aria-label="Shop order">
									<option value="menu_order" selected='selected'>Default sorting</option>
									<option value="popularity">Sort by popularity</option>
									<option value="date">Sort by latest</option>
									<option value="price">Sort by price: low to high</option>
									<option value="price-desc">Sort by price: high to low</option>
								</select>
								<input type="hidden" name="paged" value="1" />
							</form>
						</div>
					</div>




					<div class="row clearfix">


                    <?php foreach($productos as $producto){ ?>
						<div class="col-lg-4 col-md-12">
							<div class="product-block-two">
								<a href="../product/album/index.html"
									class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
									<div class="inner-box">
										<div class="image">
											<img width="300" height="300"
												src="<?= Yii::$app->homeUrl . $producto->pathImagen ?>"
												class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
												alt="" loading="lazy"
												sizes="(max-width: 300px) 100vw, 300px" />
											<div class="overlay">
												<div class="shop_metas">
													<a class="shop_link" href="../product/album/index.html"><i
															class="fa fa-shopping-cart"></i></a>
													<a class="lightbox-image shop_image"
														href="<?= Yii::$app->homeUrl . $producto->pathImagen ?>"
														data-group="1"><span class="fa fa-search"></span></a>
												</div>

											</div>
										</div>
										<div class="lower-content">
											<h4><a href="../product/album/index.html"><?= $producto->nombre ?></a></h4>
											<div class="price">
												<span class="price"><span
														class="woocommerce-Price-amount amount"><bdi><span
																class="woocommerce-Price-currencySymbol">&#36;</span><?= $producto->precioUnitario ?></bdi></span></span>
											</div>
										</div>
									</div>

								</a><a href="index41d8.html?add-to-cart=813" data-quantity="1"
									class="button product_type_simple add_to_cart_button ajax_add_to_cart"
									data-product_id="813" data-product_sku="woo-album"
									aria-label="Add &ldquo;Album&rdquo; to your cart" rel="nofollow">Cotizar</a>
							</div>
						</div>           
					<?php } ?>

						


					</main>
				</div>
			</div>
		</div>


	</div>
	</div>
</section>
<div class="clearfix"></div>