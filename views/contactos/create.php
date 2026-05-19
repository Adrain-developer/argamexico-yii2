<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Contactos */

$this->title = 'Enviar correo';
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .elementor-widget-google_maps iframe {
        height: 840px;
    }

    .icon {
        font-size: 50px;
        color: red;
    }
</style>



<div data-elementor-type="wp-page" data-elementor-id="396" class="elementor elementor-396" data-elementor-settings="[]">
    <div class="elementor-inner">
        <div class="elementor-section-wrap">
            <section class="elementor-section elementor-top-section elementor-element elementor-element-9741c2a elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="9741c2a" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                <div class="elementor-container elementor-column-gap-no">
                    <div class="elementor-row">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-1f8c2cc1" data-id="1f8c2cc1" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-4550bf58 elementor-widget elementor-widget-indext_page_banner" data-id="4550bf58" data-element_type="widget" data-widget_type="indext_page_banner.default">
                                        <div class="elementor-widget-container">
                                            <section class=" inner-banner" style="background-image: url(<?= (Yii::$app->homeUrl . $rutas->pathImagenBnrContacto) ?>);">
                                                <div class="container">
                                                    <h2 class="inner-banner__title">Contacto ARGA GROUP
                                                    </h2><!-- /.inner-banner__title -->
                                                    <ul class="list-unstyled thm-breadcrumb">
                                                        <li><a href="<?= Url::toRoute(['/site/index']); ?>">Inicio
                                                            </a></li>
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
            <section class="elementor-section elementor-top-section elementor-element elementor-element-e80f996 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="e80f996" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                <div class="elementor-container elementor-column-gap-no">
                    <div class="elementor-row">
                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-8761575" data-id="8761575" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-84006bd elementor-widget elementor-widget-indext_contact_info" data-id="84006bd" data-element_type="widget" data-widget_type="indext_contact_info.default">
                                        <div class="elementor-widget-container">
                                            <section class=" contact-info-one">
                                                <div class="container">
                                                    <div class="block-title text-center">
                                                        <p class="block-title__tag-line">CONTACTO

                                                        </p><!-- /.block-title__tag-line -->
                                                        <h2 class="block-title__title"><span class="block-title__bold">Puedes localizarnos en:
                                                            </span></h2><!-- /.block-title__title -->
                                                    </div><!-- /.block-title -->
                                                    <div class="row">



                                                        <div class="col-lg-4">
                                                            <div class="contact-info-one__single wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="0ms">
                                                                <i class="icon fa fa-map"></i>
                                                                <h3 class="contact-info-one__title">Nuestra Ubicacion</h3>
                                                                <p class="contact-info-one__text">Bosques Amalucan, Puebla. Pue.<br>
                                                                    México.</p>
                                                            </div><!-- /.contact-info-one__single -->
                                                        </div><!-- /.col-lg-4 -->



                                                        <div class="col-lg-4">
                                                            <div class="contact-info-one__single wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="0ms">
                                                                <i class="icon fa fa-phone-square"></i>
                                                                <h3 class="contact-info-one__title">Números Teléfonicos</h3>
                                                                <p class="contact-info-one__text">+52 1 222 540 9946<br>
                                                                    +52 1 222 540 9946</p>
                                                            </div><!-- /.contact-info-one__single -->
                                                        </div><!-- /.col-lg-4 -->



                                                        <div class="col-lg-4">
                                                            <div class="contact-info-one__single wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="0ms">
                                                                <i class="icon fa fa-envelope"></i>
                                                                <h3 class="contact-info-one__title">Direcciones de email</h3>
                                                                <p class="contact-info-one__text">info@argamexico.com<br>
                                                                    ventas@argamexico.com</p>
                                                            </div><!-- /.contact-info-one__single -->
                                                        </div><!-- /.col-lg-4 -->

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
            <div class="block-title text-center">
                <h2 class="block-title__title"><span class="block-title__bold">Algunos de nuestros clientes.
                    </span></h2><!-- /.block-title__title -->
            </div>


            <div class="site-footer__brand">
                <div class="container">
                    <div class="site-footer__brand-carousel owl-carousel owl-theme">

                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/alen.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->


                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/auria.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->


                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/caja.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->


                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/cedinsa.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->


                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/coppel.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->


                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/empacadora.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->


                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/engie.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->


                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/exterran.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->


                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/gas.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->

                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/gr.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->

                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/heineken.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->

                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/italiana.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->

                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/jll.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->

                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/magna.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->

                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/mpi.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->

                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/oxxo.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->

                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/poin.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->

                        <div class="item">
                            <a>
                                <img src="<?= Yii::$app->homeUrl ?>images/clientes/recicla.png" alt="brand image">
                            </a>
                        </div><!-- /.item -->
                        
                    </div><!-- /.site-footer__brand-carousel -->
                    <hr class="site-footer__brand-hr">
                </div><!-- /.container -->
            </div><!-- /.site-footer__brand -->

            <section class="elementor-section elementor-top-section elementor-element elementor-element-7977130 elementor-section-stretched elementor-section-full_width elementor-section-height-default elementor-section-height-default" data-id="7977130" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                <div class="elementor-container elementor-column-gap-no">
                    <div class="elementor-row">
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-eebda14" data-id="eebda14" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-c1b7020 elementor-widget elementor-widget-google_maps" data-id="c1b7020" data-element_type="widget" data-widget_type="google_maps.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-custom-embed"><iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1885.6426672392754!2d-98.13348084206986!3d19.051188332074627!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cfea8192e7cfe9%3A0x2e133bd3f730110f!2sBosques%20Amalucan%2C%2072310%20Puebla%2C%20Pue.!5e0!3m2!1ses!2smx!4v1620757790900!5m2!1ses!2smx" title="Bosques Amalucan, Puebla, Pue. México" aria-label="Bosques Amalucan, Puebla, Pue. México"></iframe></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-2d1e3b7" data-id="2d1e3b7" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div class="elementor-element elementor-element-eaf4818 xz elementor-widget elementor-widget-indext_contact" data-id="eaf4818" data-element_type="widget" data-widget_type="indext_contact.default">
                                        <div class="elementor-widget-container">
                                            <div class=" contact-form-one">
                                                <div class="container-fluid p-0">
                                                    <div class="row g-0">
                                                        <div class="col-lg-12 d-flex">
                                                            <div class="my-auto contact-form-one__form-wrap">
                                                                <div class="block-title">
                                                                    <p class="block-title__tag-line block-title__white">Contactanos

                                                                    </p><!-- /.block-title__tag-line -->
                                                                    <h2 class="block-title__title block-title__white">Siéntete libre
                                                                        <br>
                                                                        <span class="block-title__bold">de contactarnos.
                                                                        </span>
                                                                    </h2><!-- /.block-title__title -->
                                                                </div><!-- /.block-title -->
                                                                <div role="form" class="wpcf7" id="wpcf7-f272-p396-o1" lang="en-US" dir="ltr">

                                                                    <?= $this->render('_form', [
                                                                        'model' => $model,
                                                                    ]) ?>
                                                                </div>
                                                            </div><!-- /.my-auto -->
                                                        </div><!-- /.col-lg-6 -->
                                                    </div><!-- /.row -->
                                                </div><!-- /.container-fluid -->
                                            </div>
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

<?php
if (isset($enviado) && $enviado) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Recibimos tus datos exitosamente. En breve nos comunicaremos contigo',
            showConfirmButton: false,
            timer: 5500
        })
    </script>
<?php    }
?>