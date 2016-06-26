<div class="userpro userpro-<?php echo $i; ?> userpro-id-<?php echo $user_id; ?> userpro-<?php echo $layout; ?>" <?php userpro_args_to_data( $args ); ?>>

	<a href="#" class="userpro-close-popup"><?php _e('Close','userpro'); ?></a>
	
	<div class="userpro-centered <?php if (isset($args['header_only']) && $args['header_only']) { echo 'userpro-centered-header-only'; } ?>">
	
		<?php if ( userpro_get_option('lightbox') && userpro_get_option('profile_lightbox') ) { ?>
		<div class="userpro-profile-img" data-key="profilepicture">
			<div class="" style=" display:inline-block">
			<a href="<?php echo $userpro->profile_photo_url($user_id); ?>" class="userpro-tip-fade lightview" data-lightview-caption="<?php echo $userpro->profile_photo_title( $user_id ); ?>" title="<?php _e('View member photo','userpro'); ?>"><?php echo get_avatar( $user_id, $profile_thumb_size ); ?></a>
			</div>
			<div class="" style="width:50%; display:inline-block">
				<div class="divmotivacionlabel">
					Mi motivación a correr:
				</div>
				<div class="divmotivacion">
				<?php
					echo $quoteuser = '"'.get_user_meta($user_id, 'motivacion_correr', true).'"';
				?>
				</div>
			
			</div>

			</div>
		<?php } else { ?>
		<div class="userpro-profile-img" data-key="profilepicture">
			<div class="" style=" display:inline-block">
				<a href="<?php echo $userpro->permalink($user_id); ?>" title="Ver Perfil"><?php echo get_avatar( $user_id, $profile_thumb_size ); ?></a>
			</div>
			<div class="" style="width:50%; display:inline-block">
				<div class="divmotivacionlabel">
					Mi motivación a correr:
				</div>
				<div class="divmotivacion">
				<?php
					echo $quoteuser = '"'.get_user_meta($user_id, 'motivacion_correr', true).'"';
				?>
				</div>
			
			</div>

		</div>
		<?php } ?>
		<div class="userpro-profile-img-after">
			<div class="userpro-profile-name">
				<a href="<?php echo $userpro->permalink($user_id); ?>"><?php echo userpro_profile_data('display_name', $user_id); ?></a><?php echo userpro_show_badges( $user_id ); ?>
			</div>
			

			<?php do_action('userpro_after_profile_img' , $user_id); ?>


			<?php if ( userpro_can_edit_user( $user_id ) ) { ?>
			<div class="userpro-profile-img-btn">
				<?php if (isset($args['header_only']) && $args['header_only']){ ?>
				<a href="<?php echo $userpro->permalink($user_id, 'edit'); ?>" class="userpro-button secondary">Editar Perfil</a>
				<?php } else { ?>
				<a href="#" data-up_username="<?php echo $userpro->id_to_member($user_id); ?>" data-template="edit" class="userpro-button secondary">Editar Perfil</a>
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
		<div class="divnamefundecan" style="font-size: 24px;color: #fff;">
			<?php
				echo $statususer=get_user_meta( $user_id,'display_name', true ); 
			?>
		</div>
		<?php
			$teamuser = get_user_meta($user_id, 'team_name');
			if ($teamuser[0]!=""){
				?>
				<div class="divteamname" style="">
					<span>Equipo: </span> 
					<span>
					<?php
					echo $teamuser;
					?>
					</span>
				</div>
				<?php
			}
		?>
		
		<hr style="border: 1px solid;margin-top: 15px;margin-bottom: 15px;">
		<!-- <?php echo $userpro->show_social_bar( $args, $user_id, 'userpro-centered-icons' ); ?> -->
		<div class="divkilometros" style="margin-bottom:35px; margin-top:35px;">
			<div class="quantitykil" style="font-size: 82px;color: #fff;">00.00</div>
			<div class="titulokil" style="font-size: 18px;color: #fff;">Kilometros Recorridos</div>
		</div>
		<style>
		 div.userpro-profile-img {
			    width: 100% !important;
			}
		.userpro-profile-img{
			width: 100%;
		}

		.divmotivacionlabel {
			    color: #fff;
			    font-size: 16px;
			}

			.divmotivacion {
			    border: 1px solid #fff !important;
			    color: #ffffff;
			    font-size: 14px;
			    font-style: italic;
			    margin-left: 20px !important;
			    margin-right: 20px !important;
			    margin-top: 10px !important;
			    padding: 15px !important;
			}

			a.userpro-small-link {
			    background: #d10572 none repeat scroll 0 0;
			    border-radius: 5px;
			    color: #fff !important;
			    height: 40px !important;
			    padding: 10px !important;
			    width: 80px;
			}

			input.userpro-button.secondary, a.userpro-button.secondary, div.userpro div.ajax-file-upload {
			    background: #d10572 none repeat scroll 0 0 !important;
			    border: medium none !important;
			    box-shadow: none !important;
			    color: #fff !important;
			    height: 34px !important;
			    margin-bottom: 15px !important;
			    padding: 3px !important;
			    width: 100px;
			}
		</style>
		
		<div class="divdatafundecan">
			<div class="chartsfundecan" style="display:inline-block">
				<span class="titlechartsfundecan">Tiempo Carrera</span>
				<div class="circle" id="circles-1"></div>
				<?php
					$km_torun=get_user_meta( $user_id,'km_torun', true );
					if ($km_torun=="Todo lo que quieras"){
						$km_torun="Indefinido";
					}
				?>
				<div class="metaalcanzar">
					<?php
					echo "Km a correr: <br>".$km_torun;
					?>
				</div>
				<?php
					$timecarrera=10;
					$maxtimecarrera=0;
					if ($timecarrera<=60){
						$maxtimecarrera=60;
					}else{
						if ($timecarrera>60 && $timecarrera<=120){
							$maxtimecarrera=120;
						}else{
							if ($timecarrera>120 && $timecarrera<=180){
								$maxtimecarrera=180;
							}else{
								if ($timecarrera>180 && $timecarrera<=240){
									$maxtimecarrera=240;
								}
							}
						}
					}
				?>
				<script>
				jQuery(document).ready(function(){
					var myCircle = Circles.create({
					  id:                  'circles-1',
					  radius:              80,
					  value:               <?php echo $timecarrera;?>,
					  maxValue:            <?php echo $maxtimecarrera;?>,
					  width:               10,
					  text:                function(value){return value + "'";},
					  colors:              ['#ffffff', '#e14500'],
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
				<style>
				.circles-text{
					color:#ffffff;
					font-size:24px !important;
				}

				.metaalcanzar {
				    color: #fff;
				    font-size: 18px;
				}
				</style>
			</div>
			<div class="chartsfundecan" style="display:inline-block">
				<span class="titlechartsfundecan">Recaudación</span>
				<div class="circle" id="circles-2"></div>
				<?php
					$alcanzarmeta=get_user_meta( $user_id,'alcanzar_meta', true );
					$metaalcanzar=get_user_meta( $user_id,'meta_a_alcanzar', true );

					$valoracumulado=10;
					if ($alcanzarmeta=="SI" && $metaalcanzar!=""){
						?>
						<div class="metaalcanzar">
							<?php
						echo 'Meta a alcanzar: <br>Q'.$metaalcanzar;
							?>
						</div>
						<?php
					}
				?>
				<script>
				jQuery(document).ready(function(){
					var myCircle = Circles.create({
					  id:                  'circles-2',
					  radius:              80,
					  value:               <?php echo $valoracumulado;?>,
					  maxValue:            <?php echo $metaalcanzar;?>,
					  width:               10,
					  text:                function(value){return "Q"+value;},
					  colors:              ['#ffffff', '#30ff00'],
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

		
			<div class="sharedlink">
					<span class="titlechartsfundecan">Comparte tu perfil para obtener donaciones:</span>
					<a href="<?php echo $userpro->permalink($user_id); ?>" target="_blank" class=" link" ><?php echo $userpro->permalink($user_id); ?></a>
			</div>
			
					<div class="donate-btn">
				<a class="donate-header-btn" href="http://fundecan.local" style="padding: 12px 34px; min-width: 145px;font-size:22px;">DONAR</a>
			</div>
				
			
			
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

