<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\ProductImage;
class ProductsWishlist extends Component
{

    public $product;


    public function addToCart($product_id, $rowId)
    {
        Cart::instance('wishlist')->remove($rowId);
        
        Product::findOrFail($product_id);
        $product = Product::with(['color','size','category'])
        ->where('id', $product_id)
        ->first();
       
        $image = ProductImage::where('product_id', $product_id)->first();

        Cart::instance('default')->add(
            $product->id,
            $product->name,
            1,
            $product->price,
            0,
            ['size' => $product->size->code,
            'color' => $product->color->name,
            'image' => $image->image],
        )->associate('App\Models\Product');
        $this->emit('cart_updated');
    }

    public function removeToWishlist($product_Id)
    {

        foreach(Cart::instance('wishlist')->content() as $wishItem)
        {
            if($wishItem->id == $product_Id){
                Cart::instance('wishlist')->remove($wishItem->rowId);
            }

        }        
   
    }


    public function render()
    {
        $wishlist = Cart::instance('wishlist')->content();

        return view('livewire.template.products-wishlist', compact('wishlist'));
    }
}
