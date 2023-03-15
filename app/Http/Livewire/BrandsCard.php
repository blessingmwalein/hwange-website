<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use Livewire\Component;

class BrandsCard extends Component
{
    public function render()
    {
        return view('livewire.brands-card', [
            'brands' => Brand::all()
        ]);
    }
}
