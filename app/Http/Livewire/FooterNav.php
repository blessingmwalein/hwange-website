<?php

namespace App\Http\Livewire;

use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use Livewire\Component;

class FooterNav extends Component
{
    public function render()
    {
        return view('livewire.footer-nav',[
            'categories' => Category::inRandomOrder()->take(7)->get(),
            'contacts' => Contact::all(),
            'about'=> About::first()
        ]);
    }
}
