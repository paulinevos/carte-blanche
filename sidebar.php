<?php if( is_page( 'contact' ) ):?>

	<?php if( is_active_sidebar( 'contact' ) ): ?>
		<ul class="widgetarea contact-widgets clearfix">
			<?php dynamic_sidebar( 'contact' );?>
		</ul>
	<?php endif;?>

<?php else: ?>

	<?php if( is_active_sidebar( 'sidebar-area' ) ): ?>
		<ul class="widgetarea sidebar-widgets clearfix sidebar">
			<?php dynamic_sidebar('sidebar-area');?>
		</ul>
	<?php endif;?>

<?php endif;?>
