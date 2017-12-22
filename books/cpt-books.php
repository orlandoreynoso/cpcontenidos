<?php 



function crear_post_type_books() {

// Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'books', 'Post Type General Name', 'molino9' ),
		'singular_name'       => _x( 'book', 'Post Type Singular Name', 'molino9' ),
		'menu_name'           => __( 'books', 'molino9' ),
		'parent_item_colon'   => __( 'book Padre', 'molino9' ),
		'all_items'           => __( 'Todas las books', 'molino9' ),
		'view_item'           => __( 'Ver book', 'molino9' ),
		'add_new_item'        => __( 'Agregar Nuevo book', 'molino9' ),
		'add_new'             => __( 'Agregar Nuevo book', 'molino9' ),
		'edit_item'           => __( 'Editar book', 'molino9' ),
		'update_item'         => __( 'Actualizar book', 'molino9' ),
		'search_items'        => __( 'Buscar book', 'molino9' ),
		'not_found'           => __( 'No encontrado', 'molino9' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'molino9' ),
	);

// Otras opciones para el post type

	$args = array(
		'label'               => __( 'books', 'molino9' ),
		'description'         => __( 'book news and reviews', 'molino9' ),
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
//		'rewrite'           => array('slug' => 'books'), // Permalinks format
//		"rewrite" => array( "slug" => "books", "with_front" => true ),
//		"taxonomies" => array( "category", "post_tag" ),
		//'rewrite'           => array('slug' => 'books/%proyectox%'), // Permalinks format

		'query_var' => true,
		'rewrite' => true,

	);

	// Por ultimo registramos el post type
	register_post_type( 'books', $args );

}

add_action( 'init', 'crear_post_type_books', 0 );

?>