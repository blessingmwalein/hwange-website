<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderTable extends Component
{
    public $orders;


    public function mount($orders)
    {
        $this->orders = $orders;
    }
    public function render()
    {
        return view('livewire.order-table');
    }

    //function to filter order
    public function filterOrders($status)
    {
        //checl for al
        if ($status == 'all') {
            $this->orders = auth()->user()->orders;
            return;
        }
        $this->orders = auth()->user()->orders()->where('status', $status)->get();

        //creaete an array of empty strings with length
        // $this->orders = array_fill(0, count($this->orders), '');

    }
}
