<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/login', [LoginController::class,'formLogin'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('admin.login');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/dashboard', [LoginController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/logout', [LoginController::class,'logout'])->name('admin.logout');


    Route::prefix('bills')->group(function () {
        Route::get('/', [BillController::class,'index'])->name('bills.index');
        Route::get('/{id}/detail', [BillController::class,'billDetail'])->name('bill.detail');
        Route::post('/{id}/update', [BillController::class,'updateStatusBill'])->name('bill.update');
    });

    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class,'index'])->name('product.index');
        Route::get('/add', [ProductController::class,'add'])->name('product.add');
        Route::post('/add', [ProductController::class,'store'])->name('product.store');
        Route::get('/{id}/delete', [ProductController::class,'delete'])->name('product.delete');
        Route::get('/{id}/edit', [ProductController::class,'edit'])->name('product.edit');
        Route::post('/{id}/edit', [ProductController::class,'update'])->name('product.update');
    });


    Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerController::class,'index'])->name('customer.index');
        Route::get('/{id}/edit', [CustomerController::class,'edit'])->name('customer.edit');
        Route::post('/{id}/edit', [CustomerController::class,'update'])->name('customer.update');
    });

});



Route::get('/',  [ShopController::class, 'index'])->name('shop-home');
Route::post('/add-to-cart', [CartController::class,'addToCart'])->name('add-to-cart');
Route::get('/{id}/product-detail', [ProductController::class,'viewProduct'])->name('product.view');
Route::get('/category', [ProductController::class,'show'])->name('product-productlist');

Route::prefix('carts')->group(function () {
    Route::get('/', [CartController::class,'index'])->name('cart.index');
    Route::get('/{idProduct}/remove', [CartController::class,'remove'])->name('cart.remove');
    Route::post('/update-to-cart/{id}', [CartController::class,'update'])->name('cart.update');
    Route::get('checkout', [CartController::class,'checkOut'])->name('cart.checkout');
    Route::post('checkout', [CartController::class,'payment'])->name('cart.payment');
});
