<?php

extract( shortcode_atts( array(
			"style" => 'classic',
			"mile_width" => '150',
			"mile_height" => '150',
			"mile_radius" => '500',
			"mile_shadow" => 'false',
			"mile_border_width" => '2',
			"mile_border_style" => 'solid',
			"mile_border_color" => '#ffffff',
			"mile_bg_color" => '',
			"icon" => '',
			"icon" => '',
			"color" => '#ffffff',
			"type" => 'text',
			'text_size' => 14,
			'icon_size' => 16,
			'number_size' => 36,
			'font_family' => 'Montserrat',
			"start" => 0,
			"stop" => 100,
			"speed" => 2000,
			"text" => '',
			'text_icon_color' => '#ffffff',
			'text_suffix' => '',
			'border_bottom' => '#eee',
			'number_suffix_text_size' => '',
			'el_class' => '',
		), $atts ) );

$output = $output_icon = '';

switch ($icon_size) {
	case 16:
		$line_height = 32;
		break;
	case 32:
		$line_height = 64;
		break;	
	case 48:
		$line_height = 86;
		break;	
	case 64:
		$line_height = 106;
		break;			
	case 128:
		$line_height = 170;
		break;		
	default:
		$line_height = 32;
		break;
}
$id = uniqid();
global$helpme_dynamic_styles;
$helpme_styles = '';
	if($mile_shadow == 'true'){
		
		$helpme_styles .= '
.helpme-milestone{	-webkit-box-shadow: 0 0 6px 3px rgba(0,0,0,0.03);
				-moz-box-shadow: 0 0 6px 3px rgba(0,0,0,0.03);
				box-shadow: 0 0 6px 3px rgba(0,0,0,0.03);
				
	}
.helpme-milestone:hover{	-webkit-box-shadow: 0 0 10px 5px rgba(0,0,0,0.05);
				-moz-box-shadow: 0 0 6px 3px rgba(0,0,0,0.05);
				box-shadow: 0 0 6px 3px rgba(0,0,0,0.05);
				
	}
';
	}
if($style == 'classic' || $style == 'modern'){
		
		$helpme_styles .= '
.helpme-milestone{position:relative;}
.helpme-milestone .content{position:absolute;top:50%;left:0;right:0; transform: translateY(-50%);width:100%;}
';
	}
if($style  == 'modern'){
	$mile_width = '100';
	$unit = '%';
}else{
	$mile_width = $mile_width;
	$unit ='px';
}
$text_icon_color = !empty($text_icon_color) ? ('color:'.$text_icon_color.';') : '';

if ( $type == 'icon' ) {
	if(!empty( $icon )) {
    $icon = (strpos($icon, 'helpme-') !== FALSE) ? ( $icon ) : ( 'helpme-'.$icon);
	} else {
	    $icon = '';
	}

	}
	if($type == 'icon'){
		$output_icon .= '<i style="font-size:'.$icon_size.'px;line-height:'.$line_height.'px;'.$text_icon_color.'" class="'.$icon.'"></i>';
	}else{
	$output_icon .= '<div style="font-size:'.$text_size.'px;'.$text_icon_color.'" class="milestone-text">'.$text.'</div>';
}

$output .= '<div style="background-color:'.$mile_bg_color.'; width:'.$mile_width.''.$unit.';height:'.$mile_height.'px;border-radius:'.$mile_radius.'px;border-color:'.$mile_border_color.';border-width:'.$mile_border_width.'px;border-style:'.$mile_border_style.'" class="helpme-milestone '.$style.'-style '.$el_class.'" >';

$output .= '<div class="content">';
if($style == 'classic' || $style  == 'modern'){
	$output .= '<div style="color:'.$color.';font-family:'.$font_family.';font-size:'.$number_size.'px; line-height:'.$number_size.'px;" class="milestone-number content-'.$type.'" data-speed="'.$speed.'" data-stop="'.$stop.'">'.$start.'</div><div class="clearboth"></div>';
	$output .= $output_icon;
}else{
	$output .= $output_icon;
	$output .= '<div style="color:'.$color.';font-family:'.$font_family.';font-size:'.$number_size.'px;line-height:'.$number_size.'px; " class="milestone-number content-'.$type.'" data-speed="'.$speed.'" data-stop="'.$stop.'">'.$start.'</div><div class="clearboth"></div>';
	$output .= '<span style="font-size:'.$number_suffix_text_size.'px;'.$text_icon_color.'">'.$text_suffix.'</span>';

}

$output .= '</div></div>';

echo '<div>'.$output.'</div>';
// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="helpme-dynamic-styles">';
echo '<!-- ' . helpme_clean_dynamic_styles($helpme_styles) . '-->';
echo '</div>';


// Export styles to json for faster page load
$helpme_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $helpme_styles
);
