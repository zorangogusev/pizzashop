<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
//        $id = Auth::id();
//        $user = Auth::user();
//        echo $id;die();

        return view('front.users.login-page');
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        $input_data = $request->all();
        $input_data['password'] = Hash::make($input_data['password']);
        User::create($input_data);

        return back()->with('message', 'You have been registered, please sing in');
    }

    public function login(Request $request)
    {
        $input_data = $request->all();
        $remember = (isset($input_data['remember_me'])) ? ($input_data['remember_me']) : '';

        if (Auth::attempt(['email' => $input_data['email'], 'password' => $input_data['password']], $remember)) {
            Session::put('frontSession', $input_data['email']);
            return redirect('/viewcart');
        } else {
            return back()->with('message','Account is not Valid!');
        }
    }

}
