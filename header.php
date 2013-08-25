<?php
/**
 * The main template file.
 *
 * @package Carte Blanche
 * @since 2013
 */

$style = cuisine_get_theme_style( true );
$GLOBALS['style'] = $style;
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>	
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title(); ?></title>
	<meta name="author" content="Chef du Web">
	
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<link rel="shortcut icon" href="<?php echo cuisine_template_url();?>/favicon.ico"/>
	<link rel="apple-touch-icon" href="<?php echo cuisine_template_url();?>/images/meta-icons/apple-touch-icon.png"/>

	<link rel="stylesheet" href="<?php echo cuisine_template_url();?>/style.php">
	<script src="<?php echo cuisine_template_url();?>/js/libs/modernizr-2.5.3.min.js"></script>
	<?php wp_head(); ?>
	
</head>
<body <?php body_class(); ?>>
	<?php 

	//add the top navigation if it exists:
	if( has_nav_menu( 'top' ) || is_active_sidebar( 'topmenu' )):?>
	<div class="row-fluid topbar" id="topmenu">
		<div class="top-menu container">

			<?php if( has_nav_menu( 'top') ):?>
				<?php wp_nav_menu( array( 'theme_location' => 'top', 'depth' => 1, 'container' => false ) ); ?>
			<?php endif;?>

			<?php if(is_active_sidebar( 'topmenu' ) ):?>
				<ul class="top-widgets pull-right">
					<?php dynamic_sidebar('topmenu');?>
				</ul>
			<?php endif;?>

		</div>
	</div>
	<?php endif;?>

	<!-- Main menu + logo -->
	<div class="mainmenu row-fluid" id="mainmenu">
		<div class="container">
			<?php chef_theme_logo();?>
			<?php if(has_nav_menu( 'main' ) ):?>
				<?php wp_nav_menu( array( 'theme_location' => 'main', 'depth' => 2, 'menu_class' => 'pull-right' ) ); ?>
			<?php endif;?>
		</div>
	</div>
	
	<!-- Header / slider -->
	<header class="row-fluid slider">
		
		<?php if( $style['header-size'] == 'boxed' ) echo '<div class="container">';?>

		<?php if( cuisine_has_plugin( 'chef-slider' ) ):?>
			<?php chef_slider();?> 
		<?php endif;?>
	
		<?php if( $style['header-size'] == 'boxed' ) echo '</div>';?> 
	</header>
	<div class="row-fluid slider-spacer"></div>
	
	<div class="container" id="container">
		<?php if( cuisine_has_plugin( 'chef-breadcrumbs' ) ):?>
		<div class="fluid-row breadcrumbs">
			<?php chef_breadcrumbs();?>
		</div>
		<?php endif;?>
	
		<div id="main" role="main" class="fluid-row">
