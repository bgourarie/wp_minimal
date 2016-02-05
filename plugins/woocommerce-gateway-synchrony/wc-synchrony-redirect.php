<?php
/* 
* Handle postback response from Synchrony to validate and update order stuff
*
*
*/

if ( $_REQUEST && ( $_REQUEST['type'] ) && strlen($_REQUEST['order_id']) >= 5 ) {
	?>
	<form action='<?php print blog_url().'/wc-api/WC_Gateway_Synchrony'; ?>' method='post' name='frm'>
		<?php
			foreach ( $_REQUEST as $a => $b ) {
				echo "<input type='hidden' name='".htmlentities( $a )."' value='".htmlentities( $b )."'>";
			}
			header( 'HTTP/1.1 307 Temporary Redirect' );
		?>
		<noscript><input type="submit" value="Click here if you are not redirected."/></noscript>
	</form>
	<script language="JavaScript">
		document.frm.submit();
	</script>
	<?php
} else {
	echo 'Invalid response from Synchrony... Please contact the merchant to complete your order';
}