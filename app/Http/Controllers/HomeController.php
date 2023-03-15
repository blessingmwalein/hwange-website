<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): Factory|View|Application
    {

        //get 7 latest products
        $latestProducts = Product::latest()->take(7)->get();

        //get top selling products
        $topSellingProducts = Product::orderBy('updated_at', 'desc')->take(7)->get();

        //get on promotion products
        $onPromotion = Product::where('isOnPromotion', 1)->take(7)->get();

        //get cheapest products with price less than 500
        $cheapestProducts = Product::whereHas('prices', function ($query) {
            $query->where('price', '<', 500);
        })->take(7)->get();

        return view('pages.home', [
            'latestProducts' => $latestProducts,
            'topSellingProducts' => $topSellingProducts,
            'onPromotion' => $onPromotion,
            'cheapestProducts' => $cheapestProducts

        ]);
    }
}
