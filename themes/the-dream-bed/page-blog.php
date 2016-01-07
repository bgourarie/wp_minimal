<?php get_header(); 
	get_blog_header();

	// get the posts, but for this, restrict to posts with the "featured" meta value -- that's the featured post. 
	$posts = get_posts(array('meta_key'=>'featured','meta_value'=>1));
	foreach($posts as $feature){
		setup_postdata($feature);
		$categories = get_the_category();
		$featured_id = $feature->ID;
?>
<div class="blog-featured">
	<a href="<?php echo get_permalink($featured_id); ?>" title="<?php echo get_the_title($featured_id); ?>">
		<div class="blog-featured-hero">
		 <?php echo get_the_post_thumbnail( $featured_id, "large" ); ?> 
		</div>
		<div class="blog-feature-title">
			<?php  echo get_the_title($featured_id); ?> 
		</div>
		<div class="blog-feature-excerpt">
			<?php echo get_the_excerpt($featured_id);?>
		</div>
	</a>
	<?php if ( ! empty( $categories ) ) { ?>
		<a href="<?php echo get_category_link( $categories[0]->ID); ?>"  class="<?php echo esc_html( $categories[0]->name );?>">
		</a>
	<?php 	}  ?>
</div>
<?php wp_reset_postdata();

} 
?>

<div class="blog-other-posts">
	<div class="blog-other-header">
		See what else is new...
	</div>

	<?php
	// get all posts in reverse chronological order, 16 per page. Exclude the featured one. 
	$args = array(
		'posts_per_page'   => 16,
		'offset'           => 0,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'exclude'          => $featured_id,
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$posts = get_posts($args);
	foreach($posts as $post){
		setup_postdata($post);
		$categories = get_the_category();	?>

		<div class="blog-other-teaser">
			<a href="<?php echo get_permalink($post->ID); ?>" title="<?php get_the_title($post->ID); ?>">
				<?php //see https://developer.wordpress.org/reference/functions/get_the_post_thumbnail/#comment-314 
					if(has_post_thumbnail($post->ID)){
						echo get_the_post_thumbnail($post->ID,'medium');
					}else{
						// put in a default/placeholder blog image?
					}
				?>
				<div class="blog-other-title">
					<?php echo get_the_title( $post->ID );?> 
				</div>
				<div class="blog-other-excerpt">
					<?php echo get_the_excerpt($post->ID); ?>
				</div>
			</a>
			<?php if ( ! empty( $categories ) ) {?>
				<a href="<?php echo get_category_link( $categories[0]->ID); ?>"  class="<?php echo esc_html( $categories[0]->name );?>">
				</a>
			<?php 	}  ?>
		</div>
	<?php wp_reset_postdata($post);
	}
	?>
	<a href="load-more">
		Load More
	</a>
</div>

<?php get_footer(); ?>
