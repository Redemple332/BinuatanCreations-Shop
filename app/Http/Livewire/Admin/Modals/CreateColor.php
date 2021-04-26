<?php

namespace App\Http\Livewire\Admin\Modals;

use Livewire\Component;
use App\Models\Color;

class CreateColor extends Component
{

    public $colorId, $name, $code;

    
    protected $listeners = ['addColor'];
  
    public function render()
    {
        return view('livewire.admin.modals.create-color');
    }

    //Show modal add
    public function addColor($colorId)
    {
        
        if($colorId){
            $this->colorId = $colorId;
            $color = Color::findOrFail($colorId);
            $this->name = $color->name;
            $this->code = $color->code;
        }

        else{
            $this->clearVars();
        }
        $this->dispatchBrowserEvent('openModalColor');
    }

 

    private function clearVars()
    {
        $this->name = null;
        $this->code = null;
    }


     //Save Category
     public function save(){


        $this->validate([

            'name' => 'required|unique:colors,name,'.$this->colorId,
            'code' => 'required|unique:colors,code,'.$this->colorId,
        ]);
        

        //UPDATE
        if($this->colorId)
        {
             Color::findOrFail($this->colorId)->update([
                'name' => $this->name,
                'code' => $this->code
            ]);
       
            $message = $this->name.' color updated successfully!';
        }
        
        //ADD
        else
        {        
            Color::create([
                'name' => $this->name, 
                'code' => $this->code,
            ]);
            $message = $this->name.' color added successfully!';
        }
        $this->emit('updatedColors');
        $this->clearVars();
        $this->dispatchBrowserEvent('closeModalColor');
        $this->dispatchBrowserEvent('successAlert', ['message' => $message]);
     
    }

}
