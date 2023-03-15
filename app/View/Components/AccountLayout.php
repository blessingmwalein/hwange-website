<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;

class AccountLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {

        return view('layouts.account', [
            'orders' => auth()->user()->orders,
            'user' => auth()->user(),
        ]);
    }
}
