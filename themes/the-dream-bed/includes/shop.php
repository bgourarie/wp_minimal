<?php

/*--------------------------------------------------------------
# Single Product
--------------------------------------------------------------*/

// removed
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action('woocommerce_after_single_product', 'uptop_product_images', 20);
function uptop_product_images() {

	$sleep_trial = get_field('product_sleep_trial');
	$cutout_img = get_field('product_cutout_image');
	$product_shipping = get_field('product_shipping_promo');
	$box_img = get_field('product_box_image'); ?>

    	<div class="container">
	    	<div id="extra-images">
	    		<div id="stacked-images">
			    	<div class="row">
				    	<div class="col-md-12 text-center stacked-image">
							<img src="<?php echo $sleep_trial ?>" />
						</div>
					</div>
			    	<div class="row">
				    	<div class="col-md-12 text-center stacked-image">
							<img src="<?php echo $cutout_img ?>" />
						</div>
					</div>
				</div>
		    	<div id="side-by-side" class="row">
			    	<div class="col-md-6 text-right">
						<img src="<?php echo $product_shipping ?>" />
					</div>
					<div class="col-md-6 text-left">
						<img src="<?php echo $box_img ?>" />
					</div>
				</div>
			</div>

			<?php // passing post id to featured reviews
			include(get_template_directory() . '/includes/featured-reviews.php');
			get_template_directory() . '/includes/featured-reviews.php'; ?>

		</div><?php

}

if ( ! function_exists( 'woocommerce_single_variation' ) ) {
	function woocommerce_single_variation() {
		echo '<div class="single_variation"></div> + FREE SHIPPING';
	}
}

if ( ! function_exists( 'woocommerce_single_variation_add_to_cart_button' ) ) {

	/**
	 * Output the add to cart button for variations.
	 */
	function woocommerce_single_variation_add_to_cart_button() {
		global $product;
		?>
		<div class="variations_button">
			<?php //woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) ); ?>
			<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
			<input type="hidden" name="add-to-cart" value="<?php echo absint( $product->id ); ?>" />
			<input type="hidden" name="product_id" value="<?php echo absint( $product->id ); ?>" />
			<input type="hidden" name="variation_id" class="variation_id" value="" />
		</div>
		<?php
	}
}

/*add_filter('wc_price_args', 'uptop_price_text', 98);
function uptop_price_text($text) {
	//'price_format' => get_woocommerce_price_format()
	var_dump($text);
	return $text;
}*/


/*--------------------------------------------------------------
# Cart
--------------------------------------------------------------*/

add_action('woocommerce_before_cart_table', 'before_cart_table_container');
function before_cart_table_container() {
    echo '
		<div class="container">
			<div class="row">
				<div class="col-md-8">
    ';
}
add_action('woocommerce_after_cart_table', 'after_cart_table_container', 20);
function after_cart_table_container() {
    echo '
		</div>
		<div class="col-md-4">
    ';
}
add_action('woocommerce_after_cart', 'after_cart_container');
function after_cart_container() {
    echo '
				</div>
			</div>
		</div>
    ';
}

/* add "continue shopping" link to cart after cart contents table */
function woocommerce_add_continue_shopping_button_to_cart() {
	$shop_page_url = get_permalink(woocommerce_get_page_id('shop'));
	echo ' <a class="continue shopping" href="' . $shop_page_url . '" class="button">Continue Shopping</a>';
}
add_action('woocommerce_after_cart_table', 'woocommerce_add_continue_shopping_button_to_cart', 10);

