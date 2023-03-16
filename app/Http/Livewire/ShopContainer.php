<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class ShopContainer extends Component
{
    use WithPagination;

    public $categories;
    public $selectedCategory;

    public $category;

    public $brands;
    public $colors;


    //filters
    public $selectedBrands;
    public $selectedColors;
    public $search;
    public $sort;
    public $minPrice;
    public $maxPrice;


    // public $products;
    //add query string variable
    protected $queryString = [
        'category',
        'search' => ['except' => ''],
        'sort' => ['except' => ''],
        'minPrice' => ['except' => ''],
        'maxPrice' => ['except' => ''],
        'selectedBrands' => ['except' => ''],
        'selectedColors' => ['except' => ''],
        
    ];


    public function mount($categories, $brands, $colors)
    {

        //get quey param of category
        $this->categories = $categories;
        // dd($this->products);
        $this->brands = $brands;
        $this->colors = $colors;
    }
    public function render()
    {
        $this->selectedCategory = Category::where('id', request()->query('category'))->first();
        $products = $this->selectedCategory  ? $this->selectedCategory->products()->paginate(1) : $this->getProductsProperty();
        return view('livewire.shop-container', compact('products'));
    }

    //get products with filters from query string
    public function getProductsProperty()
    {
        $products = Product::query();

        // dd($this->selectedBrands);

        //filter by category
        if ($this->category) {
            $products->where('category_id', $this->category);
        }

        //filter by search
        if ($this->search) {
            $products->where('name', 'like', '%' . $this->search . '%');
        }

        //filter by sort
        if ($this->sort) {
            if ($this->sort == 'low-high') {
                $products->orderBy('price', 'asc');
            } elseif ($this->sort == 'high-low') {
                $products->orderBy('price', 'desc');
            }
        }

        //filter by price
        if ($this->minPrice) {

            $products->whereHas('prices', function ($query) {
                $query->where('price', '>=', $this->minPrice);
            });
        }
        if ($this->maxPrice) {
            $products->whereHas('prices', function ($query) {
                $query->where('price', '<=', $this->maxPrice);
            });
        }


        //filter by brands ID
        if ($this->selectedBrands) {
            $products->whereHas('brand', function ($query) {
                $query->whereIn('brand_id', $this->selectedBrands);
            });
        }

        //filter by colors
        if ($this->selectedColors) {
            $products->whereHas('colors', function ($query) {
                $query->whereIn('color_id', $this->selectedColors);
            });
        }

        return $products->paginate(25);
    }
}
