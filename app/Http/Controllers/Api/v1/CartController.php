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
        $add_to_cart = $request->all();
        $session_id = Session::get('session_id');
        if(empty($session_id)) {
            $session_id = Str::random(40);
            Session::put('session_id', $session_id);
        }
        $add_to_cart['session_id'] = $session_id;
        $row_in_cart  = Cart::where(['session_id' => $session_id, 'product_id' => $add_to_cart['product_id'], 'product_size' => $add_to_cart['product_size']])->first();

        if($row_in_cart == null) {
            if(Cart::create($add_to_cart)) {
                $itemsInCart = \AppHelper::instance()->countItemsInCart();
                return response()->json(['data' => ['message' => '<i class="fas fa-check"></i> Product added to cart', 'itemsInCart' => $itemsInCart]], 200);
            } else {
                return response()->json(['data' => ['message' => '<i class="fas fa-times"></i> Error, Please try again']], 400);
            }
        } else {
            $count_product = $row_in_cart->quantity + $add_to_cart['quantity'];
            if($row_in_cart->update(['quantity' => $count_product])) {
                $itemsInCart = \AppHelper::instance()->countItemsInCart();
                return response()->json(['data' => ['message' => '<i class="fas fa-check"></i> Product added to cart', 'itemsInCart' => $itemsInCart]], 200);
            } else {
                return response()->json(['data' => ['message' => '<i class="fas fa-times"></i> Error, Please try again']], 400);
            }
        }
    }

    public function actionFromCartPage(Request $request)
    {
        $request = $request->all();
        $cart_id = $request['cart_id'];
        $action = $request['action'];

        $row_in_cart  = Cart::where(['id' => $cart_id])->first();

        if ($action == 'up') {
            $new_quantity = $row_in_cart->quantity + 1;
            return ($row_in_cart->update(['quantity' => $new_quantity])) ? response()->json('success', 200) : response()->json('error', 400);
        } elseif ($action == 'down') {
            if ($row_in_cart->quantity > 1) {
                $new_quantity = $row_in_cart->quantity - 1;
                return ($row_in_cart->update(['quantity' => $new_quantity])) ? response()->json('success', 200)  : response()->json('error', 400);
            }
            $deleteRow = $this->deleteRowInCart($row_in_cart, $request);
            return ($deleteRow) ? response()->json('success', 200) : response()->json('error', 400);
        } elseif ($action == 'delete') {
            $deleteRow = $this->deleteRowInCart($row_in_cart, $request);
            return ($deleteRow) ? response()->json('success', 200) : response()->json('error', 400);
        }
    }

    private function deleteRowInCart($row_in_cart, $request)
    {
        if ($row_in_cart->delete()) {
            $session_id = Session::get('session_id');
            $check_for_products_in_cart  = Cart::where(['session_id' => $session_id])->first();
            if ($check_for_products_in_cart == null) {
                Session::forget('session_id');
            }
            return true;
        }
        return false;
    }
}
