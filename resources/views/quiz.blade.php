@extends('layouts.app')
@section('content')
<script src="{{ asset('js/laravel.js') }}" defer></script>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quiz Laravel</div>

                <div class="card-body">



      <div id="quiz" ></div>
                <button id="submit" class="btn btn-success">Submit Quiz</button>
               
                <div class="alert alert-success" style="margin: 10px; ">
                    <form  action='/percentage/update/{{ Auth::user()->id }}'  class="Start this course-course" method="post">
                      @csrf
                      
                      <input type="" class="form-control" id="results" name="percentage" value=""  readonly> 
                        <strong>Result</strong>  <div id="certificate"></div>
                       
                      </form>
                      </div>
                    </div>
                  </div>
        </div>
    </div>


                      @endsection