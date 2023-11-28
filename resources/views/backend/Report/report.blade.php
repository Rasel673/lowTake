@extends('backend.layouts.app')

@section('content')

<div class="container">
    @isset($orders)

    <div class="row">
      <h3 class="col-md-12">Report</h3>
    </div>

    @include('backend.partials.msg')
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
            <div class="card-header border-transparent">
              <div class="col-md-6 float-left">
                <form action="{{route('filter_report','custom')}}" class="d-flex" method="GET">
                    <div>
                        <label>Start Date</label>
                        <input type="date" class="form-control" name="start_date" required/>
                    </div>

                    <div>
                        <label>End Date</label> <input type="date" class="form-control" name="end_date" required/>
                    </div>
                    
                    <div>
                        
                        <br>
                        <p></p>
                        <button class="btn btn-primary btn-sm ml-1"  type="submit"><b>submit</b></button>
                    </div>
                </form>
            </div>

              <div class="card-tools">

                <a href="{{route('filter_report','today')}}" class="btn btn-sm btn-primary">Today</a>
                <a href="{{route('filter_report','previous_day')}}" class="btn btn-sm btn-primary">Previous Day</a>
                <a href="{{route('filter_report','current_month')}}" class="btn btn-sm btn-primary">This Month</a>
                <a href="{{route('filter_report','previous_month')}}" class="btn btn-sm btn-primary">Previous Month</a>
                <a href="{{route('filter_report','current_year')}}" class="btn btn-sm btn-primary">Current Year</a>

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
                    @php
                    $orderTotal=0; 
                    @endphp

                    @foreach ($orders as $order )
                    
                    @php
                        $orderTotal+=$order->order_amount;
                    @endphp
                  <tr>
                    <td><a>{{$order->order_date}}</a></td>
                    <td>#OR-{{$order->id}}</td>
                    <td>{{$order->order_quantity}}</td>
                    <td><span class="badge badge-success">{{$order->payment_status}}</span></td>
                    <td><span class="badge badge-danger">{{$order->delivery_status}}</span></td>
                    <td>৳ {{$order->order_amount}}</td>
                    <td>
                        <a href="{{route('orderDetails',$order->id)}}" class="btn btn-primary">view</a>
        
                      </td>
                  </tr>
                  @endforeach

                  </tbody>
                  <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><b>Total:</b></td>
                        <td>৳ {{$orderTotal}}</td> 
                        <td></td>

                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

         

        </div>
        <!-- /.col -->
     </div>
     @endisset

</div>


@endsection

