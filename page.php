<?php
/**
 * The template for displaying all pages.
 * 
 * @package portfolio
 */

get_header(); ?>

<!-- page -->

	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/content', 'page' ); ?>

	<?php endwhile; // end of the loop. ?>

<?php get_sidebar(); ?>
<?php

get_footer();
