<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeSliderBanner extends Component
{
    public function render()
    {
        //get slider 3 products
        //get promotional products
        $promotionProducts = Product::where('isOnPromotion', true)->take(3);
        $sliderProducts = Product::all()->shuffle()->take(3);

        return view('livewire.home-slider-banner', [
            'sliderProducts' => $sliderProducts,
            'promotionProducts'=> $promotionProducts->count()  == 3 ? $promotionProducts : $sliderProducts 
        ]);
    }
}
