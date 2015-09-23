<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package The Dream Bed
 */

?>


	</div><!-- #content -->

	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2 col-sm-12"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo("template_url"); ?>/images/logo-the-dream-bed.svg" width="116" height="35" alt="The Dream Bed" class="footer-logo"></a></div>
				<div class="col-md-2 col-sm-2">
					<ul class="list-unstyled footer-nav">
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => false ) ); ?>
					</ul>
				</div>
				<div class="col-md-2 col-sm-10">
					<ul class="list-unstyled footer-social">
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/images/ico-instagram.svg" width="15" height="15" alt=""> Instagram</a></li>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/images/ico-pinterest.svg" width="15" height="15" alt=""> Pinterest</a></li>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/images/ico-twitter.svg" width="15" height="15" alt=""> Twitter</a></li>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/images/ico-facebook.svg" width="15" height="15" alt=""> Facebook</a></li>
						<li><a href="#"><img src="<?php bloginfo("template_url"); ?>/images/ico-youtube.svg" width="15" height="15" alt=""> YouTube</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="footer-contact">
						<h4>Customer Service</h4>
						<ul class="list-unstyled">
							<li><a href="tel:<?php echo get_field('phone_number', 'options'); ?>" class="phone"><?php echo get_field('phone_number', 'options'); ?></a><br>
								8am - 8pm CST 7 days a week</li>
							<li><a href="mailto:email@dreambed.com" class="email">email@dreambed.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="footer-newsletter">
						<h4>Newsletter Signup</h4>
						<form>
							<div class="input-group">
								<input type="text" class="form-control newsletter-email" placeholder="Your Email">
								<span class="input-group-btn">
									<button class="btn btn-dream" type="button">Sign Up</button>
								</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

<script src="<?php bloginfo("template_url"); ?>/js/bootstrap.min.js"></script> 
<script src="<?php bloginfo("template_url"); ?>/js/ie10-viewport-bug-workaround.js"></script>


</body>
</html>
