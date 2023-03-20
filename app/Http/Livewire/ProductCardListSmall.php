<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ProductCardListSmall extends Component
{
    public $product;
    public $qty = 1;
    public $color = 'none';

    public function mount($product)
    {
        $this->product = $product;
    }


    public function render()
    {
        return view('livewire.product-card-list-small');
    }

    public function addToCart()
    {
        if (!auth()->check()) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Please login to add product to cart"
            ]);
            return;
        }
        $cart = auth()->user()->getCart();
        //check if product is already in cart
        $cartItem = $cart->cartItems->where('product_id', $this->product->id)->first();
        if ($cartItem) {
            $cartItem->update([
                'quantity' => $cartItem->quantity + $this->qty,
                'color' => $this->color
            ]);
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Product quantity updated"
            ]);
        } else {
            $cart->cartItems()->create([
                'product_id' => $this->product->id,
                'quantity' => $this->qty,
                'color' => $this->color,
            ]);

            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Product added to cart"
            ]);
        }

        $this->emit('addToCart');
    }
}
