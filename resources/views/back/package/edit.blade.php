@extends('layouts.app')

@section('title','Edit Package Info')

@section('content')
    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-info panel-bordered">
            <div class="panel-heading">
                <h5 class="panel-title">Update Package Information </h5>
            </div>

            <div class="panel-body" id="edit_data">
                <form class="form-horizontal" action="{{ route('package.update', $package->package_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <fieldset class="content-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Name <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" name="package_name" required value="{{ $package->package_name }}" class="form-control" placeholder="Enter Package Name..." />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Heading <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" name="package_heading" required value="{{ $package->package_heading }}" class="form-control" placeholder="Enter Package Heading..." />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Tag </label>
                                <div class="col-lg-8">
                                    <input type="text" name="package_tag" value="{{ $package->package_tag }}" class="form-control" placeholder="Enter Package Tag..." />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Price <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" name="package_price" required value="{{ $package->package_price }}" class="form-control" placeholder="Enter Package Price..." />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Duration </label>
                                <div class="col-lg-8">
                                    <input type="text" name="package_time" value="{{ $package->package_time }}" class="form-control" placeholder="Monthly / Yearly " />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Status <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <select name="package_status" required class="form-control">
                                        <option value="A" {{ ($package->package_status == 'A')?'selected':'' }}>Active</option>
                                        <option value="I" {{ ($package->package_status == 'I')?'selected':'' }}>In Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Package Details <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea name="package_details"  class="form-control summernote"  cols="30" rows="40">{{ $package->package_details }}</textarea>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">Submit <i class="icon-arrow-right14 position-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form horizontal -->
    </div>
    <!-- /content area -->
@endsection

@section('custom_script')



@endsection
