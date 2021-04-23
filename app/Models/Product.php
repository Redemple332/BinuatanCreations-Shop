<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    public $table = 'products';
   
    use HasFactory; 
    protected $fillable = [
        'name',
        'slug',
        'description',
        'qty',
        'orp',
        'price',
        'sku' ,
        'image',
        'tag',
        'pictures_id',
        'ship',
        'tags'
    ];

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    public function add_attributes()
    {
        return $this->belongsToMany(ProductAttribute::class,'product_attributes');
    }
}
