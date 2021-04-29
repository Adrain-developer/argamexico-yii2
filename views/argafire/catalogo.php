
<?php

use yii\helpers\Url;

?>

<style>

.header-navigation ul.navigation-box>li>.submenu>li:hover>a,
	.thm-btn,
	.service-one__single:hover .service-one__single-inner,
	.project-one .owl-theme .owl-dots .owl-dot.active span,
	.video-one__btn,
	.cta-one,
	.blog-one__meta a:first-child:hover,
	.footer-widget__links li a:after,
	.service-two__carousel .owl-dots .owl-dot:hover span,
	.service-two__carousel .owl-dots .owl-dot.active span,
	.video-two__btn,
	.testimonials-three .owl-theme .owl-dots .owl-dot.active span,
	.site-header__header-four .site-header__qoute-btn:hover,
	.blog-one__carousel .owl-dots .owl-dot:hover span,
	.blog-one__carousel .owl-dots .owl-dot.active span,
	.history-one__sep:before,
	.header-navigation ul.navigation-box>li>ul>li>.submenu>li:hover>a,
	.post-filter li span:before,
	.service-details__list li:hover a,
	.service-details__list li.active a,
	.tagcloud a,
	.mrsidebar .subscribe-widget .theme-btn.style-four,
	.pagination li span,
	.pagination li:hover a {
		background: #ff0505 !important;
		background-color: #ff000c !important;
	}

	.block-title__tag-line,
	.topbar-one__social a:hover,
	.topbar-one__link i,
	.site-header__header-one .header-navigation ul.navigation-box>li.current>a,
	.site-header__header-one .header-navigation ul.navigation-box>li:hover>a,
	.about-one__feature-icon,
	.about-one__feature-title a:hover,
	.block-title__base,
	.about-two__list li i,
	.service-one__single i,
	.feature-one__title a:hover,
	.blog-one__meta a:first-child,
	.footer-widget__links li:hover a,
	.site-footer__copy a,
	.site-footer__links a:hover,
	.video-two .feature-one__icon i,
	.about-six__fact-counter,
	.history-one__year,
	.project-one.project-one__home-two.project-one__project-page-two .project-one__title a:hover,
	.project-one__project-page-two .project-one__category,
	.project-details__social a:hover,
	.service-details__feature-list li i,
	.sidebar__search button[type=submit],
	.sidebar__post-date,
	.error-search-form button[type=submit],
	.contact-info-one [class*=indext-icon-],
	.service-one.service-page-one.service-one__home-four .service-one__single:hover i {
		color: #ff000c !important;
	}


</style>

<section class="inner-banner" style="background-image: url(<?= Url::toRoute(['web/images/AF3.jpg']); ?>);">

    <div class="container">
        <h2 class="inner-banner__title">PRODUCTOS</h2><!-- /.inner-banner__title -->
        <ul class="list-unstyled thm-breadcrumb">
            <li class="breadcrumb-item"><a href="<?= Url::toRoute('./index.php') ?>">INICIO &nbsp;</a></li>
            <li class="breadcrumb-item">Productos</li>
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
									<option value="menu_order" selected='selected'>Todos</option>
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
													<a class="shop_link" href="#"><i
															class="fa fa-shopping-cart"></i></a>
													<a class="lightbox-image shop_image"
														href="<?= Yii::$app->homeUrl . $producto->pathImagen ?>"
														data-group="1"><span class="fa fa-search"></span></a>
												</div>

											</div>
										</div>
										<div class="lower-content">
											<h4><a href="#"><?= $producto->nombre ?></a></h4>
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