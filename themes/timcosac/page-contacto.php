<?php /* Template Name: Página Contacto Plantilla */ ?>

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

<!-- Contenido Central -->
<section class="pageContacto">
	<div class="container">
		<div class="row">
			<!-- Seccion de Información -->
			<div class="col-xs-12 col-sm-5">
				<section class="pageContacto__content">
					<!-- Titulo -->
					<h2 class="sectionCommon__subtitle pageEmpresa__subtitle text-uppercase">
					<strong><?php _e( 'Constructec' , LANG ); ?></strong>
					</h2>
					<!-- Lista de Informacion -->
					<ul class="pageContacto__menu-contacto">
						<!-- Telefono -->
						<?php $tel = $options['contact_tel']; if( !empty($tel)): ?>
							<li><i class="fa fa-phone" aria-hidden="true"></i>
								<?= $tel; ?>
							</li>
						<?php endif; ?>
						<!-- Celular -->
						<?php $cel = $options['contact_cel']; if( !empty($cel)): ?>
							<li><i class="fa fa-mobile" aria-hidden="true"></i>
								<?= $cel; ?>
							</li>
						<?php endif; ?>
						<!-- Email -->
						<?php $email = $options['contact_email']; if( !empty($email)): ?>
							<li class="item--orange"><i class="fa fa-envelope" aria-hidden="true"></i>
								<?= $email; ?>
							</li>
						<?php endif; ?>
					</ul> <!-- /.mainFooter__menu-contacto -->					
				</section> <!-- /.pageContacto__content -->
				
				<!-- Redes Sociales -->
				<section class="pageContacto__content">
					<!-- Titulo -->
					<h2 class="sectionCommon__subtitle text-uppercase">
					<strong><?php _e( 'redes sociales' , LANG ); ?></strong>
					</h2>
					<!-- Menu redes sociales -->
					<ul class="pageContacto__social-link">
						<!-- Youtube -->
						<?php $ytube = $options['red_social_ytube']; if( !empty($ytube)): ?>
						<li><a target="_blank" href="<?= $ytube ?>"><i class="fa fa-youtube" aria-hidden="true"></i>
						</a></li>
						<?php endif; ?>
						<!-- Twitter -->
						<?php $tw = $options['red_social_twitter']; if( !empty($tw)): ?>
						<li><a target="_blank" href="<?= $tw ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<?php endif; ?>
						<!-- Facebook -->
						<?php $fb = $options['red_social_fb']; if( !empty($fb)): ?>
						<li><a target="_blank" href="<?= $fb ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<?php endif; ?>
					</ul> <!-- /.mainFooter__social-link -->					
				</section> <!-- /.pageContacto__content pageContacto__social-link -->
			</div> <!-- /.col-xs-12 col-sm-5 -->

			<!-- Seccion de Formulario -->
			<div class="col-xs-12 col-sm-7">
				<section class="pageContacto__form">
					<!-- Titulo -->
					<h2 class="sectionCommon__subtitle text-uppercase">
					<strong><?php _e( 'nuestro formulario' , LANG ); ?></strong>
					</h2>
					<!-- Formulario -->
					<form id="form-contacto" action="" class="" method="POST">
						<div class="pageContacto__form__group">
							<label for="input_name" class="sr-only"></label>
							<input type="text" name="input_name" placeholder="<?php _e( 'Nombres y Apellidos', LANG ); ?>" required />
						</div> <!-- /.pageContacto__form__group -->
						<div class="pageContacto__form__group">
							<label for="input_address" class="sr-only"></label>
							<input type="text" name="input_address" placeholder="<?php _e( 'Dirección', LANG ); ?>" required />
						</div> <!-- /.pageContacto__form__group -->
						<div class="pageContacto__form__group">
							<label for="input_email" class="sr-only"></label>
							<input type="email" name="input_email" placeholder="<?php _e( 'E-mail', LANG ); ?>" data-parsley-trigger="change" required="" data-parsley-type-message="Escribe un email válido"/>
						</div> <!-- /.pageContacto__form__group -->
						<div class="pageContacto__form__group">
							<label for="input_email" class="sr-only"></label>
							<textarea name="input_consulta" id="" placeholder="<?php _e( 'Consulta', LANG ); ?>" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Necesitas más de 20 caracteres" data-parsley-validation-threshold="10"></textarea>
						</div> <!-- /.pageContacto__form__group -->
						<!-- Boton de enviar el formulario  -->
						<div class="pageContacto__form__group">
							<button id="send-form" class="btn__send-form text-uppercase">
								<?php _e( 'enviar' , LANG ); ?>
							</button> <!-- /.btn__send-form -->
						</div> <!-- /.pageContacto__form__group -->
					</form> <!-- /. -->
				</section> <!-- /.pageContacto__form -->
			</div> <!-- /.col-xs-12 col-sm-7 -->
		</div> <!-- /.row -->

		<!-- Saltos de linea  -->  <br/><br/>
		<!-- Mapa -->
		<!-- Titulo -->
		<h2 class="sectionCommon__subtitle pageEmpresa__subtitle text-uppercase">
		<strong><?php _e( 'mapa' , LANG ); ?></strong>
		</h2>			
	</div> <!-- /.container -->
	<!-- Mapa -->
	<?php if( !empty($options['contact_mapa']) ) : ?>
	<section class="pageContacto__mapa">
		<div id="canvas-map"></div>
	</section> <!-- /.pageContacto__mapa -->
	<?php else: ?>
		<div class="container">
			<p><?php _e( 'Información no disponible actualmente' , LANG ); ?></p>
		</div>
	<?php endif; ?>
</section> <!-- /.pageContacto  -->

<!-- Incluir Banner de Servicios -->
<?php include(locate_template('partials/banner-services.php')); ?>

<!-- Incluir template de carousel clientes -->
<?php include( locate_template("partials/carousel-clientes.php") ); ?>

<!-- Script Google Mapa -->
<?php if( !empty($options['contact_mapa']) ) : $mapa = explode(',', $options['contact_mapa'] ); ?>
	<script type="text/javascript">	

		<?php  
			$lat = $mapa[0];
			$lng = $mapa[1];
		?>

	    var map;
	    var lat = <?= $lat ?>;
	    var lng = <?= $lng ?>;

	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map'), {
	        center: {lat: lat, lng: lng},
	        zoom  : 16
	      });

	      //infowindow
	      var infowindow    = new google.maps.InfoWindow({
	        content: <?= "'" . $options['contact_address'] . "'" ?>
	      });

	      //icono
	      var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";

	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name'),'damol-framework') ?>",
	        icon     : icono
	      });
	      //marker.addListener('click', toggleBounce);
	      marker.addListener('click', function() {
	        infowindow.open( map, marker);
	      });
	    }

	    google.maps.event.addDomListener(window, "load", initialize);

	</script>
<?php endif; ?>

<!-- Get Footer -->
<?php get_footer(); ?>