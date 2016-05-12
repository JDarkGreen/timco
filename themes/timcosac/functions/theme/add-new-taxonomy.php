<?php  

//Archivo que agrega nuevas taxonomias al tema

//create a custom taxonomy
add_action( 'init', 'create_category_taxonomy', 0 );

function create_category_taxonomy() {

/* categorias servicio */
  $labels = array(
    'name'             => __( 'Categoría Servicio'),
    'singular_name'    => __( 'Categoría Servicio'),
    'search_items'     => __( 'Buscar Categoría Servicio'),
    'all_items'        => __( 'Todas Categorías del Servicio' ),
    'parent_item'      => __( 'Categoría padre del Servicio' ),
    'parent_item_colon'=> __( 'Categoría padre:' ),
    'edit_item'        => __( 'Editar categoría de Servicio' ), 
    'update_item'      => __( 'Actualizar categoría de Servicio' ),
    'add_new_item'     => __( 'Agregar nueva categoría de Servicio' ),
    'new_item_name'    => __( 'Nuevo nombre categoría de Servicio' ),
    'menu_name'        => __( 'Categoria Servicio' ),
  ); 

// Now register the taxonomy
  register_taxonomy('servicio_category',array('servicio'), array(
    'hierarchical'     => true,
    'labels'           => $labels,
    'show_ui'          => true,
    'show_admin_column'=> true,
    'query_var'        => true,
    'rewrite'          => array( 'slug' => 'servicio-category' ),
  ));

}


?>