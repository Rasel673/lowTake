@extends('backend.layouts.app')

@section('content')

<div class="container">
    @isset($orders)

    <div class="row">
      <h3 class="col-md-12">Orders List</h3>
    </div>
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
      
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
            <div class="card-header border-transparent">
              <div class="search col-md-8 float-left">
                <form action="{{ route('Sale.search') }}" class="d-flex" method="GET">
                    <input type="text" class="form-control" name="search" required/>
                    <button class="btn btn-primary btn-sm"  type="submit">Search</button>
                </form>
            </div>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->

   
  
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                  <tr>
                    <th>Order Date</th>
                    <th>Order ID</th>
                    <th>Quantity</th>
                    <th>Payment Status</th>
                    <th>Deliver Status</th>
                    <th>Total</th>
                    <th>Action</th>

                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($orders as $order )
                 
                  <tr>
                    <td><a>{{$order->order_date}}</a></td>
                    <td>#OR-{{$order->id}}</td>
                    <td>{{$order->order_quantity}}</td>
                    <td><span class="badge badge-success">{{$order->payment_status}}</span></td>
                    <td><span class="badge badge-danger">{{$order->delivery_status}}</span></td>
                    <td>৳ {{$order->order_amount}}</td>
                    <td>
                      <a href="{{route('orderDetails',$order->id)}}" class="btn btn-primary">view</a>
                      <a href="#" class="btn btn-warning">Edit</a>
                      <a href="#" class="btn btn-info">Accept</a>
                      <a href="#" class="btn btn-danger">Cancel</a>
                    </td>
                  </tr>
                  @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                {!! $orders->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->

         

        </div>
        <!-- /.col -->
     </div>
     @endisset

</div>


@endsection