@extends('layouts.master')

@section('title','All Services')

@section('content')


    <!-- Services -->
    <section class="pt-120 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-service text-center" data-animate="fadeInUp" data-delay=".1">
                        <img src="img/icons/earth.svg" alt="" class="svg">
                        <h4>High Speed Internet</h4>
                        <p>Lorem ipsum dolor sit ametteturmpor incididunt most popular.</p>
                        <a href="internet.html">Learn More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-service text-center" data-animate="fadeInUp" data-delay=".4">
                        <img src="img/icons/phone.svg" alt="" class="svg">
                        <h4>Phone Service</h4>
                        <p>Lorem ipsum dolor sit ametteturmpor incididunt most popular.</p>
                        <a href="mobile.html">Learn More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-service text-center" data-animate="fadeInUp" data-delay=".7">
                        <img src="img/icons/tv.svg" alt="" class="svg">
                        <h4>Cable TV</h4>
                        <p>Lorem ipsum dolor sit ametteturmpor incididunt most popular.</p>
                        <a href="cable-tv.html">Learn More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-service text-center" data-animate="fadeInUp" data-delay="1">
                        <img src="img/icons/server.svg" alt="" class="svg">
                        <h4>Dedicated Server</h4>
                        <p>Lorem ipsum dolor sit ametteturmpor incididunt most popular.</p>
                        <a href="dedicated-server.html">Learn More <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Services -->
@endsection

@section('script')



@endsection
