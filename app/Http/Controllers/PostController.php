<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
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

  public function show(Post $post)
  {
    return view("posts.show", ["post" => $post]);
  }

  public function like(Post $post)
  {
    $like = Like::where("post_id", "=", $post->id)
      ->where("user_id", auth()->user()->id)
      ->first();
    if ($like) {
      return $like->delete();
    } else {
      Like::create(["post_id" => $post->id, "user_id" => auth()->user()->id]);
    }

    return back();
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
