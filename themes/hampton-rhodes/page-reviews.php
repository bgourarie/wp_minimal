<?php add_filter('acf/update_value', 'wp_kses_post', 10, 1); ?>
<?php acf_form_head(); ?>
<?php get_header(); ?>

<?php

/* defaults */
$original_bed = get_original_bed_id();
$cool_bed= get_cool_bed_id();
$original_pillow = get_original_pillow_id();
$cool_pillow = get_cool_pillow_id();
$prod_show = array($original_bed, $cool_bed, $original_pillow, $cool_pillow); /* show all products */
$sort_by = "meta_value_num"; /* sort by rating */
$sort_order = 'ASC'; /* sort ascending */

/* review sorting */
if(isset($_REQUEST['show_product'])) {
	$req_var = htmlspecialchars($_REQUEST["show_product"]);
	switch($req_var){
		case 'dreambed':
			$prod_show = array($original_bed);
			break;
		case 'coolgelbed':
			$prod_show = array($cool_bed);
			break;
		case 'originaldreampillow':
			$prod_show =  array($original_pillow);
			break;
		case 'cooldreampillow' :
			$prod_show = array($cool_pillow);
			break;
		default:
			break;
	}
}

if(isset($_REQUEST['sort'])) {
	if (htmlspecialchars($_REQUEST["sort_by"]) == "newest") {
		$sort_by = "date";
		$sort_order = "DESC";
	} elseif (htmlspecialchars($_REQUEST["sort"]) == "highest") {
		$sort_by = "meta_value_num"; /* sort by rating */
		$sort_order = "DESC"; 
	} elseif (htmlspecialchars($_REQUEST["sort"]) == "lowest") {
		$sort_by = "meta_value_num"; /* sort by rating */
		$sort_order = "ASC"; 
	} elseif (htmlspecialchars($_REQUEST["sort"]) == "oldest") {
		$sort_by = "date"; /* sort by rating */
		$sort_order = "ASC"; 
	}
}


/* query to get all ratings and build average rating */

// adding in pagination check
$args = array(
	'post_type' => 'review',
	'meta_query' => array(
		array(
			'key'     => 'product',
			'value'   => $prod_show,
		),
	),
	'orderby' => 'menu_order',
	'order' => 'ASC',
);
$review_query = new WP_Query($args);
if ($review_query->have_posts()) {
	$count = 0;
	while ($review_query->have_posts() ) {
		$review_query->the_post();
		$rating = get_field('rating');
		$ratings[] = $rating;
		$count++;
	}
}
wp_reset_postdata();
?>

<div class="container reviews-page">
<form action="<?php bloginfo('url'); ?>/reviews" method="post">
	<div class="row reviewtop">
		
		<div class="col-md-2 col-md-push-6">
			<div class="form-group">
				<label for="show_product">Product:</label>
				<select name="show_product" onchange="this.form.submit()" class="selectpicker form-control">
					<option <?php if(isset($_REQUEST['show_product']) && (htmlspecialchars($_REQUEST["show_product"])) == "dreambed"){ echo "selected"; } ?> value='dreambed'> Dream Bed </option>
					<option <?php if(isset($_REQUEST['show_product']) && (htmlspecialchars($_REQUEST["show_product"])) == "coolgelbed"){ echo "selected"; } ?> value='coolgelbed'> Cool Dream Bed </option>
					<option <?php if(isset($_REQUEST['show_product']) && (htmlspecialchars($_REQUEST["show_product"])) == "originaldreampillow"){ echo "selected"; } ?> value='originaldreampillow'> Original Dream Pillow </option>
					<option <?php if(isset($_REQUEST['show_product']) && (htmlspecialchars($_REQUEST["show_product"])) == "cooldreampillow"){ echo "selected"; } ?> value='cooldreampillow'> Cool Dream Pillow </option>
				</select>
			</div>
		</div>
		
		<div class="col-md-2 col-md-push-6">
			<div class="form-group">
				<label for="sort">Sort:</label>
				<select name="sort" onchange="this.form.submit()" class="selectpicker form-control">
					<option <?php if(isset($_REQUEST['sort']) && (htmlspecialchars($_REQUEST["sort"]) == "newest")) { echo "selected"; } ?>  value="newest">Newest</option>
					<option <?php if(isset($_REQUEST['sort']) && (htmlspecialchars($_REQUEST["sort"]) == "oldest")) { echo "selected"; } ?>  value="oldest">Oldest</option>
					<option <?php if(isset($_REQUEST['sort']) && (htmlspecialchars($_REQUEST["sort"]) == "highest")) { echo "selected"; } ?>  value="highest">Highest Rating</option>
					<option <?php if(isset($_REQUEST['sort']) && (htmlspecialchars($_REQUEST["sort"]) == "lowest")) { echo "selected"; } ?>  value="lowest">Lowest Rating</option>
				</select>
			</div>
		</div>
		
		<?php if(!$ratings){ // if we have no ratings, we must have had no posts... 
			?> 
		<?php } 
		else{
		?>
		<div class="col-md-4 col-md-pull-2 review-header">
			<h4>Average Rating  <small>(Based on <?php echo $count; ?> reviews)</small></span></h4>
                <div class="average-stars">
                <?php
                    $average_rating = round((calculate_average($ratings) * 2), 0) / 2;
                    // Loop and print a whole star for each step.
                    for ($i = 1; $i <= $average_rating; $i++) {
                        echo '<img src="' . get_bloginfo("template_url") . '/images/one-star.svg" />';
                    }
                    // If average rating is not a whole number, we need to print an additional half star after the loop.
                    if (strpos($average_rating, '.')){
                        echo '<img src="' . get_bloginfo("template_url") . '/images/half-star.svg" />';
                    }
                ?>
				
			</div>
		</div>
		<?php } ?>
		
		
	</div>
</form>	
		

<?php
/* main query for reviews listed below */
$paged = ( get_query_var( 'paged' ) ) ? absint(get_query_var( 'paged' )) : 1;
$reviews_per_page = 5;
$args = array(
	'posts_per_page' => $reviews_per_page,
	'paged' => $paged,
	'post_type' => 'review',
/* review posts can be ordered by 'menu_order' (manual ordering), date, or meta key for a field such as 'rating' or 'product' */
/* default should probably be menu_order (manual ordering) or by meta_key => rating, order => DESC so bad reviews aren't first */
	'meta_key' => 'rating',
	'orderby' => $sort_by,
/* use meta_query to filter to only certain products */
	'meta_query' => array(
		array(
			'key'     => 'product',
			'value'   => $prod_show,
		),
	),
	'order' => $sort_order
);

$review_query = new WP_Query($args);

if ($review_query->have_posts()) {
	echo '<!-- start reviews -->';
	while ($review_query->have_posts() ) {
		$review_query->the_post();
		$title = get_the_title();
		$content = get_the_content();
		$rating = ltrim(get_field('rating'),'0'); // trim any leading zeroes...
		$name = get_field('name');
		$photo = get_field('photo');
		$city = get_field('city');
		$state = get_field('state');
		$product = get_field('product');
		$size = get_field('size');
		$style = get_field('sleep_style');
		$date_format = "n-d-Y";
		$date = get_the_date($date_format);
		$turl = get_bloginfo('template_url');
// need to set everything based on $product id. 
    // Set product icon based on value of 'product'
    switch ($product){
    	case $original_bed:
    		$product_icon = "original";
    		$prod_photo = 'standard-review-original-dream.png';
    		break;
    	case $cool_bed:
    		$product_icon = "cool";
    		$prod_photo = 'standard-review-cool-dream.png';
    		break;
    	case $original_pillow:
    		$product_icon = "original";
    		$style = 'none';
    		$size = 'none';
    		$prod_photo = 'standard-review-original-pillow.png';
    		break;
    	case $cool_pillow:
    		$product_icon = "cool";
    		$style = 'none';
    		$size = 'none';
    		$prod_photo = 'standard-review-cool-pillow.png';
    		break;
    	default:
    		$prod_photo = 'error';

    }
    $photo = $turl . '/images/';
    $photo .= $prod_photo;

		echo "<div class='row one-review'>
				<div class='col-sm-8 col-sm-offset-2 review-personal-text'>
					<p class='stars'>
						<img src='$turl/images/$rating-stars.svg'>
					</p>
					<h4>$title</h4>
					<p class='the-review'>$content</p>
					<p class='reviewer'>
						$name, $city $state <br>
						$date
					</p>
					<p class='iconset'>
						";
						if($size != 'none')
							echo "
							<img src='$turl/images/ico-$size.svg'>";
						if($style != 'none')
							echo "
						<img src='$turl/images/ico-$style.svg'>";
						echo "
					</p>
			  	</div>
			  </div>";
	}
	echo '<!-- end reviews -->';
} else {

	?>
			<div class="row">
				<div class="reviews-empty col-md-8 col-md-offset-2 text-center">
					Sorry, we don't have any reviews yet. Would you like to <a data-toggle="collapse" href="#new-review-form" aria-expanded="false" aria-controls="new-review-form" style="text-decoration: underline;">write the first one</a>?
				</div>
			</div>
<?php // no reviews found
}
wp_reset_postdata();
?>

<div class="row">
	<div class="col-sm-12 col-md-offset-2 col-md-4 review-pagination">
		<p>	<?php 
			$page_args = array( 'prev_text' => '', 'next_text' => '');
			// output the page numbers onto the screen. 
			echo paginate_links( array(
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'total' => absint(ceil($count/$reviews_per_page)),
				'prev_next' => false,
				'show_all' => true,
			) ); ?>
	 	</p>
	</div>
	<div class="col-sm-12 col-md-4 review-add-button">
		<p><a class="btn btn-dream drop-shadow" role="button" data-toggle="collapse" href="#new-review-form" aria-expanded="false" aria-controls="new-review-form">Write a review</a></p>
	</div>
	<div class="col-sm-12 col-md-offset-2 col-md-8">
		<div class="collapse" id="new-review-form">
			<?php
			/* generate the review form for users to submit reviews directly to the custom post type for review */
			/* reviews will be submitted as 'pending' and require an editor or admin to publish */
			while ( have_posts()) {
				the_post();
			}
				acf_form(array(
					'post_id' => 'new_post',
					'new_post' => array(
						'post_type' => 'review',
						'post_status' => 'pending'
					),
					'submit_value' => 'Submit Review'
				));
			
			?>
			</div>
	</div>
</div>

<div class="row instagram-review-photos">
	<?php the_widget('null_instagram_widget','username=thedreambed&number=4'); ?>
</div>

</div>



<?php get_footer(); ?>