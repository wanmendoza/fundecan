<?php
/**
 * Order Data
 *
 * Functions for displaying the order data meta box.
 *
 * @author 		WooThemes
 * @category 	Admin
 * @package 	WooCommerce/Admin/Meta Boxes
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * WC_Meta_Box_Order_Data Class
 */
class WC_Quick_Donation_Meta_Box_Order_Data {

	/**
	 * Billing fields
	 *
	 * @var array
	 */
	protected static $billing_fields = array();

	/**
	 * Shipping fields
	 *
	 * @var array
	 */
	protected static $shipping_fields = array();

	/**
	 * Init billing and shipping fields we display + save
	 */
	public static function init_address_fields() {

		self::$billing_fields = apply_filters( 'woocommerce_admin_billing_fields', array(
			'first_name' => array(
				'label' => __( 'First Name', WC_QD_TXT ),
				'show'  => false
			),
			'last_name' => array(
				'label' => __( 'Last Name', WC_QD_TXT ),
				'show'  => false
			),
			'company' => array(
				'label' => __( 'Company', WC_QD_TXT ),
				'show'  => false
			),
			'address_1' => array(
				'label' => __( 'Address 1', WC_QD_TXT ),
				'show'  => false
			),
			'address_2' => array(
				'label' => __( 'Address 2', WC_QD_TXT ),
				'show'  => false
			),
			'city' => array(
				'label' => __( 'City', WC_QD_TXT ),
				'show'  => false
			),
			'postcode' => array(
				'label' => __( 'Postcode', WC_QD_TXT ),
				'show'  => false
			),
			'country' => array(
				'label'   => __( 'Country', WC_QD_TXT ),
				'show'    => false,
				'class'   => 'js_field-country select short',
				'type'    => 'select',
				'options' => array( '' => __( 'Select a country&hellip;', WC_QD_TXT ) ) + WC()->countries->get_allowed_countries()
			),
			'state' => array(
				'label' => __( 'State/County', WC_QD_TXT ),
				'class'   => 'js_field-state select short',
				'show'  => false
			),
			'email' => array(
				'label' => __( 'Email', WC_QD_TXT ),
			),
			'phone' => array(
				'label' => __( 'Phone', WC_QD_TXT ),
			),
		) );

		self::$shipping_fields = apply_filters( 'woocommerce_admin_shipping_fields', array(
			'first_name' => array(
				'label' => __( 'First Name', WC_QD_TXT ),
				'show'  => false
			),
			'last_name' => array(
				'label' => __( 'Last Name', WC_QD_TXT ),
				'show'  => false
			),
			'company' => array(
				'label' => __( 'Company', WC_QD_TXT ),
				'show'  => false
			),
			'address_1' => array(
				'label' => __( 'Address 1', WC_QD_TXT ),
				'show'  => false
			),
			'address_2' => array(
				'label' => __( 'Address 2', WC_QD_TXT ),
				'show'  => false
			),
			'city' => array(
				'label' => __( 'City', WC_QD_TXT ),
				'show'  => false
			),
			'postcode' => array(
				'label' => __( 'Postcode', WC_QD_TXT ),
				'show'  => false
			),
			'country' => array(
				'label'   => __( 'Country', WC_QD_TXT ),
				'show'    => false,
				'type'    => 'select',
				'class'   => 'js_field-country select short',
				'options' => array( '' => __( 'Select a country&hellip;', WC_QD_TXT ) ) + WC()->countries->get_shipping_countries()
			),
			'state' => array(
				'label' => __( 'State/County', WC_QD_TXT ),
				'class'   => 'js_field-state select short',
				'show'  => false
			),
		) );
	}

	/**
	 * Output the metabox
	 */
	public static function output( $post ) {
		global $theorder;

		if ( ! is_object( $theorder ) ) {
			$theorder = wc_get_order( $post->ID );
		}

		$order = $theorder;

		self::init_address_fields();

		if ( WC()->payment_gateways() ) {
			$payment_gateways = WC()->payment_gateways->payment_gateways();
		} else {
			$payment_gateways = array();
		}

		$payment_method = ! empty( $order->payment_method ) ? $order->payment_method : '';

		$order_type_object = get_post_type_object( $post->post_type );
        $donation_type_object = get_post_type_object( 'wcqd_project' );
        
		wp_nonce_field( 'woocommerce_save_data', 'woocommerce_meta_nonce' );
		?>
		<style type="text/css">
			#post-body-content, #titlediv { display:none }
		</style>
		<div class="panel-wrap woocommerce">
			<input name="post_title" type="hidden" value="<?php echo empty( $post->post_title ) ? __( 'Order', WC_QD_TXT ) : esc_attr( $post->post_title ); ?>" />
			<input name="post_status" type="hidden" value="<?php echo esc_attr( $post->post_status ); ?>" />
			<div id="order_data" class="panel">

				<h2><?php echo esc_html( sprintf( __( '%s %s details', WC_QD_TXT ), $donation_type_object->labels->menu_name, $order->get_order_number() ) ); ?></h2>
				<p class="order_number"><?php

					if ( $payment_method ) {
						printf( __( 'Payment via %s', WC_QD_TXT ), ( isset( $payment_gateways[ $payment_method ] ) ? esc_html( $payment_gateways[ $payment_method ]->get_title() ) : esc_html( $payment_method ) ) );

						if ( $transaction_id = $order->get_transaction_id() ) {
								if ( isset( $payment_gateways[ $payment_method ] ) && ( $url = $payment_gateways[ $payment_method ]->get_transaction_url( $order ) ) ) {
								echo ' (<a href="' . esc_url( $url ) . '" target="_blank">' . esc_html( $transaction_id ) . '</a>)';
							} else {
								echo ' (' . esc_html( $transaction_id ) . ')';
							}
						}
						echo '. ';
					}

					if ( $ip_address = get_post_meta( $post->ID, '_customer_ip_address', true ) ) {
						echo __( 'Customer IP', WC_QD_TXT ) . ': ' . esc_html( $ip_address );
					}
				?></p>

				<div class="order_data_column_container">
					<div class="order_data_column">
						<h4><?php _e( 'Donation Details', WC_QD_TXT ); ?></h4>

						<p class="form-field form-field-wide"><label for="order_date"><?php _e( 'Donation date:', WC_QD_TXT ) ?></label>
                            <input type="hidden" name="post_is_donation" value="TRUE"/>
							<input type="text" class="date-picker" name="order_date" id="order_date" maxlength="10" value="<?php echo date_i18n( 'Y-m-d', strtotime( $post->post_date ) ); ?>" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" />@<input type="text" class="hour" placeholder="<?php esc_attr_e( 'h', WC_QD_TXT ) ?>" name="order_date_hour" id="order_date_hour" maxlength="2" size="2" value="<?php echo date_i18n( 'H', strtotime( $post->post_date ) ); ?>" pattern="\-?\d+(\.\d{0,})?" />:<input type="text" class="minute" placeholder="<?php esc_attr_e( 'm', WC_QD_TXT ) ?>" name="order_date_minute" id="order_date_minute" maxlength="2" size="2" value="<?php echo date_i18n( 'i', strtotime( $post->post_date ) ); ?>" pattern="\-?\d+(\.\d{0,})?" />
						</p>

						<p class="form-field form-field-wide"><label for="order_status"><?php _e( 'Donation status:', WC_QD_TXT ) ?></label>
						<select id="order_status" name="order_status" class="wc-enhanced-select">
							<?php
								$statuses = wc_get_order_statuses();
								foreach ( $statuses as $status => $status_name ) {
									echo '<option value="' . esc_attr( $status ) . '" ' . selected( $status, 'wc-' . $order->get_status(), false ) . '>' . esc_html( $status_name ) . '</option>';
								}
							?>
						</select></p>

						<p class="form-field form-field-wide wc-customer-user">
							<label for="customer_user"><?php _e( 'Customer:', WC_QD_TXT ) ?> <?php
								if ( ! empty( $order->customer_user ) ) {
									$args = array( 'post_status' => 'all',
										'post_type'      => 'shop_order',
										'_customer_user' => absint( $order->customer_user )
									);
									printf( '<a href="%s">%s &rarr;</a>',
										esc_url( add_query_arg( $args, admin_url( 'edit.php' ) ) ),
										__( 'View other orders', WC_QD_TXT )
									);
								}
							?></label>
							<?php
							$user_string = '';
							$user_id     = '';
							if ( ! empty( $order->customer_user ) ) {
								$user_id     = absint( $order->customer_user );
								$user        = get_user_by( 'id', $user_id );
								$user_string = esc_html( $user->display_name ) . ' (#' . absint( $user->ID ) . ' &ndash; ' . esc_html( $user->user_email ) . ')';
							}
							?>
							<input type="hidden" class="wc-customer-search" id="customer_user" name="customer_user" data-placeholder="<?php esc_attr_e( 'Guest', WC_QD_TXT ); ?>" data-selected="<?php echo htmlspecialchars( $user_string ); ?>" value="<?php echo $user_id; ?>" data-allow_clear="true" />
						</p>
						<?php do_action( 'woocommerce_admin_order_data_after_order_details', $order ); ?>
					</div>
					<div class="order_data_column">
						<h4>
							<?php _e( 'Donor Details', WC_QD_TXT ); ?>
							<a href="#" class="edit_address"><?php _e( 'Edit', WC_QD_TXT ); ?></a>
							<a href="#" class="tips load_customer_billing" data-tip="<?php esc_attr_e( 'Load billing address', WC_QD_TXT ); ?>" style="display:none;"><?php _e( 'Load billing address', WC_QD_TXT ); ?></a>
						</h4>
						<?php
							// Display values
							echo '<div class="address">';

								if ( $order->get_formatted_billing_address() ) {
									echo '<p><strong>' . __( 'Address', WC_QD_TXT ) . ':</strong>' . wp_kses( $order->get_formatted_billing_address(), array( 'br' => array() ) ) . '</p>';
								} else {
									echo '<p class="none_set"><strong>' . __( 'Address', WC_QD_TXT ) . ':</strong> ' . __( 'No billing address set.', WC_QD_TXT ) . '</p>';
								}

								foreach ( self::$billing_fields as $key => $field ) {
									if ( isset( $field['show'] ) && false === $field['show'] ) {
										continue;
									}

									$field_name = 'billing_' . $key;

									if ( $order->$field_name ) {
										echo '<p><strong>' . esc_html( $field['label'] ) . ':</strong> ' . make_clickable( esc_html( $order->$field_name ) ) . '</p>';
									}
								}

							echo '</div>';

							// Display form
							echo '<div class="edit_address">';

							foreach ( self::$billing_fields as $key => $field ) {
								if ( ! isset( $field['type'] ) ) {
									$field['type'] = 'text';
								}
								if ( ! isset( $field['id'] ) ){
									$field['id'] = '_billing_' . $key;
								}
								switch ( $field['type'] ) {
									case 'select' :
										woocommerce_wp_select( $field );
									break;
									default :
										woocommerce_wp_text_input( $field );
									break;
								}
							}
							?>
							<p class="form-field form-field-wide">
								<label><?php _e( 'Payment Method:', WC_QD_TXT ); ?></label>
								<select name="_payment_method" id="_payment_method" class="first">
									<option value=""><?php _e( 'N/A', WC_QD_TXT ); ?></option>
									<?php
										$found_method 	= false;

										foreach ( $payment_gateways as $gateway ) {
											if ( $gateway->enabled == "yes" ) {
												echo '<option value="' . esc_attr( $gateway->id ) . '" ' . selected( $payment_method, $gateway->id, false ) . '>' . esc_html( $gateway->get_title() ) . '</option>';
												if ( $payment_method == $gateway->id ) {
													$found_method = true;
												}
											}
										}

										if ( ! $found_method && ! empty( $payment_method ) ) {
											echo '<option value="' . esc_attr( $payment_method ) . '" selected="selected">' . __( 'Other', WC_QD_TXT ) . '</option>';
										} else {
											echo '<option value="other">' . __( 'Other', WC_QD_TXT ) . '</option>';
										}
									?>
								</select>
							</p>
							<?php

							woocommerce_wp_text_input( array( 'id' => '_transaction_id', 'label' => __( 'Transaction ID', WC_QD_TXT ) ) );

							echo '</div>';

							do_action( 'woocommerce_admin_order_data_after_billing_address', $order );
						?>
					</div>
					<div class="order_data_column">

						<h4> <?php _e( 'Donation Details', WC_QD_TXT ); ?> </h4>
						<?php
							// Display values
							echo '<div class="">';
                                 
                                require(WC_QD_ADMIN.'metabox/html/html-donation-info.php');
        
								if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' == get_option( 'woocommerce_enable_order_comments', 'yes' ) ) && $post->post_excerpt ) {
									echo '<p><strong>' . __( 'Customer Provided Note', WC_QD_TXT ) . ':</strong> ' . nl2br( esc_html( $post->post_excerpt ) ) . '</p>';
								}

							echo '</div>';

						?>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<?php
	}

	/**
	 * Save meta box data
	 */
	public static function save( $post_id, $post ) {
		global $wpdb;

		if(isset($_POST['post_is_donation'])){
        
        
        self::init_address_fields();
        
        

		// Add key
		add_post_meta( $post_id, '_order_key', uniqid( 'order_' ), true );

		// Update meta
		update_post_meta( $post_id, '_customer_user', absint( $_POST['customer_user'] ) );

		if ( ! empty( self::$billing_fields ) ) {
			foreach ( self::$billing_fields as $key => $field ) {
				if ( ! isset( $field['id'] ) ){
					$field['id'] = '_billing_' . $key;
				}
				update_post_meta( $post_id, $field['id'], wc_clean( $_POST[ $field['id'] ] ) );
			}
		}

        

		if ( isset( $_POST['_transaction_id'] ) ) {
			update_post_meta( $post_id, '_transaction_id', wc_clean( $_POST[ '_transaction_id' ] ) );
		}

		// Payment method handling
		if ( get_post_meta( $post_id, '_payment_method', true ) !== stripslashes( $_POST['_payment_method'] ) ) {

			$methods              = WC()->payment_gateways->payment_gateways();
			$payment_method       = wc_clean( $_POST['_payment_method'] );
			$payment_method_title = $payment_method;

			if ( isset( $methods) && isset( $methods[ $payment_method ] ) ) {
				$payment_method_title = $methods[ $payment_method ]->get_title();
			}

			update_post_meta( $post_id, '_payment_method', $payment_method );
			update_post_meta( $post_id, '_payment_method_title', $payment_method_title );
		}

		// Update date
		if ( empty( $_POST['order_date'] ) ) {
			$date = current_time('timestamp');
		} else {
			$date = strtotime( $_POST['order_date'] . ' ' . (int) $_POST['order_date_hour'] . ':' . (int) $_POST['order_date_minute'] . ':00' );
		}

		// Order data saved, now get it so we can manipulate status
		$order = wc_get_order( $post_id );

		// Order status
		$order->update_status( $_POST['order_status'], '', true );

		// Finally, set the date
		$date = date_i18n( 'Y-m-d H:i:s', $date );

		$wpdb->query( $wpdb->prepare( "UPDATE $wpdb->posts SET post_date = %s, post_date_gmt = %s WHERE ID = %s", $date, get_gmt_from_date( $date ), $post_id ) );

		wc_delete_shop_order_transients( $post_id );
	}
    }
}
