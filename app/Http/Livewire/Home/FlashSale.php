<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
class FlashSale extends Component
{

    

    public function render()
    {
        $flashsale = Product::with('discount')->get();

        return view('livewire.home.flash-sale',compact('flashsale'));
    }
}
