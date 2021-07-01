<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartHeader extends Component
{

    protected $listeners = ['cart_updated' => 'render'];

    public function render()
    {
        $carts = Cart::instance('default')->content();   
        return view('livewire.cart.cart-header', compact('carts'));
    }

    public function removeCart($cart_Id)
    {
        Cart::remove($cart_Id);
    }
}
