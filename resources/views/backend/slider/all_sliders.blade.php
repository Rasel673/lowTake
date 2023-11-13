@extends('backend.layouts.app')


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Slider List</h3>
               
                <a class="add-new float-right mb-3" href="{{Route('createSlider')}}">
                    <button class="btn btn-primary btn-sm">Add New Slider</button>
                </a>
            </div>
            @include('backend.partials.msg')
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Slider Link</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($sliders))
                        <?php $_SESSION['i'] = 0; ?>
                        @foreach($sliders as $slider)
                            <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                            <tr>
                    
                                <td>{{$_SESSION['i']}}</td>
                                <td>{{$slider->link}}</td>
                                 <td><img src="{{asset('images/'.$slider->slider_image)}}" alt="" width="100" height="100"></td>
                              
                                </td>

                                <td>                                  
                                    <a href="{{route('editSlider',$slider->id)}}">
                                        <button class="btn btn-sm btn-info">Edit</button>
                                    </a>
                                     <a href="{{route('deleteSlider',$slider->id)}}">
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </a>
                                </td>

                            </tr>
                            
                        @endforeach
                        <?php unset($_SESSION['i']); ?>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection