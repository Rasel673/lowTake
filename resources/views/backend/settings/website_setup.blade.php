@extends('backend.layouts.app')



@section('content')


    

<h2 class="text-center">Update Settings</h2>


<div class="container mt-4">
 
  
    @include('backend.partials.msg')

    @isset($setting)
        <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('website_setup') }}" >
            @csrf        
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="Site Title" value="{{$setting->title}}" required>
                          @error('title')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>



                <div class="col-md-6 align-items-center d-flex">
                    <div class="form-group">
                        <label for="header_Icon" class="form-label">Header Image</label>
                        <input type="file" name="header_Icon" placeholder="Choose image" id="header_Icon" value="{{$setting->header_Icon}}">
                        @error('header_Icon')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <img id="preview-header_Icon-before-upload" class="float-end" src="{{asset('images/'.$setting->header_Icon)}}"
                    alt="preview header_Icon" style="max-height:100px;">
                </div>
                <br>
                <hr>





                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="footer_phone" placeholder="Site contact number" value="{{$setting->footer_phone}}" required >
                          @error('footer_phone')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>



              
                <div class="col-md-6 align-items-center d-flex">
                    <div class="form-group">
                        <label for="footer_Icon" class="form-label">Footer Image</label>
                        <input type="file" name="footer_Icon" placeholder="Choose image" id="footer_Icon" value="{{$setting->footer_Icon}}">
                        @error('footer_Icon')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <img id="preview-footer_Icon-before-upload" class="float-end" src="{{asset('images/'.$setting->footer_Icon)}}"
                    alt="preview footer_Icon" style="max-height:100px;">
                </div>
   
              

                <div class="col-md-12">
                    <div class="form-group">
                        <input type="email" class="form-control" name="footer_email" placeholder="Site email" value="{{$setting->footer_email}}" required>
                          @error('footer_email')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label for="footer_Icon" class="form-label">Footer Adress</label>
                        <textarea name="footer_address"  class="form-control" id="footer_address" cols="5" rows="5" required>{{$setting->footer_address}}</textarea>
                          @error('footer_address')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="form-group">
                        <label for="footer_text" class="form-label">Footer Text</label>
                        <textarea name="footer_text"  class="form-control" id="footer_text" cols="5" rows="5" required>{{$setting->footer_text}}</textarea>
                          @error('footer_text')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>

                <br>
                <hr>



                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="social_fb" placeholder="Facebook Link"    value="{{$setting->social_fb}}">
                          @error('social_fb')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="social_insta" placeholder="Instagram Link" value="{{$setting->social_insta}}" >
                          @error('social_insta')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="social_linkedein" placeholder="Linkedein Link" value="{{$setting->social_linkedein}}">
                          @error('social_linkedein')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="social_youtube" placeholder="Youtube Link" value="{{$setting->social_youtube}}">
                          @error('social_youtube')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" name="social_tweet" placeholder="Tweeter Link" value="{{$setting->social_tweet}}">
                          @error('social_tweet')
                          <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                          @enderror
                    </div>
                </div>
                   
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary float-right" id="submit">Submit</button>
                </div>
            </div>     
        </form>
        @endisset

  </div>


@endsection


@section('script')
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#header_Icon').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
    $('#preview-header_Icon-before-upload').removeClass('d-none');
      $('#preview-header_Icon-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });




   $('#footer_Icon').change(function(){
            
            let reader = new FileReader();
         
            reader.onload = (e) => { 
              $('#preview-footer_Icon-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });
   
});
 
</script>

@endsection