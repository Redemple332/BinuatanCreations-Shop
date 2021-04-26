<?php

namespace App\Http\Livewire\Admin\Catalog;

use Livewire\Component;
use App\Models\Size;
class Sizes extends Component
{
   
    public $sizeId;

    protected $listeners = ['deleteConfirmed' , 'updatedSizes' => 'mount'];

    public function render()
    {
        return view('livewire.admin.catalog.sizes', [
            'sizes' => Size::orderBy('name')->get(),])
        ->extends('livewire.admin.layouts.app');
    }


    public function mount()
    {
        $this->sizes = Size::orderBy('name')->get();
    }

    public function delete($sizeId){
        $this->sizeId =  $sizeId;
        $this->dispatchBrowserEvent('deleteModal');
    }

    public function deleteConfirmed()
    {
        $size = Size::findOrFail($this->sizeId);
        $sizeId = $size->name;
        $size->delete();
        $this->dispatchBrowserEvent('successDelete', ['message' => $sizeId.' size deleted successfully!' ]);

    }

    public function status($sizeId, $status)
    {  
        $this->sizeId =  $sizeId;
        $col = Size::findOrFail($this->sizeId);
        
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
