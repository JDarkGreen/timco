<?php  /* Obtener página de Contacto */
	$page_contacto = get_page_by_path("contactenos");
?>

<!-- Incluir Seccion banner de servicios -->
<section class="pageWrapper__banner text-center text-uppercase">
	<!-- Titulo -->	<h2 class="pageWrapper__banner__title">
		<?php _e( 'consulte acerca de nuestros servicios' , LANG ); ?>
	</h2>
	<!-- Boton --> <a href="<?= get_permalink( $page_contacto->ID ); ?>" class="pageWrapper__banner__btn">
		<?php _e( 'click aquí' , LANG ); ?>
	</a>
</section> <!-- /.pageWrapper__banner -->