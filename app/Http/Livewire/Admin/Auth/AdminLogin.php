<?php

namespace App\Http\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class AdminLogin extends Component
{
    public $email,$password,$remember;
    
    public function render()
    {
        return view('livewire.admin.auth.admin-login')->extends('livewire.admin.layouts.app');
    }

    public function login(){
        
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)){
          
            //if successfull then redirecttheir intended location
            return redirect()->intended('admin/dashboard');
        }
        $this->password = null;
        
    
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
