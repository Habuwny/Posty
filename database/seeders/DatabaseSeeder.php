<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    if ($this->command->confirm("Refresh All Databases ?")) {
      $this->command->call("migrate:refresh");
      $this->command->info("Done! All your databases are refreshed ");
    }
    $this->call([UserTableSeeder::class, PostTableSeeder::class]);

    //    Post::factory(5)->create();
  }
}
