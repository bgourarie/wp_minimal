<?php
/* 
* Handle postback response from Synchrony to validate and update order stuff
*
*
*/
/** 
* Send a POST requst using cURL 
* @param string $url to request 
* @param array $post values to send 
* @param array $options for cURL 
* @return string 
*/ 
function curl_post($url, array $post = NULL, array $options = array()) 
{ 
    $defaults = array( 
        CURLOPT_POST => 1, 
        CURLOPT_HEADER => 0, 
        CURLOPT_URL => $url, 
        CURLOPT_FRESH_CONNECT => 1, 
        CURLOPT_RETURNTRANSFER => 1, 
        CURLOPT_FORBID_REUSE => 1, 
        CURLOPT_TIMEOUT => 4, 
        CURLOPT_POSTFIELDS => http_build_query($post) 
    ); 

    $ch = curl_init(); 
    curl_setopt_array($ch, ($options + $defaults)); 
    if( ! $result = curl_exec($ch)) 
    { 
        trigger_error(curl_error($ch)); 
    } 
    curl_close($ch); 
    return $result; 
} 
error_log("attempting to post to the api");
if ( $_POST && ( $_POST['ClientTransactionID'] ) && $_POST['TransactionDescription'] == 'AUTHORIZATION' ) {
	// set up the curl payload
	$body = $_POST;
	$url = "https://".$_SERVER['HTTP_HOST']."/wc-api/WC_Gateway_Synchrony";
	$res = curl_post($url, $body);
	error_log('Posted to api?'.$res);
}
