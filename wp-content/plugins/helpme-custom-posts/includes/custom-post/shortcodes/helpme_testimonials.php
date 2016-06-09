<?php

extract(shortcode_atts(array(
    'style' => 'boxed',
    'count' => 10,
    'orderby' => 'date',
    'testimonials' => '',
    'order' => 'DESC',
    'skin' => 'dark',
	'image_width' => '370',
	'image_height' => '400',
    "el_class" => '',
    'font_family' => '',
    'font_size' => '14',
    'line_height' => '26',
    'font_color' => '',
    'font_type' => '',
    'animation' => '',
	'border_radius' => '100',
	'border_bottom' => '3',
    'animation_effect' => 'slide',
	'autoplay' => 'false',
		'tab_landscape_items' =>'' ,
		'tab_items' =>'' ,
		'desktop_items' =>'' ,
		'autoplay_speed' => 2000,
		'delay' => 1000,
		'gutter_space' =>'30',
		'item_loop' => 'false',
		'owl_nav' => 'false',
		'scroll' => 'true',
), $atts));

$id = uniqid();

require_once HELPME_THEME_PLUGINS_CONFIG . "/image-cropping.php";    

$animation_css = ($animation != '') ? (' helpme-animate-element ' . $animation . ' ') : '';

$output = $final_output = $color = '';

$query = array(
    'post_type' => 'testimonial',
    'showposts' => $count
);

// Get global JSON contructor object for styles and create local variable
global $helpme_dynamic_styles, $helpme_settings, $accent_color;
$helpme_styles = '';
$before_font_size = $image_height / 5;
if ($style == 'boxed' ) {
	
    $helpme_styles .= '
       .testi-thumb{float:left; width:'.$image_width.'px;}
	   .testimonial-content{float:left;
		width:-moz-calc(100% - '.$image_width.'px);
		width: -webkit-calc(100% - '.$image_width.'px);
		width: -o-calc(100% - '.$image_width.'px);
		width: calc(100% - '.$image_width.'px);
		height: calc('.$image_height.'px - 90px);
		overflow: auto;
		padding:0 10%;
		margin:45px 0;
		background:#fff;
		position:relative;
		}
        .helpme-testimonial.boxed-style .testimonial-content:before,
		.helpme-testimonial.boxed-style .testimonial-content:after{font-size:'.$before_font_size.'px;position:absolute;}
		.helpme-testimonial.boxed-style .owl-nav{top:0;}
        ';
}
if ( $style == 'modern') {
	
    $helpme_styles .= '
		.helpme-testimonial.modern-style .owl-item{padding-top:30px;}
		.helpme-testimonial.modern-style .slide{padding:25px 15px 10px;background:#fff;position:relative;}
       .testi-thumb{float:left; width:120px;position:relative;top:-60px;}
	   .testimonial-content{
		float:left;
		width:-moz-calc(100% - 120px);
		width: -webkit-calc(100% - 120px);
		width: -o-calc(100% - 120px);
		width: calc(100% - 120px);
		height: 100%;
		padding:0 0 0 20px;
		position:relative;
		}
		.author-details{margin-top:-35px;}
		.testimonial-quote{font-size:'.$font_size.';}
        .helpme-testimonial.modern-style .testimonial-content:before{display:none;}
		.helpme-testimonial.modern-style .testimonial-content:after{font-size:36px;position:absolute;bottom:-25px;right:25px;}
		.testimonial-author{display:inline-block !important;padding-right:10px;font-size:16px;text-transform:capitalize;}
		.helpme-testimonial.modern-style .owl-nav{top:-12px;}
        ';
}
if ( $style == 'creative') {
	
    $helpme_styles .= '
		
		.owl-item{}
		.slide{padding:30px;background:#fff;position:relative;border-bottom:'.$border_bottom.'px solid;}
       .testi-thumb{float:none; width:150px;margin:0 auto 30px;}
	   .testi-thumb img{border-radius:'.$border_radius.'px;}
	   .testimonial-content{
		float:none;
		width:100%;
		height: 100%;
		padding:0;
		position:relative;
		}
		.author-details{margin-top:0;}
		.testimonial-quote{font-size:'.$font_size.';padding:50px 0;}
		.helpme-testimonial.creative-style .testimonial-content:before{font-size:24px;position:absolute;left:0;}
		.helpme-testimonial.creative-style .testimonial-content:after{font-size:24px;position:absolute;right:0;bottom:0;}
		.testimonial-author{display:block !important;font-size:16px;text-transform:capitalize;}
        ';
}
if ($testimonials) {
    $query['post__in'] = explode(',', $testimonials);
}

if ($orderby) {
    $query['orderby'] = $orderby;
}

if ($order) {
    $query['order'] = $order;
}

$loop = new WP_Query($query);

$output .= '<div id="testimonial-'.$id.'" class="helpme-testimonial ' . $style . '-style ' . $animation_css . ' ' . $el_class . '"><div class="owl-carousel" data-items="'.$desktop_items.'" data-items-tab-ls="'.$tab_landscape_items.'" data-items-tab="'.$tab_items.'" data-autoplay="'.$autoplay.'" data-gutter="'.$gutter_space.'" data-autoplay-speed="'.$autoplay_speed.'" data-delay="'.$delay.'" data-loop="'.$item_loop.'" data-nav="'.$owl_nav.'">';

while ($loop->have_posts()):
    $loop->the_post();
    $url     = get_post_meta(get_the_ID(), '_url', true);
    $company = get_post_meta(get_the_ID(), '_company', true);
	$position = get_post_meta(get_the_ID(), '_position', true);

    $content_color = ($style == 'boxed' || $style == 'modern') ? ('color:'.$font_color.';') : '' ;
    
    if ($style == 'boxed') {
        $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
        $image_src       = bfi_thumb($image_src_array[0], array(
            'width' => $image_width,
            'height' => $image_height,
            'crop' => true
        ));
        $output .= '<div class="slide clearfix">';
		$output .= '<div class="testi-thumb">';
		$output .= '<img class="testimonial-image" src="' . helpme_thumbnail_image_gen($image_src, $image_width, $image_height) . '" alt="' . strip_tags(get_post_meta(get_the_ID(), '_author', true)) . '" />';
        $output .= '</div>';
		$output .= '<div class="testimonial-content">';
        $output .= '<div class="testimonial-quote" style="font-size:'.$font_size.'px; line-height:'.$line_height.'px; '.$content_color.'">' . get_post_meta(get_the_ID(), '_desc', true);
        $output .= '</div>';
        $output .= ($style == 'modern') ? '<h5 class="testimonial-author" style="color:'.$font_color.'">'. strip_tags(get_post_meta(get_the_ID(), '_author', true)) . '</h5>' : '<h5 class="testimonial-author">' . strip_tags(get_post_meta(get_the_ID(), '_author', true)) . '</h5>';
        $output .= '<div class="author-details">';
		$output .= !empty($position) ? ('<span class="testimonial-position">' . strip_tags(get_post_meta(get_the_ID(), '_position', true)) . ' '.esc_html__(',', 'helpme').'</span>') : '';
		$output .= !empty($company) ? ('<a target="_blank" ' . (!empty($url) ? ('href="' . $url . '"') : '') . ' class="testimonial-company">' . strip_tags($company) . '</a>') : '';
        $output .= '</div>';
		$output .= '</div>';
        $output .= '</div>';
    }else if ($style == 'modern') {
        $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
        $image_src       = bfi_thumb($image_src_array[0], array(
            'width' => 120,
            'height' => 120,
            'crop' => true
        ));
        $output .= '<div class="slide clearfix">';
		$output .= '<div class="testi-thumb">';
		$output .= '<img class="testimonial-image" src="' . helpme_thumbnail_image_gen($image_src, 120, 120) . '" alt="' . strip_tags(get_post_meta(get_the_ID(), '_author', true)) . '" />';
        $output .= '</div>';
		$output .= '<div class="testimonial-content">';
        $output .= '<div class="testimonial-quote" style="font-size:'.$font_size.'px; line-height:'.$line_height.'px; '.$content_color.'">' . get_post_meta(get_the_ID(), '_desc', true);
        $output .= '</div>';
		$output .= '</div><div class="clearboth"></div>';
		
		$output .= '<div class="author-details">';
		$output .= ($style == 'modern') ? '<h5 class="testimonial-author" style="color:'.$font_color.'">'. strip_tags(get_post_meta(get_the_ID(), '_author', true)) . '</h5>' : '<h5 class="testimonial-author">' . strip_tags(get_post_meta(get_the_ID(), '_author', true)) . '</h5>';
		$output .= !empty($position) ? ('<span class="testimonial-position">' . strip_tags(get_post_meta(get_the_ID(), '_position', true)) . ' '.esc_html__(',', 'helpme').'</span>') : '';
		$output .= !empty($company) ? ('<a target="_blank" ' . (!empty($url) ? ('href="' . $url . '"') : '') . ' class="testimonial-company">' . strip_tags($company) . '</a>') : '';
        $output .= '</div>';
        $output .= '</div>';
    }else if ($style == 'creative') {
        $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
        $image_src       = bfi_thumb($image_src_array[0], array(
            'width' => 150,
            'height' => 150,
            'crop' => true
        ));
        $output .= '<div class="slide clearfix">';
		$output .= '<div class="testi-thumb">';
		$output .= '<img class="testimonial-image" src="' . helpme_thumbnail_image_gen($image_src, 120, 120) . '" alt="' . strip_tags(get_post_meta(get_the_ID(), '_author', true)) . '" />';
        $output .= '</div>';
		$output .= '<div class="testimonial-content">';
        $output .= '<div class="testimonial-quote" style="font-size:'.$font_size.'px; line-height:'.$line_height.'px; '.$content_color.'">' . get_post_meta(get_the_ID(), '_desc', true);
        $output .= '</div>';
		$output .= '</div><div class="clearboth"></div>';
		
		$output .= '<div class="author-details">';
		$output .= ($style == 'modern') ? '<h5 class="testimonial-author" style="color:'.$font_color.'">'. strip_tags(get_post_meta(get_the_ID(), '_author', true)) . '</h5>' : '<h5 class="testimonial-author">' . strip_tags(get_post_meta(get_the_ID(), '_author', true)) . '</h5>';
		$output .= !empty($position) ? ('<span class="testimonial-position">' . strip_tags(get_post_meta(get_the_ID(), '_position', true)) . ' '.esc_html__(',', 'helpme').'</span>') : '';
		$output .= !empty($company) ? ('<a target="_blank" ' . (!empty($url) ? ('href="' . $url . '"') : '') . ' class="testimonial-company">' . strip_tags($company) . '</a>') : '';
        $output .= '</div>';
        $output .= '</div>';
    }else{
        
        $output .= '<div class="swiper-slide">';
        $output .= '<div class="testimonial-quote" style="font-size:'.$font_size.'px; line-height:'.$line_height.'px; '.$content_color.'">' . get_post_meta(get_the_ID(), '_desc', true) . '</div>';
        $output .= '<div class="testimonial-footer-note">';
        $output .= '<span class="testimonial-author">' . strip_tags(get_post_meta(get_the_ID(), '_author', true)) . '</span>';
        $output .= !empty($company) ? ('<a target="_blank" ' . (!empty($url) ? ('href="' . $url . '"') : '') . ' class="testimonial-company">' . strip_tags($company) . '</a>') : '';
        $output .= '</div>';
        $output .= '</div>';
        
    }
endwhile;

wp_reset_query();
$output .= '</div></div>';


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

