<?php get_header(); ?>

<div class="giving-page">

	<div class="container">
		<div class="row">
			<div class="col-sm-2 col-sm-offset-1">
				<img src="<?php bloginfo("template_url"); ?>/images/circle-dream-it-forward-buy-a-dream-give-a-dream.svg" width="238" height="238" alt="Dream It Forward - Buy a Dream, Give a Dream" class="img-responsive">
			</div>
			<div class="col-sm-8">
				<h2>When you purchase The Dream Bed, we give a bed to a child or a person in need.</h2>
				<p>A good night's sleep is the foundation for everything we do. It affects our health, happiness, success and ability to dream big. That's why we want to share the gift of sleep with everyoneeverywhere.</p>
			</div>
		</div>
		
		<?php while ( have_posts() ) : the_post(); ?>

				
		<?php if (has_post_thumbnail( $post->ID ) ): ?>
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
  
  				<img src="<?php echo $image[0]; ?>" class="img-responsive center-block">

  			</div>

			</div>
		</div>
		<?php endif; ?>
		
		<div class="row">
			<div class="col-sm-12 text-center">
			
				<?php the_content() ?>
				
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				
				
			</div>
		</div>
		
		<?php endwhile; // End of the loop. ?>
		
	</div>
	
	
	

</div>

<?php get_footer(); ?>
