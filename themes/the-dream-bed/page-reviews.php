<?php add_filter('acf/update_value', 'wp_kses_post', 10, 1); ?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

<?php echo get_field('header'); ?>
<img src="<?php echo get_field('header_image'); ?>">

<hr>

<?php
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
	'orderby' => 'menu_order',
	'order' => 'ASC'
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
				<li>' . $title . '</li>
				<li>' . $rating .'</li>
				<li>' . $name . '</li>
				<li>' . $city .'</li>
				<li>' . $state .'</li>
				<li>' . $date .'</li>
				<li>' . $content .'</li>
				<li>' . $product .'</li>
				<li>' . $size .'</li>
				<li>' . $style .'</li>
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
