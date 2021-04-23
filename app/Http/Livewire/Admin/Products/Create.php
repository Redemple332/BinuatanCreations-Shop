<?php

namespace App\Http\Livewire\Admin\Products;
use Livewire\Component;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use App\Models\ProductAttribute;

class Create extends Component
{
     
 
 
   
    public $form = [

        'name' => '',
        'slug' => '',
        'description'  => '',
        'qty'  => '',
        'orp'  => '',
        'price'  => '',
        'sku'  => '',
        'image'  => '',
        'tags'  => '',
        'pictures_id'  => '',
        'ship'  => 0,
    ];
    protected $listeners = ['updateCategories'];
    // public $attribute_color,$attribute_category,$attribute_size;


    public function updateCategories(){
        $this->categories = Category::all();
    }

    public function save(){

        $this->Validation();
        // $category = Category::findOrFail($this->attribute_category);

        // $size = Size::findOrFail($this->attribute_size);

        // $color = Color::findOrFail($this->attribute_color);

        
       $product  =  Product::create($this->form);

        // UPDATE
        // $product  = Product::findOrFail(2021000);
        // $product->update(['name'  => 'corona']);
      
    // $product->add_attributes()->sync([ 
    //     1 => ['attribute' => 'Category', 'value' => 'Bag', 'code' => 'image.jpeg'],
    //     2 => ['attribute' => 'Color' , 'value' => 'Blue', 'code' => '3242'],
    //     3 => ['attribute' => 'Size', 'value' => 'Large', 'code' => 'L'],
    //     4 => ['attribute' => 'Gender', 'value' => 'Men', 'code' => 'M']
    // ]);
    dd('success');



 
    //     // ]);
    //     $this->form = [
          
    //     ];

    //     Product::create($this->form);
        
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
 
    private function Validation()
    {
        $this->validate([
            'name' => 'required',
            'description'  => '',
            'qty'  => 'required|numeric',
            'orp'  => 'required|numeric',
            'price'  => 'required|numeric',
            'category_id'  => 'required|numeric',
            'color_id'  => 'required|numeric',
            'size_id'  => 'required|numeric',
            'gender'  => 'required',
        ]);
 
    }
   

}
