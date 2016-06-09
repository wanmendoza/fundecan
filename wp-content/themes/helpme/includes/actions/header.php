<?php
/**
 *
 *
 * @author  Muhammad Asif
 * @copyright (c) Muhammad Asif
 * @link  http://designsvilla.net
 * @since  Version 2.0
 * @package  Helpme  Framework
 */



add_action( 'header_logo', 'helpme_header_logo' );
add_action( 'main_navigation', 'helpme_main_navigation' );
add_action( 'vertical_navigation', 'helpme_vertical_navigation' );
add_action( 'header_search', 'helpme_header_search' );
add_action( 'nav_donate_btn', 'helpme_nav_donate_btn' );
add_action( 'header_search_form', 'helpme_header_search_form' );
add_action( 'header_social', 'helpme_header_social');
add_action( 'header_toolbar_social', 'helpme_header_toolbar_social');

add_action( 'header_toolbar_contact', 'helpme_header_toolbar_contact');
add_action( 'header_contact', 'helpme_header_contact');
//add_action( 'header_toolbar_menu', 'helpme_header_toolbar_menu');


//add_action( 'side_dashboard', 'helpme_side_dashboard' );
add_action( 'dashboard_trigger_link', 'helpme_dashboard_trigger_link' );
add_action( 'responsive_nav_trigger_link', 'helpme_responsive_nav_trigger_link' );
add_action( 'margin_style_burger_icon', 'helpme_margin_style_burger_icon' );
add_action( 'vertical_header_burger_icon', 'helpme_vertical_header_burger_icon' );




/*
* Create Header Logo
******/
if ( !function_exists( 'helpme_header_logo' ) ) {
	function helpme_header_logo() {

		global $helpme_settings,$allowedtags;

		$logo = isset($helpme_settings['logo']['url']) ? $helpme_settings['logo']['url'] : '';
		$logo_retina = isset($helpme_settings['logo-retina']['url']) ? $helpme_settings['logo-retina']['url'] : '';

		//$light_logo = isset($helpme_settings['logo-light']['url']) ? $helpme_settings['logo-light']['url'] : '';
		//$light_logo_retina = isset($helpme_settings['logo-light-retina']['url']) ? $helpme_settings['logo-light-retina']['url'] : '';

		$mobile_logo = isset($helpme_settings['logo-light']['url']) ? $helpme_settings['mobile-logo']['url'] : '';
		$mobile_logo_retina = isset($helpme_settings['logo-light-retina']['url']) ? $helpme_settings['mobile-logo-retina']['url'] : '';

		$post_id = global_get_post_id();

		if($post_id) {

			$enable = get_post_meta($post_id, '_custom_bg', true );

			if($enable == 'true') {
				$logo_meta = get_post_meta($post_id, 'logo', true );
				$logo_retina_meta = get_post_meta($post_id, 'logo_retina', true );
				//$light_logo_meta = get_post_meta($post_id, 'light_logo', true );
				//$light_retina_logo_meta = get_post_meta($post_id, 'light_logo_retina', true );
				$logo_mobile_meta = get_post_meta($post_id, 'responsive_logo', true );
				$logo_mobile_retina_meta = get_post_meta($post_id, 'responsive_logo_retina', true );

				$logo = (isset($logo_meta) && !empty($logo_meta)) ? $logo_meta : $logo;
				$logo_retina = (isset($logo_retina_meta) && !empty($logo_retina_meta)) ? $logo_retina_meta : $logo_retina;
				//$light_logo = (isset($light_logo_meta) && !empty($light_logo_meta)) ? $light_logo_meta : $light_logo;
				//$light_logo_retina = (isset($light_retina_logo_meta) && !empty($light_retina_logo_meta)) ? $light_retina_logo_meta : $light_logo_retina;
				$mobile_logo = (isset($logo_mobile_meta) && !empty($logo_mobile_meta)) ? $logo_mobile_meta : $mobile_logo;
				$mobile_logo = (isset($logo_mobile_meta) && !empty($logo_mobile_meta)) ? $logo_mobile_meta : $mobile_logo_retina;
			}
		}

		$mobile_logo_csss = (!empty($mobile_logo)) ? 'mobile-menu-exists' : '';

		$output = '<li class="helpme-header-logo '.$mobile_logo_csss.'">';
		$output .= '<a href="'.esc_url(home_url( '/' )).'" title="'.get_bloginfo( 'name' ).'">';

		if ( !empty( $logo ) ) {
			$output .= '<img alt="'.get_bloginfo( 'name' ).'" class="helpme-dark-logo" src="'.$logo.'" data-retina-src="'.$logo_retina.'" />';
		} else {
			$output .= '<img alt="'.get_bloginfo( 'name' ).'" class="helpme-dark-logo" src="'.HELPME_THEME_IMAGES.'/helpme-logo.png" data-retina-src="'.HELPME_THEME_IMAGES.'/helpme-logo-2x.png" />';
		}

		if ( !empty( $mobile_logo) ) {
			$output .= '<img alt="'.get_bloginfo( 'name' ).'" class="helpme-mobile-logo" src="'.$mobile_logo.'" data-retina-src="'.$mobile_logo_retina.'" />';
		}

		//if ( !empty( $light_logo ) ) {
			//$output .= '<img alt="'.get_bloginfo( 'name' ).'" class="helpme-light-logo" src="'.$light_logo.'" data-retina-src="'.$light_logo_retina.'" />';
		//}


		$output .= '</a></li>';

		echo wp_kses_post($output);

	}
}
/***************************************/








/***********************************
Create Vertical Navigation
***********************************/
if(!function_exists('helpme_vertical_navigation')) {
	function helpme_vertical_navigation($menu_location) {
	global $helpme_settings;
	$post_id = global_get_post_id();
	$header_structure = (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'header-structure', true ) : $helpme_settings['header-structure'];
	
	$header_style = $header_structure;

	if($header_style != 'vertical') return false;

	echo wp_nav_menu( array(
		'theme_location' => $menu_location,
		'container' => false,
		'container_id' => false,
		'container_class' => false,
		'menu_class' => 'helpme-vertical-menu',
		'fallback_cb' => '',
		'walker' => new header_icon_walker()
	));
	}
}






/*
* Create Header Search HTML content
******/
if ( !function_exists( 'helpme_header_search' ) ) {
	function helpme_header_search() {
		global $helpme_settings;
		
		$header_location = (isset($helpme_settings['header-search-location']) && !empty($helpme_settings['header-search-location']) && $helpme_settings['header-search-location'] == 'left') ? 'align-left' : '';
		if($helpme_settings['header-search']){
			echo '<li class="helpme-header-search '.$header_location.'">
				<a class="header-search-icon" href="#"><i class="helpme-icon-search"></i></a>
			</li>';	
		}
	}
}
/***************************************/

/*
* Create Header donate button HTML content
******/
if ( !function_exists( 'helpme_nav_donate_btn' ) ) {
	function helpme_nav_donate_btn() {
		global $helpme_settings;
		$header_donate_url = $helpme_settings['donate-btn-url'];
		$header_donate_btn_text = $helpme_settings['donate-btn-text'];
		
		if(empty($helpme_settings['donate-btn'])){
			echo '<li class="donate-btn">
				<a class="donate-header-btn" href="'.$header_donate_url.'">'.$header_donate_btn_text.'</a>
			</li>';	
		}
	}
}
/***************************************/

/*
* Create WPML Language Selector HTML content
******/
if(defined('ICL_SITEPRESS_VERSION') && defined('ICL_LANGUAGE_CODE')) 
{
	if(!function_exists('helpme_wpml_selector'))
	{
		function helpme_wpml_selector() {
			$languages = icl_get_languages('skip_missing=0&orderby=id');
			$output = "";

			if(is_array($languages))
			{
				
	       		$output .= '<li class="helpme-header-wpml-ls">
	       						<a class="header-wpml-icon" href="#">
	       							<i class="helpme-icon-globe"></i>
	       						</a>';
				$output .= '	<ul class="language-selector-box">';
				foreach($languages as $lang)
				{
					$output .= "	<li class='language_".$lang['language_code']."'>
										<a href='".$lang['url']."'>";
					$output .= "			<span class='helpme-lang-name'>".$lang['translated_name']."</span>";
					$output .= "		</a>
									</li>";
				}
				$output .= "	</ul>";
				$output .= "</li>";
			}
			
			echo wp_kses_post($output);
		}
	}

	add_action( 'header_wpml', 'helpme_wpml_selector');
}
/***************************************/




/*
* Create Header Search Form HTML content
******/
if ( !function_exists( 'helpme_header_search_form' ) ) {
	function helpme_header_search_form() {

	echo '<form method="get" class="header-searchform-input" action="'.esc_url(home_url('/')).'">
            <input class="search-ajax-input" type="text" value="" name="s" id="s" />
            <input value="" type="submit" />
            <a href="#" class="header-search-close"><i class="helpme-icon-close"></i></a>
   		 </form>';

	}
}
/***************************************/



/*
* Create Header Dashboard trigger link Form HTML content. Please note that this link will appear in reposnive mode.
******/
/*if ( !function_exists( 'helpme_dashboard_trigger_link' ) ) {
	function helpme_dashboard_trigger_link() {
		global $helpme_settings;

		if(!isset($helpme_settings['side-dashboard-icon']) && empty($helpme_settings['side-dashboard-icon'])){
			$dashboard_icon = 'helpme-theme-icon-dashboard2';
		}else{
			$dashboard_icon = $helpme_settings['side-dashboard-icon'];
		}

		if($helpme_settings['header-structure'] == 'vertical') return false;

		echo '<li class="dashboard-trigger res-mode"><i class="'.$dashboard_icon.'"></i></li>';

	}
}*/
/***************************************/


/*
* Create Responsive Navigation trigger link Form HTML content. Please note that this link will appear in reposnive mode.
******/
if ( !function_exists( 'helpme_responsive_nav_trigger_link' ) ) {
	function helpme_responsive_nav_trigger_link() {

		echo '<li class="responsive-nav-link">
			<div class="helpme-burger-icon">
	              <div class="burger-icon-1"></div>
	              <div class="burger-icon-2"></div>
	              <div class="burger-icon-3"></div>
            	</div>
		</li>';

	}
}
/***************************************/





/*
* Header Section Social Networks
******/
if ( !function_exists( 'helpme_header_social' ) ) {
	function helpme_header_social($location) {
		global $helpme_settings;

		if($helpme_settings['header-social-select'] == 'disabled') return false;
		if($helpme_settings['header-social-select'] == 'header_toolbar') return false;

		$output = '';

		if($location == 'outside-grid') {
			$output .= '<div class="helpme-header-social '.$location.'">';
		} else {
			$output .= '<li class="helpme-header-social '.$location.'">';	
		}	
		
		

		if(!empty($helpme_settings['header-social-facebook'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-facebook'].'"><i class="helpme-icon-facebook"></i></a>';
		}
		if(!empty($helpme_settings['header-social-twitter'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-twitter'].'"><i class="helpme-icon-twitter"></i></a>';
		}
		if(!empty($helpme_settings['header-social-google-plus'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-google-plus'].'"><i class="helpme-icon-google-plus"></i></a>';
		}
		if(!empty($helpme_settings['header-social-rss'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-rss'].'"><i class="helpme-icon-rss"></i></a>';
		}
		if(!empty($helpme_settings['header-social-pinterest'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-pinterest'].'"><i class="helpme-icon-pinterest"></i></a>';
		}
		if(!empty($helpme_settings['header-social-instagram'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-instagram'].'"><i class="helpme-icon-instagram"></i></a>';
		}
		if(!empty($helpme_settings['header-social-dribbble'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-dribbble'].'"><i class="helpme-icon-dribbble"></i></a>';
		}
		if(!empty($helpme_settings['header-social-linkedin'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-linkedin'].'"><i class="helpme-icon-linkedin"></i></a>';
		}
		if(!empty($helpme_settings['header-social-tumblr'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-tumblr'].'"><i class="helpme-icon-tumblr"></i></a>';
		}
		if(!empty($helpme_settings['header-social-youtube'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-youtube'].'"><i class="helpme-icon-youtube"></i></a>';
		}
		if(!empty($helpme_settings['header-social-vimeo'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-vimeo'].'"><i class="helpme-theme-icon-social-vimeo"></i></a>';
		}
		if(!empty($helpme_settings['header-social-spotify'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-spotify'].'"><i class="helpme-theme-icon-social-spotify"></i></a>';
		}

		if(!empty($helpme_settings['header-social-weibo'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-weibo'].'"><i class="helpme-theme-icon-weibo"></i></a>';
		}
		if(!empty($helpme_settings['header-social-wechat'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-wechat'].'"><i class="helpme-theme-icon-wechat"></i></a>';
		}
		if(!empty($helpme_settings['header-social-renren'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-renren'].'"><i class="helpme-theme-icon-renren"></i></a>';
		}
		if(!empty($helpme_settings['header-social-imdb'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-imdb'].'"><i class="helpme-theme-icon-imdb"></i></a>';
		}
		if(!empty($helpme_settings['header-social-vkcom'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-vkcom'].'"><i class="helpme-theme-icon-vk"></i></a>';
		}
		if(!empty($helpme_settings['header-social-qzone'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-qzone'].'"><i class="helpme-theme-icon-qzone"></i></a>';
		}
		if(!empty($helpme_settings['header-social-whatsapp'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-whatsapp'].'"><i class="helpme-theme-icon-whatsapp"></i></a>';
		}
		if(!empty($helpme_settings['header-social-behance'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-behance'].'"><i class="helpme-theme-icon-behance"></i></a>';
		}

		if($location == 'outside-grid') {
			$output .= '</div>';	
		} else {
			$output .= '</li>';
		}
		

		echo wp_kses_post($output);
	}
}






/*
* Header Structure margin burger icon
******/
if ( !function_exists( 'helpme_margin_style_burger_icon' ) ) {
	function helpme_margin_style_burger_icon() {

		global $helpme_settings;
	$post_id = global_get_post_id();
	$header_structure = (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'header-structure', true ) : $helpme_settings['header-structure'];
	

		if($header_structure != 'margin') return false;

		echo '<div class="helpme-margin-header-burger">
				<div class="helpme-burger-icon">
	              <div class="burger-icon-1"></div>
	              <div class="burger-icon-2"></div>
	              <div class="burger-icon-3"></div>
            	</div>
              </div>';

	}
}
/***************************************/



/*
* Header Structure Vertical burger icon
******/
if ( !function_exists( 'helpme_vertical_header_burger_icon' ) ) {
	function helpme_vertical_header_burger_icon() {

		global $helpme_settings;
	$post_id = global_get_post_id();
	$header_structure = (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'header-structure', true ) : $helpme_settings['header-structure'];
	

		

		if($header_structure == 'vertical' && $helpme_settings['vertical-header-state'] == 'condensed') {

				echo '<li class="helpme-vertical-header-burger">
						<div class="helpme-burger-icon">
			              <div class="burger-icon-1"></div>
			              <div class="burger-icon-2"></div>
			              <div class="burger-icon-3"></div>
		            	</div>
		              </li>';
          }

	}
}
/***************************************/



/*
* Header Toolbar Contact
******/
if ( !function_exists( 'helpme_header_toolbar_contact' ) ) {
	function helpme_header_toolbar_contact() {
	global $helpme_settings;
	if($helpme_settings['header-contact-select'] == 'disabled') return false;
		if($helpme_settings['header-contact-select'] == 'header_section') return false;

		if ( !empty( $helpme_settings['header-toolbar-phone'] ) ) {
			echo '<span class="header-toolbar-contact"><i class="'.$helpme_settings['header-toolbar-phone-icon'].'"></i>'.stripslashes( $helpme_settings['header-toolbar-phone'] ).'</span>';
		}
		if ( !empty( $helpme_settings['header-toolbar-email'] ) ) {
			echo '<span class="header-toolbar-contact"><i class="'.$helpme_settings['header-toolbar-email-icon'].'"></i><a href="mailto:'.antispambot( $helpme_settings['header-toolbar-email'] ).'">'.antispambot( $helpme_settings['header-toolbar-email'] ).'</a></span>';
		}

	}
}

/*
* Header Toolbar Contact
******/
if ( !function_exists( 'helpme_header_contact' ) ) {
	function helpme_header_contact($location) {
	global $helpme_settings;
	if($helpme_settings['header-contact-select'] == 'disabled') return false;
		if($helpme_settings['header-contact-select'] == 'header_toolbar') return false;

		$output = '';

		if($location == 'outside-grid') {
			$output .= '<div class="header-contact">';
		} else {
			$output .= '<li class="header-contact">';	
		}		

		if ( !empty( $helpme_settings['header-toolbar-phone'] ) ) {
			$output .= '<span class="header-toolbar-contact"><i class="'.$helpme_settings['header-toolbar-phone-icon'].'"></i>'.stripslashes( $helpme_settings['header-toolbar-phone'] ).'</span>';
		}
		if ( !empty( $helpme_settings['header-toolbar-email'] ) ) {
			$output .= '<span class="header-toolbar-contact"><i class="'.$helpme_settings['header-toolbar-email-icon'].'"></i><a href="mailto:'.antispambot( $helpme_settings['header-toolbar-email'] ).'">'.antispambot( $helpme_settings['header-toolbar-email'] ).'</a></span>';
		}
		if($location == 'outside-grid') {
			$output .= '</div>';	
		} else {
			$output .= '</li>';
		}
		echo wp_kses_post($output);
	}
}



/*
* Create Main Navigation
******/
if ( !function_exists( 'helpme_main_navigation' ) ) {
	function helpme_main_navigation($menu_location) {

		global $helpme_settings;
	$post_id = global_get_post_id();
	$header_structure = (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'header-structure', true ) : $helpme_settings['header-structure'];
	
		$header_style = $header_structure;

		if($header_style == 'vertical') return false;

		$output = '<nav id="helpme-main-navigation">';

		$output .= wp_nav_menu( array(
				'theme_location' => $menu_location,
				'container' => false,
				'container_id' => false,
				'container_class' => false,
				'menu_class' => 'main-navigation-ul clearfix',
				'echo' => false,
				'fallback_cb' => 'link_to_menu_editor',
				'walker' => new helpme_custom_walker
			) );

		$output .= '</nav>';
		
		if($helpme_settings['header-search']) {
			ob_start();
			do_action( 'header_search_form' );
			$output .= ob_get_contents();
			ob_end_clean();
		}

		echo wp_kses_post($output);

	}
}
/***************************************/




/*
* Fallback menu
******/
if ( !function_exists( 'link_to_menu_editor' ) ) {
	function link_to_menu_editor( $args ) {
		global $helpme_settings;

	    extract( $args );

	    $link = '';

	    if ( FALSE !== stripos( $items_wrap, '<ul' )
	        or FALSE !== stripos( $items_wrap, '<ol' )
	    )
	    {
	        $link = "<li class='menu-item'>$link</li>";
	    }

	    /*if($helpme_settings['side-dashboard']) {
			ob_start();
			do_action( 'dashboard_trigger_link' );
			$link .= ob_get_contents();
			ob_end_clean();
		}*/

	    ob_start();
		do_action( 'header_logo' );
		$link .= ob_get_contents();
		ob_end_clean();

		ob_start();
		do_action( 'header_search' );
		$link .= ob_get_contents();
		ob_end_clean();


	    $output = sprintf( $items_wrap, $menu_id, $menu_class, $link );
	    if ( ! empty ( $container ) )
	    {
	        $output  = "<$container class='$container_class' id='$container_id'>$output</$container>";
	    }

	    if ( $echo )
	    {
	        echo wp_kses_post($output);
	    }

	    return $output;
	}
}




/*
* Append Header elements to Main Navigation list items.
******/
if ( !function_exists( 'add_first_nav_item' ) ) {
	function add_first_nav_item( $items, $args ) {
		global $helpme_settings;
		$post_id = global_get_post_id();
		$header_search = (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'header-search', true ) : $helpme_settings['header-search'];
		


		$output = '';

		if ( !is_admin() && ($args->theme_location == 'primary-menu' || $args->theme_location == 'second-menu' || $args->theme_location == 'third-menu' || $args->theme_location == 'fourth-menu' || $args->theme_location == 'fifth-menu' || $args->theme_location == 'sixth-menu' || $args->theme_location == 'seventh-menu') ) {

			ob_start();
			do_action( 'responsive_nav_trigger_link' );
			$output .= ob_get_contents();
			ob_end_clean();

			/*if($helpme_settings['side-dashboard']) {
				ob_start();
				do_action( 'dashboard_trigger_link' );
				$output .= ob_get_contents();
				ob_end_clean();
			}*/

			ob_start();
			do_action( 'margin_style_burger_icon' );
			$output .= ob_get_contents();
			ob_end_clean();

			ob_start();
			do_action( 'vertical_header_burger_icon' );
			$output .= ob_get_contents();
			ob_end_clean();

				ob_start();
			do_action('header_contact', 'inside-grid');
			$output .= ob_get_contents();
			ob_end_clean();
			
				ob_start();
				do_action( 'header_logo' );
				$output .= ob_get_contents();
				ob_end_clean();

			$output .= $items;


			if ( class_exists( 'woocommerce' ) ) {
				if($helpme_settings['checkout-box']) {
					ob_start();
					do_action( 'header_checkout' );
					$output .= ob_get_contents();
					ob_end_clean();
				}
			}
			
			if($helpme_settings['header-search']) {
				ob_start();
				do_action( 'header_search' );
				$output .= ob_get_contents();
				ob_end_clean();
			}
			if($helpme_settings['donate-btn-url']) {
				ob_start();
				do_action( 'nav_donate_btn' );
				$output .= ob_get_contents();
				ob_end_clean();
			}
			if($helpme_settings['header-wpml']) {
				ob_start();
				do_action( 'header_wpml' );
				$output .= ob_get_contents();
				ob_end_clean();
			}


			ob_start();
			do_action('header_social', 'inside-grid');
			$output .= ob_get_contents();
			ob_end_clean();
			
			

		} else {
			$output .= $items;
		}
		return $output;
	}
	add_filter( 'wp_nav_menu_items', 'add_first_nav_item', 10, 2 );
}
/***************************************/








/*
* Create Side Dashboard
******/
/*if ( !function_exists( 'helpme_side_dashboard' ) ) {
	function helpme_side_dashboard() {
		global $helpme_settings;
	$post_id = global_get_post_id();
	if($post_id) {$header_structure = (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'header-structure', true ) : $helpme_settings['header-structure'];}
	

	if($helpme_settings['side-dashboard'] && $header_structure != 'vertical') {
		$output = '';
		$margin_style = $header_structure == 'margin' ? 'header-margin-style' : '';
		$output .= '<div class="helpme-side-dashboard '.$margin_style.'">';
		//$output .= '<span class="helpme-sidedasboard-close"><i class="helpme-icon-close"></i></span>';
		ob_start();
		dynamic_sidebar('Side Dashboard');
		$output .= ob_get_contents();
		ob_end_clean();

		$output .= '</div>';

		echo '<div>'.$output.'</div>';
	}

	}
}*/
/***************************************/





/***************************************/

/*
* Header Toolbar Menu
******/
/* if ( !function_exists( 'helpme_header_toolbar_menu' ) ) {
	function helpme_header_toolbar_menu() {
	global $helpme_settings;
		echo "<div class='toolbar-nav'>";
		echo wp_nav_menu( array(
			'container' => false,
			'menu'	=> ''.$helpme_settings['toolbar-custom-menu'].'',
			'container_id' => false,
			'container_class' => false,
			'menu_class' => 'helpme-toolbar-menu',
			'fallback_cb' => '',
			'walker' => new header_icon_walker()
		));
		echo "</div>";
	}
}*/
/***************************************/



/*
* Header Toolbar Social Networks
******/
if ( !function_exists( 'helpme_header_toolbar_social' ) ) {
	function helpme_header_toolbar_social() {
		global $helpme_settings;

		if($helpme_settings['header-social-select'] == 'disabled') return false;
		if($helpme_settings['header-social-select'] == 'header_section') return false;

		$output = '';

		$output .= '<li class="helpme-header-toolbar-social">';
		

		if(!empty($helpme_settings['header-social-facebook'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-facebook'].'"><i class="helpme-icon-facebook"></i></a>';
		}
		if(!empty($helpme_settings['header-social-twitter'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-twitter'].'"><i class="helpme-icon-twitter"></i></a>';
		}
		if(!empty($helpme_settings['header-social-google-plus'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-google-plus'].'"><i class="helpme-icon-google-plus"></i></a>';
		}
		if(!empty($helpme_settings['header-social-rss'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-rss'].'"><i class="helpme-icon-rss"></i></a>';
		}
		if(!empty($helpme_settings['header-social-pinterest'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-pinterest'].'"><i class="helpme-icon-pinterest"></i></a>';
		}
		if(!empty($helpme_settings['header-social-instagram'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-instagram'].'"><i class="helpme-icon-instagram"></i></a>';
		}
		if(!empty($helpme_settings['header-social-dribbble'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-dribbble'].'"><i class="helpme-icon-dribbble"></i></a>';
		}
		if(!empty($helpme_settings['header-social-linkedin'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-linkedin'].'"><i class="helpme-icon-linkedin"></i></a>';
		}
		if(!empty($helpme_settings['header-social-tumblr'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-tumblr'].'"><i class="helpme-icon-tumblr"></i></a>';
		}
		if(!empty($helpme_settings['header-social-youtube'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-youtube'].'"><i class="helpme-icon-youtube"></i></a>';
		}

		if(!empty($helpme_settings['header-social-vimeo'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-vimeo'].'"><i class="helpme-theme-icon-social-vimeo"></i></a>';
		}
		if(!empty($helpme_settings['header-social-spotify'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-spotify'].'"><i class="helpme-theme-icon-social-spotify"></i></a>';
		}

		if(!empty($helpme_settings['header-social-weibo'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-weibo'].'"><i class="helpme-theme-icon-weibo"></i></a>';
		}
		if(!empty($helpme_settings['header-social-wechat'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-wechat'].'"><i class="helpme-theme-icon-wechat"></i></a>';
		}
		if(!empty($helpme_settings['header-social-renren'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-renren'].'"><i class="helpme-theme-icon-renren"></i></a>';
		}
		if(!empty($helpme_settings['header-social-imdb'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-imdb'].'"><i class="helpme-theme-icon-imdb"></i></a>';
		}
		if(!empty($helpme_settings['header-social-vkcom'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-vkcom'].'"><i class="helpme-theme-icon-vk"></i></a>';
		}
		if(!empty($helpme_settings['header-social-qzone'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-qzone'].'"><i class="helpme-theme-icon-qzone"></i></a>';
		}
		if(!empty($helpme_settings['header-social-whatsapp'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-whatsapp'].'"><i class="helpme-theme-icon-whatsapp"></i></a>';
		}
		if(!empty($helpme_settings['header-social-behance'])) {
			$output .= '<a target="_blank" href="'.$helpme_settings['header-social-behance'].'"><i class="helpme-theme-icon-behance"></i></a>';
		}

		$output .= '</li>';
		

		echo wp_kses_post($output);
	}
}
