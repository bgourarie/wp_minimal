<?php
/**
 * Single Product Thumbnails
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();

if ( $attachment_ids ) {
	$loop 		= 0;
	$columns 	= apply_filters( 'woocommerce_product_thumbnails_columns', 3 );
	?>
	<div id="product-slider" class="carousel slide" data-ride="carousel">

		<ol class="carousel-indicators">
			<?php $slide = 0;
			foreach ( $attachment_ids as $attachment_id ) { ?>
				<li data-target="#product-slider" data-slide-to="<?php echo $slide; ?>" class="<?php echo ($slide == 0 ? 'active' : ''); ?>"></li>
			<?php $slide++;
			} ?>
		</ol>

		<div class="carousel-inner" role="listbox"><?php

			foreach ( $attachment_ids as $attachment_id ) { ?>

				<div class="item"><?php

					$classes = array( 'zoom' );

					if ( $loop == 0 )
						$classes[] = 'first active';

					if ( ( $loop + 1 ) % $columns == 0 )
						$classes[] = 'last';

					$image_link = wp_get_attachment_url( $attachment_id );

					if ( ! $image_link )
						continue;

					$image_title 	= esc_attr( get_the_title( $attachment_id ) );
					$image_caption 	= esc_attr( get_post_field( 'post_excerpt', $attachment_id ) );

					$image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'full' ), 0, $attr = array(
						'title'	=> $image_title,
						'alt'	=> $image_title
						) );

					$image_class = esc_attr( implode( ' ', $classes ) );

					echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<a href="%s" class="%s" title="%s" data-rel="prettyPhoto[product-gallery]">%s</a>', $image_link, $image_class, $image_caption, $image ), $attachment_id, $post->ID, $image_class );

					$loop++; ?>

				</div><?php
			} ?>

		</div>
	</div>
	<?php
} ?>

<script type="text/javascript">
	jQuery(document).ready(function($){
		var $slider = $("#product-slider");
		$slider.carousel({
			interval: 8000
		});
		$slider.find('.item:first').addClass('active');

		$productOptions = $('.tm-extra-product-options-variations > li > label');
		$productOptions.on('click', function() {
			$productOptions.parent().removeClass('active');
			$(this).parent().addClass('active');
		});
	});
</script>
