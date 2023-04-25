@extends('backend.layout.master')
@section('content')
  <div class="p-5">

    <div class="col col-6 justify-content-center">

        <h1>Edit Role</h1>
        
      
      <form action="{{ route("role.update",$role->id) }}" method="POST">
      @csrf
      @method("PATCH")
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label"> Role Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="" value="{{ $role->name }}" >
                @if($errors->has('name'))
                <div class="error text-danger">{{ $errors->first('name') }}</div>
              @endif
            </div>

            @foreach ($permission as  $data)
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="{{ $data->id }}" name="permission[]" id="flexCheckChecked" {{ in_array($data->id,$rolePermissions) ? 'checked': '' }}>
              <label class="form-check-label" for="flexCheckChecked">
              {{ $data->name }}
              </label>
            </div>
            @endforeach

           
            <a href="{{route('permission.index') }}" class="btn btn-lg btn-primary m-3">BACK</a>
            <button type="submit" class="btn btn-lg btn-success m-3" >Update</button> 
            
      </form>
    </div>
  </div>
@endsection