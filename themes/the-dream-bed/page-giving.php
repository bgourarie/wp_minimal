<?php get_header(); ?>

<div class="giving-page">

	<div class="container">
		<div class="row">
			<div class="col-sm-2 col-sm-offset-1">
				<img src="<?php bloginfo("template_url"); ?>/images/circle-dream-it-forward-buy-a-dream-give-a-dream.svg" width="238" height="238" alt="Dream It Forward - Buy a Dream, Give a Dream" class="img-responsive">
			</div>
			<div class="col-sm-8">
				<h2>When you purchase The Dream Bed, we give a bed to a child or a person in need.</h2>
				<p>A good night's sleep is the foundation for everything we do. It affects our health, happiness, success and ability to dream big. That's why we want to share the gift of sleep with everyone everywhere.</p>
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
		
		<?php endif; ?>
		
		<div class="row">
			<div class="col-sm-12 text-center">
			
				<?php the_content() ?>
				
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				
				
			</div>
		</div>
		<?php endwhile; // End of the loop. ?>
	
</div>

<div class="light-grey-fill">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h2>How we dream</h2>
			</div>
		</div>
		<div class="row how-we-dream">
			<div class="col-sm-4 text-center">
				<h2 class="callout-number">1</h2>
				<h3>Buy a dream</h3>
				<p>We believe access to a great night's sleep should be a universal right, and your purchase helps make it possible.</p>
				<p>With the sale of each Dream Bed, you help provide dreams to children or persons in need through our buy one give one program.</p>
			</div>
			<div class="col-sm-4 text-center">
				<h2 class="callout-number">2</h2>
				<h3>Give a dream</h3>
				<p>Your purchase makes a difference.  Every Dream Bed bought gives a person in need an opportunity for a clean, comfortable and  healthy sleep space.</p>
				<p>Better sleep heath means bigger dreams for everyone!</p>
			</div>
			<div class="col-sm-4 text-center">
				<h2 class="callout-number">3</h2>
				<h3>Dream it forward</h3>
				<p>Our Dream Bed Team collaborates with numerous giving partners to determine where we can impact the dreams of others through products and services.</p>
				<p>Our strategy is simple: Buy a dream, give a dream, dream it forward!</p>
			</div>
		</div>
		
	</div>
	
	
	

</div>

<?php get_footer(); ?>
