<div class="modal fade" id="showOrderDetails" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog width-60" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modalLabel">Order Details</h4>
            </div>
            <div class="modal-body">
                <section id="cart_items" class="row">
                    <h5 class="font-size-20px">Order ID {{ $order->id }}</h5>
                    <table class="table-responsive cart_info col-12 width-100 border-none">
                        <tbody class="font-size-18px">
                            <tr>
                                <td>
                                    <tr>
                                        <td>Delivery Name: <b>{{ $order->name }}</b></td>
                                        <td>Delivery Address: <b>{{ $order->address }}</b></td>
                                        <td>Currency:
                                            @if($order->currency == 'EURO')
                                                EURO
                                            @else
                                                DOLLAR
                                            @endif
                                        </td>
                                    </tr>
                                </td>
                                <td>
                                    <tr>
                                        <td>Delivery City: <b>{{ $order->city }}</b></td>
                                        <td>Order Date: <b>{{ $order->created_at }}</b></td>
                                    </tr>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <h4 class="modal-title" id="modalLabel" style="margin-bottom: 10px;">Products</h4>
                    <div class="table-responsive cart_info col-12">
                        <table class="table table-condensed">
                            <thead>
                            <tr class="cart_menu">
                                <td align="center">Image</td>
                                <td align="center">Name</td>
                                <td align="center">Size</td>
                                <td align="center">Quantity</td>
                                <td align="center">Price</td>
                                <td align="center">Total</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->products as $product)
                                <tr>
                                    <td align="center">
{{--                                        <div class="div-image-modal-show-order-products" style="background-image:url('/getFrontImage?path=/public/images/products/&image={{ $product->product->image }}');"></div>--}}
                                        <div class="div-image-modal-show-order-products" style="background-image:url('/images/products/{{ $product->product->image }}');"></div>
                                    </td>
                                    <td align="center">
                                        <p class="">{{ $product->product_name }}</p>
                                    </td>
                                    <td align="center">
                                        <p class="">{{ $product->product_size }}</p>
                                    </td>
                                    <td align="center">
                                        <p class="">{{ $product->product_quantity }}</p>
                                    </td>
                                    <td align="center">
                                        <p class="">{{ $product->product_price }}</p>
                                    </td>
                                    <td align="center">
                                        <p class="">{{ $product->product_total }}</p>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>











?>
