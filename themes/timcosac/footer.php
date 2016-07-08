
<!-- Extraer opciones  -->
<?php $options = get_option('timco_custom_settings'); ?>

	<footer class="mainFooter">
		<div class="container">
			<section class="mainFooter__content">

				<!-- Seccion de Desacription -->
				<div class="mainFooter__description">
					<div class="row">
						<div class="col-xs-12 col-md-4 text-center">
							<!-- Logo --> <figure><img src="<?= IMAGES ?>/footer/logo_timco_blanco.png" alt="logo-timco" class="img-responsive center-block"></figure>
							<!-- Span --> <span class=""><?php _e('Transporte Timco ' . date('Y') , LANG ); ?> </span>
						</div> <!-- /.col-xs-4 -->
						<div class="col-xs-12 col-md-8">
							<div class="address">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							<?php
								if( isset($options['contact_address']) && !empty($options['contact_address']) ):   
								$direcciones = $options['contact_address'];
								echo apply_filters('the_content', $direcciones );
								endif;
							?>
							</div> <!-- /. -->
						</div> <!-- /.col-xs-8 -->
					</div> <!-- /.row -->
				</div> <!-- /.mainFooter__description -->

				<!-- Seccion de Datos -->
				<div class="mainFooter__data">
					<!-- Teléfono -->
					<?php if( isset($options['contact_tel']) && !empty($options['contact_tel']) ): 
						$phone = $options['contact_tel']; 
					?>
						<p> <i class="fa fa-phone" aria-hidden="true"></i>
							<?= $phone ?>
						</p>
					<?php endif; ?>
					<!-- Celular -->
					<?php if( isset($options['contact_cel']) && !empty($options['contact_cel']) ) :
						/* Extraemos la cadena celular y lo convertimos en un arreglo */
						$celulares = $options['contact_cel'];
						$celulares = explode( "," , $celulares );
					?>
						<p> <i class="fa fa-mobile" aria-hidden="true"></i>
							Rpc: <?php foreach( $celulares as $celular){ echo  $celular . " / "; } ?>
						</p>
					<?php endif; ?>
					<!-- Mail -->
					<?php if( isset($options['contact_email']) && !empty($options['contact_email']) ) : 
						$mail = $options['contact_email'];
					?>
						<p> <i class="fa fa-envelope" aria-hidden="true"></i>
							<?= $mail ?>
						</p>
					<?php endif; ?>
				</div> <!-- /.mainFooter__description -->
				<!-- Seccion de Red Social -->
				<div class="mainFooter__social text-center">
					<!-- Titulo -->
					<h2 class="text-capitalize"><?php _e('redes sociales' , LANG ); ?></h2>
					<!-- Lista -->
					<ul>
						<!-- Facebook -->
						<?php if( isset($options['red_social_fb']) && !empty($options['red_social_fb']) ) : 
							$facebook = $options['red_social_fb'];
						?> <li><a target="_blank" href="<?= $facebook; ?>">
							<img src="<?= IMAGES ?>/redes-sociales/facebook.png" alt="facebook" class="img-responsive" />
						</a></li>
						<?php endif; ?>

						<!-- Twitter -->
						<?php if( isset($options['red_social_twitter']) && !empty($options['red_social_twitter']) ) : 
							$twitter = $options['red_social_twitter'];
						?> <li><a target="_blank" href="<?= $twitter; ?>">
							<img src="<?= IMAGES ?>/redes-sociales/twitter.png" alt="twitter" class="img-responsive" />
						</a></li>
						<?php endif; ?>

						<!-- Youtube -->
						<?php if( isset($options['red_social_ytube']) && !empty($options['red_social_ytube']) ) : 
							$youtube = $options['red_social_ytube'];
						?> <li><a target="_blank" href="<?= $youtube; ?>">
							<img src="<?= IMAGES ?>/redes-sociales/youtube.png" alt="youtube" class="img-responsive" />
						</a></li>
						<?php endif; ?>

					</ul>

					<!-- Website -->
					<p class="font-weight-600">www.<span class="font-big">timcosac</span>.com.pe</p>
				</div> <!-- /.mainFooter__social -->
				
			</section> <!-- /.mainFooter__content -->

			<section class="mainFooter__develop text-center">
				Desarrollado por <a target="_blank" href="http://www.ingenioart.com/">
					Ingenioart.com
				</a>
			</section> <!-- /.mainFooter__develop -->
 
		</div> <!-- /.container -->
	</footer><!-- /.mainFooter -->

	</div> <!-- /#sb-slidebar -->

	<?php wp_footer(); ?>

	<script> var url = "<?= THEMEROOT ?>"; </script>
</body>
</html>

