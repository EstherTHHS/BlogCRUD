@extends('layout')

@section('title', 'ShowPost')

@section('Main')
 
 <a href="{{ route("post.index") }}" class="btn btn-primary mt-4">Back</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">POST Title</th>
        <th scope="col">Post</th>
        <th scope="col">Is_Active</th>
      </tr>
    </thead>
    <tbody>
   
      <tr>
      <th scope="row">{{$data->id}}</th>
      <td>{{$data->title}}</td>
      <td>{{$data->post}}</td>
      <td> {{ ((bool) $data->is_active) ? "active" : "not active" }}</td>
  </table>
@endsection