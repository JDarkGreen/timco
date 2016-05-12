<?php /* Archivo que contiene el partial de carousel clientes */ ?>

<!-- Sección de Clientes -->
<section class="pageCommon__clientes">
	<div class="container">
		<!-- Titulo -->
		<h2 class="sectionCommon__subtitle text-uppercase">
			<strong><?php _e('nuestros clientes' , LANG ); ?></strong>
		</h2>

		<!-- Contenedor de clientes -->
		<section id="carousel-clientes" class="pageCommon__clientes__carousel">
			<?php //query
				$args = array(
					'order'          => 'ASC',
					'orderby'        => 'menu_order',
					'post_status'    => 'publish',
					'post_type'      => 'cliente',
					'posts_per_page' => -1,
				);

				$query = new WP_Query( $args );

				if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post();
			?>
			<!-- Articulo -->
			<?php if( has_post_thumbnail() ) : ?>
					<figure class="item-carousel">
						<?php the_post_thumbnail('full',array('class'=>'img-fluid')); ?>
					</figure> <!-- /.item-carousel -->
			<?php endif; ?>
			<!-- /endif -->
			<?php endwhile; endif; wp_reset_postdata(); ?>
		</section> <!-- /.pageCommon__clientes__carousel -->

	</div> <!-- /.container -->
</section> <!-- /.pageCommon__clientes -->