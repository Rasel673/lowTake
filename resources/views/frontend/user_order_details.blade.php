@extends('frontend.layouts.app2')

@section('user_content')


  <!-- Table row -->
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Quantity</th>
          <th>Product</th>
          <th>Unit Price</th>
          <th>Image</th>
          <th>Subtotal</th>
        </tr>
        </thead>
        <tbody>

          @foreach ($orderItems as $item)
          <tr>
              <td>{{$item->demand_quantity}}</td>
              <td>{{$item->product->name}}</td>
              <td>&#2547;{{$item->product->price}}</td>
              <td><img src="{{asset('public/images/'.$item->product->thumbnail)}}" alt="productImage" width="60" height="50"></td>
              <td>&#2547;{{$item->demand_quantity*$item->product->price}}</td>
            </tr>
          @endforeach

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-6">
      <p class="lead">Payment Methods:{{$order->payment_type}}</p>

    </div>
    <!-- /.col -->
    <div class="col-6">
     

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Subtotal:</th>
            <td>&#2547;{{$order->order_amount}}</td>
          </tr>
          <tr>
            <th>Shipping:</th>
            <td>&#2547;0.00</td>
          </tr>
          <tr>
            <th>Total:</th>
            <td>&#2547;{{$order->order_amount}}</td>
          </tr>
        </table>
      </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->


@endsection