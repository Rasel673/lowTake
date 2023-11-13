@extends('frontend.layouts.app')
  
@section('content')
<div class="container mt-5 mb-5 min-vh-100">
 @include('backend.partials.msg')
 
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:5%"></th>
            <th style="width:10%">Quantity</th>
            <th style="width:5%"></th>
            <th style="width:10%" class="text-center">Subtotal</th>
            <th style="width:10%"></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if(session('cart'))
            @foreach(session('cart') as $id => $details)
                @php $total += $details['price'] * $details['quantity'] @endphp
                <tr data-id="{{ $id }}">
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('images/'.$details['image']) }}" width="100" height="100" class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $details['name'] }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price" class="price" data-price="{{ $details['price'] }}">&#2547; {{ $details['price'] }}</td>
                    <td><a class="btn btn-sm increment"><i class="fa-solid fa-plus"></i></a></td>
                    <td data-th="Quantity" class=""> 
                        <input type="number" value="{{ $details['quantity'] }}"  class="form-control quantity update-cart" />
                    </td>
                    <td> <a class="btn btn-sm decrement"><i class="fa-solid fa-minus"></i></a></td>
                    <td data-th="Subtotal" class="text-center subtotal">৳ {{ $details['price'] * $details['quantity'] }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>

    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong id="cart_total">Total : ৳ {{ $total }}</strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a>
                @if (count((array) session('cart'))>0)
                <a  href="{{route('checkout')}}" class="btn btn-success">Checkout</a>
                @endif
            </td>
        </tr>
    </tfoot>
</table>
</div>

@endsection
  
@section('script')
<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity: ele.parents("tr").find(".quantity").val()
            },
            success: function (response) {
               window.location.reload();
            }
        });
    });


    $(".increment").click(function(e){
        
        var ele=$(this);
       var quantity=ele.parents("tr").find(".quantity").val();
       var price=parseInt(ele.parents("tr").find(".price").attr("data-price"));
       var increment=parseInt(quantity)+1;
       $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity:increment
            },
            success: function (response) {
              var subtotal=increment*price;
              ele.parents("tr").find(".quantity").val(increment.toString());       
              ele.parents("tr").find(".subtotal").text('৳ '+subtotal.toString());     
              cartItems(response);                    
            }
        });
      
    });


    $(".decrement").click(function(e){
        
        var ele=$(this);
        var price=parseInt(ele.parents("tr").find(".price").attr("data-price"));
       var quantity=parseInt(ele.parents("tr").find(".quantity").val());
       if(quantity<=1){
        alert("Quantity should be 1");
       }else{
        var decrement=quantity-1;

        $.ajax({
            url: '{{ route('update.cart') }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id"), 
                quantity:decrement
            },
            success: function (response) {
                var subtotal=decrement*price;
                ele.parents("tr").find(".quantity").val(decrement.toString());
                ele.parents("tr").find(".subtotal").text('৳ '+subtotal.toString());    
                cartItems(response);
            }
        });
       }
      
    });




    function cartItems(data){
	var cart=$('#carts_products').html('');
    var base_url='http://127.0.0.1:8000';
	$.each(data, function(key, value) {   
		cart.append(`
		   <tr id="${value['id']}">
				<td> <img src="${base_url}/images/${value['image']}"  height="50" width="80"/></td>
					  <td class="text-center">${value['name']}</td>
					  <td>${value['quantity']}</td>
					  <td>৳ ${value['price']}</td>
					
			</tr>
		   `);
	});
}



  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
        var ele = $(this);
        if(confirm("Are you sure want to remove?")) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    ele.parents("tr").remove();
                    cartItems(response);
                    // window.location.reload();
                }
            });
        }
    });
  
</script>
@endsection