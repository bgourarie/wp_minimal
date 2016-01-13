

<?php get_header(); 
	get_blog_header();

	// get the posts, but for this, restrict to posts with the "featured" meta value -- that's the featured post. 
	$posts = get_posts(array('meta_key'=>'featured','meta_value'=>1, 'posts_per_page'=>1));
	foreach($posts as $feature){
		setup_postdata($feature);
		$categories = get_the_category($feature);
		$featured_id = $feature->ID;
?>

<div class="container blog-featured">
	<div class="row">
		<div class="col-md-10 col-sm-8 col-xs-12">
			<div class="blog-featured-hero" style="background-image: url('')"><a href="<?php echo get_permalink($featured_id); ?>" title="<?php echo get_the_title($featured_id); ?>"><?php echo get_the_post_thumbnail( $featured_id, "large" ); ?></a></div>
		</div>
		<div class="col-xs-10 col-xs-offset-1 blog-featured-text">
			<h3 class="blog-feature-title"><a href="<?php echo get_permalink($featured_id); ?>" title="<?php echo get_the_title($featured_id); ?>"><?php  echo get_the_title($featured_id); ?></a></h3>
			<p class="blog-feature-excerpt"><?php echo wp_trim_words(get_the_content($featured_id), 40, ' ...' ); ?></p>
			<p class="buttonize">
				<?php if ( ! empty( $categories ) ) { 
					get_category_button( $categories[0]->cat_ID);
					}  ?>
			</p>		
		</div>
	</div>
	
</div>
<div class="container-fluid what-else">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h2 class="blog-other-header">See what else is new...</h2>
		</div>
	</div>

</div><!-- /light-grey-shapes -->


<?php wp_reset_postdata();

} 
?>

<div class="blog-other-posts">
	<div class="container">
		<div class="row">

	<?php
	// get all posts in reverse chronological order, 16 per page. Exclude the featured one. 
	$args = array(
		'posts_per_page'   => 4,
		'offset'           => 0,
		'orderby'          => 'date',
		'order'            => 'DESC',
		'exclude'          => $featured_id,
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'suppress_filters' => true 
	);
	$urlstart = get_template_directory_uri();
	$posts = get_posts($args);
	$i=0;
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
		<! -- this div-row should only show if there's more posts to show -->
		<div class="row">
			<div class="col-sm-12 text-center">
							<?php echo do_shortcode('[ajax_load_more repeater="repeater2" posts_per_page="4" scroll="false" pause="true" transition="fade"  images_loaded="true" button_label="Load More"]'); ?>							
		</div>
	</div>
</div>

<?php get_footer(); ?>
