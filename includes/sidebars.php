<?php

/**
 * A simple way to create flexible sidebars on all pages.
 *
 * @package Carte Blanche
 * @since 2012
 *
 */

	function chef_sidebar_before( $sidebar_position, $class, $sidebar_area ){
		
	?>
		<!-- If there's a side bar set, we need some extra attention: -->
		<?php if( is_active_sidebar( $sidebar_area ) ):?>
			<div class="row-fluid <?php echo $class;?> with-sidebar sidebar-<?php echo $sidebar_position; ?>">
				
				<!-- If this sidebar is supposed to be on the left, load it here: -->
				<?php if( $sidebar_position == 'left' ):?>
		
					<div class="span3 sidebar">
						<ul class="widgetarea sidebar-widgets clearfix">
							<?php dynamic_sidebar( $sidebar_area );?>
						</ul>
					</div>
				
				<?php endif;?>
		
				<div class="span9">
		<?php else:?>
			<!-- There's no sidebar; just a fullwidth kinda thing: -->
			<div class="row-fluid <?php echo $class;?>">
		<?php endif;?>
	
		<?php
	}


	function chef_sidebar_after( $sidebar_position, $class, $sidebar_area ){
		
	?>
		<?php if( is_active_sidebar( $sidebar_area ) && $sidebar_position == 'right' ):?>
			<!-- Do the sidebar on the right: -->
			</div><div class="span3 sidebar sidebar-<?php echo $class;?>">
				<ul class="widgetarea sidebar-widgets clearfix">
					<?php dynamic_sidebar( $sidebar_area );?>
				</ul>
			</div>
		<?php endif;?> 
		</div>
	<?php
	}


?>
