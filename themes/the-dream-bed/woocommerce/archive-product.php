<?php get_header(); ?>

<div class="jumbotron shop-now-main">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-xs-12">
				<h1>Two dreamy choices</h1>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 shop-day-guarantee">
			<img src="<?php bloginfo("template_url"); ?>/images/dream-bed-try-guarantee.png" alt="Try your Dream Bed for 180 nights. If after 180 nights you don't love your new Dream Bed, we promise a nightmare-free return and full refund." class="img-responsive">
		</div>
	</div>
</div>

<?php

$args = array(
	'post_type' => 'product',
//	'category_name' => 'mattress',
	'orderby' => 'name',
	'order' => 'DESC'
);

$product_query = new WP_Query($args);
if ($product_query->have_posts()) {
	echo '<div class="container products"><div class="row">';
	while ($product_query->have_posts() ) {
		$product_query->the_post();
		$title = get_the_title();
		$link = get_the_permalink();
		$content = get_the_content();
		$img_id = get_post_thumbnail_id();
		$img_url_array = wp_get_attachment_image_src($img_id, 'full', true);
		$img_url = $img_url_array[0];
		$short_description = $post->post_excerpt;

		echo '<div class="col-sm-6 text-center"><div class="product">
				<div class="product-image-cta">
					<a href="'. $link .'"><img src="' . $img_url .'" class="product-img"></a>
					<div class="product-cta"><a href="'. $link .'" class="btn btn-dream" role="button">Shop '. $title .'</a></div>
				</div>
				<div class="product-text">
					<h3>' . $title . ' Bed</h3>
					<p>' . $short_description .'</p>
					
				</div>
		</div></div>';
	}

/*
echo "<pre>";
print_r($product_query->posts);
echo "</pre>";
*/


	echo '</div><div class="row"><div class="col-xs-12"><div class="hidden-xs hidden-sm or-text">or</div></div></div></div>';
} else {
// no posts found
}
wp_reset_postdata();

?>
<div class="jump-on-bed">
	<div class="jump-on-bed-cta">
		<a href="<?php bloginfo('url'); ?>/giving" class="btn btn-dream" role="button">Learn More</a>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="same">
			<div class="col-sm-4 home-review-box">
				<div class="inner">
					<p class="fivestars"><img src="<?php bloginfo("template_url"); ?>/images/five-stars.svg" width="155" height="25" alt="5 stars reviews!"></p>
					<h3>A better bed for everyone</h3>
					<p class="mattress-action"><a href="<?php bloginfo('url'); ?>/reviews" class="btn btn-dream" role="button">Read The Reviews</a></p>
				</div>
			</div>
			<div class="col-sm-4 home-unboxing-box">
				<div class="inner">
					<div><img src="<?php bloginfo("template_url"); ?>/images/dreamy-sleeper.svg" width="114" height="99" alt="happy dream bed dreams"></div>
					<h3>Want to learn more?</h3>
					<p class="mattress-action"><a href="<?php bloginfo('url'); ?>/faq" class="btn btn-dream" role="button">Get the Facts</a></p>
				</div>
			</div>
			<div class="col-sm-4 home-donation-box">
				<div class="inner">
					<h3>Unbox a better tomorrow</h3>
					<p class="mattress-action"><a href="<?php bloginfo('url'); ?>/giving" class="btn btn-dream" role="button">See How We Give</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>