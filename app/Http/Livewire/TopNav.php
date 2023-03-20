<?php

namespace App\Http\Livewire;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Livewire\Component;

class TopNav extends Component
{
    protected $listeners = ['addToCart' => 'refreshComponent'];
    public $category;
    public $search;


    // public $products;
    //add query string variable
    // protected $queryString = [
    //     'category',
    //     'search' => ['except' => ''],

    // ];

    public function mount()
    {
        $this->cart = auth()->check() ? auth()->user()->getCart() : null;

        //get quey param of category
        $this->category = request()->query('category');
        // dd($this->products);
        //get search query param
        $this->search = request()->query('search');
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

    //search function
    public function search()
    {
        $query = request()->query();

        return redirect()->route('shop', $query);


    }
}
