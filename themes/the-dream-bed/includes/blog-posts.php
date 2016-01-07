<?php

function get_related_posts($post_id){
	$tags = wp_get_post_tags($post_id);
	$tag_ids = array();
	foreach($tags as $tag){
		$tag_ids[] = $tag->term_id;
	}
	if ($tag_ids) {
		$args=array(
			'tag__in' => $tag_ids,
			'post__not_in' => array($post_id),
			'posts_per_page'=>4,
			'order_by'=>'rand',
			'caller_get_posts'=>1
		);
		$posts = get_posts($args);
?>
		<div class="blog-related-posts">
			<div class="blog-related-posts-header">
				You might also like...
			</div>
			<?php
			foreach($posts as $post){
				setup_postdata($post);
				$categories = get_the_category();	?>
				<div class="blog-related-teaser">
					<a href="<?php echo get_permalink($post->ID); ?>" title="<?php get_the_title($post->ID); ?>">
						<?php //see https://developer.wordpress.org/reference/functions/get_the_post_thumbnail/#comment-314 
							if(has_post_thumbnail($post->ID)){
								echo get_the_post_thumbnail($post->ID,'medium');
							}else{
								// put in a default/placeholder blog image?
							}
						?>
						<div class="blog-related-title">
							<?php echo get_the_title( $post->ID );?> >
						</div>
						<div class="blog-related-excerpt">
							<?php echo get_the_excerpt($post->ID); ?>
						</div>
					</a>
					<?php if ( ! empty( $categories ) ) {?>
						<a href="<?php echo get_category_link( $categories[0]->ID); ?>"  class="<?php echo esc_html( $categories[0]->name );?>">
						</a>
					<?php 	}  ?>
				</div>
				<?php wp_reset_postdata($post);
			} ?>
		</div>
	<?php }	
}

/*
	Returns the formatted category button for blog posts and pages.
*/
function get_category_button($cat_id) { ?>
	<a href="<?php echo get_category_link($cat_id); ?>"  class="<?php echo esc_html($cat_id);?>">
		<?php echo get_cat_name($cat_id);?>
	</a>
<?php }

function get_blog_header(){
	//we start with site title and search box:
	$blogpage = get_page_by_title('Blog');
	$categories = get_field('blog_categories','options');

	?>
	<div class="blog-header">
		<a href="<?php echo get_page_link($blogpage->ID);?>">
			<div class="blog-title">
				<?php echo get_field('blog_title','options');?>
			</div>
		</a>
		<div class="blog-search">
			<?php get_search_form( true ); ?>
		</div>
		<div class="blog-categories">
			<?php foreach($categories as $cat){ ?>
				<a href="<?php echo get_category_link( $cat ); ?>">
					<div class="<?php echo get_cat_name($cat);?>">
						<?php echo get_cat_name($cat);?>
					</div>
				</a>
			<?php } ?>
		</div>
	</div>
	<?php 
}
