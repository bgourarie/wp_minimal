<?php get_header(); ?>

<div id="home">

<div class="jumbotron" style="background-image:url('<?php echo get_field('hero_image'); ?>')">
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-xs-12">
				<h1>Unbox a better tomorrow</h1>
				<h2>When you buy a Dream Bed we will donate a bed to someone in need. 
					Better Sleep. Better World.</h2>
				<p><a href="<?php bloginfo('url'); ?>/giving" class="btn btn-dream" role="button">See How We Give</a></p>
			</div>
		</div>
	</div>
</div>

<h1><?php echo get_field('header_text'); ?></h1>

<a href="<?php echo get_field('button_link') ?>"><?php echo get_field('button_text') ?></a>

<hr>

<h2>Reasons to Dream...</h2>

<?php if (have_rows('reasons_to_dream')) { ?>
	<ol class="reasons list">
	<?php while (have_rows('reasons_to_dream')) {
		the_row();
		$title = get_sub_field('reason_title');
		$desc = get_sub_field('reason_description');
		$btn_title = get_sub_field('reason_button_title');
		$link = get_sub_field('reason_link');
		$img = get_sub_field('reason_image');
	?>
		<li class="reason">
			<ul>
				<li><?php echo $title; ?></li>
				<li><?php echo $desc; ?></li>
				<li><a href="<?php echo $link; ?>"><?php echo $btn_title; ?></a></li>
				<li><img src="<?php echo $img; ?>"></li>
			</ul>
		</li>
	<?php } ?>
	</ol>
<?php } ?>

<div class="container">
	<div class="row">
		<div class="alternate">
			<div class="col-sm-6 alt-side-image home-middle1">
				<div class="inside">
					<div><img src="<?php bloginfo("template_url"); ?>/images/circle-best-in-box.png" alt="best in box - free shipping" /></div>
					<h3>We guarantee free delivery right to your doorstep.</h3>
					<p class="mattress-action"><a href="<?php bloginfo('url'); ?>/shop" class="btn btn-dream" role="button">Shop Now</a></p>
				</div>
			</div>
			<div class="col-sm-6 alt-side-image home-middle2">
				<div class="inside">
					<div><img src="<?php bloginfo("template_url"); ?>/images/circle-no-nightmare-guarantee.png" alt="no nightmare guarantee" /></div>
					<h3>180 night sleep guarantee. Love it or get a full refund.</h3>
					<p class="mattress-action"><a href="<?php bloginfo('url'); ?>/shop" class="btn btn-dream" role="button">Shop Now</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12 center-block text-center home-bed-options">
			<h2>Two comfy options</h2>
			<p><img src="<?php bloginfo("template_url"); ?>/images/home-dream-mattress-options.png" alt="A gentleman demonstrates the difficulity of choosing between the two Dream Bed options." class="img-responsive center-block"></p>
			<div class="center-block"> <a href="<?php bloginfo('url'); ?>/shop/mattress/dream-bed/" class="btn btn-dream" role="button">Shop Original Dream</a> <span class="or-text hidden-xs">or</span> <a href="<?php bloginfo('url'); ?>/shop/mattress/cool-gel-bed/" class="btn btn-dream" role="button">Shop Cool Dream</a> </div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="alternate">
			<div class="col-sm-4 alt-side-image home-review-box">
				<div class="inside">
					<h3>A bed for everyone</h3>
					<p class="fivestars"><img src="<?php bloginfo("template_url"); ?>/images/five-stars.svg" width="155" height="25" alt="5 stars reviews!"></p>
					<p class="mattress-action"><a href="<?php bloginfo('url'); ?>/reviews" class="btn btn-dream-link" role="button">Read The Reviews</a></p>
				</div>
			</div>
			<div class="col-sm-4 alt-side-image home-unboxing-box">
				<div class="inside">
					<div><img src="<?php bloginfo("template_url"); ?>/images/unboxing.svg" width="100" height="109" alt="unboxing demonstration"></div>
					<h3>Unboxing?</h3>
					<p class="mattress-action"><a href="<?php bloginfo('url'); ?>/design" class="btn btn-dream-link" role="button">Learn How-To</a></p>
				</div>
			</div>
			<div class="col-sm-4 alt-side-image home-donation-box">
				<div class="inside">
					<h2 class="bedcount"><?php echo get_field('dreambeds_donated', 'options'); ?> beds</h2>
					<h3>donated since 2015</h3>
					<p class="mattress-action"><a href="<?php bloginfo('url'); ?>/giving" class="btn btn-dream-link" role="button">See How We Give</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-12 text-center center-block home-find-store">
			<h2>See the Dream Bed at one of our partner showrooms.</h2>
			<p><a class="btn btn-dreaminv" href="<?php bloginfo('url'); ?>/store-finder" role="button">Find a Store</a></p>
		</div>
	</div>
</div>

</div>

<?php get_footer(); ?>
