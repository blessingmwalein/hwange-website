<?php

namespace App\Http\Livewire;

use App\Models\CartItems;
use App\Models\Color;
use Livewire\Component;
use Orchid\Support\Facades\Toast;
use Termwind\Components\Dd;

class SingleProduct extends Component
{
    public $product;
    public $qty = 1;
    public $color = "none";

    public function mount($product)
    {
        $this->product = $product;
        $this->color =$product->colors->count() > 0 ? $product->colors->first()->name : "none";
    }
    public function render()
    {
        return view('livewire.single-product');
    }

    public function increateQty()
    {
        $this->qty++;
    }

    public function decreaseQty()
    {
        if ($this->qty > 1) {
            $this->qty--;
        }
    }

    public function addToCart()
    {
        //check if user is logged in
        if (!auth()->check()) {
            return redirect()->route('login');
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

        $this->emit('addToCart', $this->product->id, $this->qty);
    }

    public function buyProduct()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $cart = auth()->user()->getCart();
        $cart->cartItems()->delete();
        //check if product is already in cart

        $cart->cartItems()->create([
            'product_id' => $this->product->id,
            'quantity' => $this->qty,
            'color' => $this->color,
        ]);

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Product added to cart"
        ]);


        $this->emit('addToCart', $this->product->id, $this->qty);
        return redirect()->route('checkout');
    }
}
