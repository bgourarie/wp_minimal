<?php get_header(); ?>

<div id="home">

<div class="jumbotron mobile-home-jumbo visible-xs">
	<div class="main-text">
		<h1>Sleep you dream about</h1>
		<div><a href="<?php bloginfo('url'); ?>/shop/" class="btn btn-dream btn-lg" role="button">Shop Now</a></div>
		<img class="pin" src="<?php bloginfo("template_url"); ?>/images/photos/feet-hanging-off-bed-detail.jpg" data-pin-description="The Dream Bed: Free shipping and a no nightmare guarantee." alt="">
	</div>
</div>

<?php if (have_rows('reasons_to_dream')) { ?>
	<div id="carousel-dream-home" class="carousel slide hidden-xs" data-ride="carousel">
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
									<p><a href="<?php echo $link; ?>" class="btn btn-dream btn-lg" role="button"><?php echo $btn_title; ?></a></p>
									<img class="pin" src="<?php echo $img; ?>" data-pin-description="The Dream Bed: 180 night in home trial, free delivery, two options offering optimum support & comfort." alt="">
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
	$("#unboxing-video").on('hidden.bs.modal', function (e) {
    $("#unboxing-video iframe").attr("src", $("#unboxing-video iframe").attr("src"));
		});
	$("#la-video").on('hidden.bs.modal', function (e) {
    $("#la-video iframe").attr("src", $("#la-video iframe").attr("src"));
		});
	});
	
</script>

<?php } ?>
<div class="ellen">
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-3 col-md-3 col-md-offset-2 col-sm-4 col-sm-offset-1 text-center">
				<a href="#" data-toggle="modal" data-target="#ellen-video"><img src="<?php bloginfo("template_url"); ?>/images/ellen-logo-as-seen-on.svg" class="drop-shadow as-seen-on" alt="as seen on ellen: The Ellen DeGeneres Show"></a>
			</div>
			<div class="col-lg-4 col-md-5 col-sm-6 text-center">
				<h4 class="clearfix">The Dream Bed was recently featured on <span style="white-space: nowrap">The Ellen DeGeneres Show</span></h4>
				<p><a href="#" data-toggle="modal" data-target="#ellen-video" class="btn btn-dream drop-shadow" role="button">Watch Now!</a></p>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="ellen-video" tabindex="-1" role="dialog" aria-labelledby="laLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close</span></button>
			</div>
			<div class="modal-body">
				<iframe width="575" height="324" src="//widgets.ellentube.com/videos/0_8j3su5d1/" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="modal-footer"></div>
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
<div class="container featured-news">
	<div class="row">
		<div class="col-sm-12 text-center"><h2>Featured In</h2></div> 
	</div>
	<div class="row">
		<div class="col-xs-6 col-sm-3 text-center">
			<a href="#"><img src="<?php bloginfo("template_url"); ?>/images/logo-bloomberg.svg" class="center-block" alt=""></a>
			<p>Lorem ipsum dolor sit amet, consec tetuer adip iscing elit. Donec odio. Quisque volut pat mattis eros. Nullam male suada.</p>
			<p><a href="<?php bloginfo('url'); ?>/giving/" class="btn btn-link" role="button">Read More</a></p>
		</div>
		<div class="col-xs-6 col-sm-3 text-center">
			<a href="#"><img src="<?php bloginfo("template_url"); ?>/images/logo-bloomberg.svg" class="center-block" alt=""></a>
			<p>Lorem ipsum dolor sit amet, consec tetuer adip iscing elit. Donec odio. Quisque volut pat mattis eros. Nullam male suada.</p>
			<p><a href="<?php bloginfo('url'); ?>/giving/" class="btn btn-link" role="button">Read More</a></p>
		</div> 
		<div class="clearfix visible-xs-block"></div>
		<div class="col-xs-6 col-sm-3 text-center">
			<a href="#"><img src="<?php bloginfo("template_url"); ?>/images/logo-bloomberg.svg" class="center-block" alt=""></a>
			<p>Lorem ipsum dolor sit amet, consec tetuer adip iscing elit. Donec odio. Quisque volut pat mattis eros. Nullam male suada.</p>
			<p><a href="<?php bloginfo('url'); ?>/giving/" class="btn btn-link" role="button">Read More</a></p>
		</div> 
		<div class="col-xs-6 col-sm-3 text-center">
			<a href="#"><img src="<?php bloginfo("template_url"); ?>/images/logo-bloomberg.svg" class="center-block" alt=""></a>
			<p>Lorem ipsum dolor sit amet, consec tetuer adip iscing elit. Donec odio. Quisque volut pat mattis eros. Nullam male suada.</p>
			<p><a href="<?php bloginfo('url'); ?>/giving/" class="btn btn-link" role="button">Read More</a></p>
		</div> 
	</div>
</div>
<?php get_footer(); ?>