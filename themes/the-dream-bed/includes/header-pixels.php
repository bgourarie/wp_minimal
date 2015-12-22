<?php
/* this is included by functions.php */
/* Adding pixels into the wp_header */

add_action( 'wp_head', 'homepage_pixel' );
add_action( 'wp_head', 'azcentral_allpage_pixel' );
add_action( 'wp_head', 'facebook_allpage_pixel' );

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


