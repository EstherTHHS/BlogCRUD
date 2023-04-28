<?php

namespace App\Services\Blog;

use App\Models\Blog;
use App\Services\Blog\BlogServiceInterface;

class BlogService implements BlogServiceInterface
{
  public function store($data)
  {

    if ($data['img'] ?? false) {

      $imageName = time() . '.' . $data['img']->extension();
      $data['img']->move(public_path('images'), $imageName);
      $data['img'] =  $imageName;
    } else {
      $data['img'] =  $data['img'];
    }

    return Blog::create($data);
  }

  public function update($data, $id)
  {
    $result = Blog::where('id', $id)->first();
    if ($data['img'] ?? false) {
      $imageName = time() . '.' . $data['img']->extension();
      $data['img']->move(public_path('images'), $imageName);
      $data['img'] =  $imageName;
    }

    // else {
    //   $data['img'] =  $result->img;
    // }


    return $result->update($data);
  }
}
