<?php

namespace App\Http\Livewire\Admin\Modals;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;

class CreateCategory extends Component
{
    use WithFileUploads;


    public $category,$photo;

    public $categoryId, $image;

    protected $listeners = ['addCategory', 'editCategory'];
  
    


    public function render()
    {
        return view('livewire.admin.modals.create-category');
    }

    
    private function clearVars()
    {
        $this->category = null;
        $this->photo = null;
        $this->categoryId = null;
        $this->image = null;
    }

    //Show modal add
    public function addCategory()
    {
        $this->clearVars();
        $this->dispatchBrowserEvent('openModalCategory');
    }

    //Show modal edit
    public function editCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);
        $this->image    = $category->imagePath;
        $this->category = $category->category;
        $this->categoryId = $categoryId;
        $this->dispatchBrowserEvent('openModalCategory');
    }

    //Save Category
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
        $this->emit('updatedCategories');
        $this->clearVars();
        $this->dispatchBrowserEvent('closeModalCategory');
        $this->dispatchBrowserEvent('successAlert', ['message' => $message]);
     
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'required|image|max:1024file|mimes:png,jpg', // 1MB Max
        ]);
    }

  

}
