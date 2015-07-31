<?php add_filter('acf/update_value', 'wp_kses_post', 10, 1); ?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

<?php echo get_field('header'); ?>
<img src="<?php echo get_field('header_image'); ?>">

<hr>

<?php
/* show global rating */
$args = array(
	'post_type' => 'review',
	'orderby' => 'menu_order',
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
?>

<h2>Average Rating</h2>
<p><?php echo calculate_average($ratings); ?></p>
<small>Based on <?php echo $count; ?> reviews</small>

<h2>Median Rating</h2>
<p><?php echo calculate_median($ratings); ?></p>
<small>Based on <?php echo $count; ?> reviews</small>

<h2>Average Rating</h2>
<h3>rounded to nearest half</h3>
<p><?php echo round(calculate_average($ratings), 0, PHP_ROUND_HALF_UP); ?></p>
<small>Based on <?php echo $count; ?> reviews</small>


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
		array(
			'key'     => 'product',
			'value'   => array( 96 ), /* dream-bed = 96, cool-gel-bed = 26 */
			'compare' => 'IN',
		),
	),
	'order' => 'DESC'
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




<hr>

<a href="#" class="button">Write a review</a>

<?php
/* generate the review form for users to submit reviews directly to the custom post type for review */
/* reviews will be submitted as 'pending' and require an editor or admin to publish */
while ( have_posts()) {
	the_post();
}
	acf_form(array(
		'post_id' => 'new_post',
		'new_post' => array(
			'post_type' => 'review',
			'post_status' => 'pending'
		),
		'submit_value' => 'Submit Review'
	));

?>

<hr>

<?php get_footer(); ?>
