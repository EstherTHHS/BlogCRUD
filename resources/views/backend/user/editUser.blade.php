@extends('backend.layout.master')
@section('content')

<div class="col-md-6">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Edit AdminLists</h3>
    </div>
    
    <form action="{{ route("user.update",$user->id) }}" method="POST">
      @csrf
      @method("PATCH")
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> Name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="name" value="{{ $user->name }}" placeholder="">
          @if($errors->has('name'))
              <div class="error text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1"> Email</label>
          <input type="email" class="form-control" id="exampleFormControlInput1" name="email" value={{ $user->email }} placeholder="">
          @if($errors->has('email'))
              <div class="error text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>

      
        <div class="form-group">
          <label for="exampleInputEmail1"> Select Role</label>
          
         <select class="form-select" aria-label="Default select example" name="status">
          
             @foreach ( $userRole as $role ) 
               <option value="{{ $role->name }}" {{ $role->name=== $user->roles->first()->name ? 'selected' : '' }}>
                {{ $role->name }}</option>
       @endforeach 
           
          </select> 
        </div>
      </div>


      <div class="card-footer">
        <a href="{{ route('user.index')}}" class="btn btn-lg btn-primary m-3">BACK</a>
        <button type="submit" class="btn btn-lg btn-success m-3" >Update</button> 
      </div>
    </form>
  </div>

@endsection