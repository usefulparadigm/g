<?php

//* Enqueue assets
add_action( 'wp_enqueue_scripts', 'g_add_header_assets' );
function g_add_header_assets() {
  wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri().'/js/vendor/custom.modernizr.js' );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'foundation', get_stylesheet_directory_uri().'/js/foundation.min.js', array('jquery') );
  // wp_enqueue_style('header-styles', get_stylesheet_directory_uri().'/reveal/reveal.css');
  wp_enqueue_script( 'app', get_stylesheet_directory_uri().'/js/app.js', array('jquery'), '', true );
}

//* Init ZURB Foundation Framework

add_action( 'wp_footer', 'g_init_foundation' );
function g_init_foundation() {
  echo '<script>jQuery(document).foundation();</script>';
}

// * Navigation menu
// http://my.studiopress.com/snippets/navigation-menus/

add_filter( 'genesis_do_nav', 'g_topbar_nav', 10, 3);
function g_topbar_nav( $nav_output, $nav, $args ) {

  $nav_output = '<nav class="nav-primary top-bar">';
  $nav_output .= '<ul class="title-area">';
  $nav_output .= '<li class="name"><!-- Leave this empty --></li>';
  $nav_output .= '</ul>';
  $nav_output .= '<section class="top-bar-section">';
  $nav_output .= $nav;
  $nav_output .= '</section>';
  $nav_output .= '</nav>';

  return $nav_output;
}

