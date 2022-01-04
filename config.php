<?php
/**
 * @package portfolio
 */

use \Portfolio\Base\Config;

$portfolio_config = [
    'plugin_name'    => 'portfolio',
    'plugin_version' => PORTFOLIO_VERSION,
    'plugin_path'    => plugin_dir_path(__FILE__),
    'plugin_url'     => get_stylesheet_directory_uri(),
];

Config::set($portfolio_config);
