<?php
/**
 * The Dream Bed functions and definitions
 *
 * @package The Dream Bed
 */

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
			'footer-menu' => __('Footer Menu')
			)
	);
}
add_action('init', 'custom_dreambed_menus');

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

/* change "Have a coupon?" to "Have a promo code?" */
function woocommerce_rename_coupon_message_on_checkout() {
	return 'Have a Promo Code?' . ' <a href="#" class="showcoupon">' . __( 'Click here to enter your code', 'woocommerce' ) . '</a>';
}
add_filter( 'woocommerce_checkout_coupon_message', 'woocommerce_rename_coupon_message_on_checkout' );
/* rename coupon to promo code in checkout page */
function woocommerce_rename_coupon_field_on_checkout( $translated_text, $text, $text_domain ) {
/* don't do this in the admin panel */
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}
	if ('Coupon code' === $text) {
		$translated_text = 'Promo Code';
	} elseif ( 'Apply Coupon' === $text ) {
		$translated_text = 'Apply';
	}
	return $translated_text;
}
add_filter('gettext', 'woocommerce_rename_coupon_field_on_checkout', 10, 3);

/* change coupon/promo error messages */
function custom_coupon_messages( $translated_text, $text, $text_domain ) {

/* don't do this in the admin panel */
	if ( is_admin() || 'woocommerce' !== $text_domain ) {
		return $translated_text;
	}

/* promo code error messages */
	if ('Coupon usage limit has been reached.' === $text) {
		return 'Our records show that you have already used this promo code.';
	}

	if('This coupon has expired.' === $text) {
		return 'Sorry, this promo code is no longer active.';
	}

	if('Coupon "%s" does not exist!' === $text) {
		return 'Sorry, "%s" is not a valid promo code.';
	}

	return $translated_text;
}
add_filter('gettext', 'custom_coupon_messages', 10, 3);


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


