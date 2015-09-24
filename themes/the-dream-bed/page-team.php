<?php get_header(); ?>

<h1><?php echo get_field('header'); ?></h1>
<h2><?php echo get_field('sub_header'); ?></h2>
<img src="<?php echo get_field('header_image'); ?>">

<hr>

<?php if (have_rows('team_members')) { ?>
	<ul class="team list">
	<?php while (have_rows('team_members')) {
		the_row();
		$name = get_sub_field('name');
		$title = get_sub_field('title');
		$photo = get_sub_field('photo');
	?>
		<li class="member">
			<ul>
				<li><?php echo $name; ?></li>
				<li><?php echo $title; ?></li>
				<li><img src="<?php echo $photo; ?>"></li>
			</ul>
		</li>
	<?php } ?>
	</ul>
<?php } ?>

<hr>

<?php get_footer(); ?>