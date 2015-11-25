<?php
/* defaults */
$prod_show = array(get_the_ID());
$sort_by = "meta_value_num"; /* sort by rating */
$sort_order = 'ASC'; /* sort ascending */
$review_type = $prod_show == array(96) ? 'dreambed' : 'coolgelbed';

$args = array(
	'post_type' => 'review',
	'meta_query' => array(
		array(
			'key' => 'product',
			'value' => $prod_show,
		),
		array(
			'key' => '_is_featured',
			'value' => true
		),
	),
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'posts_per_page' => 3,
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

$review_query = new WP_Query($args);

if ($review_query->have_posts()) { ?>

	<div id="featured-product-reviews">
		<h3>what our customers are saying</h3>

		<div id="customers-saying" class="container">
			<div class="row"><?php
				while ($review_query->have_posts() ) {
					$review_query->the_post();
					$title = get_the_title();
					$content = get_the_content();
					$rating = get_field('rating');
					$name = get_field('name');
					$city = get_field('city');
					$state = get_field('state');
					$product = get_the_title(get_field('product'));
					$date_format = "n-d-Y";
					$date = get_the_date($date_format);
					$turl = get_bloginfo('template_url'); ?>

					<div class="col-xs-12 col-sm-6 col-md-4">
						<div class="review">
							<h3><?php echo $title ?></h3>
							<p class="stars">
								<img src="<?php echo $turl .'/images/' . $rating ?>-stars.svg">
							</p>
							<p class="the-review"><?php echo $content ?></p>
							<p class="reviewer">
								<?php echo $name . ', ' . $city .' ' . $state ?><br>
								<?php echo $date ?>
							</p>
						</div>
				  	</div><?php

				} ?>
			</div>
		</div>

		<div class="text-center">
			<p><a href="<?php echo bloginfo('url')."/reviews/?show_product=".$review_type;?>" class="btn btn-dream" type="button">Read More Reviews</a></p>
		</div>
	</div><?php

} // have_posts

wp_reset_postdata(); ?>