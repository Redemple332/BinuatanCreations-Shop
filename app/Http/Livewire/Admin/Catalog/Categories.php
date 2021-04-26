<?php

namespace App\Http\Livewire\Admin\Catalog;

use Livewire\Component;
use App\Models\Category;
class Categories extends Component
{


    protected $listeners = ['deleteConfirmed' , 'updatedCategories' => 'mount'];

    public $categoryId, $image;
  
    public function render()
    {

        return view('livewire.admin.catalog.categories', [
            'categories' => Category::orderBy('category')->get(),])
        ->extends('livewire.admin.layouts.app');
    }

    public function mount()
    {
        $this->categories = Category::orderBy('category')->get();
    }


    public function status($categoryId, $status)
    {  
        $this->categoryId =  $categoryId;
        $categ = Category::findOrFail($this->categoryId);
        
        if($status == 0)
        {
            $categ->status = 1;
        }
        else
        {
            $categ->status = 0;
        }
        $categ->save();    
    }

    public function delete($categoryId){
        $this->categoryId =  $categoryId;
        $this->dispatchBrowserEvent('deleteModal');
    }

    public function deleteConfirmed()
    {
        $category = Category::findOrFail($this->categoryId);
        $categoryId = $category->category;
        $category->delete();
        $this->dispatchBrowserEvent('successDelete', ['message' => $categoryId.' category deleted successfully!' ]);
        
    }
    

    public function showImage($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $image = $category->imagePath;
        $this->dispatchBrowserEvent('showImage', ['image' => $image , 'title' => $category->category, 'text' => 'Category']);
    }



}
