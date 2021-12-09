<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __invoke()
    {
        $total = '';
        $carts = Cart::where('user_id', 1)->get(); //asumsi user login id 1
        $coupon = Coupon::where('code', request()->code)->first();

        if (!is_null($coupon)) {
            if ($coupon->code == 'FA111') {
                $total = ((new Cart)->sum_sub_total) - ($coupon->discount * (new Cart)->sum_sub_total);

                return back()->with('total', number_format($total));
            }
            elseif ($coupon->code == 'FA222') {
                foreach ($carts as $cart) {
                    if ($cart->product->code == 'FA4532') {
                        $cart = Cart::where('product_id', $cart->product_id)->first();
                        $subtotal = (int) ($cart->subtotal - $coupon->discount);

                        $cart->update([
                            'subtotal' => $subtotal
                        ]);

                        return back();
                    }
                }
            }
            elseif ($coupon->code == 'FA333') {
                foreach ($carts as $cart) {
                    if ($cart->product->price > 400000) {
                        $cart = Cart::where('product_id', $cart->product_id)->first();
                        $subtotal = (int) (($cart->subtotal) - ($coupon->discount * $cart->subtotal));

                        $cart->update([
                            'subtotal' => $subtotal
                        ]);

                        return back();
                    }
                }
            }
            elseif ($coupon->code == 'FA444') {
                //
            }
        }
    }
}
