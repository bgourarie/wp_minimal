<?php
/**
 * The template for displaying search results pages.
 *
 * @package The Dream Bed
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			
			<div class="container">	
		
			<?php if ( have_posts() ) : ?>
			
				<div class="row">
			
					<header class="page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'the-dream-bed' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->
		
					<?php /* Start the Loop */ ?>
					
					<?php while ( have_posts() ) : the_post(); ?>
						<div class="search-result">
						
						
						
						<h3>
							<a href="<?php echo get_permalink($post->ID); ?>" title="<?php get_the_title($post->ID); ?>">
								<?php echo get_the_title(get_the_ID()); ?> 
							</a>
						</h3>
						<p>
							<?php echo wp_trim_words(get_the_content($post->ID), 80, '...' ); ?>
						</p>
						
						<p>
							<a href="<?php echo get_permalink($post->ID); ?>" title="<?php get_the_title($post->ID); ?>" class="btn btn-dream" role="button">
								Read more
							</a>
						</p>
						
						</div>
					<?php endwhile; ?>
					
					<?php the_posts_navigation(array('prev_text'=>"Older Results",'next_text'=>"Newer Results")); ?>

				</div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>


			</div>

		</main><!-- #main -->
	</section><!-- #primary -->


<?php get_footer(); ?>
