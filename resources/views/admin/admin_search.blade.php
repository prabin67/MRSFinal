@extends('admin.layouts.app')
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

{{-- modal for update --}}
<div class="modal fade" id="updatemovie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Update movie</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('admin.getMovieDetail')}}">
          @csrf
          @method('put')
                  
           <input type="hidden" name="mid" id="mid">
           <div class="form-group">
            <label for="exampleInputName1">Image</label>
            <input type="text" class="form-control" name="new_image" id="new_image" placeholder="">
          </div>
  
          <div class="form-group">
            <label for="exampleInputName1">Movie Title</label>
            <input type="text" class="form-control" name="new_title" id="new_title" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail3">genre</label>
            <input type="text" class="form-control" name="new_genre" id="new_genre" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Actor</label>
            <input type="text" class="form-control" name="new_actor" id="new_actor" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">Director</label>
            <input type="text" class="form-control" name="new_director" id="new_director" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">writer</label>
            <input type="text" class="form-control" name="new_writer" id="new_writer" placeholder="">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword4">release date</label>
            <input type="date" class="form-control" name="new_release_date" id="new_release_date" placeholder="">
          </div>
  
  
          <div class="form-group">
            <label for="plot">plot</label>
            <textarea class="form-control" name="new_plot" id="new_plot" rows="4"></textarea>
          </div>
         
         <button type="submit" class="btn btn-primary" name="submit" >update</button>
  
           
          </form>
  
        </div>
  
      </div>
    </div>
  </div>
{{-- end of modal --}}

<!-- modal for delete -->
<div class="modal fade" id="deleteMovie" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <p>Are you sure you want to delete.</p>
      <form action="{{route('admin.deleteMovie')}}" method="POST">
              @csrf
              @method('DELETE')
              <input type="hidden" name="delete_mid" id="delete_mid">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Delete</button>
      </form>
      </div>
    </div>
  </div>
</div>
<!-- end of modal for delete -->
<div class="container">
<form class="form-inline my-2 my-lg-0" type="get" action="{{route('admin.admin_search')}}">
            <input class="form-control mr-sm-2" name=query type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
   <h2 class="text-center">Movie list</h2><br>
      <table class="table table-light">
        <thead>
          <tr>
            <th scope="col">S.N</th>
            <th scope="col">image</th>
            <th scope="col">Title</th>
            <th scope="col">genre</th>
            <th scope="col">actor</th>
            <th scope="col">director</th>
            <th scope="col">writer</th>
            <th scope="col">released date</th>
            <th scope="col">plot </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
         @foreach($movies as $r)
            <tr>
              <td>{{$r->mid}}</td>
              <td><img src="{{asset('images/movies/'.$r->image)}}"></td>
              <td>{{$r->title}}</td>
              <td>{{$r->genre}}</td>
              <td>{{$r->actor}}</td>
              <td>{{$r->director}}</td>
              <td>{{$r->writter}}</td>
              <td>{{$r->released_date}}</td>
              <td>{{$r->plot}}</td> 

              <td>
                <button class="btn btn-outline-primary" id="updatebtn" data-toggle="modal"
                 data-target="#updatemovie"  onclick="showUpdateModal('{{$r}}')">Update</button>
                <script>
                    function showUpdateModal(strdata){
                      let r = JSON.parse(strdata);
                          //  console.log(data);
                           $("#mid").val(r.mid);
                           $("#new_image").val(r.image);
                           $("#new_title").val(r.title);
                           $("#new_genre").val(r.genre);
                           $("#new_actor").val(r.actor);
                           $("#new_director").val(r.director);
                           $("#new_writer").val(r.writter);
                           $("#new_release_date").val(r.released_date);
                           $("#plot").val(r.plot);
                       }

                </script>
              
                <button class="btn btn-danger" id="delete_btn" data-toggle="modal"
                 data-target="#deleteMovie" onclick="deleteMovie('{{$r->mid}}')" >Delete</button>
                 <a href="abc/{{$r->mid}}"  class="btn btn-primary">View</a>
              </td>
            </tr>
     
            @endforeach
        </thead>
      </table>
</div>

<script>


function deleteMovie($movie_id){
            console.log($movie_id);
            $('#delete_mid').val($movie_id);
        }

    function showUpdateModal(strdata)
    {
      let r = JSON.parse(strdata);

      $("#new_image").val(r.image); 
      $("#new_title").val(r.title);
      $("#new_genre").val(r.genre);
      $("#new_actor").val(r.actor);
      $("#new_director").val(r.director);
      $("#new_writer").val(r.writter);
      $("#new_release_date").val(r.released_date);
      $("#new_plot").val(r.plot);
                      
  }
</script>
@endsection