<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create("likes", function (Blueprint $table) {
      $table->id();
      $table
        ->foreignId("post_id")
        ->constrained()
        ->cascadeOnDelete();
      $table
        ->foreignId("user_id")
        ->constrained()
        ->cascadeOnDelete();
      $table->timestamps();

      //      $table
      //        ->foreign("post_id")
      //        ->references("id")
      //        ->on("posts");
      //      $table
      //        ->foreign("user_id")
      //        ->references("id")
      //        ->on("users");
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists("likes");
  }
}
