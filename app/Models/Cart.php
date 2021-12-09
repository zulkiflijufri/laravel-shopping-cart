<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'qty',
        'subtotal',
        'user_id',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getFormatSubtotalAttribute()
    {
        return 'Rp ' . number_format($this->subtotal);
    }

    public function getSumSubtotalAttribute()
    {
        return Cart::sum('subtotal');
    }
}
