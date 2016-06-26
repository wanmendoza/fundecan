<?php

global $woocommerce;


/*
* Check if Woocommerce plugin is enabled.
*/
function helpme_woocommerce_enabled() {
	if ( class_exists( 'woocommerce' ) ) { return true; }
	return false;
}

if ( !helpme_woocommerce_enabled() ) { return false; }
/******************/



require_once (HELPME_THEME_PLUGINS_CONFIG . "/woocommerce-quantity-increment/woocommerce-quantity-increment.php");


/*
* Declares support to woocommerce
*/
add_theme_support( 'woocommerce' );
/******************/




/*
* Overrides woocommerce styles and scripts modified and created by theme
*/
if(!function_exists('helpme_woocommerce_assets')) {
function helpme_woocommerce_assets() {
	$theme_data = wp_get_theme("helpme");
	wp_enqueue_style( 'helpme-woocommerce', HELPME_THEME_STYLES.'/helpme-woocommerce.css', false, $theme_data['Version'], 'all'  );
}
}

add_filter( 'woocommerce_enqueue_styles', 'helpme_woocommerce_assets' );
/******************/






/*
Adds Woocommerce Payment process in cart, checkout and order recieved page
*/

if(!function_exists('helpme_woocommerce_cart_process_steps')) {
	function helpme_woocommerce_cart_process_steps() {

		$cart = $checkout = $complete = '';

		if(is_cart() || is_checkout() || is_order_received_page()) {


		if(is_cart()) {
			$cart = 'active';
		}

		if(is_checkout()) {
			$checkout = 'active';
			$cart = 'active';	
		}
		if(is_order_received_page()) {
			$checkout = 'active';
			$cart = 'active';	
			$complete = 'active';		
		}

		?>

		

		<?php

			}	
	}
}
add_action('page_add_before_content', 'helpme_woocommerce_cart_process_steps');

/******************/


/*
* Removes woocommerce defaults
*/
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
remove_action( 'woocommerce_pagination', 'woocommerce_catalog_ordering', 20 );
remove_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );
remove_action( 'woocommerce_before_single_product', array( $woocommerce, 'show_messages' ), 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_after_single_product_summary','woocommerce_output_related_products', 20);


remove_action( 'woocommerce_single_product_summary',  'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary',  'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary',  'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary',  'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary',  'woocommerce_template_single_meta', 40 );


add_action( 'woocommerce_single_product_summary',  'woocommerce_template_single_title', 6 );
add_action( 'woocommerce_single_product_summary',  'woocommerce_template_single_excerpt', 7 );
add_action( 'woocommerce_single_product_summary',  'woocommerce_template_single_price', 29 );

add_action( 'woocommerce_single_product_summary',  'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary',  'woocommerce_template_single_meta', 40 );








/******************/




/*
* Create theme global HTML wrappers.
*/
add_action( 'woocommerce_before_main_content', 'helpme_woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_after_main_content', 'helpme_woocommerce_output_content_wrapper_end', 10 );


function helpme_woocommerce_output_content_wrapper() {
	global $post, $helpme_settings;


	if ( is_page() ) {
		$layout = get_post_meta( $post->ID, '_layout', true );
	} else if(is_single()) {
		$layout = $helpme_settings['woo-single-layout'];
	} else {
		$layout = $helpme_settings['woo-shop-layout'];
	}


?>
<div id="theme-page">

  	<div class="background-img background-img--page"></div>
  	
	<div class="helpme-main-wrapper-holder">
		<div class="theme-page-wrapper helpme-main-wrapper <?php echo esc_attr($layout); ?>-layout helpme-grid vc_row-fluid">
		<div class="inner-page-wrapper">
			<div class="theme-content">
			<div class="theme-content-inner">
<?php
}


function helpme_woocommerce_output_content_wrapper_end() {
	global $post, $helpme_settings;

	if ( is_page() ) {
		$layout = get_post_meta( $post->ID, '_layout', true );
	} else if(is_single()) {
		$layout = $helpme_settings['woo-single-layout'];
	} else {
		$layout = $helpme_settings['woo-shop-layout'];
	}


?>
			<div class="clearboth"></div>
		</div>
		</div>
		<?php if ( $layout != 'full' ) get_sidebar(); ?>
		<div class="clearboth"></div>
	</div>
	</div>
	</div>
</div>

<?php
}

/******************/





/*
* Add woommerce share buttons
*/

add_action( 'woocommerce_share', 'helpme_woocommerce_share' );

function helpme_woocommerce_share() {
	global $post;
	$image_src_array = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', true );

	$output = '<div class="woocommerce-share"><ul class="single-social-share">';
		$output .= '<li><a class="facebook-share" data-title="'.get_the_title().'" data-url="'.get_permalink().'" href="#"><i class="helpme-icon-facebook"></i></a></li>';
		$output .= '<li><a class="twitter-share" data-title="'.get_the_title().'" data-url="'.get_permalink().'" href="#"><i class="helpme-icon-twitter"></i></a></li>';
		$output .= '<li><a class="googleplus-share" data-title="'.get_the_title().'" data-url="'.get_permalink().'" href="#"><i class="helpme-icon-google-plus"></i></a></li>';
		$output .= '<li><a class="linkedin-share" data-title="'. get_the_title() .'" data-url="'.get_permalink().'" href="#"><i class="helpme-icon-linkedin"></i></a></li>';
		$output .= '<li><a class="pinterest-share" data-image="'.$image_src_array[0].'" data-title="'.get_the_title().'" data-url="'.get_permalink().'" href="#"><i class="helpme-icon-pinterest"></i></a></li>';
				//if( function_exists('helpme_love_this') ) {
					//ob_start();
					//helpme_love_this();
					//$output .= '<li><div class="helpme-love-holder">'.ob_get_clean().'</div></li>';
				//}
	$output .= '</ul><div class="clearboth"></div></div>';

	echo '<div>'.$output.'</div>';

}



/*
* Updates Header Shopping cart fragment
*/
add_filter('add_to_cart_fragments', 'helpme_header_add_to_cart_fragment');
if ( ! function_exists( 'helpme_header_add_to_cart_fragment' ) ) { 
    function helpme_header_add_to_cart_fragment( $fragments ) {
        ob_start();

?>
     <li class="helpme-shopping-cart">

			<a href="<?php echo esc_url( WC()->cart->get_checkout_url() ); ?>" class="helpme-cart-link">
				<i class="helpme-icon-shopping-cart"></i><span><?php echo WC()->cart->cart_contents_count; ?></span> 
			</a>


				<div class="helpme-shopping-box">
					<div class="helpme-shopping-inner-box">
					<div class="shopping-box-header"><span><span class="helpme-skin-color"><i class="helpme-icon-shopping-cart"></i></span><?php echo WC()->cart->cart_contents_count; ?> <?php esc_html_e('Items', 'helpme'); ?><?php esc_html_e('In your Shopping Bag', 'helpme'); ?></span></div>
                    <div class="helpme-shopping-list">
                    <?php                                    
                        if (sizeof(WC()->cart->cart_contents)>0) : foreach (WC()->cart->cart_contents as $cart_item_key => $cart_item) :
                            $_product = $cart_item['data'];                                            
                            if ($_product->exists() && $cart_item['quantity']>0) : 

                          	echo '<div class="mini-cart-item">';

                          			echo '<a class="mini-cart-image" href="'.get_permalink($cart_item['product_id']).'">' . $_product->get_image().'</a>';	
                          		 
                          			 $product_title = $_product->get_title();
                                     echo '<a class="mini-cart-title" href="'.get_permalink($cart_item['product_id']).'">' . apply_filters('woocommerce_cart_widget_product_title', $product_title, $_product) . '</a>';
                                     echo '<div class="mini-cart-price">'.esc_html__('Unit Price', 'helpme').': '.woocommerce_price($_product->get_price()).'</div>';
                                     echo '<div class="mini-cart-quantity">'.esc_html__('Quantity', 'helpme').': <div class="quantity-number">'.$cart_item['quantity'].'</div></div>';
                                     echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="mini-cart-remove" title="%s"><i class="helpme-theme-icon-close"></i></a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), esc_html__('Remove this item', 'helpme') ), $cart_item_key );

                          	echo '</div>';
                       
                        endif;                                        
                        endforeach;
                    ?>

                    </div>
					</div>
                    <?php if ( sizeof( WC()->cart->get_cart() ) > 0 ) : ?>
                        <div class="mini-cart-buttons">
	                        <a href="<?php echo WC()->cart->get_cart_url(); ?>" class="helpme-button mini-cart-button medium"><i class="helpme-icon-shopping-cart"></i><?php esc_html_e('View Cart', 'helpme'); ?></a>   
	                        <a href="<?php echo WC()->cart->get_checkout_url(); ?>" class="helpme-button mini-cart-button medium"><i class="helpme-icon-share"></i><?php esc_html_e('Checkout', 'helpme'); ?></a>
                    	</div>
                    <?php endif; ?>	
                        
                        <?php                                        
                        else: 
                        	echo '<p class="empty">'.esc_html__('No products in the cart.','helpme').'</p>'; 
                        endif;                                    
                    ?>                                                                        
                </div>
	</li>
<?php
        
        $fragments['li.helpme-shopping-cart'] = ob_get_clean();        
        return $fragments;
    }
}





/*
* Header Checkout box.
*/
if ( !function_exists( 'helpme_header_checkout' ) ) {
function helpme_header_checkout($location) {

	global $woocommerce, $helpme_settings;

	if ( !$woocommerce || is_cart() || is_checkout() ) { return false; }

		if($helpme_settings['checkout-box']) :

		?>

<li class="helpme-shopping-cart">

	
	<a href="<?php echo esc_url( WC()->cart->get_checkout_url() ); ?>" class="helpme-cart-link">
		<i class="helpme-icon-shopping-cart"></i><span><?php echo WC()->cart->cart_contents_count; ?></span> 
	</a>

	
	<?php /* Shopping Box, the content will be updated via ajax, you can edit @helpme_header_add_to_cart_fragment() */ ?>
	<div class="helpme-shopping-box">
		<div class="shopping-box-header"><span><span class="helpme-skin-color"><i class="helpme-icon-shopping-cart"></i><?php echo WC()->cart->cart_contents_count; ?> <?php esc_html_e('Items', 'helpme'); ?></span> <?php esc_html_e('In your Shopping Bag', 'helpme'); ?></span></div>
			<?php if (WC()->cart->cart_contents_count == 0) {
				echo '<p class="empty">'.esc_html__('No products in the cart.','helpme').'</p>';
			?>
			<?php } ?>
	</div>
	<?php /***********/ ?>


</li>
<li class="helpme-responsive-shopping-cart">

	
	<a href="<?php echo esc_url( WC()->cart->get_checkout_url() ); ?>" class="helpme-responsive-cart-link">
		<i class="helpme-icon-shopping-cart"></i><span><?php echo WC()->cart->cart_contents_count; ?></span> 
	</a>

	
	<?php /* Shopping Box, the content will be updated via ajax, you can edit @helpme_header_add_to_cart_fragment() */ ?>
	<div class="helpme-shopping-box">
		<div class="shopping-box-header"><span><span class="helpme-skin-color"><i class="helpme-icon-shopping-cart"></i><?php echo WC()->cart->cart_contents_count; ?> <?php esc_html_e('Items', 'helpme'); ?></span> <?php esc_html_e('In your Shopping Bag', 'helpme'); ?></span></div>
			<?php if (WC()->cart->cart_contents_count == 0) {
				echo '<p class="empty">'.esc_html__('No products in the cart.','helpme').'</p>';
			?>
			<?php } ?>
	</div>
	<?php /***********/ ?>


</li>
		<?php 
		endif;	
	}
}

add_action( 'header_checkout', 'helpme_header_checkout' );
/***************************************/





remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );

add_action( 'woocommerce_proceed_to_checkout', 'helpme_woocommerce_button_proceed_to_checkout', 20 );

if ( ! function_exists( 'helpme_woocommerce_button_proceed_to_checkout' ) ) {

	/**
	 * Output the proceed to checkout button.
	 *
	 * @subpackage	Cart
	 */
	function helpme_woocommerce_button_proceed_to_checkout() {
		$checkout_url = WC()->cart->get_checkout_url();

		?>
		<div class="button-icon-holder alt checkout-button-holder"><a href="<?php echo esc_url($checkout_url); ?>" class="checkout-button"><i class="helpme-icon-shopping-cart"></i><?php esc_html_e( 'Proceed to Checkout', 'helpme' ); ?></a></div>
		<?php
	}
}



function helpme_woocommerce_pagination($pages = '', $range = 2)
{  
	 ob_start();
     $showitems = ($range * 2)+1;  
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
     if(1 != $pages)
     {
         echo "<ul>";
         if($paged > 1 && $showitems < $pages) echo "<li><a class='page-numbers prev' href='".get_pagenum_link($paged - 1)."'><i class='helpme-theme-icon-prev-big'></i></a></li>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><span class='page-numbers current'>".$i."</span></li>":"<li><a class='page-numbers' href='".get_pagenum_link($i)."' >".$i."</a></li>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<li><a class='page-numbers next' href='".get_pagenum_link($paged + 1)."'><i class='helpme-theme-icon-next-big'></i></a></li>"; 
         echo "</ul>\n";
     }
	 
	 return ob_get_clean();
}
