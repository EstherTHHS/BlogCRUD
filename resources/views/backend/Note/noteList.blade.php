@extends('backend.layout.master')
@section('title', 'ListPost')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Note</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href={{route('admin')}}>Home</a></li>
            <li class="breadcrumb-item"><a href={{ route('admin.widget') }}>Widgets</a></li>
            <li class="breadcrumb-item "><a href={{ route('blog.index') }}> Blog</a></li>
            <li class="breadcrumb-item "><a href={{ route('post.index') }}>Post</a> </li>
            <li class="breadcrumb-item "><a href={{ route('note.index') }}>Note</a> </li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <div class="d-flex"> 
    <a href="{{ route('note.create') }}" class="btn  btn-light m-3 ml-auto p-2"><i class="fa-solid fa-square-plus" style="color: #c49003;"></i><span>ADD Note</span></a>
  </div>
  
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Id</th>
                    <th scope="col">Note Title</th>
                    <th scope="col">Note</th>
                    <th scope="col">Action</th>
                    <th scope="col">Aciton</th>
                    <th scope="col">Aciton</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($notes as $note)
                    <tr>
                      <th scope="row">{{$loop->iteration}}</th>
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
                          <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa-solid fa-trash-can"></i></button>
                          </form>
                        </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              {{-- {{ $notes->links() }} --}}
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
  
            
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection

