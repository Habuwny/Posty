<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
  public function run()
  {
    $tags = collect([
      "#JavaScript",
      "#NodeJs",
      "#Php",
      "#ReactJs",
      "#VueJs",
      "#Html",
      "#General",
    ]);

    $tags->each(function ($tagName) {
      $tag = new Tag();
      $tag->name = $tagName;
      $tag->save();
    });
  }
}
