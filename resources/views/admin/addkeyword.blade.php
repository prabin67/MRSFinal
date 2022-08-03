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
<div class="modal fade" id="addkeyword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add keyword</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{route('admin.addkeyword')}}">
          @csrf
          @method('post')
                  
           <div class="form-group">
            <label for="exampleInputName1">Keyword</label>
            <input type="text" class="form-control" name="keyword" id="keyword" placeholder="">
          </div>
  
          <div class="form-group">
            <label for="exampleInputName1">score</label>
            <input type="Number" class="form-control" name="score" id="score" placeholder="">
          </div>
          
         
         <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
  
           
          </form>
  
        </div>
  
      </div>
    </div>
  </div>
{{-- end of modal --}}

<!-- keyword list -->
<div class="container">
<button class="btn btn-outline-primary" id="updatebtn" data-toggle="modal"
                 data-target="#addkeyword" >Add</button>
   <h2 class="text-center">Keyword  list</h2><br>

      <table class="table table-light">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">keyword</th>
            <th scope="col">score</th>
        
          </tr>
        </thead>
         @foreach($keyword as $val)
            <tr>
            <td>{{$val->keyword_id}}</td> 
              <td>{{$val->keyword}}</td>
              
              <td>{{$val->score}}</td>
              
              
            </tr>
     
            @endforeach
        </thead>
      </table>
</div>


@endsection