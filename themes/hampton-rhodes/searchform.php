<?php
// return the default search form, but add in some hidden fields if we're on particular pages.
// Sneaky!
	global $pagename;
	$is_blog =is_page('blog');
	$is_faq  =is_page('faq');
?>
<form role="search" method="get" id="searchform" class="searchform dreamsearchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<?php if($is_blog){ ?>
		<input type="hidden" value="post" name="post_type" id="post_type" />
	<?php } ?>
	<?php if($is_faq){ ?>
		<input type="hidden" value="faq" name="post_type" id="post_type" />
	<?php } ?>
	<div class="input-group stylish-input-group">
		<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
		<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" class="form-control" placeholder="Search <?php if($is_faq){ ?>FAQs<?php } ?><?php if($is_blog){ ?>the blog<?php } ?>" />
		<span class="input-group-addon">
			<button type="submit">
				<i class="fa fa-search"></i>
			</button>  
		</span>
		<input style="display: none;" type="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
	</div>
</form>