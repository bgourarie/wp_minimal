<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package The Dream Bed
 */

get_header(); ?>

<div class="basic-page">
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php the_content() ?>
				
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

			<?php endwhile; // End of the loop. ?>

			</div>
		</div>
	</div>
	
</div>

<?php get_footer(); ?>
