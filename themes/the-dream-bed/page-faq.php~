<?php get_header(); ?>


<?php
/* header text */
echo get_field('header');
?>

<hr>

<?php
/* find all categories in 'faq' custom post type - excludes built-in category #1 'uncategorized' */
$cat_args = array(
	'post_type' => 'faq',
	'hide_empty' => 0,
	'exclude' => 1,
	'orderby' => 'menu_order',
	'order' => 'ASC'
); 
$categories = get_categories($cat_args);

/* list each category */
echo '<ul class="faq categories">';
foreach($categories as $category) {
	echo '<li>';
	echo '<h2>' . $category->name . '</h2>';
/* loop through questions that match each category */

$args = array(
	'post_type' => 'faq',
	'category_name' => ''. $category->slug .'',
	'orderby' => 'menu_order',
	'order' => 'ASC'
);

$faq_query = new WP_Query($args);
if ($faq_query->have_posts()) {
	echo '<ol class="questions">';
	while ($faq_query->have_posts() ) {
		$faq_query->the_post();
		echo '<li class="question"><ul>
				<li>' . get_the_title() . '</li>
				<li>' . get_the_content() .'</li>
			  </ul></li>';
	}
	echo '</ol>';
} else {
// no posts found
}
wp_reset_postdata();
/* end question loop */
	echo "</li>";
}
echo "</ul>";
?>

<hr>

<h4><?php echo get_field('footer'); ?></h4>
<a href="tel:<?php echo get_field('support_phone'); ?>"><?php echo get_field('support_phone'); ?></a>
<a href="mailto:<?php echo get_field('support_email'); ?>"><?php echo get_field('support_email'); ?></a>




<?php get_footer(); ?>
