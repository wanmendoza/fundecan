<?php

$config  = array(
  'title' => sprintf( '%s Styling Options', HELPME_THEME_NAME ),
  'id' => 'helpme-metaboxes-styling',
  'pages' => array(
    'page',
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'core'
);
$options = array(

  array(
    "name" => esc_html__( "Custom Settings", "helpme" ),
    "subtitle" => esc_html__( "You should enable this option if you want to override global background values defined in Theme Settings. Please note that this option will only apply to background selector and layout selector not other options int this metabox.", "helpme" ),
    "id" => "_custom_bg",
    "default" => 'false',
    "type" => "toggle"
  ),
  array(
	'id' => 'header-structure',
	'type' => 'select',
	'name' => esc_html__('Header Structure', 'helpme'),
	'subtitle' => esc_html__('', 'helpme'),
	'desc' => esc_html__('', 'helpme'),
	'options' => array('standard' => 'Standard', 'margin' => 'Margin', 'vertical' => 'Vertical'), //Must provide key => value pairs for radio options 
	'default' => 'standard',
	),
	array(
		'id' => 'header-align',
		'type' => 'select',
		'name' => esc_html__('Header Align', 'helpme'),
		'subtitle' => esc_html__('', 'helpme'),
		'desc' => esc_html__('Please note that this option does not work for vertical header style. Use below option instead', 'helpme'),
		'options' => array('left' => 'Left', 'center' => 'Center', 'right' => 'Right'), //Must provide key => value pairs for radio options
		'default' => 'left'
	),
	array(
		'id' => 'header-grid',
		'type' => 'toggle',
		'name' => esc_html__('Header grid', 'helpme'),
		'subtitle' => esc_html__('', 'helpme'),
		'desc' => esc_html__('Please note that this option does not work for vertical header style. Use below option instead', 'helpme'),
		"default" => false,
	),
	array(
		"name" => esc_html__( "in grid header margin top", "helpme" ),
		"desc" => esc_html__( "", "helpme" ),
		"id" => "header-grid-margin-top",
		"default" => "30",
		"min" => "0",
		"max" => "50",
		"step" => "1",
		"unit" => 'px',
		"type" => "range"
	),
	array(
		'id' => 'sticky-header',
		'type' => 'toggle',
		'name' => esc_html__('Sticky Header', 'helpme'),
		'subtitle' => esc_html__('Will make header stay in top of browser while scrolling down', 'helpme'),
		'desc' => esc_html__('If you don\'t want this feature just disable it from this option.', 'helpme'),
		"default" => 1,
		'on' => 'Enable',
		'off' => 'Disable',
	),
	array(
				'id' => 'header-border-top',
				'type' => 'toggle',
				'name' => esc_html__('Show Header Border Top?', 'helpme'),
				'desc' => esc_html__('', 'helpme'),
				"default" => false,
			),
			/*array(
				'id' => 'header-search',
				'type' => 'toggle',
				'name' => esc_html__('Header Search Form', 'helpme'),
				'desc' => esc_html__('If you don\'t want this feature just disable it from this option.', 'helpme'),
				"default" => false,
			),*/

  array(
      "name" => esc_html__("Upload Logo (Dark & default)", "helpme"),
      "desc" => esc_html__("This logo will be used when transparent header is enabled and your header skin is dark.", "helpme"),
      "id" => "logo",
      "default" => "",
      "type" => "upload"
  ),
  array(
      "name" => esc_html__("Upload Retina Logo (Dark & default)", "helpme"),
      "desc" => esc_html__("Use this option if you want your logo appear crystal clean in retina devices(eg. macbook retina, ipad, iphone).", "helpme"),
      "id" => "logo_retina",
      "default" => "",
      "type" => "upload"
  ),
  /*array(
      "name" => esc_html__("Upload Logo (Light Skin)", "helpme"),
      "desc" => esc_html__("This logo will be used when transparent header is enabled and your header is light skin.", "helpme"),
      "id" => "light_logo",
      "default" => "",
      "type" => "upload"
  ),
  array(
      "name" => esc_html__("Upload Retina Logo (Light Skin)", "helpme"),
      "desc" => esc_html__("Use this option if you want your logo appear crystal clean in retina devices(eg. macbook retina, ipad, iphone).", "helpme"),
      "id" => "light_logo_retina",
      "default" => "",
      "type" => "upload"
  ),*/

  array(
      "name" => esc_html__("Upload Logo (Mobile Version)", "helpme"),
      "desc" => esc_html__("Use this option to change your logo for mobile devices if your logo width is quite long to fit in mobile device screen.", "helpme"),
      "id" => "responsive_logo",
      "default" => "",
      "type" => "upload"
  ),
  array(
      "name" => esc_html__("Upload Retina Logo (Mobile Version)", "helpme"),
      "desc" => esc_html__("Use this option if you want your logo appear crystal clean in retina devices(eg. macbook retina, ipad, iphone).", "helpme"),
      "id" => "responsive_logo_retina",
      "default" => "",
      "type" => "upload"
  ),

  array(
    "name" => esc_html__( "Choose Layout", 'helpme' ),
    "subtitle" => esc_html__( "Choose between a full or a boxed layout to set how your website's layout will look like.", 'helpme' ),
    "id" => "background_selector_orientation",
    "default" => "full",
    "options" => array(
      "boxed" => 'boxed-layout',
      "full" => 'full-width-layout',
    ),
    "type" => "visual_selector"
  ),

  array(
    "name" => esc_html__( "Background color & texture", 'helpme' ),
    "subtitle" => esc_html__( "Please click on the different sections to modify their backgrounds.", 'helpme' ),
    "id"=> 'general_backgounds',
    "type" => "general_background_selector"
  ),


  array(
    "id"=>"body_color",
    "default"=> "#f9fafc",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"body_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"body_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"body_cover",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),




  array(
    "id"=>"page_color",
    "default"=> "#f9fafc",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"page_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"page_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"page_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"page_cover",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),








  array(
    "id"=>"header_color",
    "default"=> "rgba(26,28,40,0.9)",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"header_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"header_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"header_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"header_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"header_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"header_cover",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),




  array(
    "id"=>"banner_color",
    "default"=> "#272e43",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"banner_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"banner_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"banner_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"banner_cover",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),




  array(
    "id"=>"footer_color",
    "default"=> "#1a1c28",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"footer_image",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_position",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_attachment",
    "default"=> "",
    "type"=> 'hidden_input',
  ),


  array(
    "id"=>"footer_repeat",
    "default"=> "",
    "type"=> 'hidden_input',
  ),

  array(
    "id"=>"footer_source",
    "default"=> "no-image",
    "type"=> 'hidden_input',
  ),
  array(
    "id"=>"footer_cover",
    "default"=> "false",
    "type"=> 'hidden_input',
  ),


  array(
    "name" => esc_html__( "Page Title Effect", "helpme" ),
    "subtitle" => esc_html__( "Scroll animations for your page title area", "helpme" ),
    "desc" => esc_html__( "", "helpme" ),
    "id" => "_page_title_intro",
    "default" => 'none',
    "placeholder" => 'false',
    "width" => 400,
    "options" => array(
      "none" => esc_html__('-- No Animation', "helpme" ),
      "parallax" => esc_html__('Parallax', "helpme" ),
      "parallaxZoomOut" => esc_html__('Parallax Zoom Out', "helpme" ),
      "gradient" => esc_html__('Gradient', "helpme" ),
    ),
    "type" => "select"
  ),

  array(
    "name" => esc_html__( "Page Title Section Padding", "helpme" ),
    "subtitle" => esc_html__( "Default : 40px", "helpme" ),
    "desc" => esc_html__( "This padding will be applied to both top and bottom of the page title section", "helpme" ),
    "id" => "_page_title_padding",
    "default" => "40",
    "min" => "0",
    "max" => "500",
    "step" => "1",
    "unit" => 'px',
    "type" => "range"
  ),

  array(
    "name" => esc_html__( "Page Title Section Full Height", "helpme" ),
    "subtitle" => esc_html__( "", "helpme" ),
    "desc" => esc_html__( "", "helpme" ),
    "id" => "_page_title_fullHeight",
    "default" => "false",
    "type" => "toggle"
  ),

  array(
    "name" => esc_html__( "Page Title Align", "helpme" ),
    "subtitle" => esc_html__( "Using this option you can align the page title text.", "helpme" ),
    "desc" => esc_html__( "", "helpme" ),
    "id" => "_page_title_align",
    "default" => 'left',
    "placeholder" => 'false',
    "width" => 400,
    "options" => array(
      "left" => esc_html__('Title on Left', "helpme" ),
      "center" => esc_html__('Title on Center', "helpme" ),
      "right" => esc_html__('Title on Right', "helpme" ),
    ),
    "type" => "select"
  ),

  array(
    "name" => esc_html__( "Page Title Text Size", "helpme" ),
    "subtitle" => esc_html__( "Default : 36px", "helpme" ),
    "desc" => esc_html__( "", "helpme" ),
    "id" => "_page_title_size",
    "default" => "36",
    "min" => "14",
    "max" => "100",
    "step" => "1",
    "unit" => 'px',
    "type" => "range"
  ),
  array(
    "name" => esc_html__( "Page Title Letter Spacing", "helpme" ),
    "subtitle" => esc_html__( "Default : 0px", "helpme" ),
    "desc" => esc_html__( "Space between each letter", "helpme" ),
    "id" => "_page_title_letter_spacing",
    "default" => "0",
    "min" => "0",
    "max" => "10",
    "step" => "1",
    "unit" => 'px',
    "type" => "range"
  ),

  array(
    "name" => esc_html__( "Page Title Font Weight", "helpme" ),
    "subtitle" => esc_html__( "", "helpme" ),
    "desc" => esc_html__( "", "helpme" ),
    "id" => "_page_title_weight",
    "default" => '',
    "options" => array(
            "600"=>esc_html__('Semi Bold', "helpme"),
            "bold" => esc_html__('Bold', "helpme"),
            "bolder" => esc_html__('Bolder', "helpme"),
            "normal" => esc_html__('Normal', "helpme"),
            "300" => esc_html__('Light', "helpme")
    ),
    "type" => "select"
  ),

  array(
    "name" => esc_html__( 'Page Title Color', 'helpme' ),
    "subtitle" => esc_html__( "Using this option you can change page title text color.", "helpme" ),
    "id" => "_page_title_color",
    "default" => "#fff",
    "type" => "color"
  ),

  array(
    "name" => esc_html__( "Breadcrumb Skin", "helpme" ),
    "subtitle" => esc_html__( "Dark skin is for light color backgrounds and light for dark backgrounds.", "helpme" ),
    "desc" => esc_html__( "", "helpme" ),
    "id" => "_breadcrumb_skin",
    "default" => 'light',
    "placeholder" => 'false',
    "width" => 400,
    "options" => array(
      //"dark" => esc_html__('Dark', "helpme" ),
      "light" => esc_html__('Light', "helpme" ),
      "custom" => esc_html__('Custom', "helpme" ),
    ),
    "type" => "select"
  ),

  array(
    "name" => esc_html__( 'Breadcrumb Custom Color', 'helpme' ),
    "subtitle" => esc_html__( "Using this option you can change breadcrumb link and text color.", "helpme" ),
    "id" => "_breadcrumb_custom_color",
    "default" => "",
    "type" => "color"
  ),

  array(
    "name" => esc_html__( 'Breadcrumb Custom Hover Color', 'helpme' ),
    "subtitle" => esc_html__( "Using this option you can change breadcrumb link hover color.", "helpme" ),
    "id" => "_breadcrumb_custom_hover_color",
    "default" => "",
    "type" => "color",
  ),
 

);
new helpme_metaboxesGenerator( $config, $options );
