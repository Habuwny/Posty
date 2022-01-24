<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use App\Models\Post;
use App\Models\SubscriptionNotification;
use App\Models\Subscriptions;
use App\Models\Tag;
use App\Models\UserNotification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
  public function index()
  {
    return view("posts.index", [
      "posts" => Post::latest()
        ->filter(request(["tag", "search"]))
        ->with("categories")
        ->simplePaginate(10)
    ]);
  }

  public function create()
  {
    return view("posts.create");
  }

  public function show(Post $post)
  {
    if (auth()->user()) {
      $isLiked =
        Like::where("post_id", "=", $post->id)
          ->where("user_id", auth()->user()->id)
          ->first() ?? false;
    } else {
      $isLiked = false;
    }

    return view("posts.show", [
      "post" => $post,
      "comments" => Comment::latest()->paginate(10),
      "isLiked" => !!$isLiked,
    ]);
  }

  public function like(Post $post)
  {
    $like = Like::where("post_id", "=", $post->id)
      ->where("user_id", auth()->user()->id)
      ->first();

    if ($like) {
      return $like->delete();
    } else {
      $newLike = Like::create([
        "post_id" => $post->id,
        "user_id" => auth()->user()->id,
      ]);

      if ($newLike->user_id !== $post->user_id) {
        $notify = new UserNotification();
        $notify->seen = "false";
        $notify->type = "like";
        $notify->post_id = $post->id;
        $notify->user_id = $post->user_id;
        $notify->notifier_id = auth()->user()->id;
        $notify->save();
      }

      $subs = Subscriptions::where("post_id", "=", $post->id)->get();
      foreach ($subs as $sub) {
        if ($newLike->user_id !== $sub->user_id) {
          $subNot = new SubscriptionNotification();
          $subNot->type = "like";
          $subNot->post_id = $sub->post_id;
          $subNot->user_id = $sub->user_id;

          $subNot->save();
        }
      }
    }

    return back();
  }

  public function comment(Post $post)
  {
    $validate = request()->validate([
      "content" => ["required"],
    ]);
    $attributes = array_merge($validate, [
      "user_id" => request()->user()->id,
      "post_id" => $post->id,
    ]);

    $comment = Comment::create($attributes);
    if ($comment->user_id !== $post->user_id) {
      $notify = new UserNotification();
      $notify->seen = "false";
      $notify->type = "comment";
      $notify->post_id = $post->id;
      $notify->user_id = $post->user_id;
      $notify->notifier_id = auth()->user()->id;
      $notify->save();
    }
    $subs = Subscriptions::where("post_id", "=", $post->id)->get();
    foreach ($subs as $sub) {
      if ($comment->user_id !== $sub->user_id) {
        $subNot = new SubscriptionNotification();
        $subNot->type = "comment";
        $subNot->post_id = $sub->post_id;
        $subNot->user_id = $sub->user_id;

        $subNot->save();
      }
    }
    return redirect()->back();
  }

  public function destroy(Post $post)
  {
    if (auth()->user()->id === $post->user_id) {
      $dPost = Post::find($post->id);
      $extensions = collect(["jpg", "jpeg", "png"]);
      foreach ($extensions as $oldExtension) {
        //        $imgPath = "post/bg/$dPost->slug.$oldExtension";
        $path = storage_path(
          "app\\public\\post\\bg\\$dPost->slug.$oldExtension"
        );
        if (Storage::exists($path)) {
          Storage::delete($path);
        }
      }
      $dPost->delete();
    }

    return redirect("/")->with("Post deleted ✂️ ✂️");
  }
}
