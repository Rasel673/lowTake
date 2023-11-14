
@php
  $categories=App\Models\Category::with('subcategory')->where('parent_id', null)->orderby('id', 'asc')->limit(8)->get(); 
@endphp

@isset($categories)
<section class="lower_navbar">
    <div class="container-fluid">
        <div class="row lowernav  me-2">
        <ul class=" @if (count($categories)>=7)
          d-flex justify-content-between
        @endif">
          <li class="text-center">
            <a href="{{url('/')}}" class="">হোম</a>
          </li>
           <!--with subcategoires -->  
            @foreach ( $categories as $category)
            @php
            $subcatgories=$category->subcategory;
             @endphp
             @if (count($subcatgories)>0)
             <li class="text-center">
                <div class="dropdown">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                      {{$category->name}}
                  </a>
                @isset($subcatgories)
                  <ul class="dropdown-menu bg-dark text-white text-center" aria-labelledby="dropdownMenuLink">
                      @foreach ( $subcatgories as $subcategory)
                    <li class="dropdown-item tex-center"><a href="{{route('category_product',$subcategory->id)}}" class="">{{$subcategory->name}}</a></li>
                    @endforeach
                  </ul>
                 
                @endisset
                </div>
              </li>
             @else

              <!-- without subcategoires -->
             <li class="text-center ms-2"><a href="{{route('category_product',$category->id)}}">{{$category->name}}</a></li>
             @endif
    
          @endforeach
          </ul>
        </div>
    </div>
</section>
@endisset