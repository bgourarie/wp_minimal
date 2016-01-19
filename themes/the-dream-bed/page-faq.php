<?php get_header(); ?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">

<?php
/* find all categories in 'faq' custom post type - excludes built-in category #1 'uncategorized' */
/* also excludes blog categories */
$blog_exclusions = get_field('blog_categories','options');
$blog_exclusions[] = 1; // also add the uncategorized thing...
$faq_exclusions = get_field('faq_product_categories','options');
$cat_args = array(
	'post_type' => 'faq',
	'hide_empty' => 0,
	'exclude' => array_merge($faq_exclusions,$blog_exclusions),	
	'orderby' => 'menu_order',
	'order' => 'ASC'
); 
$categories = get_categories($cat_args);

/* list each category */
echo '<ul class="nav nav-tabs" id="dreamfaqcat" role="tablist">';
foreach($categories as $category) {
	echo '<li role="presentation">';
	echo '<a href="#' . $category->slug . '" aria-controls="' . $category->slug . '" role="tab" data-toggle="tab">' . $category->name . '</a>';
	echo '</li>';

/* loop through questions that match each category */
	};
	echo '</ul>';
	echo '<div class="tab-content" id="dreamfaqcont">';
	foreach($categories as $category) {
		$subcats = array('child_of'=>$category->ID);
		$children = get_categories($subcats);
		if($children){
		echo '<div role="tabpanel" class="tab-pane fade" id="' . $category->slug . '">';

			foreach($children as $prod_cat){
				if($prod_cat->category_parent == $category->term_id){
					$args = array(
						'post_type' => 'faq',
						'category_name' => ''. $prod_cat->slug .'',
						'orderby' => 'menu_order',
						'order' => 'ASC'
					);
					$faq_prod_query = new WP_Query($args);
					if($faq_prod_query->have_posts()){
						
						echo '<div class="faq_subcategory">';
							
							echo $prod_cat->name;
					

						while ($faq_prod_query->have_posts() ) {
							$faq_prod_query->the_post();
							echo '<h3>' . get_the_title() . '</h3>
									<p>' . get_the_content() .'</p>
								';
						}
					 echo '</div>';	
					}
					else {
								// no posts found
					}
					wp_reset_postdata();
				}
		}
		echo '</div>';
	}else{
			$args = array(
				'post_type' => 'faq',
				'category_name' => ''. $category->slug .'',
				'orderby' => 'menu_order',
				'order' => 'ASC'
			);

			$faq_query = new WP_Query($args);
			if ($faq_query->have_posts()) {
				echo '<div role="tabpanel" class="tab-pane fade" id="' . $category->slug . '">';
				while ($faq_query->have_posts() ) {
					$faq_query->the_post();
					echo '<h3>' . get_the_title() . '</h3>
							<p>' . get_the_content() .'</p>
						';
				}
				echo '</div>';
			} else {
			// no posts found
			}
			wp_reset_postdata();
			/* end question loop */
		}
	}
?>

<script>
jQuery(document).ready(function($){
	$("#dreamfaqcat li:first").addClass("active");
	$("#dreamfaqcont .tab-pane:first").addClass("active");
	$("#dreamfaqcont .tab-pane:first").addClass("in")
	});
</script>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 text-center faq-footer">
			<h1><?php echo get_field('footer'); ?></h1>
			<ul class="list-unstyled">
				<li><a href="mailto:<?php echo get_field('support_email'); ?>" class="email"><?php echo get_field('support_email'); ?></a></li>
				<li><a href="tel:<?php echo get_field('support_phone'); ?>" class="phone"><?php echo get_field('support_phone'); ?></a></li>
			</ul>
		</div>
	</div>
</div>

<?php get_footer(); ?>
