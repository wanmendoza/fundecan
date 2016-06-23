<div class="userpro userpro-<?php echo $i; ?> userpro-<?php echo $layout; ?>" <?php userpro_args_to_data( $args ); ?>>

	<a href="#" class="userpro-close-popup"><?php _e('Close','userpro'); ?></a>
	
	<div class="userpro-head">
		<div class="userpro-left"><?php echo $args["{$template}_heading"]; ?></div>
		<?php if ($args["{$template}_side"]) { ?>
		<div class="userpro-right"><a href="#" data-template="<?php echo $args["{$template}_side_action"]; ?>"><?php echo $args["{$template}_side"]; ?></a></div>
		<?php } ?>
		<div class="userpro-clear"></div>
	</div>
	<div class="logouserprologin">
	<img src="<?php echo site_url();?>/wp-content/uploads/2016/06/logofundecan80.png">
	</div>
	
	<div class="userpro-body">
	<?php   if(isset($args["form_role"]))
		 $_SESSION['form_role']=$args["form_role"];
		else
		 $_SESSION['form_role']='';
		?>
		<?php do_action('userpro_pre_form_message'); ?>

		<form action="" method="post" data-action="<?php echo $template; ?>">
		
			<input type="hidden" name="redirect_uri-<?php echo $i; ?>" id="redirect_uri-<?php echo $i; ?>" value="<?php if (isset( $args["{$template}_redirect"] ) ) echo $args["{$template}_redirect"]; ?>" />
			
			<?php // Hook into fields $args, $user_id
			if (!isset($user_id)) $user_id = 0;
			$hook_args = array_merge($args, array('user_id' => $user_id, 'unique_id' => $i));
			do_action('userpro_before_fields', $hook_args);
			?>
			
			<?php
			// Multiple Registration Forms Support
			if (isset($args['type']) && $userpro->multi_type_exists($args['type'])) {
				$group = array_intersect_key( userpro_fields_group_by_template( $template, $args["{$template}_group"] ), array_flip($userpro->multi_type_get_array($args['type'])) );
			} else {
				$group = userpro_fields_group_by_template( $template, $args["{$template}_group"] );
			}
			?>
		
			<?php foreach( $group as $key => $array ) { ?>
				
				<?php  if ($array) echo userpro_edit_field( $key, $array, $i, $args ) ?>
				
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
			
			<?php if ($args["{$template}_button_primary"] ||  $args["{$template}_button_secondary"] ) { ?>
			<div class="userpro-field userpro-submit userpro-column">
			
				<?php // Hook into fields $args, $user_id
				if (!isset($user_id)) $user_id = 0;
				$hook_args = array_merge($args, array('user_id' => $user_id, 'unique_id' => $i));
				do_action('userpro_inside_form_submit', $hook_args);
				?>
				
				<?php if ($args["{$template}_button_primary"]) { ?>
				<input type="submit" value="<?php echo $args["{$template}_button_primary"]; ?>" class="userpro-button" />
				<?php } ?>
				
				<?php if ($args["{$template}_button_secondary"]) { ?>
				<input type="button" value="<?php echo $args["{$template}_button_secondary"]; ?>" class="userpro-button secondary" data-template="<?php echo $args["{$template}_button_action"]; ?>" />
				<?php } ?>

				<img src="<?php echo $userpro->skin_url(); ?>loading.gif" alt="" class="userpro-loading" />
				<div class="userpro-clear"></div>
				
			</div>
			<?php } ?>
		
		</form>
	
	</div>

</div>
<script>
jQuery(document).ready(function(){
	jQuery(".userpro-field-team_name").hide();
	jQuery(".userpro-field-team_name_select").hide();
	  jQuery('#is_team_NO').click(function(){
	  	jQuery(".userpro-field-team_name").hide();
	  	jQuery(".userpro-field-team_name_select").hide();
	  });

	  jQuery('#is_team_SI').click(function(){
	  	jQuery(".userpro-field-team_name").show();
	  	jQuery(".userpro-field-team_name_select").show();
	  });


	  jQuery(".userpro-field-team_name .userpro-input input").focus(function(){
	  	jQuery(".userpro-field-team_name_select .userpro-input .chosen-container .chosen-single span").html("Seleccione un equipo");

	  	jQuery('.userpro-field-team_name_select .userpro-input select').prop('selectedIndex',-1);
	  });
	
	jQuery(".userpro-field-team_name_select .userpro-input select").change(function(){
		//jQuery(".userpro-field-team_name .userpro-input input").val("");
	});
	
	jQuery("#team_name_select_chosen .chosen-drop .chosen-results").click(function(){
		//jQuery(".userpro-field-team_name .userpro-input input").val("");
	});

  	jQuery("#linkfundecancheckout").hide();
	  jQuery(".userpro-field-pay_method  .userpro-input select").change(function(){
		if (jQuery('.userpro-field-pay_method  .userpro-input select').val()=="No tengo boleto"){
			jQuery("#linkfundecancheckout").show();
		}else{
			jQuery("#linkfundecancheckout").hide();
		}
	});


	jQuery(".userpro-field-alcanzar_meta ").hide();
	jQuery('#multiplicador_esperanzas_SI').click(function(){
	  	jQuery(".userpro-field-alcanzar_meta ").show();
	  });

	  jQuery('#multiplicador_esperanzas_NO').click(function(){
	  	jQuery(".userpro-field-alcanzar_meta ").hide();
	  });


	  jQuery(".userpro-field-meta_a_alcanzar").hide();
	  jQuery('#alcanzar_meta_SI').click(function(){
	  	jQuery(".userpro-field-meta_a_alcanzar").show();
	  });

	  jQuery('#alcanzar_meta_NO').click(function(){
	  	jQuery(".userpro-field-meta_a_alcanzar").hide();
	  });

})
</script>
