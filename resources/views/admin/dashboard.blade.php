@extends('admin.layouts.app')
@section('content')
 
<div class= "row">
@foreach($movie as $data)
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col mt-3">
  
    <div class="card" >
        <img class="card-img-top" src="{{asset('images/movies/'.$data->image)}}" 
        alt="Card image cap" width="200px" height="200px">
        <div class="card-body">
          <h1 class="card-title">{{$data->title}}</h1>
         
          <a href="Admin_show/{{$data->mid}}"  class="btn btn-primary">View</a>
          
        </div>
      </div>
    
     
</div>
@endforeach
</div>

@endsection