<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
class PagesController extends Controller
{
    
    public $product;

    public function home()
    {

        $categories = Category::inRandomOrder()->limit(3)->get();
        
        $flashsale = Product::with('discount')
        ->WithFlashSale()
        ->WithStocks()
        ->with('images')
        ->take(1)
        ->get();

        $sale_products = Product::with('discount')
        ->WithSale()
        ->with('images')
        ->WithStocks()
        ->groupBy('name')
        ->take(20)->get();

        $latest_products = Product::with('discount')
        ->with('images')
        ->WithStocks()
        ->groupBy('name')
        ->latest('updated_at')->take(7)->get();
        
        return view('pages.home', compact(['categories','flashsale','latest_products','sale_products']));
    }   

    public function products()
    {
        return view('pages.products');
    }

    public function singleProduct($product)
    {
       $this->product = $product;

        $prod = Product::select('category_id','name')
        ->where('slug', $product)
        ->first();
        if ($prod) {
            $related_products = Product::with('discount')
            ->with('images')
            ->WithStocks()
            ->where('category_id', $prod->category_id)
            ->where('name', '!=', $prod->name)
            ->groupBy('name')
            ->inRandomOrder()
            ->take(8)->get();
        }
        else{
            abort(404);
        }
      
        return view('pages.single-product',compact('product','related_products'));
    }

    public function cart()
    {
        return view('pages.cart');
    }

    public function checkout()
    {
        if (Cart::instance('default')->count()) {
            
            return view('pages.check-out');
        }
        else{
            return redirect('/products/cart');
        }
        
    }

    public function customerProfile()
    {
        return view('pages.customer-profile');
    }

    
    public function wishlist()
    {
        
        return view('pages.wishlist');
    }
}
