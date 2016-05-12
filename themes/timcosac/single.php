<!-- Global Post -->
<?php 
	global $post; 
	$options = get_option('constructec_custom_settings'); 
?>

<!-- Get Header -->
<?php get_header(); ?>

<!-- Incluir banner de la página -->
<?php  
	$banner       = $post;
	$banner_title = "artículo";
	include( locate_template("partials/banner-common-pages.php") );
?>

<!-- Incluir contenido Principal -->
<main class="pageBlog__article">

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-8">
				<!-- Article -->
				<article class="pageArticle__content">
					<!-- Titulo -->
					<h2 class="sectionCommon__subtitle text-uppercase">
					<strong><?php _e( $post->post_title , LANG ); ?></strong>
					</h2>

					<!-- Imagen -->
					<?php if( has_post_thumbnail( $post->ID )) : ?>
						<figure class="pageArticle__image">
							<?php the_post_thumbnail('full',array('class'=>'img-fluid') ); ?>
						</figure> <!-- /.pageArticle__image -->
					<?php endif;?>

					<!-- Contenido -->
					<?php if( !empty( $post->post_content )) :  ?>
						<?= apply_filters('the_content', $post->post_content ); ?>
					<?php endif; ?>
				</article> <!-- /.pageArticle__content -->
			</div> <!-- /.col-xs-12 col-md-8 -->
			<div class="col-xs-12 col-md-4">
				<aside class="pageArticle__sidebar">

					<!-- Incluir las categorias de los posts -->
					<?php include( locate_template("partials/categories-post.php") ); ?>

					<!-- Facebook -->
					<?php $link_facebook = $options['red_social_fb']; 
						if( !empty($link_facebook) ) :
					?>
					<section class="pageInicio__miscelaneo__facebook">
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

						<div class="fb-page" data-href="<?= $link_facebook ?>" data-tabs="timeline" data-small-header="false"  data-adapt-container-width="true" data-height="420" data-hide-cover="false" data-show-facepile="true">
							<div class="fb-xfbml-parse-ignore">
								<blockquote cite="<?= $link_facebook ?>">
									<a href="<?= $link_facebook ?>"><?php bloginfo('name'); ?></a>
								</blockquote>
							</div>
						</div>
					</section> <!-- /.pageInicio__miscelaneo__facebook text-xs-center -->

					<?php endif; ?>
				</aside> <!-- /.pageArticle__sidebar -->
			</div> <!-- /.col-xs-12 col-md-4 -->
		</div> <!--/.row -->
	</div> <!-- /.container -->

</main> <!-- /pageBlog__article -->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Get Footer -->
<?php get_footer(); ?>