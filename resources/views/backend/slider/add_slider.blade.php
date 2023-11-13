@extends('backend.layouts.app')



@section('content')



<div class="container mt-4">
 
    <h2 class="text-center">Upload Slider</h2>

    @include('backend.partials.msg')
        <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('storeSlider') }}" >
            @csrf        
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Slider Title" >
                          @error('title')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <input type="text" class="form-control" name="link" placeholder="Slider link" >
                          @error('link')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="form-group">
                        <label for="image" class="form-label">Slider Image Size Should be(580x118)</label>
                        <input type="file" name="image" placeholder="Choose image" id="image">
                          @error('image')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>
   
                <div class="col-md-12 mb-2">
                    <img id="preview-image-before-upload" class="d-none" src=""
                        alt="preview image" style="max-height: 250px;">
                </div>

                
                   
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
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
    $('#preview-image-before-upload').removeClass('d-none');
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>

@endsection