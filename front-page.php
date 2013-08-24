<?php
/**
 *
 * @package Carte Blanche
 * @since 2012
 */

get_header();
global $style;
?>

<!-- Chef_shop_sidebar also creates the fluid row -->
<?php chef_sidebar_before( $style['sidebar-pos'], 'sidebar-area', 'sidebar-home-area' ); ?>


<?php 

	// a widgetarea on the homepage:
	if( is_active_sidebar( 'home' ) ): ?>
		<ul class="widgetarea home-widgets row-fluid">
			<?php dynamic_sidebar('home');?>
		</ul>
	<?php endif;?>

<?php
	
	// check if the call-to-action plugin is registered with Cuisine:
	if( cuisine_has_plugin( 'chef-call-to-action' ) ): ?>
	<div class="row-fluid">
		<?php echo do_chef_call_to_action();?>
	</div>
<?php endif;?>

<?php 
	
	// check if there's homepage content present with a regular WordPress loop:
	if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div class="content row-fluid">
		<?php the_content();?>
	</div>
<?php endwhile; // end of the loop. ?>

<?php chef_sidebar_after( $style['sidebar-pos'], 'sidebar-area', 'sidebar-home-area' );?>

<?php get_footer();?>