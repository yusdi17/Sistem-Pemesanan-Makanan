<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderItem;
use App\Mail\OrderStatusUpdated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'total_amount',
        'status',
        'payment_method',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getProductNamesAttribute()
    {
        return $this->orderItems
            ->map(fn($item) => $item->product->name ?? 'N/A')
            ->join(', ');
    }

    protected static function booted(): void
    {
        static::updated(function ($order) {
            if ($order->isDirty('status')) {
                // notifikasi status
                Mail::to($order->customer_email)->send(new OrderStatusUpdated($order));
            }
        });
    }
}
