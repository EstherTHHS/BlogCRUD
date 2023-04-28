@extends('backend.layout.master')
@section('content')
  <div class="p-5">

    <div class="col col-6 justify-content-center">

        <h1>Edit BLOG</h1>
        
      
      <form action="{{ route("blog.update",$result->id) }}" method="POST"  enctype="multipart/form-data">
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

            <div class="mb-3 ">
              <label for="exampleInputEmail1"> Select Author</label>
              <select class="form-select" aria-label="Default select example" name="author_id">
                @foreach ($author as $person )
                <option value="{{ $person->id }}" {{$result->author_id === $person->id ? 'selected' : '' }}>
                  {{ $person->name }}</option>
                @endforeach
                   
           
          </div>

         
            <div class="mb-3">
              <label for="formFile" class="form-label">Default file input example</label>
              <input name="img" class="form-control" type="file" value="{{ $result->img }}" id="formFile">
              {{-- {{ $result->img }} --}}
              <img src="{{ asset('images/'.$result->img) }}" alt="" style="width:150px">
              @if($errors->has('img'))
              <div class="error text-danger">{{ $errors->first('img') }}</div>
            @endif
            </div>
           

        </div>
            <a href="{{ route("blog.index") }}" class="btn btn-lg btn-primary m-3">BACK</a>
            <button type="submit" class="btn btn-lg btn-success m-3" >Update</button> 
            
      </form>
    </div>
  </div>
@endsection