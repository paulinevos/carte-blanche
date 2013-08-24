<?php
/**
 *
 * @package Carte Blanche
 * @since 2012
 *
 *
 */


	//The init function is necesary to add the capabilities + compatibilities
	//And register menu's, and widgetareas:
	add_action( 'init', 'carte_blanche_init' );
	
	
	function carte_blanche_init(){
	
			
		try{

			if( class_exists( 'Cuisine' ) ){
		
				global $cuisine;
				
				
				//Register all menus with Cuisine:
				$cuisine->theme->register_menus(
					array(
						__( 'Main' ),
						__( 'Top' ),
						__( 'Footer' ),
						__( 'Sidebar' )
					));
			
				//Register all widget areas with Cuisine:
				$cuisine->theme->register_widgetareas(
					array(
						array(
							'title' 	=> 'Sidebar',
							'id'		=> 'sidebar-area'
						),
						array(
							'title'		=> 'Footer',
							'id'		=> 'footer-area',
							'class'		=> 'widget span4 %2$s'
						),
						array(
							'title'		=> 'Home',
							'id'		=> 'home',
							'class'		=> 'widget span4 %2$s'
						),
						array(
							'title'		=> 'Contact',
							'id'		=> 'contact'
						),
						array(
							'title'		=> 'Top menu',
							'id'		=> 'topmenu'
						),
						array(
							'title'		=> 'Pagina footer',
							'id'		=> 'pagefooter',
							'class'		=> 'widget span4, %2$s'
						)
				));
				
				//add the custom theme options:
				carte_blanche_add_customization_options();
	
	
				//add custom image size:
				carte_blanche_add_image_sizes();
	
				//add post formats:
				add_theme_support( 'post-formats', array( 'link', 'status', 'quote', 'image' ) );
	
				carte_blanche_includes();
	
			}else{
				throw new Exception("Cuisine isn\'t running. Check http://www.chefduweb.nl/cuisine for more information");
			}

		}catch( Exception $e ){
			//echo the error:
			echo $e->getMessage();
		
		}
	}

	/**
	*	Include the extra files:
	*/

	function carte_blanche_includes(){

		include( 'includes/sidebars.php' );
		include( 'includes/comments.php' );

	}



	/****************************************************/
	/** SUPPORTING THEME FUNCTIONS **********************/
	/****************************************************/
	

	/**
	*	Register all custom theme styling options:
	*/
	function carte_blanche_add_customization_options(){
	
	
		global $cuisine;
	
		// first, the sections:
		$cuisine->theme->register_theme_sections(
			array(
				array(
					'label'		=> 'Round Corners',
					'id'		=> 'chef-standard-corners',
					'priority'	=> 57
				)
		));
	
	
		//then we need the defaults for the custom customization options:
		$custom_defaults = carte_blanche_get_custom_theme_options();
	
	
		//then the controls:
		$cuisine->theme->register_theme_controls(
			array(
	
				array(
					'label'		=> 'Radius',
					'id'		=> 'border-radius',
					'section'	=> 'chef-standard-corners',
					'default'	=> $custom_defaults['border-radius']
				)
		));

		//Logo text in a backdrop yes / no
		$cuisine->theme->register_theme_controls(
			array(
	
				array(
					'label'		=> 'Logo label',
					'id'		=> 'logo-label',
					'section'	=> 'cuisine_logo_section',
					'type'		=> 'checkbox',
					'default'	=> $custom_defaults['logo-label']
				)
		));


		//Sidebar left or right:
		$cuisine->theme->register_theme_controls(
			array(
	
				array(
					'label'		=> 'Sidebar left / right',
					'id'		=> 'sidebar-pos',
					'section'	=> 'cuisine_sidebar_section',
					'type'		=> 'select',
					'default'	=> $custom_defaults['sidebar-pos'],
					'choices'	=> array( 'left' => 'Links', 'right' => 'Rechts')
				) 
		));


		//add the header control:
		$cuisine->theme->register_theme_controls(
			array(

				array(
					'label'		=> 'Header width',
					'id'		=> 'header-size',
					'type'		=> 'select',
					'section'	=> 'cuisine_header_section',
					'default'	=> $custom_defaults['header-size'],
					'choices'	=> array( 'boxed' => 'In container', 'wide' => 'Boxed' )
				)
		));


		//add the footer control:
		$cuisine->theme->register_theme_controls(
			array(

				array(
					'label'		=> 'Footer width',
					'id'		=> 'footer-size',
					'type'		=> 'select',
					'section'	=> 'cuisine_footer_section',
					'default'	=> $custom_defaults['footer-size'],
					'choices'	=> array( 'boxed' => 'In container', 'wide' => 'Boxed' )
				)
		));

		//copyright background kleur:
		$cuisine->theme->register_theme_controls(
			array(

				array(
					'label'		=> 'Copyright background color',
					'id'		=> 'copyright-background-color',
					'type'		=> 'color',
					'section'	=> 'cuisine_footer_section'
				)
		));
	
	}




	
	/**
	*	Setup the customizable values FOR THIS THEME:
	*/
	
	//add the filter hook:
	add_filter('cuisine_get_theme_options', 'carte_blanche_get_custom_theme_options');

	
	//register the function where the defaults are added (the parameter options is optional, since other functions need this data too):
	function carte_blanche_get_custom_theme_options($options = array()){
	
		//add the options one-by-one:
		$options['border-radius'] = '5px';
		$options['footer-size'] = 'boxed';
		$options['header-size'] = 'boxed';
		$options['sidebar-pos'] = 'left';
		$options['logo-label']	= false;
		$options['copyright-background-color'] = '#000000';
		return $options;
	}
	

	/**
	*	Tell cuisine what the names of some of the elements are, so live customizing works better:
	*/
	
	add_filter( 'cuisine_theme_customizers', 'carte_blanche_get_theme_customizers' );
	
	function carte_blanche_get_theme_customizers( $options ){

		$options['footer-background-color'] = array( 'object' => '#menu-footer', 'property' => 'background-color' );
		$options['footer-color'] = array( 'object' => '#menu-footer', 'property' => 'color' );
		$options['logo-h1-background-color'] = array( 'object' => '.logo', 'property' => 'background-color' );
		return $options;
	}


	/**
	*	Add the image sizes:
	*/
	
	function carte_blanche_add_image_sizes(){

		add_theme_support( 'post-thumbnails' );
		
		add_image_size( 'tile', 350, 350, true );

	}
	





	/****************************************************/
	/** CUSTOM THEME FUNCTIONS **************************/
	/****************************************************/


	
	/**
	*	Generate the logo-html for this theme:
	*/
	function carte_blanche_theme_logo(){
	
		$options = cuisine_get_theme_style();
		$html = '<a class="logo" href="'.cuisine_site_url().'">';
		
		if( isset( $options['logo-image'] ) && $options['logo-image'] != 'none' && $options['logo-image'] != '' )
			$html .= '<img src="'.$options['logo-image'].'"/>';
		
	
		if( isset( $options['logo-show-text'] ) && $options['logo-show-text'] == '1')
			$html .= '<h1>'.get_bloginfo( 'name', 'raw' ).'</h1>';
	
		$html .= '</a>';
	
		echo $html;
	}

	show_admin_bar( false );

?>