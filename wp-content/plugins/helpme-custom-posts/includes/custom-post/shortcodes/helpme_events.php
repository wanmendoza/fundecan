<?php
extract( shortcode_atts( array( 
		'cat' => '', 
		'style' => 'column',
		'number_count' =>3,
		'helpme_error' => 'n',
		'column' => '3',
		'responsive_column' => '2',
		'event_dimension' => 370,
		'dimensionh' => 250,
		'full_width_image' => 'true',
		'autoplay' => 'true',
		'tab_landscape_items' => 3,
		'tab_items' => 2,
		'desktop_items' =>3,
		'autoplay_speed' => 2000,
		'delay' => 1000,
		'gutter_space' =>30,
		'item_loop' => 'true',
		'owl_nav' => 'true',
		'scroll' => 'false',
		'el_class' => '',
	), $atts));

$id = uniqid();

/* set the [helpme-tribe-events] shortcode */


	if ( !function_exists( 'tribe_get_events' ) ) { 
		return;
	}

	global $wp_query, $tribe_ecp, $post, $no_upcoming_events, $event_id, $start_date, $el_class, $helpme_dynamic_styles;
	
	$helpme_styles = '';

if ($scroll == 'true' ) {
	
		$helpme_styles .= '
owl-carousel .owl-item .col-md-12{padding:0;}
    ';
}
	
	$output='';
	$helpme_event_tax = '';
	
	extract( shortcode_atts( array( 
		'style' => $style,
		'cat' => '', 
		'number_count' =>'',
		'scroll' => $scroll,
		'helpme_error' => 'n',
		'column' => $column,
		'responsive_column' => $responsive_column,
		'dimension' => $event_dimension,
		'full_width_image' => 'false',
		'autoplay' => $autoplay,
		'tab_landscape_items' => $tab_landscape_items,
		'tab_items' => $tab_items,
		'desktop_items' => $desktop_items,
		'autoplay_speed' => $autoplay_speed,
		'delay' => $delay,
		'gutter_space' => $gutter_space,
		'item_loop' => $item_loop,
		'owl_nav' => $owl_nav,
		'el_class' => '',
	), $atts));



require_once HELPME_THEME_PLUGINS_CONFIG . "/image-cropping.php";    


$output = $image_width = '';




if($full_width_image == 'true'){
    $image_width = 'width:100%;';
}
if($column == 1){
	
	$column = '12';
}
if($column == 2){
	
	$column = '6';
}else if($column == 3)	{
	$column = '4';
	
}else if($column == 4)	{
	$column = '3';
	
}
if($responsive_column == 1){
	
	$responsive_column = '12';
}
if($responsive_column == 2){
	
	$responsive_column = '6';
}else if($responsive_column == 3)	{
	$responsive_column = '4';
	
}else if($responsive_column == 4)	{
	$responsive_column = '3';
	
}else if($responsive_column == 1){
	$responsive_column = '12';
	
};


	if ( $cat ) {
		$helpme_event_tax = array( 
			array(
				'taxonomy' => 'tribe_events_cat',
				'field' => 'slug',
				'terms' => $cat
			) 
		);
	}

	$posts = tribe_get_events(apply_filters('tribe_events_list_widget_query_args', array(
			'list' => 'upcoming',
			'posts_per_page' => $number_count,
			'tax_query'=> $helpme_event_tax,
			
			
	)));
	$item_row = 3;
	if($item_row == 3){
		$helpme_styles .= '

    ';
		
	}
	$i = 0;
	if ( $posts && !$no_upcoming_events) {
		if($style == 'column' && $scroll == 'false'):
			$output .= '<div class="row hfeed vcalendar helpme-small helpme-event-list">';
			foreach( $posts as $post ) :
				setup_postdata( $post );
				$i++;
				$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
				$image_src = bfi_thumb($image_src_array[0], array(
				'width' => $dimension,
				'height' => $dimensionh,
				'crop' => true
			));
				$output .= '<div class="col-md-'. $column .' col-sm-'. $responsive_column .' col-xs-12">';
				$output .= '<div class="helpme-event-wrap clearfix">';
				
				//$output .= '<div class="entry-thumb">' . tribe_event_featured_image( $event_id, false, false ) . '</div>';
				$output .= '<img alt="' . get_the_title() . '" style="'.$image_width.'" title="' . get_the_title() . '" src="' . helpme_thumbnail_image_gen($image_src, $dimension, $dimensionh) . '" />';
				$output .= '<div class="event-left-content">';
				$output .= '<div class="helpme-event-date">' . tribe_get_start_date($start_date,false, $dateformat = ('j') ) . '</div>';
				$output .= '<div class="helpme-event-month">' . tribe_get_start_date($start_date,false, $dateformat = ('F'), $timezone = null  ) . '</div>';
				$output .= '<div class="helpme-event-year">' . tribe_get_start_date($start_date,false, $dateformat = ('Y') ) . '</div>';
				$output .= '</div>';
				$output .= '<div class="event-right-content clearfix">';
				$output .= '<div class="helpme-event-title">';
				$output .= '<h5 class="event-title summary">' . '<a href="' . tribe_get_event_link() . '" rel="bookmark">' . get_the_title() . '</a>' . '</h5>';
				$output .= '</div>';
				$output .= '<div class="helpme-event-divider"></div>';
				$output .= '<div class="event-vanue-meta">';
				$output .= '<div class=" helpme-event-venue">' . tribe_get_venue() . '</div>';
				$output .= '<div class="helpme-event-duration">' . tribe_get_start_time( $event = null, $dateFormat = '', $timezone = null ) . ' ' . tribe_get_end_time( $event = null, $dateFormat = '', $timezone = null ) . '</div>';
				$output .= '</div></div></div></div>';
			endforeach;
			$output .= '</div><!-- .hfeed -->';
		endif;
		if($style == 'thumb' && $scroll == 'false'):
			$output .= '<div class="row hfeed vcalendar helpme-small helpme-event-list">';
			foreach( $posts as $post ) :
				setup_postdata( $post );
				$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
				$image_src = bfi_thumb($image_src_array[0], array(
				'width' => 270,
				'height' => 140,
				'crop' => true
			));
				$output .= '<div class="col-md-12">';
				$output .= '<div class="helpme-event-wrap thumb-style clearfix">';
				
				//$output .= '<div class="entry-thumb">' . tribe_event_featured_image( $event_id, false, false ) . '</div>';
				
				$output .= '<div class="event-left-content">';
				$output .= '<div class="helpme-event-date">' . tribe_get_start_date($start_date,false, $dateformat = ('j') ) . '</div>';
				$output .= '<div class="helpme-event-month">' . tribe_get_start_date($start_date,false, $dateformat = ('F'), $timezone = null  ) . '</div>';
				$output .= '<div class="helpme-event-year">' . tribe_get_start_date($start_date,false, $dateformat = ('Y') ) . '</div>';
				$output .= '</div>';
				$output .= '<div class="event-center-content event-entry-thumb"><img alt="' . get_the_title() . '" style="'.$image_width.'" title="' . get_the_title() . '" src="' . helpme_thumbnail_image_gen($image_src, 270, 140) . '" /></div>';
				$output .= '<div class="event-right-content clearfix">';
				$output .= '<div class="helpme-event-title">';
				$output .= '<h5 class="event-title summary">' . '<a href="' . tribe_get_event_link() . '" rel="bookmark">' . get_the_title() . '</a>' . '</h5>';
				$output .= '</div>';
				$output .= '<div class="helpme-event-divider"></div>';
				$output .= '<div class="event-vanue-meta">';
				$output .= '<div class="helpme-event-duration"><i class="helpme-icon-clock-o"></i>' . tribe_get_start_time( $event = null, $dateFormat = '', $timezone = null ) . ' ' . tribe_get_end_time( $event = null, $dateFormat = '', $timezone = null ) . '</div>';
				$output .= '<div class=" helpme-event-venue"><i class="helpme-icon-map-marker"></i>' . tribe_get_venue() . '</div>';
				$output .= '</div></div></div></div>';
			endforeach;
			$output .= '</div><!-- .hfeed -->';
		endif;
		/*if($style == 'column' && $scroll == 'true'):
			$output .= '<div class=" hfeed vcalendar helpme-small helpme-event-list owl-carousel" data-items="'.$desktop_items.'" data-items-tab-ls="'.$tab_landscape_items.'" data-items-tab="'.$tab_items.'" data-autoplay="'.$autoplay.'" data-gutter="'.$gutter_space.'" data-autoplay-speed="'.$autoplay_speed.'" data-delay="'.$delay.'" data-loop="'.$item_loop.'" data-nav="'.$owl_nav.'">';
			foreach( $posts as $post ) :
				setup_postdata( $post );
				$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
				$image_src = bfi_thumb($image_src_array[0], array(
				'width' => $dimension,
				'height' => $dimensionh,
				'crop' => true
			));
				$output .= '<div class="">';
				$output .= '<div class="helpme-event-wrap clearfix">';
				
				//$output .= '<div class="entry-thumb">' . tribe_event_featured_image( $event_id, false, false ) . '</div>';
				$output .= '<img alt="' . get_the_title() . '" style="'.$image_width.'" title="' . get_the_title() . '" src="' . helpme_thumbnail_image_gen($image_src, $dimension, $dimensionh) . '" />';
				$output .= '<div class="event-left-content">';
				$output .= '<div class="helpme-event-date">' . tribe_get_start_date($start_date,false, $dateformat = ('j') ) . '</div>';
				$output .= '<div class="helpme-event-month">' . tribe_get_start_date($start_date,false, $dateformat = ('F'), $timezone = null  ) . '</div>';
				$output .= '<div class="helpme-event-year">' . tribe_get_start_date($start_date,false, $dateformat = ('Y') ) . '</div>';
				$output .= '</div>';
				$output .= '<div class="event-right-content clearfix">';
				$output .= '<div class="helpme-event-title">';
				$output .= '<h5 class="event-title summary">' . '<a href="' . tribe_get_event_link() . '" rel="bookmark">' . get_the_title() . '</a>' . '</h5>';
				$output .= '</div>';
				$output .= '<div class="helpme-event-divider"></div>';
				$output .= '<div class="event-vanue-meta">';
				$output .= '<div class=" helpme-event-venue">' . tribe_get_venue() . '</div>';
				$output .= '<div class="helpme-event-duration">' . tribe_get_start_time( $event = null, $dateFormat = '', $timezone = null ) . ' ' . tribe_get_end_time( $event = null, $dateFormat = '', $timezone = null ) . '</div>';
				$output .= '</div></div></div></div>';
			endforeach;
			$output .= '</div><!-- .hfeed -->';
		endif;
		if($style == 'thumb' && $scroll == 'true' ):
			$output .= '<div class=" hfeed vcalendar helpme-small helpme-event-list owl-carousel" data-items="'.$desktop_items.'" data-items-tab-ls="'.$tab_landscape_items.'" data-items-tab="'.$tab_items.'" data-autoplay="'.$autoplay.'" data-gutter="'.$gutter_space.'" data-autoplay-speed="'.$autoplay_speed.'" data-delay="'.$delay.'" data-loop="'.$item_loop.'" data-nav="'.$owl_nav.'">';
			foreach( $posts as $post ) :
				setup_postdata( $post );
				$image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
				$image_src = bfi_thumb($image_src_array[0], array(
				'width' => 270,
				'height' => 140,
				'crop' => true
			));
				$output .= '<div class="col-md-12">';
				$output .= '<div class="helpme-event-wrap thumb-style clearfix">';
				
				//$output .= '<div class="entry-thumb">' . tribe_event_featured_image( $event_id, false, false ) . '</div>';
				
				$output .= '<div class="event-left-content">';
				$output .= '<div class="helpme-event-date">' . tribe_get_start_date($start_date,false, $dateformat = ('j') ) . '</div>';
				$output .= '<div class="helpme-event-month">' . tribe_get_start_date($start_date,false, $dateformat = ('F'), $timezone = null  ) . '</div>';
				$output .= '<div class="helpme-event-year">' . tribe_get_start_date($start_date,false, $dateformat = ('Y') ) . '</div>';
				$output .= '</div>';
				$output .= '<div class="event-center-content event-entry-thumb"><img alt="' . get_the_title() . '" style="'.$image_width.'" title="' . get_the_title() . '" src="' . helpme_thumbnail_image_gen($image_src, 270, 140) . '" /></div>';
				$output .= '<div class="event-right-content clearfix">';
				$output .= '<div class="helpme-event-title">';
				$output .= '<h5 class="event-title summary">' . '<a href="' . tribe_get_event_link() . '" rel="bookmark">' . get_the_title() . '</a>' . '</h5>';
				$output .= '</div>';
				$output .= '<div class="helpme-event-divider"></div>';
				$output .= '<div class="event-vanue-meta">';
				$output .= '<div class="helpme-event-duration"><i class="helpme-icon-clock-o"></i>' . tribe_get_start_time( $event = null, $dateFormat = '', $timezone = null ) . ' ' . tribe_get_end_time( $event = null, $dateFormat = '', $timezone = null ) . '</div>';
				$output .= '<div class=" helpme-event-venue"><i class="helpme-icon-map-marker"></i>' . tribe_get_venue() . '</div>';
				$output .= '</div></div></div></div>';
			endforeach;
			$output .= '</div><!-- .hfeed -->';
		endif;*/
	} else { //No Events were Found
		$output .= ( $helpme_error == 'y' ? '<p>' . translate( 'There are no upcoming events at this time.', 'tribe-events-calendar' ) . '</p>' : '' ) ;
	
	} // endif

	wp_reset_postdata();
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



