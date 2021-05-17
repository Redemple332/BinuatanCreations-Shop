<?php

namespace App\Http\Livewire\Admin\Promo;

use Livewire\Component;

class BannerIndex extends Component
{
    public function render()
    {
        return view('livewire.admin.promo.banner-index')->extends('livewire.admin.layouts.app');
    }
}
