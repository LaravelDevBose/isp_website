@extends('layouts.app')

@section('title','Edit Service Information')

@section('content')
    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Update Service Information </h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body" id="edit_data">
                <form class="form-horizontal" action="{{ route('service.update', $service->service_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <fieldset class="content-group row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Service Title <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <input type="text" name="service_title" required value="{{ $service->service_title }}" class="form-control" placeholder="Enter Service Title..." />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Service Icon <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="file" name="service_logo"  class="form-control" placeholder="Enter Service Icon..." />
                                    @if($service->service_logo)
                                        <img src="{{ $service->service_logo }}" alt="" style="width: 50px; height: 50px;">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">Service Status <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="service_status" required class="form-control">
                                        <option value="A" {{ ($service->service_status == 'A')?'selected':'' }}>Active</option>
                                        <option value="I" {{ ($service->service_status == 'I')?'selected':'' }}>In Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Service Heading <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea name="service_heading" placeholder="Service Heading Or Short Note that Show in Home Page..." class="form-control" cols="30" rows="4">{{ $service->service_heading }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Service Details <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea name="service_details"  class="form-control summernote"  cols="30" rows="40">{!! $service->service_details !!}</textarea>
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
