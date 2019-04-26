@extends('layouts.master')

@section('title','Home')

@section('content')

    <!-- Welcome Note -->
    <section class="pt-50 pb-30">
        <div class="container">
            <div class="row align-items-center pb-80">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="text-center" data-animate="fadeInUp" data-delay=".1">
                        <img src="{{ asset('public/front/') }}/img/number-one.png" alt="" data-rjs="2">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="number-one-content" data-animate="fadeInUp" data-delay=".5">
                        <h2 class="mb-3">We are no. 1 internet service provider company in United States.</h2>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
                        <a href="#" class="btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Welcome Note -->

    <!-- Abut Us -->
    <section class="pt-50 pb-55" style="background-image: linear-gradient(120deg, #84fab0 0%, #a5c2f4 100%);">
        <div class="container">
            <div class="row align-items-center pb-15 pt-15">
                <div class="col-lg-6">
                    <div class="number-one-content" data-animate="fadeInUp" data-delay=".5">
                        <h2 class="mb-3">We are no. 1 internet service provider company in United States.</h2>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
                        <a href="#" class="btn">View Details</a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="text-center" data-animate="fadeInUp" data-delay=".1">
                        <img src="{{ asset('public/front/') }}/img/number-one.png" alt="" data-rjs="2">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of About Us -->

    <!-- Company Profile -->
    <section class="pt-50 pb-50" >
        <div class="container">
            <div class="row align-items-center pb-80">
                <div class="col-lg-6 d-none d-lg-block">
                    <div class="text-center" data-animate="fadeInUp" data-delay=".1">
                        <img src="{{ asset('public/front/') }}/img/number-one.png" alt="" data-rjs="2">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="number-one-content" data-animate="fadeInUp" data-delay=".5">
                        <h2 class="mb-3">We are no. 1 internet service provider company in United States.</h2>
                        <p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain.</p>
                        <a href="#" class="btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Company Profile -->

    <!-- Services -->
    <section class="theme-bg-overlay bg-img-md-none pt-50 pb-50" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title section-title-white text-center" data-animate="fadeInUp" data-delay=".1">
                        <h2>Services We Provide</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-service single-service-white text-center" data-animate="fadeInUp" data-delay=".1">
                        <img src="{{ asset('public/front/') }}/img/icons/earth.svg" alt="" class="svg">
                        <h4>High Speed Internet</h4>
                        <p>Lorem ipsum dolor sit ametteturmpor incididunt most popular.</p>
                        <a href="internet.html">Learn More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-service single-service-white text-center" data-animate="fadeInUp" data-delay=".4">
                        <img src="{{ asset('public/front/') }}/img/icons/phone.svg" alt="" class="svg">
                        <h4>Phone Service</h4>
                        <p>Lorem ipsum dolor sit ametteturmpor incididunt most popular.</p>
                        <a href="mobile.html">Learn More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-service single-service-white text-center" data-animate="fadeInUp" data-delay=".7">
                        <img src="{{ asset('public/front/') }}/img/icons/tv.svg" alt="" class="svg">
                        <h4>Cable TV</h4>
                        <p>Lorem ipsum dolor sit ametteturmpor incididunt most popular.</p>
                        <a href="cable-tv.html">Learn More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-service single-service-white text-center" data-animate="fadeInUp" data-delay="1">
                        <img src="{{ asset('public/front/') }}/img/icons/server.svg" alt="" class="svg">
                        <h4>Dedicated Server</h4>
                        <p>Lorem ipsum dolor sit ametteturmpor incididunt most popular.</p>
                        <a href="dedicated-server.html">Learn More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Services -->
    <!-- Packages Wrap -->
    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title text-center" data-animate="fadeInUp" data-delay=".1">
                        <h2>Choose Affordable Packages</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-carousel-wraper position-relative">
                        <div class="swiper-container product-carousel">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide single-product">
                                    <div class="single-package text-center" data-animate="fadeInUp" data-delay=".4">
                                        <span class="pupular-pack">Most popular package</span>
                                        <h4>Family Pack</h4>
                                        <span>for family user</span>
                                        <hr>
                                        <ul class="list-unstyled">
                                            <li>Free installation</li>
                                            <li>Up to <span>25 Mpbs</span> download speed</li>
                                            <li>Unlimited data usages</li>
                                            <li><span>02 year</span> pricing lock guarantee</li>
                                            <li>Unlimited bandwidth</li>
                                        </ul>
                                        <p><sup>$</sup>24.50 <span>/Monthly</span></p>
                                        <a href="#" class="btn">Order This Plan</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next next-product">
                            <img src="{{ asset('public/front/img/icons/right-arrow.svg') }}" alt="" class="svg">
                        </div>
                        <div class="swiper-button-prev prev-product">
                            <img src="{{ asset('public/front/img/icons/left-arrow.svg') }}" alt="" class="svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Packages Wrap -->

    <!-- Product Carousel -->
    <section class="pt-50 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8 col-md-10">
                    <div class="section-title text-center" data-animate="fadeInUp" data-delay=".1">
                        <h2>Popular Products</h2>
                        <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form by injected humour</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="product-carousel-wraper position-relative">
                        <div class="swiper-container product-carousel">
                            <div class="swiper-wrapper">
                                @for($i=1; $i<=10; $i++)
                                <div class="swiper-slide single-product team shadow-lg p-3 mb-5 bg-white rounded" style="width: 220px; border: 1px solid #d5d5d5;">
                                    <img src="{{ asset('public/front/img/products/product1.jpg') }} " style=" margin-left: 7px;" data-rjs="2" alt="">
                                    <h3 style="text-align: center"><a href="http://www.webcoderskull.com/">Web coder skull</a></h3>
                                    <p style="text-align: center">Freelance Web Developer</p>
                                    <div class="price-and-all position-relative">
                                        <ul class="list-unstyled d-flex ">
                                            <li class="col"><a href="#" class="btn btn-icon"><i class="fa fa-facebook-square"></i></a></li>
                                            <li class="col"><a href="#" class="btn btn-icon"><i class="fa fa-twitter-square"></i></a></li>
                                            <li class="col"><a href="#" class="btn btn-icon"><i class="fa fa-linkedin-square"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @endfor

                            </div>
                        </div>
                        <div class="swiper-button-next next-product">
                            <img src="{{ asset('public/front/img/icons/right-arrow.svg') }}" alt="" class="svg">
                        </div>
                        <div class="swiper-button-prev prev-product">
                            <img src="{{ asset('public/front/img/icons/left-arrow.svg') }}" alt="" class="svg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Product Carousel -->


@endsection

@section('script')



@endsection
