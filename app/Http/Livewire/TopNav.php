<?php

namespace App\Http\Livewire;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Livewire\Component;

class TopNav extends Component
{
    protected $listeners = ['addToCart' => 'refreshComponent'];
    public $cart;

    public function mount()
    {
        $this->cart = auth()->check() ? auth()->user()->getCart() : null;
    }

    public function render()
    {
        $categories = Category::all();


        //check if user is logged in


        return view('livewire.top-nav', [
            'categoryWithProducts' => CategoryResource::collection($categories),
            'randomCategory' => CategoryResource::collection($categories->take(3)),
            'randomCategoryWithProducts' =>  CategoryResource::collection($categories->take(7)),
            'categoryWithProducts' => CategoryResource::collection($categories->take(7)),
            'cart' => $this->cart
        ]);
    }

    public function refreshComponent()
    {
        // dd($productId, $qty);
        $this->cart->refresh();
    }
}
