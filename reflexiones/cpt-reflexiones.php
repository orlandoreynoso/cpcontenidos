<?php


/*=========== Custom Post Type reflexiones =================================*/

function crear_post_type_reflexiones() {

// Etiquetas para el Post Type
	$labels = array(
		'name'                => _x( 'reflexiones', 'Post Type General Name', 'molino9' ),
		'singular_name'       => _x( 'reflexion', 'Post Type Singular Name', 'molino9' ),
		'menu_name'           => __( 'reflexiones', 'molino9' ),
		'parent_item_colon'   => __( 'reflexion Padre', 'molino9' ),
		'all_items'           => __( 'Todas las reflexiones', 'molino9' ),
		'view_item'           => __( 'Ver reflexion', 'molino9' ),
		'add_new_item'        => __( 'Agregar Nuevo reflexion', 'molino9' ),
		'add_new'             => __( 'Agregar Nuevo reflexion', 'molino9' ),
		'edit_item'           => __( 'Editar reflexion', 'molino9' ),
		'update_item'         => __( 'Actualizar reflexion', 'molino9' ),
		'search_items'        => __( 'Buscar reflexion', 'molino9' ),
		'not_found'           => __( 'No encontrado', 'molino9' ),
		'not_found_in_trash'  => __( 'No encontrado en la papelera', 'molino9' ),
	);

// Otras opciones para el post type

	$args = array(
		'label'               => __( 'reflexiones', 'molino9' ),
		'description'         => __( 'reflexion news and reviews', 'molino9' ),
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
		'capability_type'     => 'page',
//		'rewrite'           => array('slug' => 'reflexiones'), // Permalinks format
		"rewrite" => array( "slug" => "reflexiones", "with_front" => true ),
		//"taxonomies" => array( "category", "post_tag" ),
		'query_var' => true,
		//'rewrite'           => array('slug' => 'reflexiones/%proyectox%'), // Permalinks format
	);

	// Por ultimo registramos el post type
	register_post_type( 'reflexiones', $args );

}

add_action( 'init', 'crear_post_type_reflexiones', 0 );

/* == Agreagando una taxonomia ==*/
/*

function taxonomia_reflexion(){
$labels = array(
	'name'              => _x( 'Tipo de reflexion', 'taxonomy general name' ),
	'singular_name'     => _x( 'Tipo de reflexion', 'taxonomy singular name' ),
	'search_items'      => __( 'Buscar Tipo de reflexion' ),
	'all_items'         => __( 'Todos los Tipo de reflexions' ),
	'parent_item'       => __( 'Tipo de reflexion Padre' ),
	'parent_item_colon' => __( 'Tipo de reflexion Padre:' ),
	'edit_item'         => __( 'Editar Tipo de reflexion' ),
	'update_item'       => __( 'Actualizar Tipo de reflexion' ),
	'add_new_item'      => __( 'Agregar Nuevo Tipo de reflexion' ),
	'new_item_name'     => __( 'Nuevo Tipo de reflexion' ),
	'menu_name'         => __( 'Tipo de reflexion' ),
);

$args = array(
	'hierarchical'      => true,
	'labels'            => $labels,
	'show_ui'           => true,
	'show_admin_column' => true,
 	'rewrite' => array(
                    'slug'          => 'proyecto',
                    'hierarchical'  => true
                    ),	
	'query_var'         => true, 	
);

register_taxonomy( 'tipo-reflexion', array( 'reflexiones' ), $args );

}

add_action( 'init', 'taxonomia_reflexion' );

*/

/*==================== metaboxes reflexiones ==============================*/

add_action( 'cmb2_admin_init', 'campos_reflexiones' );

function campos_reflexiones() {
	$prefix = 'info_ref_';

	$metabox_eventos = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Metaboxes campos reflexion', 'cmb2' ),
		'object_types'  => array('reflexiones'), // Post type
	) );

	$metabox_eventos->add_field( array(
	  'name'       => __( 'dato_reflexion', 'cmb2' ),
	  'desc'       => __( 'Mes de la reflexion', 'cmb2' ),
	  'id'         => $prefix . 'dato_reflexion',
	  'type'       => 'text',
	) ); 

	$metabox_eventos->add_field( array(
		'name' => __( 'Date reflexion', 'cmb2' ),
		'desc'       => __( 'fecha de la reflexion', 'cmb2' ),
		'id'         => $prefix . 'date_reflexion',
		'type' => 'text_date',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		// 'date_format' => 'l jS \of F Y',
	) );

	$metabox_eventos->add_field( array(
		'name' => __( 'Date reflexion dos', 'cmb2' ),
		'desc'       => __( 'fecha de la reflexion dos', 'cmb2' ),
		'id'         => $prefix . 'datetwo_reflexion',
		'type' => 'text_date_timestamp',
		// 'timezone_meta_key' => 'wiki_test_timezone',
		// 'date_format' => 'l jS \of F Y',
	) );

}
/*

function proyecto_post_link( $post_link, $id = 0 ) {
            $post = get_post($id);

            if ( is_object( $post ) ) {
                if ( $post->post_type == 'reflexiones' ) {
                    $terms = wp_get_object_terms( $post->ID, 'tipo-reflexion' );
                    if ( $terms ) {
                        $parent     = $terms[0]->parent;
                        $url        = $terms[0]->slug;
                        while ( $parent != 0 ) {
                            $terms  = get_term_by( 'parent', $parent, 'tipo-reflexion' );
                            $url    = $terms->slug . '/' . $url;
                            $parent = $terms->parent;
                        }

                        return str_replace( '%tipo-reflexion%' , $url , $post_link );
                    }
                }
            }
            return $post_link;
        }
        add_filter( 'post_type_link', 'proyecto_post_link', 1, 3 );

*/

?>