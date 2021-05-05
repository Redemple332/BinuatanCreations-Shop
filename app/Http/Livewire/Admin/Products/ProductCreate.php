<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;

class ProductCreate extends Component
{
    public function render()
    {
        return view('livewire.admin.products.product-create')->extends('livewire.admin.layouts.app');
    }
}
