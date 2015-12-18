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
		
		<div class="dark-grey two-product-features">
			<div class="container">
				<div class="row vertical-align">
					<div class="col-xs-6">
						<img src="<?php bloginfo("template_url"); ?>/images/icon-deliverybox.svg" alt="">
						<p>The Dream Bed ships nationwide, in a convenient box, for FREE! Delivered right to your door in 2 days.</p>
					</div> 
					<div class="col-xs-6">
						<img src="<?php bloginfo("template_url"); ?>/images/icon-moon.svg" alt="">
						<p>You get 180 nights to try out your Dream Bed. If you don't love it you can return it for a full refund.</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container-fluid ">
			<div class="row">
				<div class="col-xs-12 text-center no-padding">
					<h2>Quality materials for a great night&#8217;s sleep</h2>
					<img src="<?php echo $cutout_img ?>" class="img-responsive" />
				</div>
			</div>
		</div>
		
		<div id="pdp-carousel">
				
	<?php
		$product_slide = get_field('product_slide');
		if($product_slide) {
			if(count($product_slide) == 1) {
				/* single image/hero text */
				echo '<div class="jumbotron" style="background-image: url(' . $product_slide[0][product_slide_image] . ');"><div class="container"><div class="row"><div class="col-xs-12">';
				//echo '<img src="' . $product_slide[0][product_slide_image][url] . '" />';
				//echo '<h1>' . $product_slide[0][product_slide_text] . '</h1>';
				//echo '<p>' . $product_slide[0][product_slide_link] . '</p>';
				echo '</div></div></div></div>';
				
			} else {
				/* multiple / product_slidehow */
				echo '
				
<div id="carousel-pdp-page" class="carousel slide" data-ride="carousel">				
	<ol class="carousel-indicators">
		<!-- placeholder need to figure out how to gen these automatically -->
		<li data-target="#carousel-pdp-page" data-slide-to="0"></li>
		<li data-target="#carousel-pdp-page" data-slide-to="1"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
				';
				
				foreach($product_slide as $slide) {
					$image = $slide['product_slide_image'];
					?>
						<div class="item">
							<div style="background-image:url(<?php echo $image; ?>);" class="slider-size">
						
							</div>
						</div>
					<?php
				}
				
				echo '
	</div>
	<a class="left carousel-control" href="#carousel-pdp-page" role="button" data-slide="prev">
		<i class="fa fa-chevron-circle-left"></i>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#carousel-pdp-page" role="button" data-slide="next">
		<i class="fa fa-chevron-circle-right"></i>
		<span class="sr-only">Next</span>
	</a>
</div>			
<script>
jQuery(document).ready(function($){
	$("#carousel-pdp-page .carousel-indicators li:first").addClass("active");
	$("#carousel-pdp-page .carousel-inner .item:first").addClass("active");
	$("#carousel-pdp-page").carousel({
		interval: 0
		})
	});
	
</script>
				
				';
			}
		}
		
	?>
		</div>
		
    	<div class="container bed-setup">
    		<div class="row">
				<div class="col-sm-12 text-center">
					<h2>Set up anywhere</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4 text-center">
					<img src="<?php bloginfo("template_url"); ?>/images/icon-boxspring.svg" alt="" class="center-block setup-img">
					<h4>Box Spring</h4>
					<p>The Dream Bed works on most box springs. Make sure there is no more than 3" between each slat.</p>
				</div>
				<div class="col-sm-4 text-center">
					<img src="<?php bloginfo("template_url"); ?>/images/icon-adjustable.svg" alt="" class="center-block setup-img">
					<h4>Adjustable Frame</h4>
					<p>Our bed is flexible, so you can you use it with any adjustable bed base.</p>

				</div>
				<div class="col-sm-4 text-center">
					<img src="<?php bloginfo("template_url"); ?>/images/icon-flat-surface.svg" alt="" class="center-block setup-img">
					<h4>Any Flat Surface</h4>
					<p>Platform bed, bunky board, the floor? Any and all flat surfaces will work with The Dream Bed.</p>
				</div>
			</div>
		</div>
		
		
		<div class="compare-beds">	
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h2>Compare The Dream Bed</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<tbody>
									<tr class="nobox">
										<th scope="col" class="col-xs-2">&nbsp;</th>
										<th scope="col" class="original col-xs-2">Original Dream Bed</th>
										<th scope="col" class="cool col-xs-2">Cool Dream Bed</th>
										<th scope="col" class="col-xs-2">Casper</th>
										<th scope="col" class="col-xs-2">Leesa</th>
									</tr>
									<tr>
										<th scope="row">Layers</th>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<th scope="row">Total Height</th>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<th scope="row">Weight</th>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<th scope="row">Cover Material</th>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<th scope="row">Price Range</th>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<th scope="row">Trial Period</th>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<th scope="row">Giving Programs</th>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<th scope="row">Warranty</th>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<th scope="row">Shipping</th>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<th scope="row">Returns</th>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
										<td>&nbsp;</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php // passing post id to featured reviews
			include(get_template_directory() . '/includes/featured-reviews.php');
			get_template_directory() . '/includes/featured-reviews.php'; ?>
		</div>
		<?php
}

add_action('woocommerce_before_add_to_cart_form','uptop_product_ratings',20);
function uptop_product_ratings(){
	/* query to get all ratings and build average rating */
	global $product;
	
	$prod_show = $product->id;
	$args = array(
		'post_type' => 'review',
		'meta_query' => array(
			array(
				'key'     => 'product',
				'value'   => $prod_show,
			),
		),
		'orderby' => 'menu_order',
		'order' => 'ASC'
	);
	$ratings = array();
	$review_query = new WP_Query($args);
	if ($review_query->have_posts()) {
		$count = 0;
		while ($review_query->have_posts() ) {
			$review_query->the_post();
			$rating = get_field('rating');
			$ratings[] = $rating;
			$count++;
		}
		wp_reset_postdata();

	  $average_rating = round((calculate_average($ratings) * 2), 0) / 2;
		// first print out the title /explanatory bit...

	  echo '<div class="pdp-review-summary">';
	  	
	  	echo '<div class="pdp-review-stars-container">';
			  // Loop and print a whole star for each step.
			  for ($i = 1; $i <= $average_rating; $i++) {
			      echo '<img class="pdp-star-reviews" src="' . get_bloginfo("template_url") . '/images/one-star.svg" />';
			  }
			  // If average rating is not a whole number, we need to print an additional half star after the loop.
			  if (strpos($average_rating, '.')){
			      echo '<img class="pdp-review-stars" src="' . get_bloginfo("template_url") . '/images/half-star.svg" />';
			  }
?>
			  <!--<a href="<?php bloginfo('url')?>/reviews/" class="pdp-review-link">Read Reviews</a>-->
		  <?php
		  // close product-review-stars
			echo '</div>';
	  //close product-review-summary
	  echo '</div>';
  }	
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
		<div class="variations_button clearfix">
			<?php //woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) ); ?>
			<button type="submit" class="btn btn-dream drop-shadow btn-block"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
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


/*--------------------------------------------------------------
# Checkout
--------------------------------------------------------------*/

add_action('woocommerce_before_checkout_form', 'uptop_before_checkout', 10);
add_action('woocommerce_after_checkout_form', 'uptop_after_checkout', 10);

function uptop_before_checkout() {
	?><div class="woocommerce container"><?php
}
function uptop_after_checkout() {
	?><div class="woocommerce container"><?php
}

/* Checkout form layout */

add_action('woocommerce_checkout_before_customer_details', 'checkout_wrapper_start');
function checkout_wrapper_start() {
    echo '
		<div class="row">
			<div id="checkout-form-container" class="col-md-7">
    ';
}
add_action('woocommerce_checkout_after_customer_details', 'checkout_wrapper_end', 40);
function checkout_wrapper_end() {
    echo '
			</div>
			<div id="order-summary-container" class="col-md-5">
    ';
}

add_action('woocommerce_checkout_after_order_review', 'order_review_end', 10);
function order_review_end() {
    echo '
			</div>
		</div>
    ';
}

remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);

// add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment_start', 15);
// function woocommerce_checkout_payment_start() {
//     echo '
// 		<div class="row seperator">
// 			<div class="col-md-12">
//     ';
// }
add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_container_before', 10);
add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 20);
add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_container_after', 30);
function woocommerce_checkout_container_before() {
    echo '
		<div id="order_review">
    ';
}
function woocommerce_checkout_container_after() {
    echo '
		</div>
    ';
}


add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {

	$billing_heading['Billing Address Heading'] = array(
		'type' => 'text',
        'label'         => __('Billing Address'),
        'placeholder'   => __(''),
	    'required'  => false,
	    'class'     => array('form-row-wide billing-address-label'),
	    'clear'     => true
    );
	array_splice( $fields['billing'], 5, 0, $billing_heading );

	$fields_billing = $fields['billing'];

    return $fields;
}






