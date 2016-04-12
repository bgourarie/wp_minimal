<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Hampton And Rhodes
 */

?>


	</div><!-- #content -->
<div class="find-a-store">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h2><i class="fa fa-map-marker" aria-hidden="true"></i> Find a Store</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 text-center">
				<img src="<?php bloginfo("template_url"); ?>/images/logo-mattress-firm.png" class="logo" alt="Mattress Firm">
				<img src="<?php bloginfo("template_url"); ?>/images/logo-sleep-train.png" class="logo" alt="Mattress Firm">
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 text-center">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="ZIP code or City, State">
					<span class="input-group-btn">
						<button class="btn btn-primary" type="button">Search</button>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<footer class="footer">
	<div class="container hidden-xs our-guarantees">
		<div class="row">
			<div class="col-sm-4">
				<div class="vertical-align">
					<div class="gicon"><img src="<?php bloginfo("template_url"); ?>/images/icon-100percent.png" alt="Happiness guarantee"></div>
					<div class="text">Happy or your money back<br>Comfort, Service and Price</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="vertical-align center-block">
					<div class="gicon"><img src="<?php bloginfo("template_url"); ?>/images/icon-dollarsign.png" alt="Low price guarantee"></div>
					<div class="text">Our Low price Guarantee<br> We'll beat any competitor's price</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="vertical-align pull-right">
					<div class="gicon"><img src="<?php bloginfo("template_url"); ?>/images/icon-trucker.png" alt="Delivery guarantee"></div>
					<div class="text">Delivery Guarantee<br>Guaranteed on time</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-xs-12">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo("template_url"); ?>/images/hampton-rhodes-logo.svg" alt="Hampton & Rhodes" class="footer-logo"></a>
			</div>
			<div class="col-md-2 col-xs-5">
				<ul class="list-unstyled footer-nav">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => false ) ); ?>
					<li><script type="extole/widget">{"zone":"db_global_footer"}</script></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-6">
				<div class="footer-contact">
					<h4>Customer Service</h4>
					<ul class="list-unstyled">
						<li><a href="tel:<?php echo get_field('phone_number', 'options'); ?>" class="phone"><?php echo get_field('phone_number', 'options'); ?></a><br>
							8am - 8pm CST 7 days a week</li>
						<li><a href="mailto:support@hamptonrhodes.com" class="email">support@hamptonrhodes.com</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-4 col-xs-12">
				<div class="footer-newsletter clearfix">
					<h4>Newsletter Signup</h4>
					<?php gravity_form(2, false, false, false, '', true, 12); ?>
				</div>
				<div class="footer-social">
					<div><a href="https://instagram.com/hamptonrhodes/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/ico-instagram.svg" alt="Instagram"></a></div>
					<div><a href="https://www.pinterest.com/hamptonrhodes/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/ico-pinterest.svg" alt=""></a></div>
					<div><a href="https://twitter.com/hamptonrhodes" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/ico-twitter.svg" alt="Twitter"></a></div>
					<div><a href="https://facebook.com/hamptonrhodes/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/ico-facebook.svg" alt="Facebook"></a></div>
					<div><a href="https://www.youtube.com/channel/UChw0QPCQZVobODpG1cjeiuQ" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/ico-youtube.svg" alt="YouTube"></a></div>
				</div>
			</div>
		</div>
	</div>
</footer>

</div><!-- #page -->

<!-- <div class="call-us-now visible-xs"><a href="tel:<?php echo get_field('phone_number', 'options'); ?>" class="phone"><i class="fa fa-phone"></i> Call Us Now</a></div> -->

<?php wp_footer(); ?>

<script src="<?php bloginfo("template_url"); ?>/js/bootstrap.min.js"></script> 
<script src="<?php bloginfo("template_url"); ?>/js/ie10-viewport-bug-workaround.js"></script>
<script src="//tags.extole.com/1301851859/core.js"></script>

</body>
</html>
