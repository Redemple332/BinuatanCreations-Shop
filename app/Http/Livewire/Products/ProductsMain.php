<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class ProductsMain extends Component
{

    use WithPagination;

    public $search, $category;
    public $pagination = 10;
    public $orderBy = 'DESC';
    public $sortBy = 'name';
    
    public $selected = [
        'colors' => [],
        'sizes' => [],
        'gender' => []
    ];

    protected $listeners = ['updatedFilter' => 'setSelected', 'search' => 'searchProduct', 'category' => 'categoryProduct']; 

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
            ->with('images')
            ->whereHas('category',function ($query){
                return $query->where('category',$this->category); 
            });

            $this->sortBy == 'percent' 
            && $products = $products->WithOrds();
            $this->sortBy != 'percent'  && $products = $products->orderBy($this->sortBy, $this->orderBy);

            $products = $products
            ->groupBy('name')
            ->WithStocks()
            ->paginate($this->pagination);

        }

        elseif($this->search){
            $products = Product::with('discount')->withFilters(
                $this->selected['colors'],
                $this->selected['sizes'],
                $this->selected['gender']
                
            )
            ->with('images')
            ->WithStocks()
            ->where('name','like', '%'.$this->search.'%')
            ->Orwhere('gender','like', '%'.$this->search.'%')
            ->Orwhere('description','like', '%'.$this->search.'%')
            ->withSearch($this->search);
            

            $this->sortBy == 'percent' 
            && $products = $products->WithOrds();
            $this->sortBy != 'percent'  && $products = $products->orderBy($this->sortBy, $this->orderBy);
    
            $products = $products
            ->groupBy('name')
            ->paginate($this->pagination);
        }
        
        else{          
            $products = Product::with('discount')->withFilters(
                $this->selected['colors'],
                $this->selected['sizes'],
                $this->selected['gender'] 
            )
            ->with('images');

            $this->sortBy == 'percent' 
            && $products = $products->WithOrds();
            $this->sortBy != 'percent'  && $products = $products->orderBy($this->sortBy, $this->orderBy);

            $products = $products
            ->WithStocks()
            ->groupBy('name')
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

    public function searchProduct($search)
    {
        $this->category = null; 
        $this->search = $search; 
    }

    public function categoryProduct($category)
    {
        $this->search = null; 
        $this->category = $category; 
    }
}


