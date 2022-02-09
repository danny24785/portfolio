<?php

/**
 * @package portfolio
 */

namespace Portfolio\Swiper;

use Portfolio\Base\Config;

class Headervisualswiper
{

    /**
     * Init class en alle actions/filters
     */
    public function init()
    {

        // Front-end
        add_action('portfolio-header-texts', [$this, 'headerTextsSwiper']);
    }

    /**
     * 
     * Custom post type for Header teksts
     * 
     **/
    public function headerTextsSwiper($atts)
    {
        $query_args = [
            'post_type'      => 'header-texts',
            'posts_per_page' => -1
        ];
    
        $custom_query = new WP_Query( $query_args );
    
        if ( $custom_query->have_posts() ) {
    
            $output = '<div class="swiper-container">';
            $output .= '<div class="swiper-wrapper">';
            while ( $custom_query->have_posts() ) {
                $custom_query->the_post();
    
                $output .= '<div class="swiper-slide">';
                
                $output .= get_the_content();
                $output .= '</div>';
            }
            $output .= '</div>';
            $output .= '<div class="swiper-button-prev"></div><div class="swiper-button-next"></div>'; 
            $output .= '</div>';
    
            wp_reset_postdata();
        
        }

        return $output;
    }
}
