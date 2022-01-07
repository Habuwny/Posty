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
      $table
        ->foreignId("user_id")
        ->constrained()
        ->cascadeOnDelete();
      $table
        ->foreignId("post_id")
        ->constrained()
        ->cascadeOnDelete();
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
    Schema::dropIfExists("subscription_notifications");
  }
}
