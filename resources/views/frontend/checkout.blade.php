@extends('frontend.layouts.app')
  
@section('content')


<div class="container py-4 px-4 min-vh-100">

  @if (count((array) session('cart'))>0)
    <div class="row">

      <div class="col-md-4 order-md-2 mb-4">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Your cart</span>
          <span class="badge bg-secondary badge-pill">{{ count((array) session('cart')) }}</span>
        </h4>
        <ul class="list-group mb-3">
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <b class="my-0 text-wrap">{{ $details['name'] }}</b>
            </div>

            <span class="text-muted">
                x
            </span>
            <div>
                <b class="my-0">{{ $details['quantity'] }}</b>
              </div>

            <span>৳ <b>{{ $details['price'] * $details['quantity'] }}</b></span>
          </li>
          @endforeach
          @endif


          
          <li class="list-group-item d-flex justify-content-between bg-light d-none" id="cupon_section">
            <div class="text-success">
              <h6 class="my-0" id="cuoon_name">Cupon code</h6>
              <small>Coupon Code</small>
            </div>
            <span class="text-success" id="cupon_value"></span>
          </li>

          <li class="list-group-item d-flex justify-content-between">
            <span>Total (TK.)</span>
            <strong id="total_checkValue" data-total="{{ $total }}">৳ {{ $total }}</strong>
          </li>
        </ul>

        <div class="text-error">
          <h6 class="my-0 text-danger" id="cuoon_error"></h6>
        </div>

        <form class="card p-2" action="{{route('cupponApply')}}" method="post" id="cuppon_apply">
          @csrf
          <div class="input-group">
            <input type="text" name="code" class="form-control" placeholder="cupon code" id="code">
            <div class="input-group-append">
              <button type="submit" class="btn btn-secondary">Apply</button>
            </div>
          </div>
        </form>
      </div>



      <div class="col-md-8 order-md-1">
        <h4 class="mb-3">Billing address</h4>
        @include('backend.partials.msg')
        <form class="needs-validation" action="{{route('checkout')}}" method="post" id="billing_address">
          @csrf
          <div class="mb-3">
            <label for="fullname">Full name</label>
            <input type="text" name="full_name" class="form-control" id="fullname" placeholder="Enter Full Name"  required>
            <div class="invalid-feedback">
              Valid full name is required.
            </div>
          </div>
          <input type="hidden" name="cupon" id="cupon" value="">

          <div class="mb-3">
            <label for="mobile">Mobile Number*<span class="text-muted"></span></label>
            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Enter your contact number..">
          </div>


          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required="">
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>

         
          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="country">Country</label>
              <select class="custom-select d-block w-100" name="country" id="country" required>
                <option value="">Choose...</option>
                <option value="Bangladesh">Bangladesh</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <select class="custom-select d-block w-100" name="state" id="state" required>
                <option value="">Choose...</option>
                <option value="dhaka">Dhaka</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <div class="col-md-3 mb-3">
              <label for="zip">Zip</label>
              <input type="text" class="form-control" name="zip" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>
         
          
          <hr class="mb-4">

          <h4 class="mb-3">Payment</h4>

          <div class="d-block my-3">
            

            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_type" id="cash" value="cash" checked>
                <label class="form-check-label" for="cash">
                  Cash
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_type" id="online" value="online">
                <label class="form-check-label" for="online">
                 Online
                </label>
              </div>
          </div>
          <hr class="mb-4">
          <button class="btn btn-success btn-lg btn-block" type="submit">Confirm Order</button>
        </form>
      </div>
    </div>
    @else
    <h2 class="text-center text-danger">No Product In your Cart</h2>
   @endif
  </div>

@endsection


@section('script')

  
<script>
$(document).ready(function () {

  $("form#cuppon_apply").submit(function (event) {
    event.preventDefault();
    var formData = {
      cupon: $("#code").val(),
    };


    $.ajax({
      type: "POST",
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      url: "{{route('cupponApply')}}",
      data: formData,
      dataType: "json",
      encode: true,
    }).done(function (data) {
     
      if (data!=0) {
        $("#cupon").val(data.code);
        $("#cupon_section").removeClass('d-none');
        $("#cuoon_name").text(data.code);
        $("#cupon_value").text('- ৳' +data.value);
        var cartTotalCheckPrice=parseInt($("#total_checkValue").attr("data-total"));
        var cuopon_value=parseInt(data.value);
        if(data.type=='percent'){
          var discount_value = (cartTotalCheckPrice / 100)*cuopon_value;
          cartTotalCheckPrice = cartTotalCheckPrice - discount_value;
          $("#total_checkValue").text('৳ '+cartTotalCheckPrice);

        }else {
          cartTotalCheckPrice = cartTotalCheckPrice - cuopon_value;
          $("#total_checkValue").text('৳ '+cartTotalCheckPrice);
        }

      } else {
      $("#cuoon_error").text("cupon code not match");
      }

    });
  });


//     event.preventDefault();

//   $("form#billing_address").submit(function (event) {
//     event.preventDefault();
//     var formData = {
//       cupon: $("#cupon").val(),
//       full_name: $("#full_name").val(),
//       email: $("#email").val(),
//       mobile: $("#mobile").val(),
//       address: $("#address").val(),
//       country: $("#country").val(),
//       state: $("#state").val(),
//       zip: $("#zip").val(),
//       payment_type: $("#payment_type").val(),
//     };

//     $.ajax({
//       type: "POST",
//       url: "{{route('checkout')}}",
//       data: formData,
//       dataType: "json",
//       encode: true,
//     }).done(function (data) {
     
//       if (!data.success) {
    
//       } else {
//         $("form").html(
//           '<div class="alert alert-success">' + data.message + "</div>"
//         );
//       }

//     });

//     event.preventDefault();
//   });
 });


</script>

@endsection