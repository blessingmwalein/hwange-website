 <footer>


     <div class="pt-8 pb-4 bg-gray-13">
         <div class="container mt-1">
             <div class="row">
                 <div class="col-lg-5">
                     <div class="mb-6">
                         <a href="#" class="d-inline-block">
                             <img src="assets/img/logo.png" height="100" />
                         </a>
                     </div>
                     <div class="mb-4">
                         <div class="row no-gutters">
                             <div class="col-auto">
                                 <i class="ec ec-support text-primary font-size-56"></i>
                             </div>
                             <div class="col pl-3">
                                 <div class="font-size-13 font-weight-light">Got questions? Call us 24/7!</div>
                                 @foreach ($contacts as $contact)
                                     <a href="{{ $contact->phone }}"
                                         class="font-size-20 text-gray-90">{{ $contact->phone }}, </a>
                                 @endforeach
                             </div>
                         </div>
                     </div>
                     <div class="mb-4">
                         <h6 class="mb-1 font-weight-bold">Address</h6>
                         <address class="">
                             {{ $about->address }}
                         </address>
                     </div>
                     <div class="my-4 my-md-4">
                         <ul class="list-inline mb-0 opacity-7">
                             <li class="list-inline-item mr-0">
                                 <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                     href="{{ $about->facebook }}">
                                     <span class="fab fa-facebook-f btn-icon__inner"></span>
                                 </a>
                             </li>
                             <li class="list-inline-item mr-0">
                                 <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                     href="{{ $about->whatsapp }}">
                                     <span class="fab fa-whatsapp btn-icon__inner"></span>
                                 </a>
                             </li>
                             <li class="list-inline-item mr-0">
                                 <a class="btn font-size-20 btn-icon btn-soft-dark btn-bg-transparent rounded-circle"
                                     href="{{ $about->linkedin }}">
                                     <span class="fab fa-linkedin btn-icon__inner"></span>
                                 </a>
                             </li>

                         </ul>
                     </div>
                 </div>
                 <div class="col-lg-7">
                     <div class="row">
                         <div class="col-12 col-md mb-4 mb-md-0">
                             <h6 class="mb-3 font-weight-bold">Find it Fast</h6>
                             <!-- List Group -->
                             <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                 @foreach ($categories as $category)
                                     <li><a class="list-group-item list-group-item-action"
                                             href="/shop?category={{ $category->id }}">{{ $category->name }}</a></li>
                                     <li>
                                 @endforeach

                             </ul>
                             <!-- End List Group -->
                         </div>



                         <div class="col-12 col-md mb-4 mb-md-0">
                             <h6 class="mb-3 font-weight-bold">Customer Care</h6>
                             <!-- List Group -->
                             <ul class="list-group list-group-flush list-group-borderless mb-0 list-group-transparent">
                                 <li><a class="list-group-item list-group-item-action" href="">My
                                         Account</a></li>
                                 <li><a class="list-group-item list-group-item-action" href="">Order
                                         Tracking</a></li>
                                 <li><a class="list-group-item list-group-item-action" href="about">About Us</a></li>

                                 <li><a class="list-group-item list-group-item-action" href="contact">Contact Us</a>
                                 </li>

                             </ul>
                             <!-- End List Group -->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Footer-bottom-widgets -->
     <!-- Footer-copy-right -->
     <div class="bg-gray-14 py-2">
         <div class="container">
             <div class="flex-center-between d-block d-md-flex">
                 <div class="mb-3 mb-md-0">© <a href="#"
                         class="font-weight-bold text-gray-90">{{ $about->name }}</a> -
                     All rights
                     Reserved</div>
                 <div class="text-md-right">
                     <span class="d-inline-block bg-white border rounded p-1">
                         <img class="max-width-5" src="/assets/img/100X60/img1.jpg" alt="Image Description">
                     </span>
                     <span class="d-inline-block bg-white border rounded p-1">
                         <img class="max-width-5" src="/assets/img/100X60/img2.jpg" alt="Image Description">
                     </span>
                     <span class="d-inline-block bg-white border rounded p-1">
                         <img class="max-width-5" src="/assets/img/100X60/img3.jpg" alt="Image Description">
                     </span>
                     <span class="d-inline-block bg-white border rounded p-1">
                         <img class="max-width-5" src="/assets/img/100X60/img4.jpg" alt="Image Description">
                     </span>
                     <span class="d-inline-block bg-white border rounded p-1">
                         <img class="max-width-5" src="/assets/img/100X60/img5.jpg" alt="Image Description">
                     </span>
                 </div>
             </div>
         </div>
     </div>
     <!-- End Footer-copy-right -->
 </footer>
