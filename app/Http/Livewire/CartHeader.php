<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartHeader extends Component
{

    public $count = 1;
    
    public function render()
    {
        return view('livewire.cart-header');
    }
}
