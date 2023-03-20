  <div class="container">
      <div class="row mb-8">
          <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
              <div class="mb-8 border border-width-2 border-color-3 borders-radius-6">
                  <!-- List -->
                  <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar">
                      <li>
                          <a class="dropdown-toggle dropdown-toggle-collapse dropdown-title" href="javascript:"
                              role="button" data-toggle="collapse" aria-expanded="false"
                              aria-controls="sidebarNav1Collapse" data-target="#sidebarNav1Collapse">
                              Show All Categories
                          </a>

                          <div id="sidebarNav1Collapse" class="collapse" data-parent="#sidebarNav">
                              <ul id="sidebarNav1" class="list-unstyled dropdown-list">
                                  @foreach ($categories as $category)
                                      <li :wire:key="cat-{{$category->id}}"><a class="dropdown-item"
                                              href="#" wire:click.prevent="changeCategory({{$category->id}})">{{ $category->name }}<span
                                                  class="text-gray-25 font-size-12 font-weight-normal">
                                                  ({{ $category->products->count() }})
                                              </span></a></li>
                                  @endforeach
                              </ul>
                          </div>
                      </li>
                      <li>
                          @if ($selectedCategory)
                              <a class="dropdown-current active"
                                  href="#" wire:click.prevent="changeCategory({{$category->id}})">{{ $selectedCategory->name }} <span
                                      class="text-gray-25 font-size-12 font-weight-normal">
                                      ({{ $selectedCategory->products->count() }})</span></a>
                          @else
                              <a class="dropdown-current active" href="/shop">All Products <span
                                      class="text-gray-25 font-size-12 font-weight-normal">
                                      ({{ $products->count() }})</span></a>
                          @endif


                          <ul class="list-unstyled dropdown-list">
                              @foreach ($categories->take(2) as $category)
                                  <li :wire:key="cat3-{{$category->id}}"><a class="dropdown-item"
                                          href="#" wire:click.prevent="changeCategory({{$category->id}})">{{ $category->name }}<span
                                              class="text-gray-25 font-size-12 font-weight-normal">
                                              ({{ $category->products->count() }})
                                          </span></a>
                                  </li>
                              @endforeach
                          </ul>
                      </li>
                  </ul>
                  <!-- End List -->
              </div>
              <div class="mb-6">
                  <div class="border-bottom border-color-1 mb-5">
                      <h3 class="section-title section-title__sm mb-0 pb-2 font-size-18">Filters</h3>
                  </div>
                  <div class="border-bottom pb-4 mb-4">
                      <h4 class="font-size-14 mb-3 font-weight-bold">Brands</h4>
                      @foreach ($brands as $brand)
                          <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1" :wire:key="brands-{{$brand->id}}">
                              <div class="">
                                  <input type="checkbox" class="" value="{{$brand->id}}" wire:model="selectedBrands" :wire:key="brand-{{$brand->id}}">
                                  <label class="" for="brandAdidas">{{ $brand->name }}
                                      <span class="text-gray-25 font-size-12 font-weight-normal">
                                          ({{ $brand->products->count() }})
                                      </span>
                                  </label>
                              </div>
                          </div>
                      @endforeach
                      <!-- Checkboxes -->

                      <!-- End Checkboxes -->



                  </div>
                  <div class="border-bottom pb-4 mb-4">
                      <h4 class="font-size-14 mb-3 font-weight-bold">Color</h4>

                      @foreach ($colors as $color)
                          <div class="form-group d-flex align-items-center justify-content-between mb-2 pb-1" :wire:key="colors-{{$brand->id}}">
                              <div class="custom-control custom-checkbox">
                                  <input type="checkbox" class="" value="{{$color->id}}" wire:model="selectedColors" :wire:key="color-{{$color->id}}">
                                  <label class="" for="categoryTshirt">{{ $color->name }}</label>
                              </div>
                          </div>
                      @endforeach


                  </div>
                  <div class="range-slider">
                      <h4 class="font-size-14 mb-3 font-weight-bold">Price</h4>
                      <!-- Range Slider -->
                      <input class="form-control mb-3" type="number" wire:model="minPrice" placeholder="Min price">
                      <input class="form-control" type="number" wire:model="maxPrice" placeholder="Max price">

                      <!-- End Range Slider -->
                      <div class="mt-1 text-gray-111 d-flex mb-4">
                          <span class="mr-0dot5">Price: </span>
                          <span>${{$minPrice}}</span>
                          <span id="rangeSliderExample3MinResult" class=""></span>
                          <span class="mx-0dot5"> — </span>
                          <span>${{$maxPrice}}</span>
                          <span id="rangeSliderExample3MaxResult" class=""></span>
                      </div>
                      <button type="submit"
                          class="btn px-4 btn-primary-dark-w py-2 rounded-lg text-white" wire:click="fireFilters()">Filter</button>
                  </div>
              </div>

          </div>
          <div class="col-xl-9 col-wd-9gdot5">
              <!-- Shop-control-bar Title -->
              <div class="d-block d-md-flex flex-center-between mb-3">
                  <h3 class="font-size-25 mb-2 mb-md-0">
                      {{ $selectedCategory ? $selectedCategory->name : 'All Products' }}</h3>
                  <p class="font-size-14 text-gray-90 mb-0">Showing 1–25 of 56 results</p>
              </div>
              <!-- End shop-control-bar Title -->
              <!-- Shop-control-bar -->
              <div class="bg-gray-1 flex-center-between borders-radius-9 py-1">
                  <div class="d-xl-none">
                      <!-- Account Sidebar Toggle Button -->
                      <a id="sidebarNavToggler1" class="btn btn-sm py-1 font-weight-normal" href="javascript:"
                          role="button" aria-controls="sidebarContent1" aria-haspopup="true" aria-expanded="false"
                          data-unfold-event="click" data-unfold-hide-on-scroll="false"
                          data-unfold-target="#sidebarContent1" data-unfold-type="css-animation"
                          data-unfold-animation-in="fadeInLeft" data-unfold-animation-out="fadeOutLeft"
                          data-unfold-duration="500">
                          <i class="fas fa-sliders-h"></i> <span class="ml-1">Filters</span>
                      </a>
                      <!-- End Account Sidebar Toggle Button -->
                  </div>
                  <div class="px-3 d-none d-xl-block">
                      <ul class="nav nav-tab-shop" id="pills-tab" role="tablist">
                          <li class="nav-item">
                              <a class="nav-link" id="pills-one-example1-tab" data-toggle="pill"
                                  href="#pills-one-example1" role="tab" aria-controls="pills-one-example1"
                                  aria-selected="false">
                                  <div class="d-md-flex justify-content-md-center align-items-md-center">
                                      <i class="fa fa-th"></i>
                                  </div>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link active" id="pills-two-example1-tab" data-toggle="pill"
                                  href="#pills-two-example1" role="tab" aria-controls="pills-two-example1"
                                  aria-selected="false">
                                  <div class="d-md-flex justify-content-md-center align-items-md-center">
                                      <i class="fa fa-align-justify"></i>
                                  </div>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="pills-three-example1-tab" data-toggle="pill"
                                  href="#pills-three-example1" role="tab" aria-controls="pills-three-example1"
                                  aria-selected="true">
                                  <div class="d-md-flex justify-content-md-center align-items-md-center">
                                      <i class="fa fa-list"></i>
                                  </div>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" id="pills-four-example1-tab" data-toggle="pill"
                                  href="#pills-four-example1" role="tab" aria-controls="pills-four-example1"
                                  aria-selected="true">
                                  <div class="d-md-flex justify-content-md-center align-items-md-center">
                                      <i class="fa fa-th-list"></i>
                                  </div>
                              </a>
                          </li>
                      </ul>
                  </div>
                  <div class="d-flex">
                      <form method="get">
                          <!-- Select -->
                          <select
                              class="js-select selectpicker dropdown-select max-width-200 max-width-160-sm right-dropdown-0 px-2 px-xl-0"
                              data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                              <option value="one" selected>Default sorting</option>
                              <option value="two">Sort by popularity</option>
                              <option value="three">Sort by average rating</option>
                              <option value="four">Sort by latest</option>
                              <option value="five">Sort by price: low to high</option>
                              <option value="six">Sort by price: high to low</option>
                          </select>
                          <!-- End Select -->
                      </form>
                      <form method="POST" class="ml-2 d-none d-xl-block">
                          <!-- Select -->
                          <select class="js-select selectpicker dropdown-select max-width-120"
                              data-style="btn-sm bg-white font-weight-normal py-2 border text-gray-20 bg-lg-down-transparent border-lg-down-0">
                              <option value="one" selected>Show 20</option>
                              <option value="two">Show 40</option>
                              <option value="three">Show All</option>
                          </select>
                          <!-- End Select -->
                      </form>
                  </div>
                  <nav class="px-3 flex-horizontal-center text-gray-20 d-none d-xl-flex">
                      <form method="post" class="min-width-50 mr-1">
                          <input size="2" min="1" max="3" step="1" type="number"
                              class="form-control text-center px-2 height-35" value="1">
                      </form>
                      of 3
                      <a class="text-gray-30 font-size-20 ml-2" href="#">→</a>
                  </nav>
              </div>
              <!-- End Shop-control-bar -->
              <!-- Shop Body -->
              <!-- Tab Content -->
              <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade pt-2" id="pills-one-example1" role="tabpanel"
                      aria-labelledby="pills-one-example1-tab" data-target-group="groups">
                      <ul class="row list-unstyled products-group no-gutters">
                          @foreach ($products as $product)
                              <li class="col-6 col-md-3 col-wd-2gdot4 product-item" :wire:key="product-{{$product->id}}">
                                  @livewire('product-card-grid', [
                                      'product' => $product,
                                  ])
                              </li>
                          @endforeach

                      </ul>
                  </div>
                  <div class="tab-pane fade pt-2 show active" id="pills-two-example1" role="tabpanel"
                      aria-labelledby="pills-two-example1-tab" data-target-group="groups">
                      <ul class="row list-unstyled products-group no-gutters">
                          @foreach ($products as $product)
                              <li class="col-6 col-md-3 col-wd-2gdot4 product-item" :wire:key="prod2-{{$product->id}}">
                                  @livewire('product-card-grid-small', [
                                      'product' => $product,
                                  ])
                              </li>
                          @endforeach


                      </ul>
                  </div>
                  <div class="tab-pane fade pt-2" id="pills-three-example1" role="tabpanel"
                      aria-labelledby="pills-three-example1-tab" data-target-group="groups">
                      <ul class="d-block list-unstyled products-group prodcut-list-view">
                          @foreach ($products as $product)
                              <li class="product-item remove-divider" :wire:key="prod3-{{$product->id}}">
                                  @livewire('product-card-list', [
                                      'product' => $product,
                                  ])
                              </li>
                          @endforeach
                      </ul>
                  </div>
                  <div class="tab-pane fade pt-2" id="pills-four-example1" role="tabpanel"
                      aria-labelledby="pills-four-example1-tab" data-target-group="groups">
                      <ul class="d-block list-unstyled products-group prodcut-list-view-small">
                          @foreach ($products as $product)
                              <li class="product-item remove-divider" :wire:key="prod4-{{$product->id}}">
                                  @livewire('product-card-list-small', [
                                      'product' => $product,
                                  ])
                              </li>
                          @endforeach
                      </ul>
                  </div>
              </div>
              <!-- End Tab Content -->
              <!-- End Shop Body -->
              <!-- Shop Pagination -->
              {{ $products->links('livewire.custom-pagination') }}

              {{-- <nav class="d-md-flex justify-content-between align-items-center border-top pt-3"
                  aria-label="Page navigation example">
                  <div class="text-center text-md-left mb-3 mb-md-0">Showing 1–25 of 56 results</div>
                  <ul class="pagination mb-0 pagination-shop justify-content-center justify-content-md-start">
                      <li class="page-item"><a class="page-link current" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                  </ul>

              </nav> --}}
              <!-- End Shop Pagination -->
          </div>
      </div>

  </div>
