<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCard(Request $request)
    {
//        echo 'ok';
        $add_to_cart = $request->all();
        $session_id = Session::get('session_id');
        if(empty($session_id)) {
            $session_id = Str::random(40);
            $request->session()->put('session_id', $session_id);
        }

        $session_in_cart  = Cart::where(['session_id' => $session_id, 'product_id' => $add_to_cart['product_id']])->first();

        if($session_in_cart == null) {
            // create
//            ['product_id', 'product_name', 'product_code', 'size', 'price', 'quantity', 'user_email', 'session_id']

//            \DB::enableQueryLog();
            $cart = new Cart;
            $cart->product_id = $add_to_cart['product_id'];
            $cart->product_name = $add_to_cart['product_name'];
            $cart->product_code = $add_to_cart['product_code'];
            $cart->product_size = $add_to_cart['product_size'];
            $cart->product_price = $add_to_cart['product_price'];
            $cart->quantity = '5';
            $cart->user_email = 'test@test.com';
            $cart->session_id = $session_id;


            if(Cart::create($add_to_cart)) {
                $test = 'test';
            } else {
                $test = 'test';
            }
//            dd(\DB::getQueryLog());
        } else {
            // update
        }

        $test = 'test';


    }

    public function delete()
    {
        echo 'ok';
    }
}
