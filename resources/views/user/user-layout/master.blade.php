<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light fixed-top">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto float-right">
        <li class="nav-item">
            <button class="nav-item btn btn-secondary" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off mr-2"></i>
            {{ __('Logout') }}
        </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4 position-fixed">
    <!-- Brand Logo -->
    <a href="{{ route('user.user-dashboard') }}" class="brand-link">
      <img src="{{ asset('images/logo3.png') }}" alt="Logo" class="brand-image img-rounded elevation-3">
      <span class="brand-text-white ml-3 font-weight-light">Admin LTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (isset($user->photo))
              <img src="{{ asset('storage/user-photos/' . $user->photo) }}" alt="" width="200"
              style="object-fit: contain;" class="img-fluid" height="150">
          @else
              <img src="{{ asset('images/userdefault.png') }}" alt="" width="200" height="150" class="img-fluid">
          @endif
      </div>
        <div class="info">
            @auth
                <a href="{{ route(
                    'user.user-dashboard',
                    Auth::user()->first()->id,
                    ) }}"
                    class="d-block brand-text font-weight-light ml-2">{{ Auth::user()->name }}</a>
            @endauth
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('http://127.0.0.1:8000/') }}" class="nav-link">
                    <i class="fa fa-home mr-3" aria-hidden="true"></i>
                    <p>
                        Home
                    </p>
                </a>
              </li>  
            <li class="nav-item">
                <a href="{{ route('index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th ml-n1 mr-3"></i>
                    <p>
                        Post
                    </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.user-dashboard') }}" class="nav-link">
                    <i class="fa fa-address-card mr-3" aria-hidden="true"></i>
                    <p>
                        Profile
                    </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.edit',Auth::user()->id,) }}" class="nav-link">
                    <i class="fa fa-address-card mr-3" aria-hidden="true"></i>
                    <p>
                        Edit Profile
                    </p>
                </a>
              </li>   
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->

    <div class="content pt-4 pb-5 mt-5 mb-5">
      <div class="container-fluid">
        <main>
            @yield('user-content')
        </main>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer fixed-bottom py-2">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
    <!-- preview js -->
    <script src="{{ asset('js/previewImage.js') }}"></script>

</body>
</html>
