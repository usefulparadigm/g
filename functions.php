<?php
/**
 * g Child Theme functions
 * 
 * Child Theme functions for g 
 * 
 * @package Genesis Child Theme
 * @author  Sukjoon Kim
 * @version 1.0
 * @link    http://usefulparadigm.com/
 */

//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove. why? I don't know!)
define( 'CHILD_THEME_NAME', 'g' );
define( 'CHILD_THEME_URL', 'http://usefulparadigm.com/' );
define( 'CHILD_THEME_VERSION', '0.1.0' );

//* Enqueue Lato Google font
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {
	wp_enqueue_style( 'google-font-lato', '//fonts.googleapis.com/css?family=Lato:300,700', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5' );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

/** Add support for custom header */
// add_theme_support( 'genesis-custom-header', array( 'width' => 960, 'height' => 100 ) );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
  'header',
  // 'nav',
  // 'subnav',
  'site-inner',
  'footer-widgets',
  'footer'
) );

require_once( CHILD_DIR . '/inc/foundation.php' );


