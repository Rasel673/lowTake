@extends('backend.layouts.app')


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Coupon List</h3>
                
               
                <a class="add-new float-right mb-3" href="{{Route('admin.storeCoupon')}}">
                    <button class="btn btn-primary btn-sm">Add New Coupon</button>
                </a>
            </div>
            @include('backend.partials.msg')
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Coupon Code</th>
                        <th>Coupon type</th>
                        <th>value</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($coupons))
                        <?php $_SESSION['i'] = 0; ?>
                        @foreach($coupons as $Coupon)
                            <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                            <tr>
                              <td>{{$_SESSION['i']}}</td>
                                <td>{{$Coupon->code }}</td>
                                 <td>{{$Coupon->type}}</td>
                                <td>
                                    {{$Coupon->value}}
                                </td>
                               <td>                                  
                                    <a href="{{Route('admin.updateCoupon', $Coupon->id)}}">
                                        <button class="btn btn-sm btn-info">Edit</button>
                                    </a>
                                     <a href="{{Route('deleteCuopon', $Coupon->id)}}">
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