<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class IndexController extends Controller
{
    public function index()
    {
        $indexPage = 1;
        $products = Product::with('attributes')->get();

        return view('front.index', compact('products', 'indexPage'));
    }

    public function about()
    {
        return view('front.about');
    }

    public function contact()
    {
        return view('front.contact');
    }

    public function getFrontImage(Request $request)
    {
        \AppHelper::instance()->getImage($request);
    }
}
