<?php

class Pure {
	static $theme;
	static $theme_options_key;
	static $key;
	static $options = false;


	/**
	 * Initialize the Pure Static class variables. If this isn't happening, nothing is.
	 */
	public static function init() {
		self::$theme = sanitize_title( strtolower( get_template() ) );
		self::$theme_options_key = '_options';
		self::$key = self::$theme . self::$theme_options_key;
	}

	/**
	 * Get the key for a particular option
	 *
	 * @param (string) $option Which option do you need the keys for ?
	 * @return (string) The option key or (bool) false
	 */
	public static function get_key( $option = false ) {
		if ( $option ) {
			return self::$key . "[$option]";
		} else {
			return false;
		}
	}

	/**
	 * Get Current Post Terms
	 *
	 * @param string  $term          Taxonomy from which to get the terms from
	 * @param boolean $stringify     Should return as a string ?
	 * @param string  $get_term_part Which part of the Taxonomy to return ? Default to the name (could be slug for example)
	 * @return (mixed)                (string) or (array), deppending on $stringify
	 */
	public static function post_terms( $term, $stringify = false, $get_term_part = "name" ) {
		global $post;

		$terms_obj = wp_get_object_terms( $post->ID, $term );

		// $terms_obj has to be truthy and shouldn't be a WP_Error
		if ( $terms_obj && !is_wp_error( $terms_obj ) ) {

			foreach ( $terms_obj as $term ) {
				$terms[] = $term->$get_term_part;
			}

			// If we have to stringify the term part
			if ( $stringify || $stringify == null ) {
				// Use Stringify as the glue, if it isn't a bool
				$glue = ( is_string( $stringify ) ) ? $stringify : ', ';
				return implode( $glue, $terms );

			} else {
				// Or return an array of $terms
				return $terms;
			}
		}

	}


	/**
	 *  Get
	 *
	 * @param (string) $taxonomy - The taxonomy slug, for example 'category' or 'skills'
	 * @return (string) All Post Links or (bool) false
	 */
	function post_term_slugs( $taxonomy ) {
		global $post;

		$terms = get_the_terms( $post->ID, $taxonomy );

		if ( $terms && ! is_wp_error( $terms ) ) {

			$links = array();

			foreach ( $terms as $term ) {
				$links[] = "$taxonomy-".$term->slug;
			}
			return join( " ", $links );
		}

		return false;
	}



	/**
	 * Alias for native get_theme_mod(Pure::get_key('some_option'));
	 *
	 * @param (string) $option to et
	 * @return (mixed)  Option returned
	 */
	public static function get_theme_mod( $option, $default = false ) {
		// Get the options, if they aren't here yet
		global $wp_customize;

		if ( self::$options === false || isset( $wp_customize ) ) {
			self::$options = get_theme_mod( self::$key );
		}


		// Custom Options for Single posts & Pages
		// Not so good for performance though
		// If you're never using "custom settings" that are specific to a page
		// Comment this (if) statement out

		if(  ( in_the_loop() || is_singular() )
		   && ! empty( self::$options['extended_options'] ) 
		   && self::$options['extended_options'] == true ) {
			
			global $post;

			if ( !empty($post->ID)  && $post->ID >  0 ) {
				
				if ( $custom_option = get_post_meta($post -> ID, self::$theme. "_" . $option, true ) ){
					return self::parse_falsy($custom_option);
				}

			}
		}

		// Check if this option is set
		if ( isset( self::$options[$option] ) ) {
			return self::$options[$option];
		}

		// If this option is not set, return the default value
		return $default;


	}

	/**
	 * Modification from the original wordpress get_post_meta()
	 * @param  int  $post_id
	 * @param  string  $meta_key
	 * @param  boolean $single
	 * @return (mixed) boolean/string
	 */
	public static function get_post_meta( $post_id, $meta_key = '', $single = false ) {
		
		$custom_option = get_post_meta( $post_id, $meta_key, $single );

		if ( isset( $custom_option )  && $custom_option != null && $custom_option != "0") {
			return self::parse_falsy($custom_option);
		} else {

			return false;

		}
	}

	public static function parse_falsy($value) {
		if ( $value == "false" ) {
			return false;
		}
		return $value;
	}


	public static function get_from_meta($meta_array, $get, $on_failure = false) {

		if( !isset( $meta_array[$get] ) || empty( $meta_array[$get] ) ) {
			return $on_failure;
		} 
		else {

			if( is_array( $meta_array[$get] ) ) {
				$return =  $meta_array[$get][0];
			} 
			else {
				$return = $meta_array[$get];	
			}

			if ($return == "0" or $return == "false" or $return == false) {
				return false;
			} else {
				
				return $return;

			}
			




		}
	}


	/**
	 * Another wrapper, just to shorten things up a bit
	 *
	 * @param (string) $option Which option?
	 * @return (boolean)    Return whether that option is true or false
	 */
	public static function is_enabled( $option, $default = false ) {

		$value = self::get_theme_mod ( $option, $default );

		if ( is_numeric( $value ) ) {
			$value = (int) $value;
		}

		// Loose comparison
		// null != true
		// 0 != true
		// 1 == true
		if ( $value == true ) {
			return true;
		}

		return false;
	}




	/**
	 * Return something if some option is enabled
	 *
	 * @param (string) $option Any Pure Mellow option
	 * @param (any)   $then   Whatever you want returned
	 * @param (any)   $else   Or return that other thing
	 * @return $then or null
	 */
	public static function if_enabled( $option, $then, $else = null  ) {

		if ( self::is_enabled ( $option ) === true ) {
			return $then;
		}
		return $else;
	}
	/**
	 * Inverse of if_enabled
	 * Return something, if some property is disabled.
	 *
	 * @param (string) $option Any Pure Mellow option
	 * @param (any)   $then   Whatever you want returned
	 * @param (any)   $else   Or return that other thing
	 * @return $then or null
	 */
	public static function if_disabled( $option, $then, $else = null ) {

		if ( self::is_enabled ( $option ) === false ) {
			return $then;
		}
		return $else;
	}

	public static function maybe_enable_sidebar( $classes ) {

		if( self::is_enabled ( "blog_sidebar", true ) && get_post_type() !== "portfolio" ) {
			$classes[] = "sidebar-enabled";
		} else {
			$classes[] = "sidebar-disabled";
		}
		return $classes;
	}



	public static function setup() {

		/* -----------------------------------*/
		/* 		Thumbnails
		/* -----------------------------------*/

		// Blog
		add_image_size( 'pure_thumbnail_large', 1200, 1200, true );
		add_image_size( 'pure_thumbnail', 600, 600, true );
		add_image_size( 'pure_mini', 125, 125, true );

		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on InkBerry, use a find and replace
		 * to change 'inkberry' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'acid', get_template_directory() . '/lang' );

		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for Post Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );


		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
		                   'primary' => __( 'Primary Menu', 'puremellow' ),
		                   'footer-menu' => __( 'Footer Menu', 'puremellow' )
		                   ) );

		/**
		 * Add support for the Aside Post Formats
		 */
		add_theme_support( 'post-formats', array( 'quote' ) );

		/**
		* 	Custom Background Image Options
		*/
		$args = array(
			'default-color' => '',
			'default-image' => '',
		);

		$args = apply_filters( 'pure_custom_background_args', $args );
		add_theme_support( 'custom-background', $args );

	}


}
// DEBUG !!:
// Pure::setup();
