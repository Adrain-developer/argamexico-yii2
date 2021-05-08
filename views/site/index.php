<?php

/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'ARGA México';
?>

<style>
	.elementor-782 .elementor-element.elementor-element-5349fbb {
		padding: 0px 0px 0px 0px;
	}

	.video-two__home-5 {
		background-color: #000000;
	}

	.site-header__header-one .header-navigation ul.navigation-box>li.current>a,
	.site-header__header-one .header-navigation ul.navigation-box>li:hover>a {

		color: #751004 !important;
	}

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


	.service-one__cog {
		position: absolute;
		top: -80px;
		left: -80px;
		opacity: 0.25;
		animation: cogMove 10s linear infinite;
	}

	.service-one {
		background-color: #000000;
		padding-top: 110px;
		position: relative;
		margin-bottom: 160px;
	}
</style>



<div data-elementor-type="wp-page" data-elementor-id="16" class="elementor elementor-16" data-elementor-settings="[]">
	<div class="elementor-inner">
		<div class="elementor-section-wrap">
			<section class="elementor-section elementor-top-section elementor-element elementor-element-9d8c386 elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="9d8c386" data-element_type="section">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-971f256" data-id="971f256" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-e88a03c elementor-widget elementor-widget-indext_theme_slider5" data-id="e88a03c" data-element_type="widget" data-widget_type="indext_theme_slider5.default">
										<div class="elementor-widget-container">
											<section class=" slider-two slider-two__home-five">
												<div class="slider-two__carousel owl-carousel owl-theme">
													<div class="item slider-two__slider-1" style="background-image: url(web/images/bannerlabs.jpg);">
														<div class="container">
															<h2 class="slider-one__title">
																<span class="slider-two__linear-text">ARGA Labs llega a todos los estados</span> <br>
																de la República Mexicana
															</h2>
															<p class="slider-one__text">con Laboratorios Certificados ante la <strong>NOM-154-SCFI-2005</strong></p>
															<!-- /.slider-two__text -->
															<a href="<?= Url::toRoute(['argalabs/index']); ?>" class="thm-btn slider-two__btn">Conocer más</a>

														</div>

													</div>

													<div class="item slider-two__slider-1" style="background-image: url(web/images/bannerConsultores.jpg);">
														<div class="container">
															<h2 class="slider-one__title">
																<span class="slider-two__linear-text">En ARGA Consultores</span> <br>
																Evaluamos las condiciones de trabajo
															</h2>
															<p class="slider-one__text">En el ambiente laboral.</p>
															<!-- /.slider-two__text -->
															<a href="<?= Url::toRoute(['argaconsultores/index']); ?>" class="thm-btn slider-two__btn">Conocer más</a>

														</div>

													</div>

													<div class="item slider-two__slider-1" style="background-image: url(web/images/3.jpg);">
														<div class="container">
															<h2 class="slider-one__title">
																<span class="slider-two__linear-text"> En ARGA Traning</span> <br>
																Encontraras una extensa cartera de cursos
															</h2>
															<p class="slider-one__text">Registrados ante la <strong>STPS</strong></p>
															<!-- /.slider-two__text -->
															<a href="<?= Url::toRoute(['argatraning/index']); ?>" class="thm-btn slider-two__btn">Conocer más</a>

														</div>

													</div>

												</div>
											</section><!-- /.slider-two -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="elementor-section elementor-top-section elementor-element elementor-element-6f3e6f48 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="6f3e6f48" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-2ea035f4" data-id="2ea035f4" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-6c29879f elementor-widget elementor-widget-indext_about" data-id="6c29879f" data-element_type="widget" data-widget_type="indext_about.default">
										<div class="elementor-widget-container">
											<section class=" about-one">
												<div class="container">
													<div class="about-one__inner-container wow fadeInUp" data-wow-duration="2000ms" data-wow-offset="560">
														<div class="row no-gutters">
															<div class="col-xl-8 col-lg-12">
																<div class="about-one__content">
																	<div class="block-title">
																		<p class="block-title__tag-line">En ARGA Group México</p><!-- /.block-title__tag-line -->
																		<h3 class="block-title__title">Somos tus mejores socios estrategicos
																			<br>
																			<spam class="block-title__bold">En el control total de perdidas.</spam>
																		</h3><!-- /.block-title__title -->
																	</div><!-- /.block-title -->
																	<div class="row no-gutters">



																		<div class="col-xl-6 col-lg-6">
																			<div class="about-one__feature">
																				<i class="about-one__feature-icon icon fa fa-users"></i>
																				<!-- /.about-one__feature-icon -->
																				<h2 class="about-one__feature-title"><a href="#">Somos un grupo</a>
																				</h2><!-- /.about-one__feature-title -->
																				<p class="about-one__feature-text">Que brinda servicios integrales en seguridad, medio ambiente y administración de riesgos operacionales</p>
																				<!-- /.about-one__feature-text -->
																			</div><!-- /.about-one__feature -->
																		</div><!-- /.col-lg-6 -->



																		<div class="col-xl-6 col-lg-6">
																			<div class="about-one__feature">
																				<i class="about-one__feature-icon icon fa fa-sitemap"></i>
																				<!-- /.about-one__feature-icon -->
																				<h2 class="about-one__feature-title"><a href="#">Nuestras Divisiones</a>
																				</h2><!-- /.about-one__feature-title -->
																				<p class="about-one__feature-text">
																					<li><strong>ARGA</strong> Consultoría</li>
																					<li><strong>ARGA</strong> Fire</li>
																					<li><strong>ARGA</strong> Training</li>
																					<li><strong>ARGA</strong> Labs</li>
																				</p>
																				<!-- /.about-one__feature-text -->
																			</div><!-- /.about-one__feature -->
																		</div><!-- /.col-lg-6 -->

																	</div><!-- /.row -->
																</div><!-- /.about-one__content -->
															</div><!-- /.col-lg-8 -->
															<div class="col-xl-4 col-lg-12">
																<img src="./web/images/6.jpg" class="about-one__image" alt="about image">
															</div><!-- /.col-lg-4 -->
														</div><!-- /.row -->
													</div><!-- /.about-one__inner-container -->
												</div><!-- /.container -->
											</section>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<div class="elementor-container elementor-column-gap-no">
				<div class="elementor-row">
					<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-7fd037ee" data-id="7fd037ee" data-element_type="column">
						<div class="elementor-column-wrap elementor-element-populated">
							<div class="elementor-widget-wrap">
								<div class="elementor-element elementor-element-51361733 elementor-widget elementor-widget-indext_services" data-id="51361733" data-element_type="widget" data-widget_type="indext_services.default">

									<div class="elementor-widget-container">

										<section class=" service-one">
											<img src="<?= Yii::$app->homeUrl ?>web/images/cog-1-1.png" class="service-one__cog" alt="">
											<!--<img src="<?= Yii::$app->homeUrl ?>web/images/cog-1-1.png" class="service-one__moc" alt="">-->
											<div class="container">
												<div class="row">
													<div class="col-lg-4">
														<div class="service-one__title-block">
															<div class="block-title">
																<p class="block-title__tag-line">Divisiones</p><!-- /.block-title__tag-line -->
																<h3 class="block-title__title">ARGA Group<br>
																	<span class="block-title__bold">México</span>
																</h3><!-- /.block-title__title -->
																<p class="block-title__text">Respaldada por profesionales con más de 17 años de experiencia en el ámbito de la seguridad industrial, salud ocupacional, protección ambiental, seguridad patrimonial, emergencia y desarrollo humano.</p><!-- /.block-title__text -->
															</div><!-- /.block-title -->
														</div><!-- /.service-one__title-block -->
													</div><!-- /.col-lg-4 -->
													<div class="col-lg-8">
														<div class="service-one__content">


														<div class="service-one__single col-12 ">
																<div class="service-one__single-inner">
																	<i class="icon fa fa-fire-extinguisher"></i><!-- /.indext-icon-service-1-1 -->
																	<h2 class="service-one__title"><a href="<?= Url::toRoute(['argafire/index']); ?>">ARGA<br>Fire</a></h2>
																	<!-- /.service-one__title -->
																	<p class="service-one__text">Mantenimiento y recarga<br>Equipos de emergencia.

																	</p><!-- /.service-one__text -->
																</div><!-- /.service-one__single-inner -->
															</div><!-- /.service-one__single -->


														<div class="service-one__single col-12 ">
																<div class="service-one__single-inner">
																	<i class="icon fa fa-building"></i><!-- /.indext-icon-service-1-1 -->
																	<h2 class="service-one__title"><a href="<?= Url::toRoute(['argaconsultores/index']); ?>">ARGA<br>Consultores</a></h2>
																	<!-- /.service-one__title -->
																	<p class="service-one__text">Estudios para evaluar <br>Condiciones de trabajo.

																	</p><!-- /.service-one__text -->
																</div><!-- /.service-one__single-inner -->
															</div><!-- /.service-one__single -->


														<div class="service-one__single col-12 ">
																<div class="service-one__single-inner">
																	<i class="icon fa fa-cogs"></i><!-- /.indext-icon-service-1-1 -->
																	<h2 class="service-one__title"><a href="<?= Url::toRoute(['argatraining/index']); ?>">ARGA<br>Training</a></h2>
																	<!-- /.service-one__title -->
																	<p class="service-one__text">Cursos registrados ante<br><strong>STPS</strong>

																	</p><!-- /.service-one__text -->
																</div><!-- /.service-one__single-inner -->
															</div><!-- /.service-one__single -->


														<div class="service-one__single col-12 ">
																<div class="service-one__single-inner">
																	<i class="icon fa fa-flask"></i><!-- /.indext-icon-service-1-1 -->
																	<h2 class="service-one__title"><a href="<?= Url::toRoute(['argalabs/index']); ?>">ARGA<br>Labs</a></h2>
																	<!-- /.service-one__title -->
																	<p class="service-one__text">Fuentes fijas<br>Higiene laboral

																	</p><!-- /.service-one__text -->
																</div><!-- /.service-one__single-inner -->
															</div><!-- /.service-one__single -->

														</div><!-- /.service-one__content -->
													</div><!-- /.col-lg-8 -->
												</div><!-- /.row -->
											</div><!-- /.container -->
										</section><!-- /.service-one -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			</section>

			<section class="elementor-section elementor-top-section elementor-element elementor-element-e007d46 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="e007d46" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4dad43e7" data-id="4dad43e7" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-4fc86934 elementor-widget elementor-widget-indext_project_slide" data-id="4fc86934" data-element_type="widget" data-widget_type="indext_project_slide.default">
										<div class="elementor-widget-container">
											<section class=" project-one">
												<div class="container">
													<div class="block-title text-center">
														<p class="block-title__tag-line">ARGA Fire</p><!-- /.block-title__tag-line -->
														<h3 class="block-title__title">Comprometidos con la
															<br>
															<span class="block-title__bold">Seguridad empresarial</span>
														</h3><!-- /.block-title__title -->
													</div><!-- /.block-title -->
													<div class="project-one__carousel owl-carousel owl-theme">


														<div class="item">
															<div class="project-one__single">
																<?= Html::img(Yii::$app->homeUrl . "web/images/AF1.jpg") ?>
																<div class="project-one__content">
																	<h2 class="project-one__title"><a href="<?= Url::toRoute(['argafire/normativa']);?>">Servicio de<br>Mantenimiento y<br>Recarga de equipos de emergencia</a></h2><!-- /.project-one__title -->
																</div><!-- /.project-one__content -->
															</div><!-- /.project-one__single -->
														</div><!-- /.item -->

														<div class="item">
															<div class="project-one__single">
																<?= Html::img(Yii::$app->homeUrl . "web/images/AR3.jpg") ?>
																<div class="project-one__content">
																	<h2 class="project-one__title"><a href="<?= Url::toRoute(['argafire/acreditacion']);?>">Conoce las acreditaciones que ARGA <strong>Fire</strong> tiene para Uds</a></h2><!-- /.project-one__title -->
																</div><!-- /.project-one__content -->
															</div><!-- /.project-one__single -->
														</div><!-- /.item -->


														<div class="item">
															<div class="project-one__single">
																<?= Html::img(Yii::$app->homeUrl . "web/images/AF2.jpg") ?>
																<div class="project-one__content">
																	<h2 class="project-one__title"><a href="<?= Url::toRoute(['argafire/catalogo']);?>">Conoce nuestra amplia gama de productos de emergencia para la industria</a></h2><!-- /.project-one__title -->
																</div><!-- /.project-one__content -->
															</div><!-- /.project-one__single -->
														</div><!-- /.item -->
													</div><!-- /.project-one__carousel owl-carousel owl-theme -->
												</div><!-- /.container -->
											</section><!-- /.project-one -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="elementor-section elementor-top-section elementor-element elementor-element-7be5cbb elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="7be5cbb" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-72600e7" data-id="72600e7" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-35e48a7 elementor-widget elementor-widget-indext_calltoaction4" data-id="35e48a7" data-element_type="widget" data-widget_type="indext_calltoaction4.default">
										<div class="elementor-widget-container">
											<section class=" cta-three text-center" style="background-image: url(<?= Url::toRoute(['web/images/AC.jpg']); ?>);">
												<div class="container">
													<h2 class="cta-three__title">ARGA Consultores
													</h2><!-- /.cta-three__title -->
													<p class="cta-three__text">Con más de 17 años de experiencia

													</p>
													<!-- /.cta-three__text -->
													<a href="<?= Url::toRoute(['argaconsultores/index']); ?>" class="cta-three__btn thm-btn">Conocer más</a><!-- /.thm-btn -->
												</div><!-- /.container -->
											</section>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>


			<div data-elementor-type="wp-page" data-elementor-id="782" class="elementor elementor-782" data-elementor-settings="[]">
				<div class="elementor-inner">
					<div class="elementor-section-wrap">
						<section class="elementor-section elementor-top-section elementor-element elementor-element-5349fbb elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="5349fbb" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
							<div class="elementor-container elementor-column-gap-no">
								<div class="elementor-row">
									<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4b6c02c" data-id="4b6c02c" data-element_type="column">
										<div class="elementor-column-wrap elementor-element-populated">
											<div class="elementor-widget-wrap">
												<div class="elementor-element elementor-element-0c492c2 elementor-widget elementor-widget-indext_video" data-id="0c492c2" data-element_type="widget" data-widget_type="indext_video.default">
													<div class="elementor-widget-container">

														<section class=" video-two video-two__home-5 video-two__home-4">
															<div class="container">
																<div class="row no-gutters justify-content-between">
																	<div class="col-lg-6">
																		<div class="feature-one__block">
																			<div class="block-title">
																				<p class="block-title__tag-line">ARGA labs</p><!-- /.block-title__tag-line -->
																				<h3 class="block-title__title"> <span class="block-title__bold">Normativas para la industria.
																					</span>
																				</h3><!-- /.block-title__title -->
																				<p class="block-title__text">Pensando en la seguridad e higiene laboral.</p>
																				<!-- /.block-title__text -->
																			</div><!-- /.block-title -->


																			<div class="feature-one__single">
																				<div class="feature-one__icon">
																					<i class="icon fa fa-cloud"></i><!-- /.indext-icon-cta-1-1 -->
																				</div><!-- /.feature-one__icon -->
																				<div class="feature-one__content">
																					<h2 class="feature-one__title">
																						<a href="<?= Url::toRoute(['argalabs/evaluaciones']);?>">
																							Fuentes fijas y emisiones a la atmósfera.
																					</h2><!-- /.feature-one__title -->
																					<p class="feature-one__text">Ver las Normativas.</p></a><!-- /.feature-one__text -->
																				</div><!-- /.feature-one__content -->
																			</div><!-- /.feature-one__single -->


																			<div class="feature-one__single">
																				<div class="feature-one__icon">
																					<i class="icon fa fa-shower"></i><!-- /.indext-icon-cta-1-1 -->
																				</div><!-- /.feature-one__icon -->
																				<div class="feature-one__content">
																					<h2 class="feature-one__title">
																						<a href="<?= Url::toRoute(['/argalabs/higiene']);?>">
																							Higiene laboral.
																					</h2><!-- /.feature-one__title -->
																					<p class="feature-one__text">Ver las Normativas.</p></a><!-- /.feature-one__text -->
																				</div><!-- /.feature-one__content -->
																			</div><!-- /.feature-one__single -->

																		</div><!-- /.feature-one__block -->
																	</div><!-- /.col-lg-6 -->
																	<div class="col-lg-5">
																		<div class="video-two__image">
																			<?= Html::img(Yii::$app->homeUrl . "web/images/AL1.jpg") ?>
																			<a class="video-two__btn hvr-pulse html5lightbox" href="https://www.youtube.com/watch?v=Get7rqXYrbQ"><i class="fa fa-play"></i><!-- /.fa fa-play --></a>
																		</div><!-- /.video-two__image -->
																	</div><!-- /.col-lg-6 -->
																</div><!-- /.row no-gutters -->
															</div><!-- /.container -->
														</section><!-- /.video-two -->
														<section class="video-two__home-4-title">
															<div class="container">
																<h2 class="video-two__home-4-text">Con más de 17 años de <strong>Experiencia</strong>
																</h2><!-- /.video-two__home-4-text -->
															</div><!-- /.container -->
														</section>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>

						<div data-elementor-type="wp-page" data-elementor-id="390" class="elementor elementor-390" data-elementor-settings="[]">
							<div class="elementor-inner">
								<div class="elementor-section-wrap">
									<section class="elementor-section elementor-top-section elementor-element elementor-element-cda7883 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="cda7883" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
										<div class="elementor-container elementor-column-gap-no">
											<div class="elementor-row">
												<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-94bad2b" data-id="94bad2b" data-element_type="column">
													<div class="elementor-column-wrap elementor-element-populated">
														<div class="elementor-widget-wrap">
															<div class="elementor-element elementor-element-977db99 elementor-widget elementor-widget-indext_portfolio2" data-id="977db99" data-element_type="widget" data-widget_type="indext_portfolio2.default">
																<div class="elementor-widget-container">

																	<section class=" project-one project-one__home-two project-one__project-page-two">
																		<div class="container">
																			<div class="block-title text-center">
																				<p class="block-title__tag-line">ARGA Training</p><!-- /.block-title__tag-line -->
																				<h3 class="block-title__title">Tenemos las mejores soluciones para tu empresa.
																					<br>
																					<span class="block-title__bold">Pregúntanos por los demás servicios que tenemos para ti.
																					</span>
																				</h3><!-- /.block-title__title -->
																			</div><!-- /.block-title -->
																			<ul class="list-unstyled post-filter">
																				<li class="active" data-filter=".filter-item"><span>All</span></li>


																				<li data-filter=".building-1"><span>CURSOS ONLINE</span></li>																		


																				<li data-filter=".architechture-1"><span>CURSOS</span></li>


																				<li data-filter=".engineering-1"><span>CUMPLIMIENTO LEGAL</span></li>


																				<li data-filter=".other-1"><span>OTROS SERVICIOS</span></li>

																			</ul><!-- /.list-unstyled -->
																			<div class="row filter-layout">

																				<div class="col-lg-4 col-md-6 col-sm-12 filter-item building-1 ">
																					<div class="project-one__single">
																						<div class="project-one__img">
																							<img width="370" height="300" src="../wp-content/uploads/2020/05/project-3-1.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy" srcset="http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-1.jpg 370w, http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-1-300x243.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />
																						</div><!-- /.project-one__img -->
																						<div class="project-one__content">
																							<a href="../projects-details/index.html" class="project-one__category">INDUSTRY</a>
																							<h2 class="project-one__title"><a href="../projects-details/index.html">Welding Processing</a></h2>
																							<!-- /.project-one__title -->
																						</div><!-- /.project-one__content -->
																					</div><!-- /.project-one__single -->
																				</div>
																				<div class="col-lg-4 col-md-6 col-sm-12 filter-item construction-1 ">
																					<div class="project-one__single">
																						<div class="project-one__img">
																							<img width="370" height="300" src="../wp-content/uploads/2020/05/project-3-2.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy" srcset="http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-2.jpg 370w, http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-2-300x243.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />
																						</div><!-- /.project-one__img -->
																						<div class="project-one__content">
																							<a href="../projects-details/index.html" class="project-one__category">INDUSTRY</a>
																							<h2 class="project-one__title"><a href="../projects-details/index.html">Bridge Construction</a></h2>
																							<!-- /.project-one__title -->
																						</div><!-- /.project-one__content -->
																					</div><!-- /.project-one__single -->
																				</div>
																				<div class="col-lg-4 col-md-6 col-sm-12 filter-item building-1 ">
																					<div class="project-one__single">
																						<div class="project-one__img">
																							<img width="370" height="300" src="../wp-content/uploads/2020/05/project-3-3.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy" srcset="http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-3.jpg 370w, http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-3-300x243.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />
																						</div><!-- /.project-one__img -->
																						<div class="project-one__content">
																							<a href="../projects-details/index.html" class="project-one__category">INDUSTRY</a>
																							<h2 class="project-one__title"><a href="../projects-details/index.html">Machinery Manufacturing</a></h2>
																							<!-- /.project-one__title -->
																						</div><!-- /.project-one__content -->
																					</div><!-- /.project-one__single -->
																				</div>
																				<div class="col-lg-4 col-md-6 col-sm-12 filter-item construction-1 ">
																					<div class="project-one__single">
																						<div class="project-one__img">
																							<img width="370" height="300" src="../wp-content/uploads/2020/05/project-3-4.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy" srcset="http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-4.jpg 370w, http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-4-300x243.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />
																						</div><!-- /.project-one__img -->
																						<div class="project-one__content">
																							<a href="../projects-details/index.html" class="project-one__category">INDUSTRY</a>
																							<h2 class="project-one__title"><a href="../projects-details/index.html">Oil &#038; Gas Productions</a></h2>
																							<!-- /.project-one__title -->
																						</div><!-- /.project-one__content -->
																					</div><!-- /.project-one__single -->
																				</div>
																				<div class="col-lg-4 col-md-6 col-sm-12 filter-item architechture-1 ">
																					<div class="project-one__single">
																						<div class="project-one__img">
																							<img width="370" height="300" src="../wp-content/uploads/2020/05/project-3-5.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy" srcset="http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-5.jpg 370w, http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-5-300x243.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />
																						</div><!-- /.project-one__img -->
																						<div class="project-one__content">
																							<a href="../projects-details/index.html" class="project-one__category">INDUSTRY</a>
																							<h2 class="project-one__title"><a href="../projects-details/index.html">Factory Remodeling</a></h2>
																							<!-- /.project-one__title -->
																						</div><!-- /.project-one__content -->
																					</div><!-- /.project-one__single -->
																				</div>
																				<div class="col-lg-4 col-md-6 col-sm-12 filter-item engineering-1 ">
																					<div class="project-one__single">
																						<div class="project-one__img">
																							<img width="370" height="300" src="../wp-content/uploads/2020/05/project-3-6.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy" srcset="http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-6.jpg 370w, http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-6-300x243.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />
																						</div><!-- /.project-one__img -->
																						<div class="project-one__content">
																							<a href="../projects-details/index.html" class="project-one__category">INDUSTRY</a>
																							<h2 class="project-one__title"><a href="../projects-details/index.html">Automobile Works</a></h2>
																							<!-- /.project-one__title -->
																						</div><!-- /.project-one__content -->
																					</div><!-- /.project-one__single -->
																				</div>

																				<div class="col-lg-4 col-md-6 col-sm-12 filter-item other-1 ">
																					<div class="project-one__single">
																						<div class="project-one__img">
																							<img width="370" height="300" src="../wp-content/uploads/2020/05/project-3-6.jpg" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy" srcset="http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-6.jpg 370w, http://old4.commonsupport.com/update/indext/wp-content/uploads/2020/05/project-3-6-300x243.jpg 300w" sizes="(max-width: 370px) 100vw, 370px" />
																						</div><!-- /.project-one__img -->
																						<div class="project-one__content">
																							<a href="../projects-details/index.html" class="project-one__category">INDUSTRY</a>
																							<h2 class="project-one__title"><a href="../projects-details/index.html">Automobile Works</a></h2>
																							<!-- /.project-one__title -->
																						</div><!-- /.project-one__content -->
																					</div><!-- /.project-one__single -->
																				</div>

																			</div><!-- /.row -->
																		</div><!-- /.container -->
																	</section>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>

						<section class="elementor-section elementor-top-section elementor-element elementor-element-55c8749 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="55c8749" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
							<div class="elementor-container elementor-column-gap-no">
								<div class="elementor-row">
									<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-23ee0ecc" data-id="23ee0ecc" data-element_type="column">
										<div class="elementor-column-wrap elementor-element-populated">
											<div class="elementor-widget-wrap">
												<div class="elementor-element elementor-element-5e0d052e elementor-widget elementor-widget-indext_funfact2" data-id="5e0d052e" data-element_type="widget" data-widget_type="indext_funfact2.default">
													<div class="elementor-widget-container">
														<section class=" about-six  ">
															<div class="container">
																<div class="row">
																	<div class="col-lg-6">
																		<div class="about-six__image wow fadeInLeft" data-wow-duration="1500ms">
																			<img src="./web/images/7.jpg" alt="">
																		</div><!-- /.about-six__image -->
																	</div><!-- /.col-lg-6 -->
																	<div class="col-lg-6 d-flex">
																		<div class="about-six__content my-auto">
																			<div class="block-title">
																				<p class="block-title__tag-line">ARGA Group es</p><!-- /.block-title__tag-line -->
																				<h3 class="block-title__title">Asesoría y Consultoría
																					<br>
																					<span class="block-title__bold">integral en Administración de Riesgos
																						desde<span class="block-title__base">2004</span><!-- /.block-title__base --></span>
																					<!-- /.block-title__bold -->
																				</h3><!-- /.block-title__title -->
																			</div><!-- /.block-title -->
																			<p class="about-six__text">Respaldada por profesionales con más de 17 años de experiencia en el ámbito de la seguridad industrial, salud ocupacional, protección ambiental, seguridad patrimonial, emergencia y desarrollo humano. Dicha experiencia ha quedado demostrada en empresas del giro de la construcción, petroquímica, alimentaría, industrial, comercial y de servicios. Donde el principal objetivo ha sido brindar un servicio de calidad, garantizando la integridad física de los colaboradores, la productividad, la continuidad del negocio, las afectaciones ambientales y la reducción de pérdidas por sanciones administrativas.

																			</p><!-- /.about-six__text -->
																			<div class="about-six__fact-wrap">


																				<div class="about-six__fact-single">
																					<p class="about-six__fact-title">Años de experiencia
																					</p><!-- /.about-six__fact-title -->
																					<h3 class="about-six__fact-counter counter">
																						17</h3><!-- /.about-six__fact-counter -->
																				</div><!-- /.about-six__fact-single -->


																				<div class="about-six__fact-single">
																					<p class="about-six__fact-title">Proyectos concluidos</p><!-- /.about-six__fact-title -->
																					<h3 class="about-six__fact-counter counter">

																						170</h3><!-- /.about-six__fact-counter -->
																				</div><!-- /.about-six__fact-single -->


																				<div class="about-six__fact-single">
																					<p class="about-six__fact-title">Cursos impartidos
																					</p><!-- /.about-six__fact-title -->
																					<h3 class="about-six__fact-counter counter">
																						210</h3><!-- /.about-six__fact-counter -->
																				</div><!-- /.about-six__fact-single -->

																			</div><!-- /.about-six__fact-wrap -->
																		</div><!-- /.about-six__content -->
																	</div><!-- /.col-lg-6 -->
																</div><!-- /.row -->
															</div><!-- /.container -->
														</section>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>