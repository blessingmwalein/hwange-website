<?php

namespace App\Http\Livewire;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Livewire\Component;

class TopNav extends Component
{
    public function render()
    {
        $categories = Category::all();
      
        return view('livewire.top-nav', [
            'categoryWithProducts' => CategoryResource::collection($categories),
            'randomCategory' => CategoryResource::collection($categories->take(3)),
            'randomCategoryWithProducts' =>  CategoryResource::collection($categories->take(7)),
            'categoryWithProducts' => CategoryResource::collection($categories->take(7))
        ]);
    }
}
