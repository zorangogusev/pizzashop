<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $session_id = Session::get('session_id');
        $cart_datas = Cart::with('product')->where('session_id', $session_id)->get();
        $total_price = 0;
        foreach ($cart_datas as $cart_data){
            $total_price += $cart_data->product_price * $cart_data->quantity;
        }

        return view('front.cart',compact('cart_datas','total_price'));
    }
}
