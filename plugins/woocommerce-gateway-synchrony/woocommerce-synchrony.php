<?php
	/**
 	 * Gateway class
 	 */
class WC_Gateway_Synchrony extends WC_Payment_Gateway {

	function __construct(){
		$this->id = 'synchrony';
		$this->has_fields = true;
		$this->method_title = 'Synchrony Financing';
		$this->method_description = 'Gateway connecting to Synchrony Financial for MattressFirm.';
		$this->LOGIN_UNAUTH_FAIL = "Merchant login Unauthorized";
		$this->LOGIN_URL_FAIL = "Login URL not found";
		// Load the form fields
		$this->init_form_fields();
		// Init settings
		$this->init_settings();
		// get the values we init-ed
		$this->title = $this->get_option( 'title' );
		$this->description  = $this->get_option( 'description' );
		$this->checkout_description  = $this->get_option( 'checkout_description' );
		$this->synchrony_success  = $this->get_option( 'synchrony_success' );
		$this->synchrony_error  = $this->get_option( 'synchrony_error' );
    $this->enabled  = $this->get_option( 'enabled' );
    $this->merchant_number = $this->get_option('merchant_number');
    $this->user_id = $this->get_option('user_id');
    $this->password = $this->get_option('password');
    $this->login_url = $this->get_option('login_url');
    $this->bg_color = $this->get_option('bg_color');
    $this->home_url = $this->get_option('home_url');
    $this->logo_url = $this->get_option('logo_url');
    $this->processing_url = $this->get_option('processing_url');
    $this->test_mode = $this->get_option('test_mode');
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_receipt_' . $this->id, array( $this, 'receipt_page' ) );
		add_action( 'woocommerce_api_wc_gateway_synchrony', array( $this, 'return_handler'));
	}

	function init_form_fields(){
		$this->form_fields = array(
			'enabled' => array(
				'title' => __( 'Enable/Disable', 'woocommerce' ),
				'type' => 'checkbox',
				'label' => __( 'Enable Synchrony Financial', 'woocommerce' ),
				'default' => 'yes'
			),
			'title' => array(
				'title' => __( 'Title', 'woocommerce' ),
				'type' => 'text',
				'description' => __( 'This controls the title which the user sees during checkout.', 'woocommerce' ),
				'default' => __( 'Financing through Synchrony Financial', 'woocommerce' ),
				'desc_tip'      => true,
			),
			'user_id' => array(
				'title' => __( 'User ID', 'woocommerce' ),
				'type' => 'text',
				'description' => __( 'The User ID to login with Synchrony financial.', 'woocommerce' ),
				'default' => __( '5348122280400082', 'woocommerce' ),
				'desc_tip'      => true,
			),
			'password' => array(
				'title' => __( 'Password', 'woocommerce' ),
				'type' => 'password',
				'description' => __( 'Password for login to Synchrony financial', 'woocommerce' ),
				'default' => __( '00082$Test', 'woocommerce' ),
				'desc_tip'      => true,
			),
			'description' => array(
				'title' => __( 'Customer Message for Synchrony Financial Form', 'woocommerce' ),
				'type' => 'textarea',
				'default' => ''
			),
			'checkout_description' => array(
				'title' => __( 'Customer Message for Checkout page', 'woocommerce' ),
				'type' => 'textarea',
				'default' => 'Please submit your order to continue to enter additional information for Synchrony Financial.'
			),
			'synchrony_error' => array(
				'title' => __( 'Synchrony Payment Failure Error Message', 'woocommerce' ),
				'type' => 'textarea',
				'default' => "Your Synchrony financial payment has failed, please proceed with a different method of payment. Alternatively, you may correct any errors and attempt payment again through Synchrony Financial."
			),
			'synchrony_success' => array(
				'title' => __( 'Synchrony Payment Success Notification Message', 'woocommerce' ),
				'type' => 'textarea',
				'default' => "Your order will complete processing when Synchrony Financial submits authorization data."
			),
			'test_mode' => array(
				'title' => __( 'Test Mode', 'woocommerce' ),
				'type' => 'checkbox',
				'default' => 1,
				'description' => "Use the test mode for development, see docs for more info on test values."
			),
			'merchant_number' => array(
				'title' => __( 'Merchant Number', 'woocommerce' ),
				'type' => 'text',
				'default' => "5348122280400082",
				'description' => "The Merchant Number for the website to use. Submitted to Synchrony for verification."
			),
			'login_url' => array(
				'title' => 'Login URL for Synchrony endpoint',
				'default' => 'https://twww.secureb2c.com/process/login.do',
				'description' => 'This is the URL used to validate the apps access to Synchrony',
			),
			'processing_url' => array(
				'title' => 'Processing URL for Synchrony endpoint',
				'default' => 'https://twww.secureb2c.com/process/shoppingCartProcessor.do',
				'description' => 'This is the URL which Synchrony will trigger processing on when data is submitted',
			),
			'home_url' => array(
				'title' => 'Homepage URL linking back to Synchrony endpoint',
				'default' => "http://www.dreambed.com",
				'description' => 'This is the URL which will show up on synchrony webpages which links back to your site',
			),
			'bg_color' => array(
				'title' => 'Background color',
				'default' => "F8BE42",
				'description' => 'Background color for synchrony financial to use on their pages to match the look and feel of your site',
			),
			'logo_url' => array(
				'title' => 'Path to Logo image file',
				'default' => get_bloginfo("template_url")."/images/logo-the-dream-bed.svg",
				'description' => 'Must be a publicly accessible file that will be displayed on the synchrony financial pages. ',
			),
		);
	}

	/*
	* The form output on the checkout page. overrides parent function, but doesn't actually output any fields since we do that elsewhere
	*/
	function payment_fields(){
		if ( $this->test_mode == 'yes'  ) {
			$description .= ' ' . sprintf( __( 'TEST MODE ENABLED.', 'woocommerce' ) );
		}
		$description .= $this->checkout_description;
		if ( $description ) {
			echo wpautop( wptexturize( trim( $description ) ) );
		}
	}

	/* validate fields on the checkout page */
	function validate_fields(){
		$fn = $_POST['billing_first_name'];
		$ln = $_POST['billing_last_name'];
		if(!ctype_alpha($fn) || !ctype_alpha($ln)){
			wc_add_notice('Billing first and last name cannot contain numbers', 'error');
		}
	}

	/**
	* triggered on submitting from checkout page 
	* Doesn't actually process payment yet, because we are 	* redirecting to synchrony's external site and handling their response instead
	*/
	function process_payment( $order_id ) {
		global $woocommerce;
		$order = new WC_Order( $order_id );
		return array(
				'result'   => 'success',
				'redirect' => $order->get_checkout_payment_url( true )
		);
		
		$response = wp_safe_remote_post( $this->processing_url, array(
			'method'    => 'POST',
			'body'      => http_build_query( $this->build_info_for_synchrony($order) ),
			'timeout'   => 30,
			'sslverify' => false,
		) );
		if (!isset($this->profile_id) || !isset($this->profile_key)) {
			wc_add_notice( 'Gateway Configuration Error, Please contact the site admin!', 'error' );
			return array(
				'result'   => 'fail',
				'redirect' => ''
			);
		} 
		// redirect to the receipt page
		return array(
			'result' => 'success',
			'redirect' => $this->get_return_url( $order )
		);
	}

	/**
	 * Receipt page
	 * This is our real payment form, which will send data on to synchrony financial
	 * 
	 * @param  int $order_id
	 */
	public function receipt_page( $order_id ) {
		$order = wc_get_order( $order_id );
		$this->setup_token();
		$values = $this->build_info_for_synchrony($order);
		$test_mode = $values['clientTestFlag'];

		echo '<form action="'.$this->processing_url.'" method="post" name="theform">';
			echo '<p class="alert"> '.$this->description.'</p>';
			echo '<p class="form-row form-row-wide">
				<label for="billToSsn"> Social Security Number (Required if no Account number)</label>
				<input id="billToSsn" name="billToSsn" class="input-text" type="text" maxlength="9" placeholder="xxx-xx-xxxx"/>
			</p>';
			echo '<p class="form-row form-row-wide">
				<label for="billToAccountNumber"> Account number  (Required if no Social Security Number) </label>
				<input id="billToAccountNumber" name="billToAccountNumber" class="input-text" type="text" maxlength="16" placeholder="**** **** **** ****"/>
			</p>';
			foreach($values as $name => $value){
				if($test_mode && $name == 'promoCode'){
					echo '<label for"promoCode"> Promo Code for transaction: </label>';
					echo '<input id="promoCode" name="promoCode" class="input-text" type="text" maxlength="3" placeholder="***"/>';
				}
				elseif($name != 'billToSsn' && $name != 'billToAccountNumber'){
					echo "<!-- do not edit these values or the order may fail -->";
					echo '<input type="hidden" name="'.$name.'" value="'.$value.'" />';
				}
			}
			echo '<input type="submit" value="SynchronySecureCheckout" />';
		echo "</form>";

		echo '<a class="button cancel" href="'.$order->get_cancel_order_url().'">Cancel Order & Restore Cart</a>';

	}

	function setup_token(){
		global $woocommerce;
		$cart_url = $woocommerce->cart->get_cart_url();
		$token = $this->get_user_token();
		if( $token == $this->LOGIN_UNAUTH_FAIL
				|| $token == $this->LOGIN_URL_FAIL){ 
			wc_add_notice('Error connecting to the Synchrony Financial Gateway. Please contact site administrator. '.$token, 'error');
			wp_redirect($cart_url);
		}
		else{
			$this->client_token = $token;
		}	
	}

	function build_info_for_synchrony( $order){
		$test_flag = $this->test_mode == 'yes'  ? 'Y' : 'N';
		return array(
			"shopperId"						=> ($order->get_user_id() == 0 ? "anon".$order->id : $order->get_user_id()),
			"merchantId"					=> $this->merchant_number,
			"homeUrl"							=> $this->home_url,
			"imageUrl"						=> $this->logo_url,
			"backgroundColor"			=> $this->bg_color,
			"billToFirstName" 		=> $order->billing_first_name ,
			"billToMiddleInitial" => $order->billing_middle_name ,
			"billToLastName" 			=> $order->billing_last_name ,
			"billToAddress1" 			=> $order->billing_address_1 ,
			"billToAddress2" 			=> $order->billing_address_2 ,
			"billToCity" 					=> $order->billing_city ,
			"billToState" 				=> $order->billing_state ,
			"billToZipCode" 			=> $order->billing_postcode ,
			"bllToHomePhone" 			=> $order->billing_phone ,
			"billToSsn" 					=> "",
			"billToAccountNumber"	=> "",
			"transactionAmount"		=> $order->order_total,
			"promoCode"						=> "100", // what determines this?!
			"clientTestFlag"			=> $test_flag,
			"billToExpMM"					=> "12", // hardcode default
			"billToExpYY"					=> "49", // hardcode default
			"clientTransactionId"						=> $order->id,
			"purchaseNotificationUrl"				=> $this->get_url_for('purchaseNotification',$order->id),
			"creditApplyNotificationUrl"		=> $this->get_url_for('creditApplyNotification',$order->id),
			"clientUnsuccessPurchaseUrl"		=> $this->get_url_for('clientUnsuccessfulPurchase',$order->id),
			"clientSuccessfulPurchaseUrl"		=> $this->get_url_for('clientSuccessfulPurchase',$order->id),
			"clientUnsuccessApplyUrl"				=> $this->get_url_for('clientUnsuccessfulAppply',$order->id),
			"clientSuccessfulApplyUrl"			=> $this->get_url_for('clientSuccessfulApply',$order->id),
			"clientToken"										=> trim($this->client_token),
		);	
	}	
		/*
	* Return handler 
	*/
	function return_handler(){
		error_log("return handling ".implode(",",$_POST));
		@ob_clean(); //not sure this is necessary?
		if($_POST['type']){
			global $woocommerce;
			$cart_url = $woocommerce->cart->get_cart_url();
			$order_id = $_POST['order_id'];
			$type = $_POST['type'];
			$order = new WC_order($order_id);
			if($order_id){
				switch ($type){
					case 'clientSuccessfulApply':
						// this should redirect to the custom page (so no break)
					case 'clientSuccessfulPurchase':
						// this will redirect to a custom page
						wc_add_notice($this->synchrony_success,'success');
						wp_redirect($order->get_checkout_order_received_url());
						break;
					case 'creditApplyNotification':
			 			// not sure what to do here
					case 'clientUnsuccessfulPurchase':
						// this should go to the next option
					case 'clientUnsuccessfulAppply':
						// this redirects to cart page
						wc_add_notice($this->synchrony_error,'error');
						wp_redirect($cart_url);
						break;
					default:						
				}

			}
		}
	}

	function get_user_token(){
		$auth = "Basic ".base64_encode($this->user_id.':'.$this->password);	
		// this encoding might be wrong, for the Basic auth type?
		$type = 'application/xml';
		$response = wp_safe_remote_post( $this->login_url, array(
			'method'    => 'POST',
			'headers'      => array('Accept' => $type, 'Authorization'=> $auth),
			'timeout'   => 10,
			'sslverify' => false,
		) );
		if(is_array($response) && !empty($response['body']) ){
			if($response['body'] == "The merchant requesting access to this service has not been authorized to use this service.")
				return $this->LOGIN_UNAUTH_FAIL;
			return $response['body'];
		}else{
			return $this->LOGIN_URL_FAIL;
		}
	}

	function get_url_for($str, $order_id){
		$base_url = str_replace('http:','https:',plugins_url()).'/woocommerce-gateway-synchrony/wc-synchrony-redirect.php?order_id='.$order_id;
		switch ($str){
			case 'purchaseNotification':
				return str_replace("http:","https:",plugins_url()).'/woocommerce-gateway-synchrony/wc-synchrony-success.php';
			case 'creditApplyNotification':
				return $base_url.'&type=creditApplyNotification';
			case 'clientUnsuccessfulPurchase':
				return $base_url.'&type=clientUnsuccessfulPurchase';
			case 'clientSuccessfulPurchase':
				return $base_url.'&type=clientSuccessfulPurchase';
			case 'clientUnsuccessfulAppply':
				return $base_url.'&type=clientUnsuccessfulAppply';
			case 'clientSuccessfulApply':
				return $base_url.'&type=clientSuccessfulApply';
		}
	}

// end payment gateway class:
}
