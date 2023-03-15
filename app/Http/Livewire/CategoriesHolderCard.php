<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Termwind\Components\Dd;

class CategoriesHolderCard extends Component
{
    public $selectedCategory;

    public function mount()
    {
        //assign the first category to selected category
      
        $this->selectedCategory = Category::first();
    }



    public function render()
    {
        //take 10 categories in random order
        $categories = Category::inRandomOrder()->take(10)->get();
        return view('livewire.categories-holder-card', [
            'categories' => $categories,
            'selectedCategory' => $this->selectedCategory
        ]);
    }

    //change selected category
    public function changeCategory($id)
    {
    
        $this->selectedCategory = Category::find($id);
    }
}
