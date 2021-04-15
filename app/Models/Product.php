<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'original_price',
        'product_price',
        'category_id',
        // 'image',
        // 'status',
        // 'ship',
        // 'new',
        'color_id',
        'size_id',
        'gender',
        'namecode',
        'tags'
    ];
}
