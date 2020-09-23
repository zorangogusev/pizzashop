<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;
use App\Models\Order_products;

class OrderController extends Controller
{
    public function getOrderDetails(Request $request)
    {
        $order_id = $request->get('order_id');
        $order = Order::with('products', 'products.product')->where(['id' => $order_id])->first();

        if(Auth::user()->email == $order->user_email) {
            $modal_for_product = \View::make('front.partials._modal-show-order-products')->with(['order' => $order])->render();

            return response()->json(['data' => ['message' => 'Success', 'modal_for_product' => $modal_for_product]], 200);
        } else {
            return response()->json(['data' => ['message' => 'Error']], 400);
        }
    }
}
