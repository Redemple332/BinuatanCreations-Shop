<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;
use Facades\jpmurray\LaravelCountdown\Countdown;
use Carbon\Carbon;
class ProductsCountdown extends Component
{
    

    
    public $flashsale;

    public function render()
    {
          

        return view('livewire.template.products-countdown');
    }

}
