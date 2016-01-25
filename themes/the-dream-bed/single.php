<?php
/**
 * The template for displaying all single posts.
 *
 * @package The Dream Bed
 */

get_header(); 
get_blog_header();?>

	

		<?php while ( have_posts() ) : the_post(); ?>
				<div class="single post have posts">
				</div>
			<?php //get_template_part( 'template-parts/content', 'single' ); ?>
		<div class="container">	
			<div class="row">
				<div class="col-sm-12">
					<div class="blog-post-hero">
						<?php the_post_thumbnail("large");?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="blog-post-container">
			<div class="container">	
				<div class="row">
					<div class="col-md-9 col-sm-12">

						<?php //the_post_navigation(); ?>
						<?php // category button:			?>
						<?php	$categories = get_the_category();
						if ( ! empty( $categories ) ) { 
							get_category_button( $categories[0]->cat_ID);
						}  ?>
			
			
						<h2 class="blog-post-title">
							<?php // echo the title... can move the div out of the method call 
							  echo get_the_title(get_the_ID()); ?> 
						</h2>
						<?php // wdiget would go here ?>
			
						<div class="blog-post-content">
							<?php 
							// this does all the content. embedded images are reliant on the styling within the post.
							// a container can be put around this if needed. (probably a good idea...)
							echo get_the_content(); ?>
						</div>
						<?php // there's a way to write a widget.. i'll find it out. and destroy it. 
						//post_sharing_widget(get_the_ID()); ?>
			
					<?php 
						$args=array(
							//'tag__in' => $tag_ids,
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
									<?php if ( ! empty( $categories ) ) {
										get_category_button($categoires[0]->cat_ID);
									}  ?>
								</div>
								<?php wp_reset_postdata($post);
							} ?>
						</div>
				<?php endwhile; // End of the loop. ?>
			</div>
			<div class="col-md-3 col-sm-12">			
						<div class="share-posts">
							<h4>Share this article</h4>
							<div class="share-posts-box">
								<?php echo do_shortcode('[ssba]'); ?>
							</div>
						</div>
					
					</div>
				</div>
			</div>
		</div>



<?php get_footer(); ?>
