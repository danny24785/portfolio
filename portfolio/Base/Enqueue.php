<?php

/**
 * @package portfolio
 */

namespace Portfolio\Base;

use Portfolio\Base\Config;

class Enqueue
{

    /**
     * Init class en alle actions/filters
     */
    public function init()
    {

        // Front-end
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
    }

    /**
     * Site CSS
     */
    public function enqueue_styles()
    {
        wp_register_style( 'style',  Config::get('plugin_url') . '/assets/css/portfolio.min.css', array(), PORTFOLIO_VERSION);
        wp_enqueue_style('style');
    }

    /**
     * Site Javascript
     */
    public function enqueue_scripts()
    {

        wp_register_script( 'portfolio', Config::get('plugin_url') . '/assets/js/portfolio.min.js', array('jquery'), PORTFOLIO_VERSION, true);
        wp_enqueue_script( 'portfolio');

        wp_register_script('ionicons', 'https://cdn.jsdelivr.net/npm/@ionic/core@5.3.5/dist/ionic/ionic.js');
        wp_enqueue_script('ionicons');
    }
}
