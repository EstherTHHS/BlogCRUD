@extends('backend.layout.master')
@section('title', 'EditPost')

@section('content')
  <div class="p-5">

    <div class="col col-6 justify-content-center">

        <h1>Edit POST</h1>
      <form action="{{ route("post.update",$data->id) }}" method="POST">
      @csrf
     @method("PATCH")
      
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label"> Post Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="" value="{{ $data->title }}" >
                @if($errors->has('title'))
                <div class="error text-danger">{{ $errors->first('title') }}</div>
              @endif
                
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">POST Context</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="post" placeholder="" value="{{ $data->post }}">
                @if($errors->has('post'))
                <div class="error text-danger">{{ $errors->first('post') }}</div>
              @endif
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Checked or Unchecked</label>
              <div>
                <input type="checkbox" name="is_active" {{($data->is_active===1)?"checked":""}} />
               
              </div>
              

            <a href="{{ url('post')}}" class="btn btn-lg btn-primary m-3">BACK</a>
            <button type="submit" class="btn btn-lg btn-success m-3" >Update</button> 
      </form>
    </div>
  </div>
  
@endsection