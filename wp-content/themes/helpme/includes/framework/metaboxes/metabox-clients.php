<?php
$config  = array(
	'title' => sprintf( '%s Clients Options', HELPME_THEME_NAME ),
	'id' => 'helpme-metaboxes-notab',
	'pages' => array(
		'clients'
	),
	'callback' => '',
	'context' => 'normal',
	'priority' => 'core'
);
$options = array(

	array(
		"name" => esc_html__( "Company Name", "helpme" ),
		"desc" => esc_html__( "", "helpme" ),
		"subtitle" => esc_html__( "", "helpme" ),
		"id" => "_company",
		"default" => "",
		"option_structure" => 'sub',
		"divider" => true,
		"size"=> 50,
		"type" => "text"
	),

	array(
		"name" => esc_html__( "Website URL", "helpme" ),
		"desc" => esc_html__( "Include http://", "helpme" ),
		"subtitle" => esc_html__( "URL to the client's website or any external source. Optional!", "helpme" ),
		"id" => "_url",
		"default" => "",
		"type" => "text"
	),


);
new helpme_metaboxesGenerator( $config, $options );
