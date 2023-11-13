@extends('backend.layouts.app')

@section('content')


<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
        
          <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <div class="row invoice-info mb-3">
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                            


              </div>


              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
              


              </div>

              <!-- /.col -->
              <div class="col-sm-4 invoice-col float-end">
                <b>Invoice: {{$order->order_date}}-{{$order->id}}</b><br>
                <b>Date: {{$order->order_date}}</b><br>
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
                        <td><img src="{{asset('images/'.$item->product->thumbnail)}}" alt="productImage" width="60" height="50"></td>
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

            <!-- this row will not appear when printing -->
            <div class="row no-print">
              <div class="col-12">
                <a href="{{route('orderInvoice',$order->id)}}" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                  Payment
                </button>
                {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                  <i class="fas fa-download"></i> Generate PDF
                </button> --}}
              </div>
            </div>


          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection