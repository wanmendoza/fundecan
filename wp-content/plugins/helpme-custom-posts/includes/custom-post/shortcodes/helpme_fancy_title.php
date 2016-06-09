<?php

extract( shortcode_atts( array(
			'el_class' => '',
			'color' => '',
			"size" => 14,
			'display' => 'block',
			'font_weight' => 'normal',
			'text_transform' => '',
			'margin_top' => '',
			'margin_bottom' => 20,
			"align" => 'left',
			"border_width" => 3,
			"border_color" => '',
			'animation' => '',
			"font_family" => '',
			'tag_name' => 'h3',
			"font_type" => '',
			'style'=> 'simple',
			'corner_style'=> '',
			'letter_spacing' => 0,
			'responsive_align' => 'center',
			'line_height' => 22
		), $atts ) );

$id = uniqid();


$output = $stroke_style_css = '';

$animation_css = ($animation != '') ? ' helpme-animate-element ' . $animation . ' ' : '';

global $helpme_accent_color, $helpme_settings;

$color = ($color == $helpme_settings['accent-color']) ? $helpme_accent_color : $color;
$corner = $style == 'stroke' ? (!empty($corner_style)) ? $corner_style : 'pointed'  : 'pointed';

$output .= helpme_get_fontfamily( "#fancy-title-", $id, $font_family, $font_type );

$line_height = ($line_height < $size) ? '100%' : ($line_height.'px');
$txt_transform = ($text_transform != '') ? ('text-transform:'.$text_transform.'; ') : '';

if($style == 'stroke') {
	$border_color = $border_color ? $border_color : $color;
	$stroke_style_css = 'style="border:'.$border_width.'px solid '.$border_color.';"';
}
$font_size_res = ($size > 36) ? ' fancy-title-responsive-title' : '';

$output .= '<'.$tag_name.' style="display:'.$display.';font-size: '.$size.'px;text-align:'.$align.';line-height:'.$line_height.';letter-spacing:'.$letter_spacing.'px;color: '.$color.';font-weight:'.$font_weight.';margin-bottom:'.$margin_bottom.'px; margin-top:'.$margin_top.'px; '.$txt_transform.'" id="fancy-title-'.$id.'" class="helpme-fancy-title responsive-align-'.$responsive_align.$font_size_res.' '.$style.'-title '.$align.'-align '.$animation_css.' '.$el_class.'"><span class="fancy-title-span '.$corner.'" '.$stroke_style_css.'>' . wpb_js_remove_wpautop( $content ). '</span></'.$tag_name.'>';

// Get global JSON contructor object for styles and create local variable
global $helpme_dynamic_styles;
$helpme_styles = '';

if($style == 'alt') {
	$helpme_styles .= '
                    #fancy-title-'.$id.':after{
                        background-color:'.helpme_convert_rgba($color, 0.4).';
                        height:'.$border_width.'px !important;
                    }';
}

if($style == 'avantgarde') {
	$helpme_styles .= '
                    #fancy-title-'.$id.':after, #fancy-title-'.$id.':before {
                        background-color:'.helpme_convert_rgba($color, 1).';
                        height:'.$border_width.'px !important;
                    }';
}

if($style == 'standard') {
	$helpme_styles .= '
					#fancy-title-'.$id.' span{border-color:'.$color.'; border-width:'.$border_width.'px !important;}
               #fancy-title-'.$id.':after, #fancy-title-'.$id.':before {background-color:'.$color.'; height:'.$border_width.'px !important;}';
}
if($style == 'stroke') {
	$helpme_styles .= '
					#fancy-title-'.$id.' span.rounded{border-radius:3px;}
					#fancy-title-'.$id.' span.full_rounded{border-radius:50px;}';
}
if($style == 'underline') {
	$helpme_styles .= '
                    #fancy-title-'.$id.' span:after{
                        background-color:'.$color.';
                        height:'.$border_width.'px !important;
                    }';
}

$helpme_styles .= '
					#fancy-title-'.$id.' a{
						color: '.$color.';
					}';


echo wp_kses_post($output);

// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$id.'" class="helpme-dynamic-styles">';
echo '<!-- ' . helpme_clean_dynamic_styles($helpme_styles) . '-->';
echo '</div>';


// Export styles to json for faster page load
$helpme_dynamic_styles[] = array(
  'id' => 'ajax-'.$id ,
  'inject' => $helpme_styles
);
