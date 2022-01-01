<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostTagTableSeeder extends Seeder
{
  public function run()
  {
    $postsCounter = (int) $this->command->ask(
      "How many postTags do you need ?",
      20
    );

    $posts = Post::all();
    $tags = Tag::all();

    PostTag::factory($postsCounter)
      ->make()
      ->each(function ($postTag) use ($posts, $tags) {
        $postTag->post_id = $posts->random()->id;
        $postTag->tag_id = $tags->random()->id;
        $postTag->save();
      });
  }
}
