JQuery(document).ready(function($) {
    var p = $("#photo-gallery-slider").portfolio({
    	showArrows: false,
    	loop: false,
    	logger: false,
    	height: '100%',
    	width: '100%'
    });
	  p.init();
	  $("#photo-gallery-slider").mousewheel(function(event, delta) {
      this.scrollLeft -= (delta * 30);
      event.preventDefault();
   });

});