<?php

namespace App\Http\Livewire\Admin\Modals;

use Livewire\Component;
use App\Models\Size;
class CreateSize extends Component
{
   
    public $sizeId, $name, $code;

    
    protected $listeners = ['addSize'];
  
    public function render()
    {
        return view('livewire.admin.modals.create-size');
    }

    //Show modal add
    public function addSize($sizeId)
    {
        
        if($sizeId){
            $this->sizeId = $sizeId;
            $size = Size::findOrFail($sizeId);
            $this->name = $size->name;
            $this->code = $size->code;
        }

        else{
            $this->clearVars();
        }
        $this->dispatchBrowserEvent('openModalSize');
    }

 

    private function clearVars()
    {
        $this->name = null;
        $this->code = null;
    }


     //Save Category
     public function save(){


        $this->validate([

            'name' => 'required|unique:sizes,name,'.$this->sizeId,
            'code' => 'required|unique:sizes,code,'.$this->sizeId,
        ]);
        

        //UPDATE
        if($this->sizeId)
        {
            Size::findOrFail($this->sizeId)->update([
                'name' => $this->name,
                'code' => $this->code
            ]);
       
            $message = $this->name.' size updated successfully!';
        }
        
        //ADD
        else
        {        
            Size::create([
                'name' => $this->name, 
                'code' => $this->code,
            ]);
            $message = $this->name.' size added successfully!';
        }
        $this->emit('updatedSizes');
        $this->clearVars();
        $this->dispatchBrowserEvent('closeModalSize');
        $this->dispatchBrowserEvent('successAlert', ['message' => $message]);
     
    }
}
