
const API_URL = location.protocol + "//" + window.location.hostname  + "/api/v1/";


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

$(function () {
    $('.index-page-product-size').on('change', function () {
        // console.log('index-page-product-size is changed ');
        var price = $(this).val();
        var div_for_price = $(this).parent().parent().children().next();
        var new_span_for_active_price = div_for_price.find(`[data-price='${price}']`);
        var old_span_for_active_price = div_for_price.find('.index-page-active-price');

        $(old_span_for_active_price).removeClass('index-page-active-price');
        $(new_span_for_active_price).addClass('index-page-active-price');
    });
});

$(function () {
    $('.add-to-cart').on('click', function() {
        // console.log('add-to-cart clicked');

        $('.add-to-cart').attr("disabled", true);

        var div_with_data = $(this).parent().find('.index-page-product-size');

        // console.log(div_with_data);
        var selected_option = div_with_data.find(":selected").text();
        var selected_product_id = div_with_data.find(":selected").attr('data-product-id');
        var selected_product_size = div_with_data.find(":selected").attr('data-product-size');
        var selected_product_name = div_with_data.find(":selected").attr('data-product-name');
        var selected_product_code = div_with_data.find(":selected").attr('data-product-code');
        var selected_product_price = div_with_data.find(":selected").val();
        var selected_product_quantity = 1;

        // console.log(selected_option);
        console.log(selected_product_id);
        console.log(selected_product_size);
        console.log(selected_product_price);
        console.log(selected_product_name);
        console.log(selected_product_code);

        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: API_URL + 'addToCard',
            data: {
                product_id: selected_product_id,
                product_size: selected_product_size,
                product_name: selected_product_name,
                product_code: selected_product_code,
                product_price: selected_product_price,
                quantity: selected_product_quantity
            },
            beforeSend: function() {

            },
            success: function(response) {
                console.log('success');
                console.log(response);
                console.log(response.data.message);

                $('.message-from-cart-action').removeClass('display-none');
                $('.message-from-cart-action').addClass('background-success');
                $('.message-from-cart-action').html(response.data.message);

                $('.add-to-cart').attr("disabled", false);

                setTimeout(function() {
                    $('.message-from-cart-action').addClass('display-none');
                    $('.message-from-cart-action').removeClass('background-success');
                }, 5000);


            },
            error: function(response) {
                console.log('error');
                console.log(response);
                console.log(response.data.message);

                $('.message-from-cart-action').removeClass('display-none');
                $('.message-from-cart-action').addClass('background-error');
                $('.message-from-cart-action').html(response.data.message);

                $('.add-to-cart').attr("disabled", false);

                setTimeout(function() {
                    $('.message-from-cart-action').addClass('display-none');
                    $('.message-from-cart-action').removeClass('background-error');
                }, 5000);

            }
        });
    });
});

$(function() {
    $('.cart_quantity_up').on('click', function() {
        console.log('cart_quantity_up pressed');
        var cart_id = $(this).attr('data-cart-id');
        console.log('Up cart_id is: ' + cart_id);

        var route =

        sendAjaxForCart();

    });

    $('.cart_quantity_down').on('click', function() {
        console.log('cart_quantity_down pressed');

        var cart_id = $(this).attr('data-cart-id');
        console.log('Down cart_id is: ' + cart_id);




    });

    $('.cart_quantity_delete').on('click', function() {
        console.log('cart_quantity_delete pressed');
        var cart_id = $(this).attr('data-cart-id');

        console.log('Delete cart_id is: ' + cart_id);




    });

    function sendAjaxForCart(route, cart_id) {
        console.log('sendAjaxForCart here');


        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: API_URL + route,
            data: {
                cart_id: cart_id
            },
            beforeSend: function() {

            },
            success: function(response) {
                console.log('success');
                console.log(response);
                console.log(response.data.message);

                $('.message-from-cart-action').removeClass('display-none');
                $('.message-from-cart-action').addClass('background-success');
                $('.message-from-cart-action').html(response.data.message);

                $('.add-to-cart').attr("disabled", false);

                setTimeout(function() {
                    $('.message-from-cart-action').addClass('display-none');
                    $('.message-from-cart-action').removeClass('background-success');
                }, 5000);


            },
            error: function(response) {
                console.log('error');
                console.log(response);
                console.log(response.data.message);

                $('.message-from-cart-action').removeClass('display-none');
                $('.message-from-cart-action').addClass('background-error');
                $('.message-from-cart-action').html(response.data.message);

                $('.add-to-cart').attr("disabled", false);

                setTimeout(function() {
                    $('.message-from-cart-action').addClass('display-none');
                    $('.message-from-cart-action').removeClass('background-error');
                }, 5000);

            }
        });


    };

});
