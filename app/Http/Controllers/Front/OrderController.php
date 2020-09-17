<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Auth;

class OrderController extends Controller
{
    public function orderNow(Request $request)
    {
        $test = 'test';
        $input_data = $request->all();
        $input_data['order_status'] = 1;
        $input_data['user_id'] = Auth::user()->id;
        $input_data['user_email'] = Auth::user()->email;
        if(Order::create($input_data)) Session::forget('session_id');

        return view('front.order-success');
    }

    public function userOrders(Request $request)
    {
        $user_orders = Order::where('user_id', Auth::user()->id)->get();

        return view('front.orders', compact('user_orders'));
    }
}
