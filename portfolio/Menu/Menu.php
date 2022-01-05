<?php

/**
 * @package portfolio
 */

namespace Portfolio\Menu;

class Menu
{
  /**
   * Init class en alle actions/filters
   */
  public function init()
  {

      add_action('after_setup_theme', [$this, 'register_menus_locations']);
  }

  public function register_menus_locations()
  {
    register_nav_menus(
      array(
        'Hoofdmenu' => __('Hoofdnavigatie', 'portfolio'),
      )
    );
  }
}
