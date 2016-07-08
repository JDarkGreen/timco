<?php /* Template Name: Página Clientes Plantilla */ ?>

<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('timco_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner = $post;
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- CONTENEDOR COMUN -->
<div class="container">
	<main class="pageClientes">
		
		<!-- Descripción -->
		<section class="pageClientes__content">
			<h2 class="text-center">
			<?php  
				/**
				* Encontramos la página de clientes y obtenemos su contenido
				*/
				$page_cliente = get_page_by_path("clientes");
				_e( $page_cliente->post_content , LANG );
			?>	
			</h2>
		</section> <!-- /.pageClientes__content -->

		<?php  
			/**
			* Obtenemos todas los terminos de la taxonomía cliente category
			*/
			$terms_cat_cliente = get_terms( array(
				'taxonomy'   => 'cliente_category',
				'hide_empty' => true,
			));

			/* Hacemos el recorrido por cada una de estas taxonomías */
			if( !empty( $terms_cat_cliente) ) : foreach( $terms_cat_cliente as $cat_cliente ) :
		?>
		<!-- Contenido de taxonomía -->
		<section class="pageClientes__content">
			<!-- Titulo --> <h2 class="pageClientes__subtitle text-center"><strong> <?php _e( $cat_cliente->name , LANG ); ?> </strong> </h2>

			<!-- Imagenes de Logos según esta taxonomía -->
			<section class="pageClientes__clientes">
				<?php //Argumentos segun tipo de termino o categoria de cliente
					$args = array(
						'post_status'    => 'publish',
						'post_type'      => 'cliente',
						'posts_per_page' => -1,
						'order'          => 'ASC',
						'orderby'        => 'menu_order',
						'tax_query'      => array(
							array(
								'taxonomy'       => 'cliente_category',
								'field'          => 'slug',
								'terms'          => $cat_cliente->slug,
							),
						),
					);  
					$cliente_cats = get_posts( $args );
					foreach( $cliente_cats as $cliente_cat ) : 

					$img = get_the_post_thumbnail( $cliente_cat->ID , 'full' , array('class'=>'img-responsive') );

					if( !empty($img) ) : 
				?>
					<article class="item"><?= $img ?> </article> <!-- /.item -->
				<?php else: echo "Not Image" ; endif; endforeach; ?>
			</section> <!-- /.pageClientes__clientes -->	

		</section> <!-- /pageClientes__content  - fin de sección -->		

		<?php endforeach; endif; ?>

	</main> <!-- /.pageClientes -->
</div> <!-- /.container -->

<!-- Incluir Seccion banner de servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>


<!-- Get Footer -->
<?php get_footer(); ?>