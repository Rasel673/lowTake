

@php
  $setting=App\Models\Setting::first(); 
@endphp

<!-- footer  -->
<footer>
    <section class="footer">
      <div class="container-fluid footer_area">
        <div class="row pt-3 pb-3">
          <div class="col-4">
            <img src="@if($setting->footer_Icon!=null)
            {{asset('images/'.$setting->footer_Icon)}} @endif" class="footerIcon img-fluid" alt="{{asset('images/footer.png')}}">
            <p>{{$setting->footer_text}}</p>
              <div class="services pt-2 d-flex">
                <img src="{{asset('images/Google Play 1.png')}}" class="playStore img-fluid me-2"  alt="">
                <img src="{{asset('images/Google Play 2.png')}}"  class="playStore img-fluid" alt="">
              </div>
    
          </div>
    
          <div class="col-1"></div>
    
          <div class="col-2 text-left mt-5">
            <p class="footer_title mt-5">Contact Us</p>
            <ul>
             <li class="mt-2"> <a href="">About Us</a></li> 
             <li class="mt-2"> <a href="">Order Track</a></li> 
             <li class="mt-2"> <a href="">Return & Refund Policy</a></li> 
             <li class="mt-2"> <a href="">Terms & Condition</a></li> 
             <li class="mt-2"> <a href="">Help Center</a></li> 
            </ul>
          </div>
         
     
          <div class="col-3 text-left Useful_links mt-5 ">
            <p class="footer_title mt-5">Useful Links</p>
            <ul>
             <li class="mt-2"> <a href="#">Address</a></li> 
             <li><p href="javascript:void(0)">{{$setting->footer_address}}</p></li> 
              <li class="mt-2"> <a href="#">Phone</a></li> 
              <li><p href="javascript:void(0)">{{$setting->footer_phone}} </p></li> 
               <li class="mt-2"> <a href="#">Email</a></li> 
               <li><p href="javascript:void(0)">{{$setting->footer_email}}</p></li> 
               <li class="mt-2"> <a href="">Blog</a></li> 
            </ul>
          </div>
        
    
          
          <div class="col-2 text-left mt-5">
            <p class="footer_title mt-5">Follow Us</p>
            <ul>
             <li class="mt-2"><a href="{{$setting->social_fb}}"><img src="{{asset('icons/Facebook  icon.svg')}}" class="me-2 img-fluid" alt="">Facebook</a></li> 
             <li class="mt-2"> <a href="{{$setting->social_insta}}"><img src="{{asset('icons/Instagram  icon.svg')}}" class="me-2 img-fluid" alt="">Instagram</a></li> 
             <li class="mt-2"> <a href="{{$setting->social_linkedein}}"><img src="{{asset('icons/Linkedin  icon.svg')}}" class="me-2 img-fluid" alt="">Linkedin</a></li> 
             <li class="mt-2"> <a href="{{$setting->social_youtube}}"><img src="{{asset('icons/Youtube icon.svg')}}"  class="me-2 img-fluid" alt="">Youtube</a></li> 
             <li class="mt-2"> <a href="{{$setting->social_tweet}}"><img src="{{asset('icons/Tweeter  icon.svg')}}"  class="me-2 img-fluid"alt="">Tweeter</a></li> 
             
            </ul>
          </div>
    
    
        </div>
    
    
      </div>
    </section>
    
    </footer>
    