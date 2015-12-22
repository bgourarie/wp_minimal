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
				<h1><?php echo get_field('header_text'); ?></h1>
				<div class="cta"><a href="<?php echo get_field('button_link') ?>" class="btn btn-dream btn-lg" role="button"><?php echo get_field('button_text') ?></a></div>
				<img class="pin" src="<?php echo get_field('hero_image'); ?>" data-pin-description="The Dream Bed: Free shipping and a no nightmare guarantee." alt="">
			</div>
		</div>
	</div>
</div>

<div class="ellen">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-3 col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1 text-center">
				<a href="http://www.ellentv.com/videos/0-8j3su5d1/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/ellen-logo-as-seen-on.svg" class="drop-shadow as-seen-on" alt="as seen on ellen: The Ellen DeGeneres Show"></a>
			</div>
			<div class="col-lg-4 col-md-5 col-sm-6 text-center">
				<h4 class="clearfix">The Dream Bed was recently featured on <span style="white-space: nowrap">The Ellen DeGeneres Show</span></h4>
				<p><a href="http://www.ellentv.com/videos/0-8j3su5d1/" target="_blank" class="btn btn-dream drop-shadow" role="button">Watch Now!</a></p>
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
				<img src="<?php bloginfo("template_url"); ?>/images/ico-dreamboxes.svg" class="center-block" alt="">
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
<div class="home-bed-options">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 center-block text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/photos/two-dreamy-options.jpg" alt="Two dreamy mattresses in foam, latex and memory foam." data-pin-description="The Dream Bed: Two dreamy mattresses in foam, latex and memory foam." class="img-responsive center-block">
			</div>
		</div>
		<div class="divided">
			<div class="row">
				<div class="col-md-5 col-md-offset-1 text-center">
					<div class="text-part left">
						<h4 class="original"><a href="<?php bloginfo('url'); ?>/shop/mattress/dream-bed/">Original Dream</a></h4>
						<p>Latex and memory foam combine to create the perfect balance of firmness, contour, and bounce.</p>
					</div>
					<a href="<?php bloginfo('url'); ?>/shop/mattress/dream-bed/"><img src="<?php bloginfo("template_url"); ?>/images/original-dream-cutaway-home.jpg" alt="Original Dream Mattress Cutaway" data-pin-description="The Original Dream Bed: Latex and memory foam create the perfect balance of firmness, contour, and bounce." class="img-responsive center-block"></a>
					<div class="text-part left">
						<p><a href="<?php bloginfo('url'); ?>/shop/mattress/dream-bed/" class="btn btn-dream drop-shadow" role="button">Shop Original Dream</a></p>
					</div>
				</div>
				<div class="col-md-5 text-center">
					<div class="text-part right">
						<h4 class="cool"><a href="<?php bloginfo('url'); ?>/shop/mattress/cool-gel-bed/">Cool Dream</a></h4>
						<p>Latex and memory foam combined with a layer of cool gel help you sleep at the perfect temperature.</p>
					</div>
					<a href="<?php bloginfo('url'); ?>/shop/mattress/cool-gel-bed/"><img src="<?php bloginfo("template_url"); ?>/images/cool-dream-cutaway-home.jpg" alt="Cool Dream Mattress Cutaway" data-pin-description="The Cool Dream Bed: Latex and memory foam combined with a layer of cool gel help you sleep at the perfect temperature." class="img-responsive center-block"></a>
					<div class="text-part right">
						<p><a href="<?php bloginfo('url'); ?>/shop/mattress/cool-gel-bed/" class="btn btn-dream drop-shadow" role="button">Shop Cool Dream</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="jumbotron dream-it-forward-jumbo">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
				<a href="#" data-toggle="modal" data-target="#la-video"><img src="<?php bloginfo("template_url"); ?>/images/icon-videoplay.svg" class="center-block play-button" alt=""></a>
				<h2>PATH and Dream Bed teamed up to donate 100 mattresses to housing programs in LA</h2>
				<img class="pin" src="<?php bloginfo("template_url"); ?>/images/photos/dream-it-fwd-mattress-delivery-van.jpg" data-pin-description="The Dream Bed: For every Dream Bed purchased a bed is donated to someone in need. See how PATH and Dream Bed teamed up to donate 100 mattresses to housing programs in LA. #dreamitforward" alt="PATH and Dream Bed teamed up to donate 100 mattresses to housing programs in LA">
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="la-video" tabindex="-1" role="dialog" aria-labelledby="laLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close</span></button>
			</div>
			<div class="modal-body">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/3Htxl64UF3Q?rel=0" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>

<?php get_footer(); ?>