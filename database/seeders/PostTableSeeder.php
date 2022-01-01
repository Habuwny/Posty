<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $postsCounter = (int) $this->command->ask(
      "How many posts do you need ?",
      50
    );
    $users = User::all();

    Post::factory($postsCounter)
      ->make()
      ->each(function ($post) use ($users) {
        $user = $users->random();
        $post->user_id = $user->id;
        $post->slug = Str::slug($post->title);
        $post->save();
      });
  }
}
