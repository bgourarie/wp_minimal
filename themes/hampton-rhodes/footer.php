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
	
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-2 col-xs-12">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo("template_url"); ?>/images/logo-the-dream-bed.svg" width="116" height="35" alt="The Dream Bed" class="footer-logo"></a>
			</div>
			<div class="col-md-2 col-xs-5">
				<ul class="list-unstyled footer-nav">
					<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => false ) ); ?>
					<li><script type="extole/widget">{"zone":"db_global_footer"}</script></li>
				</ul>
			</div>
			<div class="col-md-4 col-xs-6">
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
					<?php //gravity_form(1, false, false, false, '', true, 12); ?>
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
