<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartHeader extends Component
{

    protected $listeners = ['cart_updated' => 'render'];

    public function mount()
    {
        
        
    }
    public function render()
    {
        $carts = Cart::content();   
        return view('livewire.cart-header', compact('carts'));
    }

    public function removeCart($cart_Id)
    {
        Cart::remove($cart_Id);
    }
}
