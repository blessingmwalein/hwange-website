<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.orders', [
            'orders' => auth()->user()->orders,
            'user' => auth()->user(),
        ])->layoutData(['page' => 'order']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('pages.order', [
            'order' => $order,
            'user' => auth()->user(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): RedirectResponse
    {
        //
    }
    public function cart()
    {
        return view('pages.cart', [
            'cart' => auth()->user()->getCart(),
        ]);
    }
    public function checkout()
    {
        return view('pages.checkout', [
            'cart' => auth()->user()->getCart(),
        ]);
    }
    public function account()
    {
        return view('pages.account', [
            'orders' => auth()->user()->orders,
            'user' => auth()->user(),
        ])->layoutData(['page' => 'account']);
    }

    public function quote()
    {

        $pdf = PDF::loadView('pages.quote', [
            'cart' => auth()->user()->getCart(),
            'user' => auth()->user(),
        ]);
        return $pdf->stream('quote.pdf');
    }
}
