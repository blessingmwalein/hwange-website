<x-app-layout>
    <main id="content" role="main">
        <!-- Slider & Banner Section -->
        @livewire('home-slider-banner')
        <!-- End Slider & Banner Section -->
        <div class="container">
            <!-- Tab Prodcut Section -->
            <div class="mb-6">
                <!-- Nav Classic -->
                <div class="position-relative bg-white text-center z-index-2">
                    <ul class="nav nav-classic nav-tab justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active js-animation-link" id="pills-one-example1-tab" data-toggle="pill"
                                href="#pills-one-example1" role="tab" aria-controls="pills-one-example1"
                                aria-selected="true" data-target="#pills-one-example1" data-link-group="groups"
                                data-animation-in="slideInUp">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                    Latest
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-animation-link" id="pills-two-example1-tab" data-toggle="pill"
                                href="#pills-two-example1" role="tab" aria-controls="pills-two-example1"
                                aria-selected="false" data-target="#pills-two-example1" data-link-group="groups"
                                data-animation-in="slideInUp">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                    Top Selling
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-animation-link" id="pills-three-example1-tab" data-toggle="pill"
                                href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                                aria-selected="false" data-target="#pills-three-example1" data-link-group="groups"
                                data-animation-in="slideInUp">
                                <div class="d-md-flex justify-content-md-center align-items-md-center">
                                    On Promotion
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Classic -->
                <!-- Tab Content -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade pt-2 show active" id="pills-one-example1" role="tabpanel"
                        aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                        <ul class="row list-unstyled products-group no-gutters">
                            @foreach ($latestProducts as $product)
                                <li class="col-6 col-md-4 col-lg-3 col-xl product-item">

                                    @livewire('product-card', ['product' => $product], key($product->id))
                                </li>
                            @endforeach


                        </ul>
                    </div>
                    <div class="tab-pane fade pt-2" id="pills-two-example1" role="tabpanel"
                        aria-labelledby="pills-two-example1-tab" data-target-group="groups">
                        <ul class="row list-unstyled products-group no-gutters">
                            @foreach ($topSellingProducts as $product)
                                <li class="col-6 col-md-4 col-lg-3 col-xl product-item">

                                    @livewire('product-card', ['product' => $product], key($product->id))
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel"
                        aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                        <ul class="row list-unstyled products-group no-gutters">
                            @forelse ($onPromotion as $product)
                                <li class="col-6 col-md-4 col-lg-3 col-xl product-item">

                                    @livewire('product-card', ['product' => $product], key($product->id))
                                </li>
                            @empty
                            @endforelse

                        </ul>
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
            <!-- End Tab Prodcut Section -->
            <!-- Full banner -->
            <div class="mb-8">
                <a href="shop" class="d-block text-gray-90">
                    <div class="bg-img-hero pt-3" style="background-image: url(/assets/img/1400X143/img1.png);">
                        <div class="space-top-2-md p-4 pt-4 pt-md-5 pt-lg-6 pt-xl-5 pb-lg-4 px-xl-14 px-lg-6">
                            <div class="flex-horizontal-center overflow-auto overflow-md-visble">
                                <h1
                                    class="text-lh-38 font-size-30 font-weight-light mb-0 flex-shrink-0 flex-md-shrink-1">
                                    SHOP AND <strong>SAVE BIG</strong> ON HOTTEST TABLETS</h1>
                                <div class="flex-content-center ml-4 flex-shrink-0">
                                    <div class="bg-primary rounded-lg px-6 py-2">
                                        <em class="font-size-14 font-weight-light text-white">STARTING AT</em>
                                        <div class="font-size-30 font-weight-bold text-lh-1 text-white">
                                            <sup class="">$</sup>79<sup class="">99</sup>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End Full banner -->
        </div>
        <!-- Week Deals limited -->
        <div class="bg-gray-7 mb-6 py-7">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-lg-3 col-wd-2">
                        <div class="max-width-244">
                            <div class="d-flex border-bottom border-color-1 mb-3">
                                <h3 class="section-title mb-0 pb-2 font-size-22">Week Deals limited, Cheap Gadgets less than $500</h3>
                            </div>
                            {{-- <div class="mb-3 mb-md-2 text-center text-md-left">
                                <h1 class="font-size-130 font-weight-light mb-2 text-lh-1">%</h1>
                                <h6 class="text-gray-2 mb-2">Hurry Up! Offer ends in:</h6>
                                <div class="js-countdown d-flex mx-n2 justify-content-center justify-content-md-start"
                                    data-end-date="2020/11/30" data-hours-format="%H" data-minutes-format="%M"
                                    data-seconds-format="%S">
                                    <div class="text-lh-1 px-2 text-center">
                                        <div
                                            class="bg-white rounded-sm border border-width-2 border-primary py-2 px-2 min-width-46">
                                            <div class="text-gray-2 font-size-20 mb-2">
                                                <span class="js-cd-hours"></span>
                                            </div>
                                            <div class="text-gray-2 font-size-8 text-center">HOURS</div>
                                        </div>
                                    </div>
                                    <div class="text-lh-1 px-2 text-center">
                                        <div
                                            class="bg-white rounded-sm border border-width-2 border-primary py-2 px-2 min-width-46">
                                            <div class="text-gray-2 font-size-20 mb-2">
                                                <span class="js-cd-minutes"></span>
                                            </div>
                                            <div class="text-gray-2 font-size-8 text-center">MINS</div>
                                        </div>
                                    </div>
                                    <div class="text-lh-1 px-2 text-center">
                                        <div
                                            class="bg-white rounded-sm border border-width-2 border-primary py-2 px-2 min-width-46">
                                            <div class="text-gray-2 font-size-20 mb-2">
                                                <span class="js-cd-seconds"></span>
                                            </div>
                                            <div class="text-gray-2 font-size-8 text-center">SECS</div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-9 col-wd-10">
                        <div class="">
                            <div class="js-slick-carousel u-slick position-static overflow-hidden u-slick-overflow-visble pb-5 pt-2 px-1"
                                data-pagi-classes="text-center right-0 bottom-1 left-0 u-slick__pagination u-slick__pagination--long mb-0 z-index-n1 mt-3 pt-1"
                                data-slides-show="5" data-slides-scroll="1"
                                data-responsive='[{
                                      "breakpoint": 1400,
                                      "settings": {
                                        "slidesToShow": 4
                                      }
                                    }, {
                                        "breakpoint": 1200,
                                        "settings": {
                                          "slidesToShow": 3
                                        }
                                    }, {
                                      "breakpoint": 992,
                                      "settings": {
                                        "slidesToShow": 2
                                      }
                                    }, {
                                      "breakpoint": 768,
                                      "settings": {
                                        "slidesToShow": 2
                                      }
                                    }, {
                                      "breakpoint": 554,
                                      "settings": {
                                        "slidesToShow": 2
                                      }
                                    }]'>
                               
                                  @forelse ($cheapestProducts as $product)
                                
                                <div class="js-slide products-group">
                                    <div class="product-item mx-1 remove-divider">
                                        @livewire('product-card', ['product' => $product], key($product->id))

                                    </div>
                                </div>

                               
                            @empty
                            @endforelse
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Week Deals limited -->
        @livewire('categories-holder-card')
        <!-- Top Categories this Week -->
        @livewire('top-categories-card')
       
        <!-- Brand Carousel -->
        @livewire('brands-card')
        <!-- End Brand Carousel -->
    </main>
</x-app-layout>
