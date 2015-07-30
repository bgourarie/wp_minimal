<?php get_header(); ?>

<img src="<?php echo get_field('hero_image'); ?>">
<h1><?php echo get_field('header_text'); ?></h1>
<p><?php echo get_field('header_subtext'); ?></p>

<hr>

<?php if (have_rows('selling_points')) { ?>
	<ol class="selling points list">
	<?php while (have_rows('selling_points')) {
		the_row();
		$title = get_sub_field('header');
		$desc = get_sub_field('description');
		$icon = get_sub_field('icon');
	?>
		<li class="point">
			<ul>
				<li><?php echo $title; ?></li>
				<li><?php echo $desc; ?></li>
				<li><img src="<?php echo $icon; ?>"></li>
			</ul>
		</li>
	<?php } ?>
	</ol>
<?php } ?>

<hr>

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

<hr>



<?php get_footer(); ?>
