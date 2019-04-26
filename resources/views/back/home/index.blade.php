@extends('layouts.app')

@section('title','DashBoard')

@section('content')

    <!-- Content area -->
    <div class="content">
        <!-- Dashboard content -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Latest posts -->
                <div class="panel panel-flat">
                    <div class="panel-body">
                        <h1 class="text text-blue  text-center text-bold">
                            <span style="text-transform: capitalize;"
                                class="txt-rotate"
                                data-period="2000"
                                data-rotate='[ "Welcome To {{ $siteName }} Admin Panel" ]'>
                            </span>
                        </h1>
                    </div>
                </div>
                <!-- /latest posts -->

            </div>

        </div>
        <!-- /dashboard content -->
    </div>
    <!-- /content area -->

@endsection

@section('script')

    <script type="text/javascript" src="{{ asset('public/') }}/assets/js/core/app.js"></script>

@endsection
