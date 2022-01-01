<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
  public function index()
  {
    return view("posts.index", [
      "posts" => Post::latest()
        ->with("categories")
        ->get(),
    ]);
  }

  public function create()
  {
    return view("posts.create");
  }

  public function store()
  {
    request()->slug = Str::slug(request()->title);
    //    ddd(request()->slug);
    $attributes = array_merge($this->validatePost(), [
      "user_id" => request()->user()->id,
      "slug" => request()->slug,
    ]);
    $post = Post::create($attributes);

    $tags = $post->tags;
    foreach (explode(",", $tags) as $tag) {
      $tagId = Tag::where("name", "=", $tag)->value("id");
      if ($tagId) {
        $post->categories()->attach($tagId);
      }
    }

    return redirect("/")->with("success", "Post Published 👍 🎉");
  }

  public function show()
  {
    return view("posts.show");
  }

  protected function validatePost(): array
  {
    return request()->validate([
      "title" => ["required", "min:5"],
      "tags" => ["max:255, required"],
      "excerpt" => ["required", "max:255"],
      "body" => ["required"],
    ]);
  }
}
