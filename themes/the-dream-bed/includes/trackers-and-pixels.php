<?php
/* this is included by functions.php */
/* Adding pixels into the wp_header */

add_action( 'wp_head', 'homepage_pixel' );
add_action( 'wp_head', 'azcentral_allpage_pixel' );
add_action( 'wp_head', 'facebook_allpage_pixel' );
add_action( 'wp_footer', 'footer_pixels' );
add_action( 'woocommerce_thankyou_', 'wc_jc_checkout_analytics', 10, 2);
add_action( 'woocommerce_thankyou_', 'thankyou_page_pixels' , 10, 2);

function footer_pixels(){
	?>
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
<?php
}

function facebook_allpage_pixel(){
?>
<div class= "pixel">
	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,document,'script','//connect.facebook.net/en_US/fbevents.js');fbq('init', '1698291743733423');fbq('track', "PageView");
	</script>
	<noscript>
		<img height="1" width="1" style="display:none"src="https://www.facebook.com/tr?id=1698291743733423&ev=PageView&noscript=1"/>
	</noscript><!-- End Facebook Pixel Code -->
</div>
<?php 
}

function azcentral_allpage_pixel(){
	?>
	<div class="pixel">
		<!-- Activity name for this tag: C1531_PHX_DreamBed_Homepage -->
		<!-- URL of the webpage where the tag will be placed: www.dreambed.com -->
		<script type='text/javascript'>
			var axel = Math.random()+"";
			var a = axel * 10000000000000;
			document.write('<img src="http://pubads.g.doubleclick.net/activity;xsp=90768;ord='+ a +'?" width="1" height="1" border="0">');
		</script>
		<noscript>
			<img src="http://pubads.g.doubleclick.net/activity;xsp=90768;ord=1?" width="1" height="1" border="0">
		</noscript>
	</div>
	<?php
}

function homepage_pixel() {
	$path=$_SERVER['REQUEST_URI'];
	// only on homepage (dreambed.com/)
	if($path != "/"){
		return;
	}
	?>
	<div class="pixel">
		<!-- Activity name for this tag: C1531_PHX_DreamBed_Homepage -->
		<!-- URL of the webpage where the tag will be placed: www.dreambed.com -->
		<script type='text/javascript'>
		var axel = Math.random()+"";
		var a = axel * 10000000000000;
		document.write('<img src="http://pubads.g.doubleclick.net/activity;xsp=90768;ord='+ a +'?" width="1" height="1" border="0">');
		</script>
		<noscript>
			<img src="http://pubads.g.doubleclick.net/activity;xsp=90768;ord=1?" width="1" height="1" border="0">
		</noscript>
	</div>
	<?php
}

/*
 Thank you page pixels..
*/

function thankyou_page_pixels(){ ?>


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
<img src="//pixel.quantserve.com/pixel/p-8bpqtreGSGR2k.gif?labels=_fp.channel.Dream+Bed,_fp.event.Dream+Bed+Purchase+Confirmation,_fp.pcat.INSERT+PRODUCT+CATEGORY&orderid=INSERT+ORDER+ID&revenue=INSERT+REVENUE" style="display: none;" border="0" height="1" width="1" alt="Quantcast"/>
</noscript>
<!-- End Quantcast tag -->

<img src="https://secure.fastclick.net/w/roitrack.cgi?aid=1000050420" width=1 height=1 border=0> 

<IMG SRC="http://pc1.yumenetworks.com/dynamic_rmpixel_8632.gif" BORDER=0 WIDTH=1 HEIGHT=1>

<!-- Google Code for Dream Bed Sale Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 942855359;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "OJYACPKNmWAQv6nLwQM";
var google_conversion_value = 0.00;
var google_conversion_currency = "USD";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/942855359/?value=0.00&amp;currency_code=USD&amp;label=OJYACPKNmWAQv6nLwQM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<!-- Conversion Pixel - MattressFirm_202810_Conversion - DO NOT MODIFY -->
<img src="https://secure.adnxs.com/px?id=607486&t=2" width="1" height="1" />
<!-- End of Conversion Pixel -->

<img src="https://ad.doubleclick.net/ddm/activity/src=5129006;type=invmedia;cat=jhno7y9p;ord=1?" width="1" height="1" />

<script>(function(w,d,t,r,u){var f,n,i;w[u]=w[u]||[],f=function(){var o={ti:"5062657"};o.q=w[u],w[u]=new UET(o),w[u].push("pageLoad")},n=d.createElement(t),n.src=r,n.async=1,n.onload=n.onreadystatechange=function(){var s=this.readyState;s&&s!=="loaded"&&s!=="complete"||(f(),n.onload=n.onreadystatechange=null)},i=d.getElementsByTagName(t)[0],i.parentNode.insertBefore(n,i)})(window,document,"script","//bat.bing.com/bat.js","uetq");</script><noscript><img src="//bat.bing.com/action/0?ti=5062657&Ver=2" height="0" width="0" style="display:none; visibility: hidden;" /></noscript>

<!-- END The Company Publisher Pixels Dream Bed Conversion -->
<?php
}


/**
 * Add GA Ecommerce Tracking Code to the Confirmation Page
 */
function wc_jc_checkout_analytics( $payment_method, $order_id ) {
	$order = new WC_Order( $order_id );
	if( current_user_can( 'edit_posts' ) ) {
	?>
		<!-- Google Analytics Ecommerce Tracking Code disabled for Admin and Editors -->	
	<?php 
	}else{
	?>
		<!-- Google Analytics Ecommerce Tracking Code -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-67306588-1', 'auto');

			ga('require', 'ecommerce');

			ga('ecommerce:addTransaction', {		
				'id': '<?php echo $order_id; ?>',          // Transaction ID. Required.				
				'affiliation': 'Dream Bed',   					// Affiliation or store name.			
				'revenue': '<?php echo $order->get_total(); ?>',        	// Grand Total.				
				'shipping': '<?php echo $order-> get_total_shipping(); ?>',     // Shipping.			
				'tax': '<?php echo $order-> get_total_tax(); ?>'             	// Tax.
			});

			<?php    
			$order_items = $order->get_items();	

			//loop through line items
        	foreach( $order_items as $item ) {
		
				//check if it's a variation or a simple product
				if($item['variation_id'] > 0){
					$variation = new WC_Product_Variation($item['variation_id']);
				?>
					ga('ecommerce:addItem', {
						'id': '<?php echo $order_id; ?>',        // Transaction ID. Required.
						'name': '<?php echo str_replace("'","",$item['name']); ?>',    	// Product name. Required.
						'sku': '<?php echo str_replace("'","",$variation->get_sku()); ?>',       // SKU/code.
						'category': '<?php echo str_replace("'","",strip_tags($variation->get_categories())); ?>',  // Category or variation.
						'price': '<?php echo $variation->get_price(); ?>',     // Unit price.
						'quantity': '<?php echo $item['qty']; ?>'  // Quantity.						
					});
				<?php
				}else{
					$product = new WC_Product($item['product_id']);
				?>
					ga('ecommerce:addItem', {
						'id': '<?php echo $order_id; ?>',        // Transaction ID. Required.
						'name': '<?php echo str_replace("'","",$item['name']); ?>',    	// Product name. Required.
						'sku': '<?php echo str_replace("'","",$product->get_sku()); ?>',       // SKU/code.
						'category': '<?php echo str_replace("'","",strip_tags($product->get_categories())); ?>',  // Category or variation.
						'price': '<?php echo $product->get_price(); ?>',     // Unit price.
						'quantity': '<?php echo $item['qty']; ?>'  // Quantity.						
					});
				<?php
				}
        	}
			?>

			ga('ecommerce:send');
			</script>
			<!-- End Google Analytics Ecommerce Tracking Code -->
	<?php	
	}
}
