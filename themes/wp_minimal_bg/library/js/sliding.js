JQuery(document).ready(function($) {
    var p = $("#photo-gallery-slider").portfolio();
	  p.init();
	  var wrapper = document.querySelector('#inner-content');
	  horwheel(wrapper);
});