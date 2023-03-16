<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ShopController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::take(5)->get();
        $colors = Color::take(5)->get();
       
        // return Product::paginate(5);
        return view('pages.shop', [
            'categories' => $categories,
            'brands' => $brands,
            'colors' => $colors,
        ]);
    }
}
