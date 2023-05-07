<?php

//path
namespace App\Repository\Blog;

use App\Models\Author;
use App\Models\Blog;

class BlogRepository implements BlogRepoInterFace
{
  public function get()
  {
    $data = Blog::with('author')->get();
    return $data;
  }
  public function create()
  {
    $author = Author::all();
    return $author;
  }

  public function show($data)
  {
    $result = Blog::where('id', $data)->first();
    return  $result;
  }
}
