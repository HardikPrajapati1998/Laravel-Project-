@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Table</div>

                <div class="card-body">
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                     
                                  
                        </div>
                    @endif

                             
  <table class="table">
    <thead>
      <tr>
      <th>Id</th>
        <th>Name</th>
        <th>Email</th>
      
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        
        <td><a href='select/{{$user->id}}'  style="padding:10px;"><button type="button" class="btn btn-warning">Edit</button></a>
        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$user->id}})" 
          data-target="#DeleteModal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a></td>
    </tr>
      @endforeach
     
    </tbody>
  </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="DeleteModal" class="modal fade text-danger" role="dialog">
  <div class="modal-dialog ">
    <!-- Modal content-->
    <form action="" id="deleteForm" method="GET">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">DELETE CONFIRMATION</h4>
            </div>
            <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <p class="text-center">Are You Sure Want To Delete ?</p>
            </div>
            <div class="modal-footer">
                <center>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Yes, Delete</button>
                </center>
            </div>
        </div>
    </form>
  </div>
 </div>
 <script type="text/javascript">
  function deleteData(id)
  {
      var id = id;
  
      var url = 'delete/'+id;
      console.log(url);
      url = url.replace(':id', id);
      $("#deleteForm").attr('action', url);
  }

  function formSubmit()
  {
      $("#deleteForm").submit();
  }
</script>
@endsection











