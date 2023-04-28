<?php

namespace App\Services\Blog;



interface BlogServiceInterface
{

  public function store($data);
  public function update($data, $id);

  //parameter must be anything name variable

}
