@extends('backend.layout.master')
@section('content')
  <div class="p-5">

    <div class="col col-6 justify-content-center">

        <h1>Edit Permission</h1>
        
      
      <form action="{{ route("permission.update",$result->id) }}" method="POST">
      @csrf
      @method("PATCH")
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label"> Permission name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="" value="{{ $result->name }}" >
                @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name') }}</div>
              @endif
            </div>

           
            <a href="{{route('permission.index') }}" class="btn btn-lg btn-primary m-3">BACK</a>
            <button type="submit" class="btn btn-lg btn-success m-3" >Update</button> 
            
      </form>
    </div>
  </div>
@endsection