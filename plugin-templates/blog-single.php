<?php 
/**
 *
 * @package Chef Standaard
 * @since 2012
 */

	get_header();
	global $style;

?>

<!-- Chef_shop also creates the fluid row -->
<?php chef_shop_sidebar_before( $style['sidebar-pos'], 'blog', 'sidebar-area' ); ?>

	<?php if( have_posts() ) while( have_posts() ) : the_post();?>

	<h1 class="pagetitle"><?php the_title();?></h1>

	<?php get_template_part('plugin-templates/post', get_post_format() );?>
	
	<?php if( comments_open() ):?>
		<?php comments_template( '', true ); ?>
	<?php endif;?>

	<?php endwhile; ?>

<?php chef_shop_sidebar_after( $style['sidebar-pos'], 'blog', 'sidebar-area' );?>

<?php get_footer();?>