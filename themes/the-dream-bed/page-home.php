<?php get_header(); ?>

<img src="<?php echo get_field('hero_image'); ?>">

<h1><?php echo get_field('header_text'); ?></h1>

<a href="<?php echo get_field('button_link') ?>"><?php echo get_field('button_text') ?></a>

<hr>

<h2>Reasons to Dream...</h2>

<?php if (have_rows('reasons_to_dream')) { ?>
	<ol class="reasons list">
	<?php while (have_rows('reasons_to_dream')) {
		the_row();
		$title = get_sub_field('reason_title');
		$desc = get_sub_field('reason_description');
		$btn_title = get_sub_field('reason_button_title');
		$link = get_sub_field('reason_link');
		$img = get_sub_field('reason_image');
	?>
		<li class="reason">
			<ul>
				<li><?php echo $title; ?></li>
				<li><?php echo $desc; ?></li>
				<li><a href="<?php echo $link; ?>"><?php echo $btn_title; ?></a></li>
				<li><img src="<?php echo $img; ?>"></li>
			</ul>
		</li>
	<?php } ?>
	</ol>
<?php } ?>

<hr>

<h2>When you buy a Dream, we give a Dream</h2>
<p>A bed that's both good for you and good for others!</p>

<hr>

<a class="button" href="<?php bloginfo('url'); ?>/reviews">Read customer reviews</a>

<a class="button" href="<?php bloginfo('url'); ?>/store-finder">Find a store near you</a>

<hr>

<?php get_footer(); ?>
