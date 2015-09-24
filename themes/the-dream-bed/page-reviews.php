<?php add_filter('acf/update_value', 'wp_kses_post', 10, 1); ?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

<?php

/* defaults */
$prod_show = array(96, 26); /* show both beds */
$sort_by = "meta_value_num"; /* sort by rating */
$sort_order = 'ASC'; /* sort ascending */

/* review sorting */
if(isset($_REQUEST['show_product'])) {
	if (htmlspecialchars($_REQUEST["show_product"]) == "dreambed")  {
		$prod_show = array(96);
	} elseif (htmlspecialchars($_REQUEST["show_product"]) == "coolgelbed") {
		$prod_show = array(26);
	}
}

if(isset($_REQUEST['sort_by'])) {
	if (htmlspecialchars($_REQUEST["sort_by"]) == "date") {
		$sort_by = "date";
	} elseif (htmlspecialchars($_REQUEST["sort_by"]) == "rating") {
		$sort_by = "meta_value_num"; /* sort by rating */
	}
}

if(isset($_REQUEST['sort_order'])) {
	if (htmlspecialchars($_REQUEST["sort_order"]) == "ASC") {
		$sort_order = "ASC";
	} elseif (htmlspecialchars($_REQUEST["sort_order"]) == "DESC") {
		$sort_order = "DESC";
	}
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

<div class="container reviews-page">


	<div class="row">
		<div class="col-sm-4 col-sm-offset-1 review-header">
			<h3>average rating:
                <?php
                    $average_rating = round(calculate_average($ratings), 0, PHP_ROUND_HALF_UP);
                    // Loop and print a whole star for each step.
                    for ($i = 1; $i <= $average_rating; $i++) {
                        echo '<img src="one-star.svg" />';
                    }
                    // If average rating is not a whole number, we need to print an additional half star after the loop.
                    if (!round($average_rating, 0) == $average_rating){
                        echo '<img src="half-star.svg" />';
                    }
                ?>
			<small>based on <?php echo $count; ?> reviews</small></h3>
		</div>
		<div class="col-sm-6 text-right">
		<form action="<?php bloginfo('url'); ?>/reviews" method="post">
				<div>
					<label for="show_product">Show Reviews For:</label>
					<select name="show_product" onchange="this.form.submit()">
						<option value="">All Beds</option>
						<option <?php if(isset($_REQUEST['show_product']) && (htmlspecialchars($_REQUEST["show_product"]) == "dreambed")) { echo "selected"; } ?> value="dreambed">Dream Bed</option>
						<option <?php if(isset($_REQUEST['show_product']) && (htmlspecialchars($_REQUEST["show_product"]) == "coolgelbed")) { echo "selected"; } ?> value="coolgelbed">Cool Gel Bed</option>
					</select>
				</div>
				<div>
					<label for="sort_by">Sort By:</label>
					<select name="sort_by" onchange="this.form.submit()">
						<option <?php if(isset($_REQUEST['sort_by']) && (htmlspecialchars($_REQUEST["sort_by"]) == "rating")) { echo "selected"; } ?>  value="rating">Rating</option>
						<option <?php if(isset($_REQUEST['sort_by']) && (htmlspecialchars($_REQUEST["sort_by"]) == "date")) { echo "selected"; } ?>  value="date">Date</option>
					</select>
				</div>
				<div>
					<label for="sort_order">Sort Order:</label>
					<select name="sort_order" onchange="this.form.submit()">
						<option <?php if(isset($_REQUEST['sort_order']) && (htmlspecialchars($_REQUEST["sort_order"]) == "DESC")) { echo "selected"; } ?>  value="DESC">Highest to Lowest</option>
						<option <?php if(isset($_REQUEST['sort_order']) && (htmlspecialchars($_REQUEST["sort_order"]) == "ASC")) { echo "selected"; } ?>  value="ASC">Lowest to Highest</option>
					</select>
				</div>
			</form></div>
	</div>
	

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
	echo '<!-- start reviews -->';
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
		$date_format = "n-d-Y";
		$date = get_the_date($date_format);
		$turl = get_bloginfo('template_url');
		

		echo '<div class="row">
				<div class="col-sm-3 col-sm-offset-1 col-md-4 col-md-offset-1 review-personal-img">
					<img src="' . $photo . '" class="img-responsive">
				</div>
				<div class="col-sm-7 col-md-6 review-personal-text">
					<h3>' . $title . '</h3>
					<p class="stars">
						<img src="' . $turl .'/images/' . $rating .'-stars.svg">
					</p>
					<p class="the-review">' . $content .'</p>
					<p class="reviewer">
						' . $name . ', ' . $city .' ' . $state .' <br>
						' . $date .'
					</p>
					<p class="iconset">product: ' . $product .' <br>
						size: ' . $size .' <br>
						style: ' . $style .'
					</p>
			  	</div>
			  </div>';
	}
	echo '<!-- end reviews -->';
} else {
// no reviews found
}
wp_reset_postdata();
?>

<div class="row">
	<div class="col-xs-12">
		<p class="text-center"><a class="btn btn-dream" role="button" data-toggle="collapse" href="#new-review-form" aria-expanded="false" aria-controls="new-review-form">Write a review</a></p>
	</div>
	<div class="col-xs-12">
		<div class="collapse" id="new-review-form">
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
			</div>
	</div>
</div>

<div class="row">
		<div class="col-xs-12">
			<h1 class="text-center">Share your dreams</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-3"> <img src="<?php bloginfo("template_url"); ?>/images/photos/instagram-submission-1.jpg" class="img-responsive" alt="Instagram submission to the Dream Bed contest"> </div>
		<div class="col-sm-3"> <img src="<?php bloginfo("template_url"); ?>/images/photos/instagram-submission-2.jpg" class="img-responsive" alt="Instagram submission to the Dream Bed contest"> </div>
		<div class="col-sm-3"> <img src="<?php bloginfo("template_url"); ?>/images/photos/instagram-submission-3.jpg" class="img-responsive" alt="Instagram submission to the Dream Bed contest"> </div>
		<div class="col-sm-3"> <img src="<?php bloginfo("template_url"); ?>/images/photos/instagram-submission-4.jpg" class="img-responsive" alt="Instagram submission to the Dream Bed contest"> </div>
	</div>

</div>



<?php get_footer(); ?>
