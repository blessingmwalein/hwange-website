<form class="" wire:submit.prevent="submitOrder">
    <div class="row">
        <div class="col-lg-5 order-lg-2 mb-7 mb-lg-0">
            <div class="pl-lg-3 ">
                <div class="bg-gray-1 rounded-lg">
                    <!-- Order Summary -->
                    <div class="p-4 mb-4 checkout-table">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Your order</h3>
                        </div>
                        <!-- End Title -->

                        <!-- Product Content -->
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-name">Product</th>
                                    <th class="product-total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart->cartItems as $item)
                                    <tr class="cart_item">
                                        <td>{{ $item->product->name }}<strong class="product-quantity">×
                                                {{ $item->quantity }}</strong></td>
                                        <td>{{ $item->product->getMainPrice()->currency->symbol }}{{ $item->product->getMainPrice()->price * $item->quantity }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>${{ $cart->total }}</td>
                                </tr>
                                <tr>
                                    <th>Additional Costs</th>
                                    <td>Flat rate $0</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td><strong>${{ $cart->total }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>


                        <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck10"
                                    data-msg="Please agree terms and conditions." data-error-class="u-has-error"
                                    data-success-class="u-has-success">
                                <label class="form-check-label form-label" for="defaultCheck10">
                                    I have read and agree to the website <a href="#" class="text-blue">terms
                                        and conditions </a>
                                    <span class="text-danger">*</span>
                                </label>
                            </div>
                        </div>
                        <button type="submit"
                            class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3 text-white">Place
                            order</button>
                    </div>
                    <!-- End Order Summary -->
                </div>
            </div>
        </div>

        <div class="col-lg-7 order-lg-1">
            <div class="pb-7 mb-7">
                <!-- Title -->
                <div class="border-bottom border-color-1 mb-5">
                    <h3 class="section-title mb-0 pb-2 font-size-25">Customer details</h3>
                </div>
                <!-- End Title -->

                <!-- Billing Form -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Full Name
                                <span class="text-danger">*</span>
                            </label>
                            <input wire:model="name" type="text" class="form-control" name="firstName"
                                data-msg="Please enter your frist name." data-error-class="u-has-error"
                                data-success-class="u-has-success" autocomplete="off">
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="w-100"></div>

                    <div class="col-md-12">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Company name (optional)
                            </label>
                            <input wire:model="company" type="text" class="form-control" name="companyName"
                                aria-label="Company Name" data-msg="Please enter a company name."
                                data-error-class="u-has-error" data-success-class="u-has-success">
                            @error('company')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End Input -->
                    </div>



                    <div class="col-md-8">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Street address
                                <span class="text-danger">*</span>
                            </label>
                            <input wire:model="address" type="text" class="form-control" name="streetAddress"
                                aria-label="470 Lucy Forks" data-msg="Please enter a valid address."
                                data-error-class="u-has-error" data-success-class="u-has-success">
                            @error('address')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="col-md-4">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                City
                            </label>
                            <input wire:model="city" type="text" class="form-control" aria-label="YC7B 3UT"
                                data-msg="Please enter a valid address." data-error-class="u-has-error"
                                data-success-class="u-has-success">
                            @error('city')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End Input -->
                    </div>


                    <div class="col-md-6">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Email address
                                <span class="text-danger">*</span>
                            </label>
                            <input wire:model="email" type="email" class="form-control" name="emailAddress"
                                placeholder="example@gmail.com" aria-label="jackwayley@gmail.com"
                                data-msg="Please enter a valid email address." data-error-class="u-has-error"
                                data-success-class="u-has-success">
                            @error('email')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="col-md-6">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Phone
                            </label>
                            <input wire:model="phone_number" type="text" class="form-control"
                                aria-label="+1 (062) 109-9222" data-msg="Please enter your last name."
                                data-error-class="u-has-error" data-success-class="u-has-success">
                            @error('phone_number')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End Input -->
                    </div>
                    <div class="col-md-6">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Currency
                                <span class="text-danger">*</span>
                            </label>
                            <select class="form-control btn-block col-12 px-0"
                                data-style="btn-sm bg-white font-weight-normal py-2 border" wire:model="currency_id">
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}">
                                        {{ $currency->name }}</option>
                                @endforeach
                            </select>
                            @error('currency_id')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="col-md-6">
                        <!-- Input -->
                        <div class="js-form-message mb-6">
                            <label class="form-label">
                                Payment Method
                            </label>
                            <select class="form-control btn-block col-12 px-0"
                                data-style="btn-sm bg-white font-weight-normal py-2 border"
                                wire:model="payment_method_id">
                                @foreach ($paymentMethods as $method)
                                    <option value="{{ $method->id }}">
                                        {{ $method->name }}</option>
                                @endforeach
                            </select>
                            @error('payment_method_id')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- End Input -->
                    </div>

                    <div class="w-100"></div>
                </div>


                <div class="js-form-message mb-6">
                    <label class="form-label">
                        Order notes (optional)
                    </label>

                    <div class="input-group">
                        <textarea wire:model="order_notes" class="form-control p-5" rows="4" name="text"
                            placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
