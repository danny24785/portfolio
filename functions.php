<?php
/**
 * Theme specific functions
 *
 * @package portfolio
 */

define('PORTFOLIO_VERSION', '0.2.4');

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