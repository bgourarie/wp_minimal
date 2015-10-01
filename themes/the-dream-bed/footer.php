<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package The Dream Bed
 */

?>


	</div><!-- #content -->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-xs-12"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php bloginfo("template_url"); ?>/images/logo-the-dream-bed.svg" width="116" height="35" alt="The Dream Bed" class="footer-logo"></a></div>
				<div class="col-md-2 col-xs-3 col-sm-3">
					<ul class="list-unstyled footer-nav">
						<?php wp_nav_menu( array( 'theme_location' => 'footer-menu', 'container' => false ) ); ?>
					</ul>
				</div>
				<div class="col-md-2 col-xs-9 col-sm-3">
					<ul class="list-unstyled footer-social">
						<li><a href="https://instagram.com/thedreambed/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/ico-instagram.svg" width="15" height="15" alt="Instagram"> Instagram</a></li>
						<li><a href="https://www.pinterest.com/thedreambed/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/ico-pinterest.svg" width="15" height="15" alt=""> Pinterest</a></li>
						<li><a href="https://twitter.com/thedreambed" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/ico-twitter.svg" width="15" height="15" alt="Twitter"> Twitter</a></li>
						<li><a href="https://facebook.com/thedreambed/" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/ico-facebook.svg" width="15" height="15" alt="Facebook"> Facebook</a></li>
						<li><a href="https://www.youtube.com/channel/UChw0QPCQZVobODpG1cjeiuQ" target="_blank"><img src="<?php bloginfo("template_url"); ?>/images/ico-youtube.svg" width="15" height="15" alt="YouTube"> YouTube</a></li>
					</ul>
				</div>
				<div class="col-md-3 col-xs-12 col-sm-6">
					<div class="footer-contact">
						<h4>Customer Service</h4>
						<ul class="list-unstyled">
							<li><a href="tel:<?php echo get_field('phone_number', 'options'); ?>" class="phone"><?php echo get_field('phone_number', 'options'); ?></a><br>
								8am - 8pm CST 7 days a week</li>
							<li><a href="mailto:email@dreambed.com" class="email">email@dreambed.com</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3 col-xs-12">
					<div class="footer-newsletter clearfix">
						<h4>Newsletter Signup</h4>
						<?php gravity_form(1, false, false, false, '', true, 12); ?>
					</div>
					<div class="footer-refer clearfix">
<script type="extole/widget">
	{"zone":db_global_footer"}
</script>
					</div>				
				</div>
			</div>
		</div>
<div id="tracking-pixels">		
<!-- START The Company Publisher Pixels Dream Bed All Pages -->
<!--  Quantcast Tag -->
<script>
    qcdata = {} || qcdata;
    (function() {
        var elem = document.createElement('script');
        elem.src = (document.location.protocol == "https:" ? "https://secure" : "http://pixel") + ".quantserve.com/aquant.js?a=p-8bpqtreGSGR2k";
        elem.async = true;
        elem.type = "text/javascript";
        var scpt = document.getElementsByTagName('script')[0];
        scpt.parentNode.insertBefore(elem, scpt);
    }());
    var qcdata = {
        qacct: 'p-8bpqtreGSGR2k',
        orderid: '',
        revenue: ''
    };
</script>
<noscript><img src="//pixel.quantserve.com/pixel/p-8bpqtreGSGR2k.gif?labels=_fp.event.Default" style="display: none;" border="0" height="1" width="1" alt="Quantcast"></noscript>
<!-- End Quantcast Tag -->
<img src="https://secure.fastclick.net/w/tre?ad_id=36039;evt=28711;cat1=39157;cat2=39158;rand=[CACHEBUSTER]" width="1" height="1" border="0">
<script type="text/javascript">
    (function() {
        var tagjs = document.createElement("script");
        var s = document.getElementsByTagName("script")[0];
        tagjs.async = true;
        tagjs.src = "//s.btstatic.com/tag.js#site=GZDVvNM";
        s.parentNode.insertBefore(tagjs, s);
    }());
</script>
<noscript>
  <iframe src="//s.thebrighttag.com/iframe?c=GZDVvNM" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>
<img src="http://pc1.yumenetworks.com/dynamic_rmpixel_8630.gif" width="1" height="1" border="0" alt="">
<!-- Facebook Pixel Code -->
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');
    fbq('init', '515395115293430');
    fbq('track', "PageView");
</script>
<noscript><img alt="" height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=515395115293430&ev=PageView&noscript=1"></noscript>
<!-- End Facebook Pixel Code -->
<!-- Google Code for Remarketing Tag -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 942855359;
    var google_custom_params = window.google_tag_params;
    var google_remarketing_only = true;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
<noscript><div style="display:inline;"><img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/942855359/?value=0&amp;guid=ON&amp;script=0"></div></noscript>
<!-- Segment Pixel - MattressFirm_202810_RT - DO NOT MODIFY -->
<img src="https://secure.adnxs.com/seg?add=3475059&t=2" width="1" height="1" alt="">
<!-- End of Segment Pixel -->
<!-- END The Company Publisher Pixels Dream Bed All Pages -->
</div>
	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

<script src="<?php bloginfo("template_url"); ?>/js/bootstrap.min.js"></script> 
<script src="<?php bloginfo("template_url"); ?>/js/ie10-viewport-bug-workaround.js"></script>
<script src="//tags.extole.com/1301851859/core.js"></script>

</body>
</html>
