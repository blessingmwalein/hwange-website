<x-app-layout>

    <main id="content" role="main">
        <!-- breadcrumb -->
        <div class="bg-gray-13 bg-md-transparent">
            <div class="container">
                <!-- breadcrumb -->
                <div class="my-md-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-3 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/">Home</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1"><a href="/shop">Shop</a></li>
                            <li class="breadcrumb-item flex-shrink-0 flex-xl-shrink-1 active" aria-current="page">
                                {{ $product->name }}</li>
                        </ol>
                    </nav>
                </div>
                <!-- End breadcrumb -->
            </div>
        </div>
        <!-- End breadcrumb -->

        <div class="container">
            <!-- Single Product Body -->
            <div class="mb-14">
                <div class="row">
                    <div class="col-md-6 col-lg-4 col-xl-5 mb-4 mb-md-0">
                        <div id="sliderSyncingNav" class="js-slick-carousel u-slick mb-2" data-infinite="true"
                            data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-classic u-slick__arrow-centered--y rounded-circle"
                            data-arrow-left-classes="fas fa-arrow-left u-slick__arrow-classic-inner u-slick__arrow-classic-inner--left ml-lg-2 ml-xl-4"
                            data-arrow-right-classes="fas fa-arrow-right u-slick__arrow-classic-inner u-slick__arrow-classic-inner--right mr-lg-2 mr-xl-4"
                            data-nav-for="#sliderSyncingThumb">
                            @forelse ($product->images as $image)
                                <div class="js-slide">
                                    <img class="img-fluid" src="/storage/{{ $image->image }}" style="width: 500px;"
                                        alt="Image Description">
                                </div>
                            @empty
                            @endforelse


                        </div>

                        <div id="sliderSyncingThumb"
                            class="js-slick-carousel u-slick u-slick--slider-syncing u-slick--slider-syncing-size u-slick--gutters-1 u-slick--transform-off"
                            data-infinite="true" data-slides-show="5" data-is-thumbs="true"
                            data-nav-for="#sliderSyncingNav">
                            @forelse ($product->images as $image)
                                <div class="js-slide" style="cursor: pointer;">
                                    <img class="img-fluid" src="/storage/{{ $image->image }}" alt="Image Description">
                                </div>
                            @empty
                            @endforelse

                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 col-xl-4 mb-md-6 mb-lg-0">
                        <div class="mb-2">
                            <a href="#"
                                class="font-size-12 text-gray-5 mb-2 d-inline-block">{{ $product->category->name }}</a>
                            <h2 class="font-size-25 text-lh-1dot2">{{ $product->name }}</h2>
                            <div class="mb-2">
                                <a class="d-inline-flex align-items-center small font-size-15 text-lh-1" href="#">

                                </a>
                            </div>
                            <div class="mb-2">
                                <ul style="list-style-type: circle;"class="font-size-14 pl-3 ml-1 text-gray-110">
                                    @foreach ($product->specifications as $specification)
                                        <li>{{ $specification->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <p>{{ $product->description }}.</p>
                            {{-- <p><strong>SKU</strong>: FW511948218</p> --}}
                        </div>
                    </div>
                    <div class="mx-md-auto mx-lg-0 col-md-6 col-lg-4 col-xl-3">
                        <div class="mb-2">
                           @livewire('single-product',['product'=>$product])
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Single Product Body -->
        </div>
        <div class="bg-gray-7 pt-6 pb-3 mb-6">
            <div class="container">
                <div class="js-scroll-nav">

                    <div class="bg-white pt-4 pb-6 px-xl-11 px-md-5 px-4 mb-6 overflow-hidden">
                        <div id="Description" class="mx-md-2">
                            <div class="position-relative mb-6">
                                <ul
                                    class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center mb-6 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-lg-down-bottom-0 pb-1 pb-xl-0 mb-n1 mb-xl-0">

                                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                        <a class="nav-link active" href="#Description">
                                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                Description
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                        <a class="nav-link" href="#Specification">
                                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                Specification
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="mx-md-4 pt-1">
                                <h3 class="font-size-24 mb-3">Perfectly Done</h3>
                                <p>{{ $product->description }}.</p>

                                <ul class="nav flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble">
                                    {{-- <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1">
                                        <strong>SKU:</strong> <span class="sku">FW511948218</span>
                                    </li> --}}
                                    <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                                    <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1">
                                        <strong>Category:</strong> <a
                                            href="/shop?category={{ $product->category->id }}"
                                            class="text-blue">{{ $product->category->name }}</a>
                                    </li>
                                    <li class="nav-item text-gray-111 mx-3 flex-shrink-0 flex-xl-shrink-1">/</li>
                                    {{-- <li class="nav-item text-gray-111 flex-shrink-0 flex-xl-shrink-1">
                                        <strong>Tags:</strong> <a href="#" class="text-blue">Fast</a>, <a
                                            href="#" class="text-blue">Gaming</a>, <a href="#"
                                            class="text-blue">Strong</a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white py-4 px-xl-11 px-md-5 px-4 mb-6">
                        <div id="Specification" class="mx-md-2">
                            <div class="position-relative mb-6">
                                <ul
                                    class="nav nav-classic nav-tab nav-tab-lg justify-content-xl-center mb-6 flex-nowrap flex-xl-wrap overflow-auto overflow-xl-visble border-lg-down-bottom-0 pb-1 pb-xl-0 mb-n1 mb-xl-0">

                                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                        <a class="nav-link" href="#Description">
                                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                Description
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item flex-shrink-0 flex-xl-shrink-1 z-index-2">
                                        <a class="nav-link active" href="#Specification">
                                            <div class="d-md-flex justify-content-md-center align-items-md-center">
                                                Specification
                                            </div>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <div class="mx-md-5 pt-1">
                                <div class="table-responsive mb-4">
                                    <table class="table table-hover">
                                        <tbody>
                                            @forelse($product->specifications as $specification)
                                                <tr>
                                                    <th class="px-4 px-xl-5 border-top-0">{{ $specification->name }}
                                                    </th>
                                                    {{-- <td class="border-top-0">7.25kg</td> --}}
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <!-- Related products -->
            <div class="mb-6">
                <div
                    class="d-flex justify-content-between align-items-center border-bottom border-color-1 flex-lg-nowrap flex-wrap mb-4">
                    <h3 class="section-title mb-0 pb-2 font-size-22">Related products</h3>
                </div>
                <ul class="row list-unstyled products-group no-gutters">
                    <li class="col-6 col-md-3 col-xl-2gdot4-only col-wd-2 product-item">
                        @foreach ($relatedProducts as $product)
                            @livewire('product-card', ['product' => $product], key($product->id))
                        @endforeach

                    </li>

                </ul>
            </div>

        </div>

    </main>
</x-app-layout>
