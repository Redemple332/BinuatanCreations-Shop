<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    
    use SoftDeletes;
    
    protected $fillable = [
        'category',
        'image'
    ];
 

    public function getImagePathAttribute()
    {
        return Storage::disk('public')->url('category_images/'.$this->image);
    }
}
