<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use BinaryCats\Sku\HasSku;
class Product extends Model
{
    

   
   
    use HasFactory; 
    use Sluggable;
    use HasSku;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'qty',
        'orp',
        'price',
        'sku' ,
        'gender',
        'ship',
        'category_id',
        'color_id',
        'size_id',
        'status'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function promo(){
        return $this->hasOne(Promo::class)
        ->withDefault([
            'discount' => 'error',
            'discounted_price' => 'error',
        ]);

    }
  
    public function color() 
    {
        return $this->belongsTo(Color::class)
        ->withDefault([
            'name' => 'Default-color',
            'code' => '8ad4eb'
        ]);
    }

    public function size() 
    {
        return $this->belongsTo(Size::class)
        ->withDefault([
            'name' => 'Default-size',
            'code' => 'R'
        ]);
    }

    public function category() 
    {
        return $this->belongsTo(Category::class)
        ->withDefault([
            'category' => 'Default-category',
            'code' => 'Others'
        ]);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }



    
   
}
