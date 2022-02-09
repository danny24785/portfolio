<?php
/**
 * Theme specific functions
 *
 * @package portfolio
 */

define('PORTFOLIO_VERSION', '0.2.5');

error_reporting(E_ALL);
//error_reporting(E_STRICT);

// Require once the Composer Autoload
if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}


// Initialize all core classes and pass plugin settings
if (class_exists('Portfolio\\Init')) {
    // Init plugin settings
    require_once dirname(__FILE__) . '/config.php';

    // Get all classes from composer and init
    $classMap = array_keys(require('vendor/composer/autoload_classmap.php' ));
    Portfolio\Init::run($classMap);
}

// function portfolio_add_type_attribute($tag, $handle, $src) {
//     // if not your script, do nothing and return original $tag
//     if ( 'swiper-js' !== $handle ) {
//         return $tag;
//     }
//     // change the script tag by adding type="module" and return it.
//     $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
//     return $tag;
// }
// add_filter('script_loader_tag', 'portfolio_add_type_attribute' , 10, 3);


/**
 * 
 * Custom post type for Header teksts
 * 
 **/
function headerTexts() {

    $labels = array(
        'name'                => _x( 'Header teksten', 'Post Type General Name', 'loca' ),
        'singular_name'       => _x( 'Header tekst', 'Post Type Singular Name', 'loca' ),
        'menu_name'           => __( 'Header teksten', 'loca' ),
        'parent_item_colon'   => __( 'Parent Header tekst', 'loca' ),
        'all_items'           => __( 'Alle Header teksten', 'loca' ),
        'view_item'           => __( 'Header tekst bekijken', 'loca' ),
        'add_new_item'        => __( 'Nieuw Header tekst toevoegen', 'loca' ),
        'add_new'             => __( 'Nieuwe toevoegen', 'loca' ),
        'edit_item'           => __( 'Header tekst bewerken', 'loca' ),
        'update_item'         => __( 'Header tekst updaten', 'loca' ),
        'search_items'        => __( 'Header tekst zoeken', 'loca' ),
        'not_found'           => __( 'Niet gevonden', 'loca' ),
        'not_found_in_trash'  => __( 'Niet gevonden in de prullenbak', 'loca' ),
    );
     
    $args = array(
        'label'               => __( 'Header teksten', 'loca' ),
        'description'         => __( 'Header teksten', 'loca' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies'          => array( 'header-texts' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
 
    );

    register_post_type( 'header-texts', $args );
}
add_action( 'init', 'headerTexts' );


function headerTextsShortCode( $atts ) {
	$query_args = [
		'post_type'      => 'header-texts',
		'posts_per_page' => -1
	];

	$custom_query = new WP_Query( $query_args );

	if ( $custom_query->have_posts() ) {

		$output = '<div class="swiper-container">';
		$output .= '<div class="swiper-wrapper">';
		while ( $custom_query->have_posts() ) {
			$custom_query->the_post();

			$output .= '<div class="swiper-slide">';
            
			$output .= '<h3>' . get_the_title() . '</h3>';
			$output .= get_the_content();
			$output .= '</div>';
		}
		$output .= '</div>';
        $output .= '<div class="swiper-button-prev"></div><div class="swiper-button-next"></div>'; 
		$output .= '</div>';

		wp_reset_postdata();
	}

	return $output;

}
add_shortcode( 'portfolio-header-texts', 'headerTextsShortCode' );