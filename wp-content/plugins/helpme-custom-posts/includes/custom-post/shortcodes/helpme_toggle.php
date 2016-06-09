<?php

extract(shortcode_atts(array(
	'title' => false,
	'style' => 'simple',
	'icon' => '',
	'icon_color' => '',
	'pane_bg' => '',
	"el_class" => '',
), $atts));

$id = uniqid();
$output = '';

if (!empty($icon)) {
	$icon = (strpos($icon, 'helpme-') !== FALSE) ? ($icon) : ('helpme-' . $icon);
} else {
	$icon = '';
}

$output .= '<div id="helpme-toggle-' . $id . '" class="helpme-toggle helpme-shortcode ' . $style . '-style ' . $el_class . '">';
$output .= '<div class="helpme-toggle-title"><i style="color:' . $icon_color . '" class="' . $icon . '"></i>' . $title . '</div>';
$output .= '<div class="helpme-toggle-pane"><div style="background-color:' . $pane_bg . '" class="inner-box">' . wpb_js_remove_wpautop(do_shortcode(trim($content))) . '</div></div></div>';
echo '<div>'.$output.'</div>';
