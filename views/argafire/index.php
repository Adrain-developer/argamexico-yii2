<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'Fire';

?>

<style>
.cedit{
    color: #ffffff !important;
}

</style>

<section class="inner-banner" style="background-image: url(<?= (Yii::$app->homeUrl . $rutas->pathImagenIdxFire) ?>);">

    <div class="container">
        <h2 class="inner-banner__title">ARGA FIRE</h2><!-- /.inner-banner__title -->
        <ul class="list-unstyled thm-breadcrumb">
            <li class="breadcrumb-item"><a href="../index.html">Inicio &nbsp;</a></li>
            <li class="breadcrumb-item">Arga Fire</li>
        </ul><!-- /.thm-breadcrumb -->
    </div><!-- /.container -->
</section>


<div data-elementor-type="wp-page" data-elementor-id="701" class="elementor elementor-701" data-elementor-settings="[]">
    <div class="elementor-inner">
        <div class="elementor-section-wrap">
            <section class="elementor-section elementor-top-section elementor-element elementor-element-79c2f034 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="79c2f034" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                <div class="elementor-container elementor-column-gap-no">
                    <div class="elementor-row">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5c77670d" data-id="5c77670d" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-57c1f613 elementor-widget elementor-widget-indext_team2" data-id="57c1f613" data-element_type="widget" data-widget_type="indext_team2.default">
                                        <div class="elementor-widget-container">
                                            <section class=" team-one team-one__about-page">
                                                <div class="container">
                                                    <div class="block-title text-center">
                                                        <span class="cedit block-title__tag-line">ARGA FIRE</span><!-- /.block-title__tag-line -->
                                                        <h2 class="block-title__title">
                                                            
                                                            <span class="block-title__bold">Protección contra incendios.</span><!-- /.block-title__bold -->
                                                        </h2><!-- /.block-title__title -->
                                                    </div><!-- /.block-title -->
                                                    <div class="row">

                                                    
                                                        <div class="col-lg-4">                                                        
                                                            <div class="team-one__single">
                                                                <div class="team-one__image">
                                                                <a href="<?= Url::toRoute(['argafire/mtto']);?>">
                                                                    <img width="370" height="370" src="<?= (Yii::$app->homeUrl . $rutas->pathImagenIdxFireUno) ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image"/>
                                                                    </a>
                                                                    <div class="team-one__social">

                                                                        <a href="<?= Url::toRoute(['argafire/mtto']);?>" class="thm-btn team-one__btn">Más<br>información</a>
                                                                        
                                                                    </div>
                                                                    
                                                                </div><!-- /.team-one__image -->
                                                                <div class="team-one__content">
                                                                    <a href="<?= Url::toRoute(['argafire/mtto']);?>">
                                                                        <h2 class="team-one__name">Mantenimiento de equipos</h2>
                                                                    </a>
                                                                    <p class="team-one__designation">fijos contra incendios</p><!-- /.team-one__designation -->
                                                                </div><!-- /.team-one__content -->
                                                            </div><!-- /.team-one__single -->
                                                        </div><!-- /.col-lg-4 -->


                                                        <div class="col-lg-4">                                                        
                                                            <div class="team-one__single">
                                                                <div class="team-one__image">
                                                                <a href="<?= Url::toRoute(['argafire/catalogo']);?>">
                                                                    <img width="370" height="370" src="<?= (Yii::$app->homeUrl . $rutas->pathImagenIdxFireTres) ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image"/>
                                                                    </a>
                                                                    <div class="team-one__social">

                                                                        <a href="<?= Url::toRoute(['argafire/catalogo']);?>" class="thm-btn team-one__btn">Ver<br>productos</a>
                                                                        
                                                                    </div>
                                                                    
                                                                </div><!-- /.team-one__image -->
                                                                <div class="team-one__content">
                                                                    <a href="<?= Url::toRoute(['argafire/catalogo']); ?>">
                                                                        <h2 class="team-one__name">Venta de Productos</h2>
                                                                    </a>
                                                                    <p class="team-one__designation">Certificados</p><!-- /.team-one__designation -->
                                                                </div><!-- /.team-one__content -->
                                                            </div><!-- /.team-one__single -->
                                                        </div><!-- /.col-lg-4 -->


                                                        <div class="col-lg-4">                                                        
                                                            <div class="team-one__single">
                                                                <div class="team-one__image">
                                                                <a href="<?= Url::toRoute(['argafire/acreditacion']);?>">
                                                                    <img width="370" height="370" src="<?= (Yii::$app->homeUrl . $rutas->pathImagenIdxFireDos) ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image"/>
                                                                    </a>
                                                                    <div class="team-one__social">

                                                                        <a href="<?= Url::toRoute(['argafire/acreditacion']);?>" class="thm-btn team-one__btn">Ver<br>acreditaciones</a>
                                                                        
                                                                    </div>
                                                                    
                                                                </div><!-- /.team-one__image -->
                                                                <div class="team-one__content">
                                                                    <a href="<?= Url::toRoute(['argafire/acreditacion']);?>">
                                                                        <h2 class="team-one__name">Acreditaciones</h2>
                                                                    </a>
                                                                    <p class="team-one__designation">ARGA FIRE</p><!-- /.team-one__designation -->
                                                                </div><!-- /.team-one__content -->
                                                            </div><!-- /.team-one__single -->
                                                        </div><!-- /.col-lg-4 -->

                                                    </div><!-- /.row -->
                                                </div><!-- /.container -->
                                            </section><!-- /.team-one -->
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