<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', function () {
    return view('pages.product');
});
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/cart', function () {
    return view('pages.cart');
});
Route::get('/checkout', function () {
    return view('pages.checkout');
});
Route::get('/account', function () {
    return view('pages.account');
});
Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/about', function () {
    return view('pages.about');
});

