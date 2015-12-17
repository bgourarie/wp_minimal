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
	'posts_per_page' => 1,
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
		<div class="container">
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
					$quote = get_field('pull_quote');
					$turl = get_bloginfo('template_url'); ?>

					<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
						
							<h3>&#8220;<?php echo $quote ?>&#8221;</h3>
							<p class="reviewer">
								<?php echo $name . ', ' . $city .' ' . $state ?><br>
							</p>
				  	</div><?php

				} ?>
			</div>
		</div>

		<div class="text-center">
			<p><a href="<?php echo bloginfo('url')."/reviews/?show_product=".$review_type;?>" class="btn btn-dream drop-shadow" type="button">Read All Reviews</a></p>
		</div>
	</div><?php

} // have_posts

wp_reset_postdata(); ?>