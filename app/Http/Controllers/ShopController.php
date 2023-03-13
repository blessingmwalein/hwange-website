<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShopController extends Controller
{
    public function index(): Factory|View|Application
    {
        $categories = Category::all();
        $randomCategory = $categories->count() > 2 ? $categories->random(2) : $categories->random($categories->count());
        $categoryWithProducts = Category::with('products')->get();
        $randomCategoryWithProducts = $categoryWithProducts->count() > 7 ? $categoryWithProducts->random(7) : $categoryWithProducts->random($categoryWithProducts->count());

        return view('pages.shop')
            ->with('randomCategory', $randomCategory)
            ->with('categoryWithProducts', $randomCategoryWithProducts)
            ->with('categories', $categories);
    }
}
