<!-- cart items will be here -->
<div class="cartDown" style="">

  <div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 bg-secondary main-section">
          
            <div class="row total-header-section bg-dark text-white align-items-center">
                        <div class="col-lg-6 col-sm-6 col-6">
                            {{-- <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger" class="cart_qty">{{ count((array) session('cart')) }}</span> --}}
                        </div>
                        @php $total = 0 @endphp
                        @foreach((array) session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                        @endforeach
                        <div class="col-lg-6 col-sm-6 col-6 total-section text-center">
                            <p>Total: <span class="text-info">৳ {{ $total }}</span></p>
                        </div>
                    </div>

                    @if(session('cart'))
                    <table class="table table-stripe text-center " >
                      
                      <tbody id="carts_products">
                        @foreach(session('cart') as $id => $details)
                        <tr data-id="{{ $details['id'] }}">
                          <td> <img src="{{asset('images/'.$details['image'])  }}"  height="50" width="80"/></td>
                          <td class="text-center">{{ $details['name'] }}</td>
                          <td>{{ $details['quantity'] }} </td>
                          <td>৳ {{ $details['price'] }}</td>
                          {{-- <td><button class="btn btn-danger btn-sm remove-from-cart"><i class="fa-solid fa-trash"></i></button></td> --}}
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    @else

                    <table class="table table-stripe text-center">
                      
                      <tbody id="carts_products">
                       
                      </tbody>
                    </table>
                    @endif

                      
                    @if (count((array) session('cart')))
                    <div class="row pb-4" id="view_all">
                        <div class="col-lg-12 col-sm-12 col-12 text-center">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                    @else
                   <div class="row d-none pb-4" id="view_all">
                        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                            <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                        </div>
                    </div>
                    @endif



        </div>
    </div>
</div>

</div>
 

   