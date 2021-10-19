<?php

// including theme stylesheets and bootstrap
add_action ('wp_enqueue_scripts', 'style_theme');
function style_theme () {
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style('style', get_stylesheet_uri());
}

// including theme scripts and bootstrap
add_action ('wp_footer', 'script_theme');
function script_theme () {
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js');
	wp_enqueue_script('example', get_template_directory_uri() . '/assets/js/example.js');
}