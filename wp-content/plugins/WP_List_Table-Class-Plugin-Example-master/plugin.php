<?php

/*
Plugin Name: WP_List_Table Class Example
Plugin URI: http://sitepoint.com
Description: Demo on how WP_List_Table Class works
Version: 1.0
Author: Agbonghama Collins
Author URI:  http://w3guy.com
*/


if ( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class Customers_List extends WP_List_Table {

	/** Class constructor */
	public function __construct() {

		parent::__construct( [
			'singular' => __( 'Customer', 'sp' ), //singular name of the listed records
			'plural'   => __( 'Customers', 'sp' ), //plural name of the listed records
			'ajax'     => false //does this table support ajax?
		] );

	}


	/**
	 * Retrieve customers data from the database
	 *
	 * @param int $per_page
	 * @param int $page_number
	 *
	 * @return mixed
	 */
	public static function get_customers( $per_page = 5, $page_number = 1 ) {

		global $wpdb, $userpro;

		$sql = "SELECT * FROM {$wpdb->prefix}customers";

		if ( ! empty( $_REQUEST['orderby'] ) ) {
			$sql .= ' ORDER BY ' . esc_sql( $_REQUEST['orderby'] );
			$sql .= ! empty( $_REQUEST['order'] ) ? ' ' . esc_sql( $_REQUEST['order'] ) : ' ASC';
		}

		$sql .= " LIMIT $per_page";
		$sql .= ' OFFSET ' . ( $page_number - 1 ) * $per_page;


		$result = $wpdb->get_results( $sql, 'ARRAY_A' );

		//return $result;

		 			$args = array(
					'role'         => 'runner',
					'meta_key'     => '_account_status',
			
				
				 ); 
				$corredores=get_users( $args );
				
				
				
				return $corredores;
	}


	/**
	 * Delete a customer record.
	 *
	 * @param int $id customer ID
	 */
	public static function delete_customer( $id ) {
		global $wpdb;

		$wpdb->delete(
			"{$wpdb->prefix}customers",
			[ 'ID' => $id ],
			[ '%d' ]
		);
	}


	/**
	 * Returns the count of records in the database.
	 *
	 * @return null|string
	 */
	public static function record_count() {
		global $wpdb;

		$sql = "SELECT COUNT(*) FROM {$wpdb->prefix}customers";

		return $wpdb->get_var( $sql );
	}


	/** Text displayed when no customer data is available */
	public function no_items() {
		_e( 'No customers avaliable.', 'sp' );
	}


	/**
	 * Render a column when no column specific method exist.
	 *
	 * @param array $item
	 * @param string $column_name
	 *
	 * @return mixed
	 */
	public function column_default( $item, $column_name ) {
		switch ( $column_name ) {
			case 'email':
				return $item->data->user_email;
			case 'fecha_registro':
				return $item->data->user_registered;
			case 'status':
				//$all_meta_for_user = get_user_meta( $item->data->ID );
				$statususer=get_user_meta( $item->data->ID,'_account_status', true ); 
				if ($statususer=="active"){
					return "Cuenta Activa";
				}else{
					if ($statususer=="pending_admin"){
						return "Pendiente de Aprobacion";
					}
				}
			case 'city':
				return $item[ $column_name ];
			default:
				return print_r( $item, true ); //Show the whole array for troubleshooting purposes
		}
	}

	/**
	 * Render the bulk edit checkbox
	 *
	 * @param array $item
	 *
	 * @return string
	 */
	function column_cb( $item ) {
		$item=$item->data;
		//print_r($item);

		return sprintf(
			'<input type="checkbox" name="bulk-delete[]" value="%s" />', $item->ID
		);
	}


	/**
	 * Method for name column
	 *
	 * @param array $item an array of DB data
	 *
	 * @return string
	 */
	function column_name( $item ) {

		$delete_nonce = wp_create_nonce( 'sp_delete_customer' );

		$title = '<strong>' . $item->data->display_name . '</strong>';

		$actions = [
			'delete' => sprintf( '<a href="?page=%s&action=%s&customer=%s&_wpnonce=%s">Delete</a>', esc_attr( $_REQUEST['page'] ), 'delete', absint( $item->data->ID ), $delete_nonce )
		];

		return $title . $this->row_actions( $actions );
	}

	/**
	 * Render the bulk edit checkbox
	 *
	 * @param array $item
	 *
	 * @return string
	 */
	function column_options( $item ) {
		$item=$item->data;
		//print_r($item);
		$result="";
		$statususer=get_user_meta( $item->ID,'_account_status', true ); 
		if ($statususer=="pending_admin"){
			$result.= sprintf(
		'<a href="#" class="button button-primary upadmin-user-approve" data-user="%s">Aprobar</a>', $item->ID
			);	
		}
		
		$result.= sprintf(
				//'<input type="checkbox" name="bulk-delete[]" value="%s" />', $item->ID
				'<a href="?page=corredores_fundecan&fundecanuser='.$item->ID.'" class="button button-success " data-user="%s">Ver</a>', $item->ID
				);
		

		return $result;
	}

	/**
	 *  Associative array of columns
	 *
	 * @return array
	 */
	function get_columns() {
		$columns = [
			'cb'      => '<input type="checkbox" />',
			'name'    => "Nombre",
			'email' => "Email",
			'status' => "Estado",
			'fecha_registro'    => "Fecha de Registro",
			'options' => "Opciones"
		];

		return $columns;
	}


	/**
	 * Columns to make sortable.
	 *
	 * @return array
	 */
	public function get_sortable_columns() {
		$sortable_columns = array(
			'name' => array( 'name', true ),
			'email' => array( 'email', false )
		);

		return $sortable_columns;
	}

	/**
	 * Returns an associative array containing the bulk action
	 *
	 * @return array
	 */
	public function get_bulk_actions() {
		$actions = [
			'bulk-delete' => 'Delete'
		];

		return $actions;
	}


	/**
	 * Handles data query and filter, sorting, and pagination.
	 */
	public function prepare_items() {

		$this->_column_headers = $this->get_column_info();

		/** Process bulk action */
		$this->process_bulk_action();

		$per_page     = $this->get_items_per_page( 'customers_per_page', 5 );
		$current_page = $this->get_pagenum();
		$total_items  = self::record_count();

		$this->set_pagination_args( [
			'total_items' => $total_items, //WE have to calculate the total number of items
			'per_page'    => $per_page //WE have to determine how many items to show on a page
		] );

		$this->items = self::get_customers( $per_page, $current_page );

		
	}

	public function process_bulk_action() {

		//Detect when a bulk action is being triggered...
		if ( 'delete' === $this->current_action() ) {

			// In our file that handles the request, verify the nonce.
			$nonce = esc_attr( $_REQUEST['_wpnonce'] );

			if ( ! wp_verify_nonce( $nonce, 'sp_delete_customer' ) ) {
				die( 'Go get a life script kiddies' );
			}
			else {
				self::delete_customer( absint( $_GET['customer'] ) );

		                // esc_url_raw() is used to prevent converting ampersand in url to "#038;"
		                // add_query_arg() return the current url
		                wp_redirect( esc_url_raw(add_query_arg()) );
				exit;
			}

		}

		// If the delete bulk action is triggered
		if ( ( isset( $_POST['action'] ) && $_POST['action'] == 'bulk-delete' )
		     || ( isset( $_POST['action2'] ) && $_POST['action2'] == 'bulk-delete' )
		) {

			$delete_ids = esc_sql( $_POST['bulk-delete'] );

			// loop over the array of record IDs and delete them
			foreach ( $delete_ids as $id ) {
				self::delete_customer( $id );

			}

			// esc_url_raw() is used to prevent converting ampersand in url to "#038;"
		        // add_query_arg() return the current url
		        wp_redirect( esc_url_raw(add_query_arg()) );
			exit;
		}
	}

	public function fundecanuserinfo() {
		$fundecanuserid=$_GET["fundecanuser"];

		$all_meta_for_user = get_user_meta( $fundecanuserid );

		$resultstring="";

		foreach ($all_meta_for_user as $key => $value) {
			//echo $key." => ".$value[0];
			if ($key=="display_name"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">Nombre Completo:</label></th><td><input readonly type="text" name="first_name" id="first_name" value="'.$value[0].'" class="regular-text"></td></tr>';
				
			}

			if ($key=="user_email"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">Email:</label></th><td><input type="text" readonly name="first_name" id="first_name" value="'.$value[0].'" class="regular-text"></td></tr>';
				
			}

			if ($key=="gender"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">Género:</label></th><td><input type="text" readonly name="first_name" id="first_name" value="'.$value[0].'" class="regular-text"></td></tr>';
				
			}

			if ($key=="km_torun"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">Kilometros a Correr:</label></th><td><input readonly type="text" name="first_name" id="first_name" value="'.$value[0].'" class="regular-text"></td></tr>';
				
			}

			if ($key=="is_team"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">¿Formará parte de algún equipo?:</label></th><td><input  readonly type="text" name="first_name" id="first_name" value="'.$value[0].'" class="regular-text"></td></tr>';
				
			}

			if ($key=="team_name"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">Nombre del equipo:</label></th><td><input type="text" readonly name="first_name" id="first_name" value="'.$value[0].'" class="regular-text"></td></tr>';
				
			}

			if ($key=="pay_method"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">¿Como pagaste?:</label></th><td><input type="text" readonly name="first_name" id="first_name" value="'.$value[0].'" class="regular-text"></td></tr>';
				
			}

			if ($key=="multiplicador_esperanzas_selec"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">¿Es multiplicador de esperanzas?:</label></th><td><input readonly type="text" name="first_name" id="first_name" value="'.$value[0].'" class="regular-text"></td></tr>';
				
			}

			if ($key=="motivacion_correr"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">Motivacion a correr:</label></th><td><textarea readonly rows="4" cols="50">'.$value[0].'</textarea>';
				
			}

			if ($key=="alcanzar_meta"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">¿Desea alcanzar una meta?:</label></th><td><input readonly type="text" name="first_name" id="first_name" value="'.$value[0].'" class="regular-text"></td></tr>';
				
			}

			if ($key=="meta_a_alcanzar"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">Meta a alcanzar:</label></th><td><input type="text" readonly name="first_name" id="first_name" value="'.$value[0].'" class="regular-text"></td></tr>';
				
			}

			if ($key=="contacto_patrocinadores"){
			$resultstring.='<tr class="user-first-name-wrap"><th><label for="first_name">¿Desea mantener contacto con patrocinadores?:</label></th><td><input type="text" name="first_name" id="first_name" readonly value="'.$value[0].'" class="regular-text"></td></tr>';
				
			}

			if ($key=="_account_status"){
				if ($value[0]=="pending_admin"){
				$resultstring.= sprintf(
'<tr class="user-first-name-wrap"><th><a href="#" class="button button-primary upadmin-user-approve" data-user="%s">Aprobar Cuenta</a></th></tr>', $fundecanuserid
			);	
			}
			}
			
		}

		
		return $resultstring;
		
		
	}

}


class SP_Plugin {

	// class instance
	static $instance;

	// customer WP_List_Table object
	public $customers_obj;

	// class constructor
	public function __construct() {
		add_filter( 'set-screen-option', [ __CLASS__, 'set_screen' ], 10, 3 );
		add_action( 'admin_menu', [ $this, 'plugin_menu' ] );
	}


	public static function set_screen( $status, $option, $value ) {
		return $value;
	}

	public function plugin_menu() {

		$hook = add_menu_page(
			'Corredores Fundecan',//Titulo 
			'Corredores Fundecan',
			'manage_options',
			'corredores_fundecan',
			[ $this, 'plugin_settings_page' ]
		);

		add_action( "load-$hook", [ $this, 'screen_option' ] );

	}


	/**
	 * Plugin settings page
	 */
	public function plugin_settings_page() {
		if (!isset($_GET["fundecanuser"])){
		?>
		<div class="wrap">
			<h2>Listado de Corredores</h2>

			<div id="poststuff">
				<div id="post-body" class="metabox-holder columns-2">
					<div id="post-body-content">
						<div class="meta-box-sortables ui-sortable">
							<form method="post">
								<?php
								$this->customers_obj->prepare_items();
								$this->customers_obj->display(); ?>
							</form>
						</div>
					</div>
				</div>
				<br class="clear">
			</div>
		</div>
	<?php
		}else{
			?>
			<div class="wrap">
				<h2>Informacion de Corredor</h2>

				<div id="poststuff">
					<div id="post-body" class="metabox-holder columns-2">
						<div id="post-body-content">
							<div class="meta-box-sortables ui-sortable">
								<table class="form-table">
									<tbody>
									<?php
										echo $this->customers_obj->fundecanuserinfo();
									?>
									</tbody>
								</table>
								
							</div>
						</div>
					</div>
					<br class="clear">
				</div>
			</div>
			<style>
			.fundecankey{
				display: inline-block;
			}
			.fundecanvalue{
				display: inline-block;
			}
			</style>
			<?php
		}
	}

	/**
	 * Screen options
	 */
	public function screen_option() {

		$option = 'per_page';
		$args   = [
			'label'   => 'Customers',
			'default' => 5,
			'option'  => 'customers_per_page'
		];

		add_screen_option( $option, $args );

		$this->customers_obj = new Customers_List();
	}


	/** Singleton instance */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

}


add_action( 'plugins_loaded', function () {
	SP_Plugin::get_instance();
} );
