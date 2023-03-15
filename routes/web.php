<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
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
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');
Route::get('/cart', [OrderController::class, 'cart'])->middleware('auth:sanctum')->name('cart');
Route::get('/checkout', [OrderController::class, 'checkout'])->middleware('auth:sanctum')->name('checkout');
Route::get('/orders', [OrderController::class, 'index'])->middleware('auth:sanctum')->name('user.orders');
Route::get('/orders/{order}', [OrderController::class, 'show'])->middleware('auth:sanctum')->name('user.order');
Route::get('/account', [OrderController::class, 'account'])->middleware('auth:sanctum')->name('user.account');
Route::get('/contact', function () {
    return view('pages.contact');
});
Route::get('/about', function () {
    return view('pages.about');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
