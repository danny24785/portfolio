<?php

/**
 * @package portfolio
 */

namespace Portfolio\CPT;

use Portfolio\Base\Config;

class Headervisualtexts
{

    /**
     * Init class en alle actions/filters
     */
    public function init()
    {

        // Front-end
        add_action('init', [$this, 'headerTexts']);
    }

    /**
     * 
     * Custom post type for Header teksts
     * 
     **/
    public function headerTexts()
    {
        $labels = array(
            'name'                => _x( 'Header teksten', 'Post Type General Name', 'loca' ),
            'singular_name'       => _x( 'Header tekst', 'Post Type Singular Name', 'loca' ),
            'menu_name'           => __( 'Header teksten', 'loca' ),
            'parent_item_colon'   => __( 'Parent Header tekst', 'loca' ),
            'all_items'           => __( 'Alle Header teksten', 'loca' ),
            'view_item'           => __( 'Header tekst bekijken', 'loca' ),
            'add_new_item'        => __( 'Nieuw Header tekst toevoegen', 'loca' ),
            'add_new'             => __( 'Nieuwe toevoegen', 'loca' ),
            'edit_item'           => __( 'Header tekst bewerken', 'loca' ),
            'update_item'         => __( 'Header tekst updaten', 'loca' ),
            'search_items'        => __( 'Header tekst zoeken', 'loca' ),
            'not_found'           => __( 'Niet gevonden', 'loca' ),
            'not_found_in_trash'  => __( 'Niet gevonden in de prullenbak', 'loca' ),
        );
         
        $args = array(
            'label'               => __( 'Header teksten', 'loca' ),
            'description'         => __( 'Header teksten', 'loca' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'taxonomies'          => array( 'header-texts' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
     
        );
    
        register_post_type( 'header-texts', $args );
    }
}
