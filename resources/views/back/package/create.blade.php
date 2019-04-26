@extends('layouts.app')

@section('title','Add New Package')

@section('content')

    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-info panel-bordered">
            <div class="panel-heading">
                <h5 class="panel-title">Add New Package Information </h5>
            </div>

            <div class="panel-body" id="edit_data">
                <form class="form-horizontal" action="{{ route('package.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="content-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Name <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" name="package_name" required value="{{ old('package_name') }}" class="form-control" placeholder="Enter Package Name..." />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Heading <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" name="package_heading" required value="{{ old('package_heading') }}" class="form-control" placeholder="Enter Package Heading..." />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Tag </label>
                                <div class="col-lg-8">
                                    <input type="text" name="package_tag" value="{{ old('package_tag') }}" class="form-control" placeholder="Enter Package Tag..." />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Price <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" name="package_price" required value="{{ old('package_price') }}" class="form-control" placeholder="Enter Package Price..." />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Duration </label>
                                <div class="col-lg-8">
                                    <input type="text" name="package_time" value="{{ old('package_time') }}" class="form-control" placeholder="Monthly / Yearly " />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Package Status <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <select name="package_status" required class="form-control">
                                        <option value="A">Active</option>
                                        <option value="I">In Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Package Details <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea name="package_details"  class="form-control summernote"  cols="30" rows="40">{{ old('package_details') }}</textarea>
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

@section('script')



@endsection
