<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;

class ProductsCountdown extends Component
{
  
    public $flashsale;

    public function render()
    {
        return view('livewire.template.products-countdown');
    }

}
