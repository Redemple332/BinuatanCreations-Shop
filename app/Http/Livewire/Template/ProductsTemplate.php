<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductImage;
use Gloudemans\Shoppingcart\Facades\Cart;
class ProductsTemplate extends Component
{

   

   public $product;


    public function addToCart($product_id)
    {

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

    public function addToWishlist($product_id)
    {
        Product::findOrFail($product_id);
        $product = Product::with(['color','size','category'])
        ->where('id', $product_id)
        ->first();

          
        $image = ProductImage::where('product_id', $product_id)->first();
        Cart::instance('wishlist')->add(
            $product->id,
            $product->name,
            1,
            $product->price,
            0,
            ['size' => $product->size->code,
            'color' => $product->color->name,
            'image' => $image->image],
        )->associate('App\Models\Product');
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
     
        $wishItem = Cart::instance('wishlist')->content()->pluck('id');
        return view('livewire.template.products-template', compact('wishItem'));
    }

}
