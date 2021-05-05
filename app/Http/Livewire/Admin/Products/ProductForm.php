<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Category;
use App\Models\Promo;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;

class ProductForm extends Component
{
   
    use WithFileUploads;

 
    public $photos = [];
    public  $images;
    public $color,$size,$category;
    public $product;

    public $form = [

        'name' => '',
        'description'  => '',
        'qty'          => '',
        'orp'          => '',
        'price'        => '',
        'gender'       => 'MEN AND WOMEN',
        'category_id'  => null,
        'color_id'     => null,
        'size_id'      => null,
        'ship'         => false,
        'status'       => true,
    ];

    protected $listeners = ['updatedCategories', 'updatedColors', 'updatedSizes'];


    public function mount($product)
    {
        $this->product = null;

        if($product){
            $this->product = $product;
          
            $size = Size::where($this->product->id);
          
            $this->form = [
                'name'         => $this->product->name,
                'description'  => $this->product->description,
                'qty'          => $this->product->qty,
                'orp'          => $this->product->orp,
                'price'        => $this->product->price,
                'gender'       => $this->product->gender,
                'category_id'  => $this->product->category_id,
                'color_id'     => $this->product->color_id,
                'size_id'      => $this->product->size_id,
                'ship'         => $this->product->ship,
                'status'       => $this->product->status,
            ];
            $this->images = ProductImage::where('product_id',$this->product->id)->get();
        }
        else{
            $this->reset();
        }
    }

    public function render()
    {

        $categories = Category::where('status', 1)->orderBy('category', 'ASC')->get();

        $colors = Color::where('status', 1)->orderBy('name', 'ASC')->get();

        $sizes = Size::where('status', 1)->orderBy('name', 'ASC')->get();
       
        $data = [
            'categories' => $categories,
            'colors' => $colors,
            'sizes' => $sizes,
           
        ];
 
        return view('livewire.admin.products.product-form')->extends('livewire.admin.layouts.app')->with($data);
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
           
        $this->Validation();

        if($this->product){
            
            $product = Product::findOrFail($this->product->id)
            ->update($this->form);

            if($this->photos){

                foreach ($this->photos as $photo) {
                    $filename =  $photo->store('public/product_images');
                    $this->image = basename($filename);   

                    ProductImage::create([
                        'product_id' => $this->product->id  , 
                        'image' => $this->image,
                    ]); 
                }

            }

            session()->flash('message', $this->product->name.' product successfully updated.');
            return redirect()->to('admin/products');
        }
        
        else{

            $newProduct  =  Product::create($this->form);
        
            //Save Image
            foreach ($this->photos as $photo) {

                $filename =  $photo->store('public/product_images');
                $this->image = basename($filename);   

                ProductImage::create([
                    'product_id' => $newProduct->id  , 
                    'image' => $this->image,
                ]); 
            }
            
            $message = $newProduct->name.' product added successfully!';
            $this->reset();
        }
        
        $this->dispatchBrowserEvent('successAlert', ['message' => $message]);

            
    }

    public function deleteImage($imageId){
       
       ProductImage::destroy($imageId);
       $this->dispatchBrowserEvent('successAlert', ['message' => 'Image remove Sucessfuly']);

    }
    public function remove($index)
    {
        array_splice($this->photos, $index , 1);
    }


    private function Validation()
    {
      
        $this->validate([
            'form.name' => 'required',
            'form.description'  => 'required',
            'form.qty'  => 'required|numeric',
            'form.orp'  => 'required|numeric',
            'form.price'  => 'required|numeric',
            'form.category_id'  => 'required|numeric',
            'form.color_id'  => 'required|numeric',
            'form.size_id'  => 'required|numeric',
            'form.gender'  => 'required',
            // 'photos' => 'required'
        ]);
 
    }
   
 

}
