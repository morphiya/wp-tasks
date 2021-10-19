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

// register custom post type "tasks"
add_action( 'init', 'create_tasks_posttype', 0 );
function create_tasks_posttype() {
	$labels = array(
		'name' => _x( 'Tasks', 'Tasks post type', 'root' ),
		'singular_name' => _x( 'Task', 'Tasks post type', 'root' ),
		'menu_name' => __( 'Tasks', 'root' ),
		'all_items' => __( 'All tasks', 'root' ),
		'view_item' => __( 'View tasks', 'root' ),
		'add_new_item' => __( 'Add new task', 'root' ),
		'add_new' => __( 'Add new', 'root' ),
		'edit_item' => __( 'Edit task', 'root' ),
		'update_item' => __( 'Update task', 'root' ),
		'search_items' => __( 'Search task', 'root' ),
		'not_found' => __( 'Not found', 'root' ),
		'not_found_in_trash' => __( 'Not found in trash', 'root' ),
	);

	$args = array(
		'label' => __( 'tasks', 'root' ),
		'description' => __( 'Tasks category', 'root' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor', 'author', 'custom-fields', ),
		'taxonomies' => array( 'states' ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 5,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
		'rewrite' => array('slug' => 'tasks'),
	);

	register_post_type( 'tasks', $args );
}