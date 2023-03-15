 <div class="card p-5 border-width-2 border-color-1 borders-radius-17">
     <div class="text-gray-9 font-size-14 pb-2 border-color-1 border-bottom mb-3">
         Availability: <span class="text-green font-weight-bold">{{ $product->quantity }} in
             stock</span></div>
     <div class="mb-3">
         <div class="font-size-36">
             {{ $product->getMainPrice()->currency->symbol }}{{ $product->getMainPrice()->price }}
         </div>
     </div>
     <div class="mb-3">
         <h6 class="font-size-14">Quantity</h6>
         <!-- Quantity -->
         <div class="border rounded-pill py-1 w-md-60 height-35 px-3 border-color-1">
             <div class="js-quantity row align-items-center">
                 <div class="col">
                     <input wire:model="qty" class="js-result form-control h-auto border-0 rounded p-0 shadow-none" type="text"
                         >
                 </div>
                 <div class="col-auto pr-1">
                     <a class="js-minus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                         href="javascript:;"wire:click.prevent="decreaseQty" >
                         <small class="fas fa-minus btn-icon__inner"></small>
                     </a>
                     <a class="js-plus btn btn-icon btn-xs btn-outline-secondary rounded-circle border-0"
                         href="javascript:;" wire:click.prevent="increateQty">
                         <small class="fas fa-plus btn-icon__inner"></small>
                     </a>
                 </div>
             </div>
         </div>
         <!-- End Quantity -->
     </div>
     <div class="mb-3">
         <h6 class="font-size-14">Color</h6>
         <!-- Select -->
         <select class="form-control btn-block col-12 px-0"
             data-style="btn-sm bg-white font-weight-normal py-2 border" wire:model="color">
             @foreach ($product->colors as $color)
                 <option value="{{ $color->color->name }}">
                     {{ $color->color->name }}</option>
             @endforeach

         </select>
         <!-- End Select -->
     </div>
     <div class="mb-2 pb-0dot5">
         <a href="#" wire:click.prevent="addToCart" class="btn btn-block btn-primary-dark"><i class="ec ec-add-to-cart mr-2 font-size-20"></i>
             Add to Cart</a>
     </div>
     <div class="mb-3">
         <a href="#" wire:click.prevent="buyProduct" class="btn btn-block btn-dark">Buy Now</a>
     </div>

 </div>
