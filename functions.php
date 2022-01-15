<?php
/**
 * Theme specific functions
 *
 * @package portfolio
 */

define('PORTFOLIO_VERSION', '0.1.4');

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