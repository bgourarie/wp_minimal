<?php
// need this to get the wordpress functionality back!
require(dirname(__FILE__).'/../../../wp-blog-header.php');
if($_POST['ClientTransactionID']){
    $order = new WC_Order($_POST['ClientTransactionID']);
    $valid = true;
     $str = "Data Received from Synchrony Financial: <br><ul>";
    foreach($_POST as $a => $b){
        $str .= "<li>" . $a.":".$b. "</li>";
    }
    $str .= "</ul>";
    if( !$order
        || $order->order_total != $_POST['TransactionAmount']
        || $_POST['Status'] != "Auth Approved"
        || $_POST['TransactionDescription'] != "AUTHORIZATION"
        || ! $order->needs_payment() 
        ){
        $valid = false;
        $err_str = "mismatched data or nonauthorization for order # ".$_POST['ClientTransactionID'];
    }
    if($valid){
        $customer = $order->get_user();       
        $order->add_order_note( $str );
        update_post_meta($order->id,'synchrony_auth_code',$_POST['AuthCode']);
        update_post_meta($order->id,'synchrony_account_number',$_POST['AccountNumber']);
        $order->payment_complete();
    }
    else{
        error_log("failed to record order for ".$err_str);
        if($order)
            add_order_note("Response from Synchrony Financial indicated payment failure or error.<br><BR>".$str)
    }
}
