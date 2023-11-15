@extends('frontend.layouts.app')

@section('content')



@isset($products)
 <!-- New book section -->
<section class="books ms-3 me-3">
<div class="container-fluid">
 <div class="row pb-5 pt-5">
  <h3 class="title">{{$category->name}}</h3>  
 </div>

 <div class="row pb-5">
    @foreach ($products as $product)
    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2  p-2">
      <div class="book_card">
      <div class="book  product text-center pt-4 pb-4">
       <img  class="book_img"  src="{{asset('images/'.$product->thumbnail)}}" class="rounded mx-auto d-block" alt="">   
      <h5 class="book_title pt-2 p-1">{{$product->name}} </h5>
      <p class="mb-0">{{$product->short_desc}}</p>
      <div class="d-flex-inline star">
      <i class="fa-solid fa-star"></i>  
      <i class="fa-solid fa-star"></i>  
      <i class="fa-solid fa-star"></i>  
      <i class="fa-solid fa-star"></i>  
      </div>
      <h4 class="book_price">TK. {{$product->price}}</h4>
      <a  class="addToCart" href="{{ route('add.to.cart', $product->id)}}" data-price="{{$product->price}}">Add to Cart</a>
      </div>    
      </div>
    </div>
      @endforeach

      
</div>

</div>
</section>
    
 @endisset 

 @if (count($products)==0)
<div class="min-vh-100">

 <h5 class="text-center text-danger">No Product of this category</h5>
  
</div>

@endif
<!-- book section -->

@endsection