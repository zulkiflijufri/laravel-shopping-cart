<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;

Route::get('/carts', [CartController::class, 'index']);
Route::put('/carts/{cart}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/carts/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::post('/coupons', CouponController::class)->name('coupon.apply');
