<?php
/**
 * Template part for displaying posts
 *
 * @package portfolio
 */
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php the_post_thumbnail( 'header-visual' ); ?>	

	<header class="entry-header">
		<?php
		the_title( '<h1 class="entry-title">', '</h1>' );
		?>
	</header>
		
	<div class="entry-content">
		<?php
		the_content();
		?>
	</div>

	<?php
	if(is_single()) { 
	?>
		<time class="date-published">
			<?php 
			echo '<span class="date-prefix">' . __('Published on: ', 'portfolio') . '</span>' . esc_html( the_date() ); 
			?>
		</time>
	<?php 
	}
	?>
	
	<footer class="entry-footer">
		<?php
		edit_post_link('Bewerken', '<span class="edit-link">', '</span>');
		?>
	</footer>
</article>

	
