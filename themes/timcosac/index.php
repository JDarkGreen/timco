
<!-- Header -->
<?php 
	get_header(); 
	$options = get_option('timco_custom_settings'); 
?>

<!-- Incluir Banner de Portada -->
<?php  
	$term = "Portada";
	//template
	include(locate_template('partials/portada/content-banner.php'));
?>

<!-- CONTENEDOR -->
<div class="container">

	<!-- Sección Servicios timco -->
	<section class="pageInicio__servicios">
		<!-- Titulo --> <h2 class="pageWrapper__subtitle text-uppercase">
			<?php _e('servicios timco' , LANG ); ?>
		</h2>
		<!-- Contenedor de Carousel -->
		<div class="relative">
			<section class="ContainerSlider__servicios">
				<!-- query conseguir los servicios -->
				<?php  
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'servicio',
						'posts_per_type' => -1,
					);
					$servicios = get_posts( $args );

					foreach( $servicios as $servicio ) :
				?>
					<article class="item">
						<figure>
							<?= get_the_post_thumbnail( $servicio->ID , 'full', array('class'=>'img-responsive') ); ?>
						</figure><!-- /fihure -->
						<!-- Titulo -->
						<h3 class="item__title text-center text-uppercase container-flex">
							<?php
								$title = $servicio->post_excerpt; 
								if( !empty($title) ) :
							 	_e( $servicio->post_excerpt , LANG ); 
							 	else: 
							 	_e( $servicio->post_title , LANG ); endif;
							?>
						</h3>
					</article> <!-- /.item -->
				<?php endforeach; ?>
			</section> <!-- /.ContainerSlider__servicios -->

			<!-- Flechas -->
			<a id="arrow-service-prev" href="#" class="ContainerSlider__servicios__arrow ContainerSlider__servicios__arrow--left">
				<img src="<?= IMAGES ?>/arrows/boton_flecha_prev.png" alt="" class="" />
			</a>		

			<a id="arrow-service-next" href="#" class="ContainerSlider__servicios__arrow ContainerSlider__servicios__arrow--right">
				<img src="<?= IMAGES ?>/arrows/boton_flecha_next.png" alt="" class="" />
			</a>

		</div> <!-- /.relative -->
	</section> <!-- /.pageInicio__servicios -->

	<!-- Seccion Miscelanea -->
	<div class="row">
		
		<div class="col-xs-8">
			<section class="pageInicio__description">
				<!-- Subtitulo --><h2 class="pageWrapper__subtitle text-uppercase">
			<?php _e('timco transporte sac' , LANG ); ?> </h2>
			
				<!-- Contenido -->
				<section class="pageInicio__description__content">
					<div class="row">
						<div class="col-xs-5">
							<?php //Extraer imagen de nosotros
								$img_nosotros = $options['image_nosotros'];
								if( !empty($img_nosotros) ) : ?>
								<img src="<?= $img_nosotros ?>" alt="timco-servicio-nosotros" class="img-responsive" />
							<?php 	
								else: echo "Actualizando Imagen";
								endif; 
							?>
						</div> <!-- /. -->
						<div class="col-xs-7">
							<?php  //Extraer contenido de nosotros
								$text_nosotros = $options['widget_nosotros'];
								if( !empty( $text_nosotros ) ) :
									echo apply_filters('the_content', $text_nosotros );
								else: echo "Actualizando descripción";
								endif;
							?>
						</div> <!-- /.col-xs-8 -->
					</div> <!-- /.row -->
				</section> <!-- /.pageInicio__description__content-->

			</section> <!-- /.pageInicio__description -->
		</div> <!-- /.col-xs-8 -->

		<div class="col-xs-4">
			<section class="pageInicio__facebook">
				<!-- Subtitulo --><h2 class="pageWrapper__subtitle text-uppercase">
			<?php _e('facebook timco' , LANG ); ?> </h2>

			<!-- Facebook -->
			<?php $link_facebook = $options['red_social_fb']; 
				if( !empty($link_facebook) ) :
			?>
				<section class="container__facebook">
					<!-- Contebn -->
					<div id="fb-root" class=""></div>

					<!-- Script -->
					<script>(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5";
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>

					<div class="fb-page" data-href="<?= $link_facebook ?>" data-tabs="timeline" data-small-header="false"  data-width="370" data-adapt-container-width="true" data-height="370" data-hide-cover="false" data-show-facepile="true">
					</div> <!-- /. fb-page-->
				</section> <!-- /.container__facebook -->
			<?php else: ?>
				<p>Opcion no habilitada temporalmente</p>
			<?php endif; ?>
			</section> <!-- /.pageInicio__description -->

			<!-- Imagen referente al servicio -->
			<figure class="sectionWrapper__figure">
				<img src="<?= IMAGES ?>/pages/inicio/home_baner_distribucion_timco.jpg" alt="banner-distribucion" class="img-responsive" />
			</figure> <!-- /.sectionWrapper__figure -->	

		</div> <!-- /.col-xs-4 -->

	</div> <!-- /.row -->

</div> <!-- /container -->

<!-- Footer -->
<?php get_footer(); ?>