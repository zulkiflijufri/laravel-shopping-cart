<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Repositories\CartRepository;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        $carts = $this->cart->getAll();

        return view('cart', compact('carts'));
    }

    public function update()
    {
        $cart = $this->cart->updateQty(request()->product_id, request()->qty);

        return response()->json([
            'status' => true,
            'cart_id' => $cart['cart_id'],
            'subtotal' => $cart['subtotal'],
            'total' => $cart['total']
        ]);
    }

    public function destroy(Cart $cart)
    {
        $this->cart->deleteById($cart->id);

        return back();
    }
}
