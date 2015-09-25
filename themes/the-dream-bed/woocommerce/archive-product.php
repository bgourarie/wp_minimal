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

		echo '<div class="col-sm-6 text-center "><div class="product">
				<p><a href="'. $link .'"><img src="' . $img_url .'" class="product-img"></a></p>
				<div class="product-text">
					<h3>' . $title . ' Bed</h3>
					<p>' . $short_description .'</p>
					<p><a href="'. $link .'" class="btn btn-dream" role="button">Shop '. $title .'</a></p>
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

<div class="container">
	<div class="row">
		<div class="alternate">
			<div class="col-sm-4 alt-side-image home-review-box">
				<div class="inside">
					<h3>A bed for everyone</h3>
					<p class="fivestars"><img src="<?php bloginfo("template_url"); ?>/images/five-stars.svg" width="155" height="25" alt="5 stars reviews!"></p>
					<p class="mattress-action"><a href="<?php bloginfo('url'); ?>/reviews" class="btn btn-dream" role="button">Read The Reviews</a></p>
				</div>
			</div>
			<div class="col-sm-4 alt-side-image home-unboxing-box">
				<div class="inside">
					<div><img src="<?php bloginfo("template_url"); ?>/images/unboxing.svg" width="100" height="109" alt="unboxing demonstration"></div>
					<h3>Unboxing?</h3>
					<p class="mattress-action"><a href="<?php bloginfo('url'); ?>/design" class="btn btn-dream" role="button">Learn How-To</a></p>
				</div>
			</div>
			<div class="col-sm-4 alt-side-image home-donation-box">
				<div class="inside">
					<h3>Unbox a better tomorrow</h3>
					<p class="mattress-action"><a href="<?php bloginfo('url'); ?>/giving" class="btn btn-dream" role="button">See How We Give</a></p>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>
