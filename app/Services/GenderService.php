<?php

namespace App\Services;

use App\Models\Product;

class GenderService
{
    private $gender;
    private $colors;
    private $sizes;

    public function getGender($gender, $colors, $sizes)
    {
        $this->colors = $colors;
        $this->sizes = $sizes;
        $this->gender = $gender;

        $formattedGender = [];

        foreach(Product::GENDER as $index => $name) {
            $formattedGender[] = [
                'name' => $name,
                'products_count' => $this->getProductCount($index)
            ];
        }

        return $formattedGender;
    }

    private function getProductCount($index)
    {
        return Product::withFilters($this->colors, $this->sizes, $this->gender)
            ->when($index == 0, function ($query) {
                $query->where('gender', 'Men');
            })
            ->when($index == 1, function ($query) {
                $query->where('gender', 'Women');
            })
        ->count();
    }
}