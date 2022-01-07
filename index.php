<?php
get_header();

if (have_posts()) :
   while (have_posts()) :
      the_post(); ?>
         <article>
            
            <?php
            the_title('<h2>', '</h2>');   
            the_excerpt();
            ?>
            
            <a href="<?php the_permalink(); ?>"><?php _e('Lees meer', 'portfolio'); ?></a>
            
            
         </article>
         <?php
   endwhile;
endif;
get_sidebar();
get_footer(); 
?>