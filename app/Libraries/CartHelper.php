<?php
namespace App\Libraries;

use Image;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class CartHelper
{
    public static function instance()
    {
        return new CartHelper();
    }

    public function countItemsInCart()
    {
        $session_id = Session::get('session_id');
        $row_in_cart = Cart::where(['session_id' => $session_id])->get()->toArray();
        $itemsInCart = 0;
        foreach($row_in_cart as $row) {
            $itemsInCart += $row['quantity'];
        }

        return $itemsInCart;
    }

    public function getCartDatas()
    {
        $session_id = Session::get('session_id');
        $cart_datas = Cart::getCartData($session_id);
        $total_price = 0;
        foreach ($cart_datas as $cart_data){
            $total_price += $cart_data->price * $cart_data->quantity;
        }

        return ['cart_datas' => $cart_datas, 'total_price' => $total_price];
    }
}
