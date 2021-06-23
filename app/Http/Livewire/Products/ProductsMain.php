<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductsMain extends Component
{

    use WithPagination;

    public $search, $category;
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
        'category' => ['except' => ''],
    ];


    public function render()
    {

        if($this->category){

            $products = Product::with('discount')->withFilters(
                $this->selected['colors'],
                $this->selected['sizes'],
                $this->selected['gender']
                
            )
            ->whereHas('category',function ($query){
                return $query->where('category',$this->category); 
            });

            $this->sortBy == 'percent' 
            && $products = $products->WithOrds();
            $this->sortBy != 'percent'  && $products = $products->orderBy($this->sortBy, $this->orderBy);

            $products = $products
            ->groupBy('name')
            ->where('qty','>', 0)
            ->where('status', 1)
            ->paginate($this->pagination);

        }
        elseif($this->search){

        }
        else{          
            $products = Product::with('discount')->withFilters(
                $this->selected['colors'],
                $this->selected['sizes'],
                $this->selected['gender'] 
            );

            $this->sortBy == 'percent' 
            && $products = $products->WithOrds();
            $this->sortBy != 'percent'  && $products = $products->orderBy($this->sortBy, $this->orderBy);

            $products = $products
            ->groupBy('name')
            ->where('qty','>', 0)
            ->where('status', 1)
            ->paginate($this->pagination);
        }
     
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


