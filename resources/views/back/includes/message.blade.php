@if($errors->any())
    <div class="row">
        <div class="col-md-8 col-md-offset-4">
            @foreach($errors->all() as $error)
                <div class="alert alert-warning alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">Warning!</span> {!! $error !!}
                </div>
            @endforeach
        </div>
    </div>
@endif

