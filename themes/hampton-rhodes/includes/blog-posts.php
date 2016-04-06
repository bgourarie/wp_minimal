<?php

function output_post_teaser($post){
	$categories = get_the_category();	
	$urlstart = get_template_directory_uri();
	?>
	<div class="col-md-3 col-xs-6 text-center blog-other-teaser">
		<a href="<?php echo get_permalink($post->ID); ?>" title="<?php get_the_title($post->ID); ?>">
			<?php //see https://developer.wordpress.org/reference/functions/get_the_post_thumbnail/#comment-314 
			if(has_post_thumbnail($post->ID)){
				echo get_the_post_thumbnail($post->ID,'blog-thumbnail');
			}else{
				echo '<img src="'. $urlstart .'/images/blog-default-image.jpg" alt="">';
			}
			?>
		</a>
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
	<?php // add clearfix every 4 or 2 posts...
}

/*
	Returns the formatted category button for blog posts and pages.
*/
function get_category_button($cat_id) { ?>
	<a href="<?php echo get_category_link($cat_id); ?>" class="blogcat-<?php echo get_cat_name($cat_id);?> btn btn-primary btn-sm" role="button">
		<?php echo get_cat_name($cat_id);?>
	</a>
<?php }

function get_blog_header(){
	//we start with site title and search box:
	$blogpage = get_page_by_title('Blog');
	$categories = get_field('blog_categories','options');

	?>
	
	<div class="light-grey-shapes inner-shadow"><!-- ends after blog-featured -->
	
		<div class="container blog-header">
		<div class="row">
			<div class="col-sm-6 text-left">
			
				<p class="blog-title">
					<a href="<?php echo get_page_link($blogpage->ID);?>"><?php echo get_field('blog_title','options');?></a>
				</p>
			
			</div>
			
			<div class="col-sm-6 text-right">
				<div class="blog-search">
					<?php get_search_form( true ); ?>
				</div>
				
				<div class="blog-categories">
					
					<table class="navtable">
						<tr>
						
						<?php foreach($categories as $cat){ ?>
							<td class="bg-<?php echo get_cat_name($cat);?>"><a href="#jumpnav" class="toggle btn"><?php echo get_cat_name($cat);?></a></td>
						<?php } ?>
						
						</tr>
					</table>
					
					
				</div>
				
			</div>
			
		</div>
			
	</div>
	

	
	<div id="jumpnav" class="hidden">
		<div class="container-fluid navcolors">
			<div class="row">
			<?php foreach($categories as $cat){ ?>
				<div class="col-sm-4 bg-<?php echo get_cat_name($cat);?>"><a href="<?php echo get_category_link( $cat ); ?>"><?php echo get_cat_name($cat);?></a></div>
			<?php } ?>
			</div>
		</div>
	</div>

<script>
jQuery(document).ready(function($){

$(function () {

    $('.toggle').click(function (event) {
        event.preventDefault();
        var target = $(this).attr('href');
        $(target).toggleClass('hidden show');
    });

});

});
</script>	
	
	<?php 
}
