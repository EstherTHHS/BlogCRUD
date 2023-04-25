@extends('backend.layout.master')
@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blog</h1>
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
    <a href="{{ route('permission.create') }}" class="btn  btn-light m-3 ml-auto p-2"><i class="fa-solid fa-square-plus" style="color: #c49003;"></i><span>ADD Permission</span></a>
  </div>
 
 

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with minimal features & hover style</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">createdAt</th>
                <th scope="col" >Action</th>
                <th scope="col">Action</th>
               
              </tr>
              </thead>
              <tbody>
                @foreach ($data as $val )
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <td>{{ $val->id }}</td>
                  <td>{{ $val->name }}</td>
                  <td>{{ $val->created_at }}</td>
                 
                  <td>
                    <a href="{{ route('permission.edit',$val->id) }}" class="btn btn-primary">
                    <i class="fa-solid  fa-pen-to-square"></i></a>
                  </td>
                 
                 
                

                 
                  <td>
                    <form action="{{ route('permission.destroy',$val->id) }}" method="POST">
                      @csrf
                      @method("DELETE")
                      <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')"><i class="fa-solid fa-trash-can"></i></button>
                      </form>
                    </td>
                  
                  
                </tr>
                </tr>
               
                @endforeach
              
          
              
              </tbody>
             
            </table>
          </div>
          <!-- /.card-body -->
        </div>
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
