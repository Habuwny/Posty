<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Subscribers;
use Illuminate\Http\Request;

class SubscribersController extends Controller
{
  public function check(Subscribers $subscribers)
  {
    ddd($subscribers);
  }
  public function subscribe(Post $post)
  {
    Subscribers::create([
      "post_id" => $post->id,
      "user_id" => auth()->user()->id,
    ]);
    return redirect("/");
  }
}
