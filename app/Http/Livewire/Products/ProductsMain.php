<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductsMain extends Component
{

    use WithPagination;

    public $search;
    public $pagination = 1;
    public $orderBy = 'DESC';
    public $sortBy = 'name';
    
    public $selected = [
        'colors' => [],
        'sizes' => [],
        'gender' => []
    ];

    protected $listeners = ['updatedFilter' => 'setSelected']; 

    protected $queryString = [
        'orderBy' => ['except' => 'DESC'],
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'name'],
    ];


    public function render()
    {

        $products = Product::with('discount')->withFilters(
            $this->selected['colors'],
            $this->selected['sizes'],
            $this->selected['gender']
            
        )
        ->where('qty','>', 0)
        ->where('status', 1)
        ->orderBy($this->sortBy, $this->orderBy)
        ->paginate($this->pagination);
        
        return view('livewire.products.products-main',compact('products'));
    }

    public function orderBy()
    {
        $this->resetPage();
        
        if ($this->orderBy == 'ASC') {
            $this->orderBy ='DESC';
        }
        else{
            $this->orderBy ='ASC';
        }
        $this->dispatchBrowserEvent('urlChange', ['url' => 'products?orderBy='.$this->orderBy.'&sortBy='.$this->sortBy ]);
    }

    public function setSelected($selected)
    {
       
        $this->selected = $selected;
        $this->resetPage();
    }

  
    public function updatedPagination()
    {
        $this->resetPage(); 
    }
}

