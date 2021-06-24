<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Category;
class Search extends Component
{
    public $search, $categories, $category;


    protected $queryString = [
        'search' => ['except' => ''],
        'category' => ['except' => ''],
    ];

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function render()
    {
       
        return view('livewire.products.search');
    }

    public function search()
    {
        $this->category = null;
        $this->emit('search', $this->search);
        $this->dispatchBrowserEvent('urlChange', ['url' => 'products?search='.$this->search]);
    }

    public function updatedCategory()
    {
       
        $this->search = null; 
        $this->emit('category', $this->category);
        $this->dispatchBrowserEvent('urlChange', ['url' => 'products?category='.$this->category]);
    }
}
