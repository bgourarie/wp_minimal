<?php
/*
 Template Name: Gallery with Password
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

			<div id="content">
							<?php if (have_posts()) : while (have_posts()) : the_post(); 

							if(is_password_required($post)){
								echo get_the_password_form();
							}


							else{?>


							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">


<?php									
				
						$args = array(
						    'numberposts' => -1, // Using -1 loads all posts
						    'orderby' => 'title', // This ensures images are in the order set in the page media manager
						    'order'=> 'ASC',
						    'post_mime_type' => 'image', // Make sure it doesn't pull other resources, like videos
						    'post_parent' => $post->ID, // Important part - ensures the associated images are loaded
						    'post_status' => null,
						    'post_type' => 'attachment'
						);
						$images = get_children( $args );
						if($images){ ?>
							<div id="photo-gallery-slider">
							    <?php foreach($images as $image){ ?>
							   			<img class="gallery-image" data-src="<?php echo $image->guid; ?>"/>
							    <?php    } ?>
						  </div>
						<?php }
								}
						<?php endwhile; else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the page-custom.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>

						</main>

				</div>

<?php get_footer(); ?>
