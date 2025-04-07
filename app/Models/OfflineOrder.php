<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class OfflineOrder extends Model
{
    protected $fillable = [
        'product_id',
        'quantity',
        'price',
        'kasir_name',
        'customer_name',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
