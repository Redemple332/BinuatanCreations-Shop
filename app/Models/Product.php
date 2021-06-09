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

    const GENDER = [
        'MEN',
        'WOMEN'
    ];

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

    public function discount(){
        
        return $this->hasOne(Discount::class)
        ->withDefault([
            'percent' => '0',
            'price' => '0',
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
 
 

    public function getDiscountedPriceAttribute()
    {
        return ceil($this->price-($this->price*$this->discount->percent/100));
    }
    

    public function scopeWithFilters($query, $colors, $sizes, $gender)
    {

        return $query->when(count($colors), function ($query) use ($colors){
            $query->whereIn('color_id', $colors);
        })
        
        ->when(count($sizes), function ($query) use ($sizes){
            $query->whereIn('size_id', $sizes);
        })
        
        ->when(count($gender), function ($query) use ($gender){
            $query->where(function ($query) use ($gender) {
                $query->when(in_array(0, $gender), function ($query) {
                    $query->orWhere('gender', 'Men');
                })
                ->when(in_array(1, $gender), function ($query) {
                    $query->orWhere('gender', 'Women');
                });
            });
        });
        
    
    }
   
}
