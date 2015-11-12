jQuery(document).ready(function($) {
    var p = $("#photo-gallery-slider").portfolio({
    	showArrows: false,
    	loop: false,
    	logger: false,
    	height: '100%',
    	width: '100%'
    });
	  p.init();
	  $("#photo-gallery-slider").on("mousewheel", function(event, delta) {
      if(delta){
        this.scrollLeft -= (delta * 30);
      }
      else{
        vertChange = event.originalEvent.deltaY;
        horChange = event.originalEvent.deltaX;
        if (Math.abs(vertChange)>Math.abs(horChange)){
          this.scrollLeft -= vertChange * (-3);
        }
        else{
          return;
        }
      }
      event.preventDefault();
   });

});