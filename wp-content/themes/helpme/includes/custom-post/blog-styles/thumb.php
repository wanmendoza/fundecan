<?php

function blog_thumb_style($atts)
{
    global $post;
    extract($atts);
    
    $output = $item_cat = '';





    
    //$image_width  = 170;
   // $image_height = 170;
	

    $categories = get_the_category();
    
    foreach ($categories as $category) {
        $item_cat .= $category->slug . ' ';
    }
    
    
    $output .= '<article id="entry-' . get_the_ID() . '" class="blog-thumb-entry '.$thumb_column.' thumb-'.$item_id.' helpme-isotop-item ' . $item_cat . '">';
    $output .='<div class="article-wrap clearfix">';
    
    $image_src_array = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true);
    $image_src       = bfi_thumb($image_src_array[0], array(
        'width' => $image_width,
        'height' => $image_height,
        'crop' => true
    ));
    $output .= '<div class="featured-image"><a title="' . get_the_title() . '" href="' . get_permalink() . '">';
    $output .= '<img alt="' . get_the_title() . '" width="' . $image_width . '" class="item-featured-image" height="' . $image_height . '" title="' . get_the_title() . '" src="' . helpme_thumbnail_image_gen($image_src, $image_width, $image_height) . '" itemprop="image" />';
    $output .= '<div class="hover-overlay"></div>';
    $output .= '</a></div>';
   
    
    $output .= '<div class="blog-thumb-content">';
	$output .= '<div class="blog-thumb-content-inner">';
    $output .= '<h5 class="blog-title"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h5>';
    $output .= '<div class="blog-thumb-metas">';
	$output .= '<span class="blog-date">'.get_the_date().'</span>';
	//$output .= '<a href="' . get_permalink() . '/#comments" class="blog-comments"><span></span>'.esc_html__("comments","helpme").'</a>';
	if($item_cat) {
        ob_start();
		get_the_category($item_cat);
		$output .= '<div class="blog-categories"><a href="'. $item_cat .'">'. $item_cat .'</a></div>';
    }
	
	$output .= '<a href="' . Get_the_author_link() . '" class="blog-author">'.esc_html__("By : ","helpme").''.Get_the_author().'</a>';
	
	$output .= '</div>';
    if($excerpt_length != 0) {
        ob_start();
        the_excerpt_max_charlength($excerpt_length);
        $output .= '<div class="blog-excerpt">' . ob_get_clean() . '</div>';
    }
	$output .= '<a href="' . get_permalink() . '" class="blog-readmore"><span></span>Leer Mas...</a>';
	$output .= '</div>';
    $output .= '</div></div>';
    $output .= '</article>';
    
    
    return $output;
    
}
