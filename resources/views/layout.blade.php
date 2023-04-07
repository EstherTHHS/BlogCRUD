<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css?=time()" rel="stylesheet" />
    <title>@yield('title')</title>
</head>

<body style="background-color: #F9F5EB" >
    <div class="container-fluid col col-12">

    <nav  class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route("blog.index") }}">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route("post.index") }}">Post</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route("note.index") }}">Note</a>
              </li>

          </div>
        </div>
      </nav>

      <div class="header"> @yield('header')</div>

      <div class="mainbody justify-content-center"> @yield('Main')</div>
    </div>

    
    
</body>

</html>
    

