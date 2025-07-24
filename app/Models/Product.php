<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'image',
    ];

    public function getPriceAttribute($value)
    {
        return $value / 100; // Assuming price is stored in cents
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100; // Store price in cents
    }
}
