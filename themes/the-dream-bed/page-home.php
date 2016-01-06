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

<script>
jQuery(document).ready(function($){
	$("#ellen-video").on('hidden.bs.modal', function (e) {
    $("#ellen-video iframe").attr("src", $("#ellen-video iframe").attr("src"));
		});
	$("#la-video").on('hidden.bs.modal', function (e) {
    $("#la-video iframe").attr("src", $("#la-video iframe").attr("src"));
		});
	});
	
</script>

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
<div class="modal fade" id="ellen-video" tabindex="-2" role="dialog" aria-labelledby="ellenLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">close</span>
				</button>
			</div>
			<div class="modal-body">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/8nnD0NpYHzw?rel=0" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="modal-footer">
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
		<div class="col-xs-6 col-sm-4 text-center">
			<a href="http://www.azcentral.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-buy-bed-give-bed-concept-catching-on/77056796/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/external/featured-azcentral-logo.png" class="center-block" alt="Arizona Republic"></a>
			<p>Buy-a-bed/give-a-bed concept catching on for Dream Bed</p>
			<p><a href="http://www.azcentral.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-buy-bed-give-bed-concept-catching-on/77056796/" target="_blank" class="btn btn-link" role="button">Read More</a></p>
		</div>
		<div class="col-xs-6 col-sm-4 text-center">
			<a href="http://www.indystar.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-la-chicago-charities-get-free-dream-beds/77055956/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/external/featured-indy-star-logo.png" class="center-block" alt="Indianapolis Star"></a>
			<p>Big City Dreams: LA, Chicago charities get free Dream Beds</p>
			<p><a href="http://www.indystar.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-la-chicago-charities-get-free-dream-beds/77055956/" target="_blank" class="btn btn-link" role="button">Read More</a></p>
		</div> 
		<div class="clearfix visible-xs-block"></div>
		<div class="col-xs-6 col-sm-4 text-center">
			<a href="http://www.greenbaypressgazette.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-5-tips-good-night-sleep/77055588/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/external/featured-greenbaypressgazette-logo.png" class="center-block" alt="Green Bay Press Gazette"></a>
			<p>Mattress brands like The Dream Bed offer unique memory foam products that are easy to ship, set up and offer the right balance of support and comfort</p>
			<p><a href="http://www.greenbaypressgazette.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-5-tips-good-night-sleep/77055588/" target="_blank" class="btn btn-link" role="button">Read More</a></p>
		</div>
		<div class="clearfix hidden-xs"></div>
		<div class="col-xs-6 col-sm-4 text-center">
			<a href="http://www.tennessean.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-how-temperature-affects-sleep/77055158/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/external/featured-tennessean-logo.png" class="center-block" alt="Tennessean"></a>
			<p>Cool Dreams: How temperature affects sleep</p>
			<p><a href="http://www.tennessean.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-how-temperature-affects-sleep/77055158/" target="_blank" class="btn btn-link" role="button">Read More</a></p>
		</div>
		<div class="clearfix visible-xs-block"></div>
		<div class="col-xs-6 col-sm-4 text-center">
			<a href="http://www.freep.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-4-big-tips-for-small-rooms-and-homes/77054598/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/external/featured-detroit-free-press-logo.png" class="center-block" alt="Detroit Free Press"></a>
			<p>Bed-in-a-box companies like The Dream Bed have designs that require only a flat surface and no box spring whatsoever</p>
			<p><a href="http://www.freep.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-4-big-tips-for-small-rooms-and-homes/77054598/" target="_blank" class="btn btn-link" role="button">Read More</a></p>
		</div> 
		<div class="col-xs-6 col-sm-4 text-center">
			<a href="http://www.cincinnati.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-millennials-sleep-why-plugged-generation-must-power-down/77053698/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/external/featured-cincinnati-logo.png" class="center-block" alt="Cincinnati.com"></a>
			<p>Millennials &amp; sleep: Why this plugged-in generation must learn to power down</p>
			<p><a href="http://www.cincinnati.com/story/sponsor-story/dream-bed/2015/12/09/dream-bed-millennials-sleep-why-plugged-generation-must-power-down/77053698/" target="_blank" class="btn btn-link" role="button">Read More</a></p>
		</div>
	</div>
</div>
<?php get_footer(); ?>