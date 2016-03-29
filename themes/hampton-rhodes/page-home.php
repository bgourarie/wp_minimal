<?php get_header(); ?>

<div id="home">

<div class="jumbotron mobile-home-jumbo visible-xs">
	<div class="main-text">
		<h1><?php echo get_field('header_text'); ?></h1>
		<div><a href="<?php echo get_field('button_link') ?>" class="btn btn-dream btn-lg" role="button"><?php echo get_field('button_text') ?></a></div>
	</div>
</div>

<div class="jumbotron home-jumbo hidden-xs" style="background-image: url('<?php echo get_field('hero_image'); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-xs-12">
				<h1 class="hidden-sm"><?php echo get_field('header_text'); ?></h1>
				<div class="cta"><a href="<?php echo get_field('button_link') ?>" class="btn btn-dream btn-lg" role="button"><?php echo get_field('button_text') ?></a></div>
				<img class="pin" src="<?php echo get_field('hero_image'); ?>" data-pin-description="The Dream Bed: Free shipping and a no nightmare guarantee." alt="">
			</div>
		</div>
	</div>
</div>
<div class="dark-grey-shapes why-choose">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center"><h2>Why Choose The Dream Bed?</h2></div> 
		</div>
		<div class="row">
			<div class="col-xs-6 col-sm-3 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/icon-moon.svg" class="center-block" alt="">
				<h5>180 Night Guarantee</h5>
				<p>You get 180 nights to try out your Dream Bed. If you don&#8217;t love it you can return it for a full refund.</p>
			</div>
			<div class="col-xs-6 col-sm-3 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/icon-deliverybox.svg" class="center-block" alt="">
				<h5>Free Delivery</h5>
				<p>The Dream Bed ships nationwide, in a convenient box, for FREE! We deliver right to your door in two days. Returns are free too!</p>
			</div> 
			<div class="clearfix visible-xs-block"></div>
			<div class="col-xs-6 col-sm-3 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/icon-dreamboxes.svg" class="center-block" alt="">
				<h5>Comfy Choices</h5>
				<p>The Dream Bed offers two unique mattresses choices, Original Dream and Cool Dream. Both offer optimum support & comfort.</p>
			</div> 
			<div class="col-xs-6 col-sm-3 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/icon-heartbed.svg" class="center-block" alt="">
				<h5>We Give Back</h5>
				<p>For every Dream Bed purchased, we give a bed to someone in need. We call this &#8220;Dream it Forward.&#8221;</p>
			</div> 
		</div>
	</div>
</div>
<?php 
//  some setup for the featured products:
	$fp1 = wc_get_product( get_field('featured_product_1') );
	$fp2 = wc_get_product( get_field('featured_product_2') );
	$image_size = 'thumbnail';	//(string|array) (Optional) Image size to use. Accepts any valid image size, or an array of width and height values in pixels (in that order).
	

?>
<div class="home-featured-specials">
	<div class="container">
		<div class="row">
			<div class="col-sm-7 center-block text-center">
				<?php echo $fp1->get_image($image_size); ?>
			</div>
			<div class="col-sm-5 center-block text-center">
				<a href="<?php echo $fp1->get_permalink(); ?>">
					<h3> <?php echo $fp1->get_title(); ?> </h3>
				</a>
				<p>
					<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $fp1->get_id())); ?>
				</p>
				<?php echo $fp1->get_price_html(); ?> 
				<a href="<?php echo $fp1->add_to_cart_url(); ?>">
					<?php echo $fp1->add_to_cart_text(); ?>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-5 center-block text-center">
			<a href="<?php echo $fp2->get_permalink(); ?>">
				<h3> <?php echo $fp2->get_title(); ?> </h3>
			</a>
			<p>
				<?php echo apply_filters('the_excerpt', get_post_field('post_excerpt', $fp2->get_id())); ?>
			</p>
			<?php echo $fp2->get_price_html(); ?> 
				<a href="<?php echo $fp2->add_to_cart_url(); ?>">
					<?php echo $fp2->add_to_cart_text(); ?>
				</a>				
			</div>
			<div class="col-sm-7 center-block text-center">
				<?php echo $fp2->get_image($image_size); ?>
			</div>
		</div>
	</div>
</div>
<div class="home-free-shipping">
	<!-- <div class="container">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-md-4 col-md-offset-4">
				<div class="home-unboxing-box-content">
					<div>
						<a href="#" data-toggle="modal" data-target="#unboxing-video"><img src="<?php bloginfo("template_url"); ?>/images/icon-unboxingbox.svg" class="img-responsive" alt=""></a>
					</div>
					<div>
						<h4>Unboxing is Easy!</h4>
						<p>Watch Meredith, Chris, and Hank set up their new Dream Bed.</p>
						<p><a href="#" class="btn btn-dream drop-shadow" role="button" data-toggle="modal" data-target="#unboxing-video">See the Video</a></p>
					</div>
				</div>	
			</div>
		</div>
	</div> -->
	free shipping alert goes here
</div>
<div class="jumbotron home-jumbo hidden-xs" style="background-image: url('<?php echo get_field('footer_hero_image'); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-xs-12">
				<h1 class="hidden-sm"><?php echo get_field('footer_hero_text'); ?></h1>
				<div class="cta"><a href="<?php echo get_field('footer_button_link') ?>" class="btn btn-dream btn-lg" role="button"><?php echo get_field('footer_button_text') ?></a></div>
				<img class="pin" src="<?php echo get_field('footer_hero_image'); ?>" data-pin-description="The Dream Bed: Free shipping and a no nightmare guarantee." alt="">
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