<?php
$config  = array(
	'title' => sprintf( '%s Page layout', HELPME_THEME_NAME ),
	'id' => 'helpme-layout-metabox',
	'pages' => array(
		'portfolio',
		'post',
		'page',
		'causes'
	),
	'callback' => '',
	'context' => 'side',
	'priority' => 'core'
);
$options = array(


	array(
		"name" => esc_html__( "Page Layout", "helpme" ),
		"subtitle" => esc_html__( "Please choose this page's layout. Default : Full layout", "helpme" ),
		"id" => "_layout",
		"default" => 'full',
		"placeholder" => 'false',
		"width" => 230,
		"options" => array(
			"full" => 'No sidebar',
			"right" => 'Right Sidebar',
			"left" => 'Left Sidebar',
		),
		"type" => "select"
	),

	array(
    "name" => esc_html__("Choose a Sidebar", "helpme" ),
    "subtitle" => esc_html__( "Assign a custom sidebar to this page.", "helpme" ),
    "id" => "_sidebar",
    "width" => 230,
    "default" => '',
    'placeholder' => 'true',
    "options" => helpme_get_sidebar_options(),
    "type" => "select"
  ),



);

new helpme_metaboxesGenerator( $config, $options );
