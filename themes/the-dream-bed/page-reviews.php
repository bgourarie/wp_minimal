<?php add_filter('acf/update_value', 'wp_kses_post', 10, 1); ?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

<hr>

<?php while ( have_posts() ) : the_post(); ?>

	<?php acf_form(array(
		'post_id' => 'new_post',
		'new_post' => array(
			'post_type' => 'review',
			'post_status' => 'pending'
		),
		'submit_value'		=> 'Submit Review'
	)); ?>

<?php endwhile; ?>

<hr>

<?php get_footer(); ?>
