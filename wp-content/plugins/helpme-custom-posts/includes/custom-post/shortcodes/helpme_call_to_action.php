<?php

$el_class = $width = $el_position = '';

extract( shortcode_atts( array(
			'el_class' => '',
			'box_border_width' => '',
			'button_border_width' => '',
			'text' => '',
			'text2' => '',
			'text3' => '',
			'text4' => '',
			'button_style' => 'outline',
			'button_text' => 'Donate Now',
			'button_url' => '',
			'outline_skin' => '',
			'outline_hover_skin' => '',
			'style' => 'custom',
			'layout_style' => 'expended',
			'bg_color' => '',
			'border_color' => '',
			'text_size' => 36,
			'font_weight' => 'bold',
			'text_transform' => 'uppercase',
			'text_color' => '#ffffff',
		), $atts ) );

$custom_box_css = $output = $custom_box_title_css = $default_border = '';

global $helpme_accent_color, $helpme_settings, $helpme_dynamic_styles;

$id = uniqid();
$helpme_styles = '';
	

$text_color = ($text_color == $helpme_settings['accent-color']) ? $helpme_accent_color : $text_color;
$bg_color = ($bg_color == $helpme_settings['accent-color']) ? $helpme_accent_color : $bg_color;
$border_color = ($border_color == $helpme_settings['accent-color']) ? $helpme_accent_color : $border_color;

if($style == 'custom'){
		
		$helpme_styles .= '
		.callout-desc-holder h5 span{color:'.$helpme_settings['accent-color'].';}
';
	}

if($style == 'custom') {
	$custom_box_css = ' style="background-color:'.$bg_color.';border:'.$box_border_width.'px solid '.$border_color.'; border-radius:10px;"';
	$custom_box_title_css = ' style="font-size:'.$text_size.'px;font-weight:'.$font_weight.';text-transform:'.$text_transform.';color:'.$text_color.';"';
	
}
if($style == 'default') {
	$default_border = ' style="border-width:'.$box_border_width.'px ;"';
}

if($layout_style == 'expended'){
	$output .= '<div'.$custom_box_css.$default_border.' class="helpme-call-to-action '.$el_class.'"><div class="helpme-inner-grid">';
	if ( $button_text ) {
		$output .= do_shortcode( '[helpme_button style="'.$button_style.'" outline_border_width="'.$button_border_width.'" size="large" target="_self" align="right" margin_bottom="0" outline_skin="'.$outline_skin.'" outline_hover_skin="'.$outline_hover_skin.'" url="'.$button_url.'"]'.$button_text.'[/helpme_button]' );
	}

	$output .= '<div class="callout-desc"><div class="callout-desc-holder">';
	$output .= '<h3'.$custom_box_title_css.' class="callout-title">'.$text.'</h3><div class="clearboth"></div>';
	$output .='</div></div>';

	$output .= '</div><div class="clearboth"></div></div>';
}else if ($layout_style == 'modern'){
	$output .= '<div'.$custom_box_css.$default_border.' class="helpme-call-to-action '.$el_class.'"><div class="helpme-inner-grid">';
	$output .='<div class="helpme-col-2-3" style="text-align:left;">';
	$output .= '<div class="callout-desc" style="width:100%;"><div class="callout-desc-holder">';
	$output .= '<h4 style="color:'.$text_color.';font-weight:'.$font_weight.';text-transform:'.$text_transform.';" class="callout-title">'.$text.'</h4><div class="clearboth"></div>';
	$output .= '<h5 style="color:'.$text_color.';font-weight:'.$font_weight.';text-transform:'.$text_transform.';" class="callout-title">'.$text2.' <span>'.$text3.'</span> '.$text4.'</h5><div class="clearboth"></div>';
	$output .='</div></div>';
	$output .='</div>';
	if ( $button_text ) {
		$output .='<div class="helpme-col-1-3">';
		$output .= do_shortcode( '[helpme_button style="'.$button_style.'" outline_border_width="'.$button_border_width.'" size="medium" target="_self" align="right" margin_bottom="0" outline_skin="'.$outline_skin.'" bg_color="'.$outline_skin.'" txt_color="'.$outline_hover_skin.'"  outline_hover_skin="'.$outline_hover_skin.'" url="'.$button_url.'"]'.$button_text.'[/helpme_button]' );
		$output .='</div>';
	}

	$output .= '</div><div class="clearboth"></div></div>';
}else{
	$output .= '<div'.$custom_box_css.$default_border.' class="helpme-call-to-action '.$el_class.'"><div class="helpme-inner-grid">';
	$output .='<div class="helpme-col-1-2" style="text-align:right;">';
	$output .= '<div class="callout-desc" style="width:100%;"><div class="callout-desc-holder">';
	$output .= '<h4 style="color:'.$text_color.'" class="callout-title">'.$text.'</h4><div class="clearboth"></div>';
	$output .= '<h5 style="color:'.$text_color.'" class="callout-title">'.$text2.' <span>'.$text3.'</span> '.$text4.'</h5><div class="clearboth"></div>';
	$output .='</div></div>';
	$output .='</div>';
	if ( $button_text ) {
		$output .='<div class="helpme-col-1-2">';
		$output .= do_shortcode( '[helpme_button style="'.$button_style.'" outline_border_width="'.$button_border_width.'" size="medium" target="_self" align="left" margin_bottom="0" outline_skin="'.$outline_skin.'" bg_color="'.$outline_skin.'" txt_color="'.$outline_hover_skin.'"  outline_hover_skin="'.$outline_hover_skin.'" url="'.$button_url.'"]'.$button_text.'[/helpme_button]' );
		$output .='</div>';
	}

	$output .= '</div><div class="clearboth"></div></div>';
}

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
