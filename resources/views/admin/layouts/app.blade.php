<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> mrs</title>
  <link rel="stylesheet" href="{{asset('assets/css/materialdesignicons.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/vendor.bundle.base.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datepicker.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.structure.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.structure.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.theme.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.theme.min.css')}}">
      <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body class="sidebar-light">
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
          
        </ul>

        <ul class="navbar-nav navbar-nav-right">
        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('admin.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
         </ul>
<!-- 
         <li class="dropdown">

                        <a href="#" data-bs-toggle="dropdown"
                           class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <div class="d-none d-md-block d-lg-inline-block">Hi, {{ Auth::guard('admin')->user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href=""><i class="fas fa-user"></i>  Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item"  href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fas fa-unlock"></i>  Log Out
                            </a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li> -->
         <!-- <li class="nav-item">
          <div class="nav-item dropdown me-2">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" data-bs-toggle="tooltip" title="Plz login..." style="color:white;">
                <i class="fa-solid fa-user i1" style="color:rgb(251, 251, 251)"></i>
                   <span class="ps-1" style="font-size:20px;">
                       @auth
                     {{ Auth::guard('admin')->user()->name  }}</span>
                       @endauth
              </a>
                @auth
                <div class="dropdown-menu">  
                  <a class="dropdown-item" href="">Update Password</a>
                 
                </div>
              @endauth

         </div>
          </li>
      </div>
      -->
    </nav>

    <div class="container-fluid page-body-wrapper">
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.viewmovie')}}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">addmovie</span>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="{{route('admin.movielist')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">movie list</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.show_user')}}">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Users list</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.keywordlist')}}">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Add keywords</span>
            </a>
          </li>
		  <li class="nav-item">
                <a class="nav-link" href="{{route('admin.updatepass')}}">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Change Password</span>
            </a>
          </li>
          
        </ul>
      </nav>
    
      <div class="main-panel">
        <div class="content-wrapper">
          
           @yield('content')

        </div>

        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. All rights reserved.</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 

  <!-- plugins:js -->
  <script src="{{ asset('assets/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
  <script src="{{ asset('assets/js/template.js') }}"></script>
  <script src="{{ asset('assets/js/settings.js') }}"></script>
  <script src="{{ asset('assets/js/todolist.js') }}"></script>
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
  <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  
</body>
</html>