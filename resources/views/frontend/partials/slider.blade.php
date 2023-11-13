@php
  $sliders=App\Models\Slider::all(); 
@endphp


<div class="clearfix"></div>

<!-- slider -->
@isset( $sliders)
    

    <section id="slider">

        <div class="owl-carousel owl-theme">
                @foreach ($sliders as $slider )
                <div class="item">
                   <a href="{{$slider->link}}"><img src="{{asset('images/'.$slider->slider_image)}}" class="img-contain" alt=""></a>
                </div>
                   
                @endforeach
                 
              </div>
    </section>
 @endisset
<!-- under banner section -->
<section class="under_banner">
    <div class="container-fluid">
        <div class="row underbanner pb-3 pt-3">
            <marquee behavior="" direction="">
                <ol class="d-flex justify-content-between">
                    <li class="text-center ms-3"><i class="fa-solid fa-circle text-danger"></i> Free shipping</li>
                    <li class="text-center ms-3"><i class="fa-solid fa-circle text-danger"></i> Book Fair Offer</li>
                    <li class="text-center ms-3"><i class="fa-solid fa-circle text-danger"></i> 7Days Guaranteed</li>
                    
                </ol>

            </marquee>
      
        </div>
    </div>
   </div>
</section>
<!-- header area end -->