<?php
/**
 * functionality of the plugin.
 * @author  Varun Sridharan <varunsridharan23@gmail.com>
 */
if ( ! defined( 'WPINC' ) ) { die; }

class WooCommerce_Quick_Donation_Functions  {
    protected static $project_db_list = null;
    public static $search_template = null;    
    
    function __construct(){
		global $wc_qd_template_list; 
		self::$search_template = $wc_qd_template_list;
        add_filter( 'wc_get_template',array($this,'get_template'),10,5);
        add_filter( 'woocommerce_email_classes',  array($this,'add_email_classes'));
        add_action( 'woocommerce_available_payment_gateways',array($this,'remove_gateway'));
        add_filter( 'woocommerce_locate_template' , array($this,'wc_locate_template'),10,3);
        add_filter( 'the_title', array($this,'wc_page_endpoint_title' ),10,2);
		add_filter( 'wp_count_posts', array($this,'modify_wp_count_posts'),99,3);
		
		add_filter( 'query_vars', array( $this, 'add_query_vars'), 0 );
		//add_filter('single_template',array($this,'cpt_page_template'));
    }
				   
    
    public function get_template_list(){
        return self::$search_template;
    }
    
	public function cpt_page_template($template){
		$template = $template;
		if(WC_QD_PT == get_post_type(get_queried_object_id())){
			$template_located = $this->locate_template('projects/single.php');
			if(!empty($template_located)){$template = $template_located;}
		}
		return $template;
	}
   	
	/**
	 * add_query_vars function.
	 *
	 * @access public
	 * @param array $vars
	 * @return array
	 */
	public function add_query_vars( $vars ) {
		$vars[] = 'donate-now';
		return $vars;
	}
	
    public function wc_page_endpoint_title($title = '', $id = ''){
        if(is_page($id)){
            global $wp_query;

            if ( ! is_null( $wp_query ) && ! is_admin() && is_main_query() && in_the_loop() && is_page() && is_wc_endpoint_url() ) {

                $endpoint = WC()->query->get_current_endpoint();

                if('order-received' == $endpoint){
                    $order_id = $wp_query->query['order-received'];
                    if(WC_QD()->db()->_is_donation($order_id)){
                        $title = 'Donation Received';

                    }
                }

                if('view-order' == $endpoint){
                    $order_id = $wp_query->query['view-order'];
                    if(WC_QD()->db()->_is_donation($order_id)){
                        $title = 'Donation #'.$order_id;
                        remove_filter( 'the_title', 'wc_page_endpoint_title' );
                    }
                }
            }
        }
        return $title;    
    }
    
    public function add_email_classes($email_classes){
        $email_classes[WC_QD_DB.'new_donation_email'] = require(WC_QD_INC.'emails/class-new-email.php');
        $email_classes[WC_QD_DB.'donation_processing_email'] = require(WC_QD_INC.'emails/class-processing-email.php');
        $email_classes[WC_QD_DB.'donation_completed_email'] = require(WC_QD_INC.'emails/class-completed-email.php');
        return $email_classes;
    }
    
    /**
     * Get Donation Project List From DB
     */
    public function get_donation_project_list(){
        if(self::$project_db_list != null || self::$project_db_list != ''){
            return self::$project_db_list;
        }
        $args = array(
            'posts_per_page'   => -1,
            'offset'           => 0,
            'category'         => '',
            'category_name'    => '',
            'orderby'          => 'date',
            'order'            => 'DESC',
            'include'          => '',
            'exclude'          => '',
            'meta_key'         => '',
            'meta_value'       => '',
            'post_type'        => WC_QD_PT,
            'post_mime_type'   => '',
            'post_parent'      => '',
            'author'	   => '',
            'post_status'      => 'publish',
            'suppress_filters' => true 
        );
        self::$project_db_list = get_posts($args);
        return self::$project_db_list;
    }
    
    public function get_porject_list($grouped = false){
        $list = $this->get_donation_project_list();
        $projects = array();
        foreach($list as $project){
            if($grouped){
                $term = get_the_terms( $project->ID, WC_QD_CAT );
                $projects[$term[0]->name][$project->ID] = $project->post_title;
            } else {
                $projects[$project->ID] = $project->post_title;
            } 
        }
        return $projects;
    }
    
     
    public function generate_donation_selbox($grouped = false,$type = 'select',$selected=''){
        global $id, $name, $class, $field_output, $is_grouped, $project_list,$attributes;
        $field_output = '';
		
        $id = 'donation_project';
        $name = 'wc_qd_donate_project_name';
        $class = apply_filters('wcqd_project_name_'.$type.'_class',array(),$type);
        $custom_attributes = apply_filters('wcqd_project_name_'.$type.'_attribute',array(),$type);
        $is_grouped = $grouped;
		$project_list = '';
		if($type != 'hidden'){
			$project_list = $this->get_porject_list($grouped);
		} 

		$class = implode(' ',$class);
        $attributes = '';
        foreach($custom_attributes as $attr_key => $attr_val) {
            $attributes .= $attr_key.'="'.$attr_val.'" ';
        }

        $field_output = $this->load_template('field-'.$type.'.php', WC_QD_TEMPLATE.'fields/' , array('id' => $id, 
                                                                                     'name' => $name, 
                                                                                     'class' => $class, 
                                                                                     'field_output' => $field_output, 
                                                                                     'is_grouped' => $is_grouped, 
                                                                                     'project_list' => $project_list, 
																					 'pre_selected' => $selected,
                                                                                     'attributes' => $attributes));
        return $field_output;
    }

    
    public function generate_price_box($predefined = false){
        global $id, $name, $class, $field_output,$attributes,$value;
		$type = 'text';
		$field_type = 'number';
		if($predefined){$type = 'select';}
        $field_output = '';
        $id = 'donation_price';
        $name = 'wc_qd_donate_project_price';
        $class = apply_filters('wcqd_project_price_class',array(),$type);
        $custom_attributes = apply_filters('wcqd_project_price_attribute',array(),$type);
        $value = '';
		$pre_amt = array();
        $class = implode(' ',$class);
        $attributes = '';
        foreach($custom_attributes as $attr_key => $attr_val) {
            $attributes .= $attr_key.'="'.$attr_val.'" ';
        }
		
		if($predefined){
			
			$amount = wcqd_get_option(WC_QD_DB.'pre_defined_amount');
			$amount = explode('|',$amount);
			$c = get_woocommerce_currency_symbol();
			foreach($amount as $amts){
				$pre_amt[$amts] = $c.''.$amts;
			}
			 
		}
		
        $project_list = $pre_amt;
        $field_output = $this->load_template('field-'.$type.'.php', WC_QD_TEMPLATE.'fields/' , array('id' => $id, 
                                                                                     'name' => $name, 
                                                                                     'class' => $class, 
                                                                                     'field_output' => $field_output, 
                                                                                     'is_grouped' => false, 
                                                                                     'project_list' => $project_list, 
																					 'pre_selected' => false,
                                                                                     'attributes' => $attributes,
																					 'value' => $value,
																					 'field_type' => $field_type));		  
        
        return $field_output;
    }
    
    public function load_template($file,$path,$args = array()){
        $field_output = '';
        $wc_get_template = function_exists('wc_get_template') ? 'wc_get_template' : 'woocommerce_get_template';
        ob_start();
        $wc_get_template( $file,$args, '', $path); 
        $field_output = ob_get_clean(); 
        ob_flush();
        return $field_output;
    }
    
    public function locate_template($template){
        $default_path = WC_QD_TEMPLATE;
        $template_path = WC_CORE_TEMPLATE.'donation/';
        $template = $template;
        $locate = wc_locate_template($template,$template_path, $default_path); 
        return $locate;
    }
    
    public function wc_locate_template($template_full_path,$template_name,$template_dir){
        if(file_exists($template_full_path)){ return $template_full_path; }
        
        $template_full_path = $template_full_path;

        if(isset(self::$search_template['general'][$template_name])){
            $template_full_path = WC_QD_TEMPLATE.self::$search_template['general'][$template_name];
        } 
        if(isset(self::$search_template['is_donation'][$template_name])){
            $template_full_path = WC_QD_TEMPLATE.self::$search_template['is_donation'][$template_name];
        }
        if(isset(self::$search_template['after_order'][$template_name])){
            $template_full_path = WC_QD_TEMPLATE.self::$search_template['after_order'][$template_name];
        }
        
        return $template_full_path;
    }
    
    
    public function remove_gateway($gateways){
        if(WC_QD()->check_donation_exists_cart()){
           $allowed_gateway = WC_QD()->settings()->get_option(WC_QD_DB.'payment_gateway');
           if($allowed_gateway === false){return $gateways;}
			foreach($gateways as $gateway){
                if(! in_array($gateway->id,$allowed_gateway)){
                    unset($gateways[$gateway->id]);
                }
            }
        }
        
        return $gateways;
    }
 
    public function get_admin_pay_gate(){
        $gateway = $this->get_payment_gateways();
        if(! empty($gateway)){
            return $gateway;
        } else {
            wc_qd_notice(__('No Payment Gateway Configured In WooCommerce. Kindly Configure One',WC_QD_TXT),'error');
            
        }
        return array();
    }
    
    public function get_payment_gateways(){
        $payment = WC()->payment_gateways->payment_gateways();
		$gateways = array();

		foreach($payment as $gateway){
			if ( $gateway->enabled == 'yes' ){
				$gateways[$gateway->id] = $gateway->title;
			}
		}
        
		return $gateways;
    }
    
    public function get_template($located, $template_name, $args, $template_path, $default_path ){
        $file = ''; 
        $order_id = 0;
        $found = false;
        if(isset($args['order_id'])){ $order_id = $args['order_id']; }
        if(isset($args['order']->id)){ $order_id = $args['order']->id; }

        if(isset(self::$search_template['general'][$template_name])){
            $file = WC_QD()->f()->locate_template(self::$search_template['general'][$template_name]);
            $found = true;
        }
        
        if(WC_QD()->check_donation_exists_cart()){
            if(isset(self::$search_template['is_donation'][$template_name])){
                $file = WC_QD()->f()->locate_template(self::$search_template['is_donation'][$template_name]);
                $found = true;
            } 
        } 
        
    
        if(WC_QD()->db()->_is_donation($order_id)){
            if(isset(self::$search_template['after_order'][$template_name])){
                $file = WC_QD()->f()->locate_template(self::$search_template['after_order'][$template_name]);
                $found = true;
            } 
        }
        
        if($found){
            return $file;
        } /*else {
            $file = wc_locate_template($template_name);
            return $file;
        }*/
		
        return $located;
    }    
	
	public function modify_wp_count_posts($old_status,$type, $perm = '' ) {
		global $wpdb;
		 
		if ( ! post_type_exists( $type ) ) { return new stdClass;}
		$cache_key = _count_posts_cache_key( $type, $perm );
		$counts = wp_cache_get( $cache_key, 'wc_qd_modified_wp_count_posts' );
				
		if ( false !== $counts ) { return apply_filters( 'wc_qd_modified_wp_count_posts', $counts, $type, $perm ); }
		$query = "SELECT post_status, COUNT( * ) AS num_posts FROM {$wpdb->posts} WHERE  ";
		$query .= " ID NOT IN (SELECT donationid FROM `".WC_QD_TB."`) ";
		$query .= " AND post_type = %s ";
		if ( 'readable' == $perm && is_user_logged_in() ) {
			$post_type_object = get_post_type_object($type);
			if ( ! current_user_can( $post_type_object->cap->read_private_posts ) ) {
				$query .= $wpdb->prepare( " AND (post_status != 'private' OR ( post_author = %d AND post_status = 'private' ))",
					get_current_user_id()
				);
			}
		}
		$query .= ' GROUP BY post_status';
		$results = (array) $wpdb->get_results( $wpdb->prepare( $query, $type ), ARRAY_A );
		$counts = array_fill_keys( get_post_stati(), 0 );
		foreach ( $results as $row ) { $counts[ $row['post_status'] ] = $row['num_posts']; }
		$counts = (object) $counts;
		wp_cache_set( $cache_key, $counts, 'wc_qd_modified_wp_count_posts' );
		return apply_filters( 'wc_qd_modified_wp_count_posts', $counts, $type, $perm );
	}	
	
	
	
	public function get_donate_link($donation_id='364',$amount = 10,$echo = false){
		$data = array('donate' => true, 'id' =>$donation_id,'amount'=>$amount);
		$url = $this->encryptor('encrypt', http_build_query($data));
		$url = site_url().'/donate-now/'.$url;
		if($echo){echo $url; return;}
		return $url; 
	}
	
	public function encryptor($action, $string) {
		$output = false;

		if( $action == 'encrypt' ) {
			$output = base64_encode($string);
		}
		else if( $action == 'decrypt' ){
			$output = base64_decode($string);
		}

		return $output;
	}	
}