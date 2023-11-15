@extends('backend.layouts.app')

@section('content')


@php
$orders=App\Models\Order::orderBy('id', 'DESC')->get()->take(10); 
$totalOrders=App\Models\Order::orderBy('id', 'DESC')->count(); 
$pendingOrders=App\Models\Order::where('delivery_status', 'pending')->count(); 
$members=App\Models\User::where('type','==', 0)->count(); 
$products=App\Models\Product::count(); 
@endphp


<div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-goods"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Product</span>
            <span class="info-box-number">
             {{$products}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pending Orders</span>
            <span class="info-box-number">{{$pendingOrders}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Sales</span>
            <span class="info-box-number">{{$totalOrders}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Members</span>
            <span class="info-box-number">{{$members}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

 

@isset($orders)

    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Latest Orders</h3>
  
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
                    <th>Status</th>
                    <th>Total</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($orders as $order )
                 
                  <tr>
                    <td><a>{{$order->order_date}}</a></td>
                    <td>#OR-{{$order->id}}</td>
                    <td>{{$order->order_quantity}}</td>
                    <td><span class="badge badge-success">{{$order->delivery_status}}</span></td>
                    <td>৳ {{$order->order_amount}}</td>
                  </tr>
                  @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <a href="{{route('allSales')}}" class="btn btn-sm btn-primary float-right">View All Orders</a>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->

         

        </div>
        <!-- /.col -->
     </div>
     @endisset
    <!-- /.row -->
  </div><!--/. container-fluid -->
@endsection

@section('script')
<!-- jQuery Mapael -->
<script src="{{asset('backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('backend/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('backend/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
{{-- <script src="{{asset('plugins/jquery-mapael/maps/usa_states.min.js')}}"></script> --}}
<!-- ChartJS -->
<script src="{{asset('backend/plugins/chart.js/Chart.min.js')}}"></script>

@endsection