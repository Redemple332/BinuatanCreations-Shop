<?php

namespace App\Http\Livewire\Admin\Catalog;

use Livewire\Component;

class Colors extends Component
{
    public $colorId;
    protected $listeners = ['deleteConfirmed'];
    public function render()
    {
        return view('livewire.admin.catalog.colors')->extends('livewire.admin.layouts.app');
    }

    public function save(){
        $this->dispatchBrowserEvent('successAlert');
    }


    public function delete($id){
        $this->colorId =  $id;
        $this->dispatchBrowserEvent('show-delete-modal');
    }
    public function deleteConfirmed()
    {
      dd('asd');

    }
}
