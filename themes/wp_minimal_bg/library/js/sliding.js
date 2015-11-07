jQuery(document).ready(function($) {
    var p = $("#photo-gallery-slider").portfolio({
    	showArrows: false,
    	loop: false,
    	logger: false,
    	height: '100%',
    	width: '100%'
    });
	  p.init();
  	scrollConverter.activate();


});