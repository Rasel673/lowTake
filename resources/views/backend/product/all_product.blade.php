@extends('backend.layouts.app')


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Product List</h3>
                <div class="search col-md-8 float-left">
                    <form action="{{ route('Product.search') }}" class="d-flex" method="GET">
                        <input type="text" class="form-control" name="search" required/>
                        <button class="btn btn-primary btn-sm"  type="submit">Search</button>
                    </form>
                </div>
               
                <a class="add-new float-right mb-3" href="{{Route('createProduct')}}">
                    <button class="btn btn-primary btn-sm">Add New Product</button>
                </a>
            </div>
            @include('backend.partials.msg')
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($products))
                        <?php $_SESSION['i'] = 0; ?>
                        @foreach($products as $product)
                            <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                            <tr>
                                <?php $dash=''; ?>
                                <td>{{$_SESSION['i']}}</td>
                                <td>{{$product->name}}</td>
                                <td><img src="{{asset('public/images/'.$product->thumbnail)}}" alt="" width="100" height="100"></td>
                                 <td>{{$product->category->name}}</td>
                                 <td>{{$product->price}}</td>
                                 <td>{{$product->quantity}}</td>
                               
                               <td>
                                
                                {{-- <a href="{{Route('viewProduct', $product->id)}}">
                                    <button class="btn btn-sm btn-success">view</button>
                                </a> --}}
                                    <a href="{{Route('editProduct', $product->id)}}">
                                        <button class="btn btn-sm btn-info">Edit</button>
                                    </a>
                                     <a href="{{Route('deleteProduct', $product->id)}}">
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

            <div class="box-footer">
                {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>


        </div>
    </div>
</div>
</div>
@endsection