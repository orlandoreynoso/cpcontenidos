<?php


/*====== METABOXES PARA PRESENTACIONES USANDO CMB2 ===================*/
add_action( 'cmb2_admin_init', 'campos_presentaciones');

function campos_presentaciones() {
	$prefix = 'info_pre_';

	$metabox_eventos = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Metaboxes campos Presentaciones', 'cmb2' ),
		'object_types'  => array( 'presentaciones'), // Post type
	) );

	$metabox_eventos->add_field( array(
	  'name'       => __( 'fecha', 'cmb2' ),
	  'desc'       => __( 'Mes de la presentaciones', 'cmb2' ),
	  'id'         => $prefix . 'fecha',
	  'type'       => 'text',
	) ); 

	$metabox_eventos->add_field( array(
	  'name'       => __( 'fecha', 'cmb2' ),
	  'desc'       => __( 'Mes de la presentaciones', 'cmb2' ),
	  'id'         => $prefix . 'fecha',
	  'type'       => 'text',
	) ); 


}





/*=========== Custom Post Type PRESENTACIONES =================================*/

add_action( 'init', 'crear_post_type_presentaciones', 0 );

function crear_post_type_presentaciones() {

// Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'Presentaciones', 'Post Type General Name', 'molino9' ),
		'singular_name'       => _x( 'Presentacion', 'Post Type Singular Name', 'molino9' ),
		'menu_name'           => __( 'Presentaciones', 'molino9' ),
		'parent_item_colon'   => __( 'Presentacion Padre', 'molino9' ),
		'all_items'           => __( 'Todas las Presentaciones', 'molino9' ),
		'view_item'           => __( 'Ver Presentacion', 'molino9' ),
		'add_new_item'        => __( 'Agregar Nuevo Presentacion', 'molino9' ),
		'add_new'             => __( 'Agregar Nuevo Presentacion', 'molino9' ),
		'edit_item'           => __( 'Editar Presentacion', 'molino9' ),
		'update_item'         => __( 'Actualizar Presentacion', 'molino9' ),
		'search_items'        => __( 'Buscar Presentacion', 'molino9' ),
		'not_found'           => __( 'No encontrado', 'molino9' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'molino9' ),
	);

// Otras opciones para el post type

	$args = array(
		'label'               => __( 'presentaciones', 'molino9' ),
		'description'         => __( 'Presentacion news and reviews', 'molino9' ),
		'labels'              => $labels,
		// Todo lo que soporta este post type
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions','page-attributes','post-formats'),
		/* Un Post Type hierarchical es como las paginas y puede tener padres e hijos.
		* Uno sin hierarchical es como los posts
		*/
		'hierarchical'        => true, /*  Es un comportamiento como las páginas  */
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 25,
		'menu_icon'           => 'dashicons-format-video',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);

	// Por ultimo registramos el post type
	register_post_type( 'presentaciones', $args );

}



?>
