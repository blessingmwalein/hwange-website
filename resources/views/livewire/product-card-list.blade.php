 <div class="product-item__outer w-100">
     <div class="product-item__inner remove-prodcut-hover py-4 row">
         <div class="product-item__header col-6 col-md-4">
             <div class="mb-2">
                 <a href="/product/{{ $product->slug }}" class="d-block text-center">
                     @if ($product->images->count() > 0)
                         <img class="img-fluid" style="width:150px;" src="/storage/{{ $product->images[0]->image }}"
                             alt="Image Description">
                     @else
                         <img class="img-fluid" src="/storage/default.png" alt="Image Description">
                     @endif
                 </a>
             </div>
         </div>
         <div class="product-item__body col-6 col-md-5">
             <div class="pr-lg-10">
                 <div class="mb-2"><a href="shop" class="font-size-12 text-gray-5">{{$product->category->name}}</a>
                 </div>
                 <h5 class="mb-2 product-item__title"><a href="/product/{{ $product->slug }}"
                         class="text-blue font-weight-bold">{{$product->name}}</a></h5>
                 <div class="prodcut-price mb-2 d-md-none">
                     <div class="text-gray-100"> {{ $product->getMainPrice()->currency->symbol }}{{ $product->getMainPrice()->price }}</div>
                 </div>
                 <div class="mb-3 d-none d-md-block">
                    
                 </div>
                 <ul class="font-size-12 p-0 text-gray-110 mb-4 d-none d-md-block">
                      @foreach ($product->specifications as $specification)
                         <li class="line-clamp-1 mb-1 list-bullet">{{ $specification->name }}</li>
                     @endforeach
                 </ul>
             </div>
         </div>
         <div class="product-item__footer col-md-3 d-md-block">
             <div class="mb-3">
                 <div class="prodcut-price mb-2">
                     <div class="text-gray-100"> {{ $product->getMainPrice()->currency->symbol }}{{ $product->getMainPrice()->price }}</div>
                 </div>
                 <div class="prodcut-add-cart">
                     <a href="#"  wire:click.prevent="addToCart"
                         class="btn btn-sm btn-block btn-primary-dark btn-wide transition-3d-hover">Add
                         to cart</a>
                 </div>
             </div>
             <div class="flex-horizontal-center justify-content-between justify-content-wd-center flex-wrap">

             </div>
         </div>
     </div>
 </div>
