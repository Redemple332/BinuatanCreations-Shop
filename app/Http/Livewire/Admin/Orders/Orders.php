<?php

namespace App\Http\Livewire\Admin\Orders;

use Livewire\Component;

class Orders extends Component
{
    public $status = 'Pending';
    public $action;
    
    
    public function render()
    {
        return view('livewire.admin.orders.orders')->extends('livewire.admin.layouts.app');
    }

    public function confirm(){
        $this->status = 'Confirmed';
        return redirect()->to('admin/orders');
    }

    public function cancel(){
        $this->status = 'Cancelled';
    }

    public function ship(){
        $this->status = 'Shipped';
    }
    
    public function refund(){
        $this->status = 'Refunded';
    }

    public function deliver(){
        $this->status = 'Delivered';
    }

  
}
