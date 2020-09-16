@extends('front.layouts.master')
@section('title','Cart Page')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Item</td>
                        <td class="description"></td>
                        <td class="price">Price</td>
                        <td class="quantity">Quantity</td>
                        <td class="total">Total</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart_datas as $cart_data)
                        <tr>
                            <td class="cart_product">
                                <div class="div-card-image" style="background-image:url('/getFrontImage?path=/public/images/products/&image={{ $cart_data->product->image }}');"></div></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="">{{ $cart_data->product_name }}</a></h4>
                                <p>{{ $cart_data->product_code }} | {{ $cart_data->product_size }}</p>
                            </td>
                            <td class="cart_price">
                                <p><i class="fa fa-euro-sign"></i> {{ $cart_data->product_price }}</p>
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    <a roll="button" class="cart_quantity_up cursor-pointer" data-cart-id="{{ $cart_data->id }}"> + </a>
                                    <input class="cart_quantity_input" type="text" name="quantity" value="{{ $cart_data->quantity }}" autocomplete="off" size="2" disabled>
                                    <a roll="button" class="cart_quantity_down cursor-pointer" data-cart-id="{{ $cart_data->id }}"> - </a>
                                </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"><i class="fa fa-euro-sign"></i> {{ $cart_data->product_price * $cart_data->quantity }}</p>
                            </td>
                            <td class="cart_delete">
                                <a class="cart_quantity_delete cursor-pointer" data-cart-id="{{ $cart_data->id }}"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="row">
                <div class="col-sm-6"></div>
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Total <span><i class="fa fa-euro-sign"></i> {{ $total_price }}</span></li>
                        </ul>
                        <div class="margin-left-20px">
                            <button class="btn btn-default check_out" @if ($total_price == 0) disabled @endif>
                                <a class="color-fff" href="{{ url('/check-out') }}">Check Out</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection
