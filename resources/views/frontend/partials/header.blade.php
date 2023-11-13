
@php
  $setting=App\Models\Setting::first(); 
@endphp


   <!-- header area -->
   <header id="header_portion" class="sticky-top sticky-sm-top sticky-md-top sticky-lg-top sticky-xl-top sticky z-1020">
    <!--top bar -->
    <section class="header position-relative">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 col-sm-4 d-flex align-items-center">
            <a href="JavaScript:void(0)" id="sidebar_show" class="mt-3"><img class="icon img-fluid" src="icons/bar.svg" alt=""></a>
              <a class="mx-auto d-block" href="{{url('/')}}"><img class="headerIcon img-fluid mx-auto d-block" src="@if($setting->header_Icon!=null)
                {{asset('images/'.$setting->header_Icon)}} @endif"   alt=" {{asset('images/headerIcon.png')}}"></a>
          </div>
          <div class="col-lg-7 col-sm-8  search d-flex align-items-center">
              <form class="mt-3 w-100">
                  <i class="fa-solid fa-magnifying-glass"></i>
                  <input class="form-control rounded"  type="search" placeholder="Search" aria-label="Search">
                </form>
          </div>
          <div class="col-lg-3">
              <div class="row d-flex align-items-center">
                  <div class="col-lg-3 col-6 col-sm-6 col-xs-6">
                    <div class="laguage">
                      <img class="laguageIcon img-fluid pe-1" src="{{asset('icons/laguageIcon.svg')}}" alt=""><b>EN</b>
                    </div>
                  </div>
                  <div class="col-lg-9 col-6 col-sm-6 col-xs-6 top-nav">
                    <ul class="d-flex justify-content-around align-items-center mt-3">
                      <li class="float-end">
                          <a class="" aria-current="page" href="JavaScript:void(0)"><img class="icon img-fluid" src="{{asset('icons/bell.svg')}}" alt=""></a>
                      </li>
                      <li class="float-end">
                        <div class="text-center text-white" id="cart_price" data-price="0">

                          <span class="bg-success border border-light rounded-circle text-white" id="cart_qty"  data-qty="{{ count((array) session('cart')) }}">{{ count((array) session('cart')) }}</span><br>
                          <a href="javascript:void(0)" id="cart_show" aria-current="page" href=""><img class="icon img-fluid" src="{{asset('icons/cart.svg')}}" alt=""></a>
                          <br>
                
                        </div>
                      </li>

                      <li class="float-end">
                          <a class="" aria-current="page" href="{{route('login')}}"><img class="icon img-fluid" src="{{asset('icons/person.svg')}}" alt=""></a>
                      </li>
                      <li class="float-end">
                          <a class="" aria-current="page" href="JavaScript:void(0)"><img class="icon img-fluid" src="{{asset('icons/favorite.svg')}}" alt=""></a>
                      </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
    </div>
    {{-- cart import --}}
    @include('frontend.partials.cartItems')
    


    {{-- category sub catory --}}
</section>
 <div class="clearfix"></div>

 <!-- lower navbar -->
@include('frontend.partials.category_show')
 @include('frontend.partials.sidebar')
 </header>
 <!-- header area end -->


 @section('script')
 <script>
  // When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the navbar
var navbar = document.getElementById("header_portion");

// Get the offset position of the navbar
var sticky = navbar.offsetTop;

// Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  navbar.classList.add("sticky")

if (window.pageYOffset >= sticky) {
  
navbar.classList.add("sticky")
} else {
navbar.classList.remove("sticky");
}
}

</script>
 @endsection