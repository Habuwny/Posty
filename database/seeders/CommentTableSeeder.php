<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\UserNotification;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CommentTableSeeder extends Seeder
{
  //->make()
  //->each(function ($post) use ($users) {
  //        $user = $users->random();
  //        $post->user_id = $user->id;
  //        $post->slug = Str::slug($post->title);
  //        $post->save();
  //      });
  public function run()
  {
    $posts = Post::all();
    $users = User::all();

    $posts->each(function ($post) use ($users) {
      Comment::factory(random_int(1, 20))
        ->make()
        ->each(function ($comment) use ($post, $users) {
          $user = $users->random();
          $comment->user_id = $user->id;
          $comment->post_id = $post->id;
          $comment->save();

          $notify = new UserNotification();
          $notify->seen = "false";
          $notify->type = "comment";
          $notify->post_id = $user->id;
          $notify->user_id = $post->user->id;
          $notify->notifier_id = $user->id;
          $notify->save();
        });
    });
  }
}
