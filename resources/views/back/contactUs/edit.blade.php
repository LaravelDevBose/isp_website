@extends('layouts.app')

@section('title','Edit Contact Information')

@section('content')
    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-info panel-bordered">
            <div class="panel-heading">
                <h5 class="panel-title">Update Contact Information </h5>
            </div>
            <div class="panel-body" id="edit_data">
                <form class="form-horizontal" action="{{ route('contactUs.update',$contactUs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="content-group row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">Title <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="title" required value="{{ $contactUs->title }}" class="form-control" placeholder="Enter Contact Title..." />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="email" required value="{{ $contactUs->email }}" class="form-control" placeholder="Enter Email Address..." />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Phone No1</label>
                                <div class="col-lg-9">
                                    <input type="text" name="no1" required  value="{{ $contactUs->phone_no->no1 }}" class="form-control" placeholder="Enter Phone No1..." />
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Phone No2 </label>
                                <div class="col-lg-9">
                                    <input type="text" name="no2"  value="{{ $contactUs->phone_no->no2 }}" class="form-control" placeholder="Enter Phone nO 2..." />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-3">Phone No2 </label>
                                <div class="col-lg-9">
                                    <img src="{{ asset($contactUs->image_path) }}"  style="width: 100%; height: 150px;">
                                    <input type="hidden" name="old_image" value="{{ $contactUs->image_path }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-lg-3">Cover Image</label>
                                <div class="col-lg-9">
                                    <input type="file" name="image_path" class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                                    <span class="help-block">Display the widget as a single block button.</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-2">Address<span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <textarea name="address"  class="form-control summernote"  cols="30" rows="40">{{ $contactUs->address }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-2">Status <span class="text-danger">*</span></label>
                                <div class="col-lg-10">
                                    <select name="status" required class="form-control">
                                        <option value="A" {{ ($contactUs->status == 'A')?"selected":'' }}>Active</option>
                                        <option value="I" {{ ($contactUs->status == 'I')?"selected":'' }} >In Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label col-lg-1"> Details </label>
                                <div class="col-lg-11">
                                    <textarea name="details"  class="form-control summernote"  cols="30" rows="40">{{ $contactUs->details }}</textarea>
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
