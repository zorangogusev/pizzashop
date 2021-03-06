<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;

class UserController extends Controller
{

    public function index()
    {
        if(Auth::check()) return redirect('/');

        return view('front.users.login-page');
    }

    public function registerFront(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $input_data = $request->all();
        $loginData['password'] = $input_data['password'];
        $loginData['email'] = $input_data['email'];
        $input_data['password'] = Hash::make($input_data['password']);
        if (User::create($input_data)) {
            Auth::attempt(['email' => $loginData['email'], 'password' => $loginData['password']]);
            Session::put('frontSession', $input_data['email']);
        }

        return redirect('/');
    }

    public function loginFront(Request $request)
    {
        $input_data = $request->all();
        $remember = (isset($input_data['remember_me'])) ? ($input_data['remember_me']) : '';

        if (Auth::attempt(['email' => $input_data['email'], 'password' => $input_data['password']], $remember)) {
            Session::put('frontSession', $input_data['email']);
            return (empty(Session::get('session_id'))) ? redirect('/') : redirect('/viewcart');
        } else {
            return back()->with('message','Account is not Valid!');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('frontSession');

        return redirect('/');
    }

    public function checkOut()
    {
        $session_id = Session::get('session_id');
        if (empty($session_id)) return redirect('/');

        $cart_datas = \CartHelper::instance()->getCartDatas();
        $shipping = 5;

        return view('front.users.check-out', [
                'cart_datas' => $cart_datas['cart_datas'],
                'total_price' => $cart_datas['total_price'],
                'shipping' => 5
            ]);
    }
}
