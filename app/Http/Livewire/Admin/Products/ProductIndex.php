<?php

namespace App\Http\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;

class ProductIndex extends Component
{
   

    protected $listeners = ['deleteConfirmed'];

    // use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    public $productId;
    public function render()
     {
         //(original_price * discount / 100)
        // $products = Product::with(['color','size','category', 'discount'])->take(3)->get(); 
      $products = Product::with(['color','size','category','discount'])->take(20)->get(); 

        return view('livewire.admin.products.product-index',['products' => $products])->extends('livewire.admin.layouts.app');
    }


    public function delete($productId){
        $this->productId =  $productId;
        $this->dispatchBrowserEvent('deleteModal');
    }

    public function deleteConfirmed()
    {
        
        $product = Product::findOrFail($this->productId);
        $productId = $product->name;
        $product->delete();
        $this->dispatchBrowserEvent('successDelete', ['message' => $productId.' product deleted successfully!' ]);
        
    }

    public function status($productId, $status)
    {  
        $this->productId =  $productId;
        $prod = Product::findOrFail($this->productId);
        
        if($status == 0)
        {
            $prod->status = 1;
        }
        else
        {
            $prod->status = 0;
        }
        $prod->save();    
    }
}
