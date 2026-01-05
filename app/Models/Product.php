<?php
// app/Models/Product.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'brand_id',
        'name_ar',
        'name_en',
        'bottle_size',
        'alcohol_percentage',
        'price',
        'group_quantity',
        'description_ar',
        'description_en',
        'image_url',
        'is_featured',
    ];

    protected $casts = [
        'bottle_size' => 'decimal:2',
        'alcohol_percentage' => 'decimal:2',
        'price' => 'decimal:2',
        'is_featured' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function featuredProducts()
    {
        return $this->hasMany(FeaturedProduct::class);
    }

    public function getTranslatedNameAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->name_ar : $this->name_en;
    }

    public function getTranslatedDescriptionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    public function getProductDetailsAttribute()
    {
        $details = [];
        if ($this->alcohol_percentage) {
            $details[] = 'نسبة الكحول: ' . $this->alcohol_percentage . '%';
        }
        if ($this->bottle_size) {
            $details[] = 'الحجم: ' . $this->bottle_size . ' مل';
        }
        if ($this->brand) {
            $details[] = 'العلامة التجارية: ' . $this->brand->translated_name;
        }
        return implode(' • ', $details);
    }
}