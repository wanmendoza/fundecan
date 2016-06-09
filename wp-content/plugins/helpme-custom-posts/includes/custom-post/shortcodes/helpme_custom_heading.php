<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'custom_heading_text1' => esc_html__("", "helpme"),
			'custom_heading_text2' => esc_html__("", "helpme"),
			'custom_heading_text3' => esc_html__("", "helpme"),
			'custom_heading_color' => '',
			'custom_text_color' => '',
			'custom_text_below_title' => esc_html__("", "helpme")
		), $atts ) );

$id = uniqid();





global $helpme_accent_color, $helpme_settings;
$helpme_styles = '';

if ($custom_heading_text2) {
	
	color:$helpme_accent_color;
}

$output .= '<div id="custom-heading-'.$id.'" class="helpme-custom-heading "><h4 style="color:'.$custom_heading_color.'">' . $custom_heading_text1. ' <span class="custom-color-heading">' . $custom_heading_text2. ' </span> ' . $custom_heading_text3. '</h4></div>';
$output .= '<div class="title-divider"><span></span><span></span><span></span><span></span><span></span></div>';
$output .= '<div class="custom-text-below-title"><p style="color:'.$custom_text_color.'">'.$custom_text_below_title.'</p></div>';
echo '<div>'.$output.'</div>';


// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="helpme-dynamic-styles">';
echo '<!-- ' . helpme_clean_dynamic_styles($helpme_styles) . '-->';
echo '</div>';


// Export styles to json for faster page load
$helpme_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  //'inject' => $helpme_styles
);
