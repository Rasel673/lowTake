@extends('frontend.layouts.app')

@section('content')
<div class="min-vh-100">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ Auth::user()->name }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a class="btn btn-danger" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid py-4">
    <div class="row justify-content-center">

        <div class="col-md-2">
            <ul class="list-group">
                <a class="list-group-item bg-danger text-white" aria-current="true">Your Profile</a>
                <a class="list-group-item" href="{{url('/home')}}">Your Order</a>
                <a href="{{route('reset_user',Auth::user()->id)}}" class="list-group-item">Change Profile</a>
              </ul>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="card-body">
                    @yield('user_content')
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
