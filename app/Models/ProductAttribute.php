<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    
    protected $table = 'product_attributes';

    use HasFactory;

    public function product()
    {

        return $this->belongsTo(Product::class);
    }
}

