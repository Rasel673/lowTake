@extends('backend.layouts.app')



@section('style')
<link rel="stylesheet" href="{{asset('public/backend/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-2">

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Product</h3>
                    @include('backend.partials.msg')
                </div>
                <form role="form" method="post" action="{{route('editProduct',$product->id)}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="row">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Select category*</label>
                                    <select type="text" name="category_id" class="form-control">
                                        <option value="">None</option>
                                        @if($categories)
                                            @foreach($categories as $item)
                                               
                                            <option value="{{$item->id}}" @if($product->category->id == $item->id ) selected @endif> @if($item->parent_id!=null)--@endif{{$item->name}}</option>
                                              
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>


                           
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <input type="text" name="discount" placeholder="discount amount" class="form-control" value="{{$product->discount}}" />
                                     
                                </div>
                            </div>



                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Product Name*</label>
                                    <input type="text" name="name" class="form-control" placeholder="Product name" value="{{$product->name}}" required />
                                </div>
                            </div>

                            <div class="col-sm-6">
                            <div class="form-group">
                                <label>Product Sku</label>
                                <input type="text" name="sku" class="form-control" placeholder="Product Sku" value="{{$product->sku}}" />
                            </div>
                        </div>


                     <div class="col-sm-6">
                            <div class="form-group">
                                <label>Product Price*</label>
                                <input type="text" name="price" class="form-control" placeholder="Product price" value="{{$product->price}}" />
                            </div>
                        </div>



                        
                     <div class="col-sm-6">
                        <div class="form-group">
                            <label>Product quantity*</label>
                            <input type="text" name="quantity" class="form-control" placeholder="Product quantity" value="{{$product->quantity}}" />
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Short Description</label>
                            <textarea class="form-control" name="short_desc" rows="3" placeholder="Enter ...">{{$product->short_desc}}</textarea>
                          </div>
                        </div>


                    <div class="col-md-6 align-items-center d-flex">
                        <div class="form-group">
                            <label for="image" class="form-label">Select Product Image</label><br>
                            <input type="file" name="image" placeholder="Choose image" id="image" value="{{$product->thumbnail}}">
                              @error('image')
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                        </div>

                        <img id="preview-image-before-upload" class="float-end" src="{{asset('images/'.$product->thumbnail)}}"
                        alt="preview image" style="max-height:100px;">
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="long_desc" rows="5" cols="5" id="summernote" placeholder="Enter ...">{!!$product->long_desc!!}</textarea>
                          </div>
                        </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">update</button>

                    </div> 
                </form>

              
               
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
<!-- Summernote -->
<script src="{{asset('public/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>

<script type="text/javascript">
      
$(document).ready(function (e) {
 
    $(function () {
    // Summernote
    $('#summernote').summernote();

  });
   
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