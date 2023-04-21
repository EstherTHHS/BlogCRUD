@extends('backend.layout.master')


@section('content')

  {{-- <div class="p-5">

    <div class="col col-6 justify-content-center">

        <h1>ADD BLOG</h1>
        
      
      <form action="{{ route("blog.store") }}" method="POST">
      @csrf
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label"> Blog Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="">
                @if($errors->has('title'))
                <div class="error text-danger">{{ $errors->first('title') }}</div>
              @endif
            </div>

            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">BLog</label>
               
                  <textarea type="text" class="form-control" id="exampleFormControlInput1" name="blog"  cols="30" rows="10" ></textarea>
                  @if($errors->has('blog'))
                  <div class="error text-danger">{{ $errors->first('blog') }}</div>
                @endif
               
            </div>
            <a href="{{ url('blog')}}" class="btn btn-lg btn-primary m-3">BACK</a>
            <button type="submit" class="btn btn-lg btn-success m-3" >Add</button> 
            
      </form>
     
     
    </div>
  </div> --}}


  <div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">ADD Form</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{ route("blog.store") }}" method="POST">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Blog Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="">
            @if($errors->has('title'))
                <div class="error text-danger">{{ $errors->first('title') }}</div>
              @endif
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">BLog</label>
            <textarea type="text" class="form-control" id="exampleFormControlInput1" name="blog"  cols="30" rows="10" ></textarea>
                  @if($errors->has('blog'))
                  <div class="error text-danger">{{ $errors->first('blog') }}</div>
                @endif
          </div>
          
          {{-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div> --}}
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <a href="{{ url('blog')}}" class="btn btn-lg btn-primary m-3">BACK</a>
          <button type="submit" class="btn btn-lg btn-success m-3" >Add</button> 
        </div>
      </form>
    </div>
    <!-- /.card -->
  @endsection