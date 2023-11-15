@extends('frontend.layouts.app2')

@section('user_content')

@php
    $userId=auth()->user()->id;
    $orders=App\Models\Order::where('user_id',$userId)->get(); 
    
@endphp


@if(count($orders)>0)

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
                <td><span class="badge bg-success">{{$order->payment_status}}</span></td>
                <td><span class="badge bg-danger">{{$order->delivery_status}}</span></td>
                <td>৳ {{$order->order_amount}}</td>
                <td>
                  <a href="{{route('user.orderDetails',$order->id)}}" class="btn btn-primary">view</a>
                </td>
              </tr>
              @endforeach

              </tbody>
            </table>
          </div>
          <!-- /.table-responsive -->
  </div>
  @else

  <h3 class="text-danger text-center">You did not any order</h3>
  @endif

  @endsection