<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
class ProductImage extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'product_id',
        'image'
    ];

    public function getImagePathAttribute()
    {
        return Storage::disk('public')->url('product_images/'.$this->image);
    }
}
