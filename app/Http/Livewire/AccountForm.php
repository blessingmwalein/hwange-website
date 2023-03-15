<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AccountForm extends Component
{
    public $name;
    public $email;
    public $address;
    public $city;
    public $company;
    public $phone_number;




    public function mount()
    {
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
        return view('livewire.account-form');
    }

    //submit form
    public function submit()
    {
        // $this->validate();

        //update user details
        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        //if user has customer details
        if (auth()->user()->customerDetails) {
            auth()->user()->customerDetails->update([
                'address' => $this->address,
                'city' => $this->city,
                'company' => $this->company,
                'phone_number' => $this->phone_number,
            ]);
        } else {
            auth()->user()->customerDetails()->create([
                'address' => $this->address,
                'city' => $this->city,
                'company' => $this->company,
                'phone_number' => $this->phone_number,
            ]);
        }

        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Account details updated"
        ]);
    }
}
