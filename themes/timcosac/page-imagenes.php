<?php /* Template Name: Página Imagenes Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('constructec_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner = $post;
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Contenido Principal galeria de imagenes -->
<section class="pageGallery">
	<div class="container">
		<section class="pageGallery__content">
			<div class="row">
				<!-- Imagenes -->
				<?php  
					//query
					$args = array(
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'post_status'    => 'publish',
						'post_type'      => 'galeria-images',
						'posts_per_page' => -1,
					);
					//query
					$query = new WP_Query( $args );

					if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
				?>
					<?php if( has_post_thumbnail() ) : ?>
					<div class="col-xs-12 col-sm-4">
						<article class="pageGallery__item">
							<a class="js-gallery-item relative center-block" href="<?= the_post_thumbnail_url('full'); ?>" title="<?= get_the_title(); ?>" rel="group">
								<?php the_post_thumbnail('full',array('class'=>'img-fluid') ); ?>
								<!-- Span Titulo fondo oscuro -->
								<span class="pageGallery__item__title container-flex container-flex-center text-uppercase">
									<strong><?php _e( get_the_title() , LANG ); ?></strong>
								</span>
							</a> <!-- /.js-gallery-item relative -->
							
						</article><!-- /.pageGallery__item -->	
					</div><!-- /.col-xs-12 col-sm-4 -->
					<?php endif; ?>
				<?php endwhile; endif; wp_reset_postdata(); ?>
			</div> <!-- /.row -->
		</section>
	</div> <!-- /.container -->
</section><!-- /. pageGallery-->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>