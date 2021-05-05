<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;

class ProductEdit extends Component
{
    public Product  $product;
   
    public function render()
    {
        return view('livewire.admin.products.product-edit')->extends('livewire.admin.layouts.app');
    
    }
}
