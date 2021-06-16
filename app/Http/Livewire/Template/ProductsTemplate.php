<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;
class ProductsTemplate extends Component
{

   

   public $product;


    public function addProduct()
    {
        dd('added successfully!');
    }

    public function render()
    { 
        return view('livewire.template.products-template');
    }

   
}
