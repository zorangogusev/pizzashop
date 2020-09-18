<?php
namespace App\Libraries;

use Image;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class AppHelper
{
    public static function instance()
    {
        return new AppHelper();
    }

    /**
     * get the image from public images directory
     */
    public function getImage($request)
    {
        $routeToImage = base_path() . $request->get('path') . $request->get('image');
        $mime_type = mime_content_type($routeToImage);
        header('Content-Type: ' . $mime_type);
        readfile($routeToImage);
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
}
