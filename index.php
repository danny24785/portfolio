<?php
get_header();
?>

<ul class="projecten">
   <?php
   if (have_posts()) :
      while (have_posts()) :
         the_post(); ?>
            <li>
               <article>      
                  <?php
                  the_title('<h2>', '</h2>');
                  the_post_thumbnail( 'header-visual' );
                  the_excerpt();
                  ?>
                  
                  <div class="read-more-wrapper">
                     <a href="<?php the_permalink(); ?>" class="btn read-more-btn gradient-primary"><?php _e('Lees meer', 'portfolio'); ?></a>
                  </div>
                  
               </article>
            </li>
            <?php
      endwhile;
   endif;
   ?>
</ul>

<?php
get_sidebar();
get_footer(); 
?>