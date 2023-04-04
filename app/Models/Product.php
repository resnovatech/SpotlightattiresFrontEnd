<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'cat_name',
        'sub_cat_name',
        'price',
        'quantity',
        'sku',
        'des',
        'expire_date',
        'feature_image',
        'discount_type',
        'discount_amount',
    ];
}
