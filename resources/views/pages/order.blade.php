<x-account-layout>
    <div class="profile-content bg-light">
        <header class="py-3 mb-3 border-bottom">
          
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Currency</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->status }}</td>
                                <td>{{ $order->total }}</td>
                                <td>{{ $order->payment->name }}</td>
                                <td>{{ $order->currency->name }}</td>
                                <td>{{ $order->created_at->toDateTimeString() }}</td>
                                <td><a href="#" class="btn px-5 btn-sm btn-primary-dark transition-3d-hover"><i
                                            class="ec ec-eye mr-2 font-size-20"></i>Cancel</a></td>
                            </tr>
                        </tbody>
                    </table>
            
        </header>


        <h3>Order Items</h3>
        <table class="table table-striped">
            @if ($order->items->count() > 0)
                <thead>
                    <tr>
                        <th scope="col">Icon</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Color</th>
                    </tr>
                </thead>
            @endif
            <tbody>

                @forelse ($order->items as $item)
                    <tr>
                        <th scope="row"><img src="/storage/{{ $item->product->images[0]->image }}" alt=""
                                width="50"></th>
                        <td><a href="/product/{{$item->product->slug}}">{{ $item->product->name }}</a></td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->product->getMainPrice()->price }}</td>
                        <td>{{ $item->color }}</td>
                    </tr>
                @empty
                    <div class="alert alert-warning" role="alert">
                        Opps! No Items found.
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>

</x-account-layout>
