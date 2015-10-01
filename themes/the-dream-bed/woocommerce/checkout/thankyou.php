<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( $order ) : ?>

	<div class="row">
		<div class="col-sm-12">

	<?php if ( $order->has_status( 'failed' ) ) : ?>

		<p><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction.', 'woocommerce' ); ?></p>

		<p><?php
			if ( is_user_logged_in() )
				_e( 'Please attempt your purchase again or go to your account page.', 'woocommerce' );
			else
				_e( 'Please attempt your purchase again.', 'woocommerce' );
		?></p>

		<p>
			<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
			<?php if ( is_user_logged_in() ) : ?>
			<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My Account', 'woocommerce' ); ?></a>
			<?php endif; ?>
		</p>

	<?php else : ?>

<div class="text-center thanks-text">

		<h1><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Your order has been placed.', 'woocommerce' ), $order ); ?></h1>

		<p class="order-confirmation-text">You will receive an email confirmation shortly.<br />
			Don't hesitate to contact us with any questions!</p>
		
		<ul class="list-unstyled contact">
			<li><a href="mailto:help@dreambed.com" class="email">email@dreambed.com</a></li>
			<li><a href="tel:<?php echo get_field('phone_number', 'options'); ?>" class="phone"><?php echo get_field('phone_number', 'options'); ?></a></li>
		</ul>
		
		<p><a href="<?php bloginfo('url'); ?>/giving" class="btn btn-dream" role="button">See how your purchase helps</a></p>

		<div class="refer-thanks-page center-block">
<!-- begin extole script -- need to dynamically fill f:firtsname l:lastname e:email -->		
<script type="extole/widget">
     {"zone":"db_order_confirm"
      "params":{
       "f":"<?= $order->billing_first_name ?>",
       "l":"<?= $order->billing_last_name ?>",
       "e":"<?= $order->billing_email ?>"
       }
</script>		
<!-- end extole script -->
		</div>
		

</div>	

	<?php endif; ?>
<div class="text-center">

	<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>

</div>

<?php else : ?>

	<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	</div>
</div>

<?php endif; ?>
</div>

<!-- START The Company Publisher Pixels Dream Bed Conversion -->
<script type='text/javascript'>
var ebRand = Math.random()+'';
ebRand = ebRand * 1000000;
//<![CDATA[ 
document.write('<scr'+'ipt src="HTTPS://bs.serving-sys.com/Serving/ActivityServer.bs?cn=as&amp;ActivityID=684549&amp;rnd=' + ebRand + '"></scr' + 'ipt>');
//]]>
</script>
<noscript>
<img width="1" height="1" style="border:0" src="HTTPS://bs.serving-sys.com/Serving/ActivityServer.bs?cn=as&amp;ActivityID=684549&amp;ns=1"/>
</noscript>

<!-- Start Quantcast Tag -->
<script type="text/javascript"> 
var _qevents = _qevents || [];

(function() {
var elem = document.createElement('script');
elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://edge") + ".quantserve.com/quant.js";
elem.async = true;
elem.type = "text/javascript";
var scpt = document.getElementsByTagName('script')[0];
scpt.parentNode.insertBefore(elem, scpt);
})();

_qevents.push(
{qacct:"p-8bpqtreGSGR2k",labels:"_fp.channel.Dream Bed,_fp.event.Dream Bed Purchase Confirmation,_fp.pcat.INSERT+PRODUCT+CATEGORY", event:"refresh", orderid:"INSERT+ORDER+ID",revenue:"INSERT+REVENUE"}
);
</script>
<noscript>
<img src="//pixel.quantserve.com/pixel/p-8bpqtreGSGR2k.gif?labels=_fp.channel.Dream+Bed,_fp.event.Dream+Bed+Purchase+Confirmation,_fp.pcat.INSERT+PRODUCT+CATEGORY&orderid=INSERT+ORDER+ID&revenue=INSERT+REVENUE" style="display: none;" border="0" height="1" width="1" alt="Quantcast">
</noscript>
<!-- End Quantcast tag -->

<img src="https://secure.fastclick.net/w/roitrack.cgi?aid=1000050420" width="1" height="1" border="0"> 

<!-- END The Company Publisher Pixels Dream Bed Conversion -->