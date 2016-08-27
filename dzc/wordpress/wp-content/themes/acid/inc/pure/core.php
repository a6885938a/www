<?php
global $wp_customize;


/* -----------------------------------*/
/* 		Load Pure Core Class
/* -----------------------------------*/
require_once( dirname( __FILE__ ) . '/wordpress-helpers.php' );
require_once( dirname( __FILE__ ) . '/Pure.class.php' );
require_once( dirname( __FILE__ ) . '/color-options/generate_colors.php' );
// Used to generate JavaScript and the Config.
// DO NOT TOUCH. Only if you really know what you're doing!
// require_once ( dirname( __FILE__ ) . '/color-options/generate_color_config.php' );
require_once( dirname( __FILE__ ) . '/Pure_One_Page.class.php' );


// Initialize Pure Class
Pure::init();
Pure_One_Page::init();


/* -----------------------------------*/
/* 		Actions:
/* -----------------------------------*/
add_action( 'after_setup_theme', array( 'Pure', 'setup' ) );
add_action( 'wp_head', 'pure_cc_generate_css' );
add_action( 'customize_preview_init', 'pure_live_color_customizer' );

/* -----------------------------------*/
/* 		Filters
/* -----------------------------------*/
add_filter( 'body_class', array( 'Pure', 'maybe_enable_sidebar' ) );


/* -----------------------------------*/
/* 		Dashboard 
/* -----------------------------------*/
# This Conditional Tag checks if the Dashboard or the administration panel is attempting to be displayed.
if ( is_admin() ) {
		
		# Load / Require Plugins if current user can activate them
		if ( current_user_can( 'activate_plugins' ) ) {
			require_once( dirname( __FILE__ ) . '/plugins/initialize_plugins.php' );	
		}
	
		# Don't load customizer when it's not needed.
		if (  current_user_can( 'edit_theme_options' )) { 
			require_once( dirname( __FILE__ ) . "/Pure_Customizer.class.php" ); 

			if( class_exists( "RW_Meta_Box" ) ) {
				require_once( dirname( __FILE__ ) . "/metabox_options.php" );

				if(Pure::is_enabled("extended_options", false) ) {
					require_once ( dirname( __FILE__ ) . "/extended_options.php" );
				}
			}
			if ( isset ( $wp_customize ) ){
				add_action( 'customize_register' , array( 'Pure_Customizer' , 'register_options' ) );
			}
		}
}

