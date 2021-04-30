<?php

namespace App\Http\Livewire\Admin\Products;
use Livewire\Component;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Livewire\WithFileUploads;

class Create extends Component
{
     
    use WithFileUploads;

    public $photos = [];
    public  $image;
    public $color,$size,$category;
    public $form = [

        'name' => '',
        'slug'         => '',
        'description'  => '',
        'qty'          => '',
        'orp'          => '',
        'price'        => '',
        'sku'          => '',
        'gender'       => 'MEN AND WOMEN',
        'tags'         => '',
        'ship'         => 0,
        'status'       => true,
        'ship'         => false
    ];
    protected $listeners = ['updatedCategories', 'updatedColors', 'updatedSizes'];
    // public $attribute_color,$attribute_category,$attribute_size;


    public function remove($index)
    {
        array_splice($this->photos, $index , 1);
    }

    public function updatedCategories()
    {
        $this->categories = Category::where('status', 1)->orderBy('category', 'ASC')->get();
    }

    public function updatedColors()
    {
        $this->colors =  Color::where('status', 1)->orderBy('name', 'ASC')->get();
    }

    public function updatedSizes()
    {
        $sizes = Size::where('status', 1)->orderBy('name', 'ASC')->get();
    }

    public function save()
    {
        
   
    // $this->Validation();

        
       $product  =  Product::create($this->form);

    //     // UPDATE
        // $product  = Product::findOrFail(2021004);
        // $product->update(['name'  => 'corona']);

    //Save Image
    foreach ($this->photos as $photo) {

        $filename =  $photo->store('public/product_images');
        $this->image = basename($filename);

        ProductImage::create([
            'product_id' => $product->id  , 
            'image' => $this->image,
        ]);    
    }


    //SAVE attributes
    $category = Category::findOrFail($this->category);
    $size = Size::findOrFail($this->size);
    $color = Color::findOrFail($this->color);

    $product->add_attributes()->sync([ 
        1 => ['attribute' => 'Category', 'value' =>  $category->category, 'code' => $category->image],
        2 => ['attribute' => 'Color' , 'value' =>  $color->name, 'code' => $color->code],
        3 => ['attribute' => 'Size', 'value' =>  $size->name, 'code' =>  $size->code],
    ]);

    // $this->clearVars();

 
    //     // ]);
    //     $this->form = [
          
    //     ];

    //     Product::create($this->form);
        
    }

    public function render()
    {
        $categories = Category::where('status', 1)->orderBy('category', 'ASC')->get();

        $colors = Color::where('status', 1)->orderBy('name', 'ASC')->get();

        $sizes = Size::where('status', 1)->orderBy('name', 'ASC')->get();
       
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
            'form.name' => 'required',
            'form.description'  => '',
            'form.qty'  => 'required|numeric',
            'form.orp'  => 'required|numeric',
            'form.price'  => 'required|numeric',
            'form.category_id'  => 'required|numeric',
            'form.color_id'  => 'required|numeric',
            'form.size_id'  => 'required|numeric',
            'form.gender'  => 'required',
            // 'photos' => 'required|image|max:1024file|mimes:png,jpg'
        ]);
 
    }
   
    private function clearVars(){

        $this->form =[
            'name'         => '',
            'slug'         => '',
            'description'  => '',
            'qty'          => '',
            'orp'          => '',
            'price'        => '',
            'sku'          => '',
            'gender'       => '',
            'tags'         => '',
            'ship'         => 0,
            'status'       => true,
            'ship'         => false,
        ];
        $this->category = null;
        $this->size = null;
        $this->color = null;
    }

}
