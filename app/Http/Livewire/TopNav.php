<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class TopNav extends Component
{
    public function render()
    {
        $categories = Category::all();
        $randomCategory = $categories->count() > 3 ? $categories->random(3) : $categories->random($categories->count());
        $categoryWithProducts = Category::with('products')->get();
        $randomCategoryWithProducts = $categoryWithProducts->count() > 7 ? $categoryWithProducts->random(7) : $categoryWithProducts->random($categoryWithProducts->count());

        return view('livewire.top-nav', [
            'categories' => $categories,
            'randomCategory' => $randomCategory,
            'randomCategoryWithProducts' => $randomCategoryWithProducts,
            'categoryWithProducts' => $categoryWithProducts,
        ]);
    }
}
