<?php
/**
 *
 * Template Name: Full Width
 *
 *
 * @package Carte Blanche
 * @since 2012
 */

get_header();?>

<div class="row-fluid page-content">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<h1 class="pagetitle"><?php the_title();?></h1>

	<div class="row-fluid">
		<?php the_content();?>
	</div>
	<?php endwhile;?>
</div>

<?php get_footer();?>