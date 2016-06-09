<?php
extract( shortcode_atts( array(
            'el_class' => '',
            'id' => '',
            'size' => 'medium',
            'icon' => '',
            'style' => 'fill',
			'font_size' => 14,
			'display' => 'block',
            'corner_style' => 'pointed',
            'bg_color' => '',
			'bg_hover_color' => '',
            'txt_color' => '#fff',
            'underline_color' => '#fff',
            'outline_skin' => '',
            'outline_hover_skin' => '',
            'outline_border_width' => 2,
            'nudge_skin' => '',
            "url" => '',
            "target" => '',
            'margin_bottom' => 15,
			'margin_left' => '',
            'animation' => '',
            'infinite_animation' => '',
            "align" => '',
        ), $atts ) );

$button = '';


$style_id = uniqid();

global $helpme_accent_color, $helpme_settings;

$bg_color = ($bg_color == $helpme_settings['accent-color']) ? $helpme_accent_color : $bg_color;


// Get global JSON contructor object for styles and create local variable
global $helpme_dynamic_styles;
$helpme_styles = '';

if ( $style == 'three-dimension' || $style == 'flat' ) {
    $helpme_styles .= '
        .btn-'.$style_id.' {
            background-color:'.$bg_color.';
            color:'.$txt_color.';
            margin-bottom:'.$margin_bottom.'px;
        }
        .btn-'.$style_id.':hover {
            background-color:'.helpme_hex_darker($bg_color, 15).';
            color:'.$txt_color.';
        }
        ';
}

if ( $style == 'three-dimension' ) {
    $helpme_styles .= '.btn-'.$style_id.' {
                        box-shadow: 0 3px 0 '.helpme_hex_darker( $bg_color, 20 ).';
                    }  
                    .btn-'.$style_id.':active {
                        box-shadow: 0 1px 0 '.helpme_hex_darker( $bg_color, 20 ).';
                    }';
}

if ( $style == 'outline' ) {
    $outline_skin = ($outline_skin == $helpme_settings['accent-color']) ? $helpme_accent_color : $outline_skin;
    $helpme_styles .= '.btn-'.$style_id.' {
                        border-color:'.$outline_skin.' !important; 
                        color:'.$outline_skin.' !important;
                        margin-bottom:'.$margin_bottom.'px;
						margin-left:'.$margin_left.'px;
                        border-width:'.$outline_border_width.'px;
						background-color:'.$bg_color.' !important;
                    }

                    .btn-'.$style_id.':hover {
                        background-color:'.$outline_skin.' !important;
                        color:'.$outline_hover_skin.' !important;
                    }';
}
if ( $style == 'line' ) {
    $helpme_styles .= '.btn-'.$style_id.' {
                        color:'.$outline_skin.' !important;
                        margin-bottom:'.$margin_bottom.'px;
                    }
                    .btn-'.$style_id.'::after {
                        background-color:'.$outline_skin.' !important; 
                    }
                    .btn-'.$style_id.'::before {
                        background-color:'.$outline_skin.' !important; 
                    }

                    .btn-'.$style_id.':hover {
                        background-color:'.$outline_skin.' !important;
                        color:'.$outline_hover_skin.' !important;
                    }';
}
if ( $style == 'fill' ) {
    $helpme_styles .= '.btn-'.$style_id.' {
                        color:'.$outline_skin.' !important;
                        border: '.$outline_border_width.'px solid '.$bg_color.';
                        margin-bottom:'.$margin_bottom.'px;
						margin-left:'.$margin_left.'px;
						background-color:'.$bg_color.';
						font-size:'.$font_size.';
                    }
                    .btn-'.$style_id.'::before {
                       background-color:'.$bg_hover_color.' !important;  
                    }
                    .btn-'.$style_id.':hover {
                        color:'.$outline_hover_skin.' !important;
						border: '.$outline_border_width.'px solid '.$bg_hover_color.';
						background:'.$bg_hover_color.' !important; 
                    }';
    
}
if ( $style == 'nudge' ) {
    $helpme_styles .= '.btn-'.$style_id.' {
                        color:'.$nudge_skin.' !important;
                        margin-bottom:'.$margin_bottom.'px;
                    }
                    .btn-'.$style_id.'::after {
                        border: 2px solid '.$nudge_skin.';
                    }';
}
if ( $style == 'radius' ) {
    $helpme_styles .= '.btn-'.$style_id.' {
                        color:'.$outline_skin.' !important;
                        border: 2px solid '.$outline_skin.' !important;
                        margin-bottom:'.$margin_bottom.'px;
                    }';
}
if ( $style == 'fancy_link' ) {
    $helpme_styles .= '.btn-'.$style_id.' {
                        color:'.$txt_color.' !important;
                        margin-bottom:'.$margin_bottom.'px;
                    } 
                    .btn-'.$style_id.':before {
                        background-color: '.$underline_color.' !important;
                    }
                    .btn-'.$style_id.' .line {
                        background-color: '.$underline_color.' !important;
                    }';
}



$infinite_animation = !empty($infinite_animation) ? (' helpme-'.$infinite_animation) : '';
$animation_css = ($animation != '') ? ' helpme-animate-element ' . $animation . ' ' : '';


$id = !empty( $id ) ? ( 'id="'.$id.'"' ) : '';
$target = !empty( $target ) ? ( 'target="'.$target.'"' ) : '';


$url_is_smooth = (preg_match('/#/',$url)) ? 'helpme-smooth ' : '';

if(!empty( $icon )) {
    $icon = (strpos($icon, 'helpme-') !== FALSE) ? ( '<i class="'.$icon.'"></i>' ) : ( '<i class="helpme-'.$icon.'"></i>' );    
} else {
    $icon = '';
}

$button .= '<a href="'.$url.'" '.$target.' '.$id.' class="helpme-button btn-'.$style_id.' '.$animation_css.' '.$style.'-button '.$size.' '.$corner_style.$el_class.$infinite_animation.' '.$url_is_smooth.'">'.$icon.'<span>'.do_shortcode( strip_tags( $content ) ).'</span>';
$button .= ($style == 'fancy_link') ? '<span class="line"></span>' : '';
$button .= '</a>';
echo '<div style="display:'.$display.';">';
echo ( !empty( $align ) ? '<div class="helpme-button-align '.$align.'">' : '' ) . $button . ( !empty( $align ) ? '</div>' : '' );
echo '</div>';



// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$style_id.'" class="helpme-dynamic-styles">';
echo '<!-- ' . helpme_clean_dynamic_styles($helpme_styles) . '-->';
echo '</div>';


// Export styles to json for faster page load
$helpme_dynamic_styles[] = array(
  'id' => 'ajax-'.$style_id ,
  'inject' => $helpme_styles
);
