@extends('app')
@section('content')
    <main id="content" role="main">
        <div class="mb-8">
            <iframe width="100%" height="514" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=60%20bargate%20road%20harare+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.maps.ie/distance-area-calculator.html">measure distance on map</a></iframe>
        </div>

        <div class="container">
            <div class="row mb-10">
                <div class="col-md-8 col-xl-9">
                    <div class="mr-xl-6">
                        <div class="border-bottom border-color-1 mb-5">
                            <h3 class="section-title mb-0 pb-2 font-size-25">Leave us a Message</h3>
                        </div>
                        <p class="max-width-830-xl text-gray-90">Maecenas dolor elit, semper a sem sed, pulvinar molestie lacus. Aliquam dignissim, elit non mattis ultrices, neque odio ultricies tellus, eu porttitor nisl ipsum eu massa.</p>
                        <form class="js-validate" novalidate="novalidate">
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            First name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="firstName" placeholder="" aria-label="" required="" data-msg="Please enter your frist name." data-error-class="u-has-error" data-success-class="u-has-success" autocomplete="off">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-6">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Last name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" name="lastName" placeholder="" aria-label="" required="" data-msg="Please enter your last name." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>

                                <div class="col-md-12">
                                    <!-- Input -->
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Subject
                                        </label>
                                        <input type="text" class="form-control" name="Subject" placeholder="" aria-label="" data-msg="Please enter subject." data-error-class="u-has-error" data-success-class="u-has-success">
                                    </div>
                                    <!-- End Input -->
                                </div>
                                <div class="col-md-12">
                                    <div class="js-form-message mb-4">
                                        <label class="form-label">
                                            Your Message
                                        </label>

                                        <div class="input-group">
                                            <textarea class="form-control p-5" rows="4" name="text" placeholder=""></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary-dark-w px-5">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 col-xl-3">
                    <div class="border-bottom border-color-1 mb-5">
                        <h3 class="section-title mb-0 pb-2 font-size-25">Our Store</h3>
                    </div>
                    <div class="mr-xl-6">
                        <address class="mb-6">
                            60 Bargate Rd, <br>
                            Vinona Harare, <br>
                            Zimbabwe
                        </address>
                        <h5 class="font-size-14 font-weight-bold mb-3">Hours of Operation</h5>
                        <ul class="list-unstyled mb-6">
                            <li class="flex-center-between mb-1"><span class="">Monday:</span><span class="">12-6 PM</span></li>
                            <li class="flex-center-between mb-1"><span class="">Tuesday:</span><span class="">12-6 PM</span></li>
                            <li class="flex-center-between mb-1"><span class="">Wednesday:</span><span class="">12-6 PM</span></li>
                            <li class="flex-center-between mb-1"><span class="">Thursday:</span><span class="">12-6 PM</span></li>
                            <li class="flex-center-between mb-1"><span class="">Friday:</span><span class="">12-6 PM</span></li>
                            <li class="flex-center-between mb-1"><span class="">Saturday:</span><span class="">12-6 PM</span></li>
                            <li class="flex-center-between"><span class="">Sunday</span><span class="">Closed</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Brand Carousel -->
            <div class="mb-8">
                <div class="py-2 border-top border-bottom">
                    <div class="js-slick-carousel u-slick my-1 slick-initialized slick-slider" data-slides-show="5" data-slides-scroll="1" data-arrows-classes="d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y" data-arrow-left-classes="fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9" data-arrow-right-classes="fa fa-angle-right u-slick__arrow-classic-inner--right" data-responsive="[{
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
                            }]"><div class="js-prev d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y fa fa-angle-left u-slick__arrow-classic-inner--left z-index-9 slick-arrow slick-disabled" aria-disabled="true" style="display: block;"></div>

                        <div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 2070px; transform: translate3d(0px, 0px, 0px);"><div class="js-slide slick-slide slick-current slick-active" style="width: 345px; height: auto;" data-slick-index="0" aria-hidden="false" tabindex="0">
                                    <a href="#" class="link-hover__brand" tabindex="0">
                                        <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img1.png" alt="Image Description">
                                    </a>
                                </div><div class="js-slide slick-slide slick-active" style="width: 345px; height: auto;" data-slick-index="1" aria-hidden="false" tabindex="0">
                                    <a href="#" class="link-hover__brand" tabindex="0">
                                        <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img2.png" alt="Image Description">
                                    </a>
                                </div><div class="js-slide slick-slide" style="width: 345px; height: auto;" data-slick-index="2" aria-hidden="true" tabindex="-1">
                                    <a href="#" class="link-hover__brand" tabindex="-1">
                                        <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img3.png" alt="Image Description">
                                    </a>
                                </div><div class="js-slide slick-slide" style="width: 345px; height: auto;" data-slick-index="3" aria-hidden="true" tabindex="-1">
                                    <a href="#" class="link-hover__brand" tabindex="-1">
                                        <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img4.png" alt="Image Description">
                                    </a>
                                </div><div class="js-slide slick-slide" style="width: 345px; height: auto;" data-slick-index="4" aria-hidden="true" tabindex="-1">
                                    <a href="#" class="link-hover__brand" tabindex="-1">
                                        <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img5.png" alt="Image Description">
                                    </a>
                                </div><div class="js-slide slick-slide" style="width: 345px; height: auto;" data-slick-index="5" aria-hidden="true" tabindex="-1">
                                    <a href="#" class="link-hover__brand" tabindex="-1">
                                        <img class="img-fluid m-auto max-height-50" src="/assets/img/200X60/img6.png" alt="Image Description">
                                    </a>
                                </div></div></div><div class="js-next d-none d-lg-inline-block u-slick__arrow-normal u-slick__arrow-centered--y fa fa-angle-right u-slick__arrow-classic-inner--right slick-arrow" style="display: block;" aria-disabled="false"></div></div>
                </div>
            </div>
            <!-- End Brand Carousel -->
        </div>
    </main>
@endsection
