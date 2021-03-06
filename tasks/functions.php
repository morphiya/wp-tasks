<?php

// including theme stylesheets and bootstrap
add_action ('wp_enqueue_scripts', 'style_theme');
function style_theme () {
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css');
	wp_enqueue_style('jquery-ui-css', get_template_directory_uri().'/assets/css/jquery-ui.min.css');
	wp_enqueue_style('style', get_stylesheet_uri());
}

// including theme scripts and bootstrap
add_action ('wp_footer', 'script_theme');
function script_theme () {
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/assets/js/bootstrap.bundle.min.js');
	wp_enqueue_script('sort', get_template_directory_uri().'/assets/js/sort.js', array('jquery'));
	wp_enqueue_script('filter', get_template_directory_uri().'/assets/js/filter.js', array('jquery'));

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

// Routing
add_action('create_route', 'create_route_action');
function create_route_action() {
	require_once "app/autoloader.php";
	$requestURI = explode('/', $_SERVER['REQUEST_URI']);
	if ($requestURI[1] == '') {
		get_template_part('templates/content-home');
	}
	else {
		$controllerName = 'app\controllers\\' . ucfirst($requestURI[1]) . 'Controller';
		$param = $requestURI[2] ?? '';
		try {
			$controller = new $controllerName();
			$controller->createPage($param);
		} catch (\app\TasksException $e) {
			get_template_part('templates/content-404');
		}
	}
}

// change title page in header
add_filter( 'document_title_parts', 'filter_change_title_page' );
function filter_change_title_page( $title ){
	$requestURI = explode('/', $_SERVER['REQUEST_URI']);
	$title['title'] = ucfirst($requestURI[1]) . ' Task';

	return $title;
}

// displays task`s row in table list
add_action('render_table_row', 'render_table_row_action');
function render_table_row_action($args) {
	foreach ($args['listTasks'] as $task => $values) {
		get_template_part('templates/part-table-row', '', $values);
	}

}

// ajax
add_action('wp_ajax_complete', 'complete_task');
add_action('wp_ajax_nopriv_complete', 'complete_task');

// Processing ajax-query
function complete_task() {
	$taskID = $_POST['ajax_taskID'];
	$checkboxState = $_POST['ajax_checkboxState'];

	$response = "The new value of checkbox#".$taskID." is: ".$checkboxState;

	require_once "app/autoloader.php";
	$model = new app\models\TasksModel();
	$response .= $model->setTaskState($checkboxState);

	echo $response;
	wp_die();
}

// JQuery script
add_action( 'wp_enqueue_scripts', 'my_assets');
function my_assets() {
	wp_enqueue_script('custom', get_template_directory_uri().'/assets/js/ajax-checkbox.js', array('jquery'));
	wp_enqueue_script('jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.min.js', array('jquery'));
	wp_enqueue_script('custom-ui', get_template_directory_uri().'/assets/js/jquery-ui-elements.js', array('jquery', 'jquery-ui'));

	wp_localize_script('custom', 'tasksAjax', array(
		'ajaxurl' => admin_url('admin-ajax.php')
	));
}