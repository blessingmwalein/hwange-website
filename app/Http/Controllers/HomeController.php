<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): Factory|View|Application
    {
        // $categories = Category::all();
        // $randomCategory = $categories->count() > 3 ? $categories->random(3) : $categories->random($categories->count());
        // $categoryWithProducts = Category::with('products')->get();
        // $randomCategoryWithProducts = $categoryWithProducts->count() > 7 ? $categoryWithProducts->random(7) : $categoryWithProducts->random($categoryWithProducts->count());

        return view('pages.home');
    }
}
