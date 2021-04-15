<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;

class Product extends Component
{
    public function render()
    {
        return view('livewire.admin.products.product')->extends('livewire.admin.layouts.app');
    }
}
