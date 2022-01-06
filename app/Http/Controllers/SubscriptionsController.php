<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\SubscriptionNotification;
use App\Models\Subscriptions;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
  public function add(Post $post)
  {
    $sub = Subscriptions::where("post_id", "=", $post->id)
      ->where("user_id", auth()->user()->id)
      ->first();
    if ($sub) {
      return $sub->delete();
    } else {
      Subscriptions::create([
        "post_id" => $post->id,
        "user_id" => auth()->user()->id,
      ]);
    }
  }

  public function checked(SubscriptionNotification $subscriptionNotification)
  {
  }
}
