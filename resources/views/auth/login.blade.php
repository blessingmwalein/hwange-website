<x-app-layout>

    <main id="content" role="main">
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">Login
                            </li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>

        <div class="container">
            <div class="mb-4">
                <h1 class="text-center">Sign In My Account</h1>
            </div>
            <div class="my-4 my-xl-8">
                <div class="row">
                    <div class="col-md-5 ml-xl-auto mr-md-auto mr-xl-0 mb-8 mb-md-0">
                        <!-- Title -->
                        <div class="border-bottom border-color-1 mb-6">
                            <h3 class="d-inline-block section-title mb-0 pb-2 font-size-26">Login</h3>
                        </div>
                        <p class="text-gray-90 mb-4">Welcome back! Sign in to your account.</p>
                        <!-- End Title -->
                        <x-validation-errors class="mb-4 alert alert-danger rounded" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="js-validate" method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrEmailExample3">Username or Email address
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" id="email" name="email"
                                    :value="old('email')" autofocus autocomplete="username" required>
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="form-label" for="signinSrPasswordExample2">Password <span
                                        class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" required
                                    autocomplete="current-password">
                            </div>
                            <!-- End Form Group -->

                            <!-- Checkbox -->
                            <div class="js-form-message mb-3">
                                <div class="custom-control custom-checkbox d-flex align-items-center">
                                    <input type="checkbox" class="custom-control-input" id="remember_me"
                                        name="remember">
                                    <label class="custom-control-label form-label" for="rememberCheckbox">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <!-- End Checkbox -->

                            <!-- Button -->
                            <div class="mb-1">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary-dark-w px-5 text-white">Login</button>
                                </div>
                                <div class="mb-2">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="text-blue" href="#">Lost
                                            your password?</a>
                                    @endif

                                </div>
                            </div>
                            <!-- End Button -->
                        </form>
                    </div>
                    <div class="col-md-1 d-none d-md-block">
                        <div class="flex-content-center h-100">
                            <div class="width-1 bg-1 h-100"></div>
                            <div
                                class="width-50 height-50 border border-color-1 rounded-circle flex-content-center font-italic bg-white position-absolute">
                                or</div>
                        </div>
                    </div>
                    <div class="col-md-5 ml-md-auto ml-xl-0 mr-xl-auto">
                        
                        <div class="max-width-1100-wd">
                            <article class="card mb-13 border-0">
                                <div class="js-slick-carousel u-slick overflow-hidden"
                                    data-pagi-classes="js-pagination u-slick__pagination u-slick__pagination--long u-slick__pagination--hover mb-0">
                                    <div class="js-slide">
                                        <a href="#" class="d-block"><img class="img-fluid"
                                                src="/assets/img/1500X730/img1.jpg" alt="Image Description"></a>
                                    </div>
                                    <div class="js-slide">
                                        <a href="#" class="d-block"><img class="img-fluid"
                                                src="/assets/img/1500X730/img2.jpg" alt="Image Description"></a>
                                    </div>
                                    <div class="js-slide">
                                        <a href="#" class="d-block"><img class="img-fluid"
                                                src="/assets/img/1500X730/img3.jpg" alt="Image Description"></a>
                                    </div>
                                    <div class="js-slide">
                                        <a href="#" class="d-block"><img class="img-fluid"
                                                src="/assets/img/1500X730/img4.jpg" alt="Image Description"></a>
                                    </div>
                                    <div class="js-slide">
                                        <a href="#" class="d-block"><img class="img-fluid"
                                                src="/assets/img/1500X730/img5.jpg" alt="Image Description"></a>
                                    </div>
                                </div>
                                
                            </article>
                            
                        </div>
                        <h3 class="font-size-18 mb-3">Sign up today and you will be able to :</h3>
                        <ul class="list-group list-group-borderless">
                            <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i>
                                Speed
                                your way through checkout</li>
                            <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i>
                                Track your orders easily</li>
                            <li class="list-group-item px-0"><i class="fas fa-check mr-2 text-green font-size-16"></i>
                                Keep a record of all your purchases</li>
                        </ul>
                        <div class="mb-6">
                                <div class="mb-3">
                                    <a href="/register"
                                        class="btn btn-primary-dark-w px-5 text-white">Click Register</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
