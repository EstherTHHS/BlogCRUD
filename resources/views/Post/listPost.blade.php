@extends('layout')

@section('title', 'ListPost')

@section('Main')

  <a href="{{ route('post.create') }}" class="btn btn-lg btn-success m-3">ADD POST</a>
 
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Post Title</th>
        <th scope="col">Post</th>
        <th scope="col">Is_Active</th>
        <th scope="col">Aciton</th>
      </tr>
    </thead>
    <tbody>
    @forelse ($data as $val)
      <tr>
      <th scope="row">{{$val->id}}</th>
      <td>{{$val->title}}</td>
      <td>{{$val->post}}</td>
      {{-- <td><input type="checkbox" {{($val->is_active===1)?"checked":""}}/></td> --}}
      <td> {{ ((bool) $val->is_active) ? "active" : "not active" }}</td>
      <td>
        <a href="{{ route('post.edit',$val->id) }}" class="btn btn-primary">
        <i class="fa-solid  fa-pen-to-square"></i></a>
        
      </td>
      <td>
        <a href="{{ route('post.show',$val->id) }}" class="btn btn-success" >
        <i class="fa-solid fa-magnifying-glass"></i>
          </a>
      </td>
      <td>
        <form action="{{ route("post.destroy",$val->id) }}" method="POST">
          @csrf
          @method("DELETE")
          <button class="btn btn-danger" onclick="confirm('Do you want to delete?')"><i class="fa-solid fa-trash-can"></i></button>
          </form>
      </td>
    </tr>
    @empty

    <div class="text-center text-danger fs-3">No Post Found!</div>
      
    @endforelse
    
    
  </table>
@endsection