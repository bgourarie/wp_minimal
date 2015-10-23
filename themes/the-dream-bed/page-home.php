<?php get_header(); ?>

<div id="home">


<?php if (have_rows('reasons_to_dream')) { ?>
	<div id="carousel-dream-home" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
	<?php $number = 0; ?>
	<?php while (have_rows('reasons_to_dream')) {
		the_row();
		
	?>
		<li data-target="#carousel-dream-home" data-slide-to="<?php echo $number++; ?>"></li>
	<?php } ?>


		</ol>
		<div class="carousel-inner" role="listbox">
	<?php while (have_rows('reasons_to_dream')) {
		the_row();
		$title = get_sub_field('reason_title');
		$desc = get_sub_field('reason_description');
		$btn_title = get_sub_field('reason_button_title');
		$link = get_sub_field('reason_link');
		$img = get_sub_field('reason_image');
	?>
			<div class="item">
				<div style="background-image:url(<?php echo $img; ?>);" class="slider-size">
					<div class="carousel-caption">
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
									<h1><?php echo $title; ?></h1> 
									<h2><?php echo $desc; ?></h2>
									<p><a href="<?php echo $link; ?>" class="btn btn-dream" role="button"><?php echo $btn_title; ?></a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php } ?>
	</div>
</div>

<script>
jQuery(document).ready(function($){
	$("#carousel-dream-home .carousel-indicators li:first").addClass("active");
	$("#carousel-dream-home .carousel-inner .item:first").addClass("active");
	$("#carousel-dream-home").carousel({
		interval: 8000
		})
	});
</script>

<?php } ?>

<div class="container">
	<div class="special-circles">
		<div class="row">
			<div class="col-sm-3 col-xs-6 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/circle-orange-no-nightmare-guarantee.svg" class="center-block" alt="180 night no nightmare guarantee">
				<h3>180 Night Guarantee</h3>
				<p>180 night in home trial. Really.</p>
			</div>
			<div class="col-sm-3 col-xs-6 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/circle-orange-dream-team-delivery.svg" class="center-block" alt="Dream team delivery: free shipping">
				<h3>Free Delivery</h3>
				<p>You are 48 hours away from a better night&#8217;s sleep.</p>
			</div>
			<div class="clearfix visible-xs-block"></div>
			<div class="col-sm-3 col-xs-6 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/circle-orange-quality-craftsmanship.svg" class="center-block" alt="Best in Box: Quality Craftsmanship">
				<h3>Best In Box</h3>
				<p>2 dreamy mattresses. Both offering optimum support &amp; comfort.</p>
			</div>
			<div class="col-sm-3 col-xs-6 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/circle-orange-dream-it-forward.svg" class="center-block" alt="Dream it forward: buy a dream, give a dream">
				<h3>Dream It Forward</h3>
				<p>Purchase a dream bed and we will give a bed to a person in need.</p>   
			</div>
		</div>
	</div>
	<div class="row">
		<div class="alternate">
			<div class="col-sm-6 alt-side-image home-middle1">
				<div class="inside">
					<h2>Free 2-day <br>
						delivery!</h2>
					<p><a href="<?php bloginfo('url'); ?>/shop" class="btn btn-dream" role="button">Shop Now</a></p>
				</div>
			</div>
			<div class="col-sm-6 alt-side-image home-middle2">
				<div class="inside">
					<h2>No nightmare<br>
						180 night guarantee</h2>
					<p><a href="<?php bloginfo('url'); ?>/design" class="btn btn-dream" role="button">See Design</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="light-grey-fill">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 center-block text-center home-bed-options">
				<h2>The Dream Bed comes in two dreamy choices</h2>
				<p><img src="<?php bloginfo("template_url"); ?>/images/photos/two-dreamy-options-man.jpg" alt="A gentleman demonstrates the difficulty of choosing between the two Dream Bed options." class="img-responsive center-block"></p>
				<div class="center-block"> 
					<a href="<?php bloginfo('url'); ?>/shop/" class="btn btn-dream" role="button">Shop The Dream Bed</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid dream-it-fwd">
	<div class="row">
		<div class="container">
			<div class="col-md-3 col-md-offset-2 col-sm-4 col-xs-6">
				<div class="dream-it-fwd-content">
					<img src="<?php bloginfo("template_url"); ?>/images/circle-dream-it-forward-buy-a-dream-give-a-dream.png" class="img-responsive">
					<h3>For every Dream Bed purchased a bed is donated to someone in need.</h3>
					<p><a href="<?php bloginfo('url'); ?>/giving" class="btn btn-dream" role="button">Learn More</a></p>
				</div>
			</div>
		</div>
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

</div>

<?php get_footer(); ?>
