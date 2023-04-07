@extends('layout')

@section('title', 'EditBlog')

@section("Main")
  <div class="p-5">

    <div class="col col-6 justify-content-center">

        <h1>Edit BLOG</h1>
        
      
      <form action="{{ route("blog.update",$result->id) }}" method="POST">
      @csrf
      @method("PATCH")
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label"> Blog Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="" value="{{ $result->title }}" >
                @if($errors->has('title'))
                <div class="error text-danger">{{ $errors->first('title') }}</div>
              @endif
            </div>

            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">BLog</label>
                <textarea  type="text" class="form-control" id="exampleFormControlInput1" name="blog" placeholder="" cols="30" rows="10">{{ $result->blog }}</textarea>
                @if($errors->has('blog'))
                <div class="error text-danger">{{ $errors->first('blog') }}</div>
              @endif
            </div>
            <a href="{{ route("blog.index") }}" class="btn btn-lg btn-primary m-3">BACK</a>
            <button type="submit" class="btn btn-lg btn-success m-3" >Update</button> 
            
      </form>
    </div>
  </div>
@endsection