@extends('layouts.app')

@section('title','Service Details')

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Service Details Information</h5>
                <div class="heading-elements">
                    <a href="{{ route('service.create') }}" class="btn btn-success btn-sm pull-right"><i class="icon-plus2"></i> Add Service</a>
                </div>
            </div>
            <div class="panel-body" id="edit_data">
                <div class="col-md-12">
                    <label class="text text-bold text-primary-800">Service Icon: </label>{!! $service->service_logo !!}
                    <p class="text text-bold"><label class="text text-bold text-primary-800">Service Title: </label> {{ $service->service_title }}</p>
                </div>

                <div class="col-md-12">
                    <p class="text text-semibold"><label class="text text-bold text-primary-800">Service Heading: </label>   {{ $service->service_heading }}</p>
                </div>

                <div class="col-md-12">
                    <p class="text"><label class="text text-bold text-primary-800">Service Details: </label>   {!! $service->service_details !!}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection

@section('custom_script')



@endsection
