<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [ 
        'customer_id',
        'fullname',
        'mobile',
        'region',
        'province',
        'city',
        'barangay',
        'street',
        'full_address',
        'postalcode',
    ];
}
