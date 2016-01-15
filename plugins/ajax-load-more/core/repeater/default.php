<?php 
$categories = get_the_category();	
if($loadMoreCount%4 == 0){
	echo '<div class="clearfix hidden-xs"></div>';
}elseif($loadMoreCount%2 == 0 ){
	echo '<div class="clearfix visible-xs"></div>';
}
$loadMoreCount+= 1; 
?>

<div class="col-md-3 col-xs-6 text-center blog-other-teaser">
		<a href="<?php echo get_permalink($post->ID); ?>" title="<?php get_the_title($post->ID); ?>">
			<?php //see https://developer.wordpress.org/reference/functions/get_the_post_thumbnail/#comment-314 
				if(has_post_thumbnail($post->ID)){
					echo get_the_post_thumbnail($post->ID,'blog-thumbnail');
				}else{
					echo '<img src="'. get_template_directory_uri() .'/images/blog-default-image.jpg" alt="">';
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
</div>