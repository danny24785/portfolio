<?php
/**
 * Index page.
 * 
 * @package portfolio
 */

get_header(); ?>

<div class="projecten-wrapper">   
   <?php echo '<h1>' . get_the_title( get_option('page_for_posts', true) ) . '</h1>'; ?>
   <ul class="projecten">
      <?php
      if (have_posts()) :
         while (have_posts()) :
            the_post(); ?>
               <li>
                  <article>      
                     <?php
                     the_title('<h2>', '</h2>'); ?>
                     <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'header-visual' ); ?></a>
                     <?php the_excerpt(); ?>
                     
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
</div>
<?php
get_sidebar();
get_footer(); 
?>