<?php

/**
 * @package portfolio
 */

namespace Portfolio\Images;

class FeaturedImage
{
	public function init() {
		add_action('after_setup_theme', [$this, 'featured_image_support']);
	}
	
	// Sidebar widgets
    public function featured_image_support() {
		add_theme_support( 'post-thumbnails' );
    }
}