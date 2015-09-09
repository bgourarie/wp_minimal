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
			/* only show reviews for this product */
			'value'   => array( $id ),
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





<?

//wc_get_template_part( 'content', 'single-product' );
//print_r($product);

/*$meta = get_post_meta($id);
foreach ($meta as $key => $value) {
	echo $key ." = ". $value[0] . "<br>";
}*/

echo "<pre>";
print_r(get_product_addons($id, false, false, false));
echo "</pre>";


 /* <div class=" product-addon product-addon-test">

	
			<h3 class="addon-name">test </h3>
	
			<div class="addon-description"><p>test</p>
</div>	
	
	<p class="form-row form-row-wide addon-wrap-96-test-0">
		<label><input type="checkbox" class="addon addon-checkbox" name="addon-96-test[]" data-price="5" value="test"> test (<span class="amount">$5.00</span>)</label>
	</p>


	<p class="form-row form-row-wide addon-wrap-96-test-1">
		<label><input type="checkbox" class="addon addon-checkbox" name="addon-96-test[]" data-price="6" value="test2"> test2 (<span class="amount">$6.00</span>)</label>
	</p>

	
	<div class="clear"></div>
</div>
*/ ?>

<?php do_shortcode('[display-addons add_to_cart=1] '); ?>

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


<?php
$args = array(
	'post_type' => 'review',
/* review posts can be ordered by 'menu_order' (manual ordering), date, or meta key for a field such as 'rating' or 'product' */
/* default should probably be menu_order (manual ordering) or by meta_key => rating, order => DESC so bad reviews aren't first */
	'meta_key' => 'rating',
	'orderby' => 'meta_value_num',
/* use meta_query to filter to only certain products */
	'meta_query' => array(

		/* only show reviews for this product */
		array(
			'key'     => 'product',
			'value'   => array( $id ),
			'compare' => 'IN',
		),
		/* only show featured reviews */
		array(
			'key'     => '_is_featured',
			'value'   => array( 1 ),
			'compare' => 'IN',
		),
	),
	'order' => 'DESC',
	'posts_per_page' => 3
);

$review_query = new WP_Query($args);
if ($review_query->have_posts()) {
	echo '<ol class="reviews">';
	while ($review_query->have_posts() ) {
		$review_query->the_post();
		$title = get_the_title();
		$content = get_the_content();
		$rating = get_field('rating');
		$name = get_field('name');
		$photo = get_field('photo');
		$city = get_field('city');
		$state = get_field('state');
		$product = get_the_title(get_field('product'));
		$size = get_field('size');
		$style = get_field('sleep_style');
		$date_format = "n/d/Y";
		$date = the_date($date_format, '', '', false);

		echo '<li class="review"><ul>
				<li><img width=100 src="' . $photo . '"></li>
				<li>title: ' . $title . '</li>
				<li>rating: ' . $rating .'</li>
				<li>name: ' . $name . '</li>
				<li>city: ' . $city .'</li>
				<li>state: ' . $state .'</li>
				<li>date: ' . $date .'</li>
				<li>content: ' . $content .'</li>
				<li>product: ' . $product .'</li>
				<li>size: ' . $size .'</li>
				<li>style: ' . $style .'</li>
			  </ul></li>';
	}
	echo '</ol>';
} else {
// no reviews found
}
wp_reset_postdata();
?>


<a href="<?php bloginfo('url'); ?>/reviews">Read more reviews</a>

<hr>

<?php get_footer( 'shop' ); ?>
