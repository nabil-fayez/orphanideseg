<?php
// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'pickup_time',
        'pickup_date',
        'notes',
        'delivery_cost',
        'discount',
        'subtotal',
        'total_amount',
        'status',
    ];

    protected $casts = [
        'pickup_date' => 'date',
        'delivery_cost' => 'decimal:2',
        'discount' => 'decimal:2',
        'total_amount' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getStatusTextAttribute()
    {
        $statuses = [
            'pending' => 'قيد الانتظار',
            'confirmed' => 'تم التأكيد',
            'preparing' => 'قيد التحضير',
            'ready' => 'جاهز للتسليم',
            'delivered' => 'تم التسليم',
            'cancelled' => 'ملغي',
        ];

        return $statuses[$this->status] ?? $this->status;
    }

    public function getPickupDateTimeAttribute()
    {
        return $this->pickup_date . ' ' . $this->pickup_time;
    }
}