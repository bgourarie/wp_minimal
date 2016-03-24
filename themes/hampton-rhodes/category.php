<?php
/**
* A Simple Category Template
*/
 
get_header(); 
get_blog_header(); 

?> 

<section id="primary" class="site-content">
<div class="blog-other-posts">
	<div class="container">
		<div class="row">

	<?php
	// get all posts for current category
	$cat = get_category( get_query_var( 'cat' ) );
	$published_posts = $cat->count;
	$args = array(
		'posts_per_page'   => 4,
		'offset'           => 0,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'category'          => $cat->cat_ID,
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$urlstart = get_template_directory_uri();
	$posts = get_posts($args);
	$i=0;
	$exclude_ids = array();
	foreach($posts as $post){
		setup_postdata($post);
		$exclude_ids[]= $post->ID;
		output_post_teaser($post);
		$i+=1;
		if($i%4 == 0 ){
			echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
		}if($i%2 == 0){
			echo '<div class="clearfix visible-xs-block visible-sm-block"></div>';
		}
		wp_reset_postdata($post);
	}
		?>
			</div>
			<?php 
			if($published_posts > sizeof($exclude_ids)){ 
				$skip_posts = implode(", ",$exclude_ids);
				$destroy = ceil(($published_posts - sizeof($exclude_ids)) / 4); 
				?> 
			
			<?php echo do_shortcode('[ajax_load_more post_type="post" category="'.$cat->slug.'" exclude="'.$skip_posts.'" posts_per_page="4" pause="true" scroll="false" transition="none" images_loaded="true" destroy_after="'.$destroy.'" button_label="Load More" container_type="div"]'); ?>
			
			
		<?php 
		}	?>
	</div>
</div>
</section>


<?php get_footer(); ?>