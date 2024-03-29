<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $categories = Category::all();
        $randomCategory = $categories->count() > 3 ? $categories->random(3) : $categories->random($categories->count());
        $categoryWithProducts = Category::with('products')->get();
        $randomCategoryWithProducts = $categoryWithProducts->count() > 7 ? $categoryWithProducts->random(7) : $categoryWithProducts->random($categoryWithProducts->count());

        return view('layouts.app', [
            'categories' => $categories,
            'randomCategory' => $randomCategory,
            'randomCategoryWithProducts' => $randomCategoryWithProducts,
        ]);
    }
}
