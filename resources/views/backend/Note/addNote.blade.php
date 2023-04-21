@extends('backend.layout.master')
@section('title', 'AddNote')

@section('content')
  <div class="p-5">

    <div class="col col-6 justify-content-center">

        <h1>ADD Note</h1>
        
      
      <form action="{{ route("note.store") }}" method="POST">
      @csrf
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label"> Note Title</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="title" placeholder="" >
                @if($errors->has('title'))
                  <div class="error text-danger">{{ $errors->first('title') }}</div>
                @endif
            </div>

            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">Note Body</label>
               
                  <textarea type="text" class="form-control" id="exampleFormControlInput1" name="note"  cols="30" rows="10" ></textarea>
                  @if($errors->has('note'))
                    <div class="error text-danger">{{ $errors->first('note') }}</div>
                  @endif
            </div>
            <a href="{{ route("note.index") }}" class="btn btn-lg btn-primary m-3">BACK</a>
            <button type="submit" class="btn btn-lg btn-success m-3" >Add</button> 
            
      </form>
     
     
    </div>
  </div>
  @endsection