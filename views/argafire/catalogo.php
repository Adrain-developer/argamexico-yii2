
<?php

use yii\helpers\Url;

?>

<style>




</style>

<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous">
</script>

<section class="inner-banner" style="background-image: url(<?= (Yii::$app->homeUrl . $rutas->pathImagenIdxFire) ?>);">

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
						<h4>Seleccione una categoría</h4>
						<div class="woocommerce-form">
							<div class="woocommerce-notices-wrapper"></div>
								<select name="orderby" class="orderby" aria-label="Shop order" id="select-tipo-producto">
									<?php foreach($categorias as $categoria) { ?>
										<option value="<?= $categoria->id ?>"><?= $categoria->nombre?></option>
									<?php } ?>
								</select>
						</div>
					</div>
					<div class="row clearfix">
                    <div id="result"></div>
				</div>
			</div>
		</div>


	</div>
	</div>
</section>

<section class=" cta-one">
                            <div class="container">
                                <h2 class="cta-one__title">¿Necesitas más información?
                                </h2><!-- /.cta-one__title -->
                                <div class="button-block">
                                    <a href="<?= Url::toRoute(['contactos/create']); ?>" class="thm-btn cta-one__btn">Contactanos <i class="fa fa-long-arrow-right"></i>
                                        <!-- /.fa fa-long-arrow-right --></a>
                                </div><!-- /.button-block -->
                            </div><!-- /.container -->
                        </section>

<div class="clearfix"></div>
<script>
	$(window).on('load', function(){
		getProductos($("#select-tipo-producto").val());
		$("#select-tipo-producto").change(function(){
      getProductos($("#select-tipo-producto").val());
	});

	function getProductos(idCategoria){
		$.ajax({
		url: "<?= Url::toRoute(['getproductos'])?>",
		type: 'GET',
		data: {
			idCategoria: idCategoria
		},
		success: function(response){
			$("#result").html(response);
		},
		error: function(xhr, text, error){
			$("#result").html(text);
		}
	})
	}
	})
    
	
</script>