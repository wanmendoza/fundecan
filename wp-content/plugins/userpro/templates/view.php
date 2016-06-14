<div class="userpro userpro-<?php echo $i; ?> userpro-id-<?php echo $user_id; ?> userpro-<?php echo $layout; ?>" <?php userpro_args_to_data( $args ); ?>>

	<a href="#" class="userpro-close-popup"><?php _e('Close','userpro'); ?></a>
	
	<div class="userpro-centered <?php if (isset($args['header_only']) && $args['header_only']) { echo 'userpro-centered-header-only'; } ?>">
	
		<?php if ( userpro_get_option('lightbox') && userpro_get_option('profile_lightbox') ) { ?>
		<div class="userpro-profile-img" data-key="profilepicture"><a href="<?php echo $userpro->profile_photo_url($user_id); ?>" class="userpro-tip-fade lightview" data-lightview-caption="<?php echo $userpro->profile_photo_title( $user_id ); ?>" title="<?php _e('View member photo','userpro'); ?>"><?php echo get_avatar( $user_id, $profile_thumb_size ); ?></a></div>
		<?php } else { ?>
		<div class="userpro-profile-img" data-key="profilepicture"><a href="<?php echo $userpro->permalink($user_id); ?>" title="<?php _e('View Profile','userpro'); ?>"><?php echo get_avatar( $user_id, $profile_thumb_size ); ?></a></div>
		<?php } ?>
		<div class="userpro-profile-img-after">
			<div class="userpro-profile-name">
				<a href="<?php echo $userpro->permalink($user_id); ?>"><?php echo userpro_profile_data('display_name', $user_id); ?></a><?php echo userpro_show_badges( $user_id ); ?>
			</div>
			<?php do_action('userpro_after_profile_img' , $user_id); ?>
			<?php if ( userpro_can_edit_user( $user_id ) ) { ?>
			<div class="userpro-profile-img-btn">
				<?php if (isset($args['header_only']) && $args['header_only']){ ?>
				<a href="<?php echo $userpro->permalink($user_id, 'edit'); ?>" class="userpro-button secondary"><?php _e('Edit Profile','userpro') ?></a>
				<?php } else { ?>
				<a href="#" data-up_username="<?php echo $userpro->id_to_member($user_id); ?>" data-template="edit" class="userpro-button secondary"><?php _e('Edit Profile','userpro'); ?></a>
				<?php } ?>
				<img src="<?php echo $userpro->skin_url(); ?>loading.gif" alt="" class="userpro-loading" />
			</div>
			<?php } ?>
		</div>
		
		<div class="userpro-profile-icons top">
			<?php if (isset($args['permalink'])) {
				userpro_logout_link( $user_id, $args['permalink'], $args['logout_redirect'] );
			} else {
				userpro_logout_link( $user_id );
			} ?>
		</div>
			
		<?php echo $userpro->show_social_bar( $args, $user_id, 'userpro-centered-icons' ); ?>
		<div class="divdatafundecan">
			<div class="chartsfundecan">
				<span class="titlechartsfundecan">Tiempo Carrera</span>
				<div class="circle" id="circles-1"></div>
				<script>
				jQuery(document).ready(function(){
					var myCircle = Circles.create({
					  id:                  'circles-1',
					  radius:              60,
					  value:               43,
					  maxValue:            100,
					  width:               10,
					  text:                function(value){return value + "'";},
					  colors:              ['#209705', '#30ff00'],
					  duration:            400,
					  wrpClass:            'circles-wrp',
					  textClass:           'circles-text',
					  valueStrokeClass:    'circles-valueStroke',
					  maxValueStrokeClass: 'circles-maxValueStroke',
					  styleWrapper:        true,
					  styleText:           true
					});
				})
				</script>
			</div>
			<div class="moneyfundecan">
				<span class="titlechartsfundecan">Cantidad Recolectada</span>
				<span class="moneyquantity">Q25.00</span>
			</div>
			<div class="sharedlink">
					<span class="titlechartsfundecan">Link para Compartir</span>
					<a href="<?php echo $userpro->permalink($user_id); ?>" target="_blank" class=" link" ><?php echo $userpro->permalink($user_id); ?></a>
			</div>
			<?php
			 if ( !is_user_logged_in() && !is_page(array('login', 'register')) ){
			 ?>
					<div class="donate-btn">
				<a class="donate-header-btn" href="http://fundecan.local" style="padding: 12px 34px; min-width: 145px;font-size:22px;">DONAR</a>
			</div>
					<?php
				}
				?>
			
			
		</div>
		

		<div class="userpro-clear"></div>
			
	</div>
	
	<?php if (!isset($args['header_only'] ) || (isset($args['header_only']) && ! $args['header_only'] )) { ?>
	
	<?php
	// action hook after user header
	if (!isset($args['disable_head_hooks'])){
		// if (!isset($user_id)) $user_id = 0;
		// $hook_args = array_merge($args, array('user_id' => $user_id, 'unique_id' => $i));
		// do_action('userpro_after_profile_head', $hook_args);
	}
	?>
	
	<div style="display:none;" class="userpro-body">
	
		<?php do_action('userpro_pre_form_message'); ?>

		<form action="" method="post" data-action="<?php echo $template; ?>">
		
			<input type="hidden" name="user_id-<?php echo $i; ?>" id="user_id-<?php echo $i; ?>" value="<?php echo $user_id; ?>" />
			
			<?php // Hook into fields $args, $user_id
			if (!isset($user_id)) $user_id = 0;
			$hook_args = array_merge($args, array('user_id' => $user_id, 'unique_id' => $i));
			do_action('userpro_before_fields', $hook_args);
			?>
			
			<?php foreach( userpro_fields_group_by_template( $template, $args["{$template}_group"] ) as $key => $array ) { ?>
				
				<?php  if ($array) echo userpro_show_field( $key, $array, $i, $args, $user_id ) ?>
				
			<?php } ?>
			
			<?php // Hook into fields $args, $user_id
			if (!isset($user_id)) $user_id = 0;
			$hook_args = array_merge($args, array('user_id' => $user_id, 'unique_id' => $i));
			do_action('userpro_after_fields', $hook_args);
			?>
			
			<?php // Hook into fields $args, $user_id
			if (!isset($user_id)) $user_id = 0;
			$hook_args = array_merge($args, array('user_id' => $user_id, 'unique_id' => $i));
			do_action('userpro_before_form_submit', $hook_args);
			?>
			
			<?php if ( userpro_can_delete_user($user_id) || $userpro->request_verification($user_id) || isset( $args["{$template}_button_primary"] ) || isset( $args["{$template}_button_secondary"] ) ) { ?>
			<div class="userpro-field userpro-submit userpro-column">
				
				<?php if ( $userpro->request_verification($user_id) ) { ?>
				<input type="button" value="<?php _e('Request Verification','userpro'); ?>" class="popup-request_verify userpro-button secondary" data-up_username="<?php echo $userpro->id_to_member($user_id); ?>" />
				<?php } ?>
				
				<?php if ( userpro_can_delete_user($user_id) ) { ?>
				<input type="button" value="<?php _e('Delete Profile','userpro'); ?>" class="userpro-button red" data-template="delete" data-up_username="<?php echo $userpro->id_to_member($user_id); ?>" />
				<?php } ?>
				
				<?php if (isset($args["{$template}_button_primary"]) ) { ?>
				<input type="submit" value="<?php echo $args["{$template}_button_primary"]; ?>" class="userpro-button" />
				<?php } ?>
				
				<?php if (isset( $args["{$template}_button_secondary"] )) { ?>
				<input type="button" value="<?php echo $args["{$template}_button_secondary"]; ?>" class="userpro-button secondary" data-template="<?php echo $args["{$template}_button_action"]; ?>" />
				<?php } ?>

				<img src="<?php echo $userpro->skin_url(); ?>loading.gif" alt="" class="userpro-loading" />
				<div class="userpro-clear"></div>
				
			</div>
			<?php } ?>
		
		</form>
	
	</div>
	
	<?php } ?>

</div>

