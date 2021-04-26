<?php

namespace App\Http\Livewire\Admin\Catalog;

use Livewire\Component;
use App\Models\Color;

class Colors extends Component
{
   

    public $colorId;

    protected $listeners = ['deleteConfirmed' , 'updateColors' => 'mount'];

    public function render()
    {
        return view('livewire.admin.catalog.colors', [
            'colors' => Color::orderBy('name')->get(),])
        ->extends('livewire.admin.layouts.app');
    }


    public function mount()
    {
        $this->colors = Color::orderBy('name')->get();
    }

    public function delete($colorId){
        $this->colorId =  $colorId;
        $this->dispatchBrowserEvent('deleteModal');
    }

    public function deleteConfirmed()
    {
        $color = Color::findOrFail($this->colorId);
        $colorId = $color->name;
        $color->delete();
        $this->dispatchBrowserEvent('successDelete', ['message' => $colorId.' color deleted successfully!' ]);

    }

    public function status($colorId, $status)
    {  
        $this->colorId =  $colorId;
        $col = Color::findOrFail($this->colorId);
        
        if($status == 0)
        {
            $col->status = 1;
        }
        else
        {
            $col->status = 0;
        }
        $col->save();    
    }

  

    
}
