<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;

class Dashboard extends Component
{
   
    

    public $jan = 50000; 


    public function render()
    {
        return view('livewire.admin.dashboard.dashboard')->extends('livewire.admin.layouts.app');
    }
   
}
