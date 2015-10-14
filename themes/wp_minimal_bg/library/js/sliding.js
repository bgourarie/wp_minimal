
var carousel;
jQuery(document).ready(function () {

    carousel = jQuery("ul");

    carousel.itemslide({

    }); //initialize itemslide

    jQuery(window).resize(function () {
        carousel.reload();
    }); //Recalculate width and center positions and sizes when window is resized
});