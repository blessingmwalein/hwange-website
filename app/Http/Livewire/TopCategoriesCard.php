<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class TopCategoriesCard extends Component
{
    public function render()
    {
        //take latest 10 categories
        $categories = Category::latest()->take(10)->get();
        return view('livewire.top-categories-card', [
            'categories' => $categories
        ]);
    }
}
