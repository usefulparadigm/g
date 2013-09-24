<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.0.1' );

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

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Enqueue assets

function gene_add_header_assets() {
  wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri().'/js/vendor/custom.modernizr.js' );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'foundation', get_stylesheet_directory_uri().'/js/foundation.min.js', array('jquery') );
  // wp_enqueue_style('header-styles', get_stylesheet_directory_uri().'/reveal/reveal.css');
}
add_action( 'wp_enqueue_scripts', 'gene_add_header_assets' );

//* Init ZURB Foundation Framework

function gene_init_foundation() {
  echo '<script>jQuery(document).foundation();</script>';
}
add_action( 'wp_footer', 'gene_init_foundation' );