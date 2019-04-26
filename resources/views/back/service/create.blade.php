@extends('layouts.app')

@section('title','Add New Service')

@section('content')
    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Add New Service Information </h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body" id="edit_data">
                <form class="form-horizontal" action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="content-group row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Service Title <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" name="service_title" required value="{{ old('service_title') }}" class="form-control" placeholder="Enter Service Title..." />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Service Icon <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="file" name="service_logo" value="{{ old('service_logo') }}" class="form-control" placeholder="Enter Service Icon..." />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">Service Status <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="service_status" required class="form-control">
                                        <option value="A">Active</option>
                                        <option value="I">In Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Service Heading <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea name="service_heading" placeholder="Service Heading Or Short Note that Show in Home Page..." class="form-control" cols="30" rows="4">{{ old('service_heading') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Service Details <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea name="service_details"  class="form-control summernote"  cols="30" rows="40">{{ old('service_details') }}</textarea>
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
