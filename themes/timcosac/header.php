<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	
	<!-- Pingbacks -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicon and Apple Icons -->
	
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	
	<?php 
		$options = get_option('timco_custom_settings'); 
		global $post;

		//Comprobar si esta desplegada la barra de Navegación
		$admin_bar = is_admin_bar_showing() ? 'mainHeader__active' : '';
	?>



<!-- Header -->
<header class="mainHeader sb-slide <?= $admin_bar ?>">
	<div class="mainHeader__container">
		
		<!-- Solo en version de escritorio -->
		<div class="row hidden-xs">
			<div class="col-xs-3">
				<!-- Logo -->
				<h1 class="logo">
					<a href="<?= site_url() ?>">
						<?php if( !empty($options['logo']) ) : ?>
							<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
						<?php else: ?>
							<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
						<?php endif; ?>
					</a>
				</h1> <!-- /.lgoo -->
			</div> <!-- /.col-xs-3 -->
			<div class="col-xs-9">
				<div class="row">
					<!-- Seccion Lateral -->
					<div class="col-xs-12">
						<!--  Informacion -->
						<div class="mainHeader__info">
							<!-- Slogan --> <p><em>Soluciones para tu negocio</em></p>
							<!-- Lista de Informacion -->
							<ul class="list-inline">
								<!-- Email -->
								<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) : ?>
								<li>
									<i class="fa fa-envelope" aria-hidden="true"></i>
									<?= $options['contact_email']; ?>
								</li>
								<?php endif; ?>
								<li>
									<i class="fa fa-phone" aria-hidden="true"></i>

									<?php  
										/* Vamos a extraer el primer teléfono y el primer celular */

										//Telefono
										$telefonos = $options['contact_tel'];
										$telefonos = explode( "," , $telefonos );
										$telefono  = $telefonos[0];
										
										//Celular
										$celulares = $options['contact_cel'];
										$celulares = explode( "," , $celulares );
										$celular   = $celulares[0];

										//Mostrar telefono si no está vacio
										echo !empty($telefono) ? $telefono : "";
										//Mostrar celular si no está vacio
										echo !empty($celular) ? " / Rpc: " . $celular : "";
									?>
								</li>
							</ul>
						</div> <!-- /.mainHeader__info -->
					</div> <!-- /.col-xs-12 -->
					<div class="col-xs-12">
						<!-- Navegación Principal -->
						<nav class="mainNav">
							<?php wp_nav_menu(
								array(
									'menu_class'     => 'main-menu text-center',
									'theme_location' => 'main-menu'
								));
							?>						
						</nav> <!-- /.mainNav -->
					</div> <!-- /.col-xs-12 -->
				</div> <!-- /.row -->
			</div> <!-- /.col-xs-9 -->
		</div> <!-- /.row -->
		
		<!-- Solo en version mobile -->
		<section class="visible-xs-block">
			<div class="mainHeader__mobile ">

					<!-- Icono abrir menu lateral -->
					<div class="icon-header">
						<i id="toggle-left-nav" class="fa fa-bars" aria-hidden="true"></i>
					</div><!-- /.icon-header -->

					<!-- Logo -->
					<h1 class="logo">
						<a href="<?= site_url() ?>">
							<?php if( !empty($options['logo']) ) : ?>
								<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
							<?php else: ?>
								<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-responsive center-block" />
							<?php endif; ?>
						</a>
					</h1> <!-- /.lgoo -->	

					<!-- Icono abrir menu lateral derecha -->
					<div class="icon-header">
						<i id="toggle-right-nav" class="fa fa-bars" aria-hidden="true"></i>
					</div><!-- /.icon-header -->	

			</div> <!-- /.mainHeader__mobile -->
		</section> <!-- /.visible-xs-block -->

	</div><!-- /.container -->
</header> <!-- /.mainHeader -->

<!-- Contenedor Izquierda Version Mobile -->
<aside class="sb-slidebar sb-left sb-style-push">
	<!-- Navegación Principal -->
	<nav class="mainNav">
		<?php wp_nav_menu(
			array(
				'menu_class'     => 'main-menu text-center',
				'theme_location' => 'main-menu'
			));
		?>						
	</nav> <!-- /.mainNav -->  
</aside> <!-- /.sb-slidebar sb-left sb-style-push -->

<!-- Contenedor Derecha version mobile -->
<aside class="sb-slidebar sb-right sb-style-push">
	<section class="pageBlog__categories">
		<?php include( locate_template('partials/content-category-post.php') ) ?>
	</section> <!-- /.pageBlog__categories -->
</aside> <!-- /.sb-slidebar sb-right sb-style-push -->


<!-- Contenedor version mobile libreria sliderbar js -->
<div id="sb-site" class="">








