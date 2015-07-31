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
<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<p class="site-description"><?php bloginfo( 'description' ); ?></p>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<ul class="header nav">
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => '' ) ); ?>

				<?php
				/* show cart link + quantity */
				global $woocommerce;
				$qty = $woocommerce->cart->get_cart_contents_count();
				$cart_url = $woocommerce->cart->get_cart_url();
				echo '<li><a href="'. $cart_url .'">Cart <span class="qty">'. $qty .'</span></a></li>';
				?>

				<li><a href="tel:888-888-8888">+1 888 888-8888</a></li>
			</ul>
		</nav><!-- #site-navigation -->
		<?php if(is_page(array('cart', 'checkout', 'order-received'))) { ?>
		<!-- cart breadcrumb menu -- use css to style this appropriately -->
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
