<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use BinaryCats\Sku\HasSku;
class Product extends Model
{
    
    public $table = 'products';
   
   
    use HasFactory; 
    use Sluggable;
    use HasSku;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'qty',
        'orp',
        'price',
        'sku' ,
        'gender',
        'tag',
        'ship',
        'tags'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function attributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }



    public function add_attributes()
    {
        return $this->belongsToMany(ProductAttribute::class,'product_attributes');
    }
}
