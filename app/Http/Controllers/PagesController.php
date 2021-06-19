<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;
class PagesController extends Controller
{
    
    public function home()
    {

        $categories = Category::inRandomOrder()->limit(3)->get();

      
        
        $flashsale = Product::with('discount')
        ->WithFlashSale($this->WH = 'discount')
        ->where('qty','>', 0)
        ->where('status', 1)
        ->take(1)
        ->get();

        $sale_products = Product::with('discount')
        ->WithSale($this->WH = 'discount')
        ->groupBy('name')
        ->where('qty','>', 0)
        ->where('status', 1)
        ->take(20)->get();

        $latest_products = Product::with('discount')
        ->groupBy('name')
        ->where('qty','>', 0)
        ->where('status', 1)
        ->latest('updated_at')->take(7)->get();
        
        return view('pages.home', compact(['categories','flashsale','latest_products','sale_products']));
    }   

    public function products()
    {
        return view('pages.products');
    }

    public function about()
    {

    }

}
