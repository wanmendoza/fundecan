<?php

/*
	CONTACT FORM WIDGET
*/

class Helpme_Widget_Login_Form extends WP_Widget {

	function __construct() {
		$widget_ops = array( 'classname' => 'widget_login_form', 'description' => 'Ajax Login Form.' );
		WP_Widget::__construct( 'login_form', HELPME_THEME_SLUG.' - '.'Login Form', $widget_ops );
	}



	function widget( $args, $instance ) {
		$output = '';
		extract( $args );
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		$skin= $instance['skin'];

		$output .= $before_widget;

		if ( $title )
			$output .= $before_title . $title . $after_title;

		if ( !is_user_logged_in() ) {
?>

	<form class="helpme-login-form <?php echo esc_attr($skin); ?>-skin" action="login" method="post">
        <div class="form-row"><i class="helpme-icon-user"></i><input id="username" type="text" name="username" placeholder="<?php esc_html_e( 'Username', 'helpme' ); ?>"></div>
        <div class="form-row"><i class="helpme-icon-lock"></i><input id="password" type="password" name="password" placeholder="<?php esc_html_e( 'Password', 'helpme' ); ?>"></div>
        <input class="submit_button" type="submit" value="Login" name="submit">
        <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
        <p class="helpme-login-status"></p>
    </form>

<?php
	} else {
	$current_user = wp_get_current_user();
	$output .= '<div class="user-login '.$skin.'">';
		$output .= get_avatar( $current_user->ID, 65 ); 
		$output .= '<ul class="">';
			$output .= '<li><span class="username">';		
			if (!empty($current_user->user_firstname) && !empty($current_user->user_lastname)) {
				$output .= $current_user->user_firstname . ' ' . $current_user->user_lastname;
			} else {
				$output .= $current_user->user_login;
			}
			$output .= '</li>';
			$output .= '<li>';
				$woo_my_account = get_option('woocommerce_myaccount_page_id');
				if(class_exists('woocommerce') && !empty($woo_my_account)) {
					$account_link = get_permalink( get_option('woocommerce_myaccount_page_id') );	
				} else {
					$account_link = get_edit_user_link();
				}
				$output .= '<a href="'.$account_link.'">';
					$output .= '<span>'.esc_html__('My Account', 'helpme').'</span>';
				$output .= '</a>';
			$output .= '</li>';
			$output .= '<li>';
				$output .= '<a href="'.wp_logout_url( get_permalink() ).'" class="logout">';
					$output .= '<span>'.esc_html__('Log Out', 'helpme').'</span>';
				$output .= '</a>';
			$output .= '</li>';
		$output .= '</ul>';
	$output .= '<div class="user-login">';
	}
		$output .= $after_widget;
echo '<div>'.$output.'</div>';
	}




	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['skin'] = $new_instance['skin'];
		return $instance;
	}

	function form( $instance ) {
		$title = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$skin = isset( $instance['skin'] ) ? $instance['skin'] : 'dark';
?>
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">Title:</label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'skin' )); ?>">Skin</label>
		<select id="<?php echo esc_attr($this->get_field_id( 'skin' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'skin' )); ?>">
			<option<?php if ( $skin == 'dark' ) echo ' selected="selected"'?> value="dark">Dark</option>
			<option<?php if ( $skin == 'light' ) echo ' selected="selected"'?> value="light">Light</option>
		</select>
		</p>

<?php

	}

}
/***************************************************/


