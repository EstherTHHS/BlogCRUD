@extends("backend.layout.master")
@section('title', 'ADDPOST')

@section('content')
  <div class="p-5">

    <div class="col col-6 justify-content-center">

        <h1>ADD POST</h1>
        
      
      <form action="{{ route("post.store") }}" method="POST">
      @csrf
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label"> POST Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="" >
                @if($errors->has('title'))
                <div class="error text-danger">{{ $errors->first('title') }}</div>
              @endif
            </div>

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">POST</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="post" placeholder="" >
                @if($errors->has('post'))
                <div class="error text-danger">{{ $errors->first('post') }}</div>
              @endif
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Checked or Unchecked</label>
              <div>
                  <input type="checkbox" name="is_active"/>
              </div>
          </div>

            <a href="{{ url('post')}}" class="btn btn-lg btn-primary m-3">BACK</a>
            <button type="submit" class="btn btn-lg btn-success m-3" >Add</button> 
            
      </form>
    </div>
  </div>
  
@endsection