@extends("backend.layout.master")
@section('content')
  
  <a href="{{ route('blog.index') }}" class="btn btn-lg btn-success m-3">Back</a>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">BlogTitle</th>
        <th scope="col">Blog</th>
      </tr>
    </thead>
    <tbody>
  
      <tr>
      <th scope="row">{{$result->id}}</th>
      <td>{{$result->title}}</td>
      <td>{{$result->blog}}</td>
  </table>
@endsection