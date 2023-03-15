 <div class="container">

     <div class="mb-6">
         <!-- Nav nav-pills -->
         <div class="position-relative text-center z-index-2">
             <div
                 class=" d-flex justify-content-between border-bottom border-color-1 flex-lg-nowrap flex-wrap border-md-down-top-0 border-md-down-bottom-0">
                 <h3 class="section-title mb-0 pb-2 font-size-22">{{ $selectedCategory->name }}</h3>
             </div>
         </div>
         <!-- End Nav Pills -->
         <div class="row">
             <div class="col-12 col-xl-auto pr-lg-2">
                 <div class="min-width-200 mt-xl-5">
                     <ul
                         class="list-group list-group-flush flex-nowrap flex-xl-wrap flex-row flex-xl-column overflow-auto overflow-xl-visble mb-3 mb-xl-0 border-top border-color-1 border-lg-top-0">

                         @foreach ($categories as $category)
                             <li class="border-color-1 list-group-item border-lg-down-0 flex-shrink-0 flex-xl-shrink-1">
                                 <a wire:click.prevent="changeCategory({{ $category->id }})"
                                     class="hover-on-bold py-1 px-3 text-gray-90 d-block"
                                     href="#">{{ $category->name }}</a>
                             </li>
                         @endforeach
                     </ul>
                 </div>
             </div>
             <div class="col-md-6 col-lg-auto">
                 <a href="shop" class="d-block"><img class="img-fluid" src="/assets/img/360X616/img2.jpg"
                         alt="Image Description"></a>
             </div>
             <div class="col-md pl-md-0">
                 <ul class="row list-unstyled products-group no-gutters mb-0">
                     @foreach ($selectedCategory->products->shuffle()->take(8) as $product)
                         <li class="col-6 col-md-4 col-wd-3 product-item">
                             @livewire('product-card', ['product' => $product], key($product->id))
                         </li>
                     @endforeach

                 </ul>
             </div>
         </div>
     </div>
     <!-- End Music Headphones -->
 </div>
