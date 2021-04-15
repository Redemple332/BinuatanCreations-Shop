<?php

namespace App\Http\Livewire\Admin\Catalog;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class Categories extends Component
{

    use WithFileUploads;

    protected $listeners = ['deleteConfirmed'];

    public $category,$photo;

    public $categoryId, $image;
  
    public function render()
    {

        return view('livewire.admin.catalog.categories', [
            'categories' => Category::all(),
        ])
        ->extends('livewire.admin.layouts.app');
    }

    public function add(){
        $this->clearVars();
        $this->dispatchBrowserEvent('openModalCategory');
    }

    public function edit($categoryId){

        $category = Category::findOrFail($categoryId);
        $this->image    = $category->imagePath;
        $this->category = $category->category;
        $this->categoryId = $categoryId;
        $this->dispatchBrowserEvent('openModalCategory');
    }

    public function save(){


        $this->validate([

            'category' => 'required|unique:categories,category,'.$this->categoryId,
            'photo'    => 'required|image|max:1024file|mimes:png,jpg', // 1MB Max
        ]);
        
        if($this->photo){
            $filename =  $this->photo->store('public/category_images');
            $this->image = basename($filename);
        }

        //UPDATE
        if($this->categoryId)
        {
                
            // Category::findOrFail($categoryId)->update([
                
            // ]);
           $cat = Category::findOrFail($this->categoryId);
           $cat->category = $this->category;

           if($this->photo){
            $cat->image = $this->image;
           }
           $cat->save();
           $message = $this->category.' category updated successfully!';
        }
        
        //ADD
        else
        {        
            Category::create([
                'category' => $this->category, 
                'image' => $this->image,
            ]);

            $message = $this->category.' category added successfully!';
        }
        
        $this->clearVars();

        $this->dispatchBrowserEvent('closeModalCategory');

        $this->dispatchBrowserEvent('successAlert', ['message' => $message]);

     
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

    private function clearVars()
    {
        $this->category = null;
        $this->photo = null;
        $this->categoryId = null;
        $this->image = null;
    }
    
    public function updatedPhoto(){
        $this->validate([
            'photo' => 'required|image|max:1024file|mimes:png,jpg', // 1MB Max
        ]);
    }

}
