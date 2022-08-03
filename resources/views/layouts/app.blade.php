<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Sentiment Based Movie Rating System</title>
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
      <title>Sentiment Based Movie Rating System</title>
    <style type="text/css">
        a{
            text-decoration: none!important;
            color: white;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand " >SMBRS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('allmovies')}}">All Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('about')}}">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{route('contact')}}">Contact Us</a>
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0" type="get" action="{{route('search')}}">
            <input class="form-control mr-sm-2" name=query type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <!-- <form method="POST" action="{{ route('logout') }}">
                    @csrf
            <a href="route('logout')" class="btn btn-primary my-2 my-sm-0" onclick="event.preventDefault();
              this.closest('form').submit();">Log Out</a>
          
                </form> -->
        </div>
        <!--  -->
        <li class="nav-item">
          <div class="nav-item dropdown me-2">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" data-bs-toggle="tooltip" title="Plz login..." style="color:white;">
                <i class="fa-solid fa-user i1" style="color:rgb(251, 251, 251)"></i>
                   <span class="ps-1" style="font-size:20px;">
                       @auth
                     {{ Auth::user()->name }}</span>
                       @endauth
              </a>
                @auth
                <div class="dropdown-menu">  
                  <a class="dropdown-item" href="{{route('updatepassword')}}">Update Password</a>
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
            <a href="route('logout')" class="dropdown-item" onclick="event.preventDefault();
              this.closest('form').submit();">Log Out</a>
          
                </form>
                </div>
              @endauth

         </div>
          </li>
        <!--  -->
      </nav>
      
      <div id="content">

      @yield('content')

      </div>
      <footer class="footer navbar-dark bg-dark">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022. All rights reserved.</span>
        </div>
      </footer>

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