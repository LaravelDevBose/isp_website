

<form class="form-horizontal" action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    {{ method_field('PUT') }}
    <fieldset class="content-group">
        <div class="form-group">
            <label class="control-label col-lg-2">Heading</label>
            <div class="col-lg-10">
                <input type="text" name="h1" value="{{ $slider->headings->h1 }}" class="form-control" placeholder="Enter Slider Heading...">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 control-label text-semibold">Slider Image:</label>
            <div class="col-lg-6">
                <input type="file" name="image_path" class="file-input" data-browse-class="btn btn-primary btn-block" data-show-remove="false" data-show-caption="false" data-show-upload="false">
                <span class="help-block">Display the widget as a single block button.</span>
            </div>
            <div class="col-md-4">
                <img src="{{ asset($slider->image_path) }}" alt="Slider Image" style="width: 100%; height: 150px;">
            </div>
            <input type="hidden" name="old_image" value="{{ $slider->image_path }}">
        </div>
    </fieldset>
    <div class="text-right">
        <button type="submit" class="btn btn-info">Update <i class="icon-arrow-right14 position-right"></i></button>
    </div>
</form>

<script type="text/javascript" src="{{ asset('public/assets/js/plugins/uploaders/fileinput/plugins/purify.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/assets/js/plugins/uploaders/fileinput/fileinput.min.js') }}"></script>


