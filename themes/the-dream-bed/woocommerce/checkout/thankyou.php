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

        <!-- begin extole script -->
			<script type="extole/widget">{
             "zone":"db_order_confirm",
              "params":{
               "f":"<?= $order->billing_first_name ?>",
               "l":"<?= $order->billing_last_name ?>",
               "e":"<?= $order->billing_email ?>"
			}}</script>

        <?php
            $coupons = $order->get_used_coupons();
            if (count($coupons)) {
            $coupon_code = $coupons[0];
        ?>
			<script type="extole/conversion">{
                 "type":"purchase",
                  "params":{
                   "f":"<?= $order->billing_first_name ?>",
                   "l":"<?= $order->billing_last_name ?>",
                   "e":"<?= $order->billing_email ?>",
                   "partner_conversion_id":"<?= $order->get_order_number() ?>",
                   "tag:cart_value":"<?= $order->order_total ?>",
                   "tag:coupon_code":"<?= $coupon_code ?>"
			}}</script>
        <?php } ?>

            <!-- end extole script -->
		</div>

</div>	

	<?php endif; ?>
<div class="text-center">

	<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
	<?php do_action( 'thankyou_pixels', $order->id ); ?>

</div>

<?php else : ?>

	<p><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	</div>
</div>

<?php endif; ?>
</div>