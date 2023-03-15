<?php

namespace App\Http\Livewire;

use App\Models\Currency;
use App\Models\PaymentMethod;
use Livewire\Component;

class Checkout extends Component
{
    public $cart;
    public $name;
    public $email;
    public $address;
    public $city;
    public $company;
    public $phone_number;
    public $order_notes;
    public $currency_id;
    public $payment_method_id;


    protected $rules = [
        'name' => 'required',
        'email' => 'required | email',
        'address' => 'required',
        'city' => 'required',
        'company' => 'required',
        'phone_number' => 'required',
        'currency_id' => 'required',
        'payment_method_id' => 'required',

    ];

    public function mount($cart)
    {
        $this->cart = $cart;
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;

        //if user has customer details
        if (auth()->user()->customerDetails) {
            $this->address = auth()->user()->customerDetails->address;
            $this->city = auth()->user()->customerDetails->city;
            $this->company = auth()->user()->customerDetails->company;
            $this->phone_number = auth()->user()->customerDetails->phone_number;
        }
    }

    public function render()
    {
        return view('livewire.checkout', [
            'cart' => $this->cart,
            'currencies' => Currency::all(),
            'paymentMethods' => PaymentMethod::all(),
        ]);
    }

    //submit order
    public function submitOrder()
    {
        $this->validate();

        $user = auth()->user();
        if ($user->customerDetails) {
            $user->customerDetails()->update([
                'address' => $this->address,
                'city' => $this->city,
                'company' => $this->company,
                'phone_number' => $this->phone_number,
            ]);
        } else {
            $user->customerDetails()->create([
                'address' => $this->address,
                'city' => $this->city,
                'company' => $this->company,
                'phone_number' => $this->phone_number,
            ]);
        }

        $order = auth()->user()->orders()->create([
            'order_notes' => $this->order_notes,
            'total' => $this->cart->total,
            'currency_id' => $this->currency_id,
            'payment_method_id' => $this->payment_method_id
        ]);

        foreach ($this->cart->cartItems as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'color' => $item->color,
            ]);
        }

        $this->cart->cartItems()->delete();
        $this->cart->refresh();

        $this->dispatchBrowserEvent('alert', [
            'type' => 'success',
            'message' => "Order submitted successfully"
        ]);

        return redirect()->route('uers.orders');
    }
}
