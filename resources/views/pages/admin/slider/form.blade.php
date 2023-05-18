<div class="form-group">
    <label for="slider-text-id">Slider text</label>
    <input type="text" class="form-control" id="slider-text-id" name="slider_text" placeholder="Enter email" value="{{isset($slider)? $slider->slider_text : ''}}">
</div>
<div class="form-group">
    <label for="slder-image">File input</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="slder-image" name="slider_image">
            <label class="custom-file-label" for="slder-image">Choose file</label>
        </div>
        <div class="input-group-append">
            <span class="input-group-text">Upload</span>
        </div>
    </div>
    @if (isset($slider))
        <div>
            <label for="">Current Slider</label>
            <br>
            <img src="{{asset('storage/slider/'.$slider->slider_image)}}" alt="{{$slider->slider_image}}" width="150px">
        </div>
    @endif
    <div>

    </div>
</div>
