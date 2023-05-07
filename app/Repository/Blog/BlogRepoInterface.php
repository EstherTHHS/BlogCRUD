<?php

namespace App\Repository\Blog;

use App\Http\Requests\BlogRequest;

interface BlogRepoInterFace
{
  public function get();
  public function create();
  public function show($data);
  // public function edit($data);
  //parameter must be anything name variable

}
