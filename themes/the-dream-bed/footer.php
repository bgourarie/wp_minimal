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

	<footer id="colophon" class="site-footer" role="contentinfo">
		<ul class="footer nav">
			<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => false ) ); ?>
		</ul>
		<div class="dreambeds sold">
			<p>Dreambeds Donated: <?php echo get_field('dreambeds_donated', 'options'); ?></p>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
