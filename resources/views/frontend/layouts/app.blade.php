
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- CSRF Token -->
            <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font family -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto:wght@100;400;500&display=swap" rel="stylesheet">
<!-- font awsome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
<!-- custom css -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/responsive.css')}}">

@yield('style')
    </head>
    <body>
  
        @include('frontend.partials.header')

<!-- content area  start-->
<main-content>
        @yield('content')
</main-content>
    <!-- content area end -->

    
        @include('frontend.partials.footer')
    
           <!--Bootstrap Bundle with Popper -->
           <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
           <!-- font awsome -->
           <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                
           <!-- jquery -->
           <script src="{{asset('js/jquery-3.7.1.min.js')}}"></script>
            <!-- sweet alert -->
           <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
           <!-- owl carosuel -->
           <script src="{{asset('js/owl.carousel.min.js')}}"></script>
           <!-- custom javacript -->
            <script src="{{asset('js/main.js')}}"></script>
            <script src="{{asset('js/cartScript.js')}}"></script>
            <script>
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            </script>
            <script type="text/javascript">
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
                                window.location.reload();
                            }
                        });
                    }
                });
              
            </script>
            @yield('script')
    </body>
</html>
