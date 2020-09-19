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
        $cart_datas = \CartHelper::instance()->getCartDatas();

        return view('front.cart',['cart_datas' => $cart_datas['cart_datas'], 'total_price' => $cart_datas['total_price']]);
    }
}
