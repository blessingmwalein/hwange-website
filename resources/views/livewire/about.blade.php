<div class="bg-img-hero mb-14" style="background-image: url(/assets/img/1920x600/img1.jpg);">
    <div class="container">
        <div class="flex-content-center max-width-620-lg flex-column mx-auto text-center min-height-564">
            <h1 class="h1 font-weight-bold">About Us</h1>
            <p class="text-gray-39 font-size-18 text-lh-default">{{$about->name}}</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="card mb-3 border-0 text-center rounded-0">
                <img class="img-fluid mb-3" src="/assets/img/500X300/img1.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="font-size-18 font-weight-semi-bold mb-3">What we really do?</h5>
                    <p class="text-gray-90 max-width-334 mx-auto">{{$about->name}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4 mb-md-0">
            <div class="card mb-3 border-0 text-center rounded-0">
                <img class="img-fluid mb-3" src="/assets/img/500X300/img2.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="font-size-18 font-weight-semi-bold mb-3">Our Vision</h5>
                    <p class="text-gray-90 max-width-334 mx-auto">{{$about->vision}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-3 border-0 text-center rounded-0">
                <img class="img-fluid mb-3" src="/assets/img/500X300/img3.jpg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="font-size-18 font-weight-semi-bold mb-3">Our Mission</h5>
                    <p class="text-gray-90 max-width-334 mx-auto">{{$about->mission}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-8 mb-lg-0">
    <div class="row mb-8">
        <div class="col-lg-7">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-8">
                    <h3 class="font-size-18 font-weight-semi-bold text-gray-39 mb-4">What we really do?</h3>
                    <p class="text-gray-90">{{$about->name}}</p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-8">
                    <h3 class="font-size-18 font-weight-semi-bold text-gray-39 mb-4">Our Vision</h3>
                    <p class="text-gray-90">{{$about->vision}}</p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-8">
                    <h3 class="font-size-18 font-weight-semi-bold text-gray-39 mb-4">Address</h3>
                    <p class="text-gray-90">{{$about->address}}</p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-8">
                    <h3 class="font-size-18 font-weight-semi-bold text-gray-39 mb-4">Cooperate with Us!</h3>
                    <p class="text-gray-90">{{$about->name}}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="ml-lg-8">
                <h3 class="font-size-18 font-weight-semi-bold text-gray-39 mb-4">What can we do for you ?</h3>
                <!-- Basics Accordion -->
                <div id="basicsAccordion1" class="about-accordion">
                    <!-- Card -->
                    <div class="card mb-4 border-color-4 rounded-0">
                        <div class="card-header card-collapse border-color-4" id="basicsHeadingOne">
                            <h5 class="mb-0">
                                <button type="button"
                                        class="btn btn-link btn-block flex-horizontal-center card-btn p-0 font-size-18"
                                        data-toggle="collapse" data-target="#basicsCollapseOnee"
                                        aria-expanded="true" aria-controls="basicsCollapseOnee">
                                                <span class="border border-color-5 rounded font-size-12 mr-5">
                                                    <i class="fas fa-plus"></i>
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                    Support 24/7
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseOnee" class="collapse show" aria-labelledby="basicsHeadingOne"
                             data-parent="#basicsAccordion1">
                            <div class="card-body">
                                <p class="mb-0">At our company, we understand that your satisfaction is our top priority. That's why we offer support 24/7 to ensure that you always have access to the help and assistance you need. Our dedicated team of experts is always available to answer your questions, address your concerns, and provide you with the support you need to make informed buying decisions. Whether you need help with product selection, technical issues, or anything else, our team is here to assist you every step of the way.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card mb-4 border-color-4 rounded-0">
                        <div class="card-header card-collapse border-color-4" id="basicsHeadingTwo">
                            <h5 class="mb-0">
                                <button type="button"
                                        class="btn btn-link btn-block flex-horizontal-center card-btn p-0 font-size-18"
                                        data-toggle="collapse" data-target="#basicsCollapseTwo"
                                        aria-expanded="false" aria-controls="basicsCollapseTwo">
                                                <span class="border border-color-5 rounded font-size-12 mr-5">
                                                    <i class="fas fa-plus"></i>
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                    Best Quality
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseTwo" class="collapse" aria-labelledby="basicsHeadingTwo"
                             data-parent="#basicsAccordion1">
                            <div class="card-body">
                                <p class="mb-0">We are committed to delivering the best quality products and services to our customers. We understand that you expect nothing but the best, and that's exactly what we aim to provide. From high-quality gadgets like phones, PCs, and printers to top-notch customer service, we go above and beyond to ensure that you receive the best quality products and services. Our team works tirelessly to maintain the highest standards of quality in everything we do, so you can be confident that you're getting the best value for your money.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->

                    <!-- Card -->
                    <div class="card mb-4 border-color-4 rounded-0">
                        <div class="card-header card-collapse border-color-4" id="basicsHeadingThree">
                            <h5 class="mb-0">
                                <button type="button"
                                        class="btn btn-link btn-block flex-horizontal-center card-btn p-0 font-size-18"
                                        data-toggle="collapse" data-target="#basicsCollapseThree"
                                        aria-expanded="false" aria-controls="basicsCollapseThree">
                                                <span class="border border-color-5 rounded font-size-12 mr-5">
                                                    <i class="fas fa-plus"></i>
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                    Fastest Delivery
                                </button>
                            </h5>
                        </div>
                        <div id="basicsCollapseThree" class="collapse" aria-labelledby="basicsHeadingThree"
                             data-parent="#basicsAccordion1">
                            <div class="card-body">
                                <p class="mb-0">In addition to providing high-quality products and services, we pride ourselves on fast delivery and excellent customer care. We understand that your time is valuable, which is why we strive to deliver your products as quickly and efficiently as possible. We also believe in providing exceptional customer care, which means that we're always here to help you with any questions, concerns, or issues you may have. Our goal is to exceed your expectations and provide you with a seamless and stress-free shopping experience. With over 200 satisfied customers, you can trust that you're in good hands when you choose our company for all your gadget needs.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Card -->
                </div>
                <!-- End Basics Accordion -->
            </div>
        </div>
    </div>
    <!-- Brand Carousel -->
    <div class="mb-8">
        <div class="py-2 border-top border-bottom">
            <div class="js-slick-carousel u-slick my-1 slick-initialized slick-slider" data-slides-show="5"
                 data-slides-scroll="1"
                 data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y"
                 data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9"
                 data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right"
                 data-responsive="[{
                                &quot;breakpoint&quot;: 992,
                                &quot;settings&quot;: {
                                    &quot;slidesToShow&quot;: 2
                                }
                            }, {
                                &quot;breakpoint&quot;: 768,
                                &quot;settings&quot;: {
                                    &quot;slidesToShow&quot;: 1
                                }
                            }, {
                                &quot;breakpoint&quot;: 554,
                                &quot;settings&quot;: {
                                    &quot;slidesToShow&quot;: 1
                                }
                            }]">
                <div
                        class="js-prev d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9 slick-arrow slick-disabled"
                        aria-disabled="true" style="display: block;"></div>

                <div class="slick-list draggable">
                    <div class="slick-track"
                         style="opacity: 1; width: 2070px; transform: translate3d(0px, 0px, 0px);">
                        @foreach($brands as $brand)
                            <div class="js-slide slick-slide slick-current slick-active" style="width: 345px;"
                                 tabindex="0" data-slick-index="0" aria-hidden="false">
                                <a href="#" class="link-hover__brand" tabindex="0">
                                    <img class="img-fluid m-auto max-height-50" src="/storage/{{$brand->icon}}"
                                         alt="{{$brand->name}}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div
                        class="js-next d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y fa fa-angle-right u-slick__arrow-classic-inner--right slick-arrow"
                        style="display: block;" aria-disabled="false"></div>
            </div>
        </div>
    </div>
    <!-- End Brand Carousel -->
</div>