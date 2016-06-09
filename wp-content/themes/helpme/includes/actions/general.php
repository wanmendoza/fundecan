<?php
/**
 *
 *
 * @author  Muhammad Asif
 * @copyright Copyright (c) Muhammad Asif
 * @link  http://designsvilla.net
 * @since  Version 1.0
 * @package  Helpme  Framework
 */


add_action( 'page_title', 'helpme_page_title' );
// add_action( 'breadcrumbs', 'helpme_breadcrumbs' );
add_action( 'subfooter_social', 'helpme_subfooter_social' );
add_action( 'theme_breadcrumbs', 'helpme_theme_breadcrumbs' );
//add_action( 'quick_contact', 'helpme_quick_contact' ); 
add_action( 'subfooter_logos', 'helpme_subfooter_logos' ); 




if ( !function_exists( 'helpme_page_title' ) ) {
	
	function helpme_page_title() {
		global $helpme_settings,$event_id,$post,$page_id,$event;
		
		$post_id = global_get_post_id();

		$title = $breadcrumb = $intro = $fullHeight ='';
		$align = 'left';

		if ( get_post_type( $event)) {
		
			$title = esc_html__( 'UPCOMING EVENT', 'helpme' );
		}
		if ( is_post_type_archive('portfolio')) {
		
			$title = esc_html__( 'OUR PORTFOLIO', 'helpme' );
		}
		if ( is_post_type_archive('causes')) {
		
			$title = esc_html__( 'OUR CAUSES', 'helpme' );
		}
		if ($post_id) {
			$template = get_post_meta( $post_id, '_template', true );
			$breadcrumb = get_post_meta( $post_id, '_breadcrumb', true );
			$intro = get_post_meta( $post_id, '_page_title_intro', true );
			$fullHeight = get_post_meta( $post_id, '_page_title_fullHeight', true );
			//$align = get_post_meta( $post_id, '_page_title_align', true );
			$align = ($align != '') ? $align : 'center';

			if ( $template == 'no-title' ) return false;
			$title = get_the_title( $post_id );
		}
		
		if(is_archive() && $helpme_settings['archive-page-title'] == 0) return false;
		
		if(is_home() && get_option('page_for_posts')){
			
			$title = get_the_title( get_option('page_for_posts', true) );
			
			
		}elseif(is_home()){
			$title = esc_html__( 'OUR Blog', 'helpme' );
		}
		if(function_exists( 'is_woocommerce' ) && is_woocommerce() && is_shop() && $helpme_settings['woo-shop-loop-title'] == 0) return false;

		if(function_exists( 'is_woocommerce' ) && is_woocommerce() && is_singular('product') && $helpme_settings['woo-single-show-title'] == 0) return false;

		if(is_singular('post')) {
			if (isset($helpme_settings['page-title-blog']) && $helpme_settings['page-title-blog'] == 0 ) return false;
		}
		if(is_singular('portfolio')) {
			if (isset($helpme_settings['page-title-blog']) && $helpme_settings['page-title-blog'] == 0 ) return false;
		}
		//if(is_singular('portfolio')) {
			//if (isset($helpme_settings['page-title-portfolio']) && $helpme_settings['page-title-portfolio'] == 0 ) return false;
		//}
		if(is_singular('tribe_get_events')) {
			if (isset($helpme_settings['page-title-blog']) && $helpme_settings['page-title-blog'] == 0 ) return false;
		}
		if ( is_search() ) {
			$title = esc_html__( 'Search', 'helpme' );
		}
		if ( is_archive() ) {
			if ( is_category() ) {
				$title = sprintf( esc_html__( ' %s', 'helpme' ), single_cat_title( '', false ) );
			}
			elseif ( is_tag() ) {
				$title = sprintf( esc_html__( ' %s', 'helpme' ), single_tag_title( '', false ) );
			}
			elseif ( is_day() ) {
				$title = sprintf( esc_html__( ' %s', 'helpme' ), get_the_time( 'F jS, Y' ) );
			}
			elseif ( is_month() ) {
				$title = sprintf( esc_html__( '%s', 'helpme' ), get_the_time( 'F, Y' ) );
			}
			elseif ( is_year() ) {
				$title = sprintf( esc_html__( ' %s', 'helpme' ), get_the_time( 'Y' ) );
			}
			elseif ( is_author() ) {
				if ( get_query_var( 'author_name' ) ) {
					$curauth = get_user_by( 'slug', get_query_var( 'author_name' ) );
				}
				else {
					$curauth = get_userdata( get_query_var( 'author' ) );
				}
				$title = sprintf( esc_html__( ' %s', 'helpme' ), $curauth->nickname );
			}
			elseif ( is_tax() ) {
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				$title = sprintf( esc_html__( ' %s', 'helpme' ), $term->name );
			}
		}

		if ( is_404() ) {
			$title = esc_html__('404 Not Found', 'helpme');

		}
		if ( get_post_type('portfolio') ) {
			$title = get_the_title();
		}
		
		
		if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
			if ( bbp_is_forum_archive() ) {
				$title = bbp_get_forum_archive_title();

			} elseif ( bbp_is_topic_archive() ) {
				$title = bbp_get_topic_archive_title();

			} elseif ( bbp_is_single_view() ) {
				$title = bbp_get_view_title();
			} elseif ( bbp_is_single_forum() ) {

				$forum_id = get_queried_object_id();
				$forum_parent_id = bbp_get_forum_parent_id( $forum_id );

				if ( 0 !== $forum_parent_id )
					$title = array_merge( $item, breadcrumbs_plus_get_parents( $forum_parent_id ) );

				$title = bbp_get_forum_title( $forum_id );
			}
			elseif ( bbp_is_single_topic() ) {
				$topic_id = get_queried_object_id();
				$title = bbp_get_topic_title( $topic_id );
			}

			elseif ( bbp_is_single_user() || bbp_is_single_user_edit() ) {
				$title = bbp_get_displayed_user_field( 'display_name' );
			}
		}


		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			if(is_single() && isset($helpme_settings['woo-single-title']) && $helpme_settings['woo-single-title'] == 1) {
				$terms = get_the_terms( $post_id, 'product_cat' );
				if(is_array($terms) && $terms != null) {
				foreach ($terms as $term) {
				    $product_category = $term->name;
				    break;
				}
					$title = $product_category;
				} else {
					ob_start();
					woocommerce_page_title();
					$title = ob_get_clean();
				}
			} else {
				ob_start();
				woocommerce_page_title();
				$title = ob_get_clean();
			}


		}

		echo '<section id="helpme-page-title" class="'.$align.'-align" data-intro="'.$intro.'" data-fullHeight="'.$fullHeight.'">';
		echo '<div class="helpme-page-title-bg"></div>';
		echo '<div class="helpme-effect-gradient-layer"></div>';
		echo '<div class="helpme-grid">';
		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() && is_single() ) {
			echo '<h2 class="helpme-page-heading">' . $title . '</h2>';
		} else {
			echo '<h1 class="helpme-page-heading">' . $title . '</h1>';
		}
		

		if ( $helpme_settings['breadcrumb'] != 0 ) {
			if ( $breadcrumb != 'false' ) {
				do_action( 'theme_breadcrumbs');
			}
		}

		echo '<div class="clearboth"></div></div></section>';


	}

}



if(!function_exists('helpme_theme_breadcrumbs')):
function helpme_theme_breadcrumbs() {
        global $helpme_settings, $post;
		$output = '';

		$post_id = global_get_post_id();

		$breadcrumb_skin = (isset($helpme_settings['breadcrumb-skin']) && !empty($helpme_settings['breadcrumb-skin'])) ? $helpme_settings['breadcrumb-skin'].'-skin' : 'dark-skin';
		if($post_id) {
			$enable = get_post_meta($post_id, '_custom_bg', true);
			if ($enable == 'true') {
				$single_breadcrumb = get_post_meta( $post_id, '_breadcrumb_skin', true );
				$breadcrumb_skin = !empty($single_breadcrumb) ?  ($single_breadcrumb . '-skin') : $breadcrumb_skin;
			}
		}


		$delimiter =  ' &#47; ';

        echo '<div id="helpme-breadcrumbs"><div class="helpme-breadcrumbs-inner '.$breadcrumb_skin.'">';

        if ( !is_front_page() ) {
	        echo '<a href="';
	        echo esc_url(home_url('/'));
	        echo '">'.esc_html__('Home', 'helpme');
	        echo "</a>" . $delimiter;
        }

        if(function_exists('is_woocommerce') && is_woocommerce() && is_archive()) {
        	$shop_page_id = wc_get_page_id( 'shop' );
			$shop_page    = get_post( $shop_page_id );
			$permalinks   = get_option( 'woocommerce_permalinks' );
        	if ( $shop_page_id && $shop_page ) {
				echo '<a href="' . get_permalink( $shop_page ) . '">' . $shop_page->post_title . '</a> ';
			}
        }

        if (is_category() && !is_singular('portfolio')) {
            
            $category = get_the_category();
            $ID = $category[0]->cat_ID;
            echo is_wp_error( $cat_parents = get_category_parents($ID, TRUE, '', FALSE ) ) ? '' : '<span>'.$cat_parents.'</span>';

        } else if(is_singular('news')) {
            echo '<span>'.get_the_title().'</span>';

        } else if ( is_single() && ! is_attachment()) {
		      	
		       if ( get_post_type() == 'product' ) {

					if ( $terms = wc_get_product_terms( $post->ID, 'product_cat', array( 'orderby' => 'parent', 'order' => 'DESC' ) ) ) {

						$main_term = $terms[0];

						$ancestors = get_ancestors( $main_term->term_id, 'product_cat' );

						$ancestors = array_reverse( $ancestors );

						foreach ( $ancestors as $ancestor ) {
							$ancestor = get_term( $ancestor, 'product_cat' );

							if ( ! is_wp_error( $ancestor ) && $ancestor )
								echo '<a href="' . get_term_link( $ancestor->slug, 'product_cat' ) . '">' . $ancestor->name . '</a>' .  $delimiter;
						}

						echo  '<a href="' . get_term_link( $main_term->slug, 'product_cat' ) . '">' . $main_term->name . '</a>' . $delimiter;

					}

					echo  get_the_title();

				} elseif(is_singular('portfolio')) {
		            echo get_the_term_list($post->ID, 'portfolio_category', '<span>', $delimiter, '</span>');
		            echo esc_attr($delimiter) . '<span>'.get_the_title().'</span>';

		        } elseif ( get_post_type() != 'post') {

		        	if(function_exists( 'is_bbpress' ) && is_bbpress()) {

		        	} else {
		        		$post_type = get_post_type_object( get_post_type() );
						$slug = $post_type->rewrite;
							echo  '<a href="' . get_post_type_archive_link( get_post_type() ) . '">' . $post_type->labels->singular_name . '</a>' .$delimiter;
						echo get_the_title();
		        	}

				} else {
						$cat = current( get_the_category() );
						echo get_category_parents( $cat, true, $delimiter );
						echo get_the_title();	
				}
		}  elseif ( is_page() && !$post->post_parent ) {

			echo get_the_title();

		} elseif ( is_page() && $post->post_parent ) {

			$parent_id  = $post->post_parent;
			$breadcrumbs = array();

			while ( $parent_id ) {
				$page = get_page( $parent_id );
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title( $page->ID ) . '</a>';
				$parent_id  = $page->post_parent;
			}

			$breadcrumbs = array_reverse( $breadcrumbs );

			foreach ( $breadcrumbs as $crumb )
				echo wp_kses_post($crumb) . '' . $delimiter;

			echo get_the_title();

		} elseif ( is_attachment() ) {

			$parent = get_post( $post->post_parent );
			$cat = get_the_category( $parent->ID );
			$cat = isset($cat[0]);
			/* admin@innodron.com patch: 
	        Fix for Catchable fatal error: Object of class WP_Error could not be converted to string
	        ref: https://wordpress.org/support/topic/catchable-fatal-error-object-of-class-wp_error-could-not-be-converted-to-string-11
		    */
		    echo is_wp_error( $cat_parents = get_category_parents($cat, TRUE, '' . $delimiter . '') ) ? '' : $cat_parents;
		   /* end admin@innodron.com patch */
			echo '<a href="' . get_permalink( $parent ) . '">' . $parent->post_title . '</a>' . $delimiter;
			echo  get_the_title();

		}	elseif ( is_search() ) {

		echo esc_html__( 'Search results for &ldquo;', 'helpme' ) . get_search_query() . '&rdquo;';

		} elseif ( is_tag() ) {

				echo esc_html__( 'Tag &ldquo;', 'helpme' ) . single_tag_title('', false) . '&rdquo;';

		} elseif ( is_author() ) {

			$userdata = get_userdata(get_the_author_meta('ID'));
			echo  esc_html__( 'Author:', 'helpme' ) . ' ' . $userdata->display_name;

		} elseif ( is_day() ) {

			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $delimiter;
			echo '<a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '">' . get_the_time( 'F' ) . '</a>' . $delimiter;
			echo get_the_time( 'd' );

		} elseif ( is_month() ) {

			echo '<a href="' . get_year_link( get_the_time( 'Y' ) ) . '">' . get_the_time( 'Y' ) . '</a>' . $delimiter;
			echo get_the_time( 'F' );

		} elseif ( is_year() ) {

			echo  get_the_time( 'Y' );

		} 

		if ( get_query_var( 'paged' ) )
			echo ' (' . esc_html__( 'Page', 'helpme' ) . ' ' . get_query_var( 'paged' ) . ')';
		

        if (is_tax()) {
            $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            echo esc_attr($delimiter) . '<span>'.$term->name.'</span>';
        }
        
        if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
        	$item = array();

				$post_type_object = get_post_type_object( bbp_get_forum_post_type() );

				if ( !empty( $post_type_object->has_archive ) && !bbp_is_forum_archive() ){
					$item[] = '<a href="' . get_post_type_archive_link( bbp_get_forum_post_type() ) . '">' . bbp_get_forum_archive_title() . '</a>';
				}

				if ( bbp_is_forum_archive() ){
					$item[] = bbp_get_forum_archive_title();
				}

				elseif ( bbp_is_topic_archive() ){
					$item[] = bbp_get_topic_archive_title();
				}

				elseif ( bbp_is_single_view() ){
					$item[] = bbp_get_view_title();
				}

				elseif ( bbp_is_single_topic() ) {

					$topic_id = get_queried_object_id();

					$item = array_merge( $item, helpme_breadcrumbs_get_parents( bbp_get_topic_forum_id( $topic_id ) ) );

					if ( bbp_is_topic_split() || bbp_is_topic_merge() || bbp_is_topic_edit() )
						$item[] = '<a href="' . bbp_get_topic_permalink( $topic_id ) . '">' . bbp_get_topic_title( $topic_id ) . '</a>';
					else
						$item[] = bbp_get_topic_title( $topic_id );

					if ( bbp_is_topic_split() )
						$item[] = esc_html__( 'Split', 'helpme' );

					elseif ( bbp_is_topic_merge() )
						$item[] = esc_html__( 'Merge', 'helpme' );

					elseif ( bbp_is_topic_edit() )
						$item[] = esc_html__( 'Edit', 'helpme' );
				}

				elseif ( bbp_is_single_reply() ) {

					$reply_id = get_queried_object_id();

					$item = array_merge( $item, helpme_breadcrumbs_get_parents( bbp_get_reply_topic_id( $reply_id ) ) );

					if ( !bbp_is_reply_edit() ) {
						$item[] = bbp_get_reply_title( $reply_id );

					} else {
						$item[] = '<a href="' . bbp_get_reply_url( $reply_id ) . '">' . bbp_get_reply_title( $reply_id ) . '</a>' ; 
						$item[] = esc_html__( 'Edit', 'helpme' );
					}

				}

				elseif ( bbp_is_single_forum() ) {

					$forum_id = get_queried_object_id();
					$forum_parent_id = bbp_get_forum_parent_id( $forum_id );

					if ( 0 !== $forum_parent_id)
						$item = array_merge( $item, helpme_breadcrumbs_get_parents( $forum_parent_id ) );

					$item[] = bbp_get_forum_title( $forum_id );
				}

				elseif ( bbp_is_single_user() || bbp_is_single_user_edit() ) {

					if ( bbp_is_single_user_edit() ) {
						$item[] = '<a href="' . bbp_get_user_profile_url() . '">' . bbp_get_displayed_user_field( 'display_name' ) . '</a>';
						$item[] = esc_html__( 'Edit', 'helpme'  );
					} else {
						$item[] = bbp_get_displayed_user_field( 'display_name' );
					}
				}

				echo implode($delimiter, $item);


        }
	
        echo "</div></div>";
}
endif;


function helpme_breadcrumbs_get_parents( $post_id = '', $separator = '/' ) {

	$parents = array();

	if ( $post_id == 0 )
		return $parents;

	while ( $post_id ) {
		$page = get_page( $post_id );
		$parents[]  = '<a href="' . get_permalink( $post_id ) . '" title="' . esc_attr( get_the_title( $post_id ) ) . '">' . get_the_title( $post_id ) . '</a>';
		$post_id = $page->post_parent;
	}

	if ( $parents )
		$parents = array_reverse( $parents );

	return $parents;
}

/*
 * Adding typekit
 */
function helpme_typekit_script() {
  global $helpme_settings;


if(isset($helpme_settings['typekit-id']) && $helpme_settings['typekit-id'] != '') {
  echo '<script type="text/javascript" src="//use.typekit.net/'.$helpme_settings['typekit-id'].'.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>';
}

}

/*-----------------*/


add_action( 'wp_head', 'helpme_typekit_script');








if ( !function_exists( 'helpme_subfooter_logos' ) ) {
	function helpme_subfooter_logos() {
		global $helpme_settings;
		
		$src = isset($helpme_settings['subfooter-logos-src']['url']) ? $helpme_settings['subfooter-logos-src']['url'] : '';

		if(empty($src)) { return false; }

		$link = $helpme_settings['subfooter-logos-link'];

		$output = '';
		$output .= '<div class="helpme-subfooter-logos">';
		$output .= !empty($link) ? '<a href="'.$link.'">' : '';
		$output .= '<img src="'.$src.'" />';
		$output .= !empty($link) ? '</a>' : '';
		$output .= '</div>';


		echo '<div>'.$output.'</div>';
	}
}



if ( !function_exists( 'helpme_subfooter_social' ) ) {
	function helpme_subfooter_social() {
		global $helpme_settings;


		$output = '';

		$output .= '<ul class="helpme-footer-social">';

		if(!empty($helpme_settings['social-facebook'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-facebook'].'"><i class="helpme-icon-facebook"></i></a></li>';
		}
		if(!empty($helpme_settings['social-twitter'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-twitter'].'"><i class="helpme-icon-twitter"></i></a></li>';
		}
		if(!empty($helpme_settings['social-google-plus'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-google-plus'].'"><i class="helpme-icon-google-plus"></i></a></li>';
		}
		if(!empty($helpme_settings['social-rss'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-rss'].'"><i class="helpme-icon-rss"></i></a></li>';
		}
		if(!empty($helpme_settings['social-pinterest'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-pinterest'].'"><i class="helpme-icon-pinterest"></i></a></li>';
		}
		if(!empty($helpme_settings['social-instagram'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-instagram'].'"><i class="helpme-icon-instagram"></i></a></li>';
		}
		if(!empty($helpme_settings['social-dribbble'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-dribbble'].'"><i class="helpme-icon-dribbble"></i></a></li>';
		}
		if(!empty($helpme_settings['social-linkedin'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-linkedin'].'"><i class="helpme-icon-linkedin"></i></a></li>';
		}
		if(!empty($helpme_settings['social-tumblr'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-tumblr'].'"><i class="helpme-icon-tumblr"></i></a></li>';
		}
		if(!empty($helpme_settings['social-youtube'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-youtube'].'"><i class="helpme-icon-youtube"></i></a></li>';
		}

		if(!empty($helpme_settings['social-vimeo'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['header-social-vimeo'].'"><i class="helpme-theme-icon-social-vimeo"></i></a></li>';
		}
		if(!empty($helpme_settings['social-spotify'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['header-social-spotify'].'"><i class="helpme-theme-icon-social-spotify"></i></a></li>';
		}

		if(!empty($helpme_settings['social-weibo'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-weibo'].'"><i class="helpme-theme-icon-weibo"></i></a></li>';
		}
		if(!empty($helpme_settings['social-wechat'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-wechat'].'"><i class="helpme-theme-icon-wechat"></i></a></li>';
		}
		if(!empty($helpme_settings['social-renren'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-renren'].'"><i class="helpme-theme-icon-renren"></i></a></li>';
		}
		if(!empty($helpme_settings['social-imdb'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-imdb'].'"><i class="helpme-theme-icon-imdb"></i></a></li>';
		}
		if(!empty($helpme_settings['social-vkcom'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-vkcom'].'"><i class="helpme-theme-icon-vk"></i></a></li>';
		}
		if(!empty($helpme_settings['social-qzone'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-qzone'].'"><i class="helpme-theme-icon-qzone"></i></a></li>';
		}
		if(!empty($helpme_settings['social-whatsapp'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-whatsapp'].'"><i class="helpme-theme-icon-whatsapp"></i></a></li>';
		}
		if(!empty($helpme_settings['social-behance'])) {
			$output .= '<li><a target="_blank" href="'.$helpme_settings['social-behance'].'"><i class="helpme-theme-icon-behance"></i></a></li>';
		}

		$output .= '</ul>';

		echo '<div>'.$output.'</div>';
	}
}




/**
 * Adds Next/Previous post navigations to single posts
 *
 */
/*
function helpme_post_nav($same_category = true, $taxonomy = 'category')
{
  global $helpme_settings;

  if($helpme_settings['blog_next_prev'] != '1') return false;

  if(is_singular('post') && $helpme_settings['blog_next_prev'] != '1') return false;

  if(is_singular('portfolio') && $helpme_settings['portfolio_next_prev'] != '1') return false;

  if(is_page()) return false;

      $options = array();
      $options['same_category'] = $same_category;
      $options['excluded_terms'] = '';

      $options['type'] = get_post_type();
      $options['taxonomy'] = $taxonomy;

      if(!is_singular() || is_post_type_hierarchical($options['type']))
            $options['is_hierarchical'] = true;
      if($options['type'] === 'topic' || $options['type'] === 'reply')
            $options['is_bbpress'] = true;

    $options = apply_filters('helpme_post_nav_settings', $options);
    if(!empty($options['is_bbpress']) || !empty($options['is_hierarchical']))
      return;

      $entries['prev'] = get_previous_post($options['same_category'], $options['excluded_terms'], $options['taxonomy']);
      $entries['next'] = get_next_post($options['same_category'], $options['excluded_terms'], $options['taxonomy']);

      $entries = apply_filters('helpme_post_nav_entries', $entries, $options);
      $output = "";


      foreach ($entries as $key => $entry)
      {
        if(empty($entry)) continue;

        $post_type =  get_post_type($entry->ID);
        $next_prev_meta = get_post_meta( get_the_ID(), '_portfolio_meta_next_prev', true );

        if(is_singular('portfolio') && $next_prev_meta != 'true' && $next_prev_meta != '' ) return false;

        $icon   = $post_image = "";
        $link  = get_permalink($entry->ID);
        $image = get_the_post_thumbnail($entry->ID, 'thumbnail');
        $class = $image ? "with-image" : "without-image";
        $icon = ($key == 'prev') ? '<i class="helpme-icon-chevron-left"></i>' : '<i class="helpme-icon-chevron-right"></i>';
        $output .= '<a class="helpme-post-nav helpme-post-'.$key.' '.$class.'" href="'.$link.'">';


          $output .= '<span class="pagnav-wrapper">';
          $output .= '<span class="pagenav-top">';

          $icon = '<span class="helpme-pavnav-icon">'.$icon.'</span>';

          if($image) {
            $post_image = '<span class="pagenav-image">'.$image.'</span>';
          }

        $output .= $key == 'next' ?  $icon.$post_image : $post_image.$icon;
        $output .= "</span>";

        $output .= '<div class="nav-info-container">';
        $output .= '<span class="pagenav-bottom">';

        $output .= '<span class="pagenav-title">'.get_the_title($entry->ID).'</span>';

			if($post_type == 'post') {
			    // $output .= '<span class="pagenav-category">'.get_the_category_list( ', ', 'single', $entry->ID ).'</span>';
			} elseif ($post_type == 'portfolio') {
		 		$terms = get_the_terms($entry->ID, 'portfolio_category');
		 		$terms_slug = array();
			 	$terms_name = array();
			 	if (is_array($terms)) {
			   	foreach($terms as $term) {
			     		$terms_name[] = $term->name;
		       	}
			 	}
				$output .= '<span class="pagenav-category">'.implode(', ', $terms_name).'</span>';
			} elseif ($post_type == 'product') {
			 	$terms = get_the_terms($entry->ID, 'product_cat');
			 	$terms_slug = array();
			 	$terms_name = array();
			 	if (is_array($terms)) {
			   	foreach($terms as $term) {
			     		$terms_name[] = $term->name;
		       	}
				 }
				$output .= '<span class="pagenav-category">'.implode(', ', $terms_name).'</span>';
			} elseif($post_type == 'news'){
			 	$terms = get_the_terms($entry->ID, 'news_category');
			 	$terms_slug = array();
			 	$terms_name = array();
			 	if (is_array($terms)) {
			   	foreach($terms as $term) {
			     		$terms_name[] = $term->name;
		       	}
			 	}
			 	$output .= '<span class="pagenav-category">'.implode(', ', $terms_name).'</span>';
			}
         $output .= "</span>";
       	$output .= "</div>";
     		$output .= "</span>";
       	$output .= "</a>";
      }
      echo '<div>'.$output.'</div>';
}
add_action( 'wp_footer', 'helpme_post_nav' );
*/

/**
 * Adds Quick Contact Form
 *
 */
/*if ( !function_exists( 'helpme_quick_contact' ) ) {
	function helpme_quick_contact() {
		global $helpme_settings, $post;
		$post_id = global_get_post_id();

		$output = $skin = '';
		$disable_quick_contact = isset($helpme_settings['disable-quick-contact']) && $helpme_settings['disable-quick-contact'] != '1' ? '0' : '1';
		$skin_quick_contact = isset($helpme_settings['skin-quick-contact']) && $helpme_settings['skin-quick-contact'] != '1' ? '0' : '1';

		$page_quick_contact = get_post_meta( $post_id, '_quick_contact', true );
    	$page_quick_contact_skin = get_post_meta( $post_id, '_quick_contact_skin', true );

		if($skin_quick_contact == '1'){
			$skin = 'light';
		}else{
			$skin = 'dark';
		}

		if( $page_quick_contact == 'disabled'){
			return false;			
		}else if ( $page_quick_contact == 'enabled' ){
			$skin = $page_quick_contact_skin;
		}

		if ( $disable_quick_contact != '1' ) return false;

		$output .= '<div class="quick-button-container">
						<a href="#" class="helpme-quick-contact-link"><i class="helpme-li-mail"></i></a>
					</div>';
		$output .= '<div class="helpme-quick-contact-overlay '.$skin.'-skin">';
		$output .= '	<a href="#" class="helpme-quick-contact-close"><i class="helpme-icon-times"></i></a>';
		$output .= '	<div class="helpme-quick-contact-wrapper">';
		$output .= '		<div class="helpme-quick-contact-inset">';
		if($skin == 'light'){
			$output .= 			do_shortcode( '[helpme_contact_form style="modern" skin_color="#303030" btn_text_color="#303030" btn_hover_text_color="#eaeaea" phone="false"]' );
		}else{
			$output .= 			do_shortcode( '[helpme_contact_form style="modern" skin_color="#fff" btn_text_color="#fff" btn_hover_text_color="#333" phone="false"]' );
		}
		$output .= '		</div>';
		$output .= '	</div>'; 
		$output .= '</div>';
		
		echo '<div>'.$output.'</div>';
	}
}*/






