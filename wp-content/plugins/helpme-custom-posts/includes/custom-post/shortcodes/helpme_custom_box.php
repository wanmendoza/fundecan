<?php

$el_class = $width = $el_position = '';

extract( shortcode_atts( array(
			'el_class' => '',
			'border_color' => '',
			'bg_color' => '',
			'bg_image' => '',
			'text_align' => 'center',
			'bg_position' => 'center center',
			'bg_repeat' => 'repeat',
			'bg_stretch' => '',
			'padding_horizental' => '20',
			'padding_vertical' => '20',
			'margin_bottom' => '20',
			'drop_shadow' => 'false',
			'animation' => '',
			'visibility' => ''
		), $atts ) );

$output = $bg_stretch_class = $animation_css = $drop_shadow_css = '';
$id = uniqid();

if ( $bg_stretch == 'true' ) {
	$bg_stretch_class = 'helpme-background-stretch';
}
if($drop_shadow == 'true') {
	$drop_shadow_css = 'drop-outer-shadow';
}
if ( $animation != '' ) {
	$animation_css = 'helpme-animate-element ' . $animation . ' ';
}

$backgroud_image = !empty( $bg_image ) ? 'background-image:url('.$bg_image.'); ' : '';
$border = !empty( $border_color ) ? ( 'border:2px solid '.$border_color.';' ) : '';

$output .= '<div style="text-align:'.$text_align.'" id="helpme-custom-box-'.$id.'" class="helpme-grid helpme-custom-boxed helpme-shortcode '.$drop_shadow_css.' '.$bg_stretch_class.' '.$visibility.' '.$animation_css.$el_class.'">';
$output .= wpb_js_remove_wpautop( $content );
$output .= '<div class="clearboth"></div></div>';


// Get global JSON contructor object for styles and create local variable
global $helpme_dynamic_styles;
$helpme_styles = '';

$helpme_styles .= '
#helpme-custom-box-'.$id.' {
    padding:'.$padding_vertical.'px '.$padding_horizental.'px;
    margin-bottom:'.$margin_bottom.'px;
    '. $backgroud_image.'
    background-attachment:scroll;
    background-repeat:'.$bg_repeat.';
    background-color:'.$bg_color.';
    background-position:'.$bg_position.';
    '.$border.'

}
#helpme-custom-box-'.$id.' .helpme-divider .divider-inner i{
    background-color: '.$bg_color.' !important;
}';


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
