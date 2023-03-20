<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.about'
            , [
                'brands' => Brand::inRandomOrder()->take(3)->get(),
                'about' => \App\Models\About::first()
            ]);
    }
}
