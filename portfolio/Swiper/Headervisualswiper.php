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
        add_shortcode('portfolio-header-texts', [$this, 'headerTextsSwiper']);
    }

    /**
     * 
     * Custom post type for Header teksts
     * 
     **/
    public function headerTextsSwiper()
    {
        $query_args = [
            'post_type'      => 'header-texts',
            'posts_per_page' => -1
        ];
    
        $custom_query = new \WP_Query( $query_args );
    
        // Show a swiper slider if there are any header texts
        if ( $custom_query->have_posts() ) {
    
            $output = '<div class="swiper-container">';
            $output .= '<div class="swiper-wrapper">';
            
            // Loop through all the header texts and create a swiper slide for each one
            while ( $custom_query->have_posts() ) {
                $custom_query->the_post();
                $thumb = get_the_post_thumbnail();
                $output .= '<div class="swiper-slide"';
                
                $output .= '><div class="swiper-slide-inner';

                    // use flex-direction: column if the 'column' option is checked
                    get_field('column') ? $output .= ' display-column"' : $output .= '"';
                
                $output .= '>';

                if($thumb != '') {
                    $output .= '<div class="swiper-thumb';
                    
                    get_field('circle') ? $output .= ' circle' : $output .= '';

                    $output .= '">' . $thumb . '</div>';
                } else {
                    $output .= '';
                }
                
                $output .= '<div class="swiper-content">' . get_the_content() . '</div>';
                $output .= '</div>';
                
                // Show button if a url has been filled in
                if(get_field('link')) { 
                    $output .= '<div class="swiper-button-wrapper"><a href="' . get_field('link') . '" alt="project"';
                    
                    // Make sure the target is opened in a new tab if the option 'New window' is checked
                    get_field('new_window') ? $output .= ' target="_blank"' : $output .= '';
                    
                    $output .= ' class="swiper-header-link">';
                    
                        // Use value of the label link field if filled in as button label
                        get_field('label_link') != '' ? $output .= get_field('label_link') : $output .= __('Bezoek website', 'portfolio');
                    
                    $output .= '</a></div>';
                }
                
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
