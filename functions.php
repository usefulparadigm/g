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
add_action( 'wp_enqueue_scripts', 'gene_add_header_assets' );
function gene_add_header_assets() {
  wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri().'/js/vendor/custom.modernizr.js' );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'foundation', get_stylesheet_directory_uri().'/js/foundation.min.js', array('jquery') );
  // wp_enqueue_style('header-styles', get_stylesheet_directory_uri().'/reveal/reveal.css');
  wp_enqueue_script( 'myapp', get_stylesheet_directory_uri().'/js/app.js', array('jquery'), '', true );
}

//* Init ZURB Foundation Framework

function gene_init_foundation() {
  echo '<script>jQuery(document).foundation();</script>';
}
add_action( 'wp_footer', 'gene_init_foundation' );


// layout

// Force layout to be full width
// add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

remove_action( 'genesis_site_title', 'genesis_seo_site_title' );
add_action( 'genesis_site_title', 'g_genesis_ugly_site_title' );
function g_genesis_ugly_site_title() {
  echo 'Ugly!';
}

add_action( 'genesis_header', 'g_nav_menu' );
function g_nav_menu() { 
?>
<nav class="top-bar">
  <ul class="title-area">
    <li class="name"><!-- Leave this empty --></li>
  </ul>
  <section class="top-bar-section">
    <?php wp_nav_menu( array( 'menu' => 'Primary' ) ); ?>
  </section>    
</nav>
<?php 
}

add_action( 'genesis_sidebar', 'gene_side_bar' );
function gene_side_bar() {
  echo '<h1>SIDEBAR</h1>';
}

add_action( 'genesis_before_content', 'gene_before_content' );
function gene_before_content() {
  echo '<h2>Before Content</h2>';
}


add_filter( 'body_class', 'gene_layout_body_classes' );
function gene_layout_body_classes( array $classes ) {
	$classes[] = 'row';
	return $classes;
}


//* Add support for structural wraps
add_theme_support( 'genesis-structural-wraps', array(
	'header',
	'nav',
	'subnav',
	'site-inner',
	'footer-widgets',
	'footer'
) );


?>
<!-- <h1>HERE:</h1>
<pre>
<?php
  // genesis_structural_wrap( 'site-inner' );  
  $output = genesis_markup( array(
      'html5'   => '<div %s>',
      'xhtml'   => '<div id="inner">',
      'context' => 'site-inner',
    ) );
  echo htmlentities($output);
?>
</pre> -->
