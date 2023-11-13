@extends('backend.layouts.app')



@section('content')



<div class="container mt-4">
 
    <h2 class="text-center">Udate Slider Image</h2>

    @include('backend.partials.msg')
        <form method="POST" enctype="multipart/form-data" id="update-image" action="{{ route('updateSlider',$slider->id) }}" >
            @csrf
            @method('put')        
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Slider Title"  value="{{$slider->title}}">
                          @error('title')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="link" placeholder="Slider link" value="{{$slider->link}}" >
                          @error('link')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image" class="form-label">Slider Image Size Should be(580x118)</label>
                        <input type="file" name="image" placeholder="Choose image" id="image" value="{{$slider->slider_image}}">
                          @error('image')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>
   
                <div class="col-md-12 mb-2">
                    <img id="preview-image-before-upload"  src="{{asset('images/'.$slider->slider_image)}}"
                        alt="preview image" style="max-height: 250px;">
                </div>
                   
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">update</button>
                </div>
            </div>     
        </form>
  </div>


@endsection


@section('script')
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>

@endsection