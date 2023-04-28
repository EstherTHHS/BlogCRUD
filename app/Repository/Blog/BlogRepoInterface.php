<?php

namespace App\Repository\Blog;

use App\Http\Requests\BlogRequest;

interface BlogRepoInterFace
{
  public function get();
  public function create();
  public function show($data);
  //parameter must be anything name variable

}
