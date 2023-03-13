@extends('app')

@section('content')
 <main id="content" role="main" class="checkout-page">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a
                                    href="/">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                Checkout</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <div class="mb-5">
                <h1 class="text-center">Checkout</h1>
            </div>
           
            <form class="js-validate" novalidate="novalidate">
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
                                            <tr class="cart_item">
                                                <td>Ultra Wireless S50 Headphones S50 with Bluetooth&nbsp;<strong
                                                        class="product-quantity">× 1</strong></td>
                                                <td>$1,100.00</td>
                                            </tr>
                                            <tr class="cart_item">
                                                <td>Widescreen NX Mini F1 SMART NX&nbsp;<strong
                                                        class="product-quantity">× 1</strong></td>
                                                <td>$685.00</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>$1,785.00</td>
                                            </tr>
                                            <tr>
                                                <th>Shipping</th>
                                                <td>Flat rate $300.00</td>
                                            </tr>
                                            <tr>
                                                <th>Total</th>
                                                <td><strong>$2,085.00</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <!-- End Product Content -->
                                   
                                    <div class="form-group d-flex align-items-center justify-content-between px-3 mb-5">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck10"
                                                required data-msg="Please agree terms and conditions."
                                                data-error-class="u-has-error" data-success-class="u-has-success">
                                            <label class="form-check-label form-label" for="defaultCheck10">
                                                I have read and agree to the website <a href="#" class="text-blue">terms
                                                    and conditions </a>
                                                <span class="text-danger">*</span>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary-dark-w btn-block btn-pill font-size-20 mb-3 py-3">Place
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
                                <h3 class="section-title mb-0 pb-2 font-size-25">Billing details</h3>
                            </div>
                            <!-- End Title -->

                            <!-- Billing Form -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            First name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="firstName" placeholder="Jack"
                                            aria-label="Jack" required="" data-msg="Please enter your frist name."
                                            data-error-class="u-has-error" data-success-class="u-has-success"
                                            autocomplete="off">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Last name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="lastName" placeholder="Wayley"
                                            aria-label="Wayley" required="" data-msg="Please enter your last name."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
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
                                        <input type="text" class="form-control" name="companyName"
                                            placeholder="Company Name" aria-label="Company Name"
                                            data-msg="Please enter a company name." data-error-class="u-has-error"
                                            data-success-class="u-has-success">
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
                                        <input type="text" class="form-control" name="streetAddress"
                                            placeholder="470 Lucy Forks" aria-label="470 Lucy Forks" required=""
                                            data-msg="Please enter a valid address." data-error-class="u-has-error"
                                            data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-4">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Apt, suite, etc.
                                        </label>
                                        <input type="text" class="form-control" placeholder="YC7B 3UT"
                                            aria-label="YC7B 3UT" data-msg="Please enter a valid address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            City
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="cityAddress" placeholder="London"
                                            aria-label="London" required="" data-msg="Please enter a valid address."
                                            data-error-class="u-has-error" data-success-class="u-has-success"
                                            autocomplete="off">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Postcode/Zip
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="postcode" placeholder="99999"
                                            aria-label="99999" required=""
                                            data-msg="Please enter a postcode or zip code."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="w-100"></div>

                                <div class="col-md-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            State
                                            <span class="text-danger">*</span>
                                        </label>
                                        <select class="form-control js-select selectpicker dropdown-select" required=""
                                            data-msg="Please select state." data-error-class="u-has-error"
                                            data-success-class="u-has-success" data-live-search="true"
                                            data-style="form-control border-color-1 font-weight-normal">
                                            <option value="">Select state</option>
                                          
                                        </select>
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
                                        <input type="email" class="form-control" name="emailAddress"
                                            placeholder="jackwayley@gmail.com" aria-label="jackwayley@gmail.com"
                                            required="" data-msg="Please enter a valid email address."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-6">
                                        <label class="form-label">
                                            Phone
                                        </label>
                                        <input type="text" class="form-control" placeholder="+1 (062) 109-9222"
                                            aria-label="+1 (062) 109-9222" data-msg="Please enter your last name."
                                            data-error-class="u-has-error" data-success-class="u-has-success">
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
                                    <textarea class="form-control p-5" rows="4" name="text"
                                        placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@stop