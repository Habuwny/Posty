<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionNotificationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create("subscription_notifications", function (Blueprint $table) {
      $table->id();
      $table->string("type");
      $table->string("checked")->default("false");
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
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists("subscription_notifications");
  }
}
