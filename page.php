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

<?php chef_sidebar_before( $style['sidebar-pos'], 'page-content', 'sidebar-area' ); ?>

	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<h1 class="pagetitle"><?php the_title();?></h1>

	<div class="row-fluid">
		<?php the_content();?>
	</div>
	<?php endwhile;?>

<?php chef_sidebar_after( $style['sidebar-pos'], 'page-content', 'sidebar-area' );?>	

<?php get_footer();?>