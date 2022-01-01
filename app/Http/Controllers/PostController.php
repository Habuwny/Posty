<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;

class PostController extends Controller
{
  public function index()
  {
    return view("posts.index", [
      "posts" => Post::latest()
        ->with("tags")
        ->get(),
    ]);
  }

  public function create()
  {
    return view("posts.create");
  }

  public function store()
  {
    $attributes = array_merge($this->validatePost(), [
      "user_id" => request()->user()->id,
    ]);
    $post = Post::create($attributes);

    $tags = request()->tags;
    foreach (explode(",", $tags) as $tag) {
      $tagId = Tag::where("name", "=", $tag)->value("id");
      if ($tagId) {
        $post->tags()->attach($tagId);
      }
    }

    return redirect("/")->with("success", "Post Published 👍 🎉");
  }

  protected function validatePost(): array
  {
    return request()->validate([
      "title" => ["required", "min:5"],
      "tags" => ["max:255"],
      "excerpt" => ["required", "max:255"],
      "body" => ["required"],
    ]);
  }
}
