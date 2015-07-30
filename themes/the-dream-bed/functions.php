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
	remove_action('media_buttons', array( PodsInit::$admin, 'media_button' ), 12);
}
add_action('admin_init', 'remove_pods_shortcode_button', 14);

/* remove "add media" button from editor */
function z_remove_media_controls() {
	remove_action('media_buttons', 'media_buttons');
}
add_action('admin_head','z_remove_media_controls');


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


