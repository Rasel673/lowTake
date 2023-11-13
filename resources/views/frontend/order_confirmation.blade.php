@extends('frontend.layouts.app')

@section('content')

<div class="container">
    <div class="row m-5"></div>
    <div class="row m-5">
      <h3 class="text-center text-success">Thanks For your Order. Your Order Successfully Placed!</h3>

      @isset($new_order)
        <div class="col-md-7 offset-3 mt-4">
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center"><b class="text-white text-lg"><i class="fa-solid fa-check p-3 bg-success rounded-circle"></i></b></h5>
                  <h6 class="card-subtitle mb-4"><b class="float-start">Order Date:{{$new_order->order_date}} </b> <b class="float-end">Order Id: #{{$new_order->id}}</b></h6><br>
                  <h6>Payment type:{{$new_order->payment_type}} </h6>
                  <h6>Payment Status: {{$new_order->payment_status}}</h6>
                  <h6>Delivery Status: {{$new_order->delivery_status}}</h6>
                  <h6>Oreder Total: {{$new_order->order_amount}}</h6>
                  <h6>Order Quantity: {{$new_order->order_quantity}}</h6>
                 

              <p class="card-text">Shipping Address:
                <address>
                  @if ( $new_order->shipping_address)
                  <strong>Name:{{ $orderAddress['full_name'] !=null?$orderAddress['full_name']:''}}</strong><br>
                  Phone: {{$orderAddress['mobile']!=null?$orderAddress['mobile']:''}}<br>
                  Address:{{$orderAddress['address']!=null?$orderAddress['address']:''}}<br>
                  {{$orderAddress['state']!=null? $orderAddress['state']:''}}({{$orderAddress['zip']!=null?$orderAddress['zip']:''}}),{{$orderAddress['country']!=null?$orderAddress['country']:''}}<br>
                  Email: {{$orderAddress['email']!=null? $orderAddress['email']:''}}
                  
              @else
                  <p>No shipping address available.</p>
              @endif
                </address>
                  </p>
                  <a href="{{url('/')}}" class="btn btn-sm btn-success text-center">Shop More</a>
                </div>
              </div>
        </div>
        @endisset
    </div>
    <div class="row m-5"></div>
</div>

@endsection