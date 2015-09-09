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
} ?>

<span class="rating"><?php echo $the_rating; ?>/5</span>

<hr>

<div>
<?php
wc_get_template_part('content', 'single-product' );
?>
</div>

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
