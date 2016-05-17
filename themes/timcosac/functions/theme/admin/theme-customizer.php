<?php
/***********************************************************************************************/
/* Add a menu option to link to the customizer */
/***********************************************************************************************/
add_action('admin_menu', 'display_custom_options_link');
function display_custom_options_link() {
	add_theme_page('Timco Opciones', 'Timco Opciones', 'edit_theme_options', 'customize.php');
}

/***********************************************************************************************/
/* Add options in the theme customizer page */
/***********************************************************************************************/
add_action('customize_register', 'timco_customize_register');
function timco_customize_register($wp_customize) {
	// Logo 
	$wp_customize->add_section('timco_logo', array(
		'title' => __('Logo', LANG),
		'description' => __('Permite subir tu logo personalizado.', LANG),
		'priority' => 35
	));
	
	$wp_customize->add_setting('timco_custom_settings[logo]', array(
		'default' => IMAGES . '/logo.png',
		'type' => 'option'
	));
	
	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo', array(
		'label' => __('Carga tu Logo', LANG),
		'section' => 'timco_logo',
		'settings' => 'timco_custom_settings[logo]'
	)));

	/*|-----------------------------------------------------------------------|*/
	/*|-----------------------------------------------------------------------|*/

	####>>>>>>>>>>>> MISION Y VISIÓN >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('timco_mision_vision', array(
		'title' => __('Historia Misión y Visión Empresa', LANG),
		'description' => __('Sección Misión y Visión Empresa', LANG),
		'priority' => 41
	));	
	/* HISTORIA */
	$wp_customize->add_setting('timco_custom_settings[text_historia]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('timco_custom_settings[text_historia]', array(
		'label'    => __('Escribe el texto HISTORIA', LANG),
		'section'  => 'timco_mision_vision',
		'settings' => 'timco_custom_settings[text_historia]',
		'type'     => 'textarea'
	));	
	/* MISION */
	$wp_customize->add_setting('timco_custom_settings[text_mision]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('timco_custom_settings[text_mision]', array(
		'label'    => __('Escribe el texto MISIÓN', LANG),
		'section'  => 'timco_mision_vision',
		'settings' => 'timco_custom_settings[text_mision]',
		'type'     => 'textarea'
	));	
	/* VISION */
	$wp_customize->add_setting('timco_custom_settings[text_vision]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('timco_custom_settings[text_vision]', array(
		'label'    => __('Escribe el texto VISIÓN', LANG),
		'section'  => 'timco_mision_vision',
		'settings' => 'timco_custom_settings[text_vision]',
		'type'     => 'textarea'
	));	
	/* PILARES ESTRATÉGICOS */
	$wp_customize->add_setting('timco_custom_settings[text_pilares]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('timco_custom_settings[text_pilares]', array(
		'label'    => __('Escribe el texto PILARES ESTRATÉGICOS', LANG),
		'section'  => 'timco_mision_vision',
		'settings' => 'timco_custom_settings[text_pilares]',
		'type'     => 'textarea'
	));

	/*|-----------------------------------------------------------------------|*/
	/*|-----------------------------------------------------------------------|*/

	####>>>>>>>>>>>> REDES SOCIALES >>>>>>>>>>>>>>>>>>
	$wp_customize->add_section('timco_redes_sociales', array(
		'title' => __('Redes Sociales', LANG),
		'description' => __('Sección Redes Sociales', LANG),
		'priority' => 41
	));	
	//facebook
	$wp_customize->add_setting('timco_custom_settings[red_social_fb]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('timco_custom_settings[red_social_fb]', array(
		'label'    => __('Coloca el link de facebook de la empresa', LANG),
		'section'  => 'timco_redes_sociales',
		'settings' => 'timco_custom_settings[red_social_fb]',
		'type'     => 'text'
	));
	//youtube
	$wp_customize->add_setting('timco_custom_settings[red_social_ytube]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('timco_custom_settings[red_social_ytube]', array(
		'label'    => __('Coloca el link de youtube de la empresa', LANG),
		'section'  => 'timco_redes_sociales',
		'settings' => 'timco_custom_settings[red_social_ytube]',
		'type'     => 'text'
	));
	//twitter
	$wp_customize->add_setting('timco_custom_settings[red_social_twitter]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('timco_custom_settings[red_social_twitter]', array(
		'label'    => __('Coloca el link de twitter de la empresa', LANG),
		'section'  => 'timco_redes_sociales',
		'settings' => 'timco_custom_settings[red_social_twitter]',
		'type'     => 'text'
	));
	//gmail
	$wp_customize->add_setting('timco_custom_settings[red_social_gmail]', array(
		'default' => '',
		'type' => 'option'
	));
	$wp_customize->add_control('timco_custom_settings[red_social_gmail]', array(
		'label'    => __('Coloca el link de gmail de la empresa', LANG),
		'section'  => 'timco_redes_sociales',
		'settings' => 'timco_custom_settings[red_social_gmail]',
		'type'     => 'text'
	));

	
	// Contact Email
	$wp_customize->add_section('timco_contact_email', array(
		'title' => __('Seccion Correos', LANG),
		'description' => __('Escribe el Correo Contacto Correspondiente', LANG),
		'priority' => 37
	));
	
	//Email Principal
	$wp_customize->add_setting('timco_custom_settings[contact_email]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('timco_custom_settings[contact_email]', array(
		'label'    => __('Email Contacto', LANG),
		'section'  => 'timco_contact_email',
		'settings' => 'timco_custom_settings[contact_email]',
		'type'     => 'text'
	));

	//Email Gerente Comercial
	$wp_customize->add_setting('timco_custom_settings[contact_email_gerente]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('timco_custom_settings[contact_email_gerente]', array(
		'label'    => __('Email Gerente Comercial:', LANG),
		'section'  => 'timco_contact_email',
		'settings' => 'timco_custom_settings[contact_email_gerente]',
		'type'     => 'text'
	));

	//Email Administración documentaria
	$wp_customize->add_setting('timco_custom_settings[contact_email_admin_doc]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('timco_custom_settings[contact_email_admin_doc]', array(
		'label'    => __('Email Admnistración Documentaria:', LANG),
		'section'  => 'timco_contact_email',
		'settings' => 'timco_custom_settings[contact_email_admin_doc]',
		'type'     => 'text'
	));

	//Email Facturacion y cobranza
	$wp_customize->add_setting('timco_custom_settings[contact_email_factura]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('timco_custom_settings[contact_email_factura]', array(
		'label'    => __('Email Facturación y Cobranza:', LANG),
		'section'  => 'timco_contact_email',
		'settings' => 'timco_custom_settings[contact_email_factura]',
		'type'     => 'text'
	));


	//Email Logística
	$wp_customize->add_setting('timco_custom_settings[contact_email_logistica]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('timco_custom_settings[contact_email_logistica]', array(
		'label'    => __('Email Logística:', LANG),
		'section'  => 'timco_contact_email',
		'settings' => 'timco_custom_settings[contact_email_logistica]',
		'type'     => 'text'
	));


	//Customizar celular
	$wp_customize->add_section('timco_contact_cel', array(
		'title' => __('Celular de Contacto', LANG),
		'description' => __('Celular de Contacto', LANG),
		'priority' => 39
	));
	
	$wp_customize->add_setting('timco_custom_settings[contact_cel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('timco_custom_settings[contact_cel]', array(
		'label'    => __('Escribe el o los números de celular del contacto separados por comas', LANG),
		'section'  => 'timco_contact_cel',
		'settings' => 'timco_custom_settings[contact_cel]',
		'type'     => 'text'
	));

	//Customizar telefono
	$wp_customize->add_section('timco_contact_tel', array(
		'title' => __('Telefono de Contacto', LANG),
		'description' => __('Telefono de Contacto', LANG),
		'priority' => 39
	));
	
	$wp_customize->add_setting('timco_custom_settings[contact_tel]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('timco_custom_settings[contact_tel]', array(
		'label'    => __('Escribe el numero de teléfono', LANG),
		'section'  => 'timco_contact_tel',
		'settings' => 'timco_custom_settings[contact_tel]',
		'type'     => 'text'
	));

	//Customizar Direccion
	$wp_customize->add_section('timco_contact_address', array(
		'title' => __('Direccion de Contacto', LANG),
		'description' => __('Direccion de Contacto', LANG),
		'priority' => 40
	));
	
	$wp_customize->add_setting('timco_custom_settings[contact_address]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('timco_custom_settings[contact_address]', array(
		'label'    => __('Escribe la Direccion del contacto ', LANG),
		'section'  => 'timco_contact_address',
		'settings' => 'timco_custom_settings[contact_address]',
		'type'     => 'textarea'
	));

	//Customizar MAPA
	$wp_customize->add_section('timco_contact_mapa', array(
		'title' => __('Mapa de Contacto', LANG),
		'description' => __('Mapa de Contacto', LANG),
		'priority' => 41
	));
	
	$wp_customize->add_setting('timco_custom_settings[contact_mapa]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('timco_custom_settings[contact_mapa]', array(
		'label'    => __('Escribe latitud y longitud de mapa sepador por coma', LANG),
		'section'  => 'timco_contact_mapa',
		'settings' => 'timco_custom_settings[contact_mapa]',
		'type'     => 'text'
	));

	//Customizar WIDGET NOSOTROS
	$wp_customize->add_section('timco_widget_nosotros', array(
		'title' => __('Sección NOSOTROS', LANG),
		'description' => __('Sección NOSOTROS', LANG),
		'priority' => 40
	));
	
	//textarea
	$wp_customize->add_setting('timco_custom_settings[widget_nosotros]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('timco_custom_settings[widget_nosotros]', array(
		'label'    => __('Escribe contenido que ira en sección nosotros - PORTADA', LANG),
		'section'  => 'timco_widget_nosotros',
		'settings' => 'timco_custom_settings[widget_nosotros]',
		'type'     => 'textarea'
	));
	//imagen
	$wp_customize->add_setting('timco_custom_settings[image_nosotros]',array(
		'default' => '',
		'type'    => 'option'
	));

	$wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'widget_nosotros',array(
		'label'    => __('Imagen Nosotros', LANG),
		'section'  => 'timco_widget_nosotros',
		'settings' => 'timco_custom_settings[image_nosotros]',
	)));	

	//Customizar Informacion Footer
	$wp_customize->add_section('timco_widget_footer', array(
		'title' => __('Sección Footer', LANG),
		'description' => __('Sección Footer', LANG),
		'priority' => 41
	));
	
	//textarea
	$wp_customize->add_setting('timco_custom_settings[widget_footer]', array(
		'default' => '',
		'type' => 'option'
	));
	
	$wp_customize->add_control('timco_custom_settings[widget_footer]', array(
		'label'    => __('Escribe contenido en sección FOOTER', LANG),
		'section'  => 'timco_widget_footer',
		'settings' => 'timco_custom_settings[widget_footer]',
		'type'     => 'textarea'
	));
	
}	
?>