<div class="container">
    <div class="mb-4">
        <h1 class="text-center">Cart</h1>
    </div>
    <div class="mb-10 cart-table">
        <form class="mb-4" action="#" method="post">
            <table class="table" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-remove">&nbsp;</th>
                        <th class="product-thumbnail">&nbsp;</th>
                        <th class="product-name">Product</th>
                        <th class="product-price">Price</th>
                        <th class="product-quantity w-lg-15">Quantity</th>
                        <th class="product-subtotal">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cart->cartItems as $item)
                        <tr class="">
                            <td class="text-center">
                                <a href="#" wire:click.prevent="removeItem({{ $item->id }})"
                                    class="text-gray-32 font-size-26">×</a>
                            </td>
                            <td class="d-none d-md-table-cell">
                                <a href="#"><img class="img-fluid max-width-100 p-1 border border-color-1"
                                        src="/storage/{{ $item->product->images[0]->image }}"
                                        alt="Image Description"></a>
                            </td>

                            <td data-title="Product">
                                <a href="#" class="text-gray-90">{{ $item->product->name }}</a>
                            </td>

                            <td data-title="Price">
                                <span class="">${{ $item->product->getMainPrice()->price }}</span>
                            </td>

                            <td data-title="Quantity">
                                <span class="sr-only">Quantity</span>
                                <!-- Quantity -->
                                <div class="border rounded-pill py-1 width-122 w-xl-80 px-3 border-color-1">
                                    <div class="js-quantity row align-items-center">
                                        <div class="col">
                                            <input
                                                wire:change="updateQuantity({{ $item->id }}, $event.target.value)"
                                                class="js-result form-control h-auto border-0 rounded p-0 shadow-none"
                                                type="text" value="{{ $item->quantity }}">
                                        </div>
                                        <div class="col-auto pr-1">
                                            <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                href="javascript:;"
                                                wire:click.prevent="decreaseQty({{ $item->id }})">
                                                <small class="fas fa-minus btn-icon__inner"></small>
                                            </a>
                                            <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                                                href="javascript:;"wire:click.prevent="increateQty({{ $item->id }})">
                                                <small class="fas fa-plus btn-icon__inner"></small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Quantity -->
                            </td>

                            <td data-title="Total">
                                <span
                                    class="">${{ $item->quantity * $item->product->getMainPrice()->price }}</span>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                    <tr>
                        <td colspan="6" class="border-top space-top-2 justify-content-center">
                            <div class="pt-md-3">
                                <div class="d-block d-md-flex flex-center-between">
                                    <div class="mb-3 mb-md-0 w-xl-40">
                                        <!-- Apply coupon Form -->


                                        <!-- End Apply coupon Form -->
                                    </div>
                                    <div class="d-md-flex">
                                        
                                        <a href="/checkout"
                                            class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-none d-md-inline-block text-white">Proceed
                                            to checkout</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>


                </tbody>
            </table>
        </form>
    </div>
    <div class="mb-8 cart-total">
        <div class="row">
            <div class="col-xl-5 col-lg-6 offset-lg-6 offset-xl-7 col-md-8 offset-md-4">
                <div class="border-bottom border-color-1 mb-3">
                    <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Cart totals</h3>
                </div>
                <table class="table mb-3 mb-md-0">
                    <tbody>
                        <tr class="cart-subtotal">
                            <th>Subtotal</th>
                            <td data-title="Subtotal"><span class="amount">${{ $cart->total }}</span></td>
                        </tr>
                        <tr class="shipping">
                            <th>Additional Costs</th>
                            <td data-title="Shipping">
                                Flat Rate: <span class="amount">$0</span>
                                <div class="mt-1">
                                    <a class="font-size-12 text-gray-90 text-decoration-on underline-on-hover font-weight-bold mb-3 d-inline-block"
                                        data-toggle="collapse" href="#collapseExample" role="button"
                                        aria-expanded="false" aria-controls="collapseExample">
                                        Calculate
                                    </a>

                                </div>
                            </td>
                        </tr>
                        <tr class="order-total">
                            <th>Total</th>
                            <td data-title="Total"><strong><span class="amount">${{ $cart->total }}</span></strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <button type="button"
                    class="btn btn-primary-dark-w ml-md-2 px-5 px-md-4 px-lg-5 w-100 w-md-auto d-md-none">Proceed
                    to checkout</button>
            </div>
        </div>
    </div>
</div>
