<?php

namespace App\Http\Livewire\Admin\Modals;

use Livewire\Component;
use App\Models\Discount;
use App\Models\Product;
class CreateDiscount extends Component
{
    
    protected $listeners = ['addDiscount','editDiscount','delete','deleteConfirmed'];

    public $productId,$dicountId;
    public $discount;
    public $discounted_price = '0.00';
    public $price,$name;



    public function updated(){

        $this->validate([
            'discount' => 'numeric|min:1|max:100'
        ]);

        if($this->discount){
            $this->discounted_price = $this->price-($this->price*($this->discount/100));
        }
      
    }

    public function render()
    {
        return view('livewire.admin.modals.create-discount');
    }

    
   

     //Show modal add
     public function addDiscount($productId,$dicountId)
     {
        $this->reset();
        $product = Product::select('price','name')->where('id',$productId)->first();
        $this->productId = $productId;  
        $this->dicountId = $dicountId;  
        $this->price = $product->price;
        $this->name = $product->name;

        //Edit
        if($dicountId){
            $disc = Discount::findOrFail($dicountId);
            $this->discount = $disc->percent;
            $this->dispatchBrowserEvent('openModalDiscount');
        }
        //Add
        else{
            $this->dispatchBrowserEvent('openModalDiscount');
        }
         

        
    }

  

    public function save(){

        $this->validate([
            'discount' => 'required|numeric|min:1|max:100',
        ]);

        if($this->dicountId){
            Discount::findOrFail($this->dicountId)->update([
                'product_id' => $this->productId,
                'percent' => $this->discount, 
            ]);
            $messsage = $this->name.' discount updated successfully!';
        }
        else{
            
            Discount::create([
                'product_id' => $this->productId,
                'percent' => $this->discount, 
            ]);
            
            $messsage = $this->name.' discount added successfully!';
        }
        

        $this->reset();
        $this->dispatchBrowserEvent('closeModalDiscount');
        $this->dispatchBrowserEvent('successAlert', ['message' => $messsage]);
    }

    public function delete($dicountId)
    {
        $this->dicountId = $dicountId;  
        $this->dispatchBrowserEvent('deleteModal');
    }

    public function deleteConfirmed()
    {
        $dis = Discount::findOrFail($this->dicountId);
        $dis->delete();
        $this->dispatchBrowserEvent('successDelete', ['message' =>   'Discount deleted successfully!' ]);

    }
   
}
