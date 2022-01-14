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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<style>
    .main-body {
        padding-bottom: 300px;
    }

</style>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm" style="background-color: #E2EFF8">
            <div class="container">
                <a class="navbar-brand font-weight-bold text-uppercase" style="color: #0BA5A9"
                    href="{{ url('/') }}">AdminLTE
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-3">
                            <a class="navbar-brand " style="color: #0BA5A9" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item ml-3 mr-3">
                            <a class="navbar-brand " style="color: #0BA5A9" href="{{ url('posts') }}">Posts</a>
                        </li>
                        <li class="nav-item ml-3 mr-3">
                            <a class="navbar-brand" style="color: #0BA5A9" href="{{ url('/about-us') }}">About
                                Us</a>
                        </li>
                        <li class="nav-item ml-3 mr-5">
                            <a class="navbar-brand" style="color: #0BA5A9" href="{{ url('/contact-us') }}">Contact
                                Us</a>
                        </li>
                    </ul>
                    <!-- Authentication Links -->
                    <ul class="navbar-nav float-right">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item mr-3">
                                    <a class="btn" style="background-color: #0BA5A9; color:white;"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn ml-2" style="background-color: #0BA5A9; color:white;"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: #0BA5A9" href="#"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdown">
                                    @if (Auth::user()->role_id == 1)
                                        <a class="dropdown-item" href="{{ url('admin/dashboard') }}">
                                            Admin Dashboard
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ url('user/dashboard') }}">
                                            User Dashboard
                                        </a>
                                    @endif
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <main class="main-body">
            @yield('frontend-content')
        </main>

        <footer class="page-footer font-small fixed-bottom" style="background-color: #E2EFF8;">
            <div class="container text-center mb-n3">
                <div class="row">

                    <div class="col-md-6 mx-auto">
                        <h5 class=" font-weight-bold text-uppercase mt-4" style="color: #0BA5A9;">AdminLTE</h5>
                        <ul style="font-size: 15px;" class="list-unstyled">
                            <li>
                                <a href="/about-us" class="" style="color: #0BA5A9;">About us</a>
                            </li>
                            <li>
                                <a href="/contact-us" class="" style="color: #0BA5A9;">Contact us</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6 mx-auto">
                        <h5 class="font-weight-bold text-uppercase mt-1" style="color: #0BA5A9;">CONTACT</h5>
                        <ul class="list-unstyled" style="font-size: 15px;">
                            <li>
                                <p class="" style="color: #0BA5A9;">
                                    <i class="fas fa-map-marker-alt pr-1" style="color: #0BA5A9;"></i>

                                    No.111,Botahtaung <span class="pl-1">Township,Yangon</span>
                                </p>
                            </li>
                            <li>
                                <p class="" style="color: #0BA5A9;">
                                    <i class="fa fa-envelope-open pr-1" style="color: #0BA5A9;"></i>
                                    superadmin@gmail.com
                                </p>
                            </li>
                            <li>
                                <p class="" style="color: #0BA5A9;">
                                    <i class="fa fa-phone pr-1" style="color: #0BA5A9;"></i>
                                    +01 234 432 455
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
            <div class="footer-copyright text-center py-2  " style="color: #0BA5A9;">© 2021 Copyright:
                <a href="{{ url('/') }}" class="" style="color: #0BA5A9;">superadmin@gmail.com</a>
            </div>
        </footer>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>
