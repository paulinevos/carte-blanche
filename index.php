<?php
/**
 *
 * @package Carte Blanche
 * @since 2012
 */

get_header();
?>
<div class="fullwidth sidebar-right">

	<div class="twothird">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	
		<h2><?php the_title();?></h2>
		<?php the_content();?>
	
	<?php endwhile; // end of the loop. ?>
	</div>
	<div class="onethird sidebar">
		<?php get_sidebar();?>
	</div>
</div>

<?php get_footer();?>