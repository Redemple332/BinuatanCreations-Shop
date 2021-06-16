<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
class PagesController extends Controller
{
    
    public function home()
    {
        $categories = Category::inRandomOrder()->limit(3)->get();
        return view('pages.home', compact('categories'));
    }

    public function products()
    {
        return view('pages.products');
    }

    public function about()
    {

    }

}
