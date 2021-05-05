<?php

namespace App\Http\Livewire\Admin\Promo;

use Livewire\Component;

class DiscountIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.promo.discount-index')->extends('livewire.admin.layouts.app');
    }
}
