<?php

extract(shortcode_atts(array(
    'count' => 6,
    'column' => '3',
	'gutter_space' => 30,
    'style' => 'grid',
    'dimension' => 370,
	'dimensionh' => 400,
    'causes' => '',
	'cause_grid_count' => 'col-3',
    'animation' => '',
    'scroll' => 'true',
    'description' => 'false',
    'el_class' => '',
    'offset' => '',
    'autoplay' => 'true',
	'tab_landscape_items' => 3,
	'tab_items' => 2,
	'desktop_items' => 3,
	'autoplay_speed' => 2000,
	'delay' => 1000,
	'item_loop' => 'true',
	'owl_nav' => 'true',
    'directionNav' => 'true',
    'full_width_image' => 'false',
    'orderby' => 'date',
    'order' => 'DESC'
), $atts));

require_once HELPME_THEME_PLUGINS_CONFIG . "/image-cropping.php";    

$id     = uniqid();
$style_id = uniqid();
$output = $image_width = '';

$scroll_stuff = array(
    '',
    '',
    '',
    '',
    ''
);

global $helpme_dynamic_styles;
$helpme_styles = '';
if ($desktop_items == '4'){
	$helpme_styles .= ' 
		.cause-item-inner .mg-btn-grey{min-width: 100px !important;font-size:11px !important;padding:12px 10px !important;margin-right:10px !important;}
		.cause-readmore a { min-width: 100px;font-size:11px;padding:8px 5px 6px;}
		.cause-content-inner .cause-campaign p.progress-bar-text {font-size:10px; font-weight:400;}
	';
	
}
if($full_width_image == 'true'){
    $image_width = 'width:100%;';
}


$query = array(
    'post_type' => 'causes',
    'showposts' => $count
);

if ($causes) {
    $query['post__in'] = explode(',', $causes);
}
if ($offset) {
    $query['offset'] = $offset;
}
if ($orderby) {
    $query['orderby'] = $orderby;
}
if ($order) {
    $query['order'] = $order;
}

$loop = new WP_Query($query);

$animation_css = ($animation != '') ? ' helpme-animate-element ' . $animation . ' ' : '';

if ($style == 'column'):
    if($column == 1){
		$column_css = 'one';
	}else if($column == 2){
		$column_css = 'two';
	}else if($column == 3){
		$column_css = 'three';
	}else if($column == 5){
		$column_css = 'four';
	}


    $output .= '<div id="causes-' . $id . '" class="helpme-causes helpme-shortcode ' . $el_class . ' ' . $column_css . '-column ' . $style . '-style "><ul class="clearfix">';

    $i = 0;
    while ($loop->have_posts()):
        $loop->the_post();
        $i++;
        $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
        $image_src       = bfi_thumb($image_src_array[0], array(
            'width' => $dimension,
            'height' => $dimensionh,
            'crop' => true
        ));

        $first_column = '';

        $output .= '<li class="helpme-cause-item"><div class="cause-item-wrapper">';


        $output .= $style == 'grid' ? '<div class="owl-items">' : '<div class="item">';
        $output .= '<div class="cause-item-inner">';
		$output .= '<div class="cause-item-figure">';
		$output .= '<img alt="' . get_the_title() . '" style="'.$image_width.'" title="' . get_the_title() . '" src="' . helpme_thumbnail_image_gen($image_src, $dimension, $dimensionh) . '" />';
		
		$output .= '</div>';

        $output .= '<div class="cause-content-wrapper"><div class="cause-content-inner">';
        $output .= '<h5 class="cause-title"><a href="'. get_permalink() .'">' . get_the_title() . '</a></h5>';
		
		if ($description == 'true') {
			$output .= '<div class="cause-title-divider"></div>';
            $content = get_post_meta(get_the_ID(), '_cause_summery', true);
            $content = str_replace(']]>', ']]&gt;', apply_filters('the_content', $content));
            $output .= '<span class="cause-desc">' . $content . '</span>';
        }
		$campaigns =get_post_meta(get_the_ID(), '_campaign', true);
		$campaign= $campaigns;
		if (!empty($campaigns)) {
		$output .= '<span class="cause-campaign">'. do_shortcode('[totaldonations-progress-bar campaign="'.$campaign.'" button="yes" button_text="DONATE NOW"]') .'</span>';
        }
		$output .= '<div class="cause-readmore"><a href="'. get_permalink() .'">' . esc_html__('Read More', 'helpme') . '</a></div>';
		$output .= '</div></div></div></div>';
		
        

        $output .= '</li>';



        //if ($i % $column == 0) {
            //$output .= '<li class="clearboth"></li>';
        //}
    endwhile;
    wp_reset_postdata();

    $output .= '</ul><div class="clearboth"></div></div>';
else:
    if ($scroll == 'true') {
        $scroll_stuff = array(
            'owl-content-wrap',
            '',
            'cause-',
            'owl-content'
        );
    }


    $output .= '<div id="causes-' . $id . '" class="helpme-causes ' . $scroll_stuff[0] . $el_class . ' ' . $style . '-style "' . $scroll_stuff[1] . '><div class="owl-carousel" data-items="'.$desktop_items.'" data-items-tab-ls="'.$tab_landscape_items.'" data-items-tab="'.$tab_items.'" data-autoplay="'.$autoplay.'" data-gutter="'.$gutter_space.'" data-autoplay-speed="'.$autoplay_speed.'" data-delay="'.$delay.'" data-loop="'.$item_loop.'" data-nav="'.$owl_nav.'">';

    while ($loop->have_posts()):
        $loop->the_post();

        $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
        $image_src       = bfi_thumb($image_src_array[0], array(
            'width' =>$dimension,
            'height' => $dimensionh,
            'crop' => true
        ));

        $output .= $style == 'grid' ? '<div class="item">' : '<div class="">';
        $output .= '<div class="cause-item-inner">';
		$output .= '<div class="cause-item-figure">';
		$output .= '<img alt="' . get_the_title() . '" style="'.$image_width.'" title="' . get_the_title() . '" src="' . helpme_thumbnail_image_gen($image_src, $dimension, $dimensionh) . '" />';
		
		$output .= '</div>';

        $output .= '<div class="cause-content-wrapper"><div class="cause-content-inner">';
        $output .= '<h5 class="cause-title"><a href="'. get_permalink() .'">' . get_the_title() . '</a></h5>';
		
		if ($description == 'true') {
			$output .= '<div class="cause-title-divider"></div>';
            $content = get_post_meta(get_the_ID(), '_cause_summery', true);
            $content = str_replace(']]>', ']]&gt;', apply_filters('the_content', $content));
            $output .= '<div class="cause-desc">' . $content . '</div>';
        }
		
		$campaigns =get_post_meta(get_the_ID(), '_campaign', true);
		$campaign= $campaigns;
		$output .= '<div class="cause-campaign">';
		if (!empty($campaigns) && function_exists('totaldonations_bar_widget')) {
		$output .= do_shortcode('[totaldonations-progress-bar campaign="'.$campaign.'" button="yes" button_text="DONATE NOW"]');
        }
		$output .= '<div class="cause-readmore"><a href="'. get_permalink() .'">' . esc_html__('Read More', 'helpme') . '</a></div>';
		$output .= '</div></div></div></div></div>';
    endwhile;
    wp_reset_postdata();

    $output .= '</div></div>';
endif;


echo '<div>'.$output.'</div>';

// Hidden styles node for head injection after page load through ajax
echo '<div id="ajax-'.$style_id.'" class="helpme-dynamic-styles">';
echo '<!-- ' . helpme_clean_dynamic_styles($helpme_styles) . '-->';
echo '</div>';


// Export styles to json for faster page load
$helpme_dynamic_styles[] = array(
  'id' => 'ajax-'.$style_id ,
  'inject' => $helpme_styles
);

