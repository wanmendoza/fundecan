<!DOCTYPE html>
<html <?php helpme_html_tag_schema(); ?><?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        
        
		<?php if ( ! function_exists( 'wp_site_icon' ) ) : ?>
		<?php $helpme_settings = $GLOBALS['helpme_settings'];?>
		<?php if ( $helpme_settings['favicon']['url'] ) { ?>
          <link rel="shortcut icon" href="<?php echo esc_url($helpme_settings['favicon']['url']); ?>"  />
        <?php } ?>
		<?php endif; ?>

    <?php wp_head(); ?>
    </head>


<body <?php body_class(); ?>


<?php
$helpme_settings = $GLOBALS['helpme_settings'];
 $post_id = global_get_post_id();
if($post_id || !$post_id) {



    $header_structure = (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'header-structure', true ) : $helpme_settings['header-structure'];
	$header_align = (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'header-align', true ) : $helpme_settings['header-align'];
	$header_grid = (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'header-grid', true ) : $helpme_settings['header-grid'];
	$sticky_header = (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'sticky-header', true ) : $helpme_settings['sticky-header'];
	$squeeze_sticky_header =isset($helpme_settings['squeeze-sticky-header']) ? $helpme_settings['squeeze-sticky-header'] : 1;
	
}

  $boxed_layout = $helpme_settings['body-layout'];

  $header_style = $trans_header_skin = $header_padding_class = $header_grid_margin = $trans_header_skin_class = $helpme_main_wrapper_class = '';

  if($header_structure == 'margin') {
    $helpme_main_wrapper_class = ' add-corner-margin';  
  } else if($header_structure == 'vertical') {
	  $header_state = $helpme_settings['vertical-header-state'];
    $helpme_main_wrapper_class = ' vertical-header vertical-' . $header_state . '-state';
  }
  
   
  

if($post_id) {
	$helpme_accent_color = $GLOBALS['helpme_accent_color'];
	$post_id = global_get_post_id();
    $preloader = get_post_meta( $post_id, '_preloader', true );
    $boxed_layout = (get_post_meta( $post_id, '_custom_bg', true ) == 'true') ? get_post_meta( $post_id, 'background_selector_orientation', true ) : $helpme_settings['body-layout'];
    $header_style = get_post_meta( $post_id, '_header_style', true );
    $trans_header_skin = get_post_meta( $post_id, '_trans_header_skin', true );
    $trans_header_skin_class = ($trans_header_skin != '') ? ($trans_header_skin.'-header-skin') : '';
   
          if($preloader == 'true') { 
		?> ?>
 				<div class="helpme-body-loader-overlay"></div>
			
				
         
  <?php  }} ?>

<div class="theme-main-wrapper <?php echo esc_attr($helpme_main_wrapper_class); ?>">

<?php if($header_structure == 'margin') { ?>
<div class="helpme-top-corner"></div>
<div class="helpme-right-corner"></div>
<div class="helpme-left-corner"></div>
<div class="helpme-bottom-corner"></div>
<?php } ?>
<div id="helpme-boxed-layout" class="helpme-<?php echo esc_attr($boxed_layout); ?>-enabled">

<?php

$layout_template = $post_id ? get_post_meta($post_id, '_template', true ) : '';

if($layout_template == 'no-header-title' || $layout_template == 'no-header-title-footer' || $layout_template == 'no-header-title-only-footer') return;


if($layout_template != 'no-header' && $layout_template !='no-header-footer') :


$logo_height = (!empty($helpme_settings['logo']['height'])) ? $helpme_settings['logo']['height'] : 50;
if(isset($squeeze_sticky_header)) {
    $header_sticky_height =	$logo_height/1.5 + ($helpme_settings['header-padding']/2.4 * 2);
} else {
    //$header_sticky_height = $logo_height + ($helpme_settings['header-padding'] * 2);
}
$header_height = $logo_height + ($helpme_settings['header-padding'] * 2);

// Export settings to json 
$helpme_json[] = array(
  'name' => 'theme_header',
  'params' => array(
      'stickyHeight' => $header_sticky_height
    )
);


if($header_style == 'transparent') {
  $header_class = 'transparent-header ' . $trans_header_skin_class;
} else {
  $header_class = $sticky_header ? 'sticky-header' : '';
  $header_padding_class = $sticky_header ? 'sticky-header' : '';
}
if($header_grid == 'true' && is_page() && $header_structure != 'vertical'){
	$header_grid = $header_grid ? 'helpme-grid' : '';
}else if($helpme_settings['header-grid'] && $header_structure != 'vertical'){
	$header_grid = $header_grid ? 'helpme-grid' : '';
}


  $header_class .= ($helpme_settings['boxed-header']) ? ' boxed-header' : ' full-header';
  $header_class .= ($header_structure != 'vertical') ? ($header_align) ? ' header-align-'.$header_align : '' : '';
  $header_class .= ($header_structure) ? ' header-structure-'.$header_structure : '';

  $header_class .= ($header_structure == 'standard') ? (' put-header-'.$helpme_settings['header-location']) : '';
 
  $toolbar =(isset($helpme_settings['header-toolbar']) && !empty($helpme_settings['header-toolbar'])) ? $helpme_settings['header-toolbar'] : 0;
  $toolbar_check = get_post_meta( $post_id, '_header_toolbar', true );
  $toolbar_option = !empty($toolbar_check) ? $toolbar_check : 'true';


?>


<header id="helpme-header" class="<?php echo esc_attr($header_class); ?> <?php echo esc_attr($header_grid); ?> <?php echo esc_attr($header_grid_margin); ?> theme-main-header helpme-header-module" data-header-style="<?php echo esc_attr($header_style); ?>" data-header-structure="<?php echo esc_attr($header_structure); ?>" data-transparent-skin="<?php echo esc_attr($trans_header_skin); ?>" data-height="<?php echo intval($header_height); ?>" data-sticky-height="<?php echo intval($header_sticky_height); ?>">

<?php
  if($header_structure != 'vertical') {
      if($toolbar && is_page()){
        if($toolbar_option == 'true'){
          echo '<div class="helpme-header-toolbar">';
          echo esc_attr($helpme_settings['boxed-header']) && $header_structure != 'vertical' ? '<div class="helpme-grid">' : '';
		  if($helpme_settings['header-contact-select'] == 'header_toolbar') {
            do_action('header_toolbar_contact');
          }
          
          echo '<ul class="helpme-header-toolbar-social">';
          if($helpme_settings['header-social-select'] == 'header_toolbar') {
            do_action('header_toolbar_social');
          }
          echo '</ul>';
          do_action('header_toolbar_menu');
          echo esc_attr($helpme_settings['boxed-header']) && $header_structure != 'vertical' ? '</div>' : '' ;
          echo '</div>';
          echo '<div class="helpme-responsive-header-toolbar"><a href="#" class="helpme-toolbar-responsive-icon"><i class="helpme-icon-chevron-down"></i></a></div>';
        }
		
      }
	  else if($toolbar){
			echo '<div class="helpme-header-toolbar">';
          echo esc_attr($helpme_settings['boxed-header']) && $header_structure != 'vertical' ? '<div class="helpme-grid">' : '';
		  if($helpme_settings['header-contact-select'] == 'header_toolbar') {
            do_action('header_toolbar_contact');
          }
          
          echo '<ul class="helpme-header-toolbar-social">';
          if($helpme_settings['header-social-select'] == 'header_toolbar') {
            do_action('header_toolbar_social');
          }
          echo '</ul>';
          do_action('header_toolbar_menu');
          echo esc_attr($helpme_settings['boxed-header']) && $header_structure != 'vertical' ? '</div>' : '' ;
          echo '</div>';
          echo '<div class="helpme-responsive-header-toolbar"><a href="#" class="helpme-toolbar-responsive-icon"><i class="helpme-icon-chevron-down"></i></a></div>';
			
		}
  }
  if($helpme_settings['boxed-header'] && $header_structure != 'vertical') {
    echo '<div class="helpme-grid">';
  }
      if(is_page()) {
          $helpme_menu_location = get_post_meta( $post_id, '_menu_location', true ) ? get_post_meta( $post_id, '_menu_location', true ) : 'primary-menu';
          do_action( 'vertical_navigation', $helpme_menu_location );
          do_action( 'main_navigation', $helpme_menu_location );
      } else {
        if(is_user_logged_in() && !empty($helpme_settings['loggedin_menu'])) {
          $menu_location = $helpme_settings['loggedin_menu'];
          do_action( 'vertical_navigation', $menu_location );
          do_action( 'main_navigation', $menu_location );
        }else{
          do_action( 'vertical_navigation', 'primary-menu' );
          do_action( 'main_navigation', 'primary-menu' );
        }
      }
  if($helpme_settings['boxed-header'] && $header_structure != 'vertical') {
    echo '</div>';
  }



    if($helpme_settings['header-social-select'] == 'header_section') {
      do_action('header_social', 'outside-grid');
    }
?>


</header>


<?php /* Resposnive navigation container. will be appended via JS */ ?>
<div class="responsive-nav-container"></div>
<?php /*******/ ?>


<?php if($helpme_settings['header-location'] != 'bottom') : ?>
<div class="sticky-header-padding <?php 
if($toolbar && $header_grid == 'true' && $toolbar_option == 'true'){echo esc_attr($header_padding_class); 	} ?>"></div>
<?php endif; ?>

<?php endif; ?>

<?php

if($post_id && $layout_template != 'no-title') {
  if($layout_template != 'no-footer-title' && $layout_template != 'no-sub-footer-title' && $layout_template != 'no-title-footer' && $layout_template != 'no-title-sub-footer' && $layout_template != 'no-title-footer-sub-footer') {
      do_action('page_title');
  }
} else {
  do_action('page_title');
}

?>

