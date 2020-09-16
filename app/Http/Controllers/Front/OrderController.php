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

        Order::create($input_data);

        return view('front.order-success');
    }
}
