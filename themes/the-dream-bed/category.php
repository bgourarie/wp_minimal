<?php
/**
* A Simple Category Template
*/

get_header(); 
get_blog_header(); 
?> 

<section id="primary" class="site-content">
<div id="content" role="main">

<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>

<header class="archive-header">
<h1 class="archive-title"> <?php single_cat_title( '', false ); ?></h1>

</header>

<?php

// The Loop
while ( have_posts() ) : the_post(); ?>
<div class="blog-cat-posts">
	<div class="blog-cat-post-image">
		<?php echo get_the_post_thumbnail("medium");?>
	</div>
	<div class="blog-cat-post-title">
		<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
			<?php the_title(); ?>
		</a>
	</div>
	<div class="blog-cat-post-excerpt">
	<?php the_excerpt(); ?>
	</div>
</div>
<?php endwhile; 

else: ?>
<p>Sorry, no posts matched your criteria.</p>


<?php endif; ?>
</div>
</section>


<?php get_footer(); ?>