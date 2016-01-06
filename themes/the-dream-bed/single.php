<?php
/**
 * The template for displaying all single posts.
 *
 * @package The Dream Bed
 */

get_header(); 
get_blog_header();?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>
				<div class="single post have posts">
				</div>
			<?php //get_template_part( 'template-parts/content', 'single' ); ?>
			<div class="blog-post-hero">
				<?php the_post_thumbnail("large");?>
			</div>

			<?php //the_post_navigation(); ?>
			<?php // category button:			?>
			<?php	$categories = get_the_category();?>
			<?php 
			if ( ! empty( $categories ) ) { ?>
				<a href="<?php echo get_category_link( $categories[0]->ID); ?>"  class="<?php echo esc_html( $categories[0]->name );?>">
				</a>
			<?php 	}  ?>


			<div class="blog-post-title">
				<?php // echo the title... can move the div out of the method call 
				  echo get_the_title(get_the_ID()); ?> 
			</div>
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
			// need to write this, put it into incldues and ensure it gets include..d... ?

				get_related_posts(get_the_ID());
			?>


		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php get_footer(); ?>
