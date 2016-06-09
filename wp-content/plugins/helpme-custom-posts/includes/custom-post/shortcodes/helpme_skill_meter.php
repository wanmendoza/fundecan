<?php

global $helpme_accent_color;

extract( shortcode_atts( array(
			'title' => '',
			'title_color' => '',
			'progress_bar_color' => $helpme_accent_color,
			'track_bar_color' => '',
			'percent' => 50,
			'height' => '17',
			'el_class' => '',
		), $atts ) );

$output = '<div class="helpme-skill-meter '.$el_class.'">';
$output .= '<div class="helpme-skill-meter-title" style="color:'.$title_color.';">'.$title.'</div>';
$output .= '<div class="helpme-progress-bar" style="height:'.$height.'px; background-color:'.$track_bar_color.';">';
$output .= '<span class="progress-outer" data-width="'.$percent.'" style="background-color:'.$progress_bar_color.';">';
$output .= '</span></div><div class="clearboth"></div></div>'; 

echo '<div>'.$output.'</div>'; 
