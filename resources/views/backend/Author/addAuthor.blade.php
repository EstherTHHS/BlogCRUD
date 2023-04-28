@extends('backend.layout.master')


@section('content')
  <div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">ADD Form</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route("author.store") }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">AuthorName</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="">
            @if($errors->has('title'))
                <div class="error text-danger">{{ $errors->first('name') }}</div>
              @endif
          </div>
          
         

        <div class="card-footer">
          <a href="{{ url('blog')}}" class="btn btn-lg btn-primary m-3">BACK</a>
          <button type="submit" class="btn btn-lg btn-success m-3" >Add</button> 
        </div>
      </form>
    </div>
    <!-- /.card -->
  @endsection