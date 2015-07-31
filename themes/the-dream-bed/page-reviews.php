<?php add_filter('acf/update_value', 'wp_kses_post', 10, 1); ?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

<?php echo get_field('header'); ?>
<img src="<?php echo get_field('header_image'); ?>">

<hr>

<?php
/* review sorting */
if(isset($_POST['show_product'])) {
	if (htmlspecialchars($_POST["show_product"]) == "dreambed") {
		$prod_show = array(96);
	} elseif (htmlspecialchars($_POST["show_product"]) == "coolgelbed") {
		$prod_show = array(26);
	} elseif (htmlspecialchars($_POST["show_product"]) == "") {
		$prod_show = array(96, 26);
	}
} else {
	$prod_show = array(96, 26);
}

if(isset($_POST['sort_by'])) {
	if (htmlspecialchars($_POST["sort_by"]) == "date") {
		$sort_by = "date";
	} elseif (htmlspecialchars($_POST["sort_by"]) == "rating") {
		$sort_by = "meta_value_num"; /* sort by rating */
	}
} else {
	$sort_by = "meta_value_num"; /* sort by rating */
}

if(isset($_POST['sort_order'])) {
	if (htmlspecialchars($_POST["sort_order"]) == "ASC") {
		$sort_order = "ASC";
	} elseif (htmlspecialchars($_POST["sort_order"]) == "DESC") {
		$sort_order = "DESC";
	}
} else {
	$sort_order = 'ASC';
}


/* query to get all ratings and build average rating */
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
<p><?php echo round(calculate_average($ratings), 0, PHP_ROUND_HALF_UP); ?>/5</p>
<small>Based on <?php echo $count; ?> reviews</small>

<hr>
<h2>Sorting</h2>

<form action="<?php bloginfo('url'); ?>/reviews" method="post">
	<div>
		<label for="show_product">Show Reviews For:</label>
		<select name="show_product" onchange="this.form.submit()">
			<option value="">All Beds</option>
			<option <?php if(isset($_POST['show_product']) && (htmlspecialchars($_POST["show_product"]) == "dreambed")) { echo "selected"; } ?> value="dreambed">Dream Bed</option>
			<option <?php if(isset($_POST['show_product']) && (htmlspecialchars($_POST["show_product"]) == "coolgelbed")) { echo "selected"; } ?> value="coolgelbed">Cool Gel Bed</option>
		</select>
	</div>
	<div>
		<label for="sort_by">Sort By:</label>
		<select name="sort_by" onchange="this.form.submit()">
			<option <?php if(isset($_POST['sort_by']) && (htmlspecialchars($_POST["sort_by"]) == "rating")) { echo "selected"; } ?>  value="rating">Rating</option>
			<option <?php if(isset($_POST['sort_by']) && (htmlspecialchars($_POST["sort_by"]) == "date")) { echo "selected"; } ?>  value="date">Date</option>
		</select>
	</div>
	<div>
		<label for="sort_order">Sort Order:</label>
		<select name="sort_order" onchange="this.form.submit()">
			<option <?php if(isset($_POST['sort_order']) && (htmlspecialchars($_POST["sort_order"]) == "DESC")) { echo "selected"; } ?>  value="DESC">Highest to Lowest</option>
			<option <?php if(isset($_POST['sort_order']) && (htmlspecialchars($_POST["sort_order"]) == "ASC")) { echo "selected"; } ?>  value="ASC">Lowest to Highest</option>
		</select>
	</div>
</form>
<hr>

<?php

/* main query for reviews listed below */
$args = array(
	'post_type' => 'review',
/* review posts can be ordered by 'menu_order' (manual ordering), date, or meta key for a field such as 'rating' or 'product' */
/* default should probably be menu_order (manual ordering) or by meta_key => rating, order => DESC so bad reviews aren't first */
	'meta_key' => 'rating',
	'orderby' => $sort_by,
/* use meta_query to filter to only certain products */
	'meta_query' => array(
		array(
			'key'     => 'product',
			'value'   => $prod_show,
		),
	),
	'order' => $sort_order
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
		$date = get_the_date($date_format);


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
