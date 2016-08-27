<?php
/**
 * Enqued on `customize_preview_init`
 * @return null 
 */
function pure_live_color_customizer() {
	wp_enqueue_script( 
		'pure-color-customizer',
		get_template_directory_uri().'/inc/pure/color-options/colors.customizer.min.js',
		array( 'jquery','customize-preview' ),
		null,
		true
	);
}

/**
 * Get the Config from JSON File
 * @return (mixed) Array with config or false on error
 */
function pure_cc_get_config() {
	$file_name = dirname(__FILE__) . "/colors.config.json";
	if ( file_exists( $file_name ) ) {
		
		$json = file_get_contents( $file_name );
		$config = json_decode($json, true);

		if ( is_array($config) ) {
			return $config;
		}
	}
	return false;
}

/**
 * Generate CSS from the colors.config.json file
 * @return [type] [description]
 */
function pure_cc_generate_css() {
	
	$config = pure_cc_get_config();
	if( false == $config ) { return; }

	echo '<style type="text/css">';

	$theme_color = Pure::get_theme_mod( "theme_color", false );
	$font_on_theme = Pure::get_theme_mod( "font_on_theme", false );

	if ( false != $theme_color && false != $font_on_theme ) {
		echo "
		::-moz-selection {
			background-color: $theme_color;
			color: $font_on_theme;
		}

		::selection {
			background-color: $theme_color;
			color: $font_on_theme;
		}
		";
	}

	foreach ($config as $c) {
		$css_value = Pure::get_theme_mod($c['php_variable'], null);
		if( $css_value == null ) { 
			continue; 
		}
		else {
			echo "
			$c[css_selector] {
				$c[css_property]: $css_value;
			}
			";
		}

	}
	echo '</style>';
}