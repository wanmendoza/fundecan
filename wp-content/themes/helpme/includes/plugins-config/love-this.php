<?php

class helpmeLovePost {

	function __construct() {
		add_action( 'wp_ajax_helpme_love_post', array( &$this, 'helpme_love_post' ) );
		add_action( 'wp_ajax_nopriv_helpme_love_post', array( &$this, 'helpme_love_post' ) );
	}



	function helpme_love_post( $post_id ) {

		if ( isset( $_POST['post_id'] ) ) {
			$post_id = str_replace( 'helpme-love-', '', $_POST['post_id'] );
			echo '<div>'.$this->love_post( $post_id, 'update' ).'</div>';
		}
		else {
			$post_id = str_replace( 'helpme-love-', '', $_POST['post_id'] );
			echo '<div>'.$this->love_post( $post_id, 'get' ).'</div>';
		}

		exit;
	}


	function love_post( $post_id, $action = 'get' ) {
		if ( !is_numeric( $post_id ) ) return;
		$post_type = get_post_type($post_id);
		$cookie_string = 'helpme_helpme_love_'.$post_type.'_'. $post_id;
		switch ( $action ) {

		case 'get':
			$love_count = get_post_meta( $post_id, '_helpme_post_love', true );
			if ( !$love_count ) {
				$love_count = 0;
				add_post_meta( $post_id, '_helpme_post_love', $love_count, true );
			}

			return '<span class="helpme-love-count">'. $love_count .'</span>';
			break;

		case 'update':
			$love_count = get_post_meta( $post_id, '_helpme_post_love', true );
			
			if ( isset( $_COOKIE['helpme_helpme_love_'.$post_type.'_'. $post_id] ) ) return $love_count;

			$love_count++;
			update_post_meta( $post_id, '_helpme_post_love', $love_count );
			setcookie($cookie_string, $post_id, time()*20, '/' );

			return $love_count;
			break;

		}
	}


	function send_love() {
		global $post;
		$post_type = get_post_type( $post->ID);
		$output = $this->love_post( $post->ID );
		$class = '';
		if ( isset( $_COOKIE['helpme_helpme_love_'.$post_type.'_'. $post->ID] ) ) {
			$class = 'item-loved';
		}

		return '<span class="helpme-love-this '. $class .'" id="helpme-love-'. $post->ID .'"><i class="helpme-icon-heart"></i> '. $output .'</span>';
	}

}


global $helpme_love_this;
$helpme_love_this = new helpmeLovePost();

function helpme_love_this( $return = '' ) {

	global $helpme_love_this;

	if ( $return == 'return' ) {
		return $helpme_love_this->send_love();
	} else {
		echo '<div class="love-main">'.$helpme_love_this->send_love().'</div>';
	}

}

?>
