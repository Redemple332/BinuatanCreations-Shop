<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
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

    public function increaseQty($rowId)
    {
        $cart = Cart::get($rowId);

        $product = Product::findOrFail($cart->id);

        if ($product->qty > $cart->qty) {
            $qty = $cart->qty + 1;
            Cart::update($rowId, $qty); 
        }
        else{
            session()->flash('message', 'The quantity that you put is greater than the availabe quantity of the product '.$product->qty );
        }

    }

    public function decreaseQty($rowId)
    {
        $product = Cart::get($rowId);

        if($product->qty > 1)
        {
            $qty = $product->qty - 1;
            Cart::update($rowId, $qty);
        }
 
    }
}
