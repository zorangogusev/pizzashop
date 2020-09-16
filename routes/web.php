<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\FrontLogin;

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
Route::get('/getFrontImage', [IndexController::class, 'getFrontImage']);
Route::get('/viewcart', [CartController::class, 'index']);

/* User */
Route::get('/login-page', [UserController::class, 'index']);
Route::post('/user-register', [UserController::class, 'register']);
Route::post('/user-login', [UserController::class, 'login']);

Route::middleware([FrontLogin::class])->group(function () {
    Route::get('/check-out', [IndexController::class, 'checkOut']);
});


//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
