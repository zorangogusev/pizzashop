<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\FrontLogin;
use App\Http\Controllers\Front\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/* Front Location */
Route::get('/', [IndexController::class, 'index']);
Route::get('/about', [IndexController::class, 'about']);
Route::get('/contact', [IndexController::class, 'contact']);
Route::get('/getFrontImage', [IndexController::class, 'getFrontImage']);
Route::get('/viewcart', [CartController::class, 'index']);

/* User */
Route::get('/login-page', [UserController::class, 'index']);
Route::get('/check-out', [UserController::class, 'checkOut']);
Route::post('/user-register', [UserController::class, 'registerFront'])->name('registerFront');
Route::post('/user-login', [UserController::class, 'loginFront'])->name('loginFront');

Route::post('/order-now', [OrderController::class, 'orderNow']);

Route::middleware([FrontLogin::class])->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);

    Route::get('/user-orders', [OrderController::class, 'userOrders']);

});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
