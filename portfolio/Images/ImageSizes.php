<?php

/**
 * @package portfolio
 */

namespace Portfolio\Images;

class ImageSizes
{
	public function init() {
		add_action('after_setup_theme', [$this, 'add_header_visual']);
	}
	
	// Sidebar widgets
    public function add_header_visual() {
		add_image_size( 'header-visual', 700, 200, array( 'center', 'center' ) );
    }
}