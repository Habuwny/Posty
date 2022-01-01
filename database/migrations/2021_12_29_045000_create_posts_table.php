<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create("posts", function (Blueprint $table) {
      $table->id();
      $table->foreignId("user_id");
      $table->text("tags")->default("#general");
      $table->text("title");
      $table->text("slug");
      $table->text("excerpt");
      $table->text("body");
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists("posts");
  }
}
