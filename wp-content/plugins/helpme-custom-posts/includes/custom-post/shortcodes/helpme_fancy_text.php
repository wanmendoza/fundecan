<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'color' => '',
			'highlight_color' => '#000',
			'highlight_opacity' => 0.3,
			"size" => '18',
			'font_weight' => 'normal',
			'margin_bottom' => '20',
			'margin_top' => '0',
			'line_height' => '34',
			"align" => 'left',
			'animation' => '',
			"font_family" => '',
			"font_type" => '',
		), $atts ) );
$id = uniqid();
$output = '';
$animation_css ='';
$output .= helpme_get_fontfamily( "#fancy-title-", $id, $font_family, $font_type );
if ( $animation != '' ) {
	$animation_css = ' helpme-animate-element ' . $animation . ' ';
}
global $helpme_accent_color, $helpme_settings;
$highlight_color = ($highlight_color == $helpme_settings['accent-color']) ? $helpme_accent_color : $highlight_color;

$bg_color = helpme_convert_rgba( $highlight_color, $highlight_opacity );
$output .= '<div style="font-size: '.$size.'px;color: '.$color.';font-weight:'.$font_weight.';margin-top:'.$margin_top.'px;margin-bottom:'.$margin_bottom.'px;" id="fancy-title-'.$id.'" class="helpme-fancy-text title-box-'.$align.' '.$animation_css.' '.$el_class.'"><span style="background-color:'.$bg_color.';line-height:'.$line_height.'px">' . wpb_js_remove_wpautop( strip_tags($content, "<em><i><strong><u><span><small><large><sub><sup><a><del>") ). '</span></div><div class="clearboth"></div>';

echo '<div>'.$output.'</div>';
