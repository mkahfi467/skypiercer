<?php

use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HotelTypeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // return redirect('/product');
    // return view('layouts.niceadmin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth'])->group(function () {
//     Route::resource('hotel', HotelController::class);
//     Route::resource('hotel_types', HotelTypeController::class);
//     Route::resource('product', ProductController::class);
//     Route::resource('product_types', ProductTypeController::class);
//     Route::resource('facility', FacilityController::class);
// });

Route::get('/laralux', [FrontEndController::class, 'index'])->name('laralux.index');
Route::get('/laralux/{laralux}', [FrontEndController::class, 'show'])->name('laralux.show');
// Route::middleware(['auth'])->group(function () {
//     Route::get('laralux/user/cart', function () {
//         return view('frontend.cart');
//     })->name('cart');
//     Route::get('laralux/cart/add/{id}', [FrontEndController::class, 'addToCart'])->name('addCart');
//     Route::get('laralux/cart/delete/{id}', [FrontEndController::class, 'deleteFromCart'])->name('delFromCart');
//     Route::post('laralux/cart/addQty', [FrontEndController::class, 'addQuantity'])->name('addQty');
//     Route::post('laralux/cart/reduceQty', [FrontEndController::class, 'reduceQuantity'])->name('redQty');
//     Route::get('laralux/cart/checkout', [FrontEndController::class, 'checkout'])->name('checkout');
// });

Route::middleware(['auth'])->group(function () {
    // Routes for staff and owner
    Route::middleware(['can:is-staff-or-owner'])->group(function () {
        Route::resource('hotel', HotelController::class);
        Route::resource('hotel_types', HotelTypeController::class);
        Route::resource('product', ProductController::class);
        Route::resource('product_types', ProductTypeController::class);
        Route::resource('facility', FacilityController::class);
        Route::resource('transaction', TransactionController::class);
    });

    // Routes for buyer
    Route::middleware(['can:is-buyer'])->group(function () {
        Route::get('laralux/user/cart', function () {
            return view('frontend.cart');
        })->name('cart');
        // Route::get('laralux/user/cart', [FrontEndController::class, 'cart'])->name('cart');
        Route::get('laralux/cart/add/{id}', [FrontEndController::class, 'addToCart'])->name('addCart');
        Route::get('laralux/cart/delete/{id}', [FrontEndController::class, 'deleteFromCart'])->name('delFromCart');
        Route::post('laralux/cart/addQty', [FrontEndController::class, 'addQuantity'])->name('addQty');
        Route::post('laralux/cart/reduceQty', [FrontEndController::class, 'reduceQuantity'])->name('redQty');
        Route::get('laralux/cart/checkout', [FrontEndController::class, 'checkout'])->name('checkout');
    });
});
