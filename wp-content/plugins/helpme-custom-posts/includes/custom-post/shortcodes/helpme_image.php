<?php

extract(shortcode_atts(array(
	'image_width' => 500,
	'image_height' => '400',
	'crop' => 'true',
	'hover_style' => 'style1',
	'margin_bottom' => 10,
	'src' => '',
	'animation' => '',
	'align' => 'left',
	'custom_url' => '',
	'target' => '_self',
	'hover' => 'true',
	'custom_lightbox_url' => '',
	'group' => 'shortcode',
	'el_class' => '',
	'lightbox_ifarme' => 'false',
	'visibility' => '',
	'circular' => 'false',
), $atts));

$output = '';


require_once HELPME_THEME_PLUGINS_CONFIG . "/image-cropping.php";	

$animation_css = ($animation != '') ? (' helpme-animate-element ' . $animation . ' ') : '';

$image_id = helpme_get_attachment_id_from_url($src);
$alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
$title = get_the_title($image_id);

$output .= '<div class="helpme-image circular-'.$circular.' align-' . $align . ' ' . $hover_style . '-image ' . $visibility . ' ' . $animation_css . $el_class . '" style="max-width: ' . $image_width . 'px; margin-bottom:' . $margin_bottom . 'px" onClick="return true">';


if ($crop == 'true') {
	$image_src = bfi_thumb($src, array(
	'width' => $image_width,
	'height' => $image_height,
	'crop' => true
	));
	$output .= '<img alt="' . $alt . '" title="' . $title . '" src="' . helpme_thumbnail_image_gen($image_src, $image_width, $image_height) . '" />';
} else {
	$output .= '<img alt="' . $alt . '" title="' . $title . '" src="' . $src . '" />';
}

if ($hover != 'false') {
	$output .= '<div class="hover-overlay"></div>';

	$output .= '<div class="helpme-image-hover">';
	if ($custom_url != '') {
	$output .= '<a target="' . $target . '" href="' . $custom_url . '" title="' . $title . '">';
	} else {
		$lightbox_src = !empty($custom_lightbox_url) ? $custom_lightbox_url : $src;
		$lightbox_ifarme = ($lightbox_ifarme == 'true') ? ' fancybox.iframe' : '';
		$output .= ($hover != 'false') ? '<a href="' . $lightbox_src . '" title="' . $title . '" rel="image-' . $group . '" class="helpme-lightbox' . $lightbox_ifarme . '">' : '';
	}
	$output .= '<i class="helpme-theme-icon-plus"></i>';

	if ($custom_url != '') {
		$output .= '</a>';
	} else {
		if ($hover != 'false') {
			$output .= '</a>';
		}
	}
	if (!empty($title)) {
		$output .= '<div class="helpme-image-caption">' . $title . '</div>';
	}
	$output .= '</div>';
}


$output .= '<div class="clearboth"></div></div>';

echo '<div>'.$output.'</div>';
