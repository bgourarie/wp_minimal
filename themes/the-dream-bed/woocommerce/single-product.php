<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' );

/* get rating */
$id = get_the_ID();
$args = array(
	'post_type' => 'review',
	'orderby' => 'menu_order',
	'meta_query' => array(
		array(
			'key'     => 'product',
			'value'   => array( $id ), /* dream-bed = 96, cool-gel-bed = 26 */
			'compare' => 'IN',
		),
	),
	'order' => 'ASC'
);
/* get all ratings */
$review_query = new WP_Query($args);
if ($review_query->have_posts()) {
	$count = 0;
	while ($review_query->have_posts() ) {
		$review_query->the_post();
		$rating = get_field('rating');
		$ratings[] = $rating;
		$count++;
	}
}
wp_reset_postdata();
$the_rating = round(calculate_average($ratings), 0, PHP_ROUND_HALF_UP);

global $product;

while (have_posts()) {
the_post();
$title = get_the_title();
$desc = get_the_content();

//wc_get_template_part('content', 'single-product' );


} ?>

<h1><?php echo $title; ?></h1>
<span class="rating"><?php echo $the_rating; ?>/5</span>
<p><?php echo $desc; ?></p>

<div class="slideshow gallery images">
<?php
/* get product gallery images and put them in a list */
$attachment_ids = $product->get_gallery_attachment_ids();
echo '<ul class="images">';
foreach($attachment_ids as $attachment_id) {
	$image_url = wp_get_attachment_url($attachment_id);
	echo '<li><img src="'. $image_url .'">';
}
echo '</ul>';
?>
</div>

<form class="variations_form cart" method="post" enctype="multipart/form-data" data-product_id="<?php echo $id ?>">

<?php

/* get product variations, incl price, availability, options */
$variations = $product->get_available_variations();
setlocale(LC_MONETARY, 'en_US');
$i = 0;

foreach ($variations as $variation) {
	$var_id = $variation['variation_id'];
	$size = $variation['attributes']['attribute_size'];
	$size_nice = $string = str_replace("-", " ", $size);
	$price = '$' . $variation['display_price'];
	$available = $variation['is_purchasable'];

	if($available) {
		echo '<input type="radio" class="size" ';
		if ($i == 0) { echo "checked "; }
		echo 'value="'. $size .'" name="attribute_size" data-attribute_name="attribute_size" data-id="'. $var_id .'" data-price="'. $price .'" id="'. $size .'">';
		echo '<label for="'. $size .'">'. $size_nice .'</label>';
		$i++;
	}
}


?>
<h3 id="current-price"><span class="price"></span> + Free Shipping</h3>

<input type="hidden" name="add-to-cart" value="<?php echo $id ?>">
<input type="hidden" name="product_id" value="<?php echo $id ?>">
<input type="hidden" name="variation_id" class="variation_id" value="">

<button type="submit" class="single_add_to_cart_button button alt">Add to cart</button>

</form>

<script>
/* get price of currently selected option */
$(function() {
	var $sizeradio = $('input.size');
	$($sizeradio).bind("change", function () {
		var $price = $(this).attr('data-price');
		var $id = $(this).attr('data-id');
		/* set current price label */
		$('#current-price span.price').html($price);
		/* set hidden form input to currently selected size ID# */
		$('input.variation_id').val($id);
	});
	/* trigger change in the first/default option, so that the variables populate the form */
	$($sizeradio).first().trigger('change');
});
</script>

<hr>

200 day sleep trial

<hr>

how it stacks up (features)

<hr>

see all beds (two boxes)

<hr>

reviews (top 3?) / link to reviews

<hr>

<?php get_footer( 'shop' ); ?>
