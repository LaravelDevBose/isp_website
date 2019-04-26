@extends('layouts.app')

@section('title','Gallery Information List')

@section('content')
    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Gallery Information List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body" id="edit_data">
                <form class="form-horizontal" action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="content-group">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-4">Gallery Title: <span class="text text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" name="gallery_title" class="form-control" placeholder="Enter Gallery Title..." />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-lg-4">Gallery Type <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <select name="gallery_type"  id="gallery_type" required class="form-control">
                                        <option value="Image">Image</option>
                                        <option value="Video">Video</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label col-lg-3">Gallery Status <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="gallery_status" required class="form-control">
                                        <option value="A">Active</option>
                                        <option value="I">In Active</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group" id="image">
                                <label class="col-lg-3 control-label text-semibold">Image: <span class="text text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="file" name="image_path" id="image_path" class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                                    <span class="help-block">Display the widget as a single block button.</span>
                                </div>
                            </div>
                            <div class="form-group" id="video" style="display: none;">
                                <label class="control-label col-lg-3">Video Url <span class="text text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="video_path" id="video_path" class="form-control" placeholder="Enter Gallery Tyitle..." />
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
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Gallery Information List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <table class="table datatable-show-all table-responsive table-hover table-bordered table-striped">
                <thead>
                <tr style="background-color: #16d1d5">
                    <th>#</th>
                    <th>Gallery Title</th>
                    <th>Gallery Type</th>
                    <th>Gallery</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($galleries) && $galleries)
                    @foreach($galleries as $gallery)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $gallery->gallery_title }}</td>
                            <td>{{ $gallery->gallery_type }}</td>
                            @if($gallery->gallery_type =='Image')
                            <td><img src="{{ asset($gallery->gallery_url) }}" alt="Slider Image" style="width: 100px ; height: 50px;"></td>
                            @else
                                <td><iframe width="100" height="100" src="{{ $gallery->gallery_url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                            @endif
                            <td>
                                @if($gallery->gallery_status == 'A')
                                    <span class="label label-success">Active</span>
                                @elseif($gallery->gallery_status == 'I')
                                    <span class="label label-warning">In Active</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <ul class="icons-list">
                                    <li class="text-danger-600"><a href="{{ route('gallery.delete', $gallery->gallery_id) }}" class="delete_data" ><i class="icon-trash"></i></a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- /content area -->

@endsection

@section('script')

    <script>
        $('#gallery_type').change(function(e){

            var type = e.target.value;
            if(type == 'Image'){
                $('#video').hide();
                $('#image').show();
                $('#video_path').val('');
            }else{
                $('#video').show();
                $('#image').hide();
                $('#image_path').val('');
            }
        });

    </script>

@endsection
