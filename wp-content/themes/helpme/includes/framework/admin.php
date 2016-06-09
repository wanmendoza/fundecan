<?php
/**
 * Whether the current request is in post type pages
 * 
 * @param mixed $post_types
 * @return bool True if inside post type pages
 */
function helpme_theme_is_post_type($post_types = ''){
	if(helpme_theme_is_post_type_list($post_types) || helpme_theme_is_post_type_new($post_types) || helpme_theme_is_post_type_edit($post_types) || helpme_theme_is_post_type_post($post_types) || helpme_theme_is_post_type_taxonomy($post_types)){
		return true;
	}else{
		return false;
	}
}


function helpme_theme_is_menus() {
	if ('nav-menus.php' == basename($_SERVER['PHP_SELF'])) {
		return true;
	}
	// to be add some check code for validate only in theme options pages
	return false;
}


function helpme_theme_is_widgets()
{
     if ('widgets.php' == basename($_SERVER['PHP_SELF'])) {
          return true;
     }
     // to be add some check code for validate only in theme options pages
     return false;
}

/**
 * Whether the current request is in post type list page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type list page
 */
function helpme_theme_is_post_type_list($post_types = '') {
	if ('edit.php' != basename($_SERVER['PHP_SELF'])) {
		return false;
	}
	if ($post_types == '') {
		return true;
	} else {
		$check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
		if (is_string($post_types) && $check == $post_types) {
			return true;
		} elseif (is_array($post_types) && in_array($check, $post_types)) {
			return true;
		}
		return false;
	}
}

function helpme_theme_is_icon_library()
{
     if (isset($_GET['page']) && $_GET['page'] == 'icon-library') {
          return true;
     }
     return false;
}

/**
 * Whether the current request is in post type new page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type new page
 */
function helpme_theme_is_post_type_new($post_types = '') {
	if ('post-new.php' != basename($_SERVER['PHP_SELF'])) {
		return false;
	}
	if ($post_types == '') {
		return true;
	} else {
		$check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
		if (is_string($post_types) && $check == $post_types) {
			return true;
		} elseif (is_array($post_types) && in_array($check, $post_types)) {
			return true;
		}
		return false;
	}
}
/**
 * Whether the current request is in post type post page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type post page
 */
function helpme_theme_is_post_type_post($post_types = '') {
	if ('post.php' != basename($_SERVER['PHP_SELF'])) {
		return false;
	}
	if ($post_types == '') {
		return true;
	} else {
		$post = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post']) ? $_POST['post'] : false);
		$check = get_post_type($post);
		
		if (is_string($post_types) && $check == $post_types) {
			return true;
		} elseif (is_array($post_types) && in_array($check, $post_types)) {
			return true;
		}
		return false;
	}
}
/**
 * Whether the current request is in post type edit page
 * 
 * @param mixed $post_types
 * @return bool True if inside post type edit page
 */
function helpme_theme_is_post_type_edit($post_types = '') {
	if ('post.php' != basename($_SERVER['PHP_SELF'])) {
		return false;
	}
	$action = isset($_GET['action']) ? $_GET['action'] : (isset($_POST['action']) ? $_POST['action'] : '');
	if ('edit' != $action) {
		return false;
	}
	
	if ($post_types == '') {
		return true;
	} else {
		$post = isset($_GET['post']) ? $_GET['post'] : (isset($_POST['post']) ? $_POST['post'] : false);
		$check = get_post_type($post);
		
		if (is_string($post_types) && $check == $post_types) {
			return true;
		} elseif (is_array($post_types) && in_array($check, $post_types)) {
			return true;
		}
		return false;
	}
}
/**
 * Whether the current request is in post type taxonomy pages
 * 
 * @param mixed $post_types
 * @return bool True if inside post type taxonomy pages
 */
function helpme_theme_is_post_type_taxonomy($post_types = '') {
	if ('edit-tags.php' != basename($_SERVER['PHP_SELF'])) {
		return false;
	}
	if ($post_types == '') {
		return true;
	} else {
		$check = isset($_GET['post_type']) ? $_GET['post_type'] : (isset($_POST['post_type']) ? $_POST['post_type'] : 'post');
		if (is_string($post_types) && $check == $post_types) {
			return true;
		} elseif (is_array($post_types) && in_array($check, $post_types)) {
			return true;
		}
		return false;
	}
}



class helpme_shortcodes_add_buttons {

  function __construct() {
    add_action( 'init', array( &$this, 'init' ) );
  }
  
  function init() {
    if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) ) {
      return;
    }

    if ( get_user_option( 'rich_editing' ) == 'true' ) {
      add_filter( 'mce_external_plugins', array( &$this, 'helpme_shortcodes_plugin' ) );
      add_filter( 'mce_buttons', array( &$this,'helpme_shortcodes_register' ) );
    }  
  }

  function helpme_shortcodes_plugin( $plugin_array ) {
  	if ( floatval( get_bloginfo( 'version' ) ) >= 3.9 ) {
      $tinymce_js = HELPME_THEME_ADMIN_ASSETS_URI .'/js/min/tinymce-button-ck.js';
    } else {
      $tinymce_js = HELPME_THEME_ADMIN_ASSETS_URI .'/js/tinymce-button-old.js';
    }
    
    $plugin_array['helpme_shortcodes'] = $tinymce_js;
    return $plugin_array;
  }

  function helpme_shortcodes_register( $buttons ) {
    array_push( $buttons, 'helpme_shortcodes_button' );
    return $buttons;
  }

}

$helpme_shortcodes = new helpme_shortcodes_add_buttons;




/*
***** Theme backend scripts
*/
function helpme_theme_admin_scripts_styles() {
	wp_enqueue_script('jquery-ui-slider');
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
	wp_enqueue_script( 'admin-scripts', HELPME_THEME_ADMIN_ASSETS_URI .'/js/admin-scripts.js');
	wp_register_script( 'chosen', HELPME_THEME_ADMIN_ASSETS_URI . '/js/chosen.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'chosen');
	wp_enqueue_style( 'admin-styles', HELPME_THEME_ADMIN_ASSETS_URI .'/css/admin.css');
	
}

if(helpme_theme_is_post_type()) {
	add_action( 'admin_print_scripts', 'helpme_theme_admin_scripts_styles' );
}





function helpme_menus_hook() {
	if (function_exists('wp_enqueue_media')) {
	  wp_enqueue_media();
	}
     
	wp_enqueue_script( 'thickbox' );
	wp_enqueue_style('thickbox');
	wp_enqueue_script( 'helpme-menus-scripts', HELPME_THEME_ADMIN_ASSETS_URI . '/js/helpme-menus-scripts.js', array( 'jquery' ), false, true );
	wp_enqueue_style( 'helpme-menus-styles', HELPME_THEME_ADMIN_ASSETS_URI . '/css/helpme-menus-styles.css' );

}


if ( helpme_theme_is_menus() ) {
	add_action( 'admin_init', 'helpme_menus_hook' );
	
}

function helpme_theme_activated(){
		if ('themes.php' == basename($_SERVER['PHP_SELF']) && isset($_GET['activated']) && $_GET['activated']=='true' ) {
			update_option( 'woocommerce_enable_lightbox', "no" );
			wp_redirect( admin_url('themes.php?page=tgmpa-install-plugins') );
		}
}

add_action( 'admin_init', 'helpme_theme_activated' ); 



function helpme_add_widgets_scripts() {
     wp_enqueue_style('wp-color-picker');
     wp_enqueue_script('wp-color-picker');
     wp_enqueue_script('widget-scripts', HELPME_THEME_ADMIN_ASSETS_URI . '/js/widgets.js', array(
          'jquery'
     ), false, true);
     wp_enqueue_style('theme-style', HELPME_THEME_ADMIN_ASSETS_URI . '/css/widgets.css');
}
if(helpme_theme_is_widgets()) {
     add_action('admin_init', 'helpme_add_widgets_scripts');
}

