<?php
$config  = array(
	'title' => sprintf( '%s Causes Options', HELPME_THEME_NAME ),
	'id' => 'helpme-metaboxes-notab',
	'pages' => array(
		'causes'
	),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);

$options = array(
		

	array(
		"name" => esc_html__( "Causes bar code", "helpme" ),
		"subtitle" => esc_html__( "bar code", "helpme" ),
		"desc" => esc_html__( "", "helpme" ),
		"id" => "_campaign",
		"default" => "",
		"type" => "text",
	),
	array(
		"name" => esc_html__( "Description", "helpme" ),
		"subtitle" => esc_html__( "short description about the team member.", "helpme" ),
		"desc" => esc_html__( "You are allowed to use HTML code as well as shortcodes.", "helpme" ),
		"id" => "_desc",
		"default" => "",
		"type" => "editor"
	),
	array(
		"name" => esc_html__( "Summery", "helpme" ),
		"subtitle" => esc_html__( "add summery here", "helpme" ),
		"desc" => esc_html__( "", "helpme" ),
		"id" => "_cause_summery",
		"default" => "",
		"type" => "textarea"
	),
	/*array(
		"name" => esc_html__( "Website", "helpme" ),
		"subtitle" => esc_html__( "Personal Blog or website", "helpme" ),
		"desc" => esc_html__( "Please enter full URL of this social network(include http://).", "helpme" ),
		"id" => "_website",
		"default" => "",
		"type" => "text"
	),
		array(
		"name" => esc_html__( "Facebook", "helpme" ),
		"subtitle" => esc_html__( "Social Network", "helpme" ),
		"desc" => esc_html__( "Please enter full URL of this social network(include http://).", "helpme" ),
		"id" => "_facebook",
		"default" => "",
		"type" => "text"
	),

		array(
		"name" => esc_html__( "Twitter", "helpme" ),
		"subtitle" => esc_html__( "Social Network", "helpme" ),
		"desc" => esc_html__( "Please enter full URL of this social network(include http://).", "helpme" ),
		"id" => "_twitter",
		"default" => "",
		"type" => "text"
	),
		array(
		"name" => esc_html__( "Linked In", "helpme" ),
		"subtitle" => esc_html__( "Social Network", "helpme" ),
		"desc" => esc_html__( "Please enter full URL of this social network(include http://).", "helpme" ),
		"id" => "_linkedin",
		"default" => "",
		"type" => "text"
	),

	array(
		"name" => esc_html__( "Instagram", "helpme" ),
		"subtitle" => esc_html__( "Social Network", "helpme" ),
		"desc" => esc_html__( "Please enter full URL of this social network(include http://).", "helpme" ),
		"id" => "_instagram",
		"default" => "",
		"type" => "text"
	),

	array(
		"name" => esc_html__( "Dribbble", "helpme" ),
		"subtitle" => esc_html__( "Social Network", "helpme" ),
		"desc" => esc_html__( "Please enter full URL of this social network(include http://).", "helpme" ),
		"id" => "_dribbble",
		"default" => "",
		"type" => "text"
	),
		array(
		"name" => esc_html__( "Google Plus", "helpme" ),
		"subtitle" => esc_html__( "Social Network", "helpme" ),
		"desc" => esc_html__( "Please enter full URL of this social network(include http://).", "helpme" ),
		"id" => "_googleplus",
		"default" => "",
		"type" => "text"
	),

	array(
		"name" => esc_html__( "Pinterest", "helpme" ),
		"subtitle" => esc_html__( "Social Network", "helpme" ),
		"desc" => esc_html__( "Please enter full URL of this social network(include http://).", "helpme" ),
		"id" => "_pinterest",
		"default" => "",
		"type" => "text"
	),*/





);
new helpme_metaboxesGenerator( $config, $options );
