@extends('layout')

@section('title', 'ListBLOG')

@section('header')
<a href="{{ route('blog.create') }}" class="btn btn-lg btn-success m-3">ADD BLOG</a>
    
@endsection
@section('Main')

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">BlogTitle</th>
        <th scope="col">Blog</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($data as $val)
      <tr>
        <th scope="row">{{$val->id}}</th>
        <td>{{$val->title}}</td>
        <td>{{$val->blog}}</td>
        <td>
          <a href="{{ route('blog.edit',$val->id) }}" class="btn btn-primary">
          <i class="fa-solid  fa-pen-to-square"></i></a>
        </td>
        <td>
          <a href="{{ route('blog.show',$val->id) }}" class="btn btn-success">
            <i class="fa-solid fa-magnifying-glass"></i>
          </a>
        </td>
        <td>
          <form action="{{ route('blog.destroy',$val->id) }}" method="POST">
            @csrf
            @method("DELETE")
            <button class="btn btn-danger" onclick="confirm('Do you want to delete?')"><i class="fa-solid fa-trash-can"></i></button>
            </form>
          </td>
      </tr>
    @endforeach
  </table>

@endsection

