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
<div class="light-grey-fill go-under-jumbotron">
	<div class="container">
		<div class="row vertical-align shop-badges">
			<div class="col-xs-5 col-sm-2 col-sm-offset-1">
				<img src="<?php bloginfo("template_url"); ?>/images/circle-orange-no-nightmare-guarantee.svg" class="center-block" alt="180 night no nightmare guarantee">
			</div>
			<div class="col-xs-7 col-sm-3">
				<div class="shop-badge-text">
					<h3>180 night in home trial with nightmare free refund or return</h3>
				</div>
			</div>
			<div class="clearfix visible-xs-block"></div>
			<div class="col-xs-5 col-sm-2">
				<img src="<?php bloginfo("template_url"); ?>/images/circle-orange-dream-team-delivery.svg" class="center-block img-responsive" alt="Dream team delivery: free shipping">
			</div>	
			<div class="col-xs-7 col-sm-3">
				<div class="shop-badge-text">
					<h3>Nationwide free delivery right to your door within 48 hours!</h3>
				</div>
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

		echo '<div class="col-sm-6 text-center"><div class="product">
				<div class="product-text">
					<h3><a href="'. $link .'">' . $title . ' Bed</a></h3>
					<p>' . $short_description .'</p>
					
				</div>
				<div class="product-image-cta">
					<a href="'. $link .'"><img src="' . $img_url .'" class="product-img"></a>
					<div class="product-cta"><a href="'. $link .'" class="btn btn-dream" role="button">Shop '. $title .'</a></div>
				</div>
			  </div></div>';
	}

/*
echo "<pre>";
print_r($product_query->posts);
echo "</pre>";
*/


	echo '</div></div>';
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
