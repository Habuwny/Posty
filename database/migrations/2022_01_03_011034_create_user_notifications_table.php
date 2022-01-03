<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotificationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create("user_notifications", function (Blueprint $table) {
      $table->id();
      $table->string("type");
      $table->string("seen")->default("false");
      $table->unsignedBigInteger("notifier_id");
      $table->unsignedBigInteger("user_id");
      $table->unsignedBigInteger("post_id");
      $table->timestamps();

      $table
        ->foreign("user_id")
        ->references("id")
        ->on("users");
      $table
        ->foreign("post_id")
        ->references("id")
        ->on("posts");

      $table
        ->foreign("notifier_id")
        ->references("id")
        ->on("users");
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists("user_notifications");
  }
}
