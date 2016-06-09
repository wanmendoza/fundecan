<?php

extract( shortcode_atts( array(
			'menu_location' => '',
			'squeeze' => 'true',
			'align' => 'left',
			'custom_header_height' => '',
			'top_level_item_size' => '',
			'wideness' => 'boxed',
			'show_logo' => 'true',
			'show_search' => 'true',
			'show_cart' => 'true',
			'show_wpml' => 'true',
			'show_border' => 'true',
			'background_color' => '',
			'link_color' => '',
			'link_hover_color' => '',
			'border_color' => '',
			'el_class' => '',
		), $atts ) );


$output = $output_styles = '';
$id = uniqid();

$menu_location = $menu_location ? $menu_location : 'primary-menu';

global $helpme_settings, $helpme_json;

$logo_height = (!empty($helpme_settings['logo']['height'])) ? $helpme_settings['logo']['height'] : 50;



if(!empty($custom_header_height) && $custom_header_height != '0') {
		$header_height = $custom_header_height;
		$header_class = 'header-custom-height';
} else {
		
	if($squeeze == 'true') {
		$header_height = $logo_height/1.5 + ($helpme_settings['header-padding']/2.4 * 2);
		$header_class = 'sticky-trigger-header ';
	} else {
		$header_height = $logo_height + ($helpme_settings['header-padding'] * 2);
		$header_class = '';
	}
}



$output .= '<header id="helpme-header" style="height:'.$header_height.'px" data-sticky-height="'.intval($header_height).'" class="helpme-secondary-header secondary-header-'.$id.' show-cart-'.$show_cart.' show-search-'.$show_search.' show-logo-'.$show_logo.' show-wpml-'.$show_wpml.' show-border-'.$show_border.' '.$wideness.'-header header-align-'.$align.' header-structure-standard put-header-top helpme-header-module '.$header_class.$el_class.'" data-header-style="block" data-header-structure="standard">';

if($wideness == 'boxed') {
	$output .= '<div class="helpme-grid">';
}


ob_start();
do_action('main_navigation', $menu_location);

$output .= ob_get_contents();
ob_end_clean();


if($wideness == 'boxed') {
	$output .= '</div>';
}

if($helpme_settings['side-dashboard']) :

	if(!isset($helpme_settings['side-dashboard-icon']) && empty($helpme_settings['side-dashboard-icon'])){ 
		$dashboard_icon = 'helpme-theme-icon-dashboard2'; 
	}else{ 
		$dashboard_icon = $helpme_settings['side-dashboard-icon']; 
	}

  $output .= '<div class="dashboard-trigger desktop-mode"><i class="'.$dashboard_icon.'"></i></div>';
endif; 

$output .= '</header>';

$output .= '<div class="responsive-nav-container"></div>';

$output .= '<div style="height:'.intval($header_height).'px;" class="secondary-header-space"></div>';

$output_styles .= '<style>';

if ( !empty($background_color) || !empty($link_color) ) {

	$output_styles .= '
	.secondary-header-'.$id.' {
            background-color:'.$background_color.' !important;
            border-top-color:'.$border_color.' !important;
        }
        .secondary-header-'.$id.' .header-searchform-input input[type=text] {
        	background-color:'.$background_color.' !important;
        }';
}


    $output_styles .= '
     	.secondary-header-'.$id.'.header-custom-height #helpme-main-navigation > ul > li.menu-item, 
     	.secondary-header-'.$id.'.header-custom-height #helpme-main-navigation > ul > li.menu-item > a, 
     	.secondary-header-'.$id.'.header-custom-height .helpme-header-search,
     	.secondary-header-'.$id.'.header-custom-height .helpme-header-search a, 
     	.secondary-header-'.$id.'.header-custom-height .helpme-header-wpml-ls, 
     	.secondary-header-'.$id.'.header-custom-height .helpme-header-wpml-ls a, 
     	.secondary-header-'.$id.'.header-custom-height .helpme-cart-link, 
     	.secondary-header-'.$id.'.header-custom-height .helpme-responsive-cart-link, 
     	.secondary-header-'.$id.'.header-custom-height .dashboard-trigger, 
     	.secondary-header-'.$id.'.header-custom-height .responsive-nav-link, 
     	.secondary-header-'.$id.'.header-custom-height .helpme-header-social a, 
     	.secondary-header-'.$id.'.header-custom-height .helpme-margin-header-burger,
     	.secondary-header-'.$id.'.header-custom-height .helpme-header-logo, 
     	.secondary-header-'.$id.'.header-custom-height .helpme-header-logo a {
     		height: '.$header_height.'px !important;
			line-height: '.$header_height.'px !important;
     	}

     	.secondary-header-'.$id.'.header-custom-height .helpme-header-logo, 
     	.secondary-header-'.$id.'.header-custom-height .helpme-header-logo a {
     		margin-top:0 !important;
     		margin-bottom:0 !important;
     	}


        .secondary-header-'.$id.' #helpme-main-navigation > ul > li.menu-item > a,
        .secondary-header-'.$id.' .helpme-header-search a,
        .secondary-header-'.$id.' .helpme-margin-header-burger,
        .secondary-header-'.$id.' .helpme-header-social a,
        .secondary-header-'.$id.' .responsive-nav-link,
        .secondary-header-'.$id.' .helpme-cart-link,
        .secondary-header-'.$id.' .dashboard-trigger,
        .secondary-header-'.$id.' .helpme-responsive-cart-link,
        .secondary-header-'.$id.' .helpme-header-wpml-ls a,
        .secondary-header-'.$id.' .helpme-header-search a
        {
        	color:'.$link_color.' !important;	
        }';
        if(!empty($top_level_item_size) && $top_level_item_size != '0' ) {
	        $output_styles .='
	        .secondary-header-'.$id.' #helpme-main-navigation > ul > li.menu-item > a
	        {
	        	font-size: '.$top_level_item_size.'px !important;
	        }';
    	}
    	$output_styles .='
        .secondary-header-'.$id.' a:hover {
            color:'.$link_hover_color.' !important;
        }
        @media handheld, only screen and (max-width:'.$helpme_settings['res-nav-width'].'px){
            .secondary-header-'.$id.' .helpme-header-logo,
            .secondary-header-'.$id.' .helpme-responsive-shopping-cart {
                display: none !important;
            }
        }
        </style>
        ';



echo '<div>'.$output.'</div>';
echo '<div>'.$output.'</div>';_styles;

$helpme_json[] = array(
	'name' => 'helpme_header',
	'params' => array(
			'stickyHeight' => intval($header_height)
		)
);
