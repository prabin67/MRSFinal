@extends('admin.layouts.app')
@section('content')
 
<div class="row">
    <h1 class="card-title ml10">Add Movie</h1>
<div class="col-12 grid-margin stretch-card">
 <div class="card">
   <div class="card-body">
   <form method="POST" action="{{route('admin.addmovie')}}" enctype="multipart/form-data">
       @csrf
       
       <div class="form-group">
        <label for="exampleInputName1">Image</label>
        <input type="file" class="form-control" name="image" id="image" placeholder="">
      </div>
       <div class="form-group">
         <label for="exampleInputName1">MOvie Title</label>
         <input type="text" class="form-control" name="title" id="title" placeholder="">
       </div>
       <div class="form-group">
         <label for="exampleInputEmail3">genre</label>
         <input type="text" class="form-control" name="genre" id="genre" placeholder="">
       </div>
       <div class="form-group">
         <label for="exampleInputPassword4">Actor</label>
         <input type="text" class="form-control" name="actor" id="actor" placeholder="">
       </div>
       <div class="form-group">
         <label for="exampleInputPassword4">Director</label>
         <input type="text" class="form-control" name="director" id="director" placeholder="">
       </div>
       <div class="form-group">
         <label for="exampleInputPassword4">writer</label>
         <input type="text" class="form-control" name="writer" id="writer" placeholder="">
       </div>
       <div class="form-group">
         <label for="exampleInputPassword4">release date</label>
         <input type="date" class="form-control" name="release_date" id="release_date" placeholder="">
       </div>
       

       <div class="form-group">
         <label for="plot">plot</label>
         <textarea class="form-control" name="plot" id="plot" rows="4"></textarea>
       </div>
       <button type="submit" class="btn btn-primary mr-2">Submit</button>
       <button class="btn btn-light">Cancel</button>
     </form>
   </div>
 </div>
</div>

</div>

@endsection