<?php
// app/Models/Address.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'building_number',
        'apartment_number',
        'street_name',
        'neighborhood',
        'city',
        'floor',
        'notes',
        'is_default',

    ];
    protected $casts = [
        'is_default' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function getFullAddressAttribute()
    {
        $address = "مبنى {$this->building_number}";

        if ($this->apartment_number) {
            $address .= "، شقة {$this->apartment_number}";
        }

        if ($this->floor) {
            $address .= "، الطابق {$this->floor}";
        }

        $address .= "، شارع {$this->street_name}";
        $address .= "، حي {$this->neighborhood}";
        $address .= "، {$this->city}";

        return $address;
    }
}