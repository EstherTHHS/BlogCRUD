@extends('backend.layout.master')
@section('title', 'ListPost')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Post</h1>
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
  <a href="{{ route('post.create') }}" class="btn  btn-light m-3 ml-auto p-2"><i class="fa-solid fa-square-plus" style="color: #c49003;"></i><span>ADD Post</span></a>
</div>


 <!-- Content Wrapper. Contains page content -->

  <!-- Main content -->
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
                  <th scope="col">Post Title</th>
                  <th scope="col">Post</th>
                  <th scope="col">Is_Active</th>
                  <th scope="col">Image</th>
                  <th scope="col">Aciton</th>
                  <th scope="col">Aciton</th>
                  <th scope="col">Aciton</th>
                </tr>
                </thead>
                <tbody>
                  @forelse ($data as $val)
      <tr>
        <th>{{ $loop->iteration }}</th>
      <th scope="row">{{$val->id}}</th>
      <td>{{$val->title}}</td>
      <td>{{$val->post}}</td>
      {{-- <td><input type="checkbox" {{($val->is_active===1)?"checked":""}}/></td> --}}
      <td> {{ ((bool) $val->is_active) ? "Active" : "Not_Active" }}</td>
  
      <td><img src="{{ asset('storage/postimage/' .  $val->image)  }}" alt="{{ $val->title }}" style="width:50px"></td>
      
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
          <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa-solid fa-trash-can"></i></button>
          </form>
      </td>
    </tr>
    @empty
    <div class="text-center text-danger fs-3">No Post Found!</div>
    @endforelse
                </tbody>
              </table>
            </div>
            {{-- {{ $data->links() }} --}}
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
  <!-- /.content -->
@endsection