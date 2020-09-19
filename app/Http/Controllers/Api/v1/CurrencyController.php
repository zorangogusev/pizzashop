<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
class CurrencyController extends Controller
{

    public function changeCurrency(Request $request)
    {
        $currency = $request->all();
        Session::put('site_currency', $currency);


        return response()->json(['data' => ['message' =>  'success', 'currency' => $currency]], 200);
    }
}
