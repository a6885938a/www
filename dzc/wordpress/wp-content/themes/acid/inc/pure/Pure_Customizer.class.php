<?php
// setup_pure_option('section_title', true);
// setup_pure_option( 'content_header_categories', false );
// setup_pure_option( 'content_header_tags', false );
// setup_pure_option( 'content_header_post_date_and_author', true );

if (class_exists('WP_Customize_Control')) {
	require_once "WP_Customize_Ext/WP_Customize_Thumbnail.php";
	require_once "WP_Customize_Ext/WP_Customize_Page_Dropdown.php";
}


class Pure_Customizer extends Pure {

	public static function init() {
		// parent::init();
		//Setup the Theme Customizer settings and controls...
	}


	public static function get_section( $section = false ) {
		if ( $section ) {
			return self::$key . "_{$section}";
		} else {
			return self::key;
		}
	}
	/**
	 * Register Customizations
	 *
	 * @param Object  $c
	 * Originally $wp_customize, not using the global here
	 * So we're calling this a shorter version as well
	 *
	 *  @return null
	 */
	public static function register_options( $wpc ) {
		self::register_layout_options( $wpc );
		self::register_blog_options( $wpc );
		self::register_color_options( $wpc );
	}

	/**
	 * Register Layout Options
	 *
	 * @param (object) $wpc $wp_customize object
	 * @return null
	 */
	public static function register_layout_options( $wpc ) {

		$section_name = "layout";


		$wpc -> add_section ( self::get_section( $section_name ),
			array (
				'title' => __( 'Global Options', 'puremellow' ),
				'priority' => 30,
				'capability' => 'edit_theme_options',
				'description' => __( "Edit Blog Settings", "puremellow" )
			)
		);

		/*--------------------------------------------------------------------------*/
		/*    Site Logo
		/*--------------------------------------------------------------------------*/
		$wpc -> add_setting ( self::get_key( "site_logo" ),
			array(
				'default' => false,
				'capability' => 'edit_theme_options',
				'section' => self::get_section( $section_name ),
				// Auto Sanitized by Wordpress
			)
		);

		$wpc -> add_control ( 
			new WP_Customize_Image_Control( 
				$wpc,
				self::get_key("site_logo"), 
				array(
					'label'   => 'Site Logo',
					'section' => self::get_section( $section_name ),
				) 
			));
		
		/*--------------------------------------------------------------------------*/
		/*    One Page Posts
		/*--------------------------------------------------------------------------*/
		$wpc -> add_setting ( self::get_key( "one_page_PPP" ),
			array(
				'default' => 4,
				'capability' => 'edit_theme_options',
				'section' => self::get_section( $section_name ),
				'sanitize_callback' => array( __CLASS__, 'validate_posts_per_page' )
			)
		);

		$wpc -> add_control ( self::get_key( "one_page_PPP" ),
			array(
				'section' => self::get_section( $section_name ),
				'settings' => self::get_key( "one_page_PPP" ),
				'label' => "One Page Template: Posts per Page",
				'type' => 'text',
			)
		);

		/*--------------------------------------------------------------------------*/
		/*    Enable Footer
		/*--------------------------------------------------------------------------*/
		$wpc -> add_setting ( self::get_key( "footer" ),
			array(
				'default' => 1,
				'capability' => 'edit_theme_options',
				'section' => self::get_section( $section_name ),
			)
		);

		$wpc -> add_control ( self::get_key( "footer" ),
			array(
				'section' => self::get_section( $section_name ),
				'settings' => self::get_key( "footer" ),
				'label' => "Enable Footer",
				'type' => 'checkbox'
			)
		);


		/*--------------------------------------------------------------------------*/
		/*    Optional Colorbox
		/*--------------------------------------------------------------------------*/
		$wpc -> add_setting ( self::get_key( "colorbox" ),
			array(
				'default' => 1,
				'capability' => 'edit_theme_options',
				'section' => self::get_section( $section_name ),
			)
		);

		$wpc -> add_control ( self::get_key( "colorbox" ),
			array(
				'section' => self::get_section( $section_name ),
				'settings' => self::get_key( "colorbox" ),
				'label' => "Portfolio Style",
				'type' => 'select',
				'choices' => array("Case Study", "Pop-up")
			)
		);

		/*--------------------------------------------------------------------------*/
		/*    Auto Initial Scroll
		/*--------------------------------------------------------------------------*/
		$wpc -> add_setting ( self::get_key( "auto_initial_scroll" ),
			array(
				'default' => 1,
				'capability' => 'edit_theme_options',
				'section' => self::get_section( $section_name ),
			)
		);

		$wpc -> add_control ( self::get_key( "auto_initial_scroll" ),
			array(
				'section' => self::get_section( $section_name ),
				'settings' => self::get_key( "auto_initial_scroll" ),
				'label' => "Auto Initial Scroll",
				'type' => 'checkbox'
			)
		);

		/*--------------------------------------------------------------------------*/
		/*    Blinking Arrow Hint
		/*--------------------------------------------------------------------------*/
		$wpc -> add_setting ( self::get_key( "blinking_arrow" ),
			array(
				'default' => 1,
				'capability' => 'edit_theme_options',
				'section' => self::get_section( $section_name ),
			)
		);

		$wpc -> add_control ( self::get_key( "blinking_arrow" ),
			array(
				'section' => self::get_section( $section_name ),
				'settings' => self::get_key( "blinking_arrow" ),
				'label' => "Blinking Arrow (Hint to scroll)",
				'type' => 'checkbox'
			)
		);

		
		/*--------------------------------------------------------------------------*/
		/*    Extended Options
		/*--------------------------------------------------------------------------*/
		$wpc -> add_setting ( self::get_key( "extended_options" ),
			array(
				'default' => false,
				'capability' => 'edit_theme_options',
				'section' => self::get_section( $section_name ),
			)
		);

		$wpc -> add_control ( self::get_key( "extended_options" ),
			array(
				'section' => self::get_section( $section_name ),
				'settings' => self::get_key( "extended_options" ),
				'label' => "Enable Extended Options (for Advanced Uses)",
				'type' => 'checkbox'
			)
		);

		$wpc -> add_setting ( self::get_key( "puremellow_credits" ),
			array(
				'default' => true,
				'capability' => 'edit_theme_options',
				'section' => self::get_section( $section_name ),
			)
		);

		$wpc -> add_control ( self::get_key( "puremellow_credits" ),
			array(
				'section' => self::get_section( $section_name ),
				'settings' => self::get_key( "puremellow_credits" ),
				'label' => "Show some love by enabling link in the footer to puremellow.com",
				'type' => 'checkbox',
			)
		);

	} 


	// End Layout Options

	/**
	 * Register Blog Options
	 *
	 * @param (object) $c $wp_customize object
	 * @return null
	 */
	public static function register_blog_options( $c ) {

		$section_name = "blog";


		$c -> add_section ( self::get_section( $section_name ),
			array (
				'title' => __( 'Blog Options', 'puremellow' ),
				'priority' => 35,
				'capability' => 'edit_theme_options',
				'description' => __( "Edit Blog Settings<br><img src=\"http://www.lolinez.com/swq.jpg\">", "puremellow" )
			)
		);



		/*--------------------------------------------------------------------------*/
		/*    Sidebar Enabled ?
		/*--------------------------------------------------------------------------*/
		$c -> add_setting ( self::get_key( "blog_sidebar" ),
			array(
				'default' => true,
				'capability' => 'edit_theme_options',
				'section' => self::get_section( $section_name ),
			)
		);

		$c -> add_control ( self::get_key( "blog_sidebar" ),
			array(
				'section' => self::get_section( $section_name ),
				'settings' => self::get_key( "blog_sidebar" ),
				'label' => "Enable Sidebar",
				'type' => 'checkbox',
			)
		);

		// Display Post
		$checkboxes = array(
			array( 'content_header_categories' , "Show Categories in Post meta", true ),
			array( 'content_header_tags' , 'Show Tags in Post meta', false ),
			array( 'content_header_post_author' , 'Show Date and Author in Post meta', true ),
		);
		foreach ( $checkboxes as $cb ) :

			$checkbox_value = $cb[0];
			$label = $cb[1];
			$checkbox_default_value = $cb[2];

			$c -> add_setting ( self::get_key( $checkbox_value ),
				array(
					'default' => $checkbox_default_value,
					'capability' => 'edit_theme_options',
					'section' => self::get_section( $section_name ),
				)
			);

			$c -> add_control ( self::get_key( $checkbox_value ),
				array(
					'section' => self::get_section( $section_name ),
					'settings' => self::get_key( $checkbox_value ),
					'label' => $label,
					'type' => 'checkbox'
				)
			);
		endforeach;
	}

	/**
	 * Register Color Options
	 *
	 * @param (object) $c $wp_customize object
	 * @return null
	 */
	public static function register_color_options( $c ) {

		$section_name = "colors";

		$configurable_colors = array(
			"Primary Color" => "accent_color",
			"Primary Color Variant (Lighter or Darker)" => "lighter_accent_color",

			"Brand Color" => "theme_color",
			"Brand Color Variant ( Lighter )" => "lighter_theme_color",
			"Brand Color Variant ( Darker )" => "darker_theme_color",

			"Font" => "font_color",
			"Light Font" => "lightest_font",
			"Font on Primary Color Background" => "font_on_accent",
			"Font on Brand Color Background" => "font_on_theme",

			"Links" => "link_color",
			"Links on Hover" => "link_hover",
			
			"Light Links" => "link_light",
			"Light Links on Hover" => "link_light_hover",			
		);



		// Remove the default "Background color" option
		$c -> remove_control( "background_color" );

		// $c -> add_section ( self::get_section( $section_name ),
		// 	array (
		// 		'title' => __( 'Customize Colors', 'puremellow' ),
		// 		'priority' => 35,
		// 		'capability' => 'edit_theme_options',
		// 		'description' => __( "Edit Blog Settings", "puremellow" )
		// 	)
		// );
		$priority_counter = 0;
		foreach ( $configurable_colors as $title => $key) :
			$priority_counter++;

			$c -> add_setting ( self::get_key( $key ),
				array(
					'default' => false,
					'capability' => 'edit_theme_options',
					'section' => "colors",
					'sanitize_callback' => array(__CLASS__, 'sanitize_hex_color'),
					'transport' => 'postMessage'
				)
			);

			$c -> add_control (
				new WP_Customize_Color_Control( 
					$c, 
					self::get_key( $key ), 
					array(
				        'section' => "colors",
				        'settings' => self::get_key( $key ),
				        'label' => $title,
				        'priority' => $priority_counter
					)
				)
			);
		endforeach;
	}
	/*--------------------------------------------------------------------------*/
	/*    Prepare Pages
	/*--------------------------------------------------------------------------*/
	public static function get_pages($args = null) {
		$pages = get_pages($args);
		$out[0] = "Disabled";
		foreach($pages as $page) {
			$out[$page->ID] = $page->post_title;
		}
		return $out;
	}


	/*--------------------------------------------------------------------------*/
	/*    Validation
	/*--------------------------------------------------------------------------*/
	public static function validate_posts_per_page($val) {
		return intval($val);
	}

	public static function sanitize_hex_color ( $color ) {
		if ($color == '') {
			return 0;
		}

		return sanitize_hex_color($color);
	}

}