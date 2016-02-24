<?php
/*
Plugin Name: WooCommerce Synchrony Financial Gateway
Plugin URI: http://uptopcorp.com
Description: Extends WooCommerce with a Synchrony financial gateway.
Version: 1.0
Author: Ben Gourarie
Author URI: http://www.uptopcorp.com/

	License: GNU General Public License v3.0
	License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) return; // Check if WooCommerce is active

add_action('plugins_loaded', 'woocommerce_gateway_synchrony_init');

function woocommerce_gateway_synchrony_init() {

	if ( !class_exists( 'WC_Payment_Gateway' ) ) return;
	
	include_once( 'woocommerce-synchrony.php' );

	/**
 	 * Localisation
	 */
	load_plugin_textdomain('wc-synchrony-gateway', false, dirname( plugin_basename( __FILE__ ) ) . '/languages');
    	
	/**
 	* Add the Gateway to WooCommerce
 	**/
	function woocommerce_add_synchrony_gateway($methods) {
		$methods[] = 'WC_Gateway_Synchrony';
		return $methods;
	}
	
	add_filter('woocommerce_payment_gateways', 'woocommerce_add_synchrony_gateway' );
} 


// Add custom action links
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wc_synchrony_action_links' );
function wc_synchrony_action_links( $links ) {
	$plugin_links = array(
		'<a href="' . admin_url( 'admin.php?page=wc-settings&tab=checkout' ) . '">' . __( 'Settings', 'woocommerce-synchrony' ) . '</a>',
	);

	// Merge our new link with the default ones
	return array_merge( $plugin_links, $links );	
}