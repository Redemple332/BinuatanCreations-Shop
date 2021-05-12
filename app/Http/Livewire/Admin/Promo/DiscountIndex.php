<?php

namespace App\Http\Livewire\Admin\Promo;

use Livewire\Component;
use App\Models\Discount;
use App\Models\Products;
class DiscountIndex extends Component
{
    

    public function render()
    {

        // $discounts = Product::with('color','size','category','discount')
        // ->orderBy('name', 'ASC')
        // ->take(20)->get();

        $discounts = Discount::with('product')->get();
        return view('livewire.admin.promo.discount-index')->with('discounts',$discounts)->extends('livewire.admin.layouts.app');
    }
  

  
}
