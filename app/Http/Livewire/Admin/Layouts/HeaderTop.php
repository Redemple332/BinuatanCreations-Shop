<?php

namespace App\Http\Livewire\Admin\Layouts;

use Livewire\Component;
use Auth;

class HeaderTop extends Component
{
    public function render()
    {
        return view('livewire.admin.layouts.header-top');
    }
    

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }


}
