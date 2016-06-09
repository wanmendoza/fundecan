<?php

$config  = array(
  'title' => sprintf( '%s Posts Options', HELPME_THEME_NAME ),
  'id' => 'helpme-metaboxes-tabs',
  'pages' => array(
    'post'
  ),
  'callback' => '',
  'context' => 'normal',
  'priority' => 'core'
);
$options = array(

  array(
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

  array(
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

  array(
    "name" => esc_html__("Featured Image?", "helpme" ),
    "subtitle" => esc_html__( "", "helpme" ),
    "desc" => esc_html__( "If you do not want to set a featured image (in case of sound post type : Audio player, in case of video post type : Video Player) kindly disable it here.", "helpme" ),
    "id" => "_featured_image",
    "default" => 'true',
    "type" => "toggle"
  ),

  array(
    "name" => esc_html__("Show Meta?", "helpme" ),
    "subtitle" => esc_html__( "", "helpme" ),
    "desc" => esc_html__( "If you do not want to set a metabox kindly disable it here.", "helpme" ),
    "id" => "_meta",
    "default" => 'true',
    "type" => "toggle"
  ),

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
    "name" => esc_html__( "Soundcloud", "helpme" ),
    "desc" => esc_html__( "You can get both iframe or shortcode for wordpress from soundcould share=>embed popup. both formats are acceptable.", "helpme" ),
    "subtitle" => esc_html__( "Paste embed iframe or Wordpress shortcode.", "helpme" ),
    "id" => "_audio_iframe",
    "preview" => false,
    "default" => "",
    "type" => "textarea"
  )
);
new helpme_metaboxesGenerator( $config, $options );
