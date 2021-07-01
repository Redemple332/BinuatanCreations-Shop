<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductImage;
use Gloudemans\Shoppingcart\Facades\Cart;
class SingleItem extends Component
{

    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function render()
    {
 
        $single_product = Product::with('images')
        ->with('discount')
        ->with('category')
        ->with('color')
        ->with('size')
        ->where('qty','>', 0)
        ->where('status', 1)
        ->where('slug', $this->product)->first();

    
        $product_colors = Product::join('colors', 'products.color_id', '=', 'colors.id')
        ->select('slug','colors.id', 'colors.code')
        ->where('products.name',$single_product->name)
        ->where('qty','>', 0)
        ->where('size_id', $single_product->size_id)
        ->where('products.status', 1)
        ->groupBy('color_id')->get();

        $product_sizes = Product::join('sizes', 'products.size_id', '=', 'sizes.id')
        ->select('slug', 'sizes.id', 'sizes.code')
        ->where('products.name',$single_product->name)
        ->where('qty','>', 0)
        ->where('products.status', 1) 
        ->where('color_id', $single_product->color_id)
        ->get();


        
        return view('livewire.products.single-item', 
            compact('single_product', 'product_colors', 'product_sizes')
        );
    }

    public function addToCart($product_id)
    {
        Product::findOrFail($product_id);
        $product = Product::with(['color','size','category'])
        ->where('id', $product_id)
        ->first();
        
        $image = ProductImage::where('product_id', $product_id)->first();


        Cart::add(
            $product->id,
            $product->name,
            1,
            $product->price,
            0,
            ['size' => $product->size->code,
            'color' => $product->color->name,
            'image' => $image->image],
        );
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
    
    public function singleProduct($slug)
    {
        $this->product = $slug;

        // return redirect('/products/'.$this->product);
         $this->dispatchBrowserEvent('urlChange', ['url' => '/products/'.$this->product ]);
    }
}
