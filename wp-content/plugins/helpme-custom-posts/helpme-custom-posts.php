<?php
/*
Plugin Name: Helpme Custom Posts 
Description: This plugin includes all custom post types by DesignsVilla
Version:     1.0
Author:      Muhammad Asif
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


add_action('plugins_loaded', 'custom_vc_init');
function custom_vc_init() {
  if ( class_exists('WPBakeryShortCode') ) {
    require dirname( __FILE__ ) . '/vc-integration.php';
    // some code here
  }
  
}



/**
 * Register a custom menu page.
 */
/*function helpme_admin_menus(){
    add_menu_page( 
        esc_html__( 'Import Demo', 'helpme' ),
        'Import Demo',
        'manage_options',
        'demo-importer',
        'demo_importer_page',
        6
    ); 
}
add_action( 'admin_menu', 'helpme_admin_menus' );
 */
/**
 * Display a custom menu page
 */
 /*
function demo_importer_page(){
    require_once (plugin_dir_path( __FILE__ ) .'/includes/demo-importer/engine/index.php'); 
}
*/



/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Types - Clients */
/*-----------------------------------------------------------------------------------*/
function register_clients_post_type(){
	register_post_type('clients', array(
		'labels' => array(
			'name' => __('Clients','helpme'),
			'singular_name' => __('Client','helpme'),
			'add_new' => __('Add New Client','helpme'),
			'add_new_item' => __('Add New Client', 'helpme' ),
			'edit_item' => __('Edit Client','helpme'),
			'new_item' => __('New Client','helpme'),
			'view_item' => __('View Client','helpme'),
			'search_items' => __('Search Clients','helpme'),
			'not_found' =>  __('No Clients found','helpme'),
			'not_found_in_trash' => __('No Clients found in Trash','helpme'),
			'parent_item_colon' => '',
			
		),
		'singular_label' => 'clients',
		'public' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'menu_icon'=> 'dashicons-businessman',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => false,
		'menu_position' => 100,
		'query_var' => false,
		'show_in_nav_menus' => false,
		'supports' => array('title', 'thumbnail', 'page-attributes', 'revisions')
	));
}
add_action('init','register_clients_post_type');

function clients_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'clients' ) {
		global $wp_query;
		$wp_query->is_home = false;
		$wp_query->is_404 = true;
		$wp_query->is_single = false;
		$wp_query->is_singular = false;
	}
}
add_action( 'template_redirect', 'clients_context_fixer' );


/*-----------------------------------------------------------------------------------*/
/* Manage Client's columns */
/*-----------------------------------------------------------------------------------*/

function edit_clients_columns($clients_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		'title' => __('Client Name', 'helpme'),
		"thumbnail" => __('Thumbnail', 'helpme' ),
	);

	return $columns;
}
add_filter('manage_edit-clients_columns', 'edit_clients_columns');

function manage_clients_columns($column) {
	global $post;
	
	if ($post->post_type == "clients") {
		switch($column){
			
			case 'thumbnail':
				echo the_post_thumbnail('thumbnail');
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_clients_columns', 10, 2);


/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Types - Causes */
/*-----------------------------------------------------------------------------------*/
function register_causes_post_type(){
	$cause_slug = 'cause-posts';
	register_post_type('causes', array(
		'labels' => array(
			'name' => __('Causes','helpme'),
			'singular_name' => __('Cause','helpme'),
			'add_new' => __('Add New Cause','helpme'),
			'add_new_item' => __('Add New cause', 'helpme' ),
			'edit_item' => __('Edit Cause','helpme'),
			'new_item' => __('New Cause','helpme'),
			'view_item' => __('View Cause','helpme'),
			'search_items' => __('Search Cause','helpme'),
			'not_found' =>  __('No Cause found','helpme'),
			'not_found_in_trash' => __('No Cause found in Trash','helpme'),
			'parent_item_colon' => '',
			
		),
		'singular_label' => 'causes',
		'public' => true,
		'has_archive' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'menu_icon'=> 'dashicons-groups',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array('slug' => $cause_slug, 'with_front' => FALSE),
		'menu_position' => 100,
		'query_var' => $cause_slug,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'page-attributes', 'post-formats', 'revisions'),
	));


//register taxonomy for causes
	register_taxonomy('causes_category','causes',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'causes Categories', 'helpme' ),
			'singular_name' => __( 'causes Category', 'helpme' ),
			'search_items' =>  __( 'Search Categories', 'helpme' ),
			'popular_items' => __( 'Popular Categories', 'helpme' ),
			'all_items' => __( 'All Categories', 'helpme' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit causes Category', 'helpme' ), 
			'update_item' => __( 'Update causes Category', 'helpme' ),
			'add_new_item' => __( 'Add New causes Category', 'helpme' ),
			'new_item_name' => __( 'New causes Category Name', 'helpme' ),
			'separate_items_with_commas' => __( 'Separate causes category with commas', 'helpme' ),
			'add_or_remove_items' => __( 'Add or remove causes category', 'helpme' ),
			'choose_from_most_used' => __( 'Choose from the most used causes category', 'helpme' ),
			
		),
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => false,
		'show_in_nav_menus' => true,
	));
}
add_action('init','register_causes_post_type');


/*-----------------------------------------------------------------------------------*/
/* Manage Cause's columns */
/*-----------------------------------------------------------------------------------*/

function edit_causes_columns($causes_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		'title' => __('Cause Name', 'helpme'),
		"position" => __('Position', 'helpme' ),
		"desc" => __('Description', 'helpme' ),
		"causes_categories" => __('Categories', 'helpme' ),
		"thumbnail" => __('Thumbnail', 'helpme' ),
	);

	return $columns;
}
add_filter('manage_edit-causes_columns', 'edit_causes_columns');

function manage_causes_columns($column) {
	global $post;
	
	if ($post->post_type == "causes") {
		switch($column){
			case "causes_categories":
				$terms = get_the_terms($post->ID, 'causes_category');
				
				if (! empty($terms)) {
					foreach($terms as $t)
						$output[] = "<a href='edit.php?post_type=causes&causes_tag=$t->slug'> " . esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'causes_tag', 'display')) . "</a>";
					$output = implode(', ', $output);
				} else {
					$t = get_taxonomy('causes_category');
					$output = "No $t->label";
				}
				
				echo $output;
				break;
				
			case "position":
				echo get_post_meta($post->ID, '_position', true);
				break;
			case "desc":
				echo get_post_meta($post->ID, '_desc', true);
				break;
			
			case 'thumbnail':
				echo the_post_thumbnail('thumbnail');
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_causes_columns', 10, 2);


/*-----------------------------------------------------------------------------------*/
/* Manage Employee's columns */
/*-----------------------------------------------------------------------------------*/

function edit_employees_columns($employee_columns) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		'title' => __('Employee Name', 'helpme'),
		"position" => __('Position', 'helpme' ),
		//"desc" => __('Description', 'helpme' ),
		"thumbnail" => __('Thumbnail', 'helpme' ),
	);

	return $columns;
}
add_filter('manage_edit-employees_columns', 'edit_employees_columns');

function manage_employees_columns($column) {
	global $post;
	
	if ($post->post_type == "employees") {
		switch($column){
			case "position":
				echo get_post_meta($post->ID, '_position', true);
				break;
			//case "desc":
				//echo get_post_meta($post->ID, '_desc', true);
				//break;
			
			case 'thumbnail':
				echo the_post_thumbnail('thumbnail');
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_employees_columns', 10, 2);



/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Types - Eployees */
/*-----------------------------------------------------------------------------------*/
function register_employees_post_type(){
	register_post_type('employees', array(
		'labels' => array(
			'name' => __('Employees','helpme'),
			'singular_name' => __('Team Member','helpme'),
			'add_new' => __('Add New Member','helpme'),
			'add_new_item' => __('Add New Team Member', 'helpme' ),
			'edit_item' => __('Edit Team Member','helpme'),
			'new_item' => __('New Team Member','helpme'),
			'view_item' => __('View Team Member','helpme'),
			'search_items' => __('Search Team Members','helpme'),
			'not_found' =>  __('No Team Member found','helpme'),
			'not_found_in_trash' => __('No Team Members found in Trash','helpme'),
			'parent_item_colon' => '',
			
		),
		'singular_label' => 'employees',
		'public' => true,
		'exclude_from_search' => true,
		'show_ui' => true,
		'menu_icon'=> 'dashicons-groups',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => false,
		'menu_position' => 100,
		'query_var' => false,
		'show_in_nav_menus' => false,
		'supports' => array('title', 'thumbnail', 'page-attributes', 'revisions')
	));
}
add_action('init','register_employees_post_type');

function employees_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'employees' ) {
		global $wp_query;
		$wp_query->is_home = false;
		$wp_query->is_404 = true;
		$wp_query->is_single = false;
		$wp_query->is_singular = false;
	}
}
add_action( 'template_redirect', 'employees_context_fixer' );


/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Types - Portfolio */
/*-----------------------------------------------------------------------------------*/

function register_portfolio_post_type(){

	global $helpme_settings;

	if(isset($helpme_settings['portfolio-slug']) && !empty($helpme_settings['portfolio-slug'])) {
		$portfolo_slug = $helpme_settings['portfolio-slug'];
	} else {
		$portfolo_slug = 'portfolio-posts';
	}

	
	
	register_post_type('portfolio', array(
		'labels' => array(
			'name' => __('Portfolios', 'helpme' ),
			'singular_name' => __('Portfolio', 'helpme' ),
			'add_new' => __('Add New', 'helpme' ),
			'add_new_item' => __('Add New Portfolio', 'helpme' ),
			'edit_item' => __('Edit Portfolio', 'helpme' ),
			'new_item' => __('New Portfolio', 'helpme' ),
			'view_item' => __('View Portfolio', 'helpme' ),
			'search_items' => __('Search Portfolios', 'helpme' ),
			'not_found' =>  __('No portfolios found', 'helpme' ),
			'not_found_in_trash' => __('No portfolios found in Trash', 'helpme' ), 
			'parent_item_colon' => '',
		),
		'singular_label' => __('portfolio', 'helpme' ),
		'public' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'menu_icon'=> 'dashicons-portfolio',
		'capability_type' => 'post',
		'menu_position' => 100,
		'hierarchical' => false,
		'rewrite' => array('slug' => $portfolo_slug, 'with_front' => FALSE),
		'query_var' => $portfolo_slug,
		'show_in_nav_menus' => true,
		'publicly_queryable' => true,
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'comments', 'page-attributes', 'post-formats', 'revisions'),
	));

	//register taxonomy for portfolio
	register_taxonomy('portfolio_category','portfolio',array(
		'hierarchical' => true,
		'labels' => array(
			'name' => __( 'Portfolio Categories', 'helpme' ),
			'singular_name' => __( 'Portfolio Category', 'helpme' ),
			'search_items' =>  __( 'Search Categories', 'helpme' ),
			'popular_items' => __( 'Popular Categories', 'helpme' ),
			'all_items' => __( 'All Categories', 'helpme' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Edit Portfolio Category', 'helpme' ), 
			'update_item' => __( 'Update Portfolio Category', 'helpme' ),
			'add_new_item' => __( 'Add New Portfolio Category', 'helpme' ),
			'new_item_name' => __( 'New Portfolio Category Name', 'helpme' ),
			'separate_items_with_commas' => __( 'Separate Portfolio category with commas', 'helpme' ),
			'add_or_remove_items' => __( 'Add or remove portfolio category', 'helpme' ),
			'choose_from_most_used' => __( 'Choose from the most used portfolio category', 'helpme' ),
			
		),
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => false,
		'show_in_nav_menus' => true,
	));
}
add_action('init','register_portfolio_post_type');

/*-----------------------------------------------------------------------------------*/
/* Manage portfolio's columns */
/*-----------------------------------------------------------------------------------*/
function edit_portfolio_columns($portfolio_columns) {
	$portfolio_columns = array(
		"cb" => "<input type=\"checkbox\" />",
		"title" => _x('Portfolio Name', 'column name', 'helpme' ),
		"portfolio_categories" => __('Categories', 'helpme' ),
		"thumbnail" => __('Thumbnail', 'helpme' )
	);

	return $portfolio_columns;
}
add_filter('manage_edit-portfolio_columns', 'edit_portfolio_columns');

function manage_portfolio_columns($column) {
	global $post;
	
	if ($post->post_type == "portfolio") {
		switch($column){
			case "portfolio_categories":
				$terms = get_the_terms($post->ID, 'portfolio_category');
				
				if (! empty($terms)) {
					foreach($terms as $t)
						$output[] = "<a href='edit.php?post_type=portfolio&portfolio_tag=$t->slug'> " . esc_html(sanitize_term_field('name', $t->name, $t->term_id, 'portfolio_tag', 'display')) . "</a>";
					$output = implode(', ', $output);
				} else {
					$t = get_taxonomy('portfolio_category');
					$output = "No $t->label";
				}
				
				echo $output;
				break;
			
			case 'thumbnail':
				echo the_post_thumbnail('thumbnail');
				break;
		}
	}
}
add_action('manage_posts_custom_column', 'manage_portfolio_columns', 10, 2);

/*-----------------------------------------------------------------------------------*/
/* Manage Testimonial's columns */
/*-----------------------------------------------------------------------------------*/

function edit_testimonial_columns( $testimonial_columns ) {
	$columns = array(
		"cb" => "<input type=\"checkbox\" />",
		'title' => __( 'Testimonial Name', 'helpme_framework' ),
		"quote_author" => __( 'Author', 'helpme_framework' ),
		"desc" => __( 'Description', 'helpme_framework' ),
		"thumbnail" => __( 'Thumbnail', 'helpme_framework' ),
	);

	return $columns;
}
add_filter( 'manage_edit-testimonial_columns', 'edit_testimonial_columns' );

function manage_testimonials_columns( $column ) {
	global $post;

	if ( $post->post_type == "testimonial" ) {
		switch ( $column ) {
		case "quote_author":
			echo get_post_meta( $post->ID, '_author', true );
			break;
		case "desc":
			echo get_post_meta( $post->ID, '_desc', true );
			break;

		case 'thumbnail':
			echo the_post_thumbnail( 'thumbnail' );
			break;
		}
	}
}
add_action( 'manage_posts_custom_column', 'manage_testimonials_columns', 10, 2 );



/*-----------------------------------------------------------------------------------*/
/* Register Custom Post Types - Gallerys */
/*-----------------------------------------------------------------------------------*/
function register_testimonials_post_type() {
	register_post_type( 'testimonial', array(
			'labels' => array(
				'name' => __( 'Testimonials', 'helpme_framework' ),
				'singular_name' => __( 'Testimonial', 'helpme_framework' ),
				'add_new' => __( 'Add New Testimonial', 'helpme_framework' ),
				'add_new_item' => __( 'Add New Testimonial', 'helpme_framework'),
				'edit_item' => __( 'Edit Testimonial', 'helpme_framework' ),
				'new_item' => __( 'New Testimonial', 'helpme_framework' ),
				'view_item' => __( 'View Testimonials', 'helpme_framework' ),
				'search_items' => __( 'Search Testimonials', 'helpme_framework' ),
				'not_found' =>  __( 'No Testimonials found', 'helpme_framework' ),
				'not_found_in_trash' => __( 'No Testimonials found in Trash', 'helpme_framework' ),
				'parent_item_colon' => '',

			),
			'singular_label' => 'Testimonials',
			'public' => true,
			'exclude_from_search' => true,
			'show_ui' => true,
			'menu_icon'=> 'dashicons-awards',
			'capability_type' => 'post',
			'hierarchical' => false,
			'rewrite' => false,
			'menu_position' => 100,
			'query_var' => false,
			'show_in_nav_menus' => false,
			'supports' => array('title', 'thumbnail', 'page-attributes', 'revisions')
		) );
}
add_action( 'init', 'register_testimonials_post_type' );

function testimonials_context_fixer() {
	if ( get_query_var( 'post_type' ) == 'testimonial' ) {
		global $wp_query;
		$wp_query->is_home = false;
		$wp_query->is_404 = true;
		$wp_query->is_single = false;
		$wp_query->is_singular = false;
	}
}
add_action( 'template_redirect', 'testimonials_context_fixer' );



function helpme_cpt_rewrite_flush() {
	custom_vc_init();
    register_causes_post_type();
	register_clients_post_type();
	register_employees_post_type();
	register_portfolio_post_type();
	register_testimonials_post_type();
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'helpme_cpt_rewrite_flush' );



