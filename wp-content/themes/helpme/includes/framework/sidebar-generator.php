<?php

class helpmeSidebarGenerator {
	var $sidebar_names = array();
	var $footer_sidebar_count = 0;
	var $footer_sidebar_names = array();

	function helpmeSidebarGenerator() {

		$this->sidebar_names = array(
			'page'=>esc_html__( 'Pages', 'helpme' ),
			'single_post'=>esc_html__( 'Blog Single', 'helpme' ),
			'single_cause'=>esc_html__( 'Cause Single', 'helpme' ),
			'single_portfolio'=>esc_html__( 'Portfolio Single', 'helpme' ),
			'search'=>esc_html__( 'Search', 'helpme' ),
			'404'=>esc_html__( '404', 'helpme' ),
			'archive'=>esc_html__( 'Archive', 'helpme' ),
			'woocommerce'=>esc_html__( 'Woocommerce Shop', 'helpme' ),
			'woocommerce_single'=>esc_html__( 'Woocommerce Single', 'helpme' ),
			'bbpress'=>esc_html__( 'bbPress', 'helpme' ),
		);


		$this->footer_sidebar_names = array(
			esc_html__( 'Footer Column One', 'helpme' ),
			esc_html__( 'Footer Column Two', 'helpme' ),
			esc_html__( 'Footer Column Three', 'helpme' ),
			esc_html__( 'Footer Column Four', 'helpme' ),
			esc_html__( 'Footer Column Five', 'helpme' ),
			esc_html__( 'Footer Column Six', 'helpme' ),
		);

	}

	function register_sidebar() {

		$i = 1;

		foreach ( $this->sidebar_names as $name ) {
			register_sidebar( array(
					'name' => $name,
					'id' => 'sidebar-'.$i,
					'description' => $name,
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget' => '</section>',
					'before_title' => '<div class="widgettitle">',
					'after_title' => '</div>',
				) );

			$i++;
		}
		foreach ( $this->footer_sidebar_names as $name ) {
			register_sidebar( array(
					'name' =>  $name,
					'id' => 'sidebar-'.$i,
					'description' => $name,
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget' => '</section>',
					'before_title' => '<div class="widgettitle">',
					'after_title' => '</div>',
				) );
			$i++;
		}


		/*register_sidebar( array(
			'name' =>  'Side Dashboard',
			'id' => 'sidebar-'.$i,
			'description' => 'Side Dashboard',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<div class="widgettitle">',
			'after_title' => '</div>',
		) );*/

		$i++;

		$custom_sidebars = get_option( 'helpme_settings' );
		$custom_sidebars_array = isset($custom_sidebars['custom-sidebar']) ? $custom_sidebars['custom-sidebar'] : null;
		if ( $custom_sidebars_array != null ) {
			foreach ( $custom_sidebars_array as $key => $value ) {
				register_sidebar( array(
						'name' =>  $value,
						'id' => 'sidebar-'.$i,
						'description' => $value,
						'before_widget' => '<section id="%1$s" class="widget %2$s">',
						'after_widget' => '</section>',
						'before_title' => '<div class="widgettitle">',
						'after_title' => '</div>',
					) );
				$i++;
			}
		}
	}

	function get_sidebar( $post_id = null ) {
		if (function_exists('tribe_is_event')) {
			$sidebar = $this->sidebar_names["page"];
		}
		if ( is_archive() ) {
			$sidebar = $this->sidebar_names["archive"];
		}
		if ( is_page() || is_home() ) {
			$sidebar = $this->sidebar_names['page'];
		}
		if (is_search() ) {
			$sidebar = $this->sidebar_names["search"];
		}
		if ( is_404() ) {
			$sidebar = $this->sidebar_names["404"];
		}
		if ( is_singular( 'post' ) ) {
			$sidebar = $this->sidebar_names['single_post'];
		}
		if ( is_singular( 'portfolio' ) ) {
			$sidebar = $this->sidebar_names['single_portfolio'];
		}
		if ( is_singular( 'cause' ) ) {
			$sidebar = $this->sidebar_names['single_cause'];
		}
		if ( is_singular( 'event' ) ) {
			$sidebar = $this->sidebar_names['single_event'];
		}
		if ( function_exists('is_woocommerce') && is_woocommerce() && is_archive()) {
			$sidebar = $this->sidebar_names["woocommerce"];
		}
		if ( function_exists('is_woocommerce') && is_woocommerce() && is_single()) {
			$sidebar = $this->sidebar_names["woocommerce_single"];
		}
		if ( function_exists('is_bbpress') && is_bbpress()) {
			$sidebar = $this->sidebar_names['bbpress'];
		}


		if ( !empty( $post_id ) ) {
			$custom = get_post_meta( $post_id, '_sidebar', true );
			if ( !empty( $custom ) ) {
				$sidebar = $custom;
			}
		}
		if ( isset( $sidebar ) ) {
			dynamic_sidebar( $sidebar );
		}
	}
	/*function get_footer_sidebar() {
		dynamic_sidebar( $this->footer_sidebar_names[$this->footer_sidebar_count] );
		$this->footer_sidebar_count++;
	}*/

	function get_footer_sidebar(){
		$post_id = global_get_post_id();
		if($post_id) {
				if($this->footer_sidebar_count == 0) {
					$single_area = get_post_meta($post_id, '_widget_first_col', true);
					if(!empty($single_area)) {
						dynamic_sidebar($single_area);
					} else {
						dynamic_sidebar($this->footer_sidebar_names[$this->footer_sidebar_count]);
					}
				}
				if($this->footer_sidebar_count == 1) {
					$single_area = get_post_meta($post_id, '_widget_second_col', true);
					if(!empty($single_area)) {
						dynamic_sidebar($single_area);
					} else {
						dynamic_sidebar($this->footer_sidebar_names[$this->footer_sidebar_count]);
					}
				}
				if($this->footer_sidebar_count == 2) {
					$single_area = get_post_meta($post_id, '_widget_third_col', true);
					if(!empty($single_area)) {
						dynamic_sidebar($single_area);
					} else {
						dynamic_sidebar($this->footer_sidebar_names[$this->footer_sidebar_count]);
					}
				}
				if($this->footer_sidebar_count == 3) {
					$single_area = get_post_meta($post_id, '_widget_fourth_col', true);
					if(!empty($single_area)) {
						dynamic_sidebar($single_area);
					} else {
						dynamic_sidebar($this->footer_sidebar_names[$this->footer_sidebar_count]);
					}
				}
				if($this->footer_sidebar_count == 4) {
					$single_area = get_post_meta($post_id, '_widget_fifth_col', true);
					if(!empty($single_area)) {
						dynamic_sidebar($single_area);
					} else {
						dynamic_sidebar($this->footer_sidebar_names[$this->footer_sidebar_count]);
					}
				}
				if($this->footer_sidebar_count == 5) {
					$single_area = get_post_meta($post_id, '_widget_sixth_col', true);
					if(!empty($single_area)) {
						dynamic_sidebar($single_area);
					} else {
						dynamic_sidebar($this->footer_sidebar_names[$this->footer_sidebar_count]);
					}
				}
		} else {
			dynamic_sidebar($this->footer_sidebar_names[$this->footer_sidebar_count]);
		}
		$single_area = '';
		$this->footer_sidebar_count++;
	}

}
global $_helpmeSidebarGenerator;
$_helpmeSidebarGenerator = new helpmeSidebarGenerator;

add_action( 'widgets_init', array( $_helpmeSidebarGenerator, 'register_sidebar' ) );

function helpme_sidebar_generator( $function ) {
	global $_helpmeSidebarGenerator;
	$args = array_slice( func_get_args(), 1 );
	return call_user_func_array( array( &$_helpmeSidebarGenerator, $function ), $args );
}
