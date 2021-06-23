<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartContent extends Component
{
    public $quantity = [];

    public function render()
    {
        
        $carts = Cart::content();  
        return view('livewire.cart.cart-content', compact('carts'));
    }

    public function removeCart($cart_Id)
    {
        Cart::remove($cart_Id);
    }
}
