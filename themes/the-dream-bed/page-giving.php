<?php get_header(); ?>

<div class="giving-page">

	<div class="container">
		<div class="row rowspace">
			<div class="col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 text-center">
				<h2>When you purchase The Dream Bed, we give a bed to someone in need.</h2>
				<p>A good night&rsquo;s sleep is the foundation for everything we do. It affects our health, happiness, success and ability to dream big. That&rsquo;s why we want to share the gift of sleep with everyone everywhere.</p>
			</div>
		</div>
	</div>
	
	<div class="light-grey-shapes giving-map">
		<div class="container">
			<div class="row rowspace">
				<div class="col-sm-10 col-sm-offset-1">
					<div><img src="<?php bloginfo("template_url"); ?>/images/dream-bed-world-giving-map.png" class="img-responsive" alt="Why We Give" nopin="nopin"></div>
					<img src="<?php bloginfo("template_url"); ?>/images/dream-bed-world-giving-map2.png" class="pin" alt="Why We Give" data-pin-description="The Dream Bed's goal is to provide those in need with a comfortable place to sleep.">
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row rowspace">
			<div class="col-xs-12 text-center">
				<h2>How it works</h2>
			</div>
		</div>
		<div class="row how-we-dream rowspace">
			<div class="col-sm-4 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/icon-buy.png" alt="" class="center-block">
				<h4>1) You Shop</h4>
				<p>You buy a Dream Bed. That&rsquo;s  it! With the sale of each Dream Bed you help provide dreams to people in need through our Buy One, Give One model.</p>
			</div>
			<div class="col-sm-4 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/icon-gift.png" alt="" class="center-block">
				<h4>2) We Donate</h4>
				<p>When you purchase a Dream Bed we give a bed to someone in need. Every Dream Bed sold provides someone an opportunity for a clean, comfortable and healthy sleep space.</p>
			</div>
			<div class="col-sm-4 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/icon-hand.png" alt="" class="center-block">
				<h4>3) Dream it forward</h4>
				<p>Our Dream Bed Team collaborates with numerous giving partners to determine where we can impact the dreams of others through products and services. Our strategy is simple: Buy a dream, give a dream, dream it forward!</p>
			</div>
		</div>
	</div>
	
	<div class="container-fluid giving-samples">
		<div class="row row-eq-height rowpadding">
			<div class="col-xs-6" style="background-image:url(<?php bloginfo("template_url"); ?>/images/photos/dream-it-fwd-mattress-delivery-van.jpg)">
				<a href="#" data-toggle="modal" data-target="#la-video"><img src="<?php bloginfo("template_url"); ?>/images/icon-videoplay.svg" class="center-block play-button" alt=""></a>
			</div>
			<div class="col-xs-6 light-grey-fill">
				<h4>100 BEDS DONATED IN LA</h4>
				<p>In August 2015 the Dream Bed Team went to Minneapolis, Minnesota to give back to the community at Sharing and Caring Hands/Mary Jo Copeland Shelter and Simpson Housing Services.</p>
				<p>Our team was able to donate over 50 mattress sets, cleaned housing areas and common spaces, and helped make sandwiches for  residents afterward.</p>
			</div>
		</div>
		<div class="row row-eq-height rowpadding">
			<div class="col-xs-6"></div>
			<div class="col-xs-6 dark-grey-fill">
				<h4>DREAM IT FORWARD IN MINNEAPOLIS</h4>
				<p>In August 2015 the Dream Bed Team went to Minneapolis, Minnesota to give back to the community at Sharing and Caring Hands/Mary Jo Copeland Shelter and Simpson Housing Services.</p>
				<p>Our team was able to donate over 50 mattress sets, cleaned housing areas and common spaces, and helped make sandwiches for residents afterward.</p>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row rowpadding">
			<div class="col-sm-12 text-center partners">
				<h2>Charitable Partners</h2>
				<p>Special thanks to our partners who help us give back.</p>
				<a href="http://www.sharingandcaringhands.org"><img src="<?php bloginfo("template_url"); ?>/images/logo-sharing-and-caring.png" alt="Sharing and Caring Hands"></a>
				<a href="http://www.simpsonhousing.org"><img src="<?php bloginfo("template_url"); ?>/images/logo-simpson.png" alt="Simpson Housing Services">
				<a href="http://http://www.path.org"><img src="<?php bloginfo("template_url"); ?>/images/logo-path.png" alt="PATH">
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

<script>
jQuery(document).ready(function($){
	
	$("#la-video").on('hidden.bs.modal', function (e) {
    $("#la-video iframe").attr("src", $("#la-video iframe").attr("src"));
		});
	
	});
	
</script>

</div>

<?php get_footer(); ?>
