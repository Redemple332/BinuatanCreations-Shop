<?php

namespace App\Http\Livewire\Admin\Layouts;

use Livewire\Component;

class HeaderSide extends Component
{
    public $active = 'sa';

    public function render()
    {
        return view('livewire.admin.layouts.header-side');
    }
    public function active(){
       $this->active = 'da';
    }
}
