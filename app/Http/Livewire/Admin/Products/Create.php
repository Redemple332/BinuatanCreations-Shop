<?php

namespace App\Http\Livewire\Admin\Products;
use Livewire\Component;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Category;

class Create extends Component
{
  
    public $form = [

        'name' => '',
        'description'  => '',
        'quantity'  => '',
        'original_price'  => '',
        'product_price'  => '',
        'category_id'  => '',
        'image'  => '',
        'status'  => '',
        'ship'  => '',
        'new'  => '',
        'color_id'  => '',
        'new'  => '',
        'size_id'  => '',
        'gender'  => '',
        'namecode'  => '',
        'tags'  => '',
    ];

    public function create(){
      
        // $this->validate([
         
        //     'name' => 'required',
        //     'description'  => '',
        //     'quantity'  => 'required|numeric',
        //     'original_price'  => 'required|numeric',
        //     'product_price'  => 'required|numeric',
        //     'category_id'  => 'required|numeric'',
        //     'color_id'  => 'required|numeric'',
        //     'size_id'  => 'required|numeric'',
        //     'gender'  => 'required',
 
        // ]);

        Product::create($this->form);

        // $this->form = [
        //     'name' => '',
        //     'description'  => '',
        //     'quantity'  => '',
        //     'original_price'  => '',
        //     'product_price'  => '',
        //     'category_id'  => '',
        //     'image'  => '',
        //     'status'  => '',
        //     'ship'  => '',
        //     'new'  => '',
        //     'color_id'  => '',
        //     'new'  => '',
        //     'size_id'  => '',
        //     'gender'  => '',
        //     'namecode'  => '',
        //     'tags'  => '',
        // ];
        
    }

 

    public function render()
    {
        $categories = Category::orderBy('category', 'ASC')->get();
        $colors = Color::orderBy('name', 'ASC')->get();
        $sizes = Size::orderBy('name', 'ASC')->get();
       
        $data = [
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes
            
        ];
    
        return view('livewire.admin.products.create')->extends('livewire.admin.layouts.app')->with($data);
    }
 
   

}
