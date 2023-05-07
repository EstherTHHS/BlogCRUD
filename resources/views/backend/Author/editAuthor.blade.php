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
      <form action="{{ route("author.update",$author->id) }}" method="POST">
        @csrf
        @method("PATCH")
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">AuthorName</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="" value="{{$author->name}}">
            @if($errors->has('title'))
                <div class="error text-danger">{{ $errors->first('name') }}</div>
              @endif
          </div>
          
         

        <div class="card-footer">
          <a href="{{ route("author.index") }}" class="btn btn-lg btn-primary m-3">BACK</a>
          <button type="submit" class="btn btn-lg btn-success m-3" >Update</button> 
        </div>
      </form>
    </div>
    <!-- /.card -->
  @endsection