@extends('backend.layout.master')
@section('content')

<div class="col-md-6">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">ADD Permission</h3>
    </div>
    
    <form action="{{ route("permission.store") }}" method="POST">
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1"> Name</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="">
          @if($errors->has('name'))
              <div class="error text-danger">{{ $errors->first('name') }}</div>
            @endif
        </div>
       
        
      
      </div>
      

      <div class="card-footer">
        <a href="{{ route('permission.index')}}" class="btn btn-lg btn-primary m-3">BACK</a>
        <button type="submit" class="btn btn-lg btn-success m-3" >Add</button> 
      </div>
    </form>
  </div>
 
@endsection