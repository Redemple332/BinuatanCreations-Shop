<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'product_id',
        'percent'
    ];
    public function product(){

        return $this->belongsTo(Product::class)
        ->withDefault([
            'name' => 'error',
        ]);
    }

    public function getDiscountedPriceAttribute()
    {
        return ceil($this->product->price-($this->product->price*$this->percent/100));
    }
 
    
}
