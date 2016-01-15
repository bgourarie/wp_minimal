<?php
/* this is included by functions.php */
/* Adding pixels into the wp_header */

add_action( 'wp_head', 'homepage_pixel' );
add_action( 'wp_head', 'azcentral_allpage_pixel' );
add_action( 'wp_head', 'facebook_allpage_pixel' );
add_action( 'wp_footer', 'footer_pixels' );

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


