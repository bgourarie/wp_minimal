<?php
/**
 * The Dream Bed functions and definitions
 *
 * @package The Dream Bed
 */

// adding shop pages
require get_template_directory() . '/includes/shop.php';

/* fix glitch on chrome for admin menus */
function chromefix_inline_css() { 
	wp_add_inline_style('wp-admin', '@media screen and (-webkit-min-device-pixel-ratio:0) { #adminmenu { transform: translateZ(0); } }' );
}
add_action('admin_enqueue_scripts', 'chromefix_inline_css');

/* hide admin bar from normal view */
show_admin_bar(false);

/* remove wordpress junk */
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


/* add woocommerce support */
add_action('after_setup_theme', 'woocommerce_support');
function woocommerce_support() {
    add_theme_support('woocommerce');
}

/* hide decimal places on PDP pages but not on checkout */
// Show trailing zeros on prices, default is to hide it.
add_filter( 'woocommerce_price_trim_zeros', 'wc_hide_trailing_zeros', 10, 1 );
function wc_hide_trailing_zeros( $trim ) {     
    // show trailing zeroes only on checkout
    return !is_checkout();
}

/* hide product data tabs on woocommerce product page */
add_filter('woocommerce_product_tabs', 'woo_remove_product_tabs', 98);
function woo_remove_product_tabs($tabs) {
    unset($tabs['description']); // remove the description tab
    unset($tabs['reviews']); // remove the reviews tab
    unset($tabs['additional_information']); // remove the additional information tab
    return $tabs;
}

/* hide related products on woocommerce product page */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/* change default text of the option dropdown */
function choose_option($translated) {
	$translated = str_ireplace('Choose an option',  'Select an option',  $translated);
	return $translated;
}
add_filter('gettext', 'choose_option');
add_filter('ngettext', 'choose_option');

/* custom header and footer menus */
function custom_dreambed_menus() {
	register_nav_menus(
		array(
			'header-menu' => __('Header Menu'),
			'header-right' => __('Header Right Menu'),
			'footer-menu' => __('Footer Menu')
			)
	);
}
add_action('init', 'custom_dreambed_menus');

/* allow for deleting all tax rates and starting over */
/**
 * Delete ALL WooCommerce tax rates
 *
 * Add to your theme functions.php then go to woocommerce -> system status -> tools and there will be a delete all tax rates button http://cld.wthms.co/tXvp
 */

add_filter( 'woocommerce_debug_tools', 'custom_woocommerce_debug_tools' );

function custom_woocommerce_debug_tools( $tools ) {
	$tools['woocommerce_delete_tax_rates'] = array(
		'name'		=> __( 'Delete Tax Rates',''),
		'button'	=> __( 'Delete ALL tax rates from WooCommerce','' ),
		'desc'		=> __( 'This tool will delete all your tax rates allowing you to start fresh.', '' ),
		'callback'  => 'woocommerce_delete_tax_rates'
	);
	return $tools;
}

/**
 * Delete Tax rates
 */
function woocommerce_delete_tax_rates() {
	global $wpdb;
			
	$wpdb->query( "TRUNCATE " . $wpdb->prefix . "woocommerce_tax_rates" );
	$wpdb->query( "TRUNCATE " . $wpdb->prefix . "woocommerce_tax_rate_locations" );

	echo '<div class="updated"><p>' . __( 'Tax rates successfully deleted', 'woocommerce' ) . '</p></div>';
}


/* add options page for global settings */
if(function_exists('acf_add_options_page')) {
	acf_add_options_page();
}

/* remove visual editor */
add_filter('user_can_richedit', create_function ('$a' , 'return false;') , 50);

/* remove pods shortcode button from editor */
function remove_pods_shortcode_button () {
	remove_action('media_buttons', array(PodsInit::$admin, 'media_button'), 12);
}

add_action('admin_init', 'remove_pods_shortcode_button', 14);

/* remove "add media" button from editor */
function z_remove_media_controls() {
	remove_action('media_buttons', 'media_buttons');
}
add_action('admin_head','z_remove_media_controls');

/* remove ul from menu output */
function remove_ul($menu) {
	return preg_replace(array('#^<ul[^>]*>#', '#</ul>$#'), '', $menu);
}
add_filter('wp_nav_menu', 'remove_ul');

/* change "checkout" button text */
function woocommerce_button_proceed_to_checkout() {
	$checkout_url = WC()->cart->get_checkout_url();
	echo '<a href="'. $checkout_url .'" class="checkout-button button alt wc-forward">Checkout</a>';
}

/* change woocommerce text */
function custom_text( $translated_text, $text, $text_domain ) {

/* don't do this in the admin panel */
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}

/* custom text strings for woocommerce-generated page */

	if ('Coupon code' === $text) {
		return 'Promo code';
	}
	if ('Have a coupon?' === $text) {
		return 'Have a promo code?';
	}
	if ('Apply Coupon' === $text) {
		return 'Apply';
	}
	if ('Coupon usage limit has been reached.' === $text) {
		return 'Our records show that you have already used this promo code.';
	}
	if('This coupon has expired.' === $text) {
		return 'Sorry, this promo code is no longer active.';
	}
	if('Coupon "%s" does not exist!' === $text) {
		return 'Sorry, "%s" is not a valid promo code.';
	}
	if ('Return To Shop' === $text) {
		return 'Continue Shopping'; /* change this */
	}
	/* checkout form text */
	
	if('Billing Details' === $text) {
		return 'Contact Info';
	}
	if('Ship to a different address?' === $text) {
		return 'Shipping Address';
	}
	if ('Your order' === $text) {
		return 'Order Summary';
	}
	if ('Town / City' === $text) {
		return 'City';
	}
	if ('Zip' === $text) {
		return 'Zip Code';
	}
	if ('Email Address' === $text) {
		return 'Email';
	}
	return $translated_text;
}
add_filter('gettext', 'custom_text', 10, 3);


/* changing the text of the Place Order button is harder because it relies on jquery */
function woocommerce_custom_order_button_text() {
	return __('Place My Order!', 'woocommerce'); 
}
add_filter('woocommerce_order_button_text', 'woocommerce_custom_order_button_text');

/* remove order notes field from checkout */
function alter_woocommerce_checkout_fields($fields) {
	unset($fields['order']['order_comments']);
	return $fields;
}
add_filter('woocommerce_checkout_fields', 'alter_woocommerce_checkout_fields');

// WooCommerce remove "company name" field from Woo Checkout Page
add_filter ( 'woocommerce_default_address_fields' , 'custom_override_default_address_fields' );
	function custom_override_default_address_fields( $address_fields ) {
	unset($address_fields['company']);
	return $address_fields;
}


function calculate_average($arr) {
	$total = 0;
	$count = count($arr); //total numbers in array
	foreach ($arr as $value) {
		$total = $total + $value; // total value of array numbers
	}
	$average = ($total/$count); // get average value
	return $average;
}

function calculate_median($arr) {
	sort($arr);
	$count = count($arr); //total numbers in array
	$middleval = floor(($count-1)/2); // find the middle value, or the lowest middle value
	if($count % 2) { // odd number, middle is the median
		$median = $arr[$middleval];
	} else { // even number, calculate avg of 2 medians
		$low = $arr[$middleval];
		$high = $arr[$middleval+1];
		$median = (($low+$high)/2);
	}
	return $median;
}

if ( ! function_exists( 'the_dream_bed_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function the_dream_bed_setup() {
	// Add default posts and comments RSS feed links to head.
	// add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

}
endif; // the_dream_bed_setup
add_action( 'after_setup_theme', 'the_dream_bed_setup' );


/**
 * Enqueue scripts and styles.
 */
function the_dream_bed_scripts() {
	wp_enqueue_style( 'the-dream-bed-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'the_dream_bed_scripts' );


