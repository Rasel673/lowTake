@extends('frontend.layouts.app')

@section('content')


@include('frontend.partials.slider')
    

@php
  $newProducts=App\Models\Product::with('category')->orderBy('id','desc')->limit(5)->get();
  $islamicBooks=App\Models\Product::with('category')->orderBy('id','desc')->where('islamic','1')->limit(6)->get();
  $popularBooks=App\Models\Product::with('category')->orderBy('id','desc')->where('popular','1')->limit(6)->get();
  $childrenBooks=App\Models\Product::with('category')->orderBy('id','desc')->where('children','1')->limit(6)->get();
  $novels=App\Models\Product::with('category')->orderBy('id','desc')->where('novels','1')->limit(6)->get();

  $HomePage=App\Models\HomePage::first(); 
  $HomePageCategories=App\Models\HomePage::select('selected_category')->first();
  $stringArray =json_decode($HomePageCategories->selected_category,true);
    if($stringArray){
  $CategoriesIds= array_map('intval', $stringArray); 
  }
  
@endphp

    <!-- New book section -->
<section class="books ms-3 me-3">
<div class="container-fluid">
 <div class="row pb-5 pt-5">
  <h3 class="title">নতুন প্রকাশিত বই</h3>  
 </div>

 <div class="row pb-5 justify-content-between">
    @foreach ($newProducts as $product)
    <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2  p-2">
      <div class="book_card">
      <div class="book  product text-center pt-4 pb-4">
       <img  class="book_img"  src="{{asset('public/images/'.$product->thumbnail)}}" class="rounded mx-auto d-block img-contain"  alt="">   
      <h5 class="book_title pt-2 p-1">{{$product->name}} </h5>
      <p class="mb-0">{{$product->short_desc}}</p>
      <div class="d-flex-inline star">
        @for ($i=1; $i<=$product->rating;$i++)
        <i class="fa-solid fa-star"></i>  
        @endfor
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
    
    <!-- banner area -->
    <section class="banner_1">
        <div class="container-fluid">
            <div class="row justify-content-evenly">
                <div class="col-6">
                  @if ($HomePage->banner_1!=null)
                  <img src="{{asset('public/images/'.$HomePage->banner_1)}}" class="img-fluid rounded" alt="">
                  @else
                  <img src="{{asset('public/images/banner_1.png')}}" class="img-fluid rounded" alt="">
                  @endif
                  
                </div>
                <div class="col-6">
                  @if ($HomePage->banner_2!=null)
                  <img src="{{asset('public/images/'.$HomePage->banner_2)}}" class="img-fluid rounded" alt="">
                  @else
                  <img src="{{asset('public/images/banner_1.png')}}" class="img-fluid rounded" alt="">
                  @endif
                </div>
                
            </div>
        </div>
    </section>
    
    
    <!-- book section -->

  @isset($CategoriesIds)
  
    @foreach ($CategoriesIds as $categoryId)
    @php
      $products=App\Models\Product::where('category_id',$categoryId)->limit(6)->get(); 
      $category=App\Models\Category::select('id','name')->where('id',$categoryId)->first(); 
    @endphp
    
    @if(count($products)>0)

    <section class="books ms-3 me-3">
      <div class="container-fluid">
        <div class="row pb-5 pt-5">

          <div class="col-6 text-left"><h3 class="title">{{ $category->name}}</h3></div>
          <div class="col-6 text-right"><a href="{{route('category_product',$category->id)}}" class="title float-end">সবগুলো দেখুন</a></div>
          </div>
       
       <div class="row pb-5">
          @foreach ($products as $product)
          <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2  p-2">
            <div class="book_card">
            <div class="book  product text-center pt-4 pb-4">
             <img  class="book_img"  src="{{asset('public/images/'.$product->thumbnail)}}" class="rounded mx-auto d-block img-contain"  alt="">   
            <h5 class="book_title pt-2 p-1">{{$product->name}} </h5>
            <p class="mb-0">{{$product->short_desc}}</p>
            <div class="d-flex-inline star">
              @for ($i=1; $i<=$product->rating;$i++)
              <i class="fa-solid fa-star"></i>  
              @endfor
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
      @endif
   @endforeach
      <!-- New book section -->
   @endisset

  
 @isset($popularBooks)
<section class="books ms-3 me-3">
  <div class="container-fluid">
    <div class="row pb-5 pt-5">
      <div class="col-6 text-left"><h3 class="title">জনপ্রিয় বই</h3></div>
      <div class="col-6 text-right"><a href="{{route('bookTypes','popular')}}" class="title float-end">সবগুলো দেখুন</a></div>
        </div>

  <div class="row  pb-5">
      @foreach ($popularBooks as $product)
      <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2  p-2">
        <div class="book_card">
        <div class="book  product text-center pt-4 pb-4">
          <img  class="book_img"  src="{{asset('public/images/'.$product->thumbnail)}}" class="rounded mx-auto d-block" alt="">    
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
    
      @isset($islamicBooks)
       
     <section class="books ms-3 me-3">
       <div class="container-fluid">
         <div class="row pb-5 pt-5">
           <div class="col-6 text-left"><h3 class="title">ইসলামিক বই</h3></div>
           <div class="col-6 text-right"><a href="{{route('bookTypes','islamic')}}" class="title float-end">সবগুলো দেখুন</a></div>
             </div>
     
       <div class="row  pb-5">
           @foreach ($islamicBooks as $product)
           <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2  p-2">
             <div class="book_card">
             <div class="book  product text-center pt-4 pb-4">
              <img  class="book_img"  src="{{asset('public/images/'.$product->thumbnail)}}" class="rounded mx-auto d-block" alt="">   
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
        
    
      
    <!-- banner area -->
    <section class="banner_1">
      <div class="container-fluid">
          <div class="row justify-content-evenly">
              <div class="col-4">
                @if ($HomePage->banner_3!=null)
                <img src="{{asset('public/images/'.$HomePage->banner_3)}}" class="img-fluid rounded" alt="">
                @else
                <img src="{{asset('public/images/banner_2.png')}}" class="img-fluid rounded" alt="">
                @endif

              
              </div>
              <div class="col-4">
                @if ($HomePage->banner_4!=null)
                <img src="{{asset('public/images/'.$HomePage->banner_4)}}" class="img-fluid rounded" alt="">
                @else
                <img src="{{asset('public/images/banner_2.png')}}" class="img-fluid rounded" alt="">
                @endif
              </div>

              <div class="col-4">
                @if ($HomePage->banner_5!=null)
                <img src="{{asset('public/images/'.$HomePage->banner_5)}}" class="img-fluid rounded" alt="">
                @else
                <img src="{{asset('public/images/banner_2.png')}}" class="img-fluid rounded" alt="">
                @endif
               
              </div>
              
          </div>
      </div>
    </section>
   
    
      

  
    @isset($childrenBooks)
     
   <section class="books ms-3 me-3">
     <div class="container-fluid">
       <div class="row pb-5 pt-5">
         <div class="col-6 text-left"><h3 class="title">শিশু-কিশোরদের বই</h3></div>
         <div class="col-6 text-right"><a href="{{route('bookTypes','children')}}" class="title float-end">সবগুলো দেখুন</a></div>
           </div>
   
     <div class="row  pb-5">
         @foreach ($childrenBooks as $product)
         <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2  p-2">
           <div class="book_card">
           <div class="book  product text-center pt-4 pb-4">
            <img  class="book_img"  src="{{asset('public/images/'.$product->thumbnail)}}" class="rounded mx-auto d-block" alt="">   
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

        
    
         @isset($novels)
        <section class="books ms-3 me-3">
          <div class="container-fluid">
            <div class="row pb-5 pt-5">
              <div class="col-6 text-left"><h3 class="title">গল্প ও উপন্যাস</h3></div>
              <div class="col-6 text-right"><a href="{{route('bookTypes','novels')}}" class="title float-end">সবগুলো দেখুন</a></div>
                </div>
        
          <div class="row  pb-5">
              @foreach ($novels as $product)
              <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2  p-2">
                <div class="book_card">
                <div class="book  product text-center pt-4 pb-4">
                  <img  class="book_img"  src="{{asset('public/images/'.$product->thumbnail)}}" class="rounded mx-auto d-block" alt="">   
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
     
       <!-- book section -->
   

@endsection