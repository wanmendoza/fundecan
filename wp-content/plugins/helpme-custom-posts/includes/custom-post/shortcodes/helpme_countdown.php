<?php

extract( shortcode_atts( array(
			'countdown_style' => '1',
            'skin' => 'light',
			'upcoming_event_title' => esc_html__('upcoming event', 'helpme'),
			'upcoming_event_disc' => esc_html__('Nunc commodo tellus diam, sed molestie quam ferm tuvarius Etiam finibus lorem vel interdum volutpat Su pendisse potenti Duis non sem nisi Phasellus iaculis  neque id fringilla. Sed suscipit erat egestas ante sollicitudin, quis tristique leo tristique.', 'helpme'),
			'upcoming_event_url' => esc_html__('#', 'helpme'),
			'upcoming_event_btn_text' => esc_html__('View event', 'helpme'),
            'custom_color' => '',
			'border_width' => 2,
			'border_color' => '#fff',
			'days_color' => '#88bb46',
			'hours_color' => '#82b541',
			'minutes_color' => '#91c251',
			'seconds_color' => '#8cc048',
            'date' => '12/24/2015 12:00:00',
            'offset' => '+5',
			'switch' => 'left',
            'el_class' => '',
        ), $atts ) );


$style_id = uniqid();

// Get global JSON contructor object for styles and create local variable
global $helpme_dynamic_styles;
$helpme_styles = '';

$helpme_styles .= '
#countdown-'.$style_id.' ul li {
	border-color: '.helpme_convert_rgba($custom_color, 0.2).';
}
#countdown-'.$style_id.' ul li::before {
	background-color: '.helpme_convert_rgba($custom_color, 0.2).';
}
#countdown-'.$style_id.' ul li .countdown-timer {
	color: '.$custom_color.';
}
#countdown-'.$style_id.' ul li .countdown-text {
	color: '.helpme_convert_rgba($custom_color, 0.6).';
}

#countdown-'.$style_id.'.countdown_style_two ul li {
	border:'.$border_width.'px solid '.$border_color.';
}

#countdown-'.$style_id.'.countdown_style_two ul li .countdown-timer {
	color: '.$border_color.';
}
#countdown-'.$style_id.'.countdown_style_two ul li .countdown-text {
	color:'.$border_color.';
	border-top:'.$border_width.'px solid '.$border_color.';
}

#countdown-'.$style_id.'.countdown_style_three ul li {
	border:'.$border_width.'px solid '.$border_color.';
}

#countdown-'.$style_id.'.countdown_style_three ul li .countdown-timer {
	color: '.$border_color.';
}
#countdown-'.$style_id.'.countdown_style_three ul li .countdown-text {
	color:'.$border_color.';
	border-top:'.$border_width.'px solid '.$border_color.';
}

#countdown-'.$style_id.'.countdown_style_five ul li {
	
}

#countdown-'.$style_id.'.countdown_style_five ul li .countdown-timer {
	
}
#countdown-'.$style_id.'.countdown_style_five ul li .countdown-text {
	
	
}
';

if ($countdown_style == '5' && $switch == 'right'){
	$helpme_styles .= ' 
	.countdown_style_five .upcoming-event-wrap {float: left;text-align: left;}
	.countdown_style_five .upcoming-event-wrap a {float: left;}
	.countdown_style_five .countdown-wrap {float: right;text-align: right;}
	.countdown_style_five .countdown-wrap ul {text-align: right;}	
	';
	
}

if ($countdown_style == '1') {
$output  = '<div id="countdown-'.$style_id.'" class="helpme-grid countdown_style_one '.$el_class.' light-skin helpme-event-countdown" data-offset="'.$offset.'" data-date="'.$date.'">';
$output .= '<div class="countdown-wrap">';
$output .= '<ul>';
$output .= '<li style="background-color:'.$days_color.'"><span class="days countdown-timer">00</span><span class="countdown-text">'.esc_html__('Days', 'helpme').'</span></li>';
$output .= '<li style="background-color:'.$hours_color.'"><span class="hours countdown-timer">00</span><span class="countdown-text">'.esc_html__('Hours', 'helpme').'</span></li>';
$output .= '<li style="background-color:'.$minutes_color.'"><span class="minutes countdown-timer">00</span><span class="countdown-text">'.esc_html__('Minutes', 'helpme').'</span></li>';
$output .= '<li style="background-color:'.$seconds_color.'"><span class="seconds countdown-timer">00</span><span class="countdown-text">'.esc_html__('Seconds', 'helpme').'</span></li>';
$output .= '</ul></div>';

$output .= '<div class="upcoming-event-wrap">';
$output .= '<h4>'.$upcoming_event_title.'</h4>';
$output .= '<p>'.$upcoming_event_disc.'</p>';
$output .= '<a href="'.$upcoming_event_url.'">'.$upcoming_event_btn_text.'</a>';
$output .= '</div>';
$output .= '<div class="clearfix"></div>';
$output .= '</div>';
echo '<div>'.$output.'</div>';
}
else if ($countdown_style == '2') {
$output  = '<div id="countdown-'.$style_id.'" class="helpme-grid countdown_style_two '.$el_class.' light-skin helpme-event-countdown" data-offset="'.$offset.'" data-date="'.$date.'">';
$output .= '<div class="countdown-wrap">';
$output .= '<ul>';
$output .= '<li><span class="days countdown-timer">00</span><span class="countdown-text">'.esc_html__('Days', 'helpme').'</span></li>';
$output .= '<li><span class="hours countdown-timer">00</span><span class="countdown-text">'.esc_html__('Hours', 'helpme').'</span></li>';
$output .= '<li><span class="minutes countdown-timer">00</span><span class="countdown-text">'.esc_html__('Minutes', 'helpme').'</span></li>';
$output .= '<li><span class="seconds countdown-timer">00</span><span class="countdown-text">'.esc_html__('Seconds', 'helpme').'</span></li>';
$output .= '</ul></div>';
$output .= '</div>';
echo '<div>'.$output.'</div>';
	
}

else if ($countdown_style == '3') {
$output  = '<div id="countdown-'.$style_id.'" class="helpme-grid countdown_style_three '.$el_class.' light-skin helpme-event-countdown" data-offset="'.$offset.'" data-date="'.$date.'">';
$output .= '<div class="countdown-wrap">';
$output .= '<ul>';
$output .= '<li><span class="days countdown-timer">00</span><span class="countdown-text">'.esc_html__('Days', 'helpme').'</span></li>';
$output .= '<li><span class="hours countdown-timer">00</span><span class="countdown-text">'.esc_html__('Hours', 'helpme').'</span></li>';
$output .= '<li><span class="minutes countdown-timer">00</span><span class="countdown-text">'.esc_html__('Minutes', 'helpme').'</span></li>';
$output .= '<li><span class="seconds countdown-timer">00</span><span class="countdown-text">'.esc_html__('Seconds', 'helpme').'</span></li>';
$output .= '</ul></div>';

$output .= '<div class="upcoming-event-wrap">';
$output .= '<h4>'.$upcoming_event_title.'</h4>';
$output .= '<a href="'.$upcoming_event_url.'">'.$upcoming_event_btn_text.'</a>';
$output .= '</div>';
$output .= '<div class="clearfix"></div>';
$output .= '</div>';
echo '<div>'.$output.'</div>';	
}

else if ($countdown_style == '4') {
$output  = '<div id="countdown-'.$style_id.'" class="helpme-grid countdown_style_four '.$el_class.' light-skin helpme-event-countdown" data-offset="'.$offset.'" data-date="'.$date.'">';
$output .= '<div class="countdown-wrap">';
$output .= '<ul>';
$output .= '<li><span class="days countdown-timer">00</span><span class="countdown-text">'.esc_html__('Days', 'helpme').'</span></li>';
$output .= '<li><span class="hours countdown-timer">00</span><span class="countdown-text">'.esc_html__('Hours', 'helpme').'</span></li>';
$output .= '<li><span class="minutes countdown-timer">00</span><span class="countdown-text">'.esc_html__('Minutes', 'helpme').'</span></li>';
$output .= '<li><span class="seconds countdown-timer">00</span><span class="countdown-text">'.esc_html__('Seconds', 'helpme').'</span></li>';
$output .= '</ul></div>';
$output .= '</div>';
echo '<div>'.$output.'</div>';
	
}
else if ($countdown_style == '5') {
$output  = '<div id="countdown-'.$style_id.'" class="helpme-grid countdown_style_five '.$el_class.' light-skin helpme-event-countdown" data-offset="'.$offset.'" data-date="'.$date.'">';
$output .= '<div class="countdown-wrap">';
$output .= '<ul>';
$output .= '<li><span class="days countdown-timer">00</span><span class="countdown-text">'.esc_html__('Days', 'helpme').'</span></li>';
$output .= '<li><span class="hours countdown-timer">00</span><span class="countdown-text">'.esc_html__('Hours', 'helpme').'</span></li>';
$output .= '<li><span class="minutes countdown-timer">00</span><span class="countdown-text">'.esc_html__('Minutes', 'helpme').'</span></li>';
$output .= '<li><span class="seconds countdown-timer">00</span><span class="countdown-text">'.esc_html__('Seconds', 'helpme').'</span></li>';
$output .= '</ul></div>';

$output .= '<div class="upcoming-event-wrap">';
$output .= '<h4>'.$upcoming_event_title.'</h4>';
$output .= '<a href="'.$upcoming_event_url.'">'.$upcoming_event_btn_text.'</a>';
$output .= '</div>';
$output .= '<div class="clearfix"></div>';
$output .= '</div>';
echo '<div>'.$output.'</div>';	
}
// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$style_id.'" class="helpme-dynamic-styles">';
echo '<!-- ' . helpme_clean_dynamic_styles($helpme_styles) . '-->';
echo '</div>';


// Export styles to json for faster page load
$helpme_dynamic_styles[] = array(
  'id' => 'ajax-'.$style_id ,
  'inject' => $helpme_styles
);