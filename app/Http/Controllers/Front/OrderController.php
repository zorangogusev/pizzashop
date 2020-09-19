<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\Order_products;
use DB;

class OrderController extends Controller
{
    public function orderNow(Request $request)
    {
        DB::beginTransaction();

        try {
            $request = $request->all();
            $input_order_data = $request['delivery_data'];
            $input_order_data['order_total'] = $request['order_total'];
            $input_order_data['order_status'] = 1;
            $input_order_data['user_id'] = Auth::user()->id;
            $input_order_data['user_email'] = Auth::user()->email;
            $input_order_products_data = $request['products'];

            Order::create($input_order_data);
            $order_id = Order::latest()->first()->id;
            foreach($input_order_products_data as $order_products) {
                $order_products['order_id'] = $order_id;
                Order_products::create($order_products);
            }

            DB::commit();
            Session::forget('session_id');
            return view('front.order-processed', ['message1' => 'YOUR ORDER HAS BEEN PLACED', 'message2' => 'Thank you for ordering.']);
        } catch (\Exception $e) {
            DB::rollback();
            return view('front.order-processed', ['message1' => 'Error, something went wrong', 'message2' => 'Please try again.']);
        }
    }

    public function userOrders(Request $request)
    {
        $user_orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        $numberOfPages = ceil($user_orders->total() / $user_orders->perPage());
        $numberOfPagesDisplay = 6;

        return view('front.orders', compact('user_orders', 'numberOfPagesDisplay', 'numberOfPages'));
    }
}
