<?php

namespace App\Http\Livewire\Template;

use Livewire\Component;
use App\Models\Color;
use App\Models\Size;
use App\Services\GenderService;
class ProductsSidebar extends Component
{

    public $selected = [
        'colors' => [],
        'sizes' => [],
        'gender' => []
    ];


    public function render(GenderService $genderService)
    {
        
        $colors = Color::withCount(['products' => function ($query){
            $query->withFilters(
                [],
                $this->selected['sizes'],
                $this->selected['gender']
            );
        }])->get();

        $sizes = Size::withCount(['products' => function ($query){
            $query->withFilters(
                $this->selected['colors'],
                [],
                $this->selected['gender']
            );
        }])->get();

        $genders = $genderService->getGender(
            $this->selected['colors'],
            $this->selected['sizes'],
            [],
        );


        return view('livewire.template.products-sidebar', compact('colors', 'sizes', 'genders'));
    }

    public function updatedSelected()
    {
        
        $this->emit('updatedFilter', $this->selected);
    }
}
