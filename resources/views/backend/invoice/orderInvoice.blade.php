<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lowtake | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend//dist/css/adminlte.min.css')}}">
</head>

<body>


<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
        
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> LowTake.
                  <small class="float-right">Date: {{$order->order_date}}</small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  @if ( $order->shipping_address)

                  <strong>{{ $orderAddress['full_name'] !=null?$orderAddress['full_name']:''}}</strong><br>
                  Phone: {{$orderAddress['mobile']!=null?$orderAddress['mobile']:''}}<br>
                  Address:{{$orderAddress['address']!=null?$orderAddress['address']:''}}<br>
                  {{$orderAddress['state']!=null? $orderAddress['state']:''}}({{$orderAddress['zip']!=null?$orderAddress['zip']:''}}),{{$orderAddress['country']!=null?$orderAddress['country']:''}}<br>
                  Email: {{$orderAddress['email']!=null? $orderAddress['email']:''}}
                  
              @else
                  <p>No shipping address available.</p>
              @endif
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Invoice {{$order->order_date}}-{{$order->id}}</b><br>
                <br>
                <b>Order ID:</b>  #OR-{{$order->id}}<br>
                <b>Payment Status:</b> {{$order->payment_status}}<br>
                <b>Delivery Status:</b> {{$order->delivery_status}}<br>
                
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

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

          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

<!-- ./wrapper -->
<!-- Page specific script -->
<script>
    window.addEventListener("load", window.print());
  </script>
  </body>
  </html>