@extends('backend.layouts.app')


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Category List</h3>
                <div class="search col-md-8 float-left">
                    <form action="{{ route('category.search') }}" class="d-flex" method="GET">
                        <input type="text" class="form-control" name="search" required/>
                        <button class="btn btn-primary btn-sm"  type="submit">Search</button>
                    </form>
                </div>
               
                <a class="add-new float-right mb-3" href="{{Route('createCategory')}}">
                    <button class="btn btn-primary btn-sm">Add New Category</button>
                </a>
            </div>
            @include('backend.partials.msg')
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Parent Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($categories))
                        <?php $_SESSION['i'] = 0; ?>
                        @foreach($categories as $category)
                            <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                            <tr>
                                <?php $dash=''; ?>
                                <td>{{$_SESSION['i']}}</td>
                                <td>{{$category->name}}</td>
                                 <td>{{$category->slug}}</td>
                                <td>
                                    @if(isset($category->parent_id))
                                 
                                        @if(count($category->subcategory)>0)
                                        {{$category->subcategory->name}}
                                        @else
                                        {{$category->parent->name}}

                                    @endif
                                    @else
                                        None
                                    @endif

                                </td>
                               <td>                                  
                                    <a href="{{Route('editCategory', $category->id)}}">
                                        <button class="btn btn-sm btn-info">Edit</button>
                                    </a>
                                     <a href="{{Route('deleteCategory', $category->id)}}">
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </a>
                                </td>
                            </tr>
                        
                             @if(count($category->subcategory))
                                 @include('backend.category.sub-category-list',['subcategories' => $category->subcategory])
                             @endif

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