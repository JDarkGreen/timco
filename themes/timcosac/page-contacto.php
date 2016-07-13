<?php /* Template Name: Página Contacto Plantilla */ ?>

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
	<main class="pageCommon__wrapper pageContacto">

		<div class="row">
			<div class="col-xs-12 col-md-6">
				<!-- Titulo  -->  <h2 class="text-uppercase sectionCommon__subtitle"><?php _e( 'atención al cliente', LANG ); ?></h2>

				<div class="clearfix"></div>

				<!-- Contenido -->
				<section class="pageContacto__content">

					<!-- Ofinina Central --> 
					<?php if( isset( $options['contact_tel'] ) && !empty( $options['contact_tel'] ) ) : ?>
					<p class="paragraph__info"><span><?php _e('Oficina central:' , LANG ); ?></span>
						<?= $options['contact_tel']; ?>
					</p>
					<?php endif; ?>

					<!-- RPC --> 
					<?php if( isset( $options['contact_cel'] ) && !empty( $options['contact_cel'] ) ) : ?>
					<p class="paragraph__info"><span><?php _e('RPC:' , LANG ); ?></span>
						<?php 
							/* Extraemos la cadena celular y lo convertimos en un arreglo */
							$celulares = $options['contact_cel'];
							$celulares = explode( "," , $celulares );

							//variable control para eliminar "/"
							$i          = 0;
							foreach( $celulares as $celular ){ 
								$separation = $i == count($celulares)-1 ? "" : " / " ;
								echo  $celular . $separation;
								$i++;
							} 
						?>
					</p>
					<?php endif; ?>
					
					<!-- Nuestras Areas -->
					<p class="paragraph__info"><span><?php _e('Nuestras Áreas:' , LANG ); ?></span></p>
					
					<!-- Lista de mails -->
					<ul class="emails_list">

						<!-- Gerente -->
						<?php if( isset( $options['contact_email_gerente'] ) && !empty( $options['contact_email_gerente'] ) ) : ?>
							<li><span><?php _e('Gerente Comercial:' , LANG ); ?></span> <?= $options['contact_email_gerente'] ?></li>
						<?php endif; ?>

						<!-- Gerente de Operaciones -->
						<?php if( isset( $options['contact_email_operaciones'] ) && !empty( $options['contact_email_operaciones'] ) ) : ?>
							<li><span><?php _e('Gerente de Operaciones:' , LANG ); ?></span> <?= $options['contact_email_operaciones'] ?></li>
						<?php endif; ?>

						<!-- Admin Documentaria -->
						<?php if( isset( $options['contact_email_admin_doc'] ) && !empty( $options['contact_email_admin_doc'] ) ) : ?>
							<li><span><?php _e('Admin Documentaria:' , LANG ); ?></span> <?= $options['contact_email_admin_doc'] ?></li>
						<?php endif; ?>

						<!-- Facturación y Cobranza -->
						<?php if( isset( $options['contact_email_factura'] ) && !empty( $options['contact_email_factura'] ) ) : ?>
							<li><span><?php _e('Facturación y Cobranza:' , LANG ); ?></span> <?= $options['contact_email_factura'] ?></li>
						<?php endif; ?>

						<!-- Logística -->
						<?php if( isset( $options['contact_email_logistica'] ) && !empty( $options['contact_email_logistica'] ) ) : ?>
							<li><span><?php _e('Logística:' , LANG ); ?></span> <?= $options['contact_email_logistica'] ?></li>
						<?php endif; ?>

					</ul> <!-- /. -->

					<!-- Separación --> <br/>

					<!-- Sección Encuéntranos -->
					<p class="paragraph__info"><span><?php _e('Encuéntrenos:' , LANG ); ?></span></p>

					<!-- Si existe la dirección y no está vacía -->
					<?php if( isset($options['contact_address']) && !empty($options['contact_address']) ) : echo $options['contact_address']; ?>
					<?php endif; ?>

				</section> <!-- /.pageContacto__content -->

			</div> <!-- /.col-xs-6 -->
			<div class="col-xs-12 col-md-6">
				<!-- Titulo  -->  <h2 class="text-uppercase sectionCommon__subtitle"><?php _e( 'llene nuestro formulario', LANG ); ?></h2>	

				<!-- Formulario -->
				<form id="form-contacto" class="pageContacto__form">

					<!-- Nombre -->
					<div class="pageContacto__form__group">
						<label for="input_name" class="sr-only"></label>
						<input type="text" id="input_name" name="input_name" placeholder="<?php _e( 'Su Nombre', LANG ); ?>" required />
					</div> <!-- /.pageContacto__form__group -->

					<!-- Email -->
					<div class="pageContacto__form__group">
						<label for="input_email" class="sr-only"></label>
						<input type="email" id="input_email" name="input_email" placeholder="<?php _e( 'Su E-mail', LANG ); ?>" data-parsley-trigger="change" required="" data-parsley-type-message="Escribe un email válido"/>
					</div> <!-- /.pageContacto__form__group -->

					<!-- Texto -->
					<div class="pageContacto__form__group">
						<label for="input_email" class="sr-only"></label>
						<textarea name="input_consulta" id="input_consulta" placeholder="<?php _e( 'Su Mensaje', LANG ); ?>" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Necesitas más de 20 caracteres" data-parsley-validation-threshold="10"></textarea>
					</div> <!-- /.pageContacto__form__group -->

					<button type="submit" id="send-form" class="btn__send-form text-uppercase">
						<?php _e( 'enviar' , LANG ); ?>
					</button> <!-- /.btn__send-form -->

				</form> <!-- /.pageContacto__form -->

			</div> <!-- /.col-xs-6 -->
		</div> <!-- /.row -->

		<!-- Linea de Separacion --> <div class="line-separation--gray"></div>

		<div class="row">
			<div class="col-xs-12">
				<!-- Titulo  -->  <h2 class="text-uppercase sectionCommon__subtitle"><?php _e( 'mapa', LANG ); ?></h2>

				<!-- Mapa -->
				<?php if( !empty($options['contact_mapa']) ) : ?>
					<section class="pageContacto__mapa">
						<div id="canvas-map"></div>
					</section> <!-- /.pageContacto__mapa -->
				<?php else: ?>
					<p><?php _e( 'Información no disponible actualmente' , LANG ); ?></p>
				<?php endif; ?>	

			</div> <!-- /.col-xs-12 -->	
		</div> <!-- /.row -->

	</main> <!-- /.pageCommon__wrapper -->
</div> <!-- /.container -->

<!-- Incluir Seccion banner de servicios -->
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
	        content: '<?= "Timco SAC" ?>'
	      });

	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";

	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	        //icon     : icono
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