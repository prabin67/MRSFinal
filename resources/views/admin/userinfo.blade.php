@extends('admin.layouts.app')
@section('content')
<div class="container">
   <h2 class="text-center">Movie list</h2><br>
      <table class="table table-light">
        <thead>
          <tr>
            <th scope="col">S.N</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
           
          
          </tr>
        </thead>
         @foreach($user as $r)
            <tr>
              <td>{{$r->id}}</td>
              <td>{{$r->name}}</td>
              <td>{{$r->email}}</td>
              @endforeach
             

@endsection