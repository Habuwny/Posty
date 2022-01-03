<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\UserNotification;

class UserNotificationController extends Controller
{
  public function seen(UserNotification $userNotification)
  {
    $slug = Post::find($userNotification->post_id)->slug;
    if ($userNotification->seen === "false") {
      $userNotification->update(["seen" => "true"]);
    }
    return redirect("/posts/$slug");
  }
}
