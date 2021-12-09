<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cart::create([
            'user_id' => 1,
            'product_id' => 1,
            'qty' => 1,
            'subtotal' => 455000
        ]);

        Cart::create([
            'user_id' => 1,
            'product_id' => 2,
            'qty' => 1,
            'subtotal' => 366000
        ]);
    }
}
