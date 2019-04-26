@extends('layouts.app')

@section('title','package View')

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Package Details Information</h5>
                <div class="heading-elements">
                    <a href="{{ route('package.create') }}" class="btn btn-success btn-sm pull-right"><i class="icon-plus2"></i> Add Package</a>
                </div>
            </div>

        </div>
        <div class="col-md-5 col-md-offset-3">
            <div class="panel pricing-table pricing-table-panel" style="margin-bottom: 40px;">
                <div class="row row-seamless">
                    <div class="pricing-table-body" style="box-shadow: none">
                        <div class="col-md-12">
                            <h2>{{ $package->package_name }}</h2>
                            <span class="text text-semibold text-primary text-center">{{ $package->package_heading }}</span>
                        </div>
                        <div class="col-md-12">
                            <p>
                                {!! $package->package_details !!}
                            </p>
                        </div>
                        <div class="col-md-12">
                            <h3 class="pricing-table-price display-inline-block"><span>$</span>{{ $package->package_price }} </h3>
                            <h4 class="text text-default text-semibold display-inline-block">/ {{ $package->package_time }}</h4>
                        </div>

                    </div>
                </div>
                @if($package->package_tag != '')
                <div class="ribbon-container">
                    <div class="ribbon bg-indigo-400">{{ $package->package_tag }}</div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- /content area -->

@endsection

@section('custom_script')



@endsection
