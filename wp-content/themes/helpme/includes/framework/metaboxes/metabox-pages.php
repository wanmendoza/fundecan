<?php
$config  = array(
    'title' => sprintf('%s Page Options', HELPME_THEME_NAME),
    'id' => 'helpme-page-metabox',
    'pages' => array(
        'page'
    ),
    'callback' => '',
    'context' => 'normal',
    'priority' => 'core'
);
$options = array(
    array(
        "name" => esc_html__("Page Elements", "helpme"),
        "subtitle" => esc_html__("", "helpme"),
        "desc" => esc_html__("Depending on your need you can change this page's general layout", "helpme"),
        "id" => "_template",
        "default" => 'pagetitle-on',
        "placeholder" => 'true',
        "width" => 400,
        "options" => array(
          //"no-header" => esc_html__('Remove Header', "helpme"),
          "no-title" => esc_html__('No Page Title', "helpme"),
		  "pagetitle-on" => esc_html__('Page Title on', "helpme"),
         // "no-header-title" => esc_html__('Remove Header & Page Title', "helpme"),
         // "no-title-footer" => esc_html__('Remove Page Title & Footer', "helpme"),
         // "no-title-sub-footer" => esc_html__('Remove Page Title & Sub Footer', "helpme"),
         // "no-title-footer-sub-footer" => esc_html__('Remove Page Title & Footer & Sub Footer', "helpme"),
         // "no-footer-only" => esc_html__('Remove Footer', "helpme"),
         // "no-sub-footer" => esc_html__('Remove Sub Footer', "helpme"),
         // "no-footer" => esc_html__('Remove Footer & Sub Footer', "helpme"),
         // "no-footer-title" => esc_html__('Remove Footer & Page Title', "helpme"),
         // "no-sub-footer-title" => esc_html__('Remove Footer & Sub Footer & Page Title', "helpme"),
         // "no-header-footer" => esc_html__('Remove Header & Footer & Sub Footer', "helpme"),
         // "no-header-title-only-footer" => esc_html__('Remove Header & Page Title & Footer', "helpme"),
         // "no-header-title-footer" => esc_html__('Remove Header & Page Title & Footer & Sub Footer', "helpme")
        ),
        "type" => "select"
    ),

   array(
        "name" => esc_html__("Stick Template?", "helpme"),
        "subtitle" => esc_html__("If enabled this option page will have no padding after header and before footer.", "helpme"),
        "desc" => esc_html__("Use this option if you need to use header slideshow or use a callout box before footer.", "helpme"),
        "id" => "_padding",
        "default" => 'true',
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
        "name" => esc_html__("Breadcrumb", "helpme"),
        "subtitle" => esc_html__("If you dont want to show breadcrumb disable this option.", "helpme"),
        "desc" => esc_html__("Breadcrumb is useful for SEO purposes and helps your site visitors to know where exactly they are relative to your sitemap from homepage. So its also good for UX.", "helpme"),
        "id" => "_breadcrumb",
        "default" => 'false',
        "type" => "toggle"
    ),
    array(
        "name" => esc_html__("Page Pre-loader", "helpme"),
        "subtitle" => esc_html__("adds a preloading overlay until the page is ready to be viewed.", "helpme"),
        "desc" => esc_html__("Please use this option when your have alot of images, slideshows and content.", "helpme"),
        "id" => "_preloader",
        "default" => 'false',
        "type" => "toggle"
    ),
    array(
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
        "default" => "1",
        "min" => "0",
        "max" => "5000",
        "step" => "1",
        "unit" => 'px',
        "type" => "range"
    ),
    array(
        "name" => esc_html__("Main Navigation Location", "helpme"),
        "subtitle" => esc_html__("Choose which menu location to be used in this page.", "helpme"),
        "desc" => esc_html__("If left blank, Primary Menu will be used. You should first create menu and then assign to menu locations  by goining to appearence -> menu", "helpme"),
        "id" => "_menu_location",
        "default" => '',
        "placeholder" => 'true',
        "width" => 400,
        "options" => array(
            "primary-menu" => esc_html__('Primary Navigation', "helpme"),
            "second-menu" => esc_html__('Second Navigation', "helpme"),
            "third-menu" => esc_html__('Third Navigation', "helpme"),
            "fourth-menu" => esc_html__('Fourth Navigation', "helpme"),
            "fifth-menu" => esc_html__('Fifth Navigation', "helpme"),
            "sixth-menu" => esc_html__('Sixth Navigation', "helpme"),
            "seventh-menu" => esc_html__('Seventh Navigation', "helpme")
        ),
        "type" => "select"
    ),
   /* array(
        "name" => esc_html__("Quick Contact", "helpme"),
        "subtitle" => esc_html__("You can enable or disable Quick Contact Form using this option.", "helpme"),
        "desc" => esc_html__("", "helpme"),
        "id" => "_quick_contact",
        "default" => 'global',
        "placeholder" => 'true',
        "width" => 400,
        "options" => array(
            "global" => esc_html__('Override from Theme Settings', "helpme"),
            "enabled" => esc_html__('Enabled', "helpme"),
            "disabled" => esc_html__('Disabled', "helpme"),
        ),
        "type" => "select"
    ),
    array(
        "name" => esc_html__("Quick Contact Skin", "helpme"),
        "subtitle" => esc_html__("", "helpme"),
        "desc" => esc_html__("", "helpme"),
        "id" => "_quick_contact_skin",
        "default" => 'dark',
        "placeholder" => 'false',
        "width" => 400,
        "options" => array(
            "light" => esc_html__('Light', "helpme"),
            "dark" => esc_html__('Dark', "helpme")
        ),
        "type" => "select"
    ),*/
  
);
new helpme_metaboxesGenerator($config, $options);
