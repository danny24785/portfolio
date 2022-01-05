<?php

/**
 * @package portfolio
 */

namespace Portfolio\Widgets;

class Widgets
{
	public function init() {
		add_action('after_setup_theme', [$this, 'register_sidebar_widgets']);
		add_action('after_setup_theme', [$this, 'register_footer_widgets']);
	}
	
	// Sidebar widgets
    public function register_sidebar_widgets() {
       for ($t=1; $t<=2; $t++) {

            register_sidebar( array(
                'name' => __( 'Sidebar Widget '.$t, 'portfolio' ),
                'id' => 'sidebar-widget-'.$t,
                'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            ));
        }
    }


	// Footer widgets
	public function register_footer_widgets() {
        for ($t=1; $t<=4; $t++) {

            register_sidebar( array(
                'name' => __( 'Footer Widget '.$t, 'portfolio' ),
                'id' => 'footer-widget-'.$t,
                'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            ));
        }
    }
}