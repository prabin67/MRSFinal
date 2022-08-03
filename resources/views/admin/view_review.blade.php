@extends('admin.layouts.app')
@section('content')
@foreach($value['movie'] as $data)
<div class="container">
  <table  class="table table-light">
         
         <div class="row">
             <div class="col">
                 <label for="photo"></label><br>
                  <img  src="{{asset('images/movies/'.$data->image)}}" alt="" alignment="center"  height="300px" width="400px"> 
             </div>
             </div>
             <ul class="list-group list-group-flush">
             <li class="list-group-item">
               <label>Rating:</label>
                 {{$value['rating']}}
            </li>
            </ul>
             <ul class="list-group list-group-flush">
             <li class="list-group-item">
               <label>Title:</label>
                 {{$data->title}}
            </li>
            </ul>
        
            <ul class="list-group list-group-flush">
             <li class="list-group-item">
               <label>Genre:</label>
                
               {{$data->genre}}
               </li>
            </ul>
        
 
             <ul class="list-group list-group-flush">
             <li class="list-group-item">
               <label>Actors:</label>
                
               {{$data->actor}} 
               </li>
            </ul>
        
             <ul class="list-group list-group-flush">
             <li class="list-group-item">
               <label for="image">Director:</label>
                
               {{$data->director}}
               </li>
            </ul>
        
             <ul class="list-group list-group-flush">
             <li class="list-group-item">
               <label for="image">Writer:</label>
                 
               {{$data->writter}}
               </li>
            </ul>
             <ul class="list-group list-group-flush">
             <li class="list-group-item">
               <label for="image">Released date:</label>
               {{$data->released_date}}
               </li>
            </ul>
             
             <ul class="list-group list-group-flush">
             <li class="list-group-item">
               <label for="image">Movie Plot:</label>
               {{$data->plot}}
               </li>
            </ul>
            <ul class="list-group list-group-flush">
             @foreach( $value['comment'] as $data)
             <li class="list-group-item">
               <b>{{$data->name}}:</b>{{$data->users_comments}}&nbsp;&nbsp;&nbsp;Ratings:{{$data->ratings}}/5
              </li>
            @endforeach
            </ul>
            
</table>
@endforeach

@endsection