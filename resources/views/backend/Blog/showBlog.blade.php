@extends('backend.layout.master')
@section('content')
  
  <a href="{{ route('blog.index') }}" class="btn btn-lg btn-success m-3">Back</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">BlogTitle</th>
        <th scope="col">Blog</th>
        <th scope="col">Image</th>
        <th scope="col">Author</th>
      </tr>
    </thead>
    <tbody>
  
      <tr>
      <th scope="row">{{$result->id}}</th>
      <td>{{$result->title}}</td>
      <td>{{$result->blog}}</td>
      <td><img src="{{ asset('images/'.$result->img) }}" alt="" style="width:150px"></td>
      <td>{{ $result->author->name }}</td>
  </table>
@endsection