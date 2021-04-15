<?php

namespace App\Http\Livewire\Admin\Catalog;

use Livewire\Component;

class Images extends Component
{
    public function render()
    {
        return view('livewire.admin.catalog.images')->extends('livewire.admin.layouts.app');
    }
}
