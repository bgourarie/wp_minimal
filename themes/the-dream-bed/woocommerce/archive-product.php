<?php get_header(); ?>

<hr>

<h1>Everyone Deserves a Choice</h1>
<p>Dream Bed? Cool Gel Bed? See which one is right for you.

<hr>

<?php

$args = array(
	'post_type' => 'product',
//	'category_name' => 'mattress',
	'orderby' => 'name',
	'order' => 'DESC'
);

$product_query = new WP_Query($args);
if ($product_query->have_posts()) {
	echo '<ul class="products">';
	while ($product_query->have_posts() ) {
		$product_query->the_post();
		$title = get_the_title();
		$link = get_the_permalink();
		$content = get_the_content();
		$img_id = get_post_thumbnail_id();
		$img_url_array = wp_get_attachment_image_src($img_id, 'full', true);
		$img_url = $img_url_array[0];

		echo '<li class="product"><ul>
				<li>' . $title . '</li>
				<li>' . $content .'</li>
				<li><img src="' . $img_url .'"></li>
				<li class="features">';


/* get feature_ yes/no fields */
/* all feature names should start with feature_ */
$fields = get_fields();
if( $fields ) {
	foreach( $fields as $field_name => $value )	{
		$field = get_field_object($field_name, false, array('load_value' => false));
		if(substr($field_name, 0, 8) === "feature_") { 
			echo '<div>';
				echo $field_name;
				echo " - ";
				if ($value == 1) { echo "true"; } else { echo "false"; }
			echo '</div>';
		}
	}
}



echo "<hr>";


		echo '</li>
		<li><a href="'. $link .'">Shop '. $title .'</a>
		</ul></li>';
	}

/*
echo "<pre>";
print_r($product_query->posts);
echo "</pre>";
*/


	echo '</ul>';
} else {
// no posts found
}
wp_reset_postdata();

?>

<hr>

<?php get_footer(); ?>
