<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Database\Seeder;

class LikeTableSeeder extends Seeder
{
  public function run()
  {
    $posts = Post::all();
    $users = User::all();

    $posts->each(function ($post) use ($users) {
      $user = $users->random();
      $like = new Like();
      $like->user_id = $user->id;
      $like->post_id = $post->id;
      $like->save();

      $notify = new UserNotification();
      $notify->seen = "false";
      $notify->type = "like";
      $notify->post_id = $user->id;
      $notify->user_id = $post->user->id;
      $notify->notifier_id = $user->id;
      $notify->save();
    });
  }
}
