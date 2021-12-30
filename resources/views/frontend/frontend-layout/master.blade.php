<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
            <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm" style="background-color: #E2EFF8">
                <div class="container">
                    <a class="navbar-brand font-weight-bold text-uppercase" style="color: #0BA5A9" href="{{ url('/') }}">AdminLTE
                    </a>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="navbar-brand " style="color: #0BA5A9" href="{{url('posts')}}">Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbar-brand" style="color: #0BA5A9" href="{{url('/about-us')}}">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="navbar-brand" style="color: #0BA5A9" href="{{url('/contact-us')}}">Contact Us</a>
                            </li>
                        </ul>
                            <!-- Authentication Links -->
                        <ul class="navbar-nav mr-auto">
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item mr-3">
                                <a class="btn" style="background-color: #0BA5A9; color:white;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn ml-2" style="background-color: #0BA5A9; color:white;" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #0BA5A9" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role_id == 1)
                                        <a class="dropdown-item" href="{{ route('admin.admin-dashboard') }}"
                                        >
                                        Admin Dashboard
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('user.user-dashboard') }}"
                                        >
                                        User Dashboard
                                        </a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    </a>
                                
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        
    
        <main>
            @yield('frontend-content')
        </main>
    
        <footer class="page-footer font-small" style="background-color: #E2EFF8">
            <div class="container text-center text-md-left">
                <div class="row">
                    {{-- <div class="col-md-3 mx-auto mt-5">
                       <a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" width="150px" height="80px"alt=""></a> 
                    </div> --}}
                    
                    <div class="col-md-3 mx-auto">
                        <h5 class=" font-weight-bold text-uppercase mt-3 mb-4 " style="color: #0BA5A9;">AdminLTE</h5>
                        <ul style="font-size: 17px;" class="list-unstyled">
                            {{-- <li>
                                <a href="{{url('/jobs')}}" class="" style="color: #0BA5A9;">Posts</a>
                            </li>
                            <li>
                                <a href="{{url('/companies')}}" class="" style="color: #0BA5A9;">Companies</a>
                            </li> --}}
                            <li>
                                <a href="/about-us" class="" style="color: #0BA5A9;">About us</a>
                            </li>
                            <li>
                                <a href="/contact-us" class="" style="color: #0BA5A9;">Contact us</a>
                            </li>
                        </ul> 
                    </div>

                    <div class="col-md-3 mx-auto">
                        <h5 class="font-weight-bold text-uppercase  mt-3 mb-4" style="color: #0BA5A9;">CONTACT</h5>
                        <ul class="list-unstyled" style="font-size: 17px;">
                            <li>
                                <p class=""  style="color: #0BA5A9;">
                                    <i class="fas fa-map-marker-alt pr-1" style="color: #0BA5A9;"></i>
                                    
                                    No.111,Botahtaung <span class="pl-3">Township,Yangon</span> 
                                </p>
                            </li>
                            <li>
                                <p  class="" style="color: #0BA5A9;">
                                    <i class="fa fa-envelope-open pr-1" style="color: #0BA5A9;"></i>
                                    superadmin@gmail.com</p> 
                            </li>
                            <li>
                                <p  class="" style="color: #0BA5A9;">
                                    <i class="fa fa-phone pr-1" style="color: #0BA5A9;"></i>
                                    +01 234 432 455</p>
                            </li>
                        </ul> 
                    </div>
                </div> 
            </div>
            <hr>
            <div class="footer-copyright text-center py-2  " style="color: #0BA5A9;">© 2021 Copyright:
                <a href="{{url('/')}}" class="" style="color: #0BA5A9;">superadmin@gmail.com</a>
            </div> 
        </footer>
    </div>
</body>
</html>