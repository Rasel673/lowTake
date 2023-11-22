@extends('backend.layouts.app')



@section('content')

<h2 class="text-center">Update Pages Settings</h2>


<div class="container mt-4">
 
  
    @include('backend.partials.msg')

    @isset($setting)
        <form method="POST" enctype="multipart/form-data" id="upload-image" action="{{ route('page_settings') }}" >
            @csrf
            
            <div class="row">
                <input type="hidden" name="page_name"   value="home_page">
    
                <div class="col-md-12">
                    <strong>Banner Section First</strong>
                </div>

                <div class="col-md-6 align-items-center d-flex">
                    <div class="form-group">
                        <label for="header_Icon" class="form-label">Banner Image 1</label>
                        <input type="file" name="banner_1" placeholder="Choose image" id="banner_1" value="{{$setting->banner_1 !=null ? $setting->banner_1:''}}">
                        @error('banner_1')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <img id="preview-banner_1-before-upload" class="float-end" src="{{asset('public/images/'.$setting->banner_1)}}"
                    alt="preview banner_1" style="max-height:100px;">
                </div>
               
                <div class="col-md-6 align-items-center d-flex">
                    <div class="form-group">
                        <label for="banner_2" class="form-label">Banner Image 2</label>
                        <input type="file" name="footer_Icon" placeholder="Choose image" id="banner_2" value="{{$setting->banner_2 !=null ? $setting->banner_2:''}}">
                        @error('banner_2')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <img id="preview-banner_2-before-upload" class="float-end" src="{{asset('public/images/'.$setting->banner_2)}}"
                    alt="preview banner_2" style="max-height:100px;">
                </div>


        
                <div class="col-md-12">
                    <strong>Banner Section Second</strong>
                </div>

                <div class="col-md-6 align-items-center d-flex">
                    <div class="form-group">
                        <label for="banner_3" class="form-label">Banner Image 3</label>
                        <input type="file" name="banner_3" placeholder="Choose image" id="banner_3" value="{{$setting->banner_3 !=null ? $setting->banner_3:''}}">
                        @error('banner_3')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <img id="preview-banner_3-before-upload" class="float-end" src="{{asset('public/images/'.$setting->banner_3)}}"
                    alt="preview banner_3" style="max-height:100px;">
                </div>
               
                <div class="col-md-6 align-items-center d-flex">
                    <div class="form-group">
                        <label for="banner_4" class="form-label">Banner Image 4</label>
                        <input type="file" name="banner_4" placeholder="Choose image" id="banner_4" value="{{$setting->banner_4 !=null ? $setting->banner_4:''}}">
                        @error('banner_4')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <img id="preview-banner_4-before-upload" class="float-end" src="{{asset('public/images/'.$setting->banner_4)}}"
                    alt="preview banner_4" style="max-height:100px;">
                </div>


                <div class="col-md-6 align-items-center d-flex mt-2">
                    <div class="form-group">
                        <label for="banner_5" class="form-label">Banner Image 5</label>
                        <input type="file" name="footer_Icon" placeholder="Choose image" id="banner_5" value="{{$setting->banner_5 !=null ? $setting->banner_5:''}}">
                        @error('banner_5')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <img id="preview-banner_5-before-upload" class="float-end" src="{{asset('public/images/'.$setting->banner_5)}}"
                    alt="preview banner_5" style="max-height:100px;">
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                      <label>Select Category of Products</label>
                      <select class="select2" name="selected_category[]" multiple="multiple" data-placeholder="Select a Category" style="width: 100%;">
                        <option value="">None</option>
                        @if($categories)
                         @foreach($categories as $item)
                            @if ($setting->selected_category!=null)
                           @php
                            $stringArray =json_decode($setting->selected_category,true);
                            $intArray = array_map('intval', $stringArray);
                           @endphp
                            <option value="{{$item->id}}" @if(in_array($item->id,$intArray, true))  selected @endif> @if($item->parent_id!=null)--@endif{{$item->name}}</option> 
                            @else
                            <option value="{{$item->id}}"> @if($item->parent_id!=null)--@endif{{$item->name}}</option> 
                            @endif                
                        @endforeach
                         @endif
                      </select>
                    </div>
                    <!-- /.form-group -->
                  </div>

                <div class="col-md-6 mt-3">
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
 
   
   $('#banner_1').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
    $('#preview-banner_1-before-upload').removeClass('d-none');
      $('#preview-banner_1-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });




        $('#banner_2').change(function(){
            let reader = new FileReader();

            reader.onload = (e) => { 
              $('#preview-banner_2-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });





           $('#banner_3').change(function(){
            let reader = new FileReader();

            reader.onload = (e) => { 
              $('#preview-banner_3-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });



           $('#banner_4').change(function(){
            let reader = new FileReader();

            reader.onload = (e) => { 
              $('#preview-banner_4-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });


           
            $('#banner_5').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => { 
              $('#preview-banner_5-before-upload').attr('src', e.target.result); 
            }
         
            reader.readAsDataURL(this.files[0]); 
           
           });


   
});





 
</script>

@endsection