<?php
$output = '';
extract( shortcode_atts( array(
			'skin' => 'dark',
			'text_icon_color' => '',
			'border_color' => '',
			'name' => '',
			'cellphone' => '',
			'phone' => '',
			'address' => '',
			'website' => '',
			'email' => '',
			'animation' => '',
			'el_class' => '',
		), $atts ) );


$style_id = uniqid();
$animation_css = ($animation != '') ? (' class="helpme-animate-element ' . $animation . '" ') : '';

if ( $skin == 'custom' ) {

	// Get global JSON contructor object for styles and create local variable
	global $helpme_dynamic_styles;
	$helpme_styles = '';

	    $helpme_styles .= '
	        #helpme-contactinfo-shortcode-'.$style_id.'.custom-skin li i {
	            border-right: 2px solid '.$border_color.';
				color: '.$text_icon_color.';
	        }
	        #helpme-contactinfo-shortcode-'.$style_id.' ul li{
	        	color: '.$text_icon_color.' !important;
	        }
	        #helpme-contactinfo-shortcode-'.$style_id.' ul li a{
	        	color: '.$text_icon_color.' !important;
	        }';

	// Hidden styles node for head injection after page load through ajax
	echo '<div id="ajax-'.$style_id.'" class="helpme-dynamic-styles">';
	echo '<!-- ' . helpme_clean_dynamic_styles($helpme_styles) . '-->';
	echo '</div>';


	// Export styles to json for faster page load
	$helpme_dynamic_styles[] = array(
	  'id' => 'ajax-'.$style_id ,
	  'inject' => $helpme_styles
	);
}


$output .= '<div id="helpme-contactinfo-shortcode-'.$style_id.'" class="widget_contact_info helpme-contactinfo-shortcode '.$skin.'-skin '.$el_class.'">';
$output .= '<ul>';
$output .= !empty( $name )  ? '<li'.$animation_css.'><i class="helpme-theme-icon-user"></i><span itemprop="name">'.$name.'</span></li>' : '';
$output .= !empty( $cellphone )  ? '<li'.$animation_css.'><i class="helpme-theme-icon-cellphone"></i><span>'.$cellphone.'</span></li>' : '';
$output .= !empty( $phone )  ? '<li'.$animation_css.'><i class="helpme-theme-icon-phone"></i><span>'.$phone.'</span></li>' : '';
$output .= !empty( $address )  ? '<li'.$animation_css.'><i class="helpme-theme-icon-office"></i><span itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">'.$address.'</span></li>' : '';
$output .= !empty( $website )  ? '<li'.$animation_css.'><i class="helpme-icon-globe"></i><span><a href="' . $website . '">'.$website.'</a></span></li>' : '';
$output .= !empty( $email )  ? '<li'.$animation_css.'><i class="helpme-theme-icon-email"></i><span itemprop="email"><a href="mailto:' . antispambot($email) . '">'.$email.'</a></span></li>' : '';

$output .= '</ul>';
$output .= '</div>';

echo '<div>'.$output.'</div>';

