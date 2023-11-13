@extends('frontend.layouts.app')

@section('content')


@include('frontend.partials.slider')
    

@php
  $products=App\Models\Product::with('category')->get(); 
@endphp



    <!-- New book section -->
<section class="books ms-3 me-3">
<div class="container-fluid">
 <div class="row pb-5 pt-5">
  <h3 class="title">নতুন প্রকাশিত বই</h3>  
 </div>
<div class="row justify-content-between pb-5">

<div class="col-2  book_card">
<div class="book  product text-center pt-4 pb-4">
 <img  class="book_img"  src="images/Book 1.png" class="rounded mx-auto d-block" alt="">   
<h5 class="book_title pt-2 p-1">The Light Beyond the Garden Wall </h5>
<p class="mb-0">Scott Whitehead</p>
<div class="d-flex-inline star">
<i class="fa-solid fa-star"></i>  
<i class="fa-solid fa-star"></i>  
<i class="fa-solid fa-star"></i>  
<i class="fa-solid fa-star"></i>  
</div>
<h4 class="book_price">TK. 372</h4>
<button  class="addToCart" data-price="372">Add to Cart</button>
</div>    
</div>

<div class="col-2  book_card">
<div class="book  product text-center pt-4 pb-4">
 <img  class="book_img"  src="images/Book 1.png" class="rounded mx-auto d-block" alt="">   
<h5 class="book_title pt-2 p-1">The Light Beyond the Garden Wall </h5>
<p class="mb-0">Scott Whitehead</p>
<div class="d-flex-inline star">
<i class="fa-solid fa-star"></i>  
<i class="fa-solid fa-star"></i>  
<i class="fa-solid fa-star"></i>  
<i class="fa-solid fa-star"></i>  
</div>
<h4 class="book_price">TK. 372</h4>
<button  class="addToCart" data-price="372">Add to Cart</button>
</div>    
</div>


<div class="col-2  book_card">
  <div class="book  product text-center pt-4 pb-4">
   <img  class="book_img"  src="images/Book 1.png" class="rounded mx-auto d-block" alt="">   
  <h5 class="book_title pt-2 p-1">The Light Beyond the Garden Wall </h5>
  <p class="mb-0">Scott Whitehead</p>
  <div class="d-flex-inline star">
  <i class="fa-solid fa-star"></i>  
  <i class="fa-solid fa-star"></i>  
  <i class="fa-solid fa-star"></i>  
  <i class="fa-solid fa-star"></i>  
  </div>
  <h4 class="book_price">TK. 372</h4>
  <button  class="addToCart" data-price="372">Add to Cart</button>
  </div>    
  </div>

  <div class="col-2  book_card">
    <div class="book  product text-center pt-4 pb-4">
     <img  class="book_img"  src="images/Book 1.png" class="rounded mx-auto d-block" alt="">   
    <h5 class="book_title pt-2 p-1">The Light Beyond the Garden Wall </h5>
    <p class="mb-0">Scott Whitehead</p>
    <div class="d-flex-inline star">
    <i class="fa-solid fa-star"></i>  
    <i class="fa-solid fa-star"></i>  
    <i class="fa-solid fa-star"></i>  
    <i class="fa-solid fa-star"></i>  
    </div>
    <h4 class="book_price">TK. 372</h4>
    <button  class="addToCart" data-price="372">Add to Cart</button>
    </div>    
    </div>

    <div class="col-2  book_card">
      <div class="book  product text-center pt-4 pb-4">
       <img  class="book_img"  src="images/Book 1.png" class="rounded mx-auto d-block" alt="">   
      <h5 class="book_title pt-2 p-1">The Light Beyond the Garden Wall </h5>
      <p class="mb-0">Scott Whitehead</p>
      <div class="d-flex-inline star">
      <i class="fa-solid fa-star"></i>  
      <i class="fa-solid fa-star"></i>  
      <i class="fa-solid fa-star"></i>  
      <i class="fa-solid fa-star"></i>  
      </div>
      <h4 class="book_price">TK. 372</h4>
      <button  class="addToCart" data-price="372">Add to Cart</button>
      </div>    
      </div>

</div>

</div>
</section>
    
    <!-- banner area -->
    <section class="banner_1">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <div class="col-6"><img src="{{asset('images/banner_1.png')}}" class="img-fluid rounded" alt=""></div>
                <div class="col-6"><img src="{{asset('images/banner_1.png')}}" class="img-fluid rounded" alt=""></div>
                
            </div>
        </div>
    </section>
    
    
    <!-- book section -->
  
 @isset($products)
  
<section class="books ms-3 me-3">
  <div class="container-fluid">
    <div class="row pb-5 pt-5">
      <div class="col-6 text-left"><h3 class="title">ইসলামিক বই</h3></div>
      <div class="col-6 text-right"><a href="" class="title float-end">সবগুলো দেখুন</a></div>
        </div>

  <div class="row  pb-5">
      @foreach ($products as $product)
      <div class="col-2 p-2">
        <div class="book_card">
        <div class="book  product text-center pt-4 pb-4">
         <img  class="book_img"  src="images/Book 1.png" class="rounded mx-auto d-block" alt="">   
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
    
      <!-- book section -->
    
    
    
    
    

      <section class="books ms-3 me-3">
      <div class="container-fluid">
    
        <div class="row pb-5 pt-5">
          <div class="col-6 text-left"><h3 class="title">ইসলামিক বই</h3></div>
          <div class="col-6 text-right"><a href="" class="title float-end">সবগুলো দেখুন</a></div>
            </div>
    
      <div class="row justify-content-between pb-5">
      <div class="col-2 book_card">
      <div class="book  text-center pt-4 pb-4">
       <img  class="book_img"  src="{{asset('images/Book 1.png')}}" class="rounded mx-auto d-block" alt="">   
      <h5 class="book_title pt-2 p-1">The Light Beyond the Garden Wall </h5>
      <p class="mb-0">Scott Whitehead</p>
      <div class="d-flex-inline star">
      <i class="fa-solid fa-star"></i>  
      <i class="fa-solid fa-star"></i>  
      <i class="fa-solid fa-star"></i>  
      <i class="fa-solid fa-star"></i>  
      </div>
      <h4 class="book_price">TK. 372</h4>
      <a href="#" class="addToCart">Add to Cart</a>
      </div>    
      </div>
      
      <div class="col-2 book_card">
          <div class="book  text-center pt-4 pb-4">
           <img  class="book_img"  src="{{asset('images/Book 1.png')}}" class="rounded mx-auto d-block" alt="">   
          <h5 class="book_title pt-2 p-1">The Light Beyond the Garden Wall </h5>
          <p class="mb-0">Scott Whitehead</p>
          <div class="d-flex-inline star">
          <i class="fa-solid fa-star"></i>  
          <i class="fa-solid fa-star"></i>  
          <i class="fa-solid fa-star"></i>  
          <i class="fa-solid fa-star"></i>  
          </div>
          <h4 class="book_price">TK. 372</h4>
          <a href="#" class="addToCart">Add to Cart</a>
          </div>    
          </div>
      
      
          <div class="col-2 book_card">
              <div class="book  text-center pt-4 pb-4">
               <img  class="book_img"  src="{{asset('images/Book 1.png')}}"  class="rounded mx-auto d-block" alt="">   
              <h5 class="book_title pt-2 p-1">The Light Beyond the Garden Wall </h5>
              <p class="mb-0">Scott Whitehead</p>
              <div class="d-flex-inline star">
              <i class="fa-solid fa-star"></i>  
              <i class="fa-solid fa-star"></i>  
              <i class="fa-solid fa-star"></i>  
              <i class="fa-solid fa-star"></i>  
              </div>
              <h4 class="book_price">TK. 372</h4>
              <a href="#" class="addToCart">Add to Cart</a>
              </div>    
              </div>
      
              <div class="col-2 book_card">
                  <div class="book  text-center pt-4 pb-4">
                   <img  class="book_img"  src="{{asset('images/Book 1.png')}}" class="rounded mx-auto d-block" alt="">   
                  <h5 class="book_title pt-2 p-1">The Light Beyond the Garden Wall </h5>
                  <p class="mb-0">Scott Whitehead</p>
                  <div class="d-flex-inline star">
                  <i class="fa-solid fa-star"></i>  
                  <i class="fa-solid fa-star"></i>  
                  <i class="fa-solid fa-star"></i>  
                  <i class="fa-solid fa-star"></i>  
                  </div>
                  <h4 class="book_price">TK. 372</h4>
                  <a href="#" class="addToCart">Add to Cart</a>
                  </div>    
                  </div>
      
                  <div class="col-2 book_card">
                      <div class="book  text-center pt-4 pb-4">
                       <img  class="book_img"  src="{{asset('images/Book 1.png')}}" class="rounded mx-auto d-block" alt="">   
                      <h5 class="book_title pt-2 p-1">The Light Beyond the Garden Wall </h5>
                      <p class="mb-0">Scott Whitehead</p>
                      <div class="d-flex-inline star">
                      <i class="fa-solid fa-star"></i>  
                      <i class="fa-solid fa-star"></i>  
                      <i class="fa-solid fa-star"></i>  
                      <i class="fa-solid fa-star"></i>  
                      </div>
                      <h4 class="book_price">TK. 372</h4>
                      <a href="#" class="addToCart">Add to Cart</a>
                      </div>    
                      </div>
      </div>
      
      </div>
      </section>
        
    
      
    <!-- banner area -->
    <section class="banner_1">
      <div class="container-fluid">
          <div class="row justify-content-evenly">
              <div class="col-4"><img src="{{asset('images/banner_2.png')}}" class="img-fluid rounded" alt=""></div>
              <div class="col-4"><img src="{{asset('images/banner_2.png')}}" class="img-fluid rounded" alt=""></div>
              <div class="col-4"><img src="{{asset('images/banner_2.png')}}" class="img-fluid rounded" alt=""></div>
              
          </div>
      </div>
    </section>
   
    
      
 @isset($products)
  
 <section class="books ms-3 me-3">
   <div class="container-fluid">
     <div class="row pb-5 pt-5">
       <div class="col-6 text-left"><h3 class="title">ইসলামিক বই</h3></div>
       <div class="col-6 text-right"><a href="" class="title float-end">সবগুলো দেখুন</a></div>
         </div>
 
   <div class="row justify-content-between pb-5">
       @foreach ($products as $product)
       <div class="col-2  book_card">
         <div class="book  product text-center pt-4 pb-4">
          <img  class="book_img"  src="images/Book 1.png" class="rounded mx-auto d-block" alt="">   
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
         @endforeach
 
 
 
   </div>
 
   </div>
   </section>
 
   @endisset   
     
       <!-- book section -->

        
 @isset($products)
  
 <section class="books ms-3 me-3">
   <div class="container-fluid">
     <div class="row pb-5 pt-5">
       <div class="col-6 text-left"><h3 class="title">ইসলামিক বই</h3></div>
       <div class="col-6 text-right"><a href="" class="title float-end">সবগুলো দেখুন</a></div>
         </div>
 
   <div class="row justify-content-between pb-5">
       @foreach ($products as $product)
       <div class="col-2  book_card">
         <div class="book  product text-center pt-4 pb-4">
          <img  class="book_img"  src="images/Book 1.png" class="rounded mx-auto d-block" alt="">   
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
         @endforeach
 
 
 
   </div>
 
   </div>
   </section>
 
   @endisset   
     
       <!-- book section -->
   

@endsection