<?php 
$categories = get_the_category();	
$loadMoreCount+= 1; 
output_post_teaser($post);
if( $loadMoreCount % 4 == 0){
	echo '<div class="clearfix hidden-xs"></div>';
}if( $loadMoreCount % 2 == 0){
	echo '<div class="clearfix visible-xs"></div>';
}

?>