<?php

namespace App\Http\Livewire\Admin\Catalog;

use Livewire\Component;

class Sizes extends Component
{
    public function render()
    {
        return view('livewire.admin.catalog.sizes')->extends('livewire.admin.layouts.app');
    }
}
