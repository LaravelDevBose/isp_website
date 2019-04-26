@extends('layouts.app')

@section('title','Slider Info')

@section('content')
    <!-- Content area -->
    <div class="content">

        <!-- Form horizontal -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title">Slider Image Information List</h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="reload"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
            </div>

            <div class="panel-body" id="edit_data">
                <form class="form-horizontal" action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-2">Heading</label>
                            <div class="col-lg-10">
                                <input type="text" name="h1" class="form-control" placeholder="Enter slider Heading..." />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label text-semibold">Slider Image:</label>
                            <div class="col-lg-10">
                                <input type="file" name="image_path" class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                                <span class="help-block">Recommended Image Height Width (1920*630).</span>
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
                <h5 class="panel-title">Slider Information</h5>
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
                    <th>Slider Title</th>
                    <th>Image</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($sliders) && $sliders)
                    @foreach($sliders as $slider)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $slider->headings->h1 }}</td>
                        <td><img src="{{ asset($slider->image_path) }}" alt="Slider Image" style="width: 100px ; height: 50px;"></td>
                        <td class="text-center">
                            <ul class="icons-list">
                                <li class="text-primary-600"><a  href="{{ route('slider.edit',$slider->id) }}"  class="sliderEdit"><i class="icon-pencil7"></i></a></li>
                                <li class="text-danger-600"><a href="{{ route('slider.delete', $slider->id) }}" class="delete_data" ><i class="icon-trash"></i></a></li>
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
        $('.sliderEdit').click(function(e){
            e.preventDefault();
            $.ajax({
                url:$(this).attr('href'),
                type:'GET',
                DataType:'html',
                success:function(data) {
                    $('#edit_data').empty();
                    $('#edit_data').html(data);
                },error:function(error){
                    header_top_message('warning','Some Error Found');
                    console.log(error);
                }
            })
        });
    </script>

@endsection
