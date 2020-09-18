@extends('front.layouts.master')
@section('title','Orders Page')
@section('content')
    <div class="container">
        @if (count($user_orders))
            <h3 class="margin-top-100px">Your Orders</h3>
            <section id="cart_items" class="row">
                <div class="table-responsive cart_info col-12">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image" align="center">Order ID</td>
                            <td class="description" align="center">Order total</td>
                            <td class="price" align="center">Date</td>
                            <td class="price" align="center">Details</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user_orders as $order)
                            <tr>
                                <td align="center">
                                    <p class="">{{ $order->id }}</p>
                                </td>
                                <td align="center">
                                    <p class="">{{ $order->order_total }}</p>
                                </td>
                                <td align="center">
                                    <p class="">{{ $order->created_at }}</p>
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-primary btn-lg background-none orders-page-view-order-details" data-toggle="modal"  data-order-id="{{ $order->id }}">
                                        <i class="fa fa-eye font-size-20px main-color cursor-pointer" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        @else
            <h3 class="margin-top-100px">You don't have orders until now</h3>
            <div class="padding-bottom-200px"></div>
        @endif
    </div>
    <div class="padding-bottom-200px"></div>
<div id="div-to-show-modal-with-order-products"></div>
@endsection
