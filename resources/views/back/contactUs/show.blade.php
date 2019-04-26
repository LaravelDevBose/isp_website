@extends('layouts.app')

@section('title','Show Contact Information')

@section('content')
    <!-- Content area -->
    <div class="content">
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Contact Details Information</h5>
                <div class="heading-elements">
                    <a href="{{ route('contactUs.create') }}" class="btn btn-success btn-sm pull-right"><i class="icon-plus2"></i> Add Contact</a>
                </div>
            </div>
            <div class="panel-body" id="edit_data">
                <div class="col-md-12">
                    <label class="text text-bold text-primary-800">Title: </label>{!! $contactUs->title !!}
                    <p class="text text-bold"><label class="text text-bold text-primary-800">Email: </label> {{ $contactUs->Email }}</p>
                </div>

                <div class="col-md-12">
                    <p class="text text-semibold"><label class="text text-bold text-primary-800">Phone No: </label>
                        {{ $contactUs->phone_no->no1 }}
                        <br>
                        {{ $contactUs->phone_no->no2 }}

                    </p>
                </div>
                <div class="col-md-12">
                    <p class="text text-bold"><label class="text text-bold text-primary-800">Address: </label> {!! $contactUs->address !!}</p>
                </div>
                <div class="col-md-12">
                    <p class="text text-bold"><label class="text text-bold text-primary-800">Cover Image: </label>
                        <img src="{{ asset($contactUs->image_path) }}" alt="" style="width: 100%; height: 300px;"></p>
                </div>

                <div class="col-md-12">
                    <p class="text"><label class="text text-bold text-primary-800"> Details: </label>   {!! $contactUs->details !!}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- /content area -->
@endsection

@section('script')



@endsection
