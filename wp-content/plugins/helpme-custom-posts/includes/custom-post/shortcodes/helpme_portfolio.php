<?php

extract(shortcode_atts(array(
    'style' => 'standard',
    'hover_style' => 'parallax',
    'hove_bg_color' => '',
    'column' => 3,
	'helpme_portfolio_gutter' => 'portfolio_no_gutter',
    'count' => 10,
    "sortable" => 'false',
    'sortable_align' => 'center',
    'pagination' => 'false',
    'pagination_style' => '1',
    'width' => '730',
    'height' => '',
    'dimension' => 400,
    'cat' => '', // Deprecated
    'categories' => '',
    'author' => '',
    'posts' => '',
    'offset' => 0,
    'order' => 'DESC',
    'orderby' => 'date',
    'image_quality' => 1,
    'ajax' => 'false',
    'item_row' => 1,
    'show_logo' => 'false',
    'plus_icon' => 'true',
    'permalink_icon' => 'true',
    'item_id' => '',
    'image_size' => 'crop',
	'scroll' => '',
	'autoplay' => 'false',
	'tab_landscape_items' => '3',
	'tab_items' => '2',
	'desktop_items' => '3',
	'autoplay_speed' => 2000,
	'delay' => 1000,
	'item_loop' => 'false',
	'owl_nav' => 'false',
	'gutter_space' => '30'
), $atts));

global $helpme_settings, $helpme_dynamic_styles;

$helpme_styles = '';
$style_id = uniqid();
$cat = !empty($categories) ? $categories : $cat;

$grid_width    = $helpme_settings['grid-width'];
$content_width = $helpme_settings['content-width'];

$paged = (get_query_var('paged')) ? get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);


$query = array(
    'post_type' => 'portfolio',
    'posts_per_page' => (int) $count,
    'paged' => $paged,
    'suppress_filters' => 0
);

if ($cat != '') {
    $query['tax_query'] = array(
        array(
            'taxonomy' => 'portfolio_category',
            'field' => 'slug',
            'terms' => explode(',', $cat)
        )
    );
}
if ($posts) {
    $query['post__in'] = explode(',', $posts);
}
if ($orderby) {
    $query['orderby'] = $orderby;
}
if ($order) {
    $query['order'] = $order;
}

if ($author) {
    $query['author'] = $author;
}

if ($offset && $pagination_style != 2) {
    $query['offset'] = $offset;
}

$r = new WP_Query($query);


if (is_singular()) {
    global $post;
    $layout = get_post_meta($post->ID, '_layout', true);
} else {
    $layout = 'right';
}

if(is_archive('portfolio') && $pagination == 'false'){
	
	$pagination = 'true';
}
if($helpme_portfolio_gutter == 'portfolio_no_gutter'){
	
	$helpme_styles .= ' 
		.helpme-pagination{margin-top:30px;}
	';
	
}


$item_id = (!empty($item_id)) ? $item_id : 12334566777;

$atts                  = array(
    'column' => $column,
	'helpme_portfolio_gutter' => $helpme_portfolio_gutter,
    'ajax' => $ajax,
    'layout' => $layout,
    'width' => $width,
    'height' => $height,
    'show_logo' => $show_logo,
    'pagination' => $pagination,
    'grid_width' => $grid_width,
    'content_width' => $content_width,
    'dimension' => $dimension,
    'image_quality' => $image_quality,
    'item_row' => $item_row,
    'permalink_icon' => $permalink_icon,
    'plus_icon' => $plus_icon,
    'hover_style' => $hover_style,
    'item_id' => $item_id,
    'image_size' => $image_size
);
$paginaton_style_class = $output = '';

$scroller_style = array(
    '',
    ''
);

if ($pagination_style == '2') {
    $paginaton_style_class = 'load-button-style';
} else if ($pagination_style == '3') {
    $paginaton_style_class = 'scroll-load-style';
} else {
    $paginaton_style_class = 'page-nav-style';
}


$ajax_state_class = ($ajax == 'true') ? 'portfolio-ajax-enabled' : '';

$enable_isotop = ($style != 'scroller') ? 'isotop-enabled helpme-theme-loop ' : '';


if ($style == 'scroller') {
    $scroller_style = array(
        '',
        ''
    );
}

$id = uniqid();



$output .= '<div class="portfolio-grid ' . $ajax_state_class . '">';

if ($sortable == 'true' && !is_archive() && $style != 'scroller') {
    $output .= '<header class="helpme-isotop-filter"><ul class="align-'.$sortable_align.'">';
    $terms = array();
    if ($cat != '') {
        foreach (explode(',', $cat) as $term_slug) {
            $terms[] = get_term_by('slug', $term_slug, 'portfolio_category');
        }
    } else {
        $terms = get_terms('portfolio_category', 'hide_empty=1&suppress_filters=0');

        /*
        In order to order category filter by Ascending or Descending change above line as below :

        Descending Order : $terms = get_terms( 'portfolio_category', 'hide_empty=1&order=DESC' );

        Ascending Order : $terms = get_terms( 'portfolio_category', 'hide_empty=1&order=ASC' );

        Alternatively you can order them by :

        * orderby
        - id
        - count
        - name - Default
        - slug
        - none
        You will need to add this param as below example :

        Order by count and ascending :  $terms = get_terms( 'portfolio_category', 'hide_empty=1&order=ASC&orderby=count' );

        */

    }
    $output .= '<li><a class="current" data-filter="*" href="#">' . esc_html__('All', 'helpme') . '</a></li>';
    
    foreach ($terms as $term) {
        $output .= '<li><a data-filter=".' . $term->slug . '" href="#">' . $term->name . '</a></li>';
    }

    $output .= '</ul>';
    $output .= '<div class="clearboth"></div></header>';
}


if ($ajax == 'true' && $style != 'scroller') {
    $output .= '<div class="helpme-inner-grid"><div class="ajax-container"><div class="portfolio-ajax-holder">';

    $output .= '<div class="ajax-controls">';
    $output .= '<a href="#" class="prev-ajax"><i class="helpme-theme-icon-prev-big"></i></a>';
    $output .= '<a href="#" class="next-ajax"><i class="helpme-theme-icon-next-big"></i></a>';
    $output .= '<a href="#" class="close-ajax"><i class="helpme-icon-times"></i></a>';
    $output .= '</div>';

    $output .= '</div></div></div>';
}


$output .= '<div class="loop-main-wrapper">';
$output .= '<div class="portfolio-loader"><div class="helpme-loader"></div></div>';
if ($style != 'scroller') {
$output .= '<section id="helpme-portfolio-loop-' . $id . '" data-uniqid="'.$item_id.'" data-style="' . $style . '" class="helpme-portfolio-container ' . $enable_isotop . 'helpme-portfolio-' . $style . ' ' .$helpme_portfolio_gutter. ' ' . $scroller_style[0] . $paginaton_style_class . ' "' . $scroller_style[1] . '>' . "\n";
}else{
	$output .= '<section id="helpme-portfolio-loop-' . $id . '">';
}
if ($style == 'scroller') {
    $output .= '<div class="owl-carousel" data-items="'.$desktop_items.'" data-items-tab-ls="'.$tab_landscape_items.'" data-items-tab="'.$tab_items.'" data-autoplay="'.$autoplay.'" data-gutter="'.$gutter_space.'" data-autoplay-speed="'.$autoplay_speed.'" data-delay="'.$delay.'" data-loop="'.$item_loop.'" data-nav="'.$owl_nav.'">';
}

$i = 0;
if (is_archive()):
    if (have_posts()):
        while (have_posts()):
            the_post();
             $i++;
            switch ($style) {

               // case 'grid':
                 //   $output .= helpme_portfolio_grid_loop($r, $atts, 1);
                 //   break;
                case 'standard':
                    $output .= helpme_portfolio_standard_loop($r, $atts, 1);
                    break;

               // case 'masonry':
                    //$output .= helpme_portfolio_masonry_loop($r, $atts, 1);
                   // break;

               // case 'flip':
                 //   $output .= helpme_portfolio_flip_loop($r, $atts, 1);
                  //  break;

                case 'scroller':
                    $output .= helpme_portfolio_scroller_loop($r, $atts, 1, $i);
                    break;
            }
        endwhile;
    endif;
else:
    if ($r->have_posts()):
        while ($r->have_posts()):
            $r->the_post();
            $i++;
            switch ($style) {

               // case 'grid':
                  //  $output .= helpme_portfolio_grid_loop($r, $atts, 1);
                  //  break;

                case 'standard':
                    $output .= helpme_portfolio_standard_loop($r, $atts, 1);
                    break;

               // case 'masonry':
               //     $output .= helpme_portfolio_masonry_loop($r, $atts, 1);
                //    break;

               // case 'flip':
               //     $output .= helpme_portfolio_flip_loop($r, $atts, 1);
               //     break;

                case 'scroller':
                    $output .= helpme_portfolio_scroller_loop($r, $atts, 1, $i);
                    break;
            }
        endwhile;
    endif;
endif;

if ($style == 'scroller') {
    $output .= '</div>';
}

$gradient_color = isset($hove_bg_color) && !empty($hove_bg_color) ? $hove_bg_color : $helpme_settings['accent-color'] ;

if ($hover_style == 'gradient'){


// Get global JSON contructor object for styles and create local variable
global $helpme_dynamic_styles;

    
    $helpme_styles .= '
        .hover-overlay {
            background: -webkit-linear-gradient('.helpme_convert_rgba($gradient_color, 0).' 0%, '.helpme_convert_rgba($gradient_color, 0.6).' 100%);
            background: -o-linear-gradient('.helpme_convert_rgba($gradient_color, 0).' 0%, '.helpme_convert_rgba($gradient_color, 0.6).' 100%);
            background: linear-gradient('.helpme_convert_rgba($gradient_color, 0).' 0%, '.helpme_convert_rgba($gradient_color, 0.6).' 100%);
        }
		.parallax-hover .hover-overlay {
            background: -webkit-linear-gradient('.helpme_convert_rgba($gradient_color, 0.9).' 0%, '.helpme_convert_rgba($gradient_color, 0.9).' 100%);
            background: -o-linear-gradient('.helpme_convert_rgba($gradient_color, 0.9).' 0%, '.helpme_convert_rgba($gradient_color, 0.9).' 100%);
            background: linear-gradient('.helpme_convert_rgba($gradient_color, 0.9).' 0%, '.helpme_convert_rgba($gradient_color, 0.9).' 100%);
        }
		';

        // Hidden styles node for head injection after page load through ajax
        echo '<div id="ajax-'.$id.'" class="helpme-dynamic-styles">';
        echo '<!-- ' . helpme_clean_dynamic_styles($helpme_styles) . '-->';
        echo '</div>';


        // Export styles to json for faster page load
        $helpme_dynamic_styles[] = array(
          'id' => 'ajax-'.$id ,
          'inject' => $helpme_styles
        );
}

$output .= '</section><div class="clearboth"></div>' . "\n\n";


if ($style != 'scroller') {


    if ($pagination == 'true') {
        $output .= '<a class="helpme-loadmore-button" style="display:none;" href="#"><i class="helpme-icon-circle-o-notch"></i><i class="helpme-icon-chevron-down"></i></a>';
        ob_start();
        helpme_theme_blog_pagenavi('', '', $r, $paged);
        $output .= ob_get_clean();
    }
}
$output .= '</div></div>';
wp_reset_postdata();
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
