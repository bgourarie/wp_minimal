<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package The Dream Bed
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php wp_head(); ?>

<link href="<?php bloginfo("template_url"); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php bloginfo("template_url"); ?>/css/custom.css" rel="stylesheet">
<link href="<?php bloginfo("template_url"); ?>/css/shop.css" rel="stylesheet">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				</div>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo("template_url"); ?>/images/logo-the-dream-bed.svg" width="116" height="35" alt="The Dream Bed"></a>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-left">
						<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => '' ) ); ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php wp_nav_menu( array( 'theme_location' => 'header-right', 'container' => '' ) ); ?>
						
						<?php
						/* show cart link + quantity */
						global $woocommerce;
						$qty = $woocommerce->cart->get_cart_contents_count();
						$cart_url = $woocommerce->cart->get_cart_url();
						echo '<li><a href="'. $cart_url .'">Cart <span class="qty badge">'. $qty .'</span></a></li>';
						?>
						
						<li><a href="tel:<?php echo get_field('phone_number', 'options'); ?>" class="phone"><?php echo get_field('phone_number', 'options'); ?></a></li>
					</ul>
				</div>
			</div>
		</nav><!-- #site-navigation -->
		
		<?php if(is_page(array('cart', 'checkout', 'order-received'))) { ?>
		<!-- cart breadcrumb menu - use css to style this appropriately -->
		<nav id="checkout-breadcrumbs" role="navigation">
			<ul class="shop breadcrumb menu">
				<li<?php if(is_page('cart')) { echo ' class="active"'; } ?>><a href="<?php echo bloginfo('url'); ?>/cart">Cart</a></li>
				<li<?php if(is_page('checkout')) { echo ' class="active"'; } ?>><a href="<?php echo bloginfo('url'); ?>/checkout">Checkout</a></li>
				<li<?php if(is_page('order-received')) { echo ' class="active"'; } ?>>Thank You!</li>
			</ul>
		</nav>
		<?php } ?>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
	
	<?php
		$slides = get_field('slides');
		if($slides) {
			if(count($slides) == 1) {
				/* single image/hero text */
				echo '<div class="jumbotron" style="background-image: url(' . $slides[0][image][url] . ');"><div class="container"><div class="row"><div class="col-sm-8 col-sm-offset-2 col-xs-12">';
				//echo '<img src="' . $slides[0][image][url] . '" />';
				echo '<h1>' . $slides[0][headline] . '</h1>';
				echo '<p>' . $slides[0][subhead] . '</p>';
				echo '</div></div></div></div>';
				
			} else {
				/* multiple / slideshow */
				echo '
				
<div id="carousel-dream-page" class="carousel slide" data-ride="carousel">				
	<ol class="carousel-indicators">
		<!-- placeholder need to figure out how to gen these automatically -->
		<li data-target="#carousel-dream-page" data-slide-to="0"></li>
		<li data-target="#carousel-dream-page" data-slide-to="1"></li>
	</ol>
	<div class="carousel-inner" role="listbox">
				';
				
				foreach($slides as $slide) {
					$image = $slide['image'];
					$headline = $slide['headline'];
					$subhead = $slide['subhead'];
					?>
						<div class="item">
							<div style="background-image:url(<?php echo $image['url']; ?>);" class="slider-size">
								<div class="carousel-caption">
									<div class="container">
										<div class="row">
											<div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">
					
												<h1><?php echo $headline; ?></h1>
												<h2><?php echo $subhead; ?></h2>
									
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php
				}
				
				echo '
	</div>
</div>			
<script>
jQuery(document).ready(function($){
	$("#carousel-dream-page .carousel-indicators li:first").addClass("active");
	$("#carousel-dream-page .carousel-inner .item:first").addClass("active");
	$("#carousel-dream-page").carousel({
		interval: 8000
		})
	});
</script>
				
				';
			}
		}
		
	?>
	
	
