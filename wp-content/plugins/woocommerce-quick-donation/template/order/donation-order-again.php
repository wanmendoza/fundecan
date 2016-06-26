<?php
/**
 * Donate Again
 * 
 * @author  Varun Sridharan
 * @package WooCommerce Quick Donation/Templates/order
 * @version 0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<p class="order-again">
	<a href="<?php echo esc_url( wp_nonce_url( add_query_arg( 'order_again', $order->id ) , 'woocommerce-order_again' ) ); ?>" class="button"><?php _e( 'Order Again', WC_QD_TXT ); ?></a>
</p>
