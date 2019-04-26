@extends('layouts.master')

@section('title','Gallery')

@section('content')
    <!-- Blog -->
    <section class="pt-120 pb-65">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="blog">
                        <div class="row isotope">
                            <!-- Single Post -->
                            <div class="col-lg-4 col-md-6">
                                <div class="single-news mb-55" data-animate="fadeInUp" data-delay=".1">

                                    <img src="{{ asset('public/front/img/posts/post4.jpg') }}" data-rjs="2" alt="">

                                </div>
                            </div>
                            <!-- End of Single Post -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Blog -->
@endsection

@section('script')

    <script>
        $(document).ready(function(){
            //FANCYBOX
            //https://github.com/fancyapps/fancyBox
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });


    </script>

@endsection
