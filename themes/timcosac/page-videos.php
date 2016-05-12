<?php /* Template Name: Página Videos Plantilla */ ?>

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
						'post_type'      => 'galeria-videos',
						'posts_per_page' => -1,
					);
					//query
					$query = new WP_Query( $args );

					if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();

					$current_video = get_post_meta( $post->ID , 'mb_url_video_text' , true );
				?>
					<?php if( !empty($current_video) ) : ?>
					<div class="col-xs-12 col-sm-3">
						<article class="pageGallery__item">
							<?php 
								$current_video = str_replace("watch?v=", "embed/", $current_video);
							?>
							<a class="relative center-block" href="<?= $current_video ?>" title="<?= get_the_title(); ?>" rel="group">
								<iframe width="100%" height="200" src="<?= $current_video; ?>" allowfullscreen></iframe>
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