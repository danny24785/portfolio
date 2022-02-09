<?php
/**
 * Theme specific functions
 *
 * @package portfolio
 */

define('PORTFOLIO_VERSION', '0.2.9');

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


function headerTextsShortCode() {
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