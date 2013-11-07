<?php 
// front-page sample

// Force layout to be full width
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

// Remove Page Title
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );

// Add Slider
add_action( 'genesis_before_content', 'g_add_slider_before_content' );
function g_add_slider_before_content() {
  echo '<img src="http://placehold.it/1200x300&text=Here+Goes+Slider" />';
}

// And last.. genesis!!
genesis();