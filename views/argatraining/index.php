<?php 
use yii\helpers\Url;
?>
<div data-elementor-type="wp-page" data-elementor-id="390" class="elementor elementor-390" data-elementor-settings="[]">
    <div class="elementor-inner">
        <div class="elementor-section-wrap">
        <section class="elementor-section elementor-top-section elementor-element elementor-element-5dcab2b elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="5dcab2b" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
				<div class="elementor-container elementor-column-gap-no">
					<div class="elementor-row">
						<div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e66978a" data-id="e66978a" data-element_type="column">
							<div class="elementor-column-wrap elementor-element-populated">
								<div class="elementor-widget-wrap">
									<div class="elementor-element elementor-element-f2fe049 elementor-widget elementor-widget-indext_page_banner" data-id="f2fe049" data-element_type="widget" data-widget_type="indext_page_banner.default">
										<div class="elementor-widget-container">
											<section class=" inner-banner" style="background-image: url(<?= (Yii::$app->homeUrl . $rutas->pathImagenIdxTr) ?>);">
												<div class="container">
													<h2 class="inner-banner__title">ARGA Training
													</h2><!-- /.inner-banner__title -->
													<ul class="list-unstyled thm-breadcrumb">
														<li><a href="../index.html">Inicio
															</a></li>
														<li class="active"><a href="#"><strong>ARGA Training</strong></a></li>
													</ul><!-- /.thm-breadcrumb -->
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
                                                        <p class="block-title__tag-line">CURSOS</p><!-- /.block-title__tag-line -->
                                                        <h3 class="block-title__title">Consulta la información referente a nuestros cursos
                                                            <br>
                                                            <span class="block-title__bold">No dejes de actualizarte
                                                            </span>
                                                        </h3><!-- /.block-title__title -->
                                                    </div><!-- /.block-title -->
                                                    <ul class="list-unstyled post-filter">
                                                        <li class="active" data-filter=".filter-item"><span>Todos</span></li>


                                                        <li data-filter=".cursos-online"><span>Cursos online</span></li>



                                                        <li data-filter=".cursos"><span>Cursos</span></li>

                                                    </ul><!-- /.list-unstyled -->
                                                    <div class="row filter-layout">
                                                        <?php foreach($cursosOnline as $cursoOnline) { ?>
                                                            <div class="col-lg-4 col-md-6 col-sm-12 filter-item cursos-online">
                                                            <div class="project-one__single">
                                                                <div class="project-one__img">
                                                                    <img width="370" height="300" src="<?= Yii::$app->homeUrl . $cursoOnline->pathImagen ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy" srcset="<?= Yii::$app->homeUrl . $cursoOnline->pathImagen ?> 370w, <?= Yii::$app->homeUrl . $cursoOnline->pathImagen ?> 300w" sizes="(max-width: 370px) 100vw, 370px" />
                                                                </div><!-- /.project-one__img -->
                                                                <div class="project-one__content">
                                                                    <a href="#" class="project-one__category" onclick="return false;"><?= $cursoOnline->nombre ?></a>
                                                                    <?php if(!is_null($cursoOnline->pathInfo)) {?>
                                                                        <a href="<?= Url::toRoute(['sendfile', 'id' => $cursoOnline->id])?>">Descargar información</a>
                                                                    <?php  } ?>
                                                                    
                                                                    <h2 class="project-one__title"><a href="#"><?= $cursoOnline->descripcion ?></a></h2>
                                                                    <!-- /.project-one__title -->
                                                                </div><!-- /.project-one__content -->
                                                            </div><!-- /.project-one__single -->
                                                        </div>
                                                            <?php } ?>

                                                            <?php foreach($cursos as $curso) { ?>
                                                            <div class="col-lg-4 col-md-6 col-sm-12 filter-item cursos">
                                                            <div class="project-one__single">
                                                                <div class="project-one__img">
                                                                    <img width="370" height="300" src="<?= Yii::$app->homeUrl . $curso->pathImagen ?>g" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="" loading="lazy" srcset="<?= Yii::$app->homeUrl . $curso->pathImagen ?> 370w, <?= Yii::$app->homeUrl . $curso->pathImagen ?> 300w" sizes="(max-width: 370px) 100vw, 370px" />
                                                                </div><!-- /.project-one__img -->
                                                                <div class="project-one__content">
                                                                    <a href="#" class="project-one__category" onclick="return false;"><?= $curso->nombre ?></a>
                                                                    <?php if(!is_null($curso->pathInfo)) {?>
                                                                        <a href="<?= Url::toRoute(['sendfile', 'id' => $curso->id])?>">Descargar información</a>
                                                                    <?php  } ?>
                                                                    <h2 class="project-one__title"><a href="#" onclick="return false;"><?= $curso->descripcion ?></a></h2>
                                                                    <!-- /.project-one__title -->
                                                                </div><!-- /.project-one__content -->
                                                            </div><!-- /.project-one__single -->
                                                        </div>
                                                            <?php } ?>

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