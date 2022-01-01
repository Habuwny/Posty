<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostTagTableSeeder extends Seeder
{
  public function run()
  {
    $postsCounter = (int) $this->command->ask(
      "How many postTags do you need ?",
      20
    );

    $posts = Post::all();
    $tagCount = Tag::all()->count();
    if (0 === $tagCount) {
      $this->command->info(
        "No tags found, skipping assigning tags to blog posts"
      );
      return;
    }
    Post::all()->each(function (Post $post) {
      $takeTags = random_int(2, 6);
      $tagsStr = Tag::inRandomOrder()
        ->take($takeTags)
        ->get()
        ->pluck("name");
      $tags = Tag::inRandomOrder()
        ->take($takeTags)
        ->get()
        ->pluck("id");

      $post->categories()->sync($tags);
      //      $post->tags = implode(",", $tagsStr->toArray());
      $newPost = DB::table("posts")
        ->where("id", $post->id)
        ->update(["tags" => implode(",", $tagsStr->toArray())]);
    });
  }
}
