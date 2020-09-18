@extends('front.layouts.master')
@section('title','Order Page')
@section('content')
    <style>
        .red-asterix::before {
            content: '* ';
            color: #F00;
            font-weight: bold;
            font-size: 14px;
        }
    </style>

    <div class="container">
        <div class="row">
            <form action="{{ url('/order-now') }}" method="post" class="form-horizontal">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-sm-12">
                    <div class="signup-form"><!--sign up form-->
                        <legend>Delivery Address</legend>
                        <div class="row">
                            <div class="col-md-5" >
                                <div class="form-group">
                                    <label class="red-asterix" for="name">Name: </label>
                                    <input type="text" class="form-control" name="delivery_data[name]" id="name" value="{{ Auth::user()->name }}" placeholder="Delivery Name" required>
                                </div>


                                <div class="form-group">
                                    <label class="red-asterix" for="address">Address: </label>
                                    <input type="text" class="form-control" value="" name="delivery_data[address]" id="address" placeholder="Delivery Address" required>
                                </div>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="red-asterix" for="city">City: </label>
                                    <input type="text" class="form-control" name="delivery_data[city]" value="" id="city" placeholder="Delivery City" required>
                                </div>
                                <div class="form-group">
                                    <label class="red-asterix" for="mobile">Mobile: </label>
                                    <input type="text" class="form-control" name="delivery_data[mobile]" value="" id="mobile" placeholder="Delivery Mobile" required>
                                    <span id="only-numbers-allowed" class="color-red display-none"><i><b>Only numbers allowed!!!</b></i></span>
                                </div>
                            </div>
                        </div>
                        @foreach($cart_datas as $cart_data)
                            <input type="hidden" name="products[{{ $cart_data->product_id }}][product_id]" value="{{ $cart_data->product_id }}">
                            <input type="hidden" name="products[{{ $cart_data->product_id }}][product_name]" value="{{ $cart_data->product_name }}">
                            <input type="hidden" name="products[{{ $cart_data->product_id }}][product_size]" value="{{ $cart_data->product_size }}">
                            <input type="hidden" name="products[{{ $cart_data->product_id }}][product_price]" value="{{ $cart_data->product_price }}">
                            <input type="hidden" name="products[{{ $cart_data->product_id }}][product_quantity]" value="{{ $cart_data->quantity }}">
                            <input type="hidden" name="products[{{ $cart_data->product_id }}][product_total]" value="{{ $cart_data->product_price * $cart_data->quantity }}">
                        @endforeach
                        <input type="hidden" name="order_total" value="{{ $total_price }}">
                    </div><!--/sign up form-->
                </div>

                <section id="cart_items" class="row">
                    <div class="review-payment">
                        <p>Products</p>
                    </div>
                    <div class="table-responsive cart_info col-12">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description">Name</td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart_datas as $cart_data)
                                <tr>
                                    <td class="cart_product">
                                        <td class="cart_product">
                                            <div class="div-card-image" style="background-image:url('/getFrontImage?path=/public/images/products/&image={{ $cart_data->product->image }}');"></div></a>
                                        </td>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href="">{{ $cart_data->product_name }}</a></h4>
                                        <p>{{ $cart_data->product_code }} | {{ $cart_data->product_size }}</p>
                                    </td>
                                    <td class="cart_price">
                                        <p><i class="fa fa-euro-sign"></i> {{ $cart_data->product_price }}</p>
                                    </td>
                                    <td class="cart_quantity">
                                        <p>{{ $cart_data->quantity }}</p>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><i class="fa fa-euro-sign"></i> {{ $cart_data->product_price * $cart_data->quantity }}</p>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4">&nbsp;</td>
                                <td colspan="2">
                                    <table class="table table-condensed total-result">
                                        <tr>
                                            <td>Cart Sub Total</td>
                                            <td><span><i class="fa fa-euro-sign"></i> {{ $total_price }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td><span><i class="fa fa-euro-sign"></i> {{ $shipping }}</span></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td><span><i class="fa fa-euro-sign"></i> {{ $total_price + $shipping }}</span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="payment-options">
                        <button type="submit" class="order-now-button btn btn-primary" style="float: right;">Order Now</button>
                    </div>
                </section>
            </form>
        </div>
    </div>
@endsection
