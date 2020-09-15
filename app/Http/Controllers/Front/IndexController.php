<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::with('attributes')->get();

        return view('front.index', compact('products'));
    }

    public function checkOut()
    {
        $test = 'test';
    }

    public function getFrontImage(Request $request)
    {
        \AppHelper::instance()->getImage($request);
    }
}
