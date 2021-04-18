<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductAttribute;
class Index extends Component
{
    public function render()
    {
        $products = Product::with('attributes')->paginate(25); 
      
        return view('livewire.admin.products.index',['products' => $products])->extends('livewire.admin.layouts.app');
    }
}
