<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $cart;

    public function mount($cart)
    {
        $this->cart = $cart;
    }
    public function render()
    {
        return view('livewire.cart');
    }

    //remove item from cart
    public function removeItem($id)
    {
        $this->cart->cartItems()->where('id', $id)->delete();
        $this->cart->refresh();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Product removed from cart"
        ]);
        $this->emit('addToCart');
    }

    public function increateQty($id)
    {
        $this->cart->cartItems()->where('id', $id)->increment('quantity');
        $this->cart->refresh();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Product quantity updated"
        ]);
        $this->emit('addToCart');
    }

    public function decreaseQty($id)
    {

        $this->cart->cartItems()->where('id', $id)->decrement('quantity');
        $this->cart->refresh();

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Product quantity updated"
        ]);
    }

    public function updateQuantity($id, $value)
    {
        //check if value is less than 1 and is numeric
        if ($value < 1 || !is_numeric($value)) {
            
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Product quantity must be greater than 0 and numeric"
            ]);
            $this->emit('addToCart');
            return;
        }
        $this->cart->cartItems()->where('id', $id)->update(['quantity' => $value]);
        $this->cart->refresh();
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Product quantity updated"
        ]);
        $this->emit('addToCart');
    }

}
