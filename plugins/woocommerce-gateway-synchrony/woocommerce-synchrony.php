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
    $this->enabled  = $this->get_option( 'enabled' );
    $this->merchant_number = $this->get_option('merchant_number');
    $this->user_id = $this->get_option('user_id');
    $this->password = $this->get_option('password');
    $this->login_url = $this->get_option('login_url');
    $this->processing_url = $this->get_option('processing_url');
    $this->test_mode = $this->get_option('test_mode');
    $this->client_token = '';
    $this->ssn = '';
    $this->account_number = '';
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
				'title' => __( 'Customer Message', 'woocommerce' ),
				'type' => 'textarea',
				'default' => ''
			),
			'test_mode' => array(
				'title' => __( 'Test Mode', 'woocommerce' ),
				'type' => 'checkbox',
				'default' => '1',
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
		);
	}
	/*
	* Return handler 
	*/
	function return_handler(){
		@ob_clean();
		if($_REQUEST['ClientTransactionID']){
			$order = new WC_Order($_REQUEST['ClientTransactionID']);
			$valid = false;
			$trans = array();
			foreach($_REQUEST as $a => $b){
				$trans[$a] = $b;
			}
			if($order->order_total != $trans['TransactionAmount']
				|| $trans['Status'] != "Auth Approved"
				|| $trans['TransactionDescription'] != "AUTHORIZATION"
				|| ! $order->needs_payment() 
		//	|| some auth token?
				){
				$valid = false;
			}
			if($valid){
				$customer = $order->get_user();
				// for now, let's store everythign in the order:
				foreach($trans as $a => $b){
					add_post_meta($order->id, $a, $b, true);
				}

				//$order->billing_first_name  = $trans['FirstName'];
				//$order->billing_last_name  = $trans['LastName'];
				// store the account number with the user (?? ) 
				// and the auth code? 
			}
			else{
				// cancel/reject order 
			}
		}
		if($_REQUEST['type']){
			global $woocommerce;
			$cart_url = $woocommerce->cart->get_cart_url();
			$order_id = $_REQUEST['order_id'];
			$type = $_REQUEST['type'];
			$order = new WC_order($order_id);
			if($order_id){
				switch ($type){
					case 'clientSuccessfulApply':
						// this should redirect to the custom page (so no break)
					case 'clientSuccessfulPurchase':
						// this will redirect to a custom page
						echo 'Successful purchase!';
						var_dump($order);
						break;
					case 'creditApplyNotification':
			 			// not sure what to do here
					case 'clientUnsuccessfulPurchase':
						// this should go to the next option
					case 'clientUnsuccessfulAppply':
						// this redirects to cart page
						wp_redirect($cart_url);
						break;
					
					default:
						// redirect to somewhere else?
						echo "<hr><br><BR><BR>";
						var_dump($order);
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
		$base_url = plugins_url().'/woocommerce-gateway-synchrony/wc-synchrony-redirect.php?order_id='.$order_id;
		switch ($str){
			case 'purchaseNotification':
				return str_replace(plugins_url().'/woocommerce-gateway-synchrony/wc-synchrony-success.php',"http:","https:");
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

	/*
	* The form output on the checkout page
	*/
	function payment_fields(){

		if ( $this->test_mode != 0  ) {
			$description .= ' ' . sprintf( __( 'TEST MODE ENABLED. ', 'woocommerce' ) );
		}
		$description .= 'Please submit your order to continue to enter additional information for Synchrony Financial.';
		if ( $description ) {
			echo wpautop( wptexturize( trim( $description ) ) );
		}
	}

	function setup_token(){
		$token = $this->get_user_token();
		if( $token == $this->LOGIN_UNAUTH_FAIL
				|| $token == $this->LOGIN_URL_FAIL){ 
			wc_add_notice('Error connecting to the Synchrony Financial Gateway. Please contact site administrator. '.$token, 'error');
		}
		else{
			$this->client_token = $token;
		}	
	}

	function build_info_for_synchrony( $order){
		$test_flag = $this->test_mode != 0  ? 'Y' : 'N';
		return array(
			//"PRODUCTCODE"					=> "",
			//"GROUPCODE"						=> "",
			"shopperId"						=> $order->get_user_id(),
			"merchantId"					=> $this->merchant_number,
			"homeUrl"							=> "http://www.dreambed.com",
			"imageUrl"						=> get_bloginfo("template_url")."/images/logo-the-dream-bed.svg",
			"backgroundColor"			=> "6B6B6B",
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
			"promoCode"						=>	"100", // what determines this?!
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
	billing_first_name and FN1 
	billing_last_name and LN1 
	billing_country and US 
	billing_address_1 and 123 Fake st 
	billing_address_2 and 0 and US 
	billing_city and Seattle 
	billing_state and WA
	billing_postcode and 98101 
	billing_email and bgourarie@uptopcorp.com 
	billing_phone and 206515734 
	shipping_first_name and FN1 
	shipping_last_name and LN1 
	shipping_country and US 
	shipping_address_1 and 123 Fake st 
	shipping_address_2 and 
	shipping_city and Seattle 
	shipping_state and WA 
	shipping_postcode and 98101 
	wc-authorize-net-cim-credit-card-account-number and 4007 0000 0002 7 
	wc-authorize-net-cim-credit-card-expiry and 01 / 17 
	wc-authorize-net-cim-credit-card-csc and 123 
	payment_method and synchrony _wpnonce and 1ccd94667f 
	_wp_http_referer and /checkout/?wc-ajax=update_order_review 
	shipping_method and Array
		*/
	function validate_fields(){
		$fn = $_POST['billing_first_name'];
		$ln = $_POST['billing_last_name'];
		if(!ctype_alpha($fn) || !ctype_alpha($ln)){
			wc_add_notice('Billing first and last name cannot contain numbers', 'error');
		}
	}

	function process_payment( $order_id ) {
		global $woocommerce;
		$order = new WC_Order( $order_id );
		return array(
				'result'   => 'success',
				'redirect' => $order->get_checkout_payment_url( true )
		);

		// We want to redirect the user to a new page with the form, and submit via that... 
		// shit. 

		$response = wp_safe_remote_post( $this->processing_url, array(
			'method'    => 'POST',
			'body'      => http_build_query( $this->build_info_for_synchrony($order) ),
			'timeout'   => 30,
			'sslverify' => false,
		) );
		// The response we can discard. If this method returns "Success" then wc does stuff, otherwise it assumes we did things...


		if (!isset($this->profile_id) || !isset($this->profile_key)) {
			wc_add_notice( 'Gateway Configuration Error, Please contact the site admin!', 'error' );
			return array(
				'result'   => 'fail',
				'redirect' => ''
			);
		} 

		// the rest needs to be done in the callback url....

		// Remove cart
		$woocommerce->cart->empty_cart();

		// Return thankyou redirect
		return array(
			'result' => 'success',
			'redirect' => $this->get_return_url( $order )
		);

	}
			/**
		 * Receipt page
		 *
		 * @param  int $order_id
		 */
		public function receipt_page( $order_id ) {
			$order = wc_get_order( $order_id );
			// this is the form that submits to synchrony!
			// GET THE TOKEN!
			$this->setup_token();
			// let's do this!
			$values = $this->build_info_for_synchrony($order);
			$test_mode = $values['clientTestFlag'];
			echo '<form action="'.$this->processing_url.'" method="post" name="theform">';
		
				echo '<p class="alert"> Please fill out some additional details for Synchrony Financial. No information will be stored by Dreambed.com.</p>';
				echo '<p class="form-row form-row-wide">
					<label for="billToSsn"> Social Security Number (Required if no Account number)</label>
					<input id="billToSsn" name="billToSsn" class="input-text" type="text" maxlength="9" placeholder="xxx-xx-xxxx"/>
				</p>';
				echo '<p class="form-row form-row-wide">
					<label for="billToAccountNumber"> Account number  (Required if no Social Security Number) </label>
					<input id="billToAccountNumber" name="billToAccountNumber" class="input-text" type="text" maxlength="16" placeholder="**** **** **** ****"/>
				</p>';

				foreach($values as $name => $value){
					if($name != 'billToSsn' || $name != 'billToAccountNumber'){
						echo '<input type="hidden" name="'.$name.'" value="'.$value.'" />';
					}
				}

				echo "<!-- do not edit these values or the order may fail -->";
				echo '<input type="submit" value="SynchronySecureCheckout" />';
				echo "</form>";
				// disable this because it would automatically submit stuff!
				//echo '<script type="text/javascript">document.theform.submit();</script>';
				echo '<a class="button cancel" href="'.$order->get_cancel_order_url().'">Cancel Order & Restore Cart</a>';

		}

// end payment gateway class:
}