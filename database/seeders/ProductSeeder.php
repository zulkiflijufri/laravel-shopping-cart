<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'code' => 'FA4532',
            'name' => 'Purple Reign FA',
            'image' => 'https://img.floweradvisor.com/p/6-purple-roses-spray-bouquet-with-medium-bear-fa4532-006',
            'price' => 455000
        ]);

        Product::create([
            'code' => 'FA3518',
            'name' => 'Enchanting Belle',
            'image' => 'https://cdn.istyle.im/images/product/web/79/65/42/00/0/000000426579_01_800.JPG.webp',
            'price' => 336000
        ]);
    }
}
