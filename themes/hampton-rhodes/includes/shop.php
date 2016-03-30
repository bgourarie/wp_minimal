<?php


/*** The actual "Shop" page (archive-product template)
*
*
*/
add_action('woocommerce_before_main_content','output_shop_hero',5,0);
function output_shop_hero(){
	if(is_shop()):
	?>
	<div class="jumbotron home-jumbo hidden-xs" style="background-image: url('<?php echo get_field('hero_image'); ?>')">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-xs-12">
					<h1 class="hidden-sm"><?php echo get_field('header_text'); ?></h1>
					<div class="cta"><a href="<?php echo get_field('button_link') ?>" class="btn btn-dream btn-lg" role="button"><?php echo get_field('button_text') ?></a></div>
					<img class="pin" src="<?php echo get_field('hero_image'); ?>" data-pin-description="The Dream Bed: Free shipping and a no nightmare guarantee." alt="">
				</div>
			</div>
		</div>
	</div>
	<?php
	endif;
}
// show 9 products per page...
add_filter('loop_shop_per_page','show_nine_beds_per_page',10, 1);
function show_nine_beds_per_page($qty){
	return 9;
}
add_filter('loop_shop_columns','show_three_columns_per_row',10, 1);
function show_three_columns_per_row($qty){
	return 3;
}
add_filter('woocommerce_show_page_title','disable_shop_title',1,1);
function disable_shop_title($bool){
	return false;
}
add_action( 'init', 'move_and_remove_shop_things' );
function move_and_remove_shop_things() {
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
  remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20, 0 );
  remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10, 0 );
  remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0 );
  remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
  add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_rating', 15, 0 );
}

/*
	change price "from-to" to show it cooler... 
*/
add_filter('woocommerce_get_price_html_from_to','show_price_how_we_want_it_sale',10,4);
function show_price_how_we_want_it_sale($price, $from, $to, $prod){
	// may need to logic out which page we're on..
	// we basically want to switch the deleted and inserted parts so:
	$del_start = strpos($price, '<del>');
	$del_end = strpos($price, '</del>') + 6;
	$ins_start = strpos($price, '<ins>');
	$ins_end = strpos($price, '</ins>') + 6;

	$deleted = substr($price, $del_start, $del_end - $del_start);
	$inserted = substr($price, $ins_start, $ins_end - $ins_start);
	return '<span class="on-sale">on sale</span> '.$inserted.$deleted;
}

/*--------------------------------------------------------------
# Single Product
--------------------------------------------------------------*/

// removed
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
// remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// add_action('woocommerce_after_single_product', 'uptop_product_images', 20);
function uptop_product_images() {

	$cutout_img = get_field('product_cutout_image');
	$shipping_text = get_field('product_shipping_text');
	$trial_text = get_field('product_trial_text');
	
	?>
		
		<div class="dark-grey two-product-features">
			<div class="container">
				<div class="row vertical-align">
					<div class="col-xs-6">
						<img src="<?php bloginfo("template_url"); ?>/images/icon-deliverybox.svg" alt="">
						<p><?php echo $shipping_text ?></p>
					</div> 
					<div class="col-xs-6">
						<img src="<?php bloginfo("template_url"); ?>/images/icon-moon.svg" alt="">
						<p><?php echo $trial_text ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 text-center">
					<h2>Quality materials for a great night&#8217;s sleep</h2>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 text-center no-padding">
					<img src="<?php echo $cutout_img ?>" class="img-responsive" />
				</div>
			</div>
		</div>
	
	<div id="pdp-carousel">
				
	<?php
		$product_slide = get_field('product_slide');
		if($product_slide) {
			if(count($product_slide) == 1) {
				/* single image/hero text */ ?>
				<div class="jumbotron" style="background-image: url('<?php echo $product_slide[0][product_slide_image]; ?>');">
					<?php if($product_slide[0][product_slide_text]) {
					?>	
						<div class="carousel-caption">
							<h3>
								<?php echo $product_slide[0][product_slide_text]; 
								if($product_slide[0][product_slide_link_label]) { ?>
								 	<a href=" <?php echo $product_slide[0][product_slide_link]; ?>" rel="button" class="btn btn-dream">	
							 		<?php echo  $product_slide[0][product_slide_link_label]; ?>
							 		</a>
				 				<?php } ?>
							</h3>
						</div>
					<?php } ?>
				</div>
				<?php				
			} else {
				/* multiple / product_slidehow */
				?>			
				<div id="carousel-pdp-page" class="carousel slide" data-ride="carousel">				
					<ol class="carousel-indicators">
						<?php
						for($i=0;$i<count($product_slide); $i++) { ?>
							<li data-target="#carousel-pdp-page" data-slide-to="<?php echo $i;?>"></li>
						<?php } ?>
					</ol>
					<div class="carousel-inner" role="listbox">	
						<?php	
						foreach($product_slide as $slide) {
							$image = $slide['product_slide_image'];
							$headline = $slide['product_slide_text'];
							$link = $slide['product_slide_link'];
							$linktext = $slide['product_slide_link_label'];
							if($image){
							?>
								<div class="item">
									<div style="background-image:url(<?php echo $image; ?>);" class="slider-size">
										<?php if($headline) { ?>
											<div class="carousel-caption">
												<h3>
													<?php 
													echo $headline; 
													if($linktext) { ?>
														<a href="<?php echo $link; ?>" rel="button" class="btn btn-dream">
															<?php echo $linktext; ?>
														</a>
													<?php } ?>
												</h3>
											</div>
										<?php } ?>
									</div>
								</div>
						<?php } ?>									
					<?php } ?>
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
 			<?php }
		}
		
	?>
		</div>

	<?php
	global $post;
	$terms = wp_get_post_terms( $post->ID, 'product_cat' );
	foreach ( $terms as $term ) $categories[] = $term->slug;

		if ( in_array( 'mattress', $categories ) ) { 
		/* show if this is a mattress - bed setup and comparison chart */ ?>
					
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
							<div class="table-responsive comparison-table">
								<table class="table table-hover table-bordered">
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
											<td>1.5&quot; Latex, 1.5&quot; Memory Foam, 7&quot; support foam</td>
											<td>0.125&quot; Cool Gel, 3&quot; Memory Foam, 7.5&quot; support foam</td>
											<td>1.5&quot; Latex, 1.5&quot; Memory Foam, 7&quot; support foam</td>
											<td>2&quot; Cooling Foam, 2&quot; Memory Foam, 6&quot; support foam</td>
										</tr>
										<tr>
											<th scope="row">Total Height</th>
											<td>10&quot; </td>
											<td>10.5&quot; </td>
											<td>10&quot; </td>
											<td>10&quot; </td>
										</tr>
										<tr>
											<th scope="row">Cover Material</th>
											<td>Woven Cover</td>
											<td>Woven Cover</td>
											<td>Polyester/Polypropylene</td>
											<td>Polyester/lycra blend</td>
										</tr>
										<tr>
											<th scope="row">Price Range</th>
											<td>$699 - $999</td>
											<td>$899 - $1199</td>
											<td>$500 - $950</td>
											<td>$525 - $990</td>
										</tr>
										<tr>
											<th scope="row">Trial Period</th>
											<td>180 days</td>
											<td>180 days</td>
											<td>100 days</td>
											<td>100 days</td>
										</tr>
										<tr>
											<th scope="row">Giving Programs</th>
											<td>Donates a bed for every bed sold</td>
											<td>Donates a bed for every bed sold</td>
											<td>None</td>
											<td>None</td>
										</tr>
										<tr>
											<th scope="row">Warranty</th>
											<td>10 Year Full Warranty</td>
											<td>10 Year Full Warranty</td>
											<td>10 Year Limited Warranty</td>
											<td>10 Year Limited Warranty</td>
										</tr>
										<tr>
											<th scope="row">Shipping</th>
											<td>Free shipping, on average &lt; 48 hours</td>
											<td>Free shipping, on average &lt; 48 hours</td>
											<td>Free shipping, 2-5 days</td>
											<td>Free shipping, 1-5 days</td>
										</tr>
										<tr>
											<th scope="row">Returns</th>
											<td>Free returns and exchanges, no questions asked!</td>
											<td>Free returns and exchanges, no questions asked!</td>
											<td>Free returns, full money refund</td>
											<td>Free returns, full money refund (except AK &amp; HI)</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
					
	<?php				
			} else {
		/* show if this is a NOT mattress */ ?>				
					
			<!-- comparison chart tbd -->
					
	<?php } ?>	

		
    	
		
		
		
			<?php // passing post id to featured reviews
			include(get_template_directory() . '/includes/featured-reviews.php');
			get_template_directory() . '/includes/featured-reviews.php'; ?>
		
		<div class="container pdp-giving">
			<div class="row vertical-align">
				<div class="col-md-8 col-sm-6">
					<img src="<?php bloginfo("template_url"); ?>/images/photos/giving-mattress.jpg" alt="" data-pin-description="The Dream Bed: For every Dream Bed sold, we will give a bed to a person in need. #dreamitforward" class="center-block">
				</div>
				<div class="col-md-4 col-sm-6 text-center">
					<h4>For every Dream Bed sold, we will give a bed to a person in need.<br><br>
					<a href="<?php bloginfo('url'); ?>/giving/" class="btn btn-dream drop-shadow" role="button">See How We Give</a></h4>
				</div>
			</div>
		</div>
		<?php
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

// add_action('woocommerce_before_cart_table', 'before_cart_table_container');
function before_cart_table_container() {
    echo '
		
		<div class="container">
			<div class="row">
				<div class="col-md-8">
    ';
}
// add_action('woocommerce_after_cart_table', 'after_cart_table_container', 20);
function after_cart_table_container() {
    echo '
		</div>
		<div class="col-md-4">
    ';
}
// add_action('woocommerce_after_cart', 'after_cart_container');
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
// add_action('woocommerce_after_cart_table', 'woocommerce_add_continue_shopping_button_to_cart', 10);


/*--------------------------------------------------------------
# Checkout
--------------------------------------------------------------*/

// add_action('woocommerce_before_checkout_form', 'uptop_before_checkout', 10);
// add_action('woocommerce_after_checkout_form', 'uptop_after_checkout', 10);

function uptop_before_checkout() {
	?><div class="woocommerce container"><?php
}
function uptop_after_checkout() {
	?><div class="woocommerce container"><?php
}

/* Checkout form layout */

// add_action('woocommerce_checkout_before_customer_details', 'checkout_wrapper_start');
function checkout_wrapper_start() {
    echo '
		<div class="row">
			<div id="checkout-form-container" class="col-md-7">
    ';
}
// add_action('woocommerce_checkout_after_customer_details', 'checkout_wrapper_end', 40);
function checkout_wrapper_end() {
    echo '
			</div>
			<div id="order-summary-container" class="col-md-5">
    ';
}

// add_action('woocommerce_checkout_after_order_review', 'order_review_end', 10);
function order_review_end() {
    echo '
			</div>
		</div>
    ';
}

// remove_action('woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20);

// // add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment_start', 15);
// // function woocommerce_checkout_payment_start() {
// //     echo '
// // 		<div class="row seperator">
// // 			<div class="col-md-12">
// //     ';
// // }
// add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_container_before', 10);
// add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_payment', 20);
// add_action('woocommerce_checkout_after_customer_details', 'woocommerce_checkout_container_after', 30);
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


// add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

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






