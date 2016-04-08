<?php get_header(); ?>

<div id="home">

<div class="jumbotron home-jumbo" style="background-image: url('<?php echo get_field('hero_image'); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-lg-offset-2 col-md-5 col-md-offset-1 col-xs-12 callout">
				<h1><?php echo get_field('header_text'); ?></h1>
				<h2><?php echo get_field('header_subhead'); ?></h2>
				<div class="cta"><a href="<?php echo get_field('button_link') ?>" class="btn btn-primary btn-lg" role="button"><?php echo get_field('button_text') ?></a></div>
				<img class="pin" src="<?php echo get_field('hero_image'); ?>" data-pin-description="Hampton & Rhodes: Beds for real people, made by real people." alt="">
			</div>
		</div>
	</div>
</div>
<?php 
//  some setup for the featured products:
	$fp1 = wc_get_product( get_field('featured_product_1') );
	$fp2 = wc_get_product( get_field('featured_product_2') );
	$image_size = 'large';	//(string|array) (Optional) Image size to use. Accepts any valid image size, or an array of width and height values in pixels (in that order).
	

?>

<div class="home-featured-specials">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Web Only Specials</h2>
				<h3>Amazing savings on our exclusive online offerings</h3>
			</div>
		</div>
	</div>
</div>
<div class="home-featured-products">
	<div class="featured-prod1">
		<div class="triangle">
			<div class="container">
				<div class="row">
					<div class="col-sm-7 featured-product-image center-block">
						<?php echo $fp1->get_image($image_size); ?>
					</div>
					<div class="col-sm-5">
						<h3><a href="<?php echo $fp1->get_permalink(); ?>"><?php echo $fp1->get_title(); ?></a></h3>
						<p><?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $fp1->get_id())); ?></p>
						<div class="product-tags">
							<?php 
							$prod_tags = $fp1->get_tags();
							foreach($prod_tags as $tag ){
								?>
								<div class="tag-<?php echo $tag;?>"></div>
							<?php } ?>
						</div>
						<p><?php echo $fp1->get_price_html(); ?> </p>
						<p><a href="<?php echo $fp1->get_permalink(); ?>" role="button" class="btn btn-primary btn-lg">Shop Now</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="featured-prod2">
		<div class="triangle">
			<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<h3><a href="<?php echo $fp2->get_permalink(); ?>"><?php echo $fp2->get_title(); ?></a></h3>
					<p><?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $fp2->get_id())); ?></p>
					<div class="product-tags">
						<?php 
							$prod_tags = $fp2->get_tags();
							foreach($prod_tags as $tag ){
								?>
								<div class="tag-<?php echo $tag;?>"></div>
						<?php } ?>
					</div>
					<p><?php echo $fp2->get_price_html(); ?></p>
					<p><a href="<?php echo $fp1->get_permalink(); ?>" role="button" class="btn btn-primary btn-lg">Shop Now</a></p>			
				</div>
				<div class="col-sm-7 featured-product-image center-block">
					<?php echo $fp2->get_image($image_size); ?>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>

<div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
				<div class="home-free-shipping">
					<div>
						<h4>Free shipping -- this container is full width for the free shpping and pickup banner thing!</h4>
					</div>
				</div>	
			</div>
		</div>
</div>

<div class="dark-grey-shapes why-choose">
	<div class="container">
		<div class="row">
			<div class="col-xs-6 col-sm-3 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/icon-moon.svg" class="center-block" alt="">
				Badge text to go along the side of the icon i guess
			</div>
			<div class="col-xs-6 col-sm-3 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/icon-deliverybox.svg" class="center-block" alt="">
				Badge text to go along the side of the icon i guess
			</div> 
			<div class="clearfix visible-xs-block"></div>
			<div class="col-xs-6 col-sm-3 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/icon-dreamboxes.svg" class="center-block" alt="">
				Badge text to go along the side of the icon i guess
			</div> 
			<div class="col-xs-6 col-sm-3 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/icon-heartbed.svg" class="center-block" alt="">
				Badge text to go along the side of the icon i guess
			</div> 
		</div>
	</div>
</div>


<?php get_footer(); ?>