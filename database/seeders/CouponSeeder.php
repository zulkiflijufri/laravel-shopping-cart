<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'FA111',
            'discount' => 0.1
        ]);

        Coupon::create([
            'code' => 'FA222',
            'discount' => 50000
        ]);

        Coupon::create([
            'code' => 'FA333',
            'discount' => 0.06
        ]);

        Coupon::create([
            'code' => 'FA444',
            'discount' => 0.05
        ]);
    }
}
