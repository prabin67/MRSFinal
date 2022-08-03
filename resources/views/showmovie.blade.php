@extends('layouts.app')
@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif


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
            
             <form action="{{route('write_comment')}}" method="post" style="width:20%; height: 200px";>
             @csrf
             <input type="hidden" name="mid" id="mid" value="{{$data->mid}}">
             <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
            
              <div class="form-group">
                 <input type="textarea" class="form-control" name="ucomment" placeholder="Write comment here" required=""id="ucomment" /><br>
                 <button type="submit" class="btn btn-primary" name="submit">Post</button>
               </div>
             
             </form>
</table>
</div>
                     
@endforeach


@endsection
