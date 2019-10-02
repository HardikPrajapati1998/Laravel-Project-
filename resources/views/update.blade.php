@extends('layouts.app')


@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Update</div>

                <div class="card-body">
  



  
  <form action='{{ url('/update/'.$users[0]->id) }}' enctype="multipart/form-data" method = "post" class="needs-validation" novalidate>
    <div class="form-group">
    <input type = "hidden" name = "_token" value = "{{csrf_token()}}">
      <label for="uname">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter username" value = '{{$users[0]->name}}' name="name" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="email" class="form-control" id="pwd" placeholder="Enter Email" value = '{{$users[0]->email}}'  name="email" required>
      <div class="valid-feedback">Valid.</div>
      <div class="invalid-feedback">Please fill out this field.</div>
    </div>
  <img src='{{ asset('profile/'.$users[0]->profile) }}' height="200px" width="200px"> 
    <div class="form-group">
      <label for="file">Profie:</label>
      <input type="file" class="form-control" id="file" placeholder="Enter image" value = '{{$users[0]->profile}}'   name="profile" >
      
    </div>
    <a href="/home"> <button type="button" class="btn btn-primary">Back</button></a>
    <button type="submit" class="btn btn-primary">Update</button>
  
  </form>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>





@endsection