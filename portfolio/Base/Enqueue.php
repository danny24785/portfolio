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
        wp_register_style( 'style',  Config::get('plugin_url') . '/assets/css/portfolio.min.css', array(), PORTFOLIO_VERSION );
        wp_enqueue_style('style');

        wp_register_style( 'swiper-style',  'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.0.3/swiper-bundle.css', array(), PORTFOLIO_VERSION );
        wp_enqueue_style('swiper-style');
    }

    /**
     * Site Javascript
     */
    public function enqueue_scripts()
    {

        wp_register_script('swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.0.3/swiper-bundle.min.js', array(), PORTFOLIO_VERSION, false );
        wp_enqueue_script('swiper');

        // wp_register_script( 'swiper-js', Config::get('plugin_url') . '/assets/js/swiper.min.js', array(), PORTFOLIO_VERSION, true);
        // wp_enqueue_script( 'swiper-js');
        
        wp_register_script( 'portfolio', Config::get('plugin_url') . '/assets/js/portfolio.min.js', array('jquery'), PORTFOLIO_VERSION, false );
        wp_enqueue_script( 'portfolio');

        wp_register_script('ionicons', 'https://cdn.jsdelivr.net/npm/@ionic/core@5.3.5/dist/ionic/ionic.js');
        wp_enqueue_script('ionicons');
    }
}
