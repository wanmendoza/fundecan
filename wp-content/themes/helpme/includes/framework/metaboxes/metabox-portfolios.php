<?php

$config  = array(
  'title' => sprintf( '%s Portfolio Options', HELPME_THEME_NAME ),
  'id' => 'helpme-metaboxes-tabs',
  'pages' => array(
    'portfolio'
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'core'
);
$options = array(

   /* array(
    "name" => esc_html__( "Page Elements", "helpme" ),
    "subtitle" => esc_html__( "", "helpme" ),
      "desc" => esc_html__( "Depending on your need you can change this page's general layout", "helpme" ),
    "id" => "_template",
    "default" => '',
    "placeholder" => 'true',
    "width" => 400,
    "options" => array(
          "no-header" => esc_html__('Remove Header', "helpme"),
          "no-title" => esc_html__('Remove Page Title', "helpme"),
          "no-header-title" => esc_html__('Remove Header & Page Title', "helpme"),
          "no-title-footer" => esc_html__('Remove Page Title & Footer', "helpme"),
          "no-title-sub-footer" => esc_html__('Remove Page Title & Sub Footer', "helpme"),
          "no-title-footer-sub-footer" => esc_html__('Remove Page Title & Footer & Sub Footer', "helpme"),
          "no-footer-only" => esc_html__('Remove Footer', "helpme"),
          "no-sub-footer" => esc_html__('Remove Sub Footer', "helpme"),
          "no-footer" => esc_html__('Remove Footer & Sub Footer', "helpme"),
          "no-footer-title" => esc_html__('Remove Footer & Page Title', "helpme"),
          "no-sub-footer-title" => esc_html__('Remove Footer & Sub Footer & Page Title', "helpme"),
          "no-header-footer" => esc_html__('Remove Header & Footer & Sub Footer', "helpme"),
          "no-header-title-only-footer" => esc_html__('Remove Header & Page Title & Footer', "helpme"),
          "no-header-title-footer" => esc_html__('Remove Header & Page Title & Footer & Sub Footer', "helpme")
    ),
    "type" => "select"
  ),
*/
 /* array(
    "name" => esc_html__("Stick Template?", "helpme" ),
        "subtitle" => esc_html__( "If enabled this option page will have no padding after header and before footer.", "helpme" ),
    "desc" => esc_html__( "Use this option if you need to use header slideshow or use a callout box before footer.", "helpme" ),
    "id" => "_padding",
    "default" => 'false',
    "type" => "toggle"
  ),
  
  array(
      "name" => esc_html__("Header Toolbar?", "helpme"),
      "subtitle" => esc_html__("", "helpme"),
      "desc" => esc_html__("", "helpme"),
      "id" => "_header_toolbar",
      "default" => 'true',
      "type" => "toggle"
  ),
    /*  array(
        "name" => esc_html__("Header Style", "helpme"),
        "subtitle" => esc_html__("Defines how header appear in top.", "helpme"),
        "desc" => esc_html__("", "helpme"),
        "id" => "_header_style",
        "default" => 'block',
        "placeholder" => 'true',
        "width" => 400,
        "options" => array(
            "block" => esc_html__('Block module', "helpme"),
            "transparent" => esc_html__('Transparent Layer', "helpme")
        ),
        "type" => "select"
    ),
    array(
        "name" => esc_html__("Transparent Header Style Skin", "helpme"),
        "subtitle" => esc_html__("", "helpme"),
        "desc" => esc_html__("", "helpme"),
        "id" => "_trans_header_skin",
        "default" => 'light',
        "placeholder" => 'false',
        "width" => 400,
        "options" => array(
            "light" => esc_html__('Light', "helpme"),
            "dark" => esc_html__('Dark', "helpme")
        ),
        "type" => "select"
    ),
    array(
        "name" => esc_html__("Transparent Header Style Sticky Scroll Offset", "helpme"),
        "subtitle" => esc_html__("", "helpme"),
        "desc" => esc_html__("zero means window height which is relative to the device screen height. any value bigger than 0 will set the sticky header to user defined value.", "helpme"),
        "id" => "_trans_header_offset",
        "default" => "120",
        "min" => "0",
        "max" => "5000",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),

  array(
    "name" => esc_html__( "Portfolio Loop Overlay Logo", "helpme" ),
    "subtitle" => esc_html__( "Optionally you can upload a logo to appear on portfolio loop images.", "helpme" ),
    "desc" => esc_html__( "Its width should not be larger than 300px and height relative to the loop image heights. so try to adjust it as you need.", "helpme" ),
    "id" => "_portfolio_item_logo",
    "preview" => true,
    "default" => "",
    "type" => "upload"
  ),
*/
  array(
    "name" => esc_html__( "Gallery Images", "helpme" ),
    "subtitle" => esc_html__( "Add Images for the gallery post type", "helpme" ),
    "desc" => esc_html__( "You can re-arrange images by drag and drop as well as deleting images.", "helpme" ),
    "id" => "_gallery_images",
    "default" => '',
    "type" => "gallery"
  ),


  array(
    "name" => esc_html__( "Video URL", "helpme" ),
    "subtitle" => esc_html__( "URL to the video site to feed from.", "helpme" ),
    "desc" => esc_html__( "", "helpme" ),
    "id" => "_video_url",
    "type" => "text"
  ),

  array(
    "name" => esc_html__( "Upload MP3 File", "helpme" ),
    "desc" => esc_html__( "Upload MP3 your file or paste the full URL for external files. This file formate needed for Safari, Internet Explorer, Chrome. ", "helpme" ),
    "id" => "_mp3_file",
    "preview" => false,
    "default" => "",
    "type" => "upload"
  ),

  array(
    "name" => esc_html__( "Upload OGG File", "helpme" ),
    "desc" => esc_html__( "Upload OGG your file or paste the full URL for external files. This file formate needed for Firefox, Opera, Chrome. ", "helpme" ),
    "id" => "_ogg_file",
    "preview" => false,
    "default" => "",
    "type" => "upload"
  ),


  array(
    "name" => esc_html__( "Ajax Description", "helpme" ),
    "desc" => esc_html__( "You are allowed to use HTML tags as well as shortcodes.", "helpme" ),
    "subtitle" => esc_html__( "Short description for ajax content. This content will be shown if you have enabled ajax feature for your portfolio loop.", "helpme" ),
    "id" => "_portfolio_short_desc",
    "default" => '',
    "type" => "editor"
  ),

/*

  array(
    "name" => esc_html__( "Masonry Image size", "helpme" ),
    "desc" => esc_html__( "Make your hand picked image sizes.", "helpme" ),
    "subtitle" => esc_html__( "Masonry loop style image size.", "helpme" ),
    "id" => "_masonry_img_size",
    "default" => 'two_x_two_x',
    "width" => 250,
    "options" => array(
      //"regular" => 'Regular',
      //"wide" => 'Wide',
      //"tall" => 'Tall',
      //"wide_tall" => 'Wide & Tall',
      "x_x" => esc_html__('X * X', 'helpme'),
      "two_x_x" => esc_html__('2X * X', 'helpme'),
      "three_x_x" => esc_html__('3X * X', 'helpme'),
      "four_x_x" => esc_html__('4X * X', 'helpme'),
      "x_two_x" => esc_html__('X * 2X', 'helpme'),
      "two_x_two_x" => esc_html__('2X * 2X (Regular)', 'helpme'),
      "two_x_four_x" => esc_html__('2X * 4X (Tall)', 'helpme'),
      "three_x_two_x" => esc_html__('3X * 2X', 'helpme'),
      "four_x_two_x" => esc_html__('4X * 2X (Wide)', 'helpme'),
      "four_x_four_x" => esc_html__('4X * 4X (Wide & Tall)', 'helpme'),
    ),
    "type" => "select"
  ),
*/
  array(
    "name" => esc_html__( "Show Featured Image in Single Post?", "helpme" ),
    "desc" => esc_html__( "Please note that this option will disable featured image, video player (when video post type chosen) and gallery slideshow (when gallery post type chosen).", "helpme" ),
    "id" => "_single_featured",
    "default" => "true",
    "type" => "toggle"
  ),


  array(
    "name" => esc_html__( "Custom URL", "helpme" ),
    "desc" => esc_html__( "If you may choose to change the permalink to a page, post or external URL. If left empty the single post permalink will be used instead.", "helpme" ),
    "subtitle" => esc_html__( "External link other than the single post.", "helpme" ),
    "id" => "_portfolio_permalink",
    "default" => "",
    "type" => "superlink"
  ),

  /*array(
    "name" => esc_html__( "Previous & Next Arrows?", "helpme" ),
    "desc" => esc_html__( "Using this option you can turn on/off the navigation arrows when viewing the portfolio single page.", "helpme" ),
    "id" => "_portfolio_meta_next_prev",
    "default" => "true",
    "type" => "toggle"
  ),*/

  /*array(
    "name" => esc_html__( "Related Projects?", "helpme" ),
    "desc" => esc_html__( "", "helpme" ),
    "id" => "_portfolio_related_project",
    "default" => "false",
    "type" => "toggle"
  ),*/

);
new helpme_metaboxesGenerator( $config, $options );
