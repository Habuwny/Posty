<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SubscriptionNotification;
use Illuminate\Http\Request;

class SubscriptionNotificationController extends Controller
{
  public function checked(SubscriptionNotification $subscriptionNotification)
  {
    $slug = Post::find($subscriptionNotification->post_id)->slug;
    if ($subscriptionNotification->checked === "false") {
      $subscriptionNotification->update(["checked" => "true"]);
    }
    return redirect("/posts/$slug");
  }
}
