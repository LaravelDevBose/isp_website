@extends('layouts.master')

@section('title','Our Team Members')

@section('content')
    <!-- Products -->
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
                <div class="col-lg-12">
                    <div class="products">
                        <div class="row">
                            <!-- Single Product -->
                            @for($i=1; $i<=10; $i++)
                                <div class="col-md-3 col-sm-6">
                                    <div class="single-product shadow-lg mb-55 pb-3 bg-white rounded" style="border: 1px solid #d5d5d5;">
                                        <img src="{{ asset('public/front/img/products/product1.jpg') }} " style="width: 220px; height: 220px; margin: 22px;" data-rjs="2" alt="">
                                        <h3 style="text-align: center"><a href="http://www.webcoderskull.com/">Web coder skull</a></h3>
                                        <p style="text-align: center">Freelance Web Developer</p>
                                        <div class="price-and-all position-relative">
                                            <ul class="list-unstyled d-flex col">
                                                <li class="col"><a href="#" class="btn btn-icon"><i class="fa fa-facebook-square"></i></a></li>
                                                <li class="col"><a href="#" class="btn btn-icon"><i class="fa fa-twitter-square"></i></a></li>
                                                <li class="col"><a href="#" class="btn btn-icon"><i class="fa fa-linkedin-square"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                            <!-- End of Single Product -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Products -->
@endsection

@section('script')



@endsection
