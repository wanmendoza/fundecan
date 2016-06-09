<?php

/*
 *
 * Contains all the dynamic css rules generated based on theme settings.
 *
 */

function helpme_dynamic_css() {

	wp_enqueue_style('helpme-style', get_stylesheet_uri(), false, false, 'all');

	global $helpme_settings;

	$output = $typekit_fonts_1 = $attach = $custom_breadcrumb_page = $custom_breadcrumb_hover_color = $custom_breadcrumb_color = '';

/* Get skin color from global $_GET for skin switcher panel */
	if (isset($_GET['skin'])) {
		$accent_color = '#' . $_GET['skin'];
		$helpme_settings['footer-link-color']['hover'] = '#' . $_GET['skin'];
		$helpme_settings['dashboard-link-color']['hover'] = '#' . $_GET['skin'];
		$helpme_settings['sidebar-link-color']['hover'] = '#' . $_GET['skin'];
		$helpme_settings['link-color']['hover'] = '#' . $_GET['skin'];
		$helpme_settings['footer-social-color']['hover'] = '#' . $_GET['skin'];
		$helpme_settings['main-nav-top-color']['hover'] = '#' . $_GET['skin'];
		$helpme_settings['main-nav-sub-color']['bg-hover'] = '#' . $_GET['skin'];
		$helpme_settings['main-nav-sub-color']['bg-active'] = '#' . $_GET['skin'];

	} else {
		$accent_color = $helpme_settings['accent-color'];
	}

/**
 * Typekit fonts
 * */

	$typekit_id = isset($helpme_settings['typekit-id']) ? $helpme_settings['typekit-id'] : '';
	$typekit_elements_list_1 = isset($helpme_settings['typekit-element-names']) ? $helpme_settings['typekit-element-names'] : '';
	$typekit_font_family_1 = isset($helpme_settings['typekit-font-family']) ? $helpme_settings['typekit-font-family'] : '';

	if ($typekit_id != '' && $typekit_elements_list_1 != '' && $typekit_font_family_1 != '') {
		if (is_array($typekit_elements_list_1)) {
			$typekit_elements_list_1 = implode(', ', $typekit_elements_list_1);
		} else {
			$typekit_elements_list_1 = $typekit_elements_list_1;
		}
		$typekit_fonts_1 = $typekit_elements_list_1 . ' {font-family: "' . $typekit_font_family_1 . '"}';

	}

###########################################
# Structure
###########################################

// Sidebar Width deducted from content width percentage

	$sidebar_width = 100 - $helpme_settings['content-width'];

	$boxed_layout_width = $helpme_settings['grid-width']+60;
	
	$output .= "
.helpme-grid,
.helpme-inner-grid
{
	max-width: {$helpme_settings['grid-width']}px;
}

.theme-page-wrapper.right-layout .theme-content, .theme-page-wrapper.left-layout .theme-content
{
	width: {$helpme_settings['content-width']}%;
}

.theme-page-wrapper #helpme-sidebar.helpme-builtin
{
	width: {$sidebar_width}%;
}



.helpme-boxed-enabled,
.helpme-boxed-enabled #helpme-header.sticky-header,
.helpme-boxed-enabled #helpme-header.transparent-header-sticky,
.helpme-boxed-enabled .helpme-secondary-header
{
	max-width: {$boxed_layout_width}px;

}

@media handheld, only screen and (max-width: {$helpme_settings['grid-width']}px)
{

#sub-footer .item-holder
{
	margin:0 20px;
}

}

";

###########################################
# Backgrounds
###########################################

/**
 * Body background
 */
	$body_bg = $helpme_settings['body-bg']['color'] ? 'background-color:' . $helpme_settings['body-bg']['color'] . ';' : '';
	$body_bg .= $helpme_settings['body-bg']['url'] ? 'background-image:url(' . $helpme_settings['body-bg']['url'] . ');' : ' ';
	$body_bg .= $helpme_settings['body-bg']['position'] ? 'background-position:' . $helpme_settings['body-bg']['position'] . ';' : '';
	$body_bg .= $helpme_settings['body-bg']['attachment'] ? 'background-attachment:' . $helpme_settings['body-bg']['attachment'] . ';' : '';
	$body_bg .= $helpme_settings['body-bg']['repeat'] ? 'background-repeat:' . $helpme_settings['body-bg']['repeat'] . ';' : '';
	$body_bg .= (isset($helpme_settings['body-bg']['cover']) && $helpme_settings['body-bg']['cover'] == 1) ? 'background-size: cover;background-repeat: no-repeat;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;' : '';

/**
 * Header background
 */
	$header_bg_color = $helpme_settings['header-bg']['color'] ? 'background-color:' . $helpme_settings['header-bg']['color'] . ';' : '';
	$header_bg = $helpme_settings['header-bg']['color'] ? 'background-color:' . $helpme_settings['header-bg']['color'] . ';' : '';
	$header_bg .= $helpme_settings['header-bg']['url'] ? 'background-image:url(' . $helpme_settings['header-bg']['url'] . ');' : ' ';
	$header_bg .= $helpme_settings['header-bg']['position'] ? 'background-position:' . $helpme_settings['header-bg']['position'] . ';' : '';
	$header_bg .= $helpme_settings['header-bg']['attachment'] ? 'background-attachment:' . $helpme_settings['header-bg']['attachment'] . ';' : '';
	$header_bg .= $helpme_settings['header-bg']['repeat'] ? 'background-repeat:' . $helpme_settings['header-bg']['repeat'] . ';' : '';
	$header_bg .= (isset($helpme_settings['header-bg']['cover']) && $helpme_settings['header-bg']['cover'] == 1) ? 'background-size: cover;background-repeat: no-repeat;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;' : '';

/**
 * Header toolbar background
 */
	$toolbar_bg = $helpme_settings['toolbar-bg']['color'] ? 'background-color:' . $helpme_settings['toolbar-bg']['color'] . ';' : '';
	$toolbar_bg .= $helpme_settings['toolbar-bg']['url'] ? 'background-image:url(' . $helpme_settings['toolbar-bg']['url'] . ');' : ' ';
	$toolbar_bg .= $helpme_settings['toolbar-bg']['position'] ? 'background-position:' . $helpme_settings['toolbar-bg']['position'] . ';' : '';
	$toolbar_bg .= $helpme_settings['toolbar-bg']['attachment'] ? 'background-attachment:' . $helpme_settings['toolbar-bg']['attachment'] . ';' : '';
	$toolbar_bg .= $helpme_settings['toolbar-bg']['repeat'] ? 'background-repeat:' . $helpme_settings['toolbar-bg']['repeat'] . ';' : '';
	$toolbar_bg .= (isset($helpme_settings['toolbar-bg']['cover']) && $helpme_settings['toolbar-bg']['cover'] == 1) ? 'background-size: cover;background-repeat: no-repeat;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;' : '';

/**
 * Page Title background
 */
	$page_title_bg = $helpme_settings['page-title-bg']['color'] ? 'background-color:' . $helpme_settings['page-title-bg']['color'] . ';' : '';
	$page_title_bg .= $helpme_settings['page-title-bg']['url'] ? 'background-image:url(' . $helpme_settings['page-title-bg']['url'] . ');' : ' ';
	$page_title_bg .= $helpme_settings['page-title-bg']['position'] ? 'background-position:' . $helpme_settings['page-title-bg']['position'] . ';' : '';
	$page_title_bg .= $helpme_settings['page-title-bg']['attachment'] ? 'background-attachment:' . $helpme_settings['page-title-bg']['attachment'] . ';' : '';
	$page_title_bg .= $helpme_settings['page-title-bg']['repeat'] ? 'background-repeat:' . $helpme_settings['page-title-bg']['repeat'] . ';' : '';
	$page_title_bg .= (isset($helpme_settings['page-title-bg']['cover']) && $helpme_settings['page-title-bg']['cover'] == 1) ? 'background-size: cover;background-repeat: no-repeat;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;' : '';
	$page_title_bg .= $helpme_settings['page-title-bg']['border'] ? 'border-bottom:1px solid ' . $helpme_settings['page-title-bg']['border'] . ';' : '';

/**
 * Page background
 */
	$page_bg = $helpme_settings['page-bg']['color'] ? 'background-color:' . $helpme_settings['page-bg']['color'] . ';' : '';
	$page_bg .= $helpme_settings['page-bg']['url'] ? 'background-image:url(' . $helpme_settings['page-bg']['url'] . ');' : ' ';
	$page_bg .= $helpme_settings['page-bg']['position'] ? 'background-position:' . $helpme_settings['page-bg']['position'] . ';' : '';
	$page_bg .= $helpme_settings['page-bg']['attachment'] ? 'background-attachment:' . $helpme_settings['page-bg']['attachment'] . ';' : '';
	$page_bg .= $helpme_settings['page-bg']['repeat'] ? 'background-repeat:' . $helpme_settings['page-bg']['repeat'] . ';' : '';
	$page_bg .= (isset($helpme_settings['page-bg']['cover']) && $helpme_settings['page-bg']['cover'] == 1) ? 'background-size: cover;background-repeat: no-repeat;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;' : '';

/**
 * Footer background
 */
	$footer_bg = $helpme_settings['footer-bg']['color'] ? 'background-color:' . $helpme_settings['footer-bg']['color'] . ';' : '';
	$footer_bg .= $helpme_settings['footer-bg']['url'] ? 'background-image:url(' . $helpme_settings['footer-bg']['url'] . ');' : ' ';
	$footer_bg .= $helpme_settings['footer-bg']['position'] ? 'background-position:' . $helpme_settings['footer-bg']['position'] . ';' : '';
	$footer_bg .= $helpme_settings['footer-bg']['attachment'] ? 'background-attachment:' . $helpme_settings['footer-bg']['attachment'] . ';' : '';
	$footer_bg .= $helpme_settings['footer-bg']['repeat'] ? 'background-repeat:' . $helpme_settings['footer-bg']['repeat'] . ';' : '';
	$footer_bg .= (isset($helpme_settings['footer-bg']['cover']) && $helpme_settings['footer-bg']['cover'] == 1) ? 'background-size: cover;background-repeat: no-repeat;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;' : '';

	$page_title_color = $helpme_settings['page-title-color'];
	$page_title_size = $helpme_settings['page-title-size'];
	$page_title_padding = 200;
	$page_title_weight = '';
	$page_title_letter_spacing = '';

	if (global_get_post_id()) {


		$post_id = global_get_post_id();

		$intro = get_post_meta($post_id, '_page_title_intro', true);

		
		if($intro != 'none') {
			$attach = 'background-attachment: scroll;';
		}

		$enable = get_post_meta($post_id, '_custom_bg', true);

		if ($enable == 'true') {
			$body_bg = get_post_meta($post_id, 'body_color', true) ? 'background-color: ' . get_post_meta($post_id, 'body_color', true) . ';' : '';
			$body_bg .= get_post_meta($post_id, 'body_image', true) ? 'background-image:url(' . get_post_meta($post_id, 'body_image', true) . ');' : '';
			$body_bg .= get_post_meta($post_id, 'body_repeat', true) ? 'background-repeat:' . get_post_meta($post_id, 'body_repeat', true) . ';' : '';
			$body_bg .= get_post_meta($post_id, 'body_position', true) ? 'background-position:' . get_post_meta($post_id, 'body_position', true) . ';' : '';
			$body_bg .= get_post_meta($post_id, 'body_attachment', true) ? 'background-attachment:' . get_post_meta($post_id, 'body_attachment', true) . ';' : '';
			$body_bg .= (get_post_meta($post_id, 'body_cover', true) == 'true') ? 'background-size: cover;background-repeat: no-repeat;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;' : '';

			$header_bg = get_post_meta($post_id, 'header_color', true) ? 'background-color: ' . get_post_meta($post_id, 'header_color', true) . ';' : '';
			$header_bg_color = get_post_meta($post_id, 'header_color', true) ? 'background-color: ' . get_post_meta($post_id, 'header_color', true) . ';' : '';
			$header_bg .= get_post_meta($post_id, 'header_image', true) ? 'background-image:url(' . get_post_meta($post_id, 'header_image', true) . ');' : '';
			$header_bg .= get_post_meta($post_id, 'header_repeat', true) ? 'background-repeat:' . get_post_meta($post_id, 'header_repeat', true) . ';' : '';
			$header_bg .= get_post_meta($post_id, 'header_position', true) ? 'background-position:' . get_post_meta($post_id, 'header_position', true) . ';' : '';
			$header_bg .= get_post_meta($post_id, 'header_attachment', true) ? 'background-attachment:' . get_post_meta($post_id, 'header_attachment', true) . ';' : '';
			$header_bg .= (get_post_meta($post_id, 'header_cover', true) == 'true') ? 'background-size: cover;background-repeat: no-repeat;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;' : '';

			$page_title_bg = get_post_meta($post_id, 'banner_color', true) ? 'background-color: ' . get_post_meta($post_id, 'banner_color', true) . ';' : '';
			$page_title_bg .= get_post_meta($post_id, 'banner_image', true) ? 'background-image:url(' . get_post_meta($post_id, 'banner_image', true) . ');' : '';
			$page_title_bg .= get_post_meta($post_id, 'banner_repeat', true) ? 'background-repeat:' . get_post_meta($post_id, 'banner_repeat', true) . ';' : '';
			$page_title_bg .= get_post_meta($post_id, 'banner_position', true) ? 'background-position:' . get_post_meta($post_id, 'banner_position', true) . ';' : '';
			$page_title_bg .= get_post_meta($post_id, 'banner_attachment', true) ? 'background-attachment:' . get_post_meta($post_id, 'banner_attachment', true) . ';' : '';
			$page_title_bg .= (get_post_meta($post_id, 'banner_cover', true) == 'true') ? 'background-size: cover;background-repeat: no-repeat;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;' : '';

			$page_bg = get_post_meta($post_id, 'page_color', true) ? 'background-color: ' . get_post_meta($post_id, 'page_color', true) . ' !important;' : '';
			$page_bg .= get_post_meta($post_id, 'page_image', true) ? 'background-image:url(' . get_post_meta($post_id, 'page_image', true) . ') !important;' : '';
			$page_bg .= get_post_meta($post_id, 'page_repeat', true) ? 'background-repeat:' . get_post_meta($post_id, 'page_repeat', true) . ' !important;' : '';
			$page_bg .= get_post_meta($post_id, 'page_position', true) ? 'background-position:' . get_post_meta($post_id, 'page_position', true) . ' !important;' : '';
			$page_bg .= get_post_meta($post_id, 'page_attachment', true) ? 'background-attachment:' . get_post_meta($post_id, 'page_attachment', true) . ' !important;' : '';
			$page_bg .= (get_post_meta($post_id, 'page_cover', true) == 'true') ? 'background-size: cover;background-repeat: no-repeat;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;' : '';

			$footer_bg = get_post_meta($post_id, 'footer_color', true) ? 'background-color: ' . get_post_meta($post_id, 'footer_color', true) . ';' : '';
			$footer_bg .= get_post_meta($post_id, 'footer_image', true) ? 'background-image:url(' . get_post_meta($post_id, 'footer_image', true) . ');' : '';
			$footer_bg .= get_post_meta($post_id, 'footer_repeat', true) ? 'background-repeat:' . get_post_meta($post_id, 'footer_repeat', true) . ';' : '';
			$footer_bg .= get_post_meta($post_id, 'footer_position', true) ? 'background-position:' . get_post_meta($post_id, 'footer_position', true) . ';' : '';
			$footer_bg .= get_post_meta($post_id, 'footer_attachment', true) ? 'background-attachment:' . get_post_meta($post_id, 'footer_attachment', true) . ';' : '';
			$footer_bg .= (get_post_meta($post_id, 'footer_cover', true) == 'true') ? 'background-size: cover;background-repeat: no-repeat;-moz-background-size: cover;-webkit-background-size: cover;-o-background-size: cover;' : '';

			$page_title_color = get_post_meta($post_id, '_page_title_color', true) ? get_post_meta($post_id, '_page_title_color', true) : $helpme_settings['page-title-color'];
			$page_title_weight = get_post_meta($post_id, '_page_title_weight', true) ? ('font-weight:' . get_post_meta($post_id, '_page_title_weight', true)) : '';
			$page_title_letter_spacing = get_post_meta($post_id, '_page_title_letter_spacing', true) ? ('letter-spacing:' . get_post_meta($post_id, '_page_title_letter_spacing', true) . 'px;') : '';

			$page_title_size = get_post_meta($post_id, '_page_title_size', true) ? get_post_meta($post_id, '_page_title_size', true) : $helpme_settings['page-title-size'];
			$page_title_padding = get_post_meta($post_id, '_page_title_padding', true) ? get_post_meta($post_id, '_page_title_padding', true) : 40;
			
			$header_grid_margin = get_post_meta($post_id, 'header-grid-margin-top', true) ? get_post_meta($post_id, 'header-grid-margin-top', true) : $helpme_settings['header-grid-margin-top'];
			$header_border_top = get_post_meta($post_id, 'header-border-top', true) ? get_post_meta($post_id, 'header-border-top', true) : $helpme_settings['header-border-top'];
		}
		/*** custom breadcrumb coloring ***/
		$custom_breadcrumb_page = get_post_meta($post_id, '_breadcrumb_skin', true) ? 1 : 0;
		$custom_breadcrumb_color = get_post_meta($post_id, '_breadcrumb_custom_color', true) ? get_post_meta($post_id, '_breadcrumb_custom_color', true) : '';
		$custom_breadcrumb_hover_color = get_post_meta($post_id, '_breadcrumb_custom_hover_color', true) ? get_post_meta($post_id, '_breadcrumb_custom_hover_color', true) : '';

	}

	$header_bottom_border = (isset($helpme_settings['header-bottom-border']) && !empty($helpme_settings['header-bottom-border'])) ? ('border-bottom:1px solid' . $helpme_settings['header-bottom-border'] . ';') : '';

	$output .= "body,
.theme-main-wrapper
{
{$body_bg}
}



";
$post_id = global_get_post_id();
$header_border_top = get_post_meta($post_id, 'header-border-top', true) ? get_post_meta($post_id, 'header-border-top', true) : $helpme_settings['header-border-top'];
if (is_page() && $header_border_top == 'true') {
		
		$output .= "
		.theme-main-wrapper:not(.vertical-header) #helpme-header,
		.theme-main-wrapper:not(.vertical-header) .helpme-secondary-header
		{
			border-top:1px solid {$accent_color};
		}";
}
else if (isset($helpme_settings['header-border-top']) && ($helpme_settings['header-border-top'] == 1)) {
		
		$output .= "
		.theme-main-wrapper:not(.vertical-header) #helpme-header,
		.theme-main-wrapper:not(.vertical-header) .helpme-secondary-header
		{
			border-top:1px solid {$accent_color};
		}";
}

$output .= "#helpme-header,
.helpme-secondary-header
{
{$header_bg};
{$header_bg_color};
}
.donate-btn{display:inline-block;}
.donate-btn .donate-header-btn{
	min-width:120px;
	display:block;
	padding:8px 12px;
	font-weight:bold;
	text-transform:uppercase;
	color:#fff;
	border-radius:3px;
	background:{$accent_color};
}
.donate-btn .donate-header-btn:hover{
	opacity:0.9;
	color:#fff;
}
";

/***** side-dashboard setting move to line number 246 if required ****

.helpme-side-dashboard {
	background-color:{$helpme_settings['dashboard-bg']};
}
.helpme-side-dashboard .widgettitle,
.helpme-side-dashboard .widgettitle a
{
	color: {$helpme_settings['dashboard-title-color']};
}


.helpme-side-dashboard,
.helpme-side-dashboard p
{
	color: {$helpme_settings['dashboard-txt-color']};
}

.helpme-side-dashboard a
{
	color: {$helpme_settings['dashboard-link-color']['regular']};
}

.helpme-side-dashboard a:hover
{
	color: {$helpme_settings['dashboard-link-color']['hover']};
}
*/
/**
 * Header Toolbar font settings
 */
$toolbar_font = (isset($helpme_settings['toolbar-font']['font-family']) && !empty($helpme_settings['toolbar-font']['font-family'])) ? ('font-family:' . $helpme_settings['toolbar-font']['font-family'] . ';') : '';
$toolbar_font .= (isset($helpme_settings['toolbar-font']['font-weight']) && !empty($helpme_settings['toolbar-font']['font-weight'])) ? ('font-weight:' . $helpme_settings['toolbar-font']['font-weight'] . ';') : '';
$toolbar_font .= (isset($helpme_settings['toolbar-font']['font-size']) && !empty($helpme_settings['toolbar-font']['font-size'])) ? ('font-size:' . $helpme_settings['toolbar-font']['font-size'] . ';') : '';

$output .= ".helpme-header-toolbar
{
{$toolbar_bg};
{$toolbar_font};
}

.sticky-header-padding {
	{$header_bg_color}
}

#helpme-header.transparent-header-sticky,
#helpme-header.sticky-header {
{$header_bottom_border}}


.transparent-header.light-header-skin,
.transparent-header.dark-header-skin
 {
  border-top: none !important;
  
}

#helpme-page-title .helpme-page-title-bg {
{$page_title_bg};
{$attach}
}

#theme-page
{
{$page_bg}}

#helpme-footer
{
{$footer_bg}
}
#sub-footer
{
	background-color: {$helpme_settings['sub-footer-bg']};
}

#helpme-page-title
{
	padding-top:{$page_title_padding}px !important;
}

#helpme-page-title .helpme-page-heading{
	font-size:{$page_title_size}px;
	color:{$page_title_color};
	{$page_title_weight};
	{$page_title_letter_spacing};
}
#helpme-breadcrumbs {
	line-height:{$page_title_size}px;
}

";

###########################################
	# Widgets
	###########################################

	$widget_font_family = (isset($helpme_settings['widget-title']['font-family']) && !empty($helpme_settings['widget-title']['font-family'])) ? ('font-family:' . $helpme_settings['widget-title']['font-family'] . ';') : '';
	$widget_font_size = (isset($helpme_settings['widget-title']['font-size']) && !empty($helpme_settings['widget-title']['font-size'])) ? ('font-size:' . $helpme_settings['widget-title']['font-size'] . ';') : '';
	$widget_font_weight = (isset($helpme_settings['widget-title']['font-weight']) && !empty($helpme_settings['widget-title']['font-weight'])) ? ('font-weight:' . $helpme_settings['widget-title']['font-weight'] . ';') : '';
	$widget_title_divider = (isset($helpme_settings['widget-title-divider']) && $helpme_settings['widget-title-divider'] == 1) ? '' : 'display: none;'; 

	$output .= ".widgettitle
{
{$widget_font_family}
{$widget_font_size}
{$widget_font_weight}
}

.widgettitle:after{
	{$widget_title_divider}
}



#helpme-sidebar .widgettitle,
#helpme-sidebar .widgettitle  a
{
	color: {$helpme_settings['sidebar-title-color']};
}


#helpme-sidebar,
#helpme-sidebar p
{
	color: {$helpme_settings['sidebar-txt-color']};
}

#helpme-sidebar a
{
	color: {$helpme_settings['sidebar-link-color']['regular']};
}

#helpme-sidebar a:hover
{
	color: {$helpme_settings['sidebar-link-color']['hover']};
}


#helpme-footer .widgettitle,
#helpme-footer .widgettitle a
{
	color: {$helpme_settings['footer-title-color']};
}

#helpme-footer,
#helpme-footer p
{
	color: {$helpme_settings['footer-txt-color']};
}

#helpme-footer a
{
	color: {$helpme_settings['footer-link-color']['regular']};
}

#helpme-footer a:hover
{
	color: {$helpme_settings['footer-link-color']['hover']};
}

.helpme-footer-copyright,
.helpme-footer-copyright a {
	color: {$helpme_settings['footer-socket-color']} !important;
}

.helpme-footer-social a {
	color: {$helpme_settings['footer-social-color']['regular']} !important;
}

.helpme-footer-social a:hover {
	color: {$helpme_settings['footer-social-color']['hover']}!important;
}
#helpme-footer .widget_tag_cloud a,
#helpme-footer .widget_product_tag_cloud a {
  border-color:{$helpme_settings['footer-link-color']['regular']};
  
  
}
#helpme-footer .widget_tag_cloud a:hover,
#helpme-footer .widget_product_tag_cloud:hover a {
  border-color:{$helpme_settings['accent-color']};
  background-color:{$helpme_settings['accent-color']};
  
  
}
.widget_tag_cloud a,
.widget_product_tag_cloud a {
  border-color:{$helpme_settings['sidebar-link-color']['regular']};
  
  
}
.widget_tag_cloud a:hover,
.widget_product_tag_cloud:hover a {
  border-color:{$helpme_settings['accent-color']};
  background-color:{$helpme_settings['accent-color']};
  
  
}
#helpme-sidebar .widget_posts_lists ul li .post-list-meta data {
  background-color:{$helpme_settings['accent-color']};
  color:#fff;
}
#helpme-sidebar .widget_posts_lists ul li .post-list-title{
	color:{$helpme_settings['heading-color']};
	
}
#helpme-sidebar .widget_archive ul li a:before,
#helpme-sidebar .widget_categories a:before{
	color:{$helpme_settings['accent-color']};
	
}
#helpme-sidebar .widget_archive ul li a:hover:before,
#helpme-sidebar .widget_categories a:hover:before{
	color:#fff;
	background-color:{$helpme_settings['accent-color']};
	
}
#helpme-sidebar .widgettitle:after {
	background-color:{$helpme_settings['accent-color']};
	
}
#helpme-sidebar h5.tribe-event-title a{
	color:{$helpme_settings['heading-color']};
}
#helpme-sidebar .tribe-event-duration{
	background-color:{$helpme_settings['accent-color']};	
}
#helpme-sidebar .tribe-event-content:hover .tribe-event-duration{
	background-color:{$helpme_settings['heading-color']};	
}
";

###########################################
	# Typography & Coloring
	###########################################

	$body_font_backup = (isset($helpme_settings['body-font']['font-backup']) && !empty($helpme_settings['body-font']['font-backup'])) ? ('font-family:' . $helpme_settings['body-font']['font-backup'] . ';') : '';
	$body_font_family = (isset($helpme_settings['body-font']['font-family']) && !empty($helpme_settings['body-font']['font-family'])) ? ('font-family:' . $helpme_settings['body-font']['font-family'] . ';') : '';
	$heading_font_family = (isset($helpme_settings['heading-font']['font-family']) && !empty($helpme_settings['heading-font']['font-family'])) ? ('font-family:' . $helpme_settings['heading-font']['font-family'] . ';') : '';
	$p_font_size = (isset($helpme_settings['p-text-size']) && !empty($helpme_settings['p-text-size'])) ? $helpme_settings['p-text-size'] : $helpme_settings['body-font']['font-size'];
	

	$output .= "body
{
	line-height: 20px;
{$body_font_backup}
{$body_font_family}
	font-size:{$helpme_settings['body-font']['font-size']};
	color:{$helpme_settings['body-txt-color']};
}

{$typekit_fonts_1}

p {
	font-size:{$p_font_size}px;
	color:{$helpme_settings['body-txt-color']};
	line-height:{$helpme_settings['p-line-height']}px;
}

a {
	color:{$helpme_settings['link-color']['regular']};
}

a:hover {
	color:{$helpme_settings['link-color']['hover']};
}
.cause-campaign .progress {box-shadow:none !important;margin-bottom:0 !important;border-radius:8px !important;}
.progress {box-shadow:none !important;margin-bottom:0 !important;border-radius:8px;}
.progress-bar-text span{color:{$helpme_settings['accent-color']}}
.helpme-causes .owl-item .mg-btn-grey:hover,
.helpme-causes .owl-item .mg-btn-grey:focus,
.helpme-causes .owl-item .mg-btn-grey:active,
.helpme-causes .owl-item .cause-readmore a:hover{
	border-color:{$helpme_settings['accent-color']} !important;
	background-color:{$helpme_settings['accent-color']} !important;
	
	}
.outline-button{
	background-color:{$helpme_settings['accent-color']} !important;
	}
.tweet-icon{
	border-color:{$helpme_settings['accent-color']};
	color:{$helpme_settings['accent-color']};
	
	}
.tweet-user,
.tweet-time{
	color:{$helpme_settings['accent-color']};
	
	}
#theme-page .helpme-custom-heading h4:hover{
	color:{$helpme_settings['heading-color']};
	
}
.title-divider span{background:{$helpme_settings['accent-color']};}
#theme-page h1,
#theme-page h2,
#theme-page h3,
#theme-page h4,
#theme-page h5,
#theme-page h6
{
	font-weight:{$helpme_settings['heading-font']['font-weight']};
	color:{$helpme_settings['heading-color']};
}
#theme-page h1:hover,
#theme-page h2:hover,
#theme-page h3:hover,
#theme-page h4:hover,
#theme-page h5:hover,
#theme-page h6:hover
{
	font-weight:{$helpme_settings['heading-font']['font-weight']};
	color:{$helpme_settings['accent-color']};
}
.blog-tile-entry .blog-entry-heading .blog-title a,
.blog-title a{
	color:{$helpme_settings['heading-color']};
}

.blog-tile-entry .blog-entry-heading .blog-title a:hover,
.blog-title a:hover{
	color:{$helpme_settings['accent-color']};
}
.blog-readmore-btn a
{
	color:{$helpme_settings['link-color']['regular']};
	border-color:{$helpme_settings['link-color']['regular']};
}
.blog-readmore-btn a:hover
{
	color:#fff;
	border-color:{$helpme_settings['accent-color']};
	background:{$helpme_settings['accent-color']};
}
.woocommerce-page ul.products.classic-style li.product a,
.woocommerce ul.products.classic-style li.product a
 {
	color:{$helpme_settings['heading-color']};
	
}
.woocommerce-page ul.products.classic-style li.product a:hover,
.woocommerce ul.products.classic-style li.product a:hover,
.woocommerce-page ul.products li.product .price ins,
.woocommerce ul.products li.product .price ins,
.woocommerce-page ul.products.classic-style li.product .add_to_cart_button:hover i,
.woocommerce ul.products.classic-style li.product .add_to_cart_button:hover i,
.woocommerce-page ul.products.classic-style li.product .helpme-love-this:hover,
.woocommerce ul.products.classic-style li.product .helpme-love-this:hover,
.woocommerce-page ul.products.classic-style li.product .helpme-love-this.item-loved,
.woocommerce ul.products.classic-style li.product .helpme-love-this.item-loved { 
	
	color:{$helpme_settings['accent-color']};
	
}
.woocommerce-page nav.woocommerce-pagination ul li a, .woocommerce nav.woocommerce-pagination ul li a, .woocommerce-page #content nav.woocommerce-pagination ul li a, .woocommerce #content nav.woocommerce-pagination ul li a, .woocommerce-page nav.woocommerce-pagination ul li span, .woocommerce nav.woocommerce-pagination ul li span, .woocommerce-page #content nav.woocommerce-pagination ul li span, .woocommerce #content nav.woocommerce-pagination ul li span {
    border-color:{$helpme_settings['accent-color']} !important;
	color:{$helpme_settings['accent-color']} !important;
}
.woocommerce-page nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce-page #content nav.woocommerce-pagination ul li a:hover,
.woocommerce #content nav.woocommerce-pagination ul li a:hover,
.woocommerce-page nav.woocommerce-pagination ul li span:hover,
.woocommerce nav.woocommerce-pagination ul li span:hover,
.woocommerce-page #content nav.woocommerce-pagination ul li span:hover,
.woocommerce #content nav.woocommerce-pagination ul li span:hover {
  background-color:{$helpme_settings['accent-color']} !important;
  color:#fff !important;
  
}
.woocommerce-page nav.woocommerce-pagination ul li span.current,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce-page #content nav.woocommerce-pagination ul li span.current,
.woocommerce #content nav.woocommerce-pagination ul li span.current {
  background-color:{$helpme_settings['accent-color']} !important;
  color:#fff !important;
}
.progress div.progress-bar,
.progress div.progress-bar.bar{ 
	
	background-color:{$helpme_settings['accent-color']} !important;
	
}
.event-right-content .event-title a{
	color:{$helpme_settings['heading-color']};
	
}
.event-right-content .event-title a:hover,
.helpme-event-wrap.thumb-style .event-right-content .event-vanue-meta i{
	color:{$helpme_settings['accent-color']};
	
}
.event-left-content{
	background:{$helpme_settings['accent-color']};
	}
	
.countdown_style_one .upcoming-event-wrap a,
.countdown_style_one .upcoming-event-wrap a:hover,
.countdown_style_three .upcoming-event-wrap a,
.countdown_style_three .upcoming-event-wrap a:hover,
.countdown_style_five .upcoming-event-wrap a,
.countdown_style_five .upcoming-event-wrap a:hover{
	background:{$helpme_settings['accent-color']};
}
.countdown_style_five ul li .countdown-timer{
	color:{$helpme_settings['heading-color']} !important;
	
}
.owl-nav .owl-prev, .owl-nav .owl-next{
	color:{$helpme_settings['accent-color']};
	
	}
.owl-nav .owl-prev:hover, .owl-nav .owl-next:hover{
	background:{$helpme_settings['accent-color']};
	
	}

.countdown_style_five ul li .countdown-text{
	color:{$helpme_settings['body-txt-color']} !important;
	
}
.helpme-portfolio-item .portfolio-permalink:hover,
.helpme-portfolio-item .portfolio-plus-icon:hover {
	background-color:{$helpme_settings['accent-color']};
	border-color:{$helpme_settings['accent-color']};
	
}
.single-social-share li a:hover,
.helpme-next-prev .helpme-next-prev-wrap a:hover {
  background: {$helpme_settings['accent-color']};
    color: #fff;
}

h1, h2, h3, h4, h5, h6
{
{$heading_font_family}}


input,
button,
textarea {
{$body_font_family}}

";

###########################################
# Main Navigation
###########################################

	$nav_text_align = (isset($helpme_settings['nav-alignment']) && !empty($helpme_settings['nav-alignment'])) ? ('text-align:' . $helpme_settings['nav-alignment'] . ';') : ('text-align:left;');

	$main_nav_font_family = (isset($helpme_settings['main-nav-font']['font-family']) && !empty($helpme_settings['main-nav-font']['font-family'])) ? ('font-family:' . $helpme_settings['main-nav-font']['font-family'] . ';') : '';

	if($helpme_settings['header-structure'] == 'vertical'){
		$main_nav_top_level_space = (isset($helpme_settings['main-nav-item-space']) && !empty($helpme_settings['main-nav-item-space']) && isset($helpme_settings['vertical-nav-item-space']) && !empty($helpme_settings['vertical-nav-item-space'])) ? ('padding:'. $helpme_settings['vertical-nav-item-space'] . 'px ' . $helpme_settings['main-nav-item-space'] . 'px;') : ('padding: 9px 15px;');
		$plus_for_submenu = $helpme_settings['main-nav-item-space'] + 10;
		$main_nav_top_level_space_lr = (isset($helpme_settings['main-nav-item-space'])) && !empty($helpme_settings['main-nav-item-space']) ? ('padding: 0 '.$plus_for_submenu .'px ;') : ('padding: 0 15px;');

		$main_nav_top_level_space_bt = isset($helpme_settings['vertical-nav-item-space']) && !empty($helpme_settings['vertical-nav-item-space']) ? ('padding:'. $helpme_settings['vertical-nav-item-space'] . 'px 0;') : ('padding: 9px 0;');

		
	}else{
		$main_nav_top_level_space = (isset($helpme_settings['main-nav-item-space'])) && !empty($helpme_settings['main-nav-item-space']) ? ('padding: 0 ' . $helpme_settings['main-nav-item-space'] . 'px;') : ('padding: auto 17px;');
	}
	

	$main_nav_top_level_font_size = 'font-size:' . $helpme_settings['main-nav-font']['font-size'] . ';';

	$main_nav_top_level_font_transform = (isset($helpme_settings['main-nav-top-transform']) && !empty($helpme_settings['main-nav-top-transform'])) ? ('text-transform: ' . $helpme_settings['main-nav-top-transform'] . ';') : ('text-transform: uppercase;');

	$main_nav_top_level_font_weight = 'font-weight:' . $helpme_settings['main-nav-font']['font-weight'] . ';';

	$main_nav_sub_level_font_size = (isset($helpme_settings['sub-nav-top-size']) && !empty($helpme_settings['sub-nav-top-size'])) ? ('font-size:' . $helpme_settings['sub-nav-top-size'] . 'px;') : ('font-size:' . $helpme_settings['main-nav-font']['font-size'] . 'px;');

	$main_nav_sub_level_font_transform = (isset($helpme_settings['sub-nav-top-transform']) && !empty($helpme_settings['sub-nav-top-transform'])) ? ('text-transform: ' . $helpme_settings['sub-nav-top-transform'] . ';') : ('text-transform: uppercase;');
	
	$main_nav_sub_level_font_weight = (isset($helpme_settings['sub-nav-top-weight']) && !empty($helpme_settings['sub-nav-top-weight'])) ? ('font-weight:' . $helpme_settings['sub-nav-top-weight'] . ';') : ('font-weight:' . $helpme_settings['main-nav-font']['font-weight'] . ';');

	$logo_height = (!empty($helpme_settings['logo']['height'])) ? $helpme_settings['logo']['height'] : 50;
	$header_height = $logo_height+($helpme_settings['header-padding'] * 2);
	if (isset($helpme_settings['squeeze-sticky-header']) && ($helpme_settings['squeeze-sticky-header'])) {
		$sticky_logo_height = round($logo_height / 1.2);
		$sticky_header_padding = round($helpme_settings['header-padding'] / 2);
		$header_sticky_height = round($logo_height / 1.2 +(($helpme_settings['header-padding'] / 2) * 2));
	} else {
		$sticky_logo_height = $logo_height;
		$sticky_header_padding = $helpme_settings['header-padding'];
		$header_sticky_height = round($logo_height+(($helpme_settings['header-padding']) * 1));
	}

	$header_vertical_width = (isset($helpme_settings['header-vertical-width']) && !empty($helpme_settings['header-vertical-width'])) ? $helpme_settings['header-vertical-width'] : ('280');
	$header_vertical_padding = (isset($helpme_settings['header-padding-vertical']) && !empty($helpme_settings['header-padding-vertical'])) ? $helpme_settings['header-padding-vertical'] : ('30'); 

	$vertical_nav_width = $header_vertical_width - ($header_vertical_padding * 2);

	# Header Toolbar
	if($helpme_settings['header-toolbar'] == 1){
		$header_height_with_toolbar = $logo_height+($helpme_settings['header-padding'] * 2) + 35;
	}else{
		$header_height_with_toolbar = $logo_height+($helpme_settings['header-padding'] * 2);
	}
	$toolbar_border = isset($helpme_settings['toolbar-border-top']) && ($helpme_settings['toolbar-border-top'] == 1) ? '' : 'border:none;';

	$output .= "


.header-searchform-input input[type=text]{
	background-color:{$helpme_settings['header-bg']['color']};
}

.theme-main-wrapper:not(.vertical-header) .sticky-header.sticky-header-padding {
	padding-top:50px;{//$header_height_with_toolbar}
}

.bottom-header-padding.none-sticky-header {
	padding-top:{$header_height}px;	
}

.bottom-header-padding.none-sticky-header {
	padding-top:{$header_height}px;	
}

.bottom-header-padding.sticky-header {
	padding-top:{$header_sticky_height}px;	
}


#helpme-header:not(.header-structure-vertical) #helpme-main-navigation > ul > li.menu-item,
#helpme-header:not(.header-structure-vertical) #helpme-main-navigation > ul > li.menu-item > a,
#helpme-header:not(.header-structure-vertical) .helpme-header-search,
#helpme-header:not(.header-structure-vertical) .helpme-header-search a,
#helpme-header:not(.header-structure-vertical) .helpme-header-wpml-ls,
#helpme-header:not(.header-structure-vertical) .helpme-header-wpml-ls a,
#helpme-header:not(.header-structure-vertical) .helpme-cart-link,
#helpme-header:not(.header-structure-vertical) .helpme-responsive-cart-link,
#helpme-header:not(.header-structure-vertical) .dashboard-trigger,
#helpme-header:not(.header-structure-vertical) .responsive-nav-link,
#helpme-header:not(.header-structure-vertical) .helpme-header-social a,
#helpme-header:not(.header-structure-vertical) .helpme-margin-header-burger
{
	height:{$header_height}px;
	line-height:{$header_height}px;
}

#helpme-header:not(.header-structure-vertical).sticky-trigger-header #helpme-main-navigation > ul > li.menu-item,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header #helpme-main-navigation > ul > li.menu-item > a,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-header-search,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-header-search a,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-cart-link,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-responsive-cart-link,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .dashboard-trigger,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .responsive-nav-link,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-header-social a,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-margin-header-burger,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-header-wpml-ls,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-header-wpml-ls a
{
	height:{$header_sticky_height}px;
	line-height:{$header_sticky_height}px;
}";

	if (isset($helpme_settings['squeeze-sticky-header']) && ($helpme_settings['squeeze-sticky-header'])) {
		$output .= "
	#helpme-header:not(.header-structure-vertical).sticky-trigger-header #helpme-main-navigation > ul > li.menu-item > a {
		padding-left:15px;
		padding-right:15px;
	}
	";
	}

	$output .= ".helpme-header-logo,
.helpme-header-logo a{
	height:{$logo_height}px;
	line-height:{$logo_height}px;
}

#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-header-logo,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-header-logo a{
	height:{$sticky_logo_height}px;
	line-height:{$sticky_logo_height}px;
}

.vertical-expanded-state #helpme-header.header-structure-vertical,
.vertical-condensed-state  #helpme-header.header-structure-vertical:hover{
	width: {$header_vertical_width}px !important;
}

#helpme-header.header-structure-vertical{
	padding-left: {$header_vertical_padding}px !important;
	padding-right: {$header_vertical_padding}px !important;
}

.vertical-condensed-state .helpme-vertical-menu {
  width:{$vertical_nav_width}px;
}


.theme-main-wrapper.vertical-expanded-state #theme-page > .helpme-main-wrapper-holder,
.theme-main-wrapper.vertical-expanded-state #theme-page > .helpme-page-section,
.theme-main-wrapper.vertical-expanded-state #theme-page > .wpb_row,
.theme-main-wrapper.vertical-expanded-state #helpme-page-title,
.theme-main-wrapper.vertical-expanded-state #helpme-footer {
	padding-left: {$header_vertical_width}px;
}

@media handheld, only screen and (max-width:{$helpme_settings['res-nav-width']}px) {
	.theme-main-wrapper.vertical-expanded-state #theme-page > .helpme-main-wrapper-holder,
	.theme-main-wrapper.vertical-expanded-state #theme-page > .helpme-page-section,
	.theme-main-wrapper.vertical-expanded-state #theme-page > .wpb_row,
	.theme-main-wrapper.vertical-expanded-state #helpme-page-title,
	.theme-main-wrapper.vertical-expanded-state #helpme-footer,
	.theme-main-wrapper.vertical-condensed-state #theme-page > .helpme-main-wrapper-holder,
	.theme-main-wrapper.vertical-condensed-state #theme-page > .helpme-page-section,
	.theme-main-wrapper.vertical-condensed-state #theme-page > .wpb_row,
	.theme-main-wrapper.vertical-condensed-state #helpme-page-title,
	.theme-main-wrapper.vertical-condensed-state #helpme-footer {
		padding-left: 0px;
	}
}

.theme-main-wrapper.vertical-header #helpme-page-title,
.theme-main-wrapper.vertical-header #helpme-footer,
.theme-main-wrapper.vertical-header #helpme-header,
.theme-main-wrapper.vertical-header #helpme-header.header-structure-vertical .helpme-vertical-menu{
	box-sizing: border-box;
}


@media handheld, only screen and (min-width:{$helpme_settings['res-nav-width']}px) {
	.vertical-condensed-state #helpme-header.header-structure-vertical:hover ~ #theme-page > .helpme-main-wrapper-holder,
	.vertical-condensed-state #helpme-header.header-structure-vertical:hover ~ #theme-page > .helpme-page-section,
	.vertical-condensed-state #helpme-header.header-structure-vertical:hover ~ #theme-page > .wpb_row,
	.vertical-condensed-state #helpme-header.header-structure-vertical:hover ~ #helpme-page-title,
	.vertical-condensed-state #helpme-header.header-structure-vertical:hover ~ #helpme-footer {
		padding-left: {$header_vertical_width}px ;
	}
}

.helpme-header-logo,
.helpme-header-logo a
 {
	margin-top: {$helpme_settings['header-padding']}px;
	margin-bottom: {$helpme_settings['header-padding']}px;
}


#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-header-logo,
#helpme-header:not(.header-structure-vertical).sticky-trigger-header .helpme-header-logo a
{
	margin-top:{$sticky_header_padding}px;
	margin-bottom: {$sticky_header_padding}px;
}


#helpme-main-navigation > ul > li.menu-item > a {
	{$main_nav_top_level_space}
	{$main_nav_font_family}
	{$main_nav_top_level_font_size}
	{$main_nav_top_level_font_transform}
	{$main_nav_top_level_font_weight}
}

.helpme-header-logo.helpme-header-logo-center {
	{$main_nav_top_level_space}
}

.helpme-vertical-menu > li.menu-item > a {
	{$main_nav_top_level_space}
	{$main_nav_font_family}
	{$main_nav_top_level_font_size}
	{$main_nav_top_level_font_transform}
	{$main_nav_top_level_font_weight}
}
";

	if ($helpme_settings['header-structure'] == 'vertical') {
		$output .= "
	.header-structure-vertical .helpme-vertical-menu > .menu-item > .sub-menu {
		{$main_nav_top_level_space_lr}
	}
	";
	}

	$output .= "


.helpme-vertical-menu li.menu-item > a,
.helpme-vertical-menu .helpme-header-logo {
	{$nav_text_align} 
}

.main-navigation-ul > li ul.sub-menu li.menu-item a.menu-item-link{
	{$main_nav_sub_level_font_size}
	{$main_nav_sub_level_font_transform}
	{$main_nav_sub_level_font_weight}
}

.helpme-vertical-menu > li ul.sub-menu li.menu-item a{
	{$main_nav_sub_level_font_size}
	{$main_nav_sub_level_font_transform}
	{$main_nav_sub_level_font_weight}
}

#helpme-main-navigation > ul > li.menu-item > a,
.helpme-vertical-menu li.menu-item > a
{
	color:{$helpme_settings['main-nav-top-color']['regular']};
	background-color:{$helpme_settings['main-nav-top-color']['bg']};
}

#helpme-main-navigation > ul > li.current-menu-item > a,
#helpme-main-navigation > ul > li.current-menu-ancestor > a,
#helpme-main-navigation > ul > li.menu-item:hover > a
{
	color:{$helpme_settings['main-nav-top-color']['hover']};
	background-color:{$helpme_settings['main-nav-top-color']['bg-hover']};
}

.helpme-vertical-menu > li.current-menu-item > a,
.helpme-vertical-menu > li.current-menu-ancestor > a,
.helpme-vertical-menu > li.menu-item:hover > a,
.helpme-vertical-menu ul li.menu-item:hover > a {
	color:{$helpme_settings['main-nav-top-color']['hover']};
}



#helpme-main-navigation > ul > li.menu-item > a:hover
{
	color:{$helpme_settings['main-nav-top-color']['hover']};
	background-color:{$helpme_settings['main-nav-top-color']['bg-hover']};
}

.dashboard-trigger,
.res-nav-active,
.helpme-header-social a,
.helpme-responsive-cart-link {
	color:{$helpme_settings['main-nav-top-color']['regular']};
}

.dashboard-trigger:hover,
.res-nav-active:hover {
	color:{$helpme_settings['main-nav-top-color']['hover']};
}";

if (isset($helpme_settings['navigation-border-top']) && ($helpme_settings['navigation-border-top'] == 1)) {
		$output .= "
		#helpme-main-navigation ul li.no-mega-menu > ul,
		#helpme-main-navigation ul li.has-mega-menu > ul,
		#helpme-main-navigation ul li.helpme-header-wpml-ls > ul{
			border-top:1px solid {$accent_color};
		}";
}


$output .= "#helpme-main-navigation ul li.no-mega-menu ul,
#helpme-main-navigation > ul > li.has-mega-menu > ul,
.header-searchform-input .ui-autocomplete,
.helpme-shopping-box,
.shopping-box-header > span,
#helpme-main-navigation ul li.helpme-header-wpml-ls > ul {
	background-color:{$helpme_settings['main-nav-sub-bg']};
}

#helpme-main-navigation ul ul.sub-menu a.menu-item-link,
#helpme-main-navigation ul li.helpme-header-wpml-ls > ul li a
{
	color:{$helpme_settings['main-nav-sub-color']['regular']};
}

#helpme-main-navigation ul ul li.current-menu-item > a.menu-item-link,
#helpme-main-navigation ul ul li.current-menu-ancestor > a.menu-item-link {
	color:{$helpme_settings['main-nav-sub-color']['hover']};
	background-color:{$helpme_settings['main-nav-sub-color']['bg-active']} !important;
}


.header-searchform-input .ui-autocomplete .search-title,
.header-searchform-input .ui-autocomplete .search-date,
.header-searchform-input .ui-autocomplete i
{
	color:{$helpme_settings['main-nav-sub-color']['regular']};
}
.header-searchform-input .ui-autocomplete i,
.header-searchform-input .ui-autocomplete img
{
	border-color:{$helpme_settings['main-nav-sub-color']['regular']};
}

.header-searchform-input .ui-autocomplete li:hover  i,
.header-searchform-input .ui-autocomplete li:hover img
{
	border-color:{$helpme_settings['main-nav-sub-color']['hover']};
}


#helpme-main-navigation .megamenu-title,
.helpme-mega-icon,
.helpme-shopping-box .mini-cart-title,
.helpme-shopping-box .mini-cart-button {
	color:{$helpme_settings['main-nav-sub-color']['regular']};
}

#helpme-main-navigation ul ul.sub-menu a.menu-item-link:hover,
.header-searchform-input .ui-autocomplete li:hover,
#helpme-main-navigation ul li.helpme-header-wpml-ls > ul li a:hover
{
	color:{$helpme_settings['main-nav-sub-color']['hover']};
	background-color:{$helpme_settings['main-nav-sub-color']['bg-hover']} !important;
}

.header-searchform-input .ui-autocomplete li:hover .search-title,
.header-searchform-input .ui-autocomplete li:hover .search-date,
.header-searchform-input .ui-autocomplete li:hover i,
#helpme-main-navigation ul ul.sub-menu a.menu-item-link:hover i
{
	color:{$helpme_settings['main-nav-sub-color']['hover']};
}


.header-searchform-input input[type=text],
.dashboard-trigger,
.header-search-icon,
.header-search-close,
.header-wpml-icon
{
	color:{$helpme_settings['main-nav-top-color']['regular']};
}";

$header_search_icon_color = (isset($helpme_settings['header-search-icon-color']) && !empty($helpme_settings['header-search-icon-color'])) ? $helpme_settings['header-search-icon-color'] : $helpme_settings['main-nav-top-color']['regular'];

$output .="
.header-search-icon {
	color:{$header_search_icon_color};	
}

.helpme-burger-icon div {
      background-color:{$helpme_settings['main-nav-top-color']['regular']};
 }



.header-search-icon:hover
{
	color: {$helpme_settings['main-nav-top-color']['regular']};
}


.responsive-nav-container, .responsive-shopping-box
{
	background-color:{$helpme_settings['main-nav-sub-bg']};
}

.helpme-responsive-nav a,
.helpme-responsive-nav .has-mega-menu .megamenu-title
{
	color:{$helpme_settings['main-nav-sub-color']['regular']};
	background-color:{$helpme_settings['main-nav-sub-color']['bg']};
}

.helpme-responsive-nav li a:hover
{
	color:{$helpme_settings['main-nav-sub-color']['hover']};
	background-color:{$helpme_settings['main-nav-sub-color']['bg-hover']};
}";

$header_border_bottom_color = (isset($helpme_settings['toolbar-border-bottom-color']) && !empty($helpme_settings['toolbar-border-bottom-color'])) ? $helpme_settings['toolbar-border-bottom-color'] : 'transparent';
$header_phone_email_icon_color = (isset($helpme_settings['toolbar-phone-email-icon-color']) && !empty($helpme_settings['toolbar-phone-email-icon-color'])) ? $helpme_settings['toolbar-phone-email-icon-color'] : $helpme_settings['toolbar-text-color'];

$output .="
.helpme-header-toolbar {
	{$toolbar_border}	
	
	border-color:{$header_border_bottom_color};
}
.helpme-header-toolbar span {
	color:{$helpme_settings['toolbar-text-color']};	
}

.helpme-header-toolbar span i {
	color:{$header_phone_email_icon_color};	
}

.helpme-header-toolbar a{
	color:{$helpme_settings['toolbar-link-color']['regular']};	
}
.helpme-header-toolbar a:hover{
	color:{$helpme_settings['toolbar-link-color']['hover']};	
}

.helpme-header-toolbar a{
	color:{$helpme_settings['toolbar-link-color']['regular']};	
}
.helpme-header-toolbar .helpme-header-toolbar-social li a{
	color:{$helpme_settings['toolbar-social-link-color']['regular']};	
}
.helpme-header-toolbar .helpme-header-toolbar-social li a:hover{
	color:{$helpme_settings['toolbar-social-link-color']['hover']};	
}

";

###########################################
	# Responsive Mode
	###########################################

	$grid_width_100 = $helpme_settings['grid-width']+100;

	$output .= "

@media handheld, only screen and (max-width: {$grid_width_100}px)
{

.dashboard-trigger.res-mode {
	display:block !important;
}

.dashboard-trigger.desktop-mode {
	display:none !important;
}

}



@media handheld, only screen and (max-width: {$helpme_settings['res-nav-width']}px)
{

#helpme-header.sticky-header,
.helpme-secondary-header,
.transparent-header-sticky {
	position: relative !important;
	left:auto !important;
    right:auto!important;
    top:auto !important;
}

#helpme-header:not(.header-structure-vertical).put-header-bottom,
#helpme-header:not(.header-structure-vertical).put-header-bottom.sticky-trigger-header,
#helpme-header:not(.header-structure-vertical).put-header-bottom.header-offset-passed,
.admin-bar #helpme-header:not(.header-structure-vertical).put-header-bottom.sticky-trigger-header {
	position:relative;
	bottom:auto;
}

.helpme-margin-header-burger {
	display:none;
}

.main-navigation-ul li.menu-item,
.helpme-vertical-menu li.menu-item,
.main-navigation-ul li.sub-menu,
.sticky-header-padding,
.secondary-header-space
{
	display:none !important;
}

.vertical-expanded-state #helpme-header.header-structure-vertical, .vertical-condensed-state #helpme-header.header-structure-vertical{
	width: 100% !important;
	height: auto !important;
}
.vertical-condensed-state  #helpme-header.header-structure-vertical:hover {
	width: 100% !important;
}
.header-structure-vertical .helpme-vertical-menu{
	position:relative;
	padding:0;
	width: 100%;
}
.header-structure-vertical .helpme-header-social.inside-grid{
	position:relative;
	padding:0;
	width: auto;
	bottom: inherit !important;
	height:{$header_height}px;
	line-height:{$header_height}px;
	float:right !important;
	top: 0 !important;
}
/*
.helpme-header-logo, .helpme-header-logo a {
	height:80px;
	line-height:80px;
}
#menu-main-navigation .helpme-header-logo {
	margin-bottom:20px;
	
}
.helpme-vertical-menu .responsive-nav-link {
	height:120px !important;
}
.helpme-vertical-header-burger {
	display:none!important;
}

.header-structure-vertical .helpme-header-social.inside-grid {
	height:120px;
	line-height:120px;
}
*/

.vertical-condensed-state .header-structure-vertical .helpme-vertical-menu>li.helpme-header-logo {
	-webkit-transform: translate(0,0);
	-moz-transform: translate(0,0);
	-ms-transform: translate(0,0);
	-o-transform: translate(0,0);
	opacity: 1!important;
	position: relative!important;
	left: 0!important;
}
.vertical-condensed-state .header-structure-vertical .helpme-vertical-header-burger{
	opacity:0 !important;
}


.helpme-header-logo {
	padding:0 !important;
}

.helpme-vertical-menu .responsive-nav-link{
	float:left !important;
	height:{$header_height}px;
}
.helpme-vertical-menu .responsive-nav-link i{
	height:{$header_height}px;
	line-height:{$header_height}px;
}
.helpme-vertical-menu .helpme-header-logo {
	float:left !important
}


.header-search-icon i,
.helpme-cart-link i,
.helpme-responsive-cart-link i
{
	padding:0 !important;
	margin:0 !important;
	border:none !important;
}

.header-search-icon,
.helpme-cart-link,
.helpme-responsive-cart-link
{
	margin:0 8px !important;
	padding:0 !important;
}


.helpme-header-logo
{

	margin-left:20px !important;
	display:inline-block !important;
}


.main-navigation-ul
{
	text-align:center !important;
}

.responsive-nav-link {
	display:inline-block !important;
}

.helpme-shopping-box {
	display:none !important;
}
.helpme-shopping-cart{
	display:none !important;
}
.helpme-responsive-shopping-cart{
	display: inline-block !important;
}

}


#helpme-header.transparent-header {
  position: absolute;
  left: 0;
}

.helpme-boxed-enabled #helpme-header.transparent-header {
  left: inherit;
}

.add-corner-margin .helpme-boxed-enabled #helpme-header.transparent-header {
  left: 0;
}

.transparent-header {
  transition: all 0.3s ease-in-out;
  -webkit-transition: all 0.3s ease-in-out;
  -moz-transition: all 0.3s ease-in-out;
  -ms-transition: all 0.3s ease-in-out;
  -o-transition: all 0.3s ease-in-out;
}

.transparent-header.transparent-header-sticky {
  opacity: 1;
  left: auto !important;
}
.transparent-header #helpme-main-navigation ul li .sub {
  border-top: none;
}
.transparent-header .helpme-cart-link:hover,
.transparent-header .helpme-responsive-cart-link:hover,
.transparent-header .dashboard-trigger:hover,
.transparent-header .res-nav-active:hover,
.transparent-header .header-search-icon:hover {
  opacity: 0.7;
}
.transparent-header .header-searchform-input input[type=text] {
  background-color: transparent;
}
.transparent-header.light-header-skin .dashboard-trigger,
.transparent-header.light-header-skin .dashboard-trigger:hover,
.transparent-header.light-header-skin .res-nav-active,
.transparent-header.light-header-skin #helpme-main-navigation > ul > li.menu-item > a,
.transparent-header.light-header-skin #helpme-main-navigation > ul > li.current-menu-item > a,
.transparent-header.light-header-skin #helpme-main-navigation > ul > li.current-menu-ancestor > a,
.transparent-header.light-header-skin #helpme-main-navigation > ul > li.menu-item:hover > a,
.transparent-header.light-header-skin #helpme-main-navigation > ul > li.menu-item > a:hover,
.transparent-header.light-header-skin .res-nav-active:hover,
.transparent-header.light-header-skin .header-searchform-input input[type=text],
.transparent-header.light-header-skin .header-search-icon,
.transparent-header.light-header-skin .header-search-close,
.transparent-header.light-header-skin .header-search-icon:hover,
.transparent-header.light-header-skin .helpme-cart-link,
.transparent-header.light-header-skin .helpme-responsive-cart-link,
.transparent-header.light-header-skin .helpme-header-social a,
.transparent-header.light-header-skin .helpme-header-wpml-ls a{
  color: #fff !important;
}
.transparent-header.light-header-skin .helpme-burger-icon div {
  background-color: #fff;
}
.transparent-header.light-header-skin .helpme-light-logo {
  display: inline-block !important;
}
.transparent-header.light-header-skin .helpme-dark-logo {
  
}
.transparent-header.light-header-skin.transparent-header-sticky .helpme-light-logo {
  display: none !important;
}
.transparent-header.light-header-skin.transparent-header-sticky .helpme-dark-logo {
  display: inline-block !important;
}
.transparent-header.dark-header-skin .dashboard-trigger,
.transparent-header.dark-header-skin .dashboard-trigger:hover,
.transparent-header.dark-header-skin .res-nav-active,
.transparent-header.dark-header-skin #helpme-main-navigation > ul > li.menu-item > a,
.transparent-header.dark-header-skin #helpme-main-navigation > ul > li.current-menu-item > a,
.transparent-header.dark-header-skin #helpme-main-navigation > ul > li.current-menu-ancestor > a,
.transparent-header.dark-header-skin #helpme-main-navigation > ul > li.menu-item:hover > a,
.transparent-header.dark-header-skin #helpme-main-navigation > ul > li.menu-item > a:hover,
.transparent-header.dark-header-skin .res-nav-active:hover,
.transparent-header.dark-header-skin .header-searchform-input input[type=text],
.transparent-header.dark-header-skin .header-search-icon,
.transparent-header.dark-header-skin .header-search-close,
.transparent-header.dark-header-skin .header-search-icon:hover,
.transparent-header.dark-header-skin .helpme-cart-link,
.transparent-header.dark-header-skin .helpme-responsive-cart-link,
.transparent-header.dark-header-skin .helpme-header-social a,
.transparent-header.dark-header-skin .helpme-header-wpml-ls a {
  
}
.transparent-header.dark-header-skin .helpme-burger-icon div {
  
}



";

	###########################################
	# Accent Color
	###########################################


	$output .= "
.helpme-skin-color,
.blog-categories a:hover,
.blog-categories,
.rating-star .rated,
.widget_testimonials .testimonial-position,

.portfolio-similar-meta .cats,
.entry-meta .cats a,
.search-meta span a,
.search-meta span,
.single-share-trigger:hover,
.single-share-trigger.helpme-toggle-active,
.project_content_section .project_cats a,
.helpme-love-holder i:hover,
.blog-comments i:hover,
.comment-count i:hover,
.widget_posts_lists li .cats a,
.helpme-causee-networks li a:hover,
.helpme-tweet-shortcode span a,
.classic-hover .portfolio-permalink:hover i,
.helpme-pricing-table .helpme-icon-star,
.helpme-process-steps.dark-skin .step-icon,
.helpme-sharp-next,
.helpme-sharp-prev,
.prev-item-caption,
.next-item-caption,
.helpme-employees.column_rounded-style .team-member-position, 
.helpme-employees.column-style .team-member-position,
.helpme-causes.column_rounded-style .team-member-position, 
.helpme-employees .team-info-wrapper .team-member-position,
.helpme-causes.column-style .team-member-position,
.helpme-event-countdown.accent-skin .countdown-timer,
.helpme-event-countdown.accent-skin .countdown-text,
.helpme-box-text:hover i,
.helpme-process-steps.light-skin .helpme-step:hover .step-icon,
.helpme-process-steps.light-skin .active-step-item .step-icon,

.woocommerce-thanks-text
{
	color: {$accent_color};
}
.blog-thumb-entry .blog-thumb-content .blog-thumb-content-inner a.blog-readmore{
	background: {$accent_color} ;
	color:#fff;
}
.blog-thumb-entry .blog-thumb-content .blog-thumb-content-inner a.blog-readmore:hover{
	background: {$accent_color} ;
	color:#fff;
	opacity:0.9;
}
.helpme-employeee-networks li a:hover {
	background: {$accent_color} ;
	border-color: {$accent_color} !important;
	
}
.helpme-testimonial.creative-style .slide{
	
	border-color: {$accent_color} !important;
}
.helpme-testimonial.boxed-style .testimonial-content{
	border-bottom:2px solid {$accent_color} !important;
	
}
.helpme-testimonial.modern-style .slide{
	border-top:2px solid {$accent_color} !important;
	
}
.helpme-testimonial.modern-style .slide .author-details .testimonial-position,
.helpme-testimonial.modern-style .slide .author-details .testimonial-company{
	color: {$accent_color} !important;
	
}
.helpme-love-holder .item-loved i,
.widget_posts_lists .cats a,
#helpme-breadcrumbs a:hover,
.widget_social_networks a.light,
.widget_posts_tabs .cats a {
	color: {$accent_color} !important;
}

a:hover,
.helpme-tweet-shortcode span a:hover {
	color:{$helpme_settings['link-color']['hover']};
}



/* Main Skin Color : Background-color Property */
#wp-calendar td#today,
div.jp-play-bar,
.helpme-header-button:hover,
.next-prev-top .go-to-top:hover,
.wide-eye-portfolio-item .portfolio-meta .the-title,
.helpme-portfolio-carousel .portfolio-meta:before,
.meta-image.frame-grid-portfolio-item .portfolio-meta .the-title,
.masonry-border,
.author-social li a:hover,
.slideshow-swiper-arrows:hover,
.helpme-clients-shortcode .clients-info,
.helpme-contact-form-wrapper .helpme-form-row i.input-focused,
.helpme-login-form .form-row i.input-focused,
.comment-form-row i.input-focused,
.widget_social_networks a:hover,
.helpme-social-network a:hover,
.blog-masonry-entry .post-type-icon:hover,
.list-posttype-col .post-type-icon:hover,
.single-type-icon,
.demo_store,
.add_to_cart_button:hover,
.helpme-process-steps.dark-skin .helpme-step:hover .step-icon,
.helpme-process-steps.dark-skin .active-step-item .step-icon,
.helpme-process-steps.light-skin .step-icon,
.helpme-social-network a.light:hover,
.widget_tag_cloud a:hover,
.widget_categories a:hover,
.sharp-nav-bg,
.gform_wrapper .button:hover,
.helpme-event-countdown.accent-skin li:before,
.masonry-border,
.helpme-gallery.thumb-style .gallery-thumb-lightbox:hover,
.fancybox-close:hover,
.fancybox-nav span:hover,
.blog-scroller-arrows:hover,
ul.user-login li a i,
.helpme-isotop-filter ul li a.current,
.helpme-isotop-filter ul li a:hover
{
	border-color: {$accent_color};
	color: {$accent_color};
}




::-webkit-selection
{
	background-color: {$accent_color};
	color:#fff;
}

::-moz-selection
{
	background-color: {$accent_color};
	color:#fff;
}

::selection
{
	background-color: {$accent_color};
	color:#fff;
}

.next-prev-top .go-to-top,
.helpme-contact-form-wrapper .text-input:focus, .helpme-contact-form-wrapper .helpme-textarea:focus,
.widget .helpme-contact-form-wrapper .text-input:focus, .widget .helpme-contact-form-wrapper .helpme-textarea:focus,
.helpme-contact-form-wrapper .helpme-form-row i.input-focused,
.comment-form-row .text-input:focus, .comment-textarea textarea:focus,
.comment-form-row i.input-focused,
.helpme-login-form .form-row i.input-focused,
.helpme-login-form .form-row input:focus,
.helpme-event-countdown.accent-skin li
{
	border-color: {$accent_color}!important;
}

";

if (isset($helpme_settings['sub-footer-border-top']) && ($helpme_settings['sub-footer-border-top'] == 1)) {
	$output .= "
	#sub-footer{
		border-top:1px solid {$accent_color};
	}";
}

###########################################
# MISC
###########################################

	$output .= "

.helpme-divider .divider-inner i
{
	background-color: {$helpme_settings['page-bg']['color']};
}

.helpme-loader
{
	border: 2px solid {$accent_color};
}
.progress-bar.bar .bar-tip {
	color:{$accent_color};
	
}
.custom-color-heading{
	color:{$accent_color};
	
}

.alt-title span,
.single-post-fancy-title span,
.portfolio-social-share,
.woocommerce-share ul
{
	
}

.helpme-box-icon .helpme-button-btn a.helpme-button:hover {
	background-color:{$accent_color};
	border-color:{$accent_color};
}


.helpme-commentlist li .comment-author, 
.ls-btn1:hover{
	color:{$accent_color} !important;
}
.helpme-commentlist li .comment-reply a:hover{
	background-color:{$accent_color} !important;
}
.cause-title a,
.cause-title a:hover{
	color:{$helpme_settings['heading-color']};
	}
button.miglacheckout {
    background-color:{$accent_color} !important;
}
button.miglacheckout:hover {
    background-color:{$accent_color} !important;
	opacity:0.9;
}
.migla-panel-heading h2:hover {
    color:{$helpme_settings['heading-color']};
}
.cause-campaign form button.migla_donate_now.mg-btn-grey,
.cause-readmore a {
	border-color:{$helpme_settings['link-color']['regular']} !important;
	color:{$helpme_settings['link-color']['regular']} !important;
}
.cause-campaign form button.migla_donate_now.mg-btn-grey:hover,
.cause-readmore a:hover {
	background:{$accent_color} !important;
	background-color:{$accent_color} !important;
	border-color:{$accent_color} !important;
	color:#fff !important;
	box-shadow:none !important;
}
.helpme-pagination .current-page,
.helpme-pagination .page-number:hover,
.helpme-pagination .current-page:hover {
    background-color:{$accent_color} !important;
	border-color:{$accent_color} !important;
	color:#fff !important;
}
.helpme-pagination .page-number,
.helpme-pagination .current-page {
  color:{$accent_color};
  border-color:{$accent_color};
}
.helpme-pagination .helpme-pagination-next a,
.helpme-pagination .helpme-pagination-previous a {
  color:{$accent_color};
  border-color:{$accent_color};
}
.helpme-pagination .helpme-pagination-next:hover a,
.helpme-pagination .helpme-pagination-previous:hover a {
  background-color:{$accent_color} !important;
	border-color:{$accent_color} !important;
	color:#fff !important;
}
.helpme-loadmore-button:hover {
  background-color:{$accent_color} !important;
	color:#fff !important;
}
.helpme-searchform .helpme-icon-search:hover {
  background-color:{$accent_color} !important;
  color:#fff;
}

";
$post_id = global_get_post_id();
$layout_template = $post_id ? get_post_meta($post_id, '_template', true ) : '';
if($post_id && $layout_template = 'pagetitle-on') {
	$output .= " 
	body.page .theme-page-wrapper .theme-content{
    padding-top:70px;
	
}
body.page #theme-page .theme-page-wrapper .theme-content.no-padding {
    padding-top: 70px;
}
	
	";
}
###########################################
# BREADCRUMB CUSTOM SKIN STYLES
###########################################

$breadcrumb_skin = (isset($helpme_settings['breadcrumb-skin']) && !empty($helpme_settings['breadcrumb-skin']) && $helpme_settings['breadcrumb-skin'] == 'custom' ) ? 1 : 0;
$breadcrumb_custom_color_regular = (isset($helpme_settings['breadcrumb-skin-custom']['regular']) && !empty($helpme_settings['breadcrumb-skin-custom']['regular']) ) ? $helpme_settings['breadcrumb-skin-custom']['regular'] : $custom_breadcrumb_color ;
$breadcrumb_custom_color_hover = (isset($helpme_settings['breadcrumb-skin-custom']['hover']) && !empty($helpme_settings['breadcrumb-skin-custom']['hover']) ) ? $helpme_settings['breadcrumb-skin-custom']['hover'] : $custom_breadcrumb_hover_color ;

if($breadcrumb_skin == 1){

	if($custom_breadcrumb_page == 1){
		
		$output .= " #helpme-breadcrumbs .custom-skin{
			color: {$breadcrumb_custom_color_regular} !important;
		}
		#helpme-breadcrumbs .custom-skin a{
			color: {$breadcrumb_custom_color_regular} !important;
		}
		#helpme-breadcrumbs .custom-skin a:hover{
			color: {$breadcrumb_custom_color_hover} !important;
		}

		";
	}

}



###########################################star-rating
	# WOOCOMMERCE DYNAMIC STYLES
	###########################################
	if (class_exists('woocommerce')) {

		$accent_color_90 = helpme_convert_rgba($accent_color, 0.9);

		$output .= "



.woocommerce-page .quantity .plus,
.woocommerce-page .quantity .minus,
.product_meta a,
.sku_wrapper span,
.order-total,

.mini-cart-remove,
.add_to_cart_button .helpme-icon-plus,
.add_to_cart_button .helpme-theme-icon-magnifier
{
	color: {$accent_color};
}

.helpme-checkout-payement h3,
.woocommerce-message .button:hover,
.woocommerce-error .button:hover,
.woocommerce-info .button:hover,
.woocommerce.widget_shopping_cart .amount,
.widget_product_categories .current-cat,
.widget_product_categories li a:hover
 {
	color: {$accent_color} !important;
}

.add_to_cart_button:hover,
.woocommerce-page ul.products li.product .add_to_cart_button:hover,
.widget_price_filter .ui-slider .ui-slider-range,

.mini-cart-button:hover,
.widget_product_tag_cloud a:hover,
.product-single-lightbox:hover,
.woocommerce-page span.onfeatured,
.woocommerce .onfeatured{
	background-color: {$accent_color} !important;
}

.product-loading-icon {
	background-color:{$accent_color_90};
}

.helpme-cart-link {
	color:{$helpme_settings['main-nav-top-color']['regular']};
}
.helpme-cart-link:hover {
	color:{$helpme_settings['main-nav-top-color']['hover']};
}

.mini-cart-remove,
.mini-cart-button {
	border-color: {$accent_color};
}
.quantity-number(color:#fff;)
.helpme-dynamic-styles {display:none}
.mini-cart-price .amount,
.mini-cart-remove:hover {
  color: {$accent_color};
}
.woocommerce-page .quantity .plus,
.woocommerce .quantity .plus,
.woocommerce-page #content .quantity .plus,
.woocommerce #content .quantity .plus,
.woocommerce-page .quantity .minus,
.woocommerce .quantity .minus,
.woocommerce-page #content .quantity .minus,
.woocommerce #content .quantity .minus,
.woocommerce-page .quantity input.qty,
.woocommerce .quantity input.qty,
.woocommerce-page #content .quantity input.qty,
.woocommerce #content .quantity input.qty,
.woocommerce-page a.button.alt,
.woocommerce a.button.alt,
.woocommerce-page button.button.alt,
.woocommerce button.button.alt,
.woocommerce-page input.button.alt,
.woocommerce input.button.alt,
.woocommerce-page #respond input#submit.alt,
.woocommerce #respond input#submit.alt,
.woocommerce-page #content input.button.alt,
.woocommerce #content input.button.alt,
.woocommerce-page .single_add_to_cart_button i,
.woocommerce .single_add_to_cart_button i,
.woocommerce-page .single_add_to_cart_button, .woocommerce .single_add_to_cart_button{
   border-color: {$accent_color};
   color: {$accent_color};
}
.woocommerce-page .quantity .plus:hover,
.woocommerce .quantity .plus:hover,
.woocommerce-page #content .quantity .plus:hover,
.woocommerce #content .quantity .plus:hover,
.woocommerce-page .quantity .minus:hover,
.woocommerce .quantity .minus:hover,
.woocommerce-page #content .quantity .minus:hover,
.woocommerce #content .quantity .minus:hover,
.woocommerce-page .quantity input.qty:hover,
.woocommerce .quantity input.qty:hover,
.woocommerce-page #content .quantity input.qty:hover,
.woocommerce #content .quantity input.qty:hover,
.woocommerce-page a.button.alt:hover,
.woocommerce a.button.alt:hover,
.woocommerce-page button.button.alt:hover,
.woocommerce button.button.alt:hover,
.woocommerce-page input.button.alt:hover,
.woocommerce input.button.alt:hover,
.woocommerce-page #respond input#submit.alt:hover,
.woocommerce #respond input#submit.alt:hover,
.woocommerce-page #content input.button.alt:hover,
.woocommerce #content input.button.alt:hover,
.woocommerce-page .single_add_to_cart_button:hover, .woocommerce .single_add_to_cart_button:hover {
   border-color: {$accent_color};
   background-color:{$accent_color};
   color:#fff;
}
woocommerce-page .single_add_to_cart_button:hover i,
.woocommerce .single_add_to_cart_button:hover i{
   color:#fff !important;
}
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active a,
.woocommerce-page div.product span.price ins,
.woocommerce div.product span.price ins,
.woocommerce-page #content div.product span.price ins,
.woocommerce #content div.product span.price ins,
.woocommerce-page div.product p.price ins,
.woocommerce div.product p.price ins,
.woocommerce-page #content div.product p.price ins,
.woocommerce #content div.product p.price ins{
  color: {$accent_color};
  
}
";

	}

	$output .= $helpme_settings['custom-css'];

	$output = preg_replace('/\r|\n|\t/', '', $output);


	wp_enqueue_style('theme-dynamic-styles', get_template_directory_uri() . '/custom.css');

	wp_add_inline_style('theme-dynamic-styles', $output);

}
add_action('wp_enqueue_scripts', 'helpme_dynamic_css', 10);


###########################################
# STYLES FOR VISUAL STUDIO IMPORTANT TAG
###########################################
function helpme_important_dynamic_css(){
	$output = '';


	echo'
	<style>
		@media handheld, only screen and (max-width: 767px)
		{
			[class*="vc_custom_"]
			{
				padding-left: 0 !important;
				padding-right: 0 !important;
			}
		}
	</style>	
	';

	

}
add_action('wp_head', 'helpme_important_dynamic_css', 9999);
