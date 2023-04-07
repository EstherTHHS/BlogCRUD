@extends('layout')

@section('title', 'ListNote')

@section('header')
<a href="{{ route("note.create") }}" class="btn btn-lg btn-success m-3">ADD Note</a>
    
@endsection
@section('Main')

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Note Title</th>
        <th scope="col">Note</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($notes as $note)
      <tr>
        <th scope="row">{{$note->id}}</th>
        <td>{{$note->title}}</td>
        <td>{{$note->note}}</td>
        <td>
          <a href="{{ route("note.edit",$note->id) }}" class="btn btn-primary">
            <i class="fa-solid  fa-pen-to-square"></i>
          </a>
        </td>
        <td>
          <a href="{{route("note.show",$note->id)  }}" class="btn btn-success">
            <i class="fa-solid fa-magnifying-glass"></i>
          </a>
        </td>
        <td>
          <form action="{{ route("note.destroy",$note->id) }}" method="POST">
            @csrf
            <button class="btn btn-danger" onclick="confirm('Do you want to delete?')"><i class="fa-solid fa-trash-can"></i></button>
            </form>
          </td>
      </tr>
    @endforeach
  </table>

@endsection

