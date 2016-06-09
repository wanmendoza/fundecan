<?php
$config  = array(
	'title' => sprintf( '%s Testimonials Options', HELPME_THEME_NAME ),
	'id' => 'helpme-metaboxes-notab',
	'pages' => array(
		'testimonial'
	),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(
	array(
		"name" => esc_html__( "Author Name", "helpme" ),
		"subtitle" => esc_html__( "Testimonial author name.", "helpme" ),
		"desc" => esc_html__( "", "helpme" ),
		"id" => "_author",
		"default" => "",
		"size"=> 50,
		"type" => "text"
	),
	array(
		"name" => esc_html__( "Company Name", "helpme" ),
		"subtitle" => esc_html__( "Company or whatever position the author has. will be shown below name.", "helpme" ),
		"desc" => esc_html__( "", "helpme" ),
		"id" => "_company",
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => esc_html__( "Author Position", "helpme" ),
		"subtitle" => esc_html__( "Company or whatever position the author has. will be shown below name.", "helpme" ),
		"desc" => esc_html__( "", "helpme" ),
		"id" => "_position",
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => esc_html__( "Website URL", "helpme" ),
		"subtitle" => esc_html__( "Author website URL. its completely optional.", "helpme" ),
		"desc" => esc_html__( "please include http://", "helpme" ),
		"id" => "_url",
		"default" => "",
		"type" => "text"
	),
	array(
		"name" => esc_html__( "Author Quote", "helpme" ),
		"subtitle" => esc_html__( "Please fill this form as the author quote. you are allowed to use any type of HTML code and shortcode.", "helpme" ),
		"desc" => esc_html__( "", "helpme" ),
		"id" => "_desc",
		"default" => "",
		"type" => "editor"
	),


);
new helpme_metaboxesGenerator( $config, $options );
