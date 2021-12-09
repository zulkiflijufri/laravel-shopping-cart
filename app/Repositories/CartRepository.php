<?php

namespace App\Repositories;

use App\Models\Cart;
use App\Models\Product;

class CartRepository
{
    public function getAll()
    {
        return Cart::with('product')->get();
    }

    public function updateQty($productId, $qty)
    {
        $product = Product::with('carts')->where('id', $productId)->first();
        $subtotal = $product->price * $qty;

        $cart = $product->carts()->update([
            'user_id' => 1, //asumsi user login id 1
            'qty' => $qty,
            'subtotal' => $subtotal
        ]);

        $cart_id = $product->carts[0]->id;
        $total = $product->carts[0]->sum_subtotal;

        return $result = [
            'cart_id' => $cart_id,
            'subtotal' => 'Rp ' . number_format($subtotal),
            'total' => 'Rp ' . number_format($total)
        ];
    }

    public function deleteById($id)
    {
        return Cart::destroy($id);
    }
}
