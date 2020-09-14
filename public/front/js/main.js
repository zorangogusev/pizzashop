/*scroll to top*/

$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay

		});
	});
});

$('.index-page-product-size').on('change', function () {
    console.log('index-page-product-size is changed ');
    var price = $(this).val();
    var div_for_price = $(this).parent().parent().children().next();

    console.log(div_for_price);
    console.log(price);

    var new_span_for_active_price = div_for_price.find(`[data-price='${price}']`);
    var old_span_for_active_price = div_for_price.find('.index-page-active-price');

    console.log(new_span_for_active_price);

    $(old_span_for_active_price).removeClass('index-page-active-price');
    $(new_span_for_active_price).addClass('index-page-active-price');

});

