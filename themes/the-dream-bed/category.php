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
		$categories = get_the_category();	
		// add clearfix every 4 or 2 posts...
		if($i%4 == 0){
			echo '<div class="clearfix hidden-xs"></div>';
		}elseif($i%2 == 0 ){
			echo '<div class="clearfix visible-xs"></div>';
		}
		$i+=1;
		$exclude_ids[]= $post->ID;
		?>

		<div class="col-md-3 col-xs-6 text-center blog-other-teaser">
			<a href="<?php echo get_permalink($post->ID); ?>" title="<?php get_the_title($post->ID); ?>">
				<?php //see https://developer.wordpress.org/reference/functions/get_the_post_thumbnail/#comment-314 
					if(has_post_thumbnail($post->ID)){
						echo get_the_post_thumbnail($post->ID,'blog-thumbnail');
					}else{
						echo '<img src="'. $urlstart .'/images/blog-default-image.jpg" alt="">';
					}
				?></a>
				<h4 class="blog-other-title">
					<a href="<?php echo get_permalink($post->ID); ?>" title="<?php get_the_title($post->ID); ?>"><?php echo get_the_title( $post->ID );?></a>
				</h4>
				<p class="blog-other-excerpt">		
					<?php echo wp_trim_words(get_the_content($post->ID), 20, '...' ); ?>
				</p>
			
			<?php if ( ! empty( $categories ) ) {
				get_category_button( $categories[0]->cat_ID);
			 	}  ?>
			</div>
		<?php wp_reset_postdata($post);
		}
		?>
			</div>
			<?php 
			if($published_posts > sizeof($exclude_ids)){ 
				$skip_posts = implode(", ",$exclude_ids);
				$destroy = ceil(($published_posts - sizeof($exclude_ids)) / 4); 
				?> 
			<div class="row">
				<div class="col-sm-12 text-center">
			<?php echo do_shortcode('[ajax_load_more post_type="post" category="'.$cat->slug.'" exclude="'.$skip_posts.'" posts_per_page="4" pause="true" scroll="false" transition="none" images_loaded="true" destroy_after="'.$destroy.'" button_label="Load More" container_type="div"]'); ?>
			</div>
		</div>
		<?php 
		}	?>
	</div>
</div>
</section>


<?php get_footer(); ?>