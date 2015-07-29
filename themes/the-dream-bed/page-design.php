<?php get_header(); ?>



<?php
if (have_posts()) {
	while (have_posts()) {
		the_post();
		the_title( '<h1>', '</h1>' );
		the_content();
	}
}
?>

<?php if (have_rows('design_tab')) { ?>
	<ul class="design list">
	<?php while (have_rows('design_tab')) {
		the_row(); 
		$bed = get_sub_field('bed');
		$features = get_sub_field('design_feature');
	?>
		<li class="bed"><?php echo $bed->post_title; ?>
			<ul class="features">
				<?php foreach( $features as $feature ) { ?>
	    		<li><?php print_r($feature); ?></li>
	    		<?php } ?>
			</ul>
		</li>
		<li class="button"><a href="<?php echo $bed->guid; ?>">Shop <?php echo $bed->post_title; ?></a></li>
	<?php } ?>
	</ul>
<?php } ?>




<?php get_footer(); ?>
