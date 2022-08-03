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
        <a class="navbar-brand" >SMBRS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('landing_movie')}}">All Movies</a>
            </li>
              <li class="nav-item">
                <a class="nav-link " href="{{route('admin.login')}}">Admin login</a>
              </li>
              @if (Route::has('login'))
              @auth
              <li> <a class="nav-link" href="{{ url('/dashboard') }}" >Dashboard</a></li>
              @else        
              <li><a class="nav-link" href="{{ route('login') }}" >Login</a></li>

                  @if (Route::has('register'))
                            
              <li><a  class="nav-link" href="{{ route('register') }}" >Register</a></li>
                  @endif
              @endauth
              @endif
              </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
        </div>
      </nav>


      
      <div id="content">

     
            
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="images/spider.jpg" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/venom.jpg" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/states.jpg" alt="Third slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="images/john.jpg" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
     

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