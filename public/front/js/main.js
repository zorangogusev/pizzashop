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
        $('.add-to-cart').attr("disabled", true);
        var div_with_data = $(this).parent().find('.index-page-product-size');
        var selected_option = div_with_data.find(":selected").text();
        var selected_product_id = div_with_data.find(":selected").attr('data-product-id');
        var selected_product_size = div_with_data.find(":selected").attr('data-product-size');
        var selected_product_name = div_with_data.find(":selected").attr('data-product-name');
        var selected_product_code = div_with_data.find(":selected").attr('data-product-code');
        var selected_product_quantity = 1;

        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: API_URL + 'addToCard',
            data: {
                // api_token: API_TOKEN,
                product_id: selected_product_id,
                product_size: selected_product_size,
                product_name: selected_product_name,
                product_code: selected_product_code,
                quantity: selected_product_quantity
            },
            beforeSend: function() {},
            success: function(response) {
                $('.message-from-cart-action').removeClass('display-none');
                $('.nav-bar-check-out-button').removeClass('display-none');
                $('.message-from-cart-action').addClass('background-success');
                setTimeout(function() { $('.message-from-cart-action').html(response.data.message); }, 300);
                setTimeout(function() { $('.header-cart-total').html(response.data.itemsInCart); }, 500);
                $('.add-to-cart').attr("disabled", false);

                setTimeout(function() {
                    $('.message-from-cart-action').addClass('display-none');
                    $('.message-from-cart-action').removeClass('background-success');
                }, 5000);
            },
            error: function(response) {
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
        var cart_id = $(this).attr('data-cart-id');
        var action = 'up';
        sendAjaxForCart(action, cart_id);
    });

    $('.cart_quantity_down').on('click', function() {
        var cart_id = $(this).attr('data-cart-id');
        var action = 'down';
        sendAjaxForCart(action, cart_id);
    });

    $('.cart_quantity_delete').on('click', function() {
        var cart_id = $(this).attr('data-cart-id');
        var action = 'delete';
        sendAjaxForCart(action, cart_id);
    });

    function sendAjaxForCart(action, cart_id) {
        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: API_URL + 'actionFromCartPage',
            data: {
                cart_id: cart_id,
                action: action
            },
            beforeSend: function() {},
            success: function() {
                window.location.reload(false);
            },
            error: function() {}
        });
    };
});


$(function() {
    $('#mobile').on('keyup', function() {
        console.log('here');
        var regex = /^(?:[1-9]\d*|0)?(?:\.\d+)?$/;
        var check_regex = regex.exec($(this).val());

        if (!check_regex) {
            console.log('not a number');
            $('#only-numbers-allowed').removeClass('display-none');
            $('.order-now-button').attr('disabled', true);
        } else {
            $('#only-numbers-allowed').addClass('display-none');
            $('.order-now-button').attr('disabled', false);
        }
    });
});

$(function() {
    $('#search').on('keyup', function(e) {
        console.log('here');
        if(e.which === 13){
            $(this).attr("disabled", "disabled");
            var input = $(this).val().toLowerCase();
            if($("#" + input).length == 0) {
                $("#no-product-with-that-name").removeClass('display-none');
            } else {
                document.getElementById(input).scrollIntoView({  block: 'center', behavior: 'smooth' });
                $("#" + input).addClass('display-pink-border');
                setTimeout(function() {
                    $("#" + input).removeClass('display-pink-border');
                }, 3000);
                $(this).val('');
                $("#no-product-with-that-name").addClass('display-none');
            }
            $(this).removeAttr("disabled");
        }
    });

    $('#search').on('focusout', function(e) {
        if($(this).val() == 0) {
            $("#no-product-with-that-name").addClass('display-none');
        }
    });
});

$(function() {
    $('.orders-page-view-order-details').on('click', function(e) {
        var order_id = $(this).attr('data-order-id');
        console.log('order_id is: ' + order_id);

        $.ajax({
            type: "GET",
            dataType: "JSON",
            url: API_URL + 'getOrderDetails',
            data: {
                order_id: order_id,
            },
            beforeSend: function() {},
            success: function(response) {
                $('#div-to-show-modal-with-order-products').html(response.data.modal_for_product);
                $('#showOrderDetails').modal('show');
            },
            error: function(response) {

            }
        });
    });
});

$(function() {
   $('#set-currency-button-euro, #set-currency-button-dollar').on('click', function() {
       var new_currency_name = $(this).attr('data-currency-name');
       var new_currency_sign = $(this).attr('data-currency-sign');
       var new_currency_ratio = $(this).attr('data-currency-ratio');

       $.ajax({
           type: "GET",
           dataType: "JSON",
           url: API_URL + 'changeCurrency',
           data: {
               name: new_currency_name,
               sign: new_currency_sign,
               ratio: new_currency_ratio
           },
           beforeSend: function() {},
           success: function(response) {
               window.location.reload(false);
           },
           error: function(response) {
           }
       });
   });
});
