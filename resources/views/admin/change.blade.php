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
<form class="form" method="POST" action="{{route('admin.update')}}">
    <input type="hidden" class="form-control" name="id" value="{{ Auth::guard('admin')->user()->id }}"/>
    @csrf

    <div class="mb-3">
      <label for="" class="form-label">Current Password</label>
      <input type="password" class="form-control" name="current" id="current" placeholder="" required="">
      <input type="checkbox" onclick="showFunction()">Show Password
    </div>

    <div class="mb-3">
        <label for="" class="form-label">New Password</label>
        <input type="password" class="form-control" name="new" id="new" placeholder="" required="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Conform Password</label>
        <input type="password" class="form-control" name="confirm" id="confirm" placeholder="" required="">
        <div id="Error"></div>
        <input type="checkbox" onclick="ConfirmshowFunction()">Show Password
      </div>

  
    <input type="submit" name="submit" class="btn btn-success" value="Update" />

</form>

<script> 

function ConfirmshowFunction() {
    var x = document.getElementById("new");
    var y=document.getElementById("confirm");
    if (x.type === "password" && y.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
  }
  $(document).ready(function(){
    $('#confirm,#new').keyup(function(){
        var password = $('#new').val();
        var confirmpassword = $('#confirm').val();
        if(confirmpassword!=password){
          $('#Error').html('*Password Not Matched*');
          $('#Error').css('color','red');
          return false;
        } else {
           $('#Error').html('*Password Matched*');
          $('#Error').css('color','green');
          return true;
        }
    

    });
  });
</script>

@endsection