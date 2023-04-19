@extends("backend.layout.master")
@section('title', 'ShowNote')

@section('content')
  
  <a href="{{ route("note.index") }}" class="btn btn-lg btn-success m-3">Back</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Note Title</th>
        <th scope="col">Note</th>
      </tr>
    </thead>
    <tbody>
  
      <tr>
      <th scope="row">{{$note->id}}</th>
      <td>{{$note->title}}</td>
      <td>{{$note->note}}</td>
  </table>
@endsection