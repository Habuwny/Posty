<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
  public function index()
  {
    return view("posts.index", ["posts" => Post::all()]);
  }

  public function create()
  {
    $attributes = $this->validatePost();

    Post::create($attributes);
  }

  protected function validatePost(): array
  {
    return request()->validate([
      "title" => ["required"],
      "excerpt" => ["required"],
      "body" => ["required"],
    ]);
  }
}
