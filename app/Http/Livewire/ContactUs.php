<?php

namespace App\Http\Livewire;

use App\Models\Brand;
use App\Models\Contact;
use Livewire\Component;

class ContactUs extends Component
{
    public function render()
    {
        return view('livewire.contact-us',
            [
                'brands' => Brand::inRandomOrder()->take(3)->get(),
                'about' => \App\Models\About::first(),
                'contacts' => Contact::all(),
            ]
        );
    }
}
